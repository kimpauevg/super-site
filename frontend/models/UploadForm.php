<?php


namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => ['png','jpg','jpeg'],'message'=>"Неверный формат файла. Выберите фотографию формата jpg, jpeg, png."],
            [['imageFile'],'file','skipOnEmpty'=>true,'maxSize'=>10*1024*1024,'message'=>'Максимальный размер фотографии 10 Мб.'],
            [['imageFile'],'file','skipOnEmpty'=>true,'maxFiles'=>1,'message'=>''],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {

            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
    public function uploadAvatar()
    {
        if ($this->validate()) {

            $this->imageFile->saveAs('uploads/' .'avatar/'. Yii::$app->user->id . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
    public function uploadObjav()
    {
        if ($this->validate()) {

            $this->imageFile->saveAs('uploads/' .'objav/'. Yii::$app->user->id . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}