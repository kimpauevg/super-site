<?php

use app\models\Town;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Objav */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objav-form">

    <?php $form = ActiveForm::begin();
    $params_cat = [
        'prompt' => 'Выберите Категорию...'
    ];
    $item = $model->category;
    $items = [
         'Недвижимость'=>'Недвижимость',
        'Транспорт'=>'Транспорт',
        'Личные вещи'=>'Личные вещи',
        'Хобби и отдых'=>'Хобби и отдых',
        'Услуги'=>'Услуги',
        'Бытовая техника'=>'Бытовая техника',
    ];
    ?>
    <?php
    $cities= Town::find()->all();
    $cities = \yii\helpers\ArrayHelper::getColumn($cities,'name');

    $params_city = [
        //'prompt' => 'Выберите город...'
    ];
    $person = User::findOne(Yii::$app->user->id);
    $city = $person->hometown;

    ?>


    <?= $form->field($model, 'headline')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'category')->dropDownList($items,$params_cat,$item)?>

    <?= $form->field($model, 'town')->dropDownList($cities,$params_city,$city)?>

    <!--?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?-->

    <!--?= $form->field($model, 'owner_id')->textInput() ?-->

    <?= $form->field($model, 'upload')->fileInput() ?>

    <form name="file-form" action="index.php">

        <input type="file" name="upload" id="file-input"/>

        <button onclick="$('#file-input').val('');return false;">Clear file input</button>

    </form>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
