<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Посетители';
?>

<title><?= Html::encode($this->title) ?></title>

<form method="get" action="<?= Url::to(['visitor/search']) ?>" class="navbar-form">
    <input type="text" placeholder="Поиск..." name="search" class="form-control">
    <button type="submit" class="btn btn-default">Найти</button>
</form>

<div class="table-responsive">
    <h3 class="text-center">Посетители</h3>

    <table class="table">
        <thead class="thead-default">
        <tr>
            <th class="col-md-2">Имя</th>
            <th class="col-md-2">Пол</th>
            <th class="col-md-2">Группа</th>
            <th class="col-md-2">Клуб</th>
            <th class="col-md-4">Действия</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($visitors as $visitor): ?>
            <tr>
                <td><?= $visitor->name; ?></td>
                <td><?= $visitor->gender; ?></td>
                <td><?= $visitor->company->name; ?></td>
                <td><?= $visitor->club->name; ?></td>
                <td>
                    <a href="<?= Url::to(['visitor/view', 'id' => $visitor->id]); ?>"><?= Html::submitButton('Посмотреть', ['class' => 'btn btn-info']); ?></a>
                    <a href="<?= Url::to(['visitor/update', 'id' => $visitor->id]); ?>"><?= Html::submitButton('Изменить', ['class' => 'btn btn-warning']); ?></a>
                    <a href="<?= Url::to(['visitor/delete', 'id' => $visitor->id]); ?>"
                       onclick="return confirm('Вы действительно хотите удалить этого посетителя?')"><?= Html::submitButton('Удалить', ['class' => 'btn btn-danger']); ?>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <a href="<?= Url::to(['visitor/add' /*, 'id' => $visitor->id + 1 */]); ?>"> <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']); ?></a>
</div>