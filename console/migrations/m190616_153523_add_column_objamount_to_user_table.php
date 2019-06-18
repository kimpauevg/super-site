<?php

use yii\db\Migration;

/**
 * Class m190616_153523_add_column_objamount_to_user_table
 */
class m190616_153523_add_column_objamount_to_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}','objamount',$this->integer()->defaultValue(0));
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
        echo "m190616_153523_add_column_objamount_to_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190616_153523_add_column_objamount_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
