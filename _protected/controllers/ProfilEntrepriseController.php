<?php

namespace app\controllers;

use Yii;
use app\models\ProfilEntreprise;
use app\models\ProfilEntrepriseSrch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Cnigs;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use app\models\CategoriesData;
use app\models\SecteursActivitesData;
use app\models\RessourcesH;
use app\models\RessourcesM;
use app\models\Categories;
use app\models\app\models;
use app\models\SecteursActivites;
use kartik\form\ActiveForm;

/**
 * ProfilEntrepriseController implements the CRUD actions for ProfilEntreprise model.
 */
class ProfilEntrepriseController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionSection()
    {
    	$out = [];
    	if (isset($_POST['depdrop_parents'])) {
    		$ids = $_POST['depdrop_parents'];
    		$cat_id = empty($ids[0]) ? null : $ids[0];
    		$subcat_id = empty($ids[1]) ? null : $ids[1];
    		if ($cat_id != null) {
    			$data = [];
    			$data['out'] = Cnigs::find()->distinct(TRUE)
    				->where(['departement' => $cat_id, 'commune' => $subcat_id])
    				->select(['section AS id','section AS name'])->asArray()->all();
    			$data['selected'] = '';
    			
    			/**
    			 * the getProdList function will query the database based on the
    			 * cat_id and sub_cat_id and return an array like below:
    			 *  [
    			 *      'out'=>[
    			 *          ['id'=>'<prod-id-1>', 'name'=>'<prod-name1>'],
    			 *          ['id'=>'<prod_id_2>', 'name'=>'<prod-name2>']
    			 *       ],
    			 *       'selected'=>'<prod-id-1>'
    			 *  ]
    			*/
    			 
    			echo Json::encode(['output'=>$data['out'], 'selected'=>$data['selected']]);
    			return;
    		}
    	}
    	echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    
    public function actionCommune()
    {
    	//\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    	$data = [];
    	if (isset($_POST['depdrop_parents'])) {
    		$parents = $_POST['depdrop_parents'];
    		if ($parents != null) {
    			$cat_id = $parents[0];
    			$data = Cnigs::find()->distinct(TRUE)
    				->where(['departement' => $cat_id])
    				->select(['commune AS id','commune AS name'])->asArray()->all();
    			//$data = ArrayHelper::map($out, 'commune', 'commune');
    			/* $data = ArrayHelper::toArray($data, [
    				['id' => 'commune',
    				'name' => 'commune']
    			]); */
    			echo Json::encode(['output'=>$data, 'selected'=>'']);
    			return;
    		}
    	}
    	//return $out;
    	echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    /**
     * Lists all ProfilEntreprise models.
     * @return mixed
     */
    public function actionIndex()
    {
        /* $searchModel = new ProfilEntrepriseSrch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        */
    	$model = ProfilEntreprise::find()->asArray()->all();
    	 
        return $this->render('index', [
            /* 'searchModel' => $searchModel,
            'dataProvider' => $dataProvider, */
        	'model' => $model
        ]);
    }

    /**
     * Displays a single ProfilEntreprise model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
    	$catform = new CategoriesData();
    	$rhform = new RessourcesH();
    	$rmform = new RessourcesM();
    	$saform = new SecteursActivitesData();
    	$categorie = CategoriesData::find()->where(['profil_entreprise_idprofil_entreprise' => $id])->all();
    	$secteur = SecteursActivitesData::find()->where(['profil_entreprise_idprofil_entreprise' => $id])->all();
    	$rh = RessourcesH::find()->where(['profil_entreprise_idprofil_entreprise' => $id])->all();
    	$rm = RessourcesM::find()->where(['profil_entreprise_idprofil_entreprise' => $id])->all();
    	
    	if ($saform->load(Yii::$app->request->post())) {
    		//var_dump($saform);
    		if(isset($saform->firme_construction2) && is_array($saform->firme_construction2)){
    			foreach($saform->firme_construction2 as $firme){
    				$secteur = new SecteursActivitesData();
    				$secteur->profil_entreprise_idprofil_entreprise = $id;
    				$secteur->createdBy = Yii::$app->user->identity->id;
    				$secteur->createdOn = date('Y-m-d');
    				 
    				if($firme === 'Autre'){
    					$new_sect = SecteursActivites::find()->where(['secteur' => 'Autre'])->one();
    					$secteur->libelle = $saform->autre_firme_construction2;
    					$secteur->secteurs_activites_idsecteurs_activites = (int)$new_sect->idsecteurs_activites;
    				}else{
    					$secteur->secteurs_activites_idsecteurs_activites = (int)$firme;
    				}
    				 
    				if($secteur->save(FALSE)){
    					return $this->redirect(['view', 'id' => $id]);
    				}else{
    					var_dump($secteur);
    				}
    			}
    		}
    	}
    	
    	if ($rmform->load(Yii::$app->request->post())) {
    		$rmform->profil_entreprise_idprofil_entreprise = $id;
    		$rmform->createdBy = Yii::$app->user->identity->id;
    		$rmform->createdOn = date('Y-m-d');
    		
    		if($rmform->save(FALSE)){
    			return $this->redirect(['view', 'id' => $id]);
    		}
    	}
    	
    	if ($rhform->load(Yii::$app->request->post())) {
    		$rhform->profil_entreprise_idprofil_entreprise = $id;
    		$rhform->createdBy = Yii::$app->user->identity->id;
    		$rhform->createdOn = date('Y-m-d');
    		
    		if($rhform->niveau === 'autre'){
    			$rhform->isAutres = 1;
    		}
    		
    		if($rhform->save(FALSE)){
    			return $this->redirect(['view', 'id' => $id]);
    		}
    	}
    	
    	if ($catform->load(Yii::$app->request->post())) {
    		$catform->profil_entreprise_idprofil_entreprise = $id;
    		$catform->createdBy = Yii::$app->user->identity->id;
    		$catform->createdOn = date('Y-m-d');
    		
    		if($catform->save(FALSE)){
    			return $this->redirect(['view', 'id' => $id]);
    		}
    	}
    	
    	return $this->render('view', [
    		'model' => $this->findModel($id),
    		'categorie' => $categorie,
    		'secteur' => $secteur,
    		'rh' => $rh,
    		'rm' => $rm,
    		'catform' => $catform,
    		'rhform' => $rhform,
    		'rmform' => $rmform,
    		'saform' => $saform
    	]);
    	
    }

    /**
     * Creates a new ProfilEntreprise model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	$ok = 0;
        $model = new ProfilEntreprise();
        $connection = \Yii::$app->db;
        
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
        	Yii::$app->response->format = 'json';
        	return ActiveForm::validate($model);
        }
        
        
        if ($model->load(Yii::$app->request->post()) /* && $model->save() */) {
        	//var_dump($model);
        	/* if(isset($model->tech_info)){
        		foreach($model->tech_info as $tech){
        			//$data = 
        			var_dump((int)($tech));
        		}
        	} */
        	$model->createdBy = Yii::$app->user->identity->id;
        	$model->createdOn = date('Y-m-d');
        				
        	$transaction = $connection->beginTransaction();
        	try {
        		if($model->save()){
        			//var_dump($model);
        			if((!empty($model->nom_r) && !empty($model->prenom_r)) &&
        					!empty($model->competences_r) && !empty($model->niveau_r)){
        				$ressources = new RessourcesH();
        				$ressources->profil_entreprise_idprofil_entreprise = $model->idprofil_entreprise;
        				$ressources->prenom = $model->prenom_r;
        				$ressources->nom = $model->nom_r;
        				$ressources->niveau = $model->niveau_r;
        				$ressources->competences = $model->competences_r;
        				$ressources->createdBy = Yii::$app->user->identity->id;
        				$ressources->createdOn = date('Y-m-d');
        				$ressources->save(FALSE);
        			}
        			
        			if((!empty($model->nom_r1) && !empty($model->prenom_r1)) &&
        					!empty($model->competences_r1) && !empty($model->niveau_r1)){
        				$ressources = new RessourcesH();
        				$ressources->profil_entreprise_idprofil_entreprise = $model->idprofil_entreprise;
        				$ressources->prenom = $model->prenom_r1;
        				$ressources->nom = $model->nom_r1;
        				$ressources->niveau = $model->niveau_r1;
        				$ressources->competences = $model->competences_r1;
        				$ressources->createdBy = Yii::$app->user->identity->id;
        				$ressources->createdOn = date('Y-m-d');
        				$ressources->save(FALSE);
        			}
        			
        			if(isset($model->equipement) && !empty($model->equipement) 
        					&& !empty($model->quantite) && is_numeric($model->quantite)){
        				
        				$ressourcesm = new RessourcesM();
        				$ressourcesm->profil_entreprise_idprofil_entreprise = $model->idprofil_entreprise;
        				$ressourcesm->equipement = $model->equipement;
        				$ressourcesm->quantite = $model->quantite;
        				$ressourcesm->createdBy = Yii::$app->user->identity->id;
        				$ressourcesm->createdOn = date('Y-m-d');
        				$ressourcesm->save(FALSE);
        			}
        			
        			if(isset($model->equipement1) && !empty($model->equipement1) 
        					&& !empty($model->quantite1) && is_numeric($model->quantite1)){
        				$ressourcesm = new RessourcesM();
        				$ressourcesm->profil_entreprise_idprofil_entreprise = $model->idprofil_entreprise;
        				$ressourcesm->equipement = $model->equipement1;
        				$ressourcesm->quantite = $model->quantite1;
        				$ressourcesm->createdBy = Yii::$app->user->identity->id;
        				$ressourcesm->createdOn = date('Y-m-d');
        				$ressourcesm->save(FALSE);
        			}
        			
	        		if(isset($model->categorie) && is_array($model->categorie)){
	        			foreach($model->categorie as $cat){
	        				$categorie = new CategoriesData();
	        				$categorie->profil_entreprise_idprofil_entreprise = $model->idprofil_entreprise;
	        				$categorie->createdBy = Yii::$app->user->identity->id;
	        				$categorie->createdOn = date('Y-m-d');
	        				
	        				if($cat === 'Autre'){
	        					$new_cat = Categories::find()->where(['nom' => 'Autre'])->one();
	        					$categorie->libelle = $model->autre_categorie;
	        					$categorie->categories_idcategories = (int)$new_cat->idcategories;
	        				}else{
	        					$categorie->categories_idcategories = (int)$cat;
	        				}
	        				
	        				$categorie->save(FALSE);
	        			}
	        		}
	        		
	        		if(isset($model->firme_construction) && is_array($model->firme_construction)){
	        			foreach($model->firme_construction as $firme){
	        				$secteur = new SecteursActivitesData();
	        				$secteur->profil_entreprise_idprofil_entreprise = $model->idprofil_entreprise;
	        				$secteur->createdBy = Yii::$app->user->identity->id;
	        				$secteur->createdOn = date('Y-m-d');
	        				
	        				if($firme === 'Autre'){
	        					$secteur->libelle = 'Autre';
	        				}else{
	        					$secteur->secteurs_activites_idsecteurs_activites = (int)$firme;
	        				}
	        				
	        				$secteur->save(FALSE);
	        			}
	        		}
	        		
	        		if(isset($model->tech_info) && is_array($model->tech_info)){
	        			foreach($model->tech_info as $tech){
	        				$secteur = new SecteursActivitesData();
	        				$secteur->profil_entreprise_idprofil_entreprise = $model->idprofil_entreprise;
	        				$secteur->createdBy = Yii::$app->user->identity->id;
	        				$secteur->createdOn = date('Y-m-d');
	        				
	        				if($tech === 'Autre'){
	        					$secteur->libelle = 'Autre';
	        				}else{
	        					$secteur->secteurs_activites_idsecteurs_activites = (int)$tech;
	        				}
	        				
	        				$secteur->save(FALSE);
	        			}
	        		}
	        		
	        		if(isset($model->compt_finan_mana) && is_array($model->compt_finan_mana)){
	        			foreach($model->compt_finan_mana as $compt){
	        				$secteur = new SecteursActivitesData();
	        				$secteur->profil_entreprise_idprofil_entreprise = $model->idprofil_entreprise;
	        				$secteur->createdBy = Yii::$app->user->identity->id;
	        				$secteur->createdOn = date('Y-m-d');
	        				
	        				if($tech === 'Autre'){
	        					$secteur->libelle = 'Autre';
	        				}else{
	        					$secteur->secteurs_activites_idsecteurs_activites = (int)$compt;
	        				}
	        				
	        				$secteur->save(FALSE);
	        			}
	        		}
	        		
	        		if(isset($model->renforcement_inst) && is_array($model->renforcement_inst)){
	        			foreach($model->renforcement_inst as $inst){
	        				$secteur = new SecteursActivitesData();
	        				$secteur->profil_entreprise_idprofil_entreprise = $model->idprofil_entreprise;
	        				$secteur->createdBy = Yii::$app->user->identity->id;
	        				$secteur->createdOn = date('Y-m-d');
	        				
	        				if($tech === 'Autre'){
	        					$secteur->libelle = 'Autre';
	        				}else{
	        					$secteur->secteurs_activites_idsecteurs_activites = (int)$inst;
	        				}
	        				
	        				$secteur->save(FALSE);
	        			}
	        		}
	        		
	        		$transaction->commit();
	        		return $this->redirect(['view', 'id' => $model->idprofil_entreprise]);
        		}else{
        			var_dump("ECHEC");
        		}
        	} catch (Exception $e) {
        		$transaction->rollback();
        	}
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    public function actionPdf()
    {
    	
    }
    
    public function actionValidation($id)
    {
    	if(Yii::$app->user->can('admin')){
    		$model = $this->findModel($id);
    		 
    		$model->isValidate = 1;
    		$model->validateBy = Yii::$app->user->identity->id;
    		$model->validateOn = date('Y-m-d');
    		
    		if($model->update()){
    			return $this->redirect(['index']);
    		}
    	}else{
    		
    	}
    	
    }
    
    public function actionRapport()
    {
    	return $this->render('rapport');
    }
    
    /**
     * Updates an existing ProfilEntreprise model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $secteur = SecteursActivitesData::find()->where(['profil_entreprise_idprofil_entreprise' => $id])->all();
        $rh = RessourcesH::find()->where(['profil_entreprise_idprofil_entreprise' => $id])->all();
        $rm = RessourcesM::find()->where(['profil_entreprise_idprofil_entreprise' => $id])->all();
        //var_dump($categorie_array);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idprofil_entreprise]);
        } else {
            return $this->render('update', [
                'model' => $model
            ]);
        }
    }

    /**
     * Deletes an existing ProfilEntreprise model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
    	$this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProfilEntreprise model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ProfilEntreprise the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProfilEntreprise::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
