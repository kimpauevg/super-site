<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MyobjavSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мои объявления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="myobjav-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php $cities = \app\models\Town::find()->all();
    $items = \yii\helpers\ArrayHelper::getColumn($cities,'name')
    ?>

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
                    return $model->price . " руб.";
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
            [
                'label' =>'Статус',
                'attribute'=>'status',
                'value'=>function($model){
                    if($model->status == 1) return "Активное";
                    else return "Закрытое";
                }

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


            ['class' => 'yii\grid\ActionColumn'],

        ]]); ?>


</div>
