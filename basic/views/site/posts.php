<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title = Yii::t('common', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
        <?php
//        print_r($model);
        foreach($model as $key => $value) {
        ?>
            <div><a href="<?= Url::to(['post', 'id' => $value->id]); ?>"><?= Html::encode($value->name) ?></a>
                <div class="col-md-2"><?= Html::encode($value->date) ?></div>
                <div class="col-md-6"><?= Html::encode($value->text) ?></div>
            </div>
        <?php } ?>


    </div>


</div>

