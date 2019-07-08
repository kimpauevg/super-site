<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use common\models\Town;
use \frontend\controllers\ObjavController;

Yii::$app->formatter->locale = "ru-RU";
/* @var $this yii\web\View */
/* @var $searchModel common\models\ObjavSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Актуальные объявления';
$this->params['breadcrumbs'][] = $this->title;
?>
<head><link rel="stylesheet" href="index.css" ></head>
<?php $cities = Town::find()->all();
        $items = \yii\helpers\ArrayHelper::getColumn($cities,'name')?>
<?php /*<div class="objav-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if(!Yii::$app->user->isGuest){echo Html::a('Создать объявление', ['create'], ['class' => 'btn btn-success']);} ?>
    </p>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [   'label' => 'Заголовок',
                'attribute' => 'headline'
            ],
            //'description',
            [   'label' => 'Цена',
                'value' => function($model){
                    return $model->price." руб.";
                },
            ],
            [   'label' => 'Категория',
                'attribute' => 'category',
                'filter'=>[   'Недвижимость'=>'Недвижимость',
                    'Транспорт'=>'Транспорт',
                    'Личные вещи'=>'Личные вещи',
                    'Хобби и отдых'=>'Хобби и отдых',
                    'Услуги'=>'Услуги',
                    'Бытовая техника'=>'Бытовая техника',
],
            ],
            [   'label' => 'Город',
                'attribute'=>'town',
                'filter'=>$items,
            ],

            //'created_at',
            //'owner_id',
            //'photo',
            [
                    'format' => 'raw',
                    'value' => function($data){
                            if($data->photo!=null){
                                return Html::img(($data->photo),[
                                    'style' => 'width:300px;max-height:300px'
                                ]);
                            } else return null;}],


            ['class' => 'yii\grid\MyActionColumn'],

    ]]); ?>



</div>
 */?>
<?php
function echocard($subj){
    echo "<div class='mr-5 col-lg-6' style='padding-right: 200px' ><p>
                <div class=\"card\" > <a href=". Url::toRoute(['/objav/view','id'=>$subj->id]) ."> 
                <img class='card-img-top' src=\" " . $subj->photo . " \" href=\"". Url::to(['/objav/view','id'=>$subj->id]) . "\">
                <div class='card-body'>". $subj->headline ." </div></a>
                <div class='card-body'>"."Цена: ". $subj->price . " руб"." </div>
                <div class='card-body'>".Yii::$app->formatter->asDatetime($subj->created_at,'php:d M H:i') ."</div>
                </div>
          </p></div>";

}
function echocol($subjs){
    foreach ($subjs as $subj) {
        //echo "<div class='row'>";
        echocard($subj);
        //echo "</div>";
    }
    echo "<div class='w-100'></div>";
}
?>
<div class="objav-index" ">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if(!Yii::$app->user->isGuest){echo Html::a('Создать объявление', ['create'], ['class' => 'btn btn-success']);} ?>
    </p>


    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php $models = $dataProvider->getModels();
    echo "<div class='container-fluid' style=' '>
             ";
                echocol($models);
    echo "
                
             
          </div>";

        ?>
    <?php echo \yii\widgets\LinkPager::widget([
            'pagination'=>$dataProvider->getPagination()
    ])?>


</div>