<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "objav".
 *
 * @property int $id
 * @property string $headline
 * @property string $description
 * @property int $price
 * @property string $category
 * @property string $town
 * @property string $created_at
 * @property int $owner_id
 * @property string $photo
 */
class Objav extends \yii\db\ActiveRecord
{
    public $upload;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'objav';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['headline', 'description', 'price', 'category', 'town', 'owner_id'], 'required'],
            [['price', 'owner_id'], 'default', 'value' => null],
            [['price', 'owner_id'], 'integer'],
            [['headline', 'description', 'category', 'town', 'created_at', 'photo'], 'string', 'max' => 255],
            [['upload'], 'image', 'extensions' => ['png','jpg','jpeg'],'message'=>"Неверный формат файла. Выберите фотографию формата jpg, jpeg, png."],
            [['upload'],'image','maxSize'=>10*1024*1024,'message'=>'Максимальный размер фотографии 10 Мб.'],
            [['upload'],'image','maxFiles'=>1,'message'=>'Вы можете загрузить не более 1 фотографии'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'headline' => 'Headline',
            'description' => 'Description',
            'price' => 'Price',
            'category' => 'Category',
            'town' => 'Town',
            'created_at' => 'Created At',
            'owner_id' => 'Owner ID',
            'photo' => 'Photo',
        ];
    }
}
