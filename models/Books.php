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
    public $authors = [];
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
            [['authors'], 'safe'],
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

    public function fields()
    {
        return [
            'id',
            'title',
            'author_id',
            'author_name' => 'authorName',
            'author_country' => 'authorCountry',
            'author_birth' => 'authorBirth',
            'pages',
            'language',
            'genre',
        ];
    }

    public function getAuthorName()
    {
        return $this->author->name;
    }

    public function getAuthorCountry()
    {
        return $this->author->country;
    }

    public function getAuthorBirth()
    {
        return $this->author->birth_year;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::class, ['id' => 'author_id']);
    }

}
