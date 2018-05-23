<?php

use yii\db\Migration;

/**
 * Handles the creation of table `paragraph`.
 */
class m180428_190202_create_paragraph_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('paragraph', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'number' => $this->integer()->notNull(),
            'type' => $this->string(15),
            'text' => $this->text(),
        ]);

        $this->addForeignKey('fk_paragraph_book', 'paragraph', 'book_id', 'book', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('paragraph');
        $this->dropForeignKey( 'fk_paragraph_book', 'paragraph');
    }
}
