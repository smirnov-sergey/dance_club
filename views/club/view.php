<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Клуб';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['club/index']); ?>"> <?= Html::submitButton('Все клубы', ['class' => 'btn btn-primary']); ?></a>
</div>

<h3 class="text-center">Клуб</h3>
<br>

<table class="table">
    <thead class="thead-default">
    <tr>
        <th class="col-md-2"><h5>Название клуба</h5></th>
        <th class="col-md-2"><h5>Плейлист</h5></th>
        <th class="col-md-2"><h5>Посетители</h5></th>
        <th class="col-md-2"><h5>Группа</h5></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><h3><?= $club->name; ?></h3></td>
        <td><h3><?= $club->playlist->name; ?></h3></td>
        <td>
            <h3>
                <?php foreach ($visitors as $visitor): ?>
                    <?= $visitor->name; ?><br>
                <?php endforeach; ?>
            </h3>
        </td>
        <td>
            <h3>
                <?php foreach ($companies as $company): ?>
                    <?= $company->name; ?><br>
                <?php endforeach; ?>
            </h3>
        </td>
    </tr>
    </tbody>
</table>