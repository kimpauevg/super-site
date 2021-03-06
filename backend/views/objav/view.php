<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Objav */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Objavs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="objav-view">

    <h1><?= Html::encode($this->title) ?></h1>





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
                'attribute' => 'price',
                'value' => function($model){
                    return $model->price . " руб.";
                },
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