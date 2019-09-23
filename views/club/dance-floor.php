<?php

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
            <th class="col-md-1">Клуб</th>
            <th class="col-md-2">Плейлист</th>
            <th class="col-md-2">Трек</th>
            <th class="col-md-1">Жанр</th>
            <th class="col-md-2">Танцует</th>
            <th class="col-md-2">Пары</th>
            <th class="col-md-2">Все посетители</th>
        </tr>
        </thead>

        <tbody>
            <tr>
                <td><?= $club->name; ?></td>
                <td><?= $club->playlist->name; ?></td>
                <td>
                    <?php foreach ($club->playlist->track as $track): ?>
                        <?= $track->name; ?><br>
                    <?php endforeach; ?>
                </td>
                <td>
                        <?php foreach ($genres as $genre): ?>
                            <?= $genre->name; ?><br>
                        <?php endforeach; ?>
                </td>
                <td>
                    <?= $dance; ?>

                    <?php

                    ?>
                </td>
                <td><?php //TODO модель танцпол. кто танцует в паре; ?></td>
                <td>
                    <?php foreach ($club->visitor as $visitor): ?>
                        <?= $visitor->name; ?><br>
                    <?php endforeach; ?>
                </td>
            </tr>
        </tbody>
    </table>
</div><!--table-responsive-->
