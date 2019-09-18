<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Плейлист';
?>

<title><?= Html::encode($this->title) ?></title>


<div class="nav nav-pills">
    <a href="<?= Url::to(['playlist/index']); ?>"> <?= Html::submitButton('Все плейлисты', ['class' => 'btn btn-primary']); ?></a>
</div>

<table class="table">
    <thead class="thead-default">
    <tr>
        <th class="col-md-2"><h5>Название плейлиста</h5></th>
        <th class="col-md-2"><h5>Треки</h5></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><h3><?= $playlist->name; ?></h3></td>
        <td>
            <h3>
                <?php foreach ($tracks as $track): ?>
                    <?= $track->name; ?><br>
                <?php endforeach; ?>
            </h3>
        </td>
    </tr>
    </tbody>
</table>