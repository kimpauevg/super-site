<?php

use yii\db\Migration;

/**
 * Handles adding name to table `{{%user}}`.
 */
class m190609_031706_add_name_column_to_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}','name',$this->string()->notNull());
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
