<?php

use common\models\Town;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<?php   $cities= Town::find()->all();
$items = \yii\helpers\ArrayHelper::map($cities,'name','name');
$city = $model->hometown;
$params = [];
if($city==null){
    $params = [
        'prompt' => 'Выберите город...'

    ];}


?>

<div class="user-form">


    <?php $form = ActiveForm::begin(); ?>

    <!--?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?-->

    <!--?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?!-->

    <!--?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?-->

    <!--?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?-->

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <!--= $form->field($model, 'created_at')->textInput() -->

    <!--= $form->field($model, 'updated_at')->textInput() -->

    <!--?= $form->field($model, 'verification_token')->textInput(['maxlength' => true]) ?-->

    <?= $form->field($model, 'o_sebe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hometown')->dropDownList($items,$params,$city) ?>

    <?= $form->field($model, 'avatar')->fileInput() ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
