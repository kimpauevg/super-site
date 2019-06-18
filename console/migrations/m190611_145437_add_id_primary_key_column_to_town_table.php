<?php

use yii\db\Migration;

/**
 * Handles adding id_primary_key to table `{{%town}}`.
 */
class m190611_145437_add_id_primary_key_column_to_town_table extends Migration
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
    }
}
