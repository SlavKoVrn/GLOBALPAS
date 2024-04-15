<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property int|null $author_id
 * @property int|null $pages
 * @property string|null $title
 * @property string|null $language
 * @property string|null $genre
 * @property string|null $description
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'pages'], 'integer'],
            [['description'], 'string'],
            [['title', 'language', 'genre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'pages' => 'Pages',
            'title' => 'Title',
            'language' => 'Language',
            'genre' => 'Genre',
            'description' => 'Description',
        ];
    }
}
