<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Справочник ЮЛ\ИП';
?>

<title><?= Html::encode($this->title) ?></title>

<form method="get" action="<?= Url::to(['abonent/search']) ?>" class="navbar-form">
    <input type="text" placeholder="Поиск..." name="search" class="form-control">
    <button type="submit" class="btn btn-default">Найти</button>
</form>

<div class="table-responsive">
    <h3 class="text-center">Справочник</h3>

    <table class="table">
        <thead class="thead-default">
        <tr>
            <th class="col-md-2">Наименование</th>
            <th class="col-md-2">ИНН</th>
            <th class="col-md-2">КПП</th>
            <th class="col-md-2">Телефон</th>
            <th class="col-md-2">E-mail</th>
        </tr>
        </thead>
        <tbody>


        <?php foreach ($abonents as $abonent): ?>
            <tr>
                <?php if ($abonent->organization_id): ?>
                    <td><?= $abonent->organization->name; ?></td>
                    <td><?= $abonent->organization->INN; ?></td>
                    <td><?= $abonent->organization->KPP; ?></td>
                    <td><?= $abonent->phone; ?></td>
                    <td><?= $abonent->email; ?></td>

                <?php elseif ($abonent->individual_id): ?>
                    <td><?= $abonent->individual->name; ?></td>
                    <td><?= $abonent->individual->INN; ?></td>
                    <td>---------</td>
                    <td><?= $abonent->phone; ?></td>
                    <td><?= $abonent->email; ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        <td>
            <a href="<?= Url::to(['abonent/view', 'id' => $abonent->id]); ?>"><?= Html::submitButton('Посмотреть', ['class' => 'btn btn-info']); ?></a>
            <a href="<?= Url::to(['abonent/update', 'id' => $abonent->id]); ?>"><?= Html::submitButton('Изменить', ['class' => 'btn btn-warning']); ?></a>
            <a href="<?= Url::to(['abonent/delete', 'id' => $abonent->id]); ?>"
               onclick="return confirm('Вы действительно хотите удалить эту организацию?')"><?= Html::submitButton('Удалить', ['class' => 'btn btn-danger']); ?>
            </a>
        </td>
        </tbody>
    </table>
    <a href="<?= Url::to(['abonent/add' /*, 'id' => $abonent->id + 1 */]); ?>"> <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary']); ?></a>
</div>