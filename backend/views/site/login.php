<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-container">
    <div class="login-header login-caret">
        <div class="login-content">
            <a href="<?= Url::to(['site/login']) ?>" class="logo">
                
            </a>
            <p class="description">Chào mừng bạn đến với hệ thống quản lý <strong>Website</strong></p>
            <div class="login-progressbar-indicator">
                <h3>43%</h3>
                <span>Đang vào hệ thống quản lý...</span>
            </div>
        </div>
    </div>
    <div class="login-progressbar">
        <div></div>
    </div>
    <div class="login-form">
        <div class="login-content">
            <div class="form-login-error">
                <h3>Invalid login</h3>
            </div>
            <form method="post" role="form" id="form_login">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-user"></i>
                        </div>
                        <input type="text" class="form-control input" name="username" id="username" placeholder="Tên đăng nhập" autocomplete="off"/>
                        <label class="error"></label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="entypo-key"></i>
                        </div>
                        <input type="password" class="form-control input" name="password" id="password" placeholder="Mật khẩu" autocomplete="off"/>
                        <label class="error"></label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-login">
                        <i class="entypo-login"></i>
                        Đăng nhập
                    </button>
                </div>
            </form>
            <div class="login-bottom-links">
                <a href="<?= URL::to(['site/forgotpassword']); ?>" class="link">Quên mật khẩu?</a>
            </div>
        </div>
    </div>
</div>
<script>
    var neonLogin = neonLogin || {};
    neonLogin.$container = $("#form_login");
    function Login() {
        var username = $("#username").val();
        var password = $('#password').val();
        $(".error").html('');
        $(".error").hide();
        $(".validate-has-error").removeClass('validate-has-error');
        if (username == "") {
            $("#username").parent().addClass('validate-has-error');
            $("#username").parent().find('.error').html("Vui lòng nhập giá trị");
            $("#username").parent().find('.error').show();
            $("#username").focus();
            return false;
        }
        if (password == "") {
            $("#password").parent().addClass('validate-has-error');
            $("#password").parent().find('.error').html("Vui lòng nhập giá trị");
            $("#password").parent().find('.error').show();
            $("#password").focus();
            return false;
        }
        $(".login-page").addClass('logging-in');
        $(".form-login-error").slideUp('fast');
        neonLogin.setPercentage(100);
        $.ajax({
            type: "POST",
            data: {
                'username': username,
                'password': password,
            },
            url: "<?= Url::to(['site/login']) ?>",
            error: function()
            {
                alert("An error occoured!");
            },
            success: function (result) {
                
                setTimeout(function()
                {
                    if(result == 'success')
                    {
                        setTimeout(function()
                        {
                            window.location.href = '<?= Url::to(['site/index']) ?>';
                        }, 400);
                    }else{
                        $(".login-page").removeClass('logging-in');
                        neonLogin.resetProgressBar(true);
                    }
                }, 1000);
            }
        })
    }
</script>
