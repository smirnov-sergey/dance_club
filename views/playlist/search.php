<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Найденные плейлисты';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['playlist/index']); ?>"> <?= Html::submitButton('Плейлист', ['class' => 'btn btn-primary']); ?></a>
</div>

<h3 class="title text-center">Поиск по запросу: <?= Html::encode($search); ?></h3>

<?php if (!empty($playlists)): ?>
    <?php foreach ($playlists as $playlist): ?>

        <?php if ($playlist->name): ?>
            <div class="row">
                <a href="<?= Url::to(['playlist/view', 'id' => $playlist->id]); ?>">
                    <div class="col-lg-12 text-center"><h2><?= $playlist->name; ?></h2></div>
                </a>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php else : ?>
    <h3 class="title text-center">Ничего не найдено...</h3>
<?php endif; ?>
