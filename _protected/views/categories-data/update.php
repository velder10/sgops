<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoriesData */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Categories Data',
]) . $model->idcategories_data;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcategories_data, 'url' => ['view', 'id' => $model->idcategories_data]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="categories-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
