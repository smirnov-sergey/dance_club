<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Статья';
?>

<title><?= Html::encode($this->title) ?></title>


<div class="nav nav-pills">
    <a href="<?= Url::to(['article/index']); ?>"> <?= Html::submitButton('Все статьи', ['class' => 'btn btn-primary']); ?></a>
</div>

<div class="container">
    <div class="row">
        <h3 class="text-center"><?= $article->title; ?></h3>

        <div class="row">
            <div class="col-md-1">Автор</div>
            <div class="col-md-2">Категория</div>
        </div>

        <div class="row">
            <div class="col-md-1"><?= $article->user->username; ?></div>
            <div class="col-md-2"><?= $article->category->title; ?></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12"> <?= $article->content; ?></div>
        </div>
    </div>
</div>

<br>

<div class="comments"><!--Комментарии-->

    <h3 class="title-comments">Комментарии (<?php echo count($comments); ?>)</h3>

    <?php foreach ($comments as $comment) : ?>
        <ul class="media-list">
            <!-- Комментарий (уровень 1) -->
            <li class="media">
                <div class="media-left">
                    <?= Html::img("@web/upload/store/test/new_{$comment->user->userProfile->image}") ?>
                </div>
                <div class="media-body">
                    <div class="media-heading">
                        <div class="author"><?= $comment->user->username; ?></div>
                        <div class="metadata">
                            <span class="date"><?= date("d.m.Y H:i", $comment->created_at); ?></span>
                        </div>
                    </div>
                    <div class="media-text text-justify"><?= $comment->text; ?></div>
                    <!--<div class="footer-comment">
                         <span class="vote plus" title="Нравится">
                             <i class="fa fa-thumbs-up"></i>
                         </span>
                        <span class="rating"></span>
                        <span class="vote minus" title="Не нравится">
                             <i class="fa fa-thumbs-down"></i>
                         </span>
                        <span class="devide"></span>
                        <span class="comment-reply">
                            <a href="#" class="reply"></a>
                        </span>
                    </div>-->
                    <!-- Вложенный медиа-компонент (уровень 2) -->
                    <!--<div class="media">
                            <div class="media-left">
                                <? /*= Html::img("@web/upload/store/test/new_{$comment->user->userProfile->image}") */ ?>
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <div class="author"><? /*= $comment->user->username; */ ?></div>
                                    <div class="metadata">
                                        <span class="date"><? /*= date("d.m.Y H:i", $comment->created_at); */ ?></span>
                                    </div>
                                </div>
                                <div class="media-text text-justify"><? /*= $comment->text; */ ?></div>
                                <div class="footer-comment"></div>
                            </div>
                        </div>--><!-- Конец вложенного комментария (уровень 2) -->
                </div>
            </li><!-- Конец комментария (уровень 1) -->
        </ul>
    <?php endforeach; ?>

</div><!--Комментарии-->

<br>
<a href="<?= Url::to(['comment/add', 'id' => $article->id]); ?>"> <?= Html::submitButton('Оставить комментарий', ['class' => 'btn btn-warning']); ?></a>

