<?php


namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $typeofupload;

    public function rules()
    {
        return [
            [['imageFile'], 'image', 'extensions' => ['png','jpg','jpeg'],'message'=>"Неверный формат файла. Выберите фотографию формата jpg, jpeg, png."],
            [['imageFile'],'image','maxSize'=>10*1024*1024,'message'=>'Максимальный размер фотографии 10 Мб.'],
            [['imageFile'],'image','maxFiles'=>1,'message'=>'Вы можете загрузить не более 1 фотографии'],
        ];
    }

   public function upload()
    {
        if ($this->validate()) {

                $this->imageFile->saveAs('uploads/' .'avatar/'. Yii::$app->user->id . '.' . $this->imageFile->extension);
                return true;

            }

        /*  if ($this->typeofupload == 2) {
                $this->uploadObjav();
                return true;
            }
            else {
                $this->imageFile->saveAs('uploads/' .$this->typeofupload . 'x.' . $this->imageFile->extension);

                return true;
            }

        }
        else {
            return false;
        }*/
    }
    public function uploadAvatar()
    {
            $this->imageFile->saveAs('uploads/' .'avatar/'. Yii::$app->user->id . '.' . $this->imageFile->extension);
            return true;
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