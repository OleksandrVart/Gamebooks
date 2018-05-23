<?php

use yii\db\Migration;

/**
 * Handles the creation of table `book`.
 */
class m180428_092306_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('book', [
            'id' => $this->primaryKey(),
            'tittle' => $this->string(128)->notNull()->unique(),
            'cover' => $this->string(128)->notNull(),
            'author' => $this->string(128),
            'annotation' => $this->text(),
            'min_dice' => $this->integer(),
            'max_dice' => $this->integer(),
            'game_model' => $this->string(128)->notNull(),
            'hiden' => $this->boolean()->notNull()->defaultValue('1'),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('fk_book_user_created_by', 'book', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_book_user_updated_by', 'book', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('book');
        $this->dropForeignKey( 'fk_book_user_created_by', 'book');
        $this->dropForeignKey( 'fk_book_user_updated_by', 'book');
    }
}
