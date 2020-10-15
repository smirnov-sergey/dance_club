<?php

namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use app\models\Genre;

class GenreController extends AppController
{
    public function actionIndex()
    {
        $genre = new Genre();
        $genres = $genre->findGenres();

        return $this->render('index', [
            'genres' => $genres
        ]);
    }

    public function actionView($id)
    {
        $genre = $this->findModel($id);

        return $this->render('view', [
            'genre' => $genre
        ]);
    }

    public function actionAdd()
    {
        $genre = new Genre();

        if ($genre->load(Yii::$app->request->post()) && $genre->validate()) {
            if ($genre->save()) {
                return $this->redirect(['genre/index']);
            }
        }

        return $this->render('add', [
            'genre' => $genre
        ]);
    }

    public function actionUpdate($id)
    {
        $genre = $this->findModel($id);

        if ($genre->load(Yii::$app->request->post()) && $genre->validate()) {
            if ($genre->save()) {
                return $this->redirect(['genre/index']);
            }
        }

        return $this->render('update', [
            'genre' => $genre
        ]);
    }

    public function actionDelete($id)
    {
        $genre = $this->findModel($id);
        $genre->delete();

        return $this->redirect(['genre/index']);
    }

    protected function findModel($id)
    {
        $genre = Genre::findOne($id);

        if ($genre !== null) {
            return $genre;
        }

        throw new NotFoundHttpException('Данного жанра не существует');
    }

    /**
     * @param $search
     * @return string
     */
    public function actionSearch($search)
    {
        $genres = Genre::find()
            ->where(['like', 'name', $search])
            ->all();

        return $this->render('search', [
            'search' => $search,
            'genres' => $genres
        ]);
    }
}