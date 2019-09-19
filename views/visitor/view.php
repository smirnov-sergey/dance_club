<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Посетитель';
?>

    <title><?= Html::encode($this->title) ?></title>


    <div class="nav nav-pills">
        <a href="<?= Url::to(['visitor/index']); ?>"> <?= Html::submitButton('Все посетители', ['class' => 'btn btn-primary']); ?></a>
    </div>


    <table class="table">
        <thead class="thead-default">
        <tr>
            <th class="col-md-2"><h5>Имя посетителя</h5></th>
            <th class="col-md-2"><h5>Пол</h5></th>
            <th class="col-md-2"><h5>Танцует</h5></th>
            <th class="col-md-2"><h5>Группа</h5></th>
            <th class="col-md-2"><h5>Клуб</h5></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><h3><?= $visitor->name; ?></h3></td>
            <td><h3><?= $visitor->gender; ?></h3></td>
            <td>
                <h3>
                    <?php foreach ($visitor->genre as $genre): ?>
                        <?= $genre->name; ?> <br>
                    <?php endforeach; ?>
                </h3>
            </td>
            <td><h3><?= $visitor->company->name; ?></h3></td>
            <td><h3><?= $visitor->club->name; ?></h3></td>
        </tr>
        </tbody>
    </table>
