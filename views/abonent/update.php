<?php

use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Статья';
?>

<title><?= Html::encode($this->title) ?></title>

<?php if (Yii::$app->session->hasFlash('warning')): ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo Yii::$app->session->getFlash('warning') ?>
    </div>
<?php endif; ?>

<div class="nav nav-pills">
    <a href="<?= Url::to(['article/index']); ?>"> <?= Html::submitButton('Все статьи', ['class' => 'btn btn-primary']); ?></a>
</div>

<div class="user-profile container">
    <h3>Статья</h3>
    <div class="form-group">
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(['id' => 'article-update-form']); ?>
            <?= $form->field($article, 'title')->textInput(); ?>
            <?= $form->field($article, 'content')->textInput(); ?>
            <?= $form->field($article, 'category_id')->dropDownList(Category::getDropDown()); ?>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'login-button']); ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>