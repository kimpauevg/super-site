<?php

use yii\db\Migration;

/**
 * Class m190609_032821_modify_name_column_to_user_table
 */
class m190609_032821_modify_name_column_to_user_table extends Migration
{
    public function up()
    {
        $this->alterColumn('{{%user}}','name',$this->string());
    }
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190609_032821_modify_name_column_to_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190609_032821_modify_name_column_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
