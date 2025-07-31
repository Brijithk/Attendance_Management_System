<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }
    .wrapper {
      display: flex;
      flex: 1;
    }
    .sidebar {
      width: 220px;
      background-color: #343a40;
      color: white;
      padding: 20px;
    }
    .sidebar a {
      color: #ccc;
      display: block;
      margin-bottom: 10px;
      text-decoration: none;
    }
    .sidebar a:hover {
      color: #fff;
    }
    .main {
      flex-grow: 1;
      padding: 20px;
    }
    .navbar-custom {
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
    }
  </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="navbar-custom">
  <span><strong>Attendance Dashboard</strong></span>
  <span style="float: right;">
    <?php if (Yii::$app->user->isGuest): ?>
      <?= Html::a('Login', ['/site/login'], ['style' => 'color: white;']) ?>
    <?php else: ?>
      <?= Html::beginForm(['/site/logout'], 'post', ['style' => 'display:inline']) ?>
      <?= Html::submitButton(
        'Logout (' . Yii::$app->user->identity->username . ')',
        ['class' => 'btn btn-link', 'style' => 'color: white; padding: 0;']
      ) ?>
      <?= Html::endForm() ?>
    <?php endif; ?>
  </span>
</div>

<div class="wrapper">
  <div class="sidebar">
    <h5>Navigation</h5>
    <?= Html::a('Home', ['/site/index']) ?>
    <?= Html::a('Students', ['/student/index']) ?>
    <?= Html::a('Attendance', ['/attendance/index']) ?>
    
  </div>

  <div class="main">
    <?= Breadcrumbs::widget([
      'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= $content ?>
  </div>
</div>

<!-- <footer class="footer text-center mt-4 mb-4">
  <div class="container">
    <p class="text-muted">&copy; Attendance System <?= date('Y') ?></p>
  </div>
</footer> -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
