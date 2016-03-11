<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;
use backend\models\User;
$user = User::findOne(Yii::$app->user->getId());
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?= Yii::$app->request->baseUrl ?>img/materialize-logo.png" sizes="32x32">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>custom/assets/js/datatables/responsive/css/datatables.responsive.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>css2/plugins/datatable/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>custom/date-time/jquery-ui.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>custom/date-time/jquery-ui.min.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>custom/date-time/jquery-ui.theme.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>custom/date-time/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>custom/date-time/datepicker.min.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>custom/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>custom/assets/css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>custom/font/fonts.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>custom/assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>custom/assets/css/neon-core.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>custom/assets/css/neon-theme.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>custom/assets/css/neon-forms.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>custom/assets/css/custom.css">
        
        <script src="<?= Yii::$app->request->baseUrl?>js2/jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>custom/assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
        <script src="<?= Yii::$app->request->baseUrl?>js2/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/datatables/datatableajax.js"></script>
        <script src="<?= Yii::$app->request->baseUrl?>js2/datatable/table.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/date-time/jquery-ui.min.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/date-time/moment.min.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/date-time/daterangepicker.min.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/date-time/jquery-ui.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/gsap/main-gsap.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/bootstrap.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/joinable.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/resizeable.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/neon-api.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/jquery.bootstrap.wizard.min.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>select2/select2.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/jquery.sparkline.min.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/raphael-min.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/morris.min.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/toastr.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/fileinput.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/jquery.validate.min.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/bootstrap-datepicker.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>js2/jquery.bt.min.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/neon-custom.js"></script>
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>select2/select2-bootstrap.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>select2/select2.css">
        <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>css2/style.css">
        <script src="<?= Yii::$app->request->baseUrl ?>js2/main.js"></script>
        <script src="<?= Yii::$app->request->baseUrl ?>custom/assets/js/jquery.inputmask.bundle.min.js"></script>
        <style type="text/css">
            .modal-footer {
                margin-top: 0px !important;
            }
            .dataTables_wrapper .dataTables_info{
                width:30%;
                float: left;
            }
            .dataTables_wrapper .dataTables_paginate{
                width:70%;
            }
            body{
                min-width: 1028px !important;
            }
        </style>
    </head>
    <body class="page-body skin-blue">
        <div class="page-container">
            <div class="sidebar-menu">
                <header class="logo-env">
                    <div class="logo">
                        <a href="<?= Url::to(['site/index']) ?>">
                            <img src="<?= Yii::$app->request->baseUrl ?>img/materialize-logo.png" width="80;;"  style="margin-left: 73px;" alt="" />
                        </a>
                    </div>
                    <div class="sidebar-collapse">
                        <a href="<?= Url::to(['site/index']) ?>" class="sidebar-collapse-icon with-animation">
                            <i class="entypo-menu"></i>
                        </a>
                    </div>
                    <div class="sidebar-mobile-menu visible-xs">
                        <a href="#" class="with-animation">
                            <i class="entypo-menu"></i>
                        </a>
                    </div>
                </header>
                <div class="sidebar-user-info">
                    
                    <div class="sui-normal">
                        <a href="#" class="user-link">
                            <span>Xin chào,</span>
                            <strong></strong>
                        </a>
                    </div>
                    <div class="sui-hover inline-links animate-in">
                        <a id="emp-profile">
                            <i class="entypo-pencil"></i>
                            Thông tin nhân viên
                        </a>
                        
                        <a href="<?= Url::to(['site/logout']) ?>">
                            <i class="entypo-lock"></i>
                            Đăng xuất
                        </a>
                        
                        <span class="close-sui-popup">&times;</span>
                    </div>
                </div>
                <ul id="main-menu" class="">
                    <?= $this->render('menu_left.php')?>
                </ul>
            </div>
            <div class="main-content">
                <div class="row" style=" margin-bottom: -9px;">
                    <div class="col-md-6 col-sm-8 clearfix">
                        <ul class="user-info pull-left pull-right-xs pull-none-xsm">
                            <li class="notifications dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="entypo-attention"></i>
                                    <span class="badge badge-info">6</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="top">
                                        <p class="small">
                                            <a href="#" class="pull-right">Mark all Read</a>
                                            You have <strong>3</strong> new notifications.
                                        </p>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller">
                                            <li class="unread notification-success">
                                                <a href="#">
                                                    <i class="entypo-user-add pull-right"></i>
                                                    <span class="line">
                                                        <strong>New user registered</strong>
                                                    </span>
                                                    <span class="line small">
                                                        30 seconds ago
                                                    </span>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    <li class="external">
                                        <a href="#">View all notifications</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="notifications dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="entypo-globe"></i>
                                    <span class="badge badge-warning">1</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="top">
                                        <p>You have 6 pending tasks</p>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller">
                                            <li>
                                                <a href="#">
                                                    <span class="task">
                                                        <span class="desc">Procurement</span>
                                                        <span class="percent">27%</span>
                                                    </span>
                                                    
                                                    <span class="progress">
                                                        <span style="width: 27%;" class="progress-bar progress-bar-success">
                                                            <span class="sr-only">27% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="task">
                                                        <span class="desc">App Development</span>
                                                        <span class="percent">83%</span>
                                                    </span>
                                                    
                                                    <span class="progress progress-striped">
                                                        <span style="width: 83%;" class="progress-bar progress-bar-danger">
                                                            <span class="sr-only">83% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="task">
                                                        <span class="desc">HTML Slicing</span>
                                                        <span class="percent">91%</span>
                                                    </span>
                                                    
                                                    <span class="progress">
                                                        <span style="width: 91%;" class="progress-bar progress-bar-success">
                                                            <span class="sr-only">91% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="task">
                                                        <span class="desc">Database Repair</span>
                                                        <span class="percent">12%</span>
                                                    </span>
                                                    
                                                    <span class="progress progress-striped">
                                                        <span style="width: 12%;" class="progress-bar progress-bar-warning">
                                                            <span class="sr-only">12% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="task">
                                                        <span class="desc">Backup Create Progress</span>
                                                        <span class="percent">54%</span>
                                                    </span>
                                                    
                                                    <span class="progress progress-striped">
                                                        <span style="width: 54%;" class="progress-bar progress-bar-info">
                                                            <span class="sr-only">54% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="task">
                                                        <span class="desc">Upgrade Progress</span>
                                                        <span class="percent">17%</span>
                                                    </span>
                                                    
                                                    <span class="progress progress-striped">
                                                        <span style="width: 17%;" class="progress-bar progress-bar-important">
                                                            <span class="sr-only">17% Complete</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="external">
                                        <a href="#">See all tasks</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-4 clearfix hidden-xs">
                        <ul class="list-inline links-list pull-right">
                            <li class="dropdown language-selector">
                                Ngôn ngữ: &nbsp;
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                                    <img src="<?= Yii::$app->request->baseUrl ?>custom/assets/images/VN.png" />
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li class="active">
                                        <a href="#">
                                            <img src="<?= Yii::$app->request->baseUrl ?>custom/assets/images/GB.png" />
                                            <span>English</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sep"></li>
                            <li>
                                <a href="<?= Url::to(['site/logout']) ?>">
                                    Đăng xuất <i class="entypo-logout right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr />
                <?= $content ?>
            </div>
            <div class="modal fade" id="modal-message">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Thông báo</h4>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-2">
                <div class="modal-dialog" style="width: 60%;">
                    <div class="modal-content">
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-6">
                <div class="modal-dialog">
                    <div class="modal-content">
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-3">
                <div class="modal-dialog" style="width: 20%;">
                    <div class="modal-content">
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-7">
                <div class="modal-dialog" style="width: 96%">
                    <div class="modal-content">
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $("#emp-profile").click(function () {
                $.ajax({
                    url: "<?= Url::to(['user/change-profile']) ?>",
                    success: function (result) {
                        $("#modal-1 .modal-content").html(result);
                        $("#modal-1").modal();
                    }
                });
            });
        </script>
        
    </body>
</html>
<?php $this->endPage() ?>