<?php

namespace app\controllers;

use app\models\Organization;

class OrganizationController extends AppController
{
    public function actionIndex()
    {
        $organizations = Organization::find()->all();

        return $this->render('index', compact('organizations'));
    }

    public function actionSearch($search)
    {
        if (!$search)
            return $this->render('search');

        $organization = Organization::find()->where(['like', 'name', $search])->all();

        return $this->render('search', compact('organization', 'search'));
    }
}
