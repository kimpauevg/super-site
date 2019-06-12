<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Town;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <?php   $cities= Town::find()->all();
    $items = \yii\helpers\ArrayHelper::getColumn($cities,'name');

    $params = [
        'prompt' => 'Выберите город...'
    ];
    $city = $model->hometown;

    ?>
    <p><h1> <?php echo "<img src =". $model->avatar." width:240px;height:320px;>" ?></h1></p>


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'o_sebe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hometown')->dropDownList($items,$params,$city) ?>

    <?= $form->field($model, 'upload')->fileInput() ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
