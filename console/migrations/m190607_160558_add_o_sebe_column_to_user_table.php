<?php

use yii\db\Migration;

/**
 * Handles adding o_sebe to table `{{%user}}`.
 */
class m190607_160558_add_o_sebe_column_to_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'o_sebe', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}', 'phone', $this->string(12)->defaultValue(null));
    }
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {git
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
