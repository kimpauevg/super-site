<?php

use yii\db\Migration;

/**
 * Class m190610_104858_add_image_column_to_objav_and_user
 */
class m190610_104858_add_image_column_to_objav_and_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}','avatar',$this->string());
        $this->addColumn('{{%objav}}','photo',$this->string());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190610_104858_add_image_column_to_objav_and_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190610_104858_add_image_column_to_objav_and_user cannot be reverted.\n";

        return false;
    }
    */
}
