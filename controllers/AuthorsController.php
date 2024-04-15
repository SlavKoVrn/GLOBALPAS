<?php

namespace app\controllers;

use app\models\Authors;

use yii\data\ActiveDataProvider;

class AuthorsController extends Base
{
    public $modelClass = Authors::class;

    public function actions()
    {
        $actions = parent::actions();

        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Authors::find(),
        ]);

        return $dataProvider;
    }

}
