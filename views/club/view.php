<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Клуб';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['club/index']); ?>"> <?= Html::submitButton('Все клубы', ['class' => 'btn btn-primary']); ?></a>
</div>

<h3 class="text-center">Клуб <?= $club->name; ?></h3>
<br>

<div class="container text-center">
    <a href="<?= Url::to(['club/dance-floor', 'id' => $club->id]); ?>"><?= Html::submitButton('Танцпол', ['class' => 'btn btn-warning']); ?></a>
</div>


<table class="table">
    <thead class="thead-default">
    <tr>
        <th class="col-md-2"><h5>Плейлист</h5></th>
        <th class="col-md-2"><h5>Треки</h5></th>
        <th class="col-md-2"><h5>Жанр</h5></th>
        <th class="col-md-2"><h5>Посетители</h5></th>
        <th class="col-md-2"><h5>Группа</h5></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><h3><?= $club->playlist->name; ?></h3></td>
        <td>
            <h3>
                <?php foreach ($tracks as $track): ?>
                    <?= $track[trackName]; ?><br>
                <?php endforeach; ?>
            </h3>
        </td>
        <td>
            <h3>
                <?php foreach ($tracks as $track): ?>
                    <?= $track[genreName]; ?><br>
                <?php endforeach; ?>
            </h3>
        </td>
        <td colspan="2">
            <table class="table">
                <tbody>
                <?php foreach ($club->company as $company): ?>
                    <tr>
                        <td>
                            <h3>
                                <?php foreach ($club->visitor as $visitor): ?>
                                    <?php if ($visitor->company_id == $company->id) : ?>
                                        <?= $visitor->name; ?>
                                        <a href="<?= Url::to(['club/exit-visitor', 'visitor_id' => $visitor->id, 'club_id' => $club->id]); ?>">
                                            <span class="glyphicon glyphicon-log-out"></span>
                                        </a>
                                        <br>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </h3>
                        </td>
                        <td>
                            <h3>
                                <?= $company->name; ?>
                                <a href="<?= Url::to(['club/exit-company', 'company_id' => $company->id, 'club_id' => $club->id]); ?>">
                                    <span class="glyphicon glyphicon-log-out"></span>
                                </a>
                                <br>
                            </h3>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

