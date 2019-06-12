<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $verification_token
 * @property string $o_sebe
 * @property string $phone
 * @property string $name
 * @property string $hometown
 * @property string $avatar
 */
class User extends \yii\db\ActiveRecord
{
    public $upload;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['name'],'required','message'=>'Заполните имя'],
            ['phone','required','message'=>'Укажите свой мобильный телефон'],
            ['hometown','required','message'=>'Укажите свой город'],
            [['status', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token', 'o_sebe', 'name', 'hometown', 'avatar'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['phone'], 'string','min'=>10 ,'max' => 10,'message'=>'Не валидный телефон'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['username'], 'unique'],
            [['upload'], 'image', 'extensions' => ['png','jpg','jpeg'],'message'=>"Неверный формат файла. Выберите фотографию формата jpg, jpeg, png."],
            [['upload'],'image','maxSize'=>3*1024*1024,'message'=>'Слишком тяжелый файл. Выберите аватарку до 3 Мб.'],
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
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Зарегистрирован',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'o_sebe' => 'О себе',
            'phone' => 'Телефон',
            'name' => 'Name',
            'hometown' => 'Город',
            'avatar' => 'Avatar',
        ];
    }
}
