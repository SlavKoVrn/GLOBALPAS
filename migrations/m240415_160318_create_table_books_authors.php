<?php

use yii\db\Migration;

/**
 * Class m240415_160318_create_table_books_authors
 */
class m240415_160318_create_table_books_authors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $collation = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $collation = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey()->notNull(),
            'author_id' => $this->integer(),
            'pages' => $this->integer(),
            'title' => $this->string(),
            'language' => $this->string(),
            'genre' => $this->string(),
            'description' => $this->text(),
        ], $collation);

        $this->createIndex('idx-books-author_id', '{{%books}}', 'author_id');

        $this->createTable('{{%authors}}', [
            'id' => $this->primaryKey()->notNull(),
            'birth_year' => $this->integer(),
            'name' => $this->string(),
            'country' => $this->string(),
        ], $collation);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-books-author_id', '{{%books}}');

        $this->dropTable('{{%books}}');

        $this->dropTable('{{%authors}}');
    }

}
