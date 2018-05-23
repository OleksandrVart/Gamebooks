<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180428_091912_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string(128)->notNull()->unique(),
            'password' => $this->string(128)->notNull(),
            'email' => $this->string(128)->notNull(),
            'role' => $this->string(128)->notNull()->defaultValue('user')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('user');
    }
}
