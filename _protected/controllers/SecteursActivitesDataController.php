<?php

namespace app\controllers;

use Yii;
use app\models\SecteursActivitesData;
use app\models\SecteursActivitesDataSrch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SecteursActivitesDataController implements the CRUD actions for SecteursActivitesData model.
 */
class SecteursActivitesDataController extends Controller
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

    /**
     * Lists all SecteursActivitesData models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SecteursActivitesDataSrch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SecteursActivitesData model.
     * @param string $idsecteurs_activites_data
     * @param string $profil_entreprise_idprofil_entreprise
     * @param integer $secteurs_activites_idsecteurs_activites
     * @return mixed
     */
    public function actionView($idsecteurs_activites_data, $profil_entreprise_idprofil_entreprise, $secteurs_activites_idsecteurs_activites)
    {
        return $this->render('view', [
            'model' => $this->findModel($idsecteurs_activites_data, $profil_entreprise_idprofil_entreprise, $secteurs_activites_idsecteurs_activites),
        ]);
    }

    /**
     * Creates a new SecteursActivitesData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SecteursActivitesData();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idsecteurs_activites_data' => $model->idsecteurs_activites_data, 'profil_entreprise_idprofil_entreprise' => $model->profil_entreprise_idprofil_entreprise, 'secteurs_activites_idsecteurs_activites' => $model->secteurs_activites_idsecteurs_activites]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SecteursActivitesData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idsecteurs_activites_data
     * @param string $profil_entreprise_idprofil_entreprise
     * @param integer $secteurs_activites_idsecteurs_activites
     * @return mixed
     */
    public function actionUpdate($idsecteurs_activites_data, $profil_entreprise_idprofil_entreprise, $secteurs_activites_idsecteurs_activites)
    {
        $model = $this->findModel($idsecteurs_activites_data, $profil_entreprise_idprofil_entreprise, $secteurs_activites_idsecteurs_activites);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idsecteurs_activites_data' => $model->idsecteurs_activites_data, 'profil_entreprise_idprofil_entreprise' => $model->profil_entreprise_idprofil_entreprise, 'secteurs_activites_idsecteurs_activites' => $model->secteurs_activites_idsecteurs_activites]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SecteursActivitesData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idsecteurs_activites_data
     * @param string $profil_entreprise_idprofil_entreprise
     * @param integer $secteurs_activites_idsecteurs_activites
     * @return mixed
     */
    public function actionDelete($idsecteurs_activites_data, $profil_entreprise_idprofil_entreprise, 
    		$secteurs_activites_idsecteurs_activites)
    {
        $this->findModel($idsecteurs_activites_data, $profil_entreprise_idprofil_entreprise,
        		 $secteurs_activites_idsecteurs_activites)->delete();

        return $this->redirect(['/profil-entreprise/view', 'id'=> $profil_entreprise_idprofil_entreprise]);
    }

    /**
     * Finds the SecteursActivitesData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idsecteurs_activites_data
     * @param string $profil_entreprise_idprofil_entreprise
     * @param integer $secteurs_activites_idsecteurs_activites
     * @return SecteursActivitesData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idsecteurs_activites_data, $profil_entreprise_idprofil_entreprise, $secteurs_activites_idsecteurs_activites)
    {
        if (($model = SecteursActivitesData::findOne(['idsecteurs_activites_data' => $idsecteurs_activites_data, 'profil_entreprise_idprofil_entreprise' => $profil_entreprise_idprofil_entreprise, 'secteurs_activites_idsecteurs_activites' => $secteurs_activites_idsecteurs_activites])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
