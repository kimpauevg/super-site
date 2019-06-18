<?php

use yii\db\Migration;

/**
 * Handles adding status to table `{{%objav}}`.
 */
class m190610_134254_add_status_column_to_objav_table extends Migration
{
    public function up(){
        $this->addColumn('{{%objav}}','status',$this->boolean()->defaultValue(true));
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
