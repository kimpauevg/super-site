<?php

namespace frontend\controllers;

use common\models\Objav;
use Yii;
use common\models\Myobjav;
use common\models\MyobjavSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MyobjavController implements the CRUD actions for Myobjav model.
 */
class MyobjavController extends Controller
{
    protected function checkAccess(){
        return !Yii::$app->user->isGuest;
    }
    protected function checkUpdateAccess($model)
    {
        if ($this->checkAccess()) {
            return ($model->owner_id == Yii::$app->user->id);
        }
        return false;
    }

    /**
     * {@inheritdoc}
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
            'access'=>[
                'class'=> AccessControl::className(),
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']

                    ]
                ]
            ]
        ];
    }


    /**
     * Lists all Myobjav models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MyobjavSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Myobjav model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(!$this->checkAccess()) return $this->goHome();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Myobjav model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new Myobjav();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }*/

    /**
     * Updates an existing Myobjav model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model =$this->findModel($id);
        if(!$this->checkUpdateAccess($model)){
            return $this->goHome();
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->uploadPhoto($model);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Myobjav model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $model =$this->findModel($id);
        if(!$this->checkUpdateAccess($model)){
            return $this->goHome();
        }
        $model->status = false;


        $model->save();
        return Yii::$app->response->redirect('?r=myobjav');

    }

    /**
     * Finds the Myobjav model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Myobjav the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Myobjav::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function uploadPhoto(Myobjav $model)
    {
        if ($model->load(Yii::$app->request->post())) {
            $model->upload = UploadedFile::getInstance($model, 'upload');

            if ($model->validate()) {
                if ($model->upload) {
                    $filePath = 'uploads/objav/' . $model->id . '.' . $model->upload->extension;
                    if ($model->upload->saveAs($model->getplace().$filePath)) {
                        $model->photo = $filePath;
                    }
                }

                if ($model->save(false)) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }
    }


}
