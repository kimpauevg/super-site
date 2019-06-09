<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <!--?php= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
              'confirm' => 'Are you sure you want to delete this item?',
             'method' => 'post',
            ],
        ]) */-->
    </p>
    <?php $created_at = date('d.m.Y',$model->created_at);
        $model->created_at = $created_at;
        $model->phone = "+7". $model->phone;?>

    <?= DetailView::widget([

        'model' => $model,
        'attributes' => [
            'name',
            'email:email',

            'created_at'  ,


            'o_sebe',
            'phone',

        ],
    ]) ?>

</div>
