<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Objav */

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
