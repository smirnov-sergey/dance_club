<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Клуб';
?>

<title><?= Html::encode($this->title) ?></title>

<form method="get" action="<?= Url::to(['club/search']) ?>" class="navbar-form">
    <input type="text" placeholder="Поиск..." name="search" class="form-control">
    <button type="submit" class="btn btn-default">Найти</button>
</form>

<div class="table-responsive">
    <h3 class="text-center">Клуб</h3>

    <table class="table">
        <thead class="thead-default">
        <tr>
            <th class="col-md-2">Название клуба</th>
            <th class="col-md-2">Плейлист</th>
            <th class="col-md-2">Группа</th>
            <th class="col-md-2">Посетители</th>
            <th class="col-md-4">Действия</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($clubs as $club): ?>
            <tr>
                <td><?= $club->name; ?></td>
                <td><?= $club->playlist->name; ?></td>
                <td>
                    <?php foreach ($club->company as $company): ?>
                        <?= $company->name; ?>
                        <a href="<?= Url::to(['club/exitCompany', 'id' => $company->id]); ?>"><span class="glyphicon glyphicon-log-out"></span></a>
                        <br>
                    <?php endforeach; ?>
                </td>
                <td>
                    <?php foreach ($club->visitor as $visitor): ?>
                        <?php //TODO после теста заменить на количество человек в группе?>
                        <?= $visitor->name; ?>
<!--                        <a href="--><?//= Url::to(['club/exitVisitor', 'id' => $visitor->id]); ?><!--"><span class="glyphicon glyphicon-log-out"></span></a>-->
                        <br>
                    <?php endforeach; ?>
                </td>
                <td>
                    <a href="<?= Url::to(['club/view', 'id' => $club->id]); ?>"><?= Html::submitButton('Посмотреть', ['class' => 'btn btn-info']); ?></a>
                    <a href="<?= Url::to(['club/update', 'id' => $club->id]); ?>"><?= Html::submitButton('Изменить', ['class' => 'btn btn-warning']); ?></a>
                    <a href="<?= Url::to(['club/delete', 'id' => $club->id]); ?>"
                       onclick="return confirm('Вы действительно хотите удалить этот клуб?')"><?= Html::submitButton('Удалить', ['class' => 'btn btn-danger']); ?>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <a href="<?= Url::to(['club/add' /*, 'id' => $club->id + 1 */]); ?>"> <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']); ?></a>
</div>