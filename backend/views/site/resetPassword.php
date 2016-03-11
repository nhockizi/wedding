<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-container">
    <div class="login-header login-caret">
        <div class="login-content">
            <a href="index.html" class="logo">
                <img src="<?= Yii::$app->request->baseUrl ?>img/materialize-logo.png" width="120" alt=""/>
            </a>
            <p class="description">Nhập mật khẩu mới của bạn.</p>
            <div class="login-progressbar-indicator">
                <h3>43%</h3>
                <span>Tiến trình...</span>
            </div>
        </div>
    </div>
    <div class="login-progressbar">
        <div></div>
    </div>
    <div class="login-form">
        <div class="login-content">
            <form method="post" role="form" id="form_reset_password">
                <div class="form-forgotpassword-success">
                    <i class="entypo-check"></i>
                    <h3>Mật khẩu đã được thay đổi</h3>
                    <p>Bạn có thể vào trang đăng nhập để đăng nhập vào hệ thống.</p>
                </div>
                <div class="form-steps">
                    <div class="step current" id="step-1">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-key"></i>
                                </div>
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Mật khẩu mới" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-key"></i>
                                </div>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Xác nhận mật khẩu" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="reset-pass" class="btn btn-info btn-block btn-login">
                                Thay đổi mật khẩu
                                <i class="entypo-right-open-mini"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="token" id="token" value="<?= Yii::$app->request->get('token'); ?>" placeholder="">
            </form>
            <div class="login-bottom-links">
                <a href="<?= URL::to(['site/index']) ?>" class="link">
                    <i class="entypo-lock"></i>
                    Quay về trang đăng nhập
                </a>
                <br/>
            </div>
        </div>
    </div>
</div>
