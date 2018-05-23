<?php

namespace app\controllers;

use Yii;
use app\models\Tranzit;
use app\models\TranzitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TranzitController implements the CRUD actions for Tranzit model.
 */
class TranzitController extends Controller
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
     * Lists all Tranzit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TranzitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $paragraphId = Yii::$app->request->get('paragraph_id');
        $dataProvider->query->andWhere("paragraph_id = $paragraphId");

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'paragraphId' => $paragraphId,
        ]);
    }

    /**
     * Displays a single Tranzit model.
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
     * Creates a new Tranzit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tranzit();
        $model->paragraph_id = yii::$app->request->get('paragraph_id'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'paragraph_id' => $model->paragraph_id, 'paragraphNumber' => $model->paragraph->number]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tranzit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tranzit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $paragraphId = $model->paragraph_id;
        $paragraphNumber = $model->paragraph->number;
        $model->delete();

        return $this->redirect(['index', 'paragraph_id' => $paragraphId, 'paragraphNumber' => $paragraphNumber]);
    }

    /**
     * Finds the Tranzit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tranzit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tranzit::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
