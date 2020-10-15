<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Club;
use app\models\Track;

/** @var $club Club */
/** @var $tracks Track */

$this->title = 'Танцпол в клубе ' . $club->name;
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['club/view', 'id' => $club->id]) ?>">
        <?= Html::submitButton('Вернуться', ['class' => 'btn btn-primary']) ?>
    </a>
</div>

<div class="table-responsive">
    <h3 class="text-center">
        клуб: <?= $club->name ?><br>
        плейлист: <?= $club->playlist->name ?><br>
        <br>
        Танцпол<br>
    </h3>

    <table class="table">
        <thead class="thead-default">
        <tr>
            <th class="col-md-2">Треки</th>
            <th class="col-md-2">Танцует</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($tracks as $trackName => $visitorName): ?>
            <tr>
                <td><?= $trackName ?></td>
                <td>
                    <?php foreach ($visitorName as $name): ?>
                        <?php if (isset($name)): ?>
                            <?= $name ?><br>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>