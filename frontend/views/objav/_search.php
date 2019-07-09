<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \yii\helpers\ArrayHelper;
use common\models\Town;

/* @var $this yii\web\View */
/* @var $model common\models\ObjavSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<?php
$cities = Town::find()->all();
    //->select(['name','id'])
    //->indexBy('id')
    //->column();

$cities = ArrayHelper::map($cities, 'name','name');

?>


<div class="objav-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout'=>'inline',



    ]); ?>

    <!-- $form->field($model, 'id') -->



    <!--?= $form->field($model, 'description') ?-->

    <!--?= $form->field($model, 'price')-> ?-->

    <?= $form->field($model, 'category')->dropDownList([
            'Недвижимость'=>'Недвижимость',
        'Транспорт'=>'Транспорт',
        'Личные вещи'=>'Личные вещи',
        'Хобби и отдых'=>'Хобби и отдых',
        'Услуги'=>'Услуги',
        'Бытовая техника'=>'Бытовая техника',
        ],
        ['prompt'=>'Выберите категорию'])?>

    <?= $form->field($model, 'town')->dropDownList($cities, ['prompt'=>"Выберите город..."]) ?>
    <?= $form->field($model, 'headline') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'owner_id') ?>
    <?php // echo $form->field($model, 'photo') ?>



    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <!--?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?-->
    </div>

    <?php ActiveForm::end(); ?>

</div>
