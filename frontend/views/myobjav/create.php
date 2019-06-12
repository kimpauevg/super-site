<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Myobjav */

$this->title = 'Create Myobjav';
$this->params['breadcrumbs'][] = ['label' => 'Myobjavs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="myobjav-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
