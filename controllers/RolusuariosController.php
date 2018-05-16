<?php

namespace app\controllers;

use Yii;
use app\models\Rolusuarios;
use app\models\Formatosolicitudes;
use app\models\search\RolusuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RolusuariosController implements the CRUD actions for Rolusuarios model.
 */
class RolusuariosController extends Controller
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
     * Lists all Rolusuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RolusuariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rolusuarios model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Rolusuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {

        $modelFormato = $this->findModelFormato($id);
        $model = new Rolusuarios();

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                $model->solicitudAlta_id = $modelFormato->id;
                $model->save();

            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'modelFormato' => $modelFormato,
        ]);
    }

    /**
     * Updates an existing Rolusuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //$modelFormato = $this->findModelFormato($id);
        $modelFormato = new Formatosolicitudes();
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                $model->solicitudAlta_id = $modelFormato->id;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelFormato' => $modelFormato,
        ]);
    }

    /**
     * Deletes an existing Rolusuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rolusuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rolusuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rolusuarios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findModelFormato($id)
    {
        if (($modelFormato = Formatosolicitudes::findOne($id)) !== null) {
            return $modelFormato;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
