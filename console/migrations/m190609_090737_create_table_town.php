<?php

use yii\db\Migration;

/**
 * Class m190609_090737_create_table_city
 */
class m190609_090737_create_table_town extends Migration
{
    public function up()
    {
        $this->createTable('{{%town}}',['name'=>$this->string()->notNull()]);
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
        echo "m190609_090737_create_table_city cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190609_090737_create_table_city cannot be reverted.\n";

        return false;
    }
    */
}
