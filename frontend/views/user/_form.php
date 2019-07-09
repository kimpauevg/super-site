<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Town;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <?php   $cities= Town::find()->all();
    $items = \yii\helpers\ArrayHelper::map($cities,'name','name');
    $city = $model->hometown;
    $params = [];
    if($city==null){
    $params = [
        'prompt' => 'Выберите город...'

    ];}


    ?>
    <p><h1> <?php if ($model->avatar!=null) echo "<img src =". $model->avatar." width:240px;height:320px;>" ?></h1></p>


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <!--= $form->field($model, 'email')->textInput(['maxlength' => true]) ?-->


    <?= $form->field($model, 'o_sebe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'hometown')->dropDownList($items,$params,$city) ?>

    <?= $form->field($model, 'upload')->fileInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
