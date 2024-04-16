<?php

namespace app\controllers;

use app\models\Books;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\ActiveDataFilter;

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
        $searchModel = new Books();

        $filter = new ActiveDataFilter([
            'searchModel' => $searchModel,
            'filterAttributeName' => 'search',
        ]);
        $filter->conditionBuilders['title'] = function ($operator, $condition) {
            return ['LIKE', $operator, $condition];
        };
        $filter->conditionBuilders['description'] = function ($operator, $condition) {
            return ['LIKE', $operator, $condition];
        };
        $filter->conditionBuilders['authors'] = function ($operator, $condition) {
            if (is_array($condition)) {
                return ['IN', 'author_id', $condition];
            }
            return null;
        };
        $filter->load(Yii::$app->request->queryParams);

        $query = Books::find();
        if ($filterConditions = $filter->build()) {
            $query->andFilterWhere($filterConditions);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }

}

/**
 * @SWG\Get (path="/books",
 *     tags={"Books"},
 *     summary="Get books",
 *      @SWG\Parameter(
 *         name="search[title]",
 *         in="query",
 *         description="title substring",
 *         type="string",
 *         required=false,
 *     ),
 *      @SWG\Parameter(
 *         name="search[description]",
 *         in="query",
 *         description="description substring",
 *         type="string",
 *         required=false,
 *     ),
 *     @SWG\Parameter(
 *         name="search[authors][]",
 *         in="query",
 *         description="Filter books by author IDs",
 *         required=false,
 *         type="array",
 *         @SWG\Items(type="integer"),
 *         collectionFormat="multi"
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
 * @SWG\Post (path="/books",
 *     tags={"Books"},
 *     summary="Create new book",
 *      @SWG\Parameter(
 *         name="body",
 *         in="body",
 *         description="book data",
 *         required=true,
 *         @SWG\Schema(
 *              @SWG\Property(property="title", type="string", example="Название книги"),
 *              @SWG\Property(property="author_id", type="integer", example=1),
 *              @SWG\Property(property="pages", type="integer", example=300),
 *              @SWG\Property(property="language", type="string", example="русский"),
 *              @SWG\Property(property="genre", type="string", example="роман"),
 *              @SWG\Property(property="description", type="string", example="Описание книги"),
 *         )
 *     ),
 *     @SWG\Response(
 *         response="201",
 *         description="Created"
 *     ),
 * )
 */
