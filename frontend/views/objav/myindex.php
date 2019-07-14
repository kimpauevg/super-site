<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use common\models\Town;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ObjavSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мои объявления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objav-myindex">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php $cities = Town::find()->all();
    $items = ArrayHelper::map($cities,'name','name')
    ?>

    <!--?= GridView::widget([
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

        ]]); ?-->
    <?php

    function echoobjav($objav){
        $st = $objav->status==0?'Закрыто':'Активно';
        echo "<div class='row' style='margin-top: 5%'>
                <div class='col-lg-5'>
                    <h1>".$objav->headline."</h1>
                    <p><b>".date("d.m.Y H.i.s",$objav->created_at)." " . "Город:</b>". $objav->town ."</p>
                </div>
                <div class='col-lg-1'>".
                    Html::beginForm(['/objav/update','id'=>$objav->id],'get') .
                    Html::input('submit','Update','Update').
                    Html::endForm().
                "</div>
                <div class='col-lg-1'>".
                    Html::beginForm(['/objav/delete','id'=>$objav->id],'post') .
                    Html::input('submit','Delete','Delete').
                    Html::endForm().
                "</div>
                 <div class='col-lg-5'>".
                    Html::tag('p',Html::encode('Статус: '.$st)).
                    Html::tag('p',Html::encode('Цена:'.$objav->price)." руб."."
                 </div>
              </div>
              <div class='row' style='margin-bottom: 5%'>
                <div class='col-lg-7'>
                    ". nl2br(Html::encode($objav->description)) ."
                </div>
                <div class='col-lg-5'>
                    <img src='$objav->photo' style='max-width: 100%;max-height: 100%'>
                </div>
            </div> ");
    }
    function echoobj($objav){

    }
    function echoobjavs($objavs){
        foreach ($objavs as $objav) echoobjav($objav);
    }

    ?>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php  $objavs = $dataProvider->getModels();
    echo "<div class='container-fluid'>".
    echoobjavs($objavs)."</div>"?>


</div>
