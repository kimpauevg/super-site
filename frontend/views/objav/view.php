<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Objav */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Objavs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="objav-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <p><h1> <?php echo "<img src =". $model->photo.">" ?></h1></p>
    <?php $model->price = $model->price . 'руб'?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [   'label' => 'Заголовок',
                'attribute' => 'headline'
            ],
            [   'label' => 'Описание',
                'attribute' => 'description'
            ],
            [   'label' => 'Цена',
                'attribute' => 'price'
            ],
            [   'label' => 'Категория',
                'attribute' => 'category'
            ],
            [   'label' => 'Город',
                'attribute' => 'town'
            ],
            [   'label' => 'Дата создания',
                'attribute' => 'created_at'
            ],

        ],
    ]) ?>
    <?php $person = User::findOne([$model->owner_id]);
    $person->phone = '+7'.$person->phone;
    $created_at = (string)(date('d.m.Y',$person ->created_at));
    $person->created_at = $created_at;
    ?>
    <p> Создал объявление:</p>
    <?= DetailView::widget([
        'model' => $person,
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

        ]


    ])?>

</div>