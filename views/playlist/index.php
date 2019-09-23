<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Плейлист';
?>

<title><?= Html::encode($this->title) ?></title>

<form method="get" action="<?= Url::to(['playlist/search']) ?>" class="navbar-form">
    <input type="text" placeholder="Поиск..." name="search" class="form-control">
    <button type="submit" class="btn btn-default">Найти</button>
</form>

<div class="table-responsive">
    <h3 class="text-center">Плейлист</h3>

    <table class="table">
        <thead class="thead-default">
        <tr>
            <th class="col-md-4">Название</th>
            <th class="col-md-4">Треки</th>
            <th class="col-md-4">Действия</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($playlists as $playlist): ?>
            <tr>
                <td><?= $playlist->name; ?></td>
                <td>
                    <?php $count = 0;
                    foreach ($playlist->track as $track): ?>
                        <?php $count++; ?>
                    <?php endforeach; ?>
                    <?= $count; ?>

                </td>
                <td>
                    <a href="<?= Url::to(['playlist/view', 'id' => $playlist->id]); ?>"><?= Html::submitButton('Посмотреть', ['class' => 'btn btn-info']); ?></a>
                    <a href="<?= Url::to(['playlist/update', 'id' => $playlist->id]); ?>"><?= Html::submitButton('Изменить', ['class' => 'btn btn-warning']); ?></a>
                    <a href="<?= Url::to(['playlist/delete', 'id' => $playlist->id]); ?>"
                       onclick="return confirm('Вы действительно хотите удалить этот плейлист?')"><?= Html::submitButton('Удалить', ['class' => 'btn btn-danger']); ?>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <a href="<?= Url::to(['playlist/add']); ?>"> <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']); ?></a>
</div>