<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\modules\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;

$controllerId = $this->context->uniqueId . '/';
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <p>
            <?php
            if ($model->status == 0 && Helper::checkRoute($controllerId . 'activate')) {
                echo Html::a(Yii::t('rbac-admin', 'Activate'), ['activate', 'id' => $model->id], [
                    'class' => 'btn btn-primary',
                    'data' => [
                        'confirm' => Yii::t('rbac-admin', 'Are you sure you want to activate this user?'),
                        'method' => 'post',
                    ],
                ]);
            }
            ?>
            <?php
            if (Helper::checkRoute($controllerId . 'delete')) {
                echo Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]);
            }
            ?>
        </p>

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'username',
                'email:email',
                'created_at:date',
                'status',
            ],
        ])
        ?>
    </div>
</div>
