<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Группы';
?>

<title><?= Html::encode($this->title) ?></title>

<form method="get" action="<?= Url::to(['company/search']) ?>" class="navbar-form">
    <input type="text" placeholder="Поиск..." name="search" class="form-control">
    <button type="submit" class="btn btn-default">Найти</button>
</form>

<div class="table-responsive">
    <h3 class="text-center">Группы</h3>

    <table class="table">
        <thead class="thead-default">
        <tr>
            <th class="col-md-4">Название группы</th>
            <th class="col-md-4">Количество участников</th>
            <th class="col-md-4">Действия</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($companies as $company): ?>
            <tr>
                <td><?= $company->name; ?></td>
                <td>
                    <?php $count = 0;
                    foreach ($company->visitor as $visitor): ?>
                        <?php $count++; ?>
                    <?php endforeach; ?>
                    <?= $count; ?>
                </td>
                <td>
                    <a href="<?= Url::to(['company/view', 'id' => $company->id]); ?>"><?= Html::submitButton('Посмотреть', ['class' => 'btn btn-info']); ?></a>
                    <a href="<?= Url::to(['company/update', 'id' => $company->id]); ?>"><?= Html::submitButton('Изменить', ['class' => 'btn btn-warning']); ?></a>
                    <a href="<?= Url::to(['company/delete', 'id' => $company->id]); ?>"
                       onclick="return confirm('Вы действительно хотите удалить эту группу?')"><?= Html::submitButton('Удалить', ['class' => 'btn btn-danger']); ?>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <a href="<?= Url::to(['company/add']); ?>"> <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']); ?></a>
</div>