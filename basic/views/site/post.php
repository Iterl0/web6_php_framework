<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <div><?= Html::encode($model->text) ?></div>
    <div class="row">
        <div class="col-md-2"><?= Html::encode($model->date) ?></div>
        <div class="col-md-offset-7 col-md-3">
            <?php
              foreach($model->authors as $author) {
                  echo $author->username . "<br>";
              }
            ?>
        </div>
    </div>



    </div>


</div>

