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
 */
