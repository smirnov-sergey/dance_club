<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Треки';
?>

<title><?= Html::encode($this->title) ?></title>

<form method="get" action="<?= Url::to(['track/search']) ?>" class="navbar-form">
    <input type="text" placeholder="Поиск..." name="search" class="form-control">
    <button type="submit" class="btn btn-default">Найти</button>
</form>

<div class="table-responsive">
    <h3 class="text-center">Треки</h3>

    <table class="table">
        <thead class="thead-default">
        <tr>
            <th class="col-md-2">Название</th>
            <th class="col-md-2">Жанр музыки</th>
            <th class="col-md-2">Продолжительность</th>
            <th class="col-md-4">Действия</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($tracks as $track): ?>
            <tr>
                <td><?= $track->name; ?></td>
                <td><?= $track->genre->name; ?></td>
                <td><?= $track->duration; ?> секунд</td>
                <td>
                    <a href="<?= Url::to(['track/view', 'id' => $track->id]); ?>"><?= Html::submitButton('Посмотреть', ['class' => 'btn btn-info']); ?></a>
                    <a href="<?= Url::to(['track/update', 'id' => $track->id]); ?>"><?= Html::submitButton('Изменить', ['class' => 'btn btn-warning']); ?></a>
                    <a href="<?= Url::to(['track/delete', 'id' => $track->id]); ?>"
                       onclick="return confirm('Вы действительно хотите удалить этот трек?')"><?= Html::submitButton('Удалить', ['class' => 'btn btn-danger']); ?>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <a href="<?= Url::to(['track/add']); ?>"> <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']); ?></a>
</div>