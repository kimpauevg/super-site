<?php

namespace backend\controllers;

use Yii;
use common\models\Objav;
use common\models\User;
use backend\models\ObjavSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ObjavController implements the CRUD actions for Objav model.
 */
class ObjavController extends Controller
{
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
                'class'=>AccessControl::className(),
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
     * Lists all Objav models.
     * @return mixed
     */
   /* protected function checkAccess(){
        if(!Yii::$app->user->isGuest){
            if(User::findOne(Yii::$app->user->id)->role == 'admin') return true;
        }
        return false;
    }*/
    public function actionIndex()
    {

        $searchModel = new ObjavSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Objav model.
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
     * Creates a new Objav model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // if(!$this->checkCreateAccess()) return $this->goHome();

        $model = new Objav();
        $model->created_at = date('d.m.Y H:i:s', time());//i added that
        $model->owner_id = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post())) {
            $person = User::findOne($model->owner_id);
            $this->uploadPhoto($model,$person);
            $person->objamount++;
            $person->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing Objav model.
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
     * Deletes an existing Objav model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(!$this->checkAccess()) return $this->goHome();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Objav model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Objav the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Objav::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function uploadPhoto(Objav $model, User $person)
    {
        if ($model->load(Yii::$app->request->post())) {
            $model->upload = UploadedFile::getInstance($model, 'upload');

            if ($model->validate()) {
                if ($model->upload) {
                    $filePath = 'uploads/objav/' . $model->owner_id . '_'.$person->objamount.'.' . $model->upload->extension;
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
