<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Найденные посетители';
?>

<title><?= Html::encode($this->title) ?></title>

<div class="nav nav-pills">
    <a href="<?= Url::to(['visitor/index']); ?>"> <?= Html::submitButton('Все посетители', ['class' => 'btn btn-primary']); ?></a>
</div>

<h3 class="title text-center">Поиск по запросу: <?= Html::encode($search); ?></h3>

<?php if (!empty($visitors)): ?>
    <?php foreach ($visitors as $visitor): ?>

        <?php if ($visitor->name): ?>
            <div class="row">
                <a href="<?= Url::to(['visitor/view', 'id' => $visitor->id]); ?>">
                    <div class="col-lg-12 text-center"><h2><?= $visitor->name; ?></h2></div>
                </a>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php else : ?>
    <h3 class="title text-center">Ничего не найдено...</h3>
<?php endif; ?>
