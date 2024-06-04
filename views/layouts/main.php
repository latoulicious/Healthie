<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
  <?php $this->beginBody() ?>

  <header id="header">
    <?php
    NavBar::begin([
      'brandLabel' => 'LOGO',
      'brandUrl' => (Yii::$app->user->isGuest) ? '/' : ['/dashboard'], // Conditional redirection
      'options' => ['class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);

    if (!Yii::$app->user->isGuest) {
      echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto dropdown'], // Wrap remaining links in dropdown
        'items' => [
          // Conditional check for admin role and dropdown content
          Yii::$app->user->identity->role === 'admin' ? [
        'label' => 'Master Data', // Label for dropdown
        'url' => '#', // Non-clickable dropdown toggle
        'items' => [ // Nested dropdown items
          ['label' => 'Wilayah', 'url' => ['/wilayah/index']],
          ['label' => 'Pegawai', 'url' => ['/pegawai/index']],
        ],
      ] : '',
          [
            'label' => 'Transaksi', // Label for second dropdown (optional)
            'url' => '#', // Non-clickable dropdown toggle (optional)
            'items' => [ // Nested dropdown items (optional)
              !Yii::$app->user->isGuest ? ['label' => 'Pasien', 'url' => ['/users/index']] : '',
              !Yii::$app->user->isGuest ? ['label' => 'Tindakan', 'url' => ['/tindakan/index']] : '',
              !Yii::$app->user->isGuest ? ['label' => 'Obat', 'url' => ['/obat/index']] : '',
            ],
          ],
          [
            'label' => 'Informasi', // Label for second dropdown (optional)
            'url' => '#', // Non-clickable dropdown toggle (optional)
            'items' => [ // Nested dropdown items (optional)
              !Yii::$app->user->isGuest ? ['label' => 'Tagihan', 'url' => ['/users/index']] : '',
            ],
          ],
          !Yii::$app->user->isGuest ? ['label' => 'Laporan', 'url' => ['/obat/index']] : '',
          Yii::$app->user->isGuest
            ? ['label' => 'Sign Up', 'url' => ['/site/login']]
            : '<li class="nav-item">'
            . Html::beginForm(['/site/logout'])
            . Html::submitButton(
              'Logout',
              ['class' => 'nav-link btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
        ],
      ]);
    } else {
      echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        'items' => [
          Yii::$app->user->isGuest ? ['label' => 'Sign Up', 'url' => ['/site/login']] : '',
        ],
      ]);
    }

    NavBar::end();
    ?>
  </header>

  <main id="main" class="flex-shrink-0" role="main">
    <div class="container">
      <?php if (!empty($this->params['breadcrumbs'])) : ?>
        <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
      <?php endif ?>
      <?= Alert::widget() ?>
      <?= $content ?>
    </div>
  </main>

  <footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
      <div class="row text-muted">
        <div class="col-md-6 text-center text-md-start">&copy; Healthie <?= date('Y') ?></div>
      </div>
    </div>
  </footer>

  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>