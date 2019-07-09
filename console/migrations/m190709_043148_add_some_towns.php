<?php

use yii\db\Migration;

/**
 * Class m190709_043148_add_some_towns
 */
class m190709_043148_add_some_towns extends Migration
{
    public function up(){
        $this->insert('{{%town}}',['name'=>'Москва']);
        $this->insert('{{%town}}',['name'=>'Томск']);
        $this->insert('{{%town}}',['name'=>'Санкт-Петерсбург']);


    }
    public function down()
    {
        $this->delete('{{%town}}');
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
        echo "m190709_043148_add_some_towns cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190709_043148_add_some_towns cannot be reverted.\n";

        return false;
    }
    */
}
