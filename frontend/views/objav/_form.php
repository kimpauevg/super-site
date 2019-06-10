<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Objav */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objav-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'headline')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'town')->textInput(['maxlength' => true]) ?>

    <!--?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?-->

    <!--?= $form->field($model, 'owner_id')->textInput() ?-->

    <?= $form->field($model, 'upload')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
