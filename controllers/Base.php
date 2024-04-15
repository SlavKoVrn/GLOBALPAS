<?php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;

class Base extends ActiveController
{
    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['*'],
                'Access-Control-Allow-Credentials' => false,
            ]
        ];

        return $behaviors;
    }

}

