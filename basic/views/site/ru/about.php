<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('common', 'About');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        лорем ипсум долор сит амет
    </p>

    <code><?= __FILE__ ?></code>
</div>
