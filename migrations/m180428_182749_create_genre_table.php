<?php

use yii\db\Migration;

/**
 * Handles the creation of table `genre`.
 */
class m180428_182749_create_genre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('genre', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull()->unique()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('genre');
    }
}
