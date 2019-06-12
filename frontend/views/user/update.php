<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */
if(Yii::$app->user->id != $model->id||Yii::$app->user->isGuest){
    echo Yii::$app->session->setFlash('error', 'Нельзя редактировать чужие аккаунты.');
    Yii::$app->response->redirect("index.php");

}
else echo Yii::$app->user->id . "=".$model->id;
$this->title = 'Update User: ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
if(Yii::$app->user->id != $model->id){
    Yii::$app->session->setFlash('failure','Ай-яй-яй');
}
else $this->title= Yii::$app->user->id . "=".$model->id;
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
