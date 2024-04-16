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

/**
 * @SWG\Get (path="/books",
 *     tags={"Books"},
 *     summary="Get books",
 *     @SWG\Response(
 *         response = 200,
 *         description="Successfull"
 *     ),
 * )
 * @SWG\Get (path="/books/{id}",
 *     tags={"Books"},
 *     summary="Get book by ID",
 *      @SWG\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID",
 *         required=true,
 *         type="integer",
 *     ),
 *     @SWG\Response(
 *         response = 200,
 *         description="Successfull"
 *     ),
 *     @SWG\Response(
 *         response="404",
 *         description="Not found"
 *     )
 * )
 */
