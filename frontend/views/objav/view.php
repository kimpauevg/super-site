<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Objav */

$this->title = $model->headline;

$this->params['breadcrumbs'][] = ['label' => 'Objavs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<?php function isOwner($model)
{
    if (Yii::$app->user->id==$model->owner_id){
        return true;
    }
    else {
        return false;
    }
}
?>
<div class="objav-view">

    <h1><?= Html::encode($this->title) ?></h1>




    <?php

    ?>
    <div class="container-fluid" style="display: inline-block">
        <div class="col-lg-8">
            <p> <img src ="<?= $model->photo ?>" style="max-width: 100% "></p>

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
                'attribute' => 'created_at',
                'value' => Yii::$app->formatter->asDatetime($model->created_at),
            ],

        ],
    ]) ?></div>


    <?php $person = User::findOne([$model->owner_id]);
    $person->phone = '+7'.$person->phone;
    $created_at = (string)(date('d.m.Y',$person ->created_at));
    $person->created_at = $created_at;
    ?>
    <div class="col-lg-3" style="width :20%; "><div class="card">
     <img class="card-img-top" src="<?= $person->avatar; ?>" style="max-width: 200px; max-height: 200px; border: #0f0f0f;">
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
            [    'label' => 'Кол-во объявлений',
                'attribute'=> 'objamount'
            ]

        ]


    ])?></div>
        </div>

</div>