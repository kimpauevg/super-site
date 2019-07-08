<?php

namespace frontend\controllers;

use app\models\User;
use Codeception\Template\Acceptance;
use Yii;
use common\models\Objav;
use common\models\ObjavSearch;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
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
    /*protected function checkCreateAccess(){
        return (!Yii::$app->user->isGuest);
    }*/
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','myindex','update'],
                'rules'=> [
                    [
                    'actions'=>['create','myindex','update'],
                    'allow'=>true,
                    'roles'=>['@']
                    ],
                ]

            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                ],
                'value' => function ($event) {
                    return time();
                },
            ],
        ];
    }

    /**
     * Lists all Objav models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjavSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionMyindex()
    {
        $searchModel = new ObjavSearch();
        $dataProvider = $searchModel->mysearch(Yii::$app->request->queryParams);

        return $this->render('myindex', [
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
    /*public function actionCreate()
    {
        if(!$this->checkCreateAccess()) return $this->goHome();
        $model = new Objav();
        $model->created_at = date('d.m.Y H:i:s', time());//i added that
        $model->owner_id = Yii::$app->user->id;
        $this->uploadPhoto($model);



        //if(!$model->save()){
          //  print_r($model->errors);die;}
        if ($model->load(Yii::$app->request->post())&&$model->save()) {

            $person = User::findOne(Yii::$app->user->id);
            $person->objamount=$person->objamount + 1;
            $person->save();
            $this->uploadPhoto($model);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

    }*/
    public function actionCreate()
    {
       // if(!$this->checkCreateAccess()) return $this->goHome();

        $model = new Objav();
        $model->created_at = time();//i added that
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
    /*public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $this->uploadPhoto($model);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }*/

    /**
     * Deletes an existing Objav model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->status = false;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }

        return $this->redirect('index');

    }*/

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
    protected function deletePhoto(Objav $model)
    {
        $model->upload = null;
        return true;
    }

}
