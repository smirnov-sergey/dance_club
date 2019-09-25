<?php

use app\models\Genre;
use app\models\VisitorGenre;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Танцпол';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['club/view', 'id' => $club->id]); ?>"> <?= Html::submitButton('Вернуться', ['class' => 'btn btn-primary']); ?></a>
</div>

<div class="table-responsive">
    <h3 class="text-center">Танцпол</h3>
    <table class="table">
        <thead class="thead-default">
        <tr>
            <th class="col-md-2">Трек</th>
            <th class="col-md-1">Жанр</th>
            <th class="col-md-2">Танцует</th>
            <th class="col-md-2">Пары</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td>
                <?php foreach ($club->playlist->track as $track): ?>
                    <?= $track->name; ?><br>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($genres as $genre): ?>
                <?= $genre->name; ?><br>
                <?php endforeach; ?>
            <td>
                <?php foreach ($dancers as $dance): ?>
                    <?= $dance->name; ?><br>
                <?php endforeach; ?>
            </td>
            <td>
                <?php foreach ($couples as $couple): ?>
                    <?= $couple; ?><br>
                <?php endforeach; ?>

            </td>
            </td>
        </tr>
        </tbody>
    </table>
</div><!--table-responsive-->
