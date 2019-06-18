<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Town;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ObjavSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Objavs';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $cities = Town::find()->all();
$items = ArrayHelper::getColumn($cities,'name')
?>

<div class="objav-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Objav', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute'=>'price',
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
