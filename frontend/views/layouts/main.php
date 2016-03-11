<?php
/* @var $this \yii\web\View */
/* @var $content string */
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>
    <link rel="stylesheet" type="text/css" href="<?= Yii::$app->request->baseUrl ?>/images/favicon/favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="<?= Yii::$app->request->baseUrl ?>/css/bootstrap/bootstrap.css" rel="stylesheet" media="screen">

    <!-- Font Awesome CSS -->
    <link href="<?= Yii::$app->request->baseUrl ?>/css/font-awesome.min.css" rel="stylesheet" media="screen">

    <!-- Elegant icons CSS -->
    <link href="<?= Yii::$app->request->baseUrl ?>/css/simple-line-icons.css" rel="stylesheet" media="screen">

    <!-- Magnific-popup lightbox -->
    <link href="<?= Yii::$app->request->baseUrl ?>/css/magnific-popup.css" rel="stylesheet">

    <!-- Owl Carousel -->
    <link href="<?= Yii::$app->request->baseUrl ?>/css/owl.theme.css" rel="stylesheet">
    <link href="<?= Yii::$app->request->baseUrl ?>/css/owl.carousel.css" rel="stylesheet">

    <!-- Animate css -->
    <link href="<?= Yii::$app->request->baseUrl ?>/css/animate.css" rel="stylesheet">

    <!-- Custom styles CSS -->
    <link rel="stylesheet" type="text/css" href="<?= Yii::$app->request->baseUrl ?>/css/tk-bootstrap.3.css">
    <link href="<?= Yii::$app->request->baseUrl ?>/css/site.css" rel="stylesheet" media="screen">
    <link href="<?= Yii::$app->request->baseUrl ?>/css/style.css" rel="stylesheet" media="screen">
    <link href="<?= Yii::$app->request->baseUrl ?>/css/stylesheet.css" rel="stylesheet" media="screen">
    <link href="<?= Yii::$app->request->baseUrl ?>/css/marry_picture.css" rel="stylesheet" media="screen">
    <link href="<?= Yii::$app->request->baseUrl ?>/css/ddmenu.css" rel="stylesheet" media="screen">
    <!-- Javascript files -->
    <script src="<?= Yii::$app->request->baseUrl ?>/js/jquery-1.11.1.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/js/jquery.backstretch.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/js/jqBootstrapValidation.js"></script>

    <!-- Other -->
    <script src="<?= Yii::$app->request->baseUrl ?>/js/ddmenu.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/js/jssor.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/js/jssor.slider.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/js/jquery.matchHeight-min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/js/owl.carousel.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/js/smoothscroll.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/js/wow.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/js/jquery.colorbox-min.js"></script>

    <!-- Custom scripts -->
    <script src="<?= Yii::$app->request->baseUrl ?>/js/custom.js"></script>
<body class="page-body skin-blue">
    <header>
    <?= $this->render('header.php')?>
    </header>
<?php $this->beginBody() ?>
    <div class="main-content">
        <?= $content ?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

