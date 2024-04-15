<?php

namespace app\controllers;

use app\models\Books;

use yii\data\ActiveDataProvider;

class BooksController extends Base
{
    public $modelClass = Books::class;

    public function actions()
    {
        $actions = parent::actions();

        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Books::find(),
        ]);

        return $dataProvider;
    }

}
