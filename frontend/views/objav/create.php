<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Objav */
if(Yii::$app->user->isGuest) return Yii::$app->response->redirect("/signup.php");
$person = \app\models\User::findOne(Yii::$app->user->id);
if($person->hometown==null||$person->phone==null||$person->name==null) Yii::$app->response->redirect("?r=user/update&id=".$person->id);
$this->title = 'Create Objav';
$this->params['breadcrumbs'][] = ['label' => 'Objavs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objav-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
