<?php

use yii\db\Migration;

/**
 * Handles the creation of table `save`.
 */
class m180428_183932_create_save_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('save', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'current_paragraph' => $this->integer(),
            'feature1' => $this->integer(),
            'feature2' => $this->integer(),
            'feature3' => $this->integer(),
            'feature4' => $this->integer(),
            'feature5' => $this->integer(),
            'feature6' => $this->integer(),
            'items' => $this->string(),
            'damage' => $this->integer()
        ]);

        $this->addForeignKey('fk_save_book', 'save', 'book_id', 'book', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_save_user', 'save', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('save');
        $this->dropForeignKey( 'fk_save_book', 'save');
        $this->dropForeignKey( 'fk_save_user', 'save');
    }
}
