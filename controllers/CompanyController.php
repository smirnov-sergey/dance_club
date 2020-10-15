<?php

namespace app\controllers;

use Yii;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;
use app\models\Company;

class CompanyController extends AppController
{
    public function actionIndex()
    {
        $company = new Company();
        $companies = $company->findCompanies();

        return $this->render('index', [
            'companies' => $companies
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $company = $this->findModel($id);

        return $this->render('view', [
            'company' => $company
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $company = new Company();

        if ($company->load(Yii::$app->request->post()) && $company->validate()) {
            if ($company->save()) {
                return $this->redirect(['company/index']);
            }
        }

        return $this->render('add', ['company' => $company]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $company = $this->findModel($id);

        if ($company->load(Yii::$app->request->post()) && $company->validate()) {
            if ($company->save()) {
                return $this->redirect(['company/index']);
            }
        }

        return $this->render('update', [
            'company' => $company
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws StaleObjectException
     * @throws \Throwable
     */
    public function actionDelete($id)
    {
        $company = $this->findModel($id);
        $company->delete();

        return $this->redirect(['company/index']);
    }

    protected function findModel($id)
    {
        $company = Company::findOne($id);
        if ($company !== null) {
            return $company;
        }

        throw new NotFoundHttpException('Данной группы не существует');
    }

    /**
     * @param $search
     * @return string
     */
    public function actionSearch($search)
    {
        $companies = Company::find()
            ->where(['like', 'name', $search])
            ->all();

        return $this->render('search', [
            'search' => $search, 'companies' => $companies
        ]);
    }
}