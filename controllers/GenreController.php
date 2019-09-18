<?php
namespace app\controllers;

use app\models\Genre;
use Yii;
use yii\web\NotFoundHttpException;

class GenreController extends AppController
{
    public function actionIndex()
    {
        $genres = Genre::find()->all();

        return $this->render('index', compact('genres'));
    }

    public function actionView($id)
    {
        $genre = $this->findModel($id);

        return $this->render('view', compact('genre'));
    }

    public function actionAdd()
    {
        $genre = new Genre();

        if ($genre->load(Yii::$app->request->post()) && $genre->validate()) {
            if ($genre->save()) {
                return $this->redirect(['genre/index']);
            }
        }

        return $this->render('add', compact('genre'));
    }

    public function actionUpdate($id)
    {
        $genre = $this->findModel($id);

        if ($genre->load(Yii::$app->request->post()) && $genre->validate()) {
            if ($genre->save()) {
                return $this->redirect(['genre/index']);
            }
        }

        return $this->render('update', compact('genre'));
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['genre/index']);
    }

    //поиск записи в таблице
    protected function findModel($id)
    {
        if (($genre = Genre::findOne($id)) !== null) {
            return $genre;
        } else {
            throw new NotFoundHttpException('Данного жанра не существует');
        }
    }

    // поиск по имени трека
    public function actionSearch($search)
    {
        if (!$search)
            return $this->render('search');

        $genres = Genre::find()->where(['like', 'name', $search])->all();

        return $this->render('search', compact('genres', 'search'));
    }
}