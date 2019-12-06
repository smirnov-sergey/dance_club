<?php
/**
 * Created by PhpStorm.
 * User: sergei-sm
 * Date: 17.09.2019
 * Time: 16:22
 */

namespace app\controllers;

use app\models\Visitor;
use app\models\VisitorGenre;
use app\models\Genre;
use Yii;
use yii\web\NotFoundHttpException;

class VisitorController extends AppController
{
    public function actionIndex()
    {
        $visitor = new Visitor();
        $visitors = $visitor->findVisitors();

        return $this->render('index', compact('visitors'));
    }

    public function actionView($id)
    {
        $visitor = $this->findModel($id);

        return $this->render('view', compact('visitor'));
    }

    public function actionAdd()
    {
        $visitor = new Visitor();

        //TODO: сделать выбор нескольких жанров музыки.
        if ($visitor->load(Yii::$app->request->post()) && $visitor->validate()) {
            if ($visitor->save()) {
                //TODO Рефакторинг
                $visitorGenre = new VisitorGenre();
                $visitorGenre->visitor_id = $visitor->id;
                $visitorGenre->genre_id = Yii::$app->request->post()['Visitor']['genre'];
                $visitorGenre->save();

                return $this->redirect(['visitor/index']);
            }
        }

        return $this->render('add', compact('visitor'));
    }

    public function actionUpdate($id)
    {
        $visitor = $this->findModel($id);

        //TODO: При изменение старые жанры музыки удаляются, новые сохраняются
        if ($visitor->load(Yii::$app->request->post()) && $visitor->validate()) {
            if ($visitor->save()) {
                $visitorGenre = new VisitorGenre();
                $visitorGenre->visitor_id = $visitor->id;
                $visitorGenre->genre_id = Yii::$app->request->post()['Visitor']['genre'];

                $visitorGenre->save();

                return $this->redirect(['visitor/index']);
            }
        }

        return $this->render('update', compact('visitor'));
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['visitor/index']);
    }

    //поиск записи в таблице
    protected function findModel($id)
    {
        if (($visitor = Visitor::findOne($id)) !== null) {
            return $visitor;
        } else {
            throw new NotFoundHttpException('Данного посетителя не существует');
        }
    }

    // поиск по имени посетителя
    public function actionSearch($search)
    {
        if (!$search)
            return $this->render('search');

        $visitors = Visitor::find()->where(['like', 'name', $search])->all();

        return $this->render('search', compact('visitors', 'search'));
    }
}