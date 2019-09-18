<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Найденные треки';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['track/index']); ?>"> <?= Html::submitButton('Все треки', ['class' => 'btn btn-primary']); ?></a>
</div>

<h3 class="title text-center">Поиск по запросу: <?= Html::encode($search); ?></h3>

<?php if (!empty($tracks)): ?>
    <?php foreach ($tracks as $track): ?>

        <?php if ($track->name): ?>
            <div class="row">
                <a href="<?= Url::to(['track/view', 'id' => $track->id]); ?>">
                    <div class="col-lg-12 text-center"><h2><?= $track->name; ?></h2></div>
                </a>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php else : ?>
    <h3 class="title text-center">Ничего не найдено...</h3>
<?php endif; ?>
