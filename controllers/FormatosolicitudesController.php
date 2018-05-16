<?php

namespace app\controllers;

use Yii;
use app\models\Formatosolicitudes;
use app\models\Comentarios;
use app\models\Sistemasap;
use app\models\Ambientes;
use app\models\Portales;
use app\models\search\FormatosolicitudesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \SoapClient;

/**
 * FormatosolicitudesController implements the CRUD actions for Formatosolicitudes model.
 */
class FormatosolicitudesController extends Controller
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
     * Lists all Formatosolicitudes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FormatosolicitudesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Formatosolicitudes model.
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

    public function actionDetail($id)
    {
        return $this->render('detailview', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Formatosolicitudes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Formatosolicitudes();
        //$modelSap = new Sistemasap();

        if ($model->load(Yii::$app->request->post()) /*&&*/
            /*$modelSap->load(Yii::$app->request->post())*/) {
                if($model->save()){
                   
                    return $this->redirect(['view', 'id' => $model->id]);
                }
        }

        return $this->render('create', [
            'model' => $model,
            //'modelSap' => $modelSap,
        ]);
    }

    /**
     * Updates an existing Formatosolicitudes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
                if($model->save()){
                    return $this->redirect(['view', 'id' => $model->id]);
                }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Formatosolicitudes model.
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

    public function actionObtenerempleado($parametros){
        $consulta = Formatosolicitudes :: getEmpleado($parametros);
        
        return $consulta;
    }

    public function actionLists($id)
    {
       $countAmbientes = Ambientes::find()
                    ->where(['entornos_id' =>$id])
                    ->count();
       $Ambientes = Ambientes::find()
                    ->where(['entornos_id' =>$id])
                    ->all();
                    
                    if($countAmbientes>0)
                    {
                        echo "<div id='contenedor_$id'>";
                        foreach ($Ambientes as $Ambiente) {
                            # code...
                            /**echo "<option value='".$Ambiente->id."'>".$Ambiente->ambiente."</option>";*/
                            echo "<label class='checkbox-inline' id='subcontenedor_$id'><input type='checkbox' id='".$Ambiente->id."' value='".$Ambiente->id."'>".$Ambiente->ambiente."     </label>"; 

                          //  echo "<input type='checkbox' id='".$Ambiente->id."' value='".$Ambiente->id."'>".$Ambiente->ambiente."    "; 
                           
                            // $array =  array();

                        }
                        echo "</div>";
                    }else {
                        # code...
                        echo "error";
                    }
    }

    public function actionLists2($id)
    {
       $countPortales = Portales::find()
                    ->where(['ambientes_id' =>$id])
                    ->count();
       $Portales = Portales ::find()
                    ->where(['ambientes_id' =>$id])
                    ->all();
  
                    
                    if($countPortales>0)
                    {
                        echo "<div id='contenedorAmb_$id'>";
                        foreach ($Portales as $Portal) {
                            # code...
                            /**echo "<option value='".$Ambiente->id."'>".$Ambiente->ambiente."</option>";*/
                           //echo $Portal->portal_nombre;
                             echo "<label class='checkbox-inline' id='subcontenedorAmb_$id'><input type='checkbox' id='".$Portal->id."' value='".$Portal->id."'>".$Portal->portal_nombre."  </label>   "; 
                        }
                        echo "</div>";
                    }else {
                        # code...
                        echo "";
                    }
    }


    /**
     * Finds the Formatosolicitudes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Formatosolicitudes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Formatosolicitudes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
