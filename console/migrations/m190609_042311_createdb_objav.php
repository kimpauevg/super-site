<?php

use yii\db\Migration;

/**
 * Class m190609_042311_createdb_objav
 */
class m190609_042311_createdb_objav extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable("{{%objav}}", [
            'id'=>$this->primaryKey(),
            'headline'=>$this->string()->notNull(),
            'description'=>$this->string()->notNull(),
            'price'=>$this->integer()->notNull(),
            'category'=>$this->string()->notNull(),
            'town'=>$this->string()->notNull(),
            'created_at'=>$this->string(),
            'owner_id'=>$this->integer()->notNull()
            ]);
    }

    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190609_042311_createdb_objav cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190609_042311_createdb_objav cannot be reverted.\n";

        return false;
    }
    */
}
