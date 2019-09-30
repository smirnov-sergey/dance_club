<?php

use app\models\Genre;
use app\models\VisitorGenre;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Танцпол в клубе ' . $club->name;
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['club/view', 'id' => $club->id]); ?>"> <?= Html::submitButton('Вернуться', ['class' => 'btn btn-primary']); ?></a>
</div>

<div class="table-responsive">
    <h3 class="text-center">
        клуб: <?= $club->name; ?><br>
        плейлист: <?= $club->playlist->name; ?><br><br>
        Танцпол<br>
    </h3>

    <h3 class="text-center">Танцпол на ремонте</h3>

    <table class="table">
        <thead class="thead-default">
<!--        <tr>-->
<!--            <th class="col-md-2">Треки</th>-->
<!--            <th class="col-md-1">Жанр</th>-->
<!--            <th class="col-md-2">Танцует</th>-->
<!--        </tr>-->
        </thead>

        <tbody>

<!--        --><?php //foreach ($dancers as $dance): ?>
<!--            <tr>-->
<!--                <td>-->
<!--                    --><?//= $dance[trackName]; ?><!--<br>-->
<!--                </td>-->
<!--                <td>-->
<!--                    --><?//= $dance[genreName]; ?><!--<br>-->
<!--                </td>-->
<!--                <td>-->
<!--                    --><?php //if ($dance[genreName] == 'romance') : ?>
<!---->
<!--                        --><?php //foreach ($couples as $couple) : ?>
<!--                            --><?//= $couple; ?><!--<br>-->
<!--                        --><?php //endforeach; ?>
<!---->
<!--                    --><?php //else: ?>
<!---->
<!--                        --><?php //foreach ($soloDance as $solo) : ?>
<!--                            --><?//= $solo; ?><!--<br>-->
<!--                        --><?php //endforeach; ?>
<!---->
<!--                    --><?php //endif; ?>
<!--                </td>-->
<!--            </tr>-->
<!--        --><?php //endforeach; ?>
        </tbody>
    </table>
</div><!--table-responsive-->
