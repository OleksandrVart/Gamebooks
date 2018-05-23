<?php

use yii\db\Migration;

/**
 * Handles the creation of table `book_genre`.
 */
class m180428_182859_create_book_genre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('book_genre', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'genre_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('fk_book_genre_book', 'book_genre', 'book_id', 'book', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_book_genre_genre', 'book_genre', 'genre_id', 'genre', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('book_genre');
        $this->dropForeignKey( 'fk_book_genre_book', 'book_genre');
        $this->dropForeignKey( 'fk_book_genre_genre', 'book_genre');
    }
}
