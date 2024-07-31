<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AdminAsset;
use yii\bootstrap5\Breadcrumbs;
use common\widgets\Alert;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use backend\modules\admin\components\MenuHelper;
use backend\widgets\LteSideBar;
use backend\modules\admin\components\Helper;
if (isset($this->params['refresh-menu'])) {
    $menus = MenuHelper::getAssignedMenu(Yii::$app->user->id, null, null, true);
} else {
    $menus = MenuHelper::getAssignedMenu(Yii::$app->user->id);
}
MenuHelper::setActiveMenu($menus, $this->context->route);

AdminAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php $this->beginBody() ?>
    <div class="wrapper">
        <?php
        NavBar::begin([
            'options' => [
                'class' => 'main-header navbar navbar-expand navbar-white navbar-light',
            ],
        ]);
        $menuItems = [
            [
                'label' => '<i class="fas fa-bars"></i>',
                'linkOptions' => [
                    'data-widget' => 'pushmenu',
                    'href' => '#',
                    'role' => 'button',
                ],
                'encode' => false,
            ],
            [
                'label' => 'Home',
                'url' => ['/site/index'],
            ],
        ];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
            'items' => $menuItems,
        ]);
        if (Yii::$app->user->isGuest) {
            echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
        } else {
            echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout text-decoration-none']
                )
                . Html::endForm();
        }
        NavBar::end();
        ?>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?=Yii::$app->user->identity->username?></a>
                    </div>
                </div>
                <?php
                echo LteSideBar::widget([
                    'menuItems' => $menus
                ]);?>
            </div>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?=$this->params['title']?></h1>
                    </div>
                    <div class="col-sm-6">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            'options' => ['class' => 'breadcrumb float-sm-right'],
                        ]) ?>
                    </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <?= Alert::widget() ?>
                            <?= $content ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <div class="container">
                <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
                <p class="float-end"><?= Yii::powered() ?></p>
            </div>
        </footer>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
