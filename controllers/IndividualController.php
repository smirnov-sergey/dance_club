<?php

namespace app\controllers;

use app\models\Individual;

class IndividualController extends AppController
{
    public function actionIndex()
    {
        $individuals = Individual::find()->all();

        return $this->render('index', compact('individuals'));
    }

    public function actionSearch($search)
    {
        if (!$search)
            return $this->render('search');

        $individual = Individual::find()->where(['like', 'name', $search])->all();

        return $this->render('search', compact('individual', 'search'));
    }
}
