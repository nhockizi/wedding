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

            <p class="description">Chúng tôi sẽ gửi mật khẩu mới qua email của bạn.</p>

            <!-- progress bar indicator -->
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

            <form method="post" role="form" id="form_forgot_password">

                <div class="form-forgotpassword-success">
                    <i class="entypo-check"></i>

                    <h3>Reset email has been sent.</h3>

                    <p>Please check your email, reset password link will expire in 24 hours.</p>
                </div>

                <div class="form-steps">

                    <div class="step current" id="step-1">

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-mail"></i>
                                </div>

                                <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                                       data-mask="email" autocomplete="off"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="button" id="reset-pass" class="btn btn-info btn-block btn-login">
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
                <!--
                                <a href="#">ToS</a>  - <a href="#">Privacy Policy</a>-->

            </div>

        </div>

    </div>

</div>
<script>
    $(function () {
       function rememberPassword() {
        $("#reset-pass").click(function () {
            var email = $("#email").val();
            $.ajax({
                type: "POST",
                data: {
                    'submit': '1',
                    'email': email,
                },
                url: "<?= Url::to(['site/remember-password']) ?>",
                success: function (result) {
                    alert(result)
                }

            })
        })
    }
    })

    
</script>
