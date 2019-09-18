<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Жанры';
?>

<title><?= Html::encode($this->title) ?></title>

<form method="get" action="<?= Url::to(['genre/search']) ?>" class="navbar-form">
    <input type="text" placeholder="Поиск..." name="search" class="form-control">
    <button type="submit" class="btn btn-default">Найти</button>
</form>

<div class="table-responsive">
    <h3 class="text-center">Жанры</h3>

    <table class="table">
        <thead class="thead-default">
        <tr>
            <th class="col-md-2">Название жанра</th>
            <th class="col-md-2">Действия</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($genres as $genre): ?>
            <tr>
                <td><?= $genre->name; ?></td>
                <td>
                    <a href="<?= Url::to(['genre/view', 'id' => $genre->id]); ?>"><?= Html::submitButton('Посмотреть', ['class' => 'btn btn-info']); ?></a>
                    <a href="<?= Url::to(['genre/update', 'id' => $genre->id]); ?>"><?= Html::submitButton('Изменить', ['class' => 'btn btn-warning']); ?></a>
                    <a href="<?= Url::to(['genre/delete', 'id' => $genre->id]); ?>"
                       onclick="return confirm('Вы действительно хотите удалить этот жанр?')"><?= Html::submitButton('Удалить', ['class' => 'btn btn-danger']); ?>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <a href="<?= Url::to(['genre/add']); ?>"> <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']); ?></a>
</div>