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
            <a href="index.html" class="logo">
                <img src="<?= Yii::$app->request->baseUrl ?>img/materialize-logo.png" width="120" alt=""/>
            </a>
            <p class="description">Chào mừng bạn đến với hệ thống quản lý <strong>Pegarimex</strong></p>
            <div class="login-progressbar-indicator">
                <h3>43%</h3>
                <span>Đang xử lý...</span>
            </div>
        </div>
    </div>
    <div class="login-progressbar">
        <div></div>
    </div>
    <div class="login-form">
        <div class="login-content">
            <form method="post" role="form" id="form_forgot_password">
                <div class="form-forgotpassword-success">
                    <i class="entypo-check"></i>
                    <h3>Yêu cầu đã thực hiện xong.</h3>
                    <p>Vui lòng kiểm tra email của bạn, đường dẫn thay đổi mật khẩu có hiệu lực trong vòng 24 giờ.</p>
                </div>
                <div class="form-login-error">
                    <h3>Email không tồn tại</h3>
                </div>
                <div class="form-steps">
                    <div class="step current" id="step-1">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-mail"></i>
                                </div>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" data-mask="email" autocomplete="off"/>
                                <label class="error"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block btn-login">
                                Thay đổi mật khẩu
                                <i class="entypo-right-open-mini"></i>
                            </button>
                        </div>
                    </div>
                </div>
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
<script>
    var neonForgotPassword = neonForgotPassword || {};
    neonForgotPassword.$container = $("#form_forgot_password");
    neonForgotPassword.$steps = neonForgotPassword.$container.find(".form-steps");
    neonForgotPassword.$steps_list = neonForgotPassword.$steps.find(".step");
    neonForgotPassword.step = 'step-1';
    function ForgotPassword() {
        var email = $("#email").val();
        $(".error").html('');
        $(".error").hide();
        $(".validate-has-error").removeClass('validate-has-error');
        if (email == "") {
            $("#email").parent().addClass('validate-has-error');
            $("#email").parent().find('.error').html("Vui lòng nhập giá trị");
            $("#email").parent().find('.error').show();
            $("#email").focus();
            return false;
        }
        $(".login-page").addClass('logging-in');
        neonForgotPassword.setPercentage(100);
        $.ajax({
            type: "POST",
            data: {
                'email': email,
            },
            url: "<?= Url::to(['site/send-mail']) ?>",
            error: function()
            {
                alert("An error occoured!");
            },
            success: function (result) {
                
                setTimeout(function()
                {
                    // Hide the description title
                    $(".login-page .login-header .description").slideUp();
                    
                    // Hide the register form (steps)
                    neonForgotPassword.$steps.slideUp('normal', function()
                    {
                        // Remove loging-in state
                        $(".login-page").removeClass('logging-in');
                        
                        // Now we show the success message
                        $(".form-forgotpassword-success").slideDown('normal');
                        
                        // You can use the data returned from response variable
                    });
                    
                }, 1000);
            }
        })
        // $(".login-page").addClass('logging-in');
        // $(".form-login-error").slideUp('fast');
        // neonLogin.setPercentage(100);
        
    }
</script>
