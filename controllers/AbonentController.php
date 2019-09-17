<?php

namespace app\controllers;

use app\models\Abonent;
use app\models\Individual;
use app\models\Organization;
use Yii;
use yii\web\NotFoundHttpException;

class AbonentController extends AppController
{
    public function actionIndex()
    {
        $abonents = Abonent::find()->all();

        return $this->render('index', compact('abonents'));
    }

    public function actionView($id)
    {
        $abonent = $this->findModel($id);
        $organization = Organization::find()->where(['id' => $abonent->organization_id])->with(['abonent'])->all();
        $individual = Individual::find()->where(['id' => $abonent->individual_id])->with(['abonent'])->all();

        return $this->render('view', compact('abonent', 'organization', 'individual'));
    }

    public function actionAdd()
    {
        $abonent = new Abonent();

        if ($abonent->load(Yii::$app->request->post()) && $abonent->validate()) {
            if ($abonent->save()) {
                return $this->redirect(['abonent/index']);
            }
        }
        return $this->render('add', compact('abonent'));
    }

    public function actionUpdate($id)
    {
        $abonent = $this->findModel($id);

        if ($abonent->load(Yii::$app->request->post()) && $abonent->validate()) {
            if ($abonent->save()) {
                return $this->redirect(['abonent/index']);
            }
        }

        return $this->render('update', compact('article'));
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['abonent/index']);
    }

    //поиск записи в таблице
    protected function findModel($id)
    {
        if (($abonent = Abonent::findOne($id)) !== null) {
            return $abonent;
        } else {
            throw new NotFoundHttpException('Данной организации не существует');
        }
    }

    // поиск по названию организации/ИП
    public function actionSearch($search)
    {
        // $search = trim(Yii::$app->request->get('search'));
        if (!$search)
            return $this->render('search');

        $abonent = Abonent::find()->where(['like', 'name', $search])->with(['organization', 'individual'])->all();

        return $this->render('search', compact('abonent', 'search'));
    }
}
