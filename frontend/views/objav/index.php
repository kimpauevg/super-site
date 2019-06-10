<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjavSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Objavs';
$this->params['breadcrumbs'][] = $this->title;
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
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'headline',
            //'description',
            'price',
            'category',
            'town',

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
