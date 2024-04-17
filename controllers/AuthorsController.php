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

/**
 * @SWG\Get (path="/authors",
 *     tags={"Authors"},
 *     summary="Get authors",
 *     @SWG\Parameter(
 *         name="page",
 *         in="query",
 *         description="number of page",
 *         required=false,
 *         type="integer",
 *     ),
 *     @SWG\Parameter(
 *         name="sort",
 *         in="query",
 *         description="order by column",
 *         required=false,
 *         type="string",
 *     ),
 *     @SWG\Response(
 *         response = 200,
 *         description="Successfull"
 *     ),
 * )
 * @SWG\Get (path="/authors/{id}",
 *     tags={"Authors"},
 *     summary="Get author by ID",
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
 * @SWG\Post (path="/authors",
 *     tags={"Authors"},
 *     summary="Create new author",
 *      @SWG\Parameter(
 *         name="body",
 *         in="body",
 *         description="author data",
 *         required=true,
 *         @SWG\Schema(
 *              @SWG\Property(property="name", type="string", example="Юрий Гагарин"),
 *              @SWG\Property(property="country", type="string", example="Россия"),
 *              @SWG\Property(property="birth_year", type="integer", example=1961),
 *         )
 *     ),
 *     @SWG\Response(
 *         response="201",
 *         description="Created"
 *     ),
 *     @SWG\Response(
 *         response="400",
 *         description="Bad request"
 *     )
 * )
 */
