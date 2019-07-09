<?php


namespace console\controllers;


use yii\console\Controller;
use yii\console\controllers\MigrateController;
use yii\db\Migration;

class DbmanageController extends Controller
{
    public function actionDelete(){
        $wow = new Migration;
        $wow->delete('{{%objav}}');
    }
    public function actionFixav(){
        $wow = new Migration();
        $wow->renameColumn('{{%user}}','avatars','avatar');
    }


}