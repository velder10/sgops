<?php

namespace app\controllers;

use Yii;
use app\models\RessourcesM;
use app\models\RessourcesMSrch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RessourcesMController implements the CRUD actions for RessourcesM model.
 */
class RessourcesMController extends Controller
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
     * Lists all RessourcesM models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RessourcesMSrch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RessourcesM model.
     * @param string $idressources_m
     * @param string $profil_entreprise_idprofil_entreprise
     * @return mixed
     */
    public function actionView($idressources_m, $profil_entreprise_idprofil_entreprise)
    {
        return $this->render('view', [
            'model' => $this->findModel($idressources_m, $profil_entreprise_idprofil_entreprise),
        ]);
    }

    /**
     * Creates a new RessourcesM model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RessourcesM();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idressources_m' => $model->idressources_m, 'profil_entreprise_idprofil_entreprise' => $model->profil_entreprise_idprofil_entreprise]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RessourcesM model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idressources_m
     * @param string $profil_entreprise_idprofil_entreprise
     * @return mixed
     */
    public function actionUpdate($idressources_m, $profil_entreprise_idprofil_entreprise)
    {
        $model = $this->findModel($idressources_m, $profil_entreprise_idprofil_entreprise);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idressources_m' => $model->idressources_m, 'profil_entreprise_idprofil_entreprise' => $model->profil_entreprise_idprofil_entreprise]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RessourcesM model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idressources_m
     * @param string $profil_entreprise_idprofil_entreprise
     * @return mixed
     */
    public function actionDelete($idressources_m, $profil_entreprise_idprofil_entreprise)
    {
        $this->findModel($idressources_m, $profil_entreprise_idprofil_entreprise)->delete();

        return $this->redirect(['/profil-entreprise/view', 'id' => $profil_entreprise_idprofil_entreprise]);
    }

    /**
     * Finds the RessourcesM model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idressources_m
     * @param string $profil_entreprise_idprofil_entreprise
     * @return RessourcesM the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idressources_m, $profil_entreprise_idprofil_entreprise)
    {
        if (($model = RessourcesM::findOne(['idressources_m' => $idressources_m, 'profil_entreprise_idprofil_entreprise' => $profil_entreprise_idprofil_entreprise])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
