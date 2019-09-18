<?php
namespace app\controllers;

use app\models\Company;
use app\models\Visitor;
use Yii;
use yii\web\NotFoundHttpException;

class CompanyController extends AppController
{
    public function actionIndex()
    {
        $companies = Company::find()->all();

        return $this->render('index', compact('companies'));
    }

    public function actionView($id)
    {
        $company = $this->findModel($id);

        return $this->render('view', compact('company'));
    }

    public function actionAdd()
    {
        $company = new Company();

        if ($company->load(Yii::$app->request->post()) && $company->validate()) {
            if ($company->save()) {
                return $this->redirect(['company/index']);
            }
        }

        return $this->render('add', compact('company'));
    }

    public function actionUpdate($id)
    {
        $company = $this->findModel($id);

        if ($company->load(Yii::$app->request->post()) && $company->validate()) {
            if ($company->save()) {
                return $this->redirect(['company/index']);
            }
        }

        return $this->render('update', compact('company'));
    }

    public function actionDelete($id)
    {
//        $visitor = new Visitor();

        $this->findModel($id)->delete();

        return $this->redirect(['company/index']);
    }

    //поиск записи в таблице
    protected function findModel($id)
    {
        if (($company = Company::findOne($id)) !== null) {
            return $company;
        } else {
            throw new NotFoundHttpException('Данной группы не существует');
        }
    }

    // поиск по имени трека
    public function actionSearch($search)
    {
        if (!$search)
            return $this->render('search');

        $companies = Company::find()->where(['like', 'name', $search])->all();

        return $this->render('search', compact('companies', 'search'));
    }
}