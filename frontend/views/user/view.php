<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = "Личный кабинет";
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if($model->id == Yii::$app->user->id) echo Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']); ?>
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
    $model->phone = "+7". $model->phone;
    ?>

    <p><h1> <?php echo "<img src =". $model->avatar." width:240px;height:320px;>" ?></h1></p>

    <?= DetailView::widget([

        'model' => $model,
        'attributes' => [
            [   'label' => 'Имя',
                'attribute' => 'name'
            ],

            'email:email',
            [   'label' => 'Дата регистрации',
                'attribute' => 'created_at'
            ],


            [   'label' => 'О себе',
                'attribute' => 'o_sebe'
            ],
            [   'label' => 'Телефон',
                'attribute' => 'phone'
            ],
            [   'label'=>'Количество объявлений',
                'attribute'=>'objamount'
            ]

        ],
    ]) ?>

</div>