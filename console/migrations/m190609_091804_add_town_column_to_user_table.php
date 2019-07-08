<?php

use yii\db\Migration;

/**
 * Handles adding town to table `{{%user}}`.
 */
class m190609_091804_add_town_column_to_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}','hometown',$this->string());
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
