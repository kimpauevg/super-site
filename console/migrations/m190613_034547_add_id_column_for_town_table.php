<?php

use yii\db\Migration;

/**
 * Class m190613_034547_add_id_column_for_town_table
 */
class m190613_034547_add_id_column_for_town_table extends Migration
{
    public function up(){
        $this->addColumn('{{%town}}','id',$this->primaryKey());
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
        echo "m190613_034547_add_id_column_for_town_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190613_034547_add_id_column_for_town_table cannot be reverted.\n";

        return false;
    }
    */
}
