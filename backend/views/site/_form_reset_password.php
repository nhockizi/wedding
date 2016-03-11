<?php
use yii\helpers\Url;
use yii\helpers\Html;

?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        Change password
    </h4>
</div>
<div class="modal-body">
    <div class=" form-group col-md-12">
        <div class="col-md-4">
            <label for="current_password">Current password:</label>
        </div>
        <div class="col-md-8">
            <input type="password" class="form-control" value="" id="current_pass" name="current_pass">
        </div>
    </div>

    <div class=" form-group col-md-12">
        <div class="col-md-4">
            <label for="new_password">New password:</label>
        </div>
        <div class="col-md-8">
            <input type="password" class="form-control" value="" id="new_pass" name="new_pass">
        </div>
    </div>
    <div class=" form-group col-md-12">
        <div class="col-md-4">
            <label for="confirm_password">Confirm password:</label>
        </div>
        <div class="col-md-8">
            <input type="password" class="form-control" value="" id="confirm_pass" name="confirm_pass">
        </div>
    </div>

    <div style="clear:both;"></div>
</div>
<div class="modal-footer">
    <a class="waves-effect waves-light btn-large btn-save" onclick="reset_password();">
        <i class="mdi-editor-border-color right"></i>
        Confirm
    </a>
    <button type="button" class="waves-effect waves-light btn-large btn light-green" data-dismiss="modal">
        <i class="mdi-content-reply"></i> Close
    </button>
</div>

<script>
    function reset_password() {
        var current_pass = $("#current_pass").val();
        var new_pass = $("#new_pass").val();
        var confirm_pass = $("#confirm_pass").val();

        $(".form-control").btOff();

        if (current_pass == "") {
            $('#current_pass').bt('current password is not null', {
                trigger: 'none',
                clickAnywhereToClose: false,
                positions: ['top'],
                fill: 'rgba(33, 33, 33, .8)',
                spikeLength: 10,
                spikeGirth: 10,

                cssStyles: {color: '#FFF', fontSize: '11px', textAlign: 'justify', width: 'auto'}
            });
            $("#current_pass").btOn();
            $("#current_pass").focus();
            return false;
        }
        if (new_pass == "") {
            $('#new_pass').bt('new password is not null', {
                trigger: 'none',
                clickAnywhereToClose: false,
                positions: ['top'],
                fill: 'rgba(33, 33, 33, .8)',
                spikeLength: 10,
                spikeGirth: 10,

                cssStyles: {color: '#FFF', fontSize: '11px', textAlign: 'justify', width: 'auto'}
            });
            $("#new_pass").btOn();
            $("#new_pass").focus();
            return false;
        }
        if (confirm_pass == "") {
            $('#confirm_pass').bt('confirm password is not null', {
                trigger: 'none',
                clickAnywhereToClose: false,
                positions: ['top'],
                fill: 'rgba(33, 33, 33, .8)',
                spikeLength: 10,
                spikeGirth: 10,

                cssStyles: {color: '#FFF', fontSize: '11px', textAlign: 'justify', width: 'auto'}
            });
            $("#confirm_pass").btOn();
            $("#confirm_pass").focus();
            return false;
        }

        if (confirm_pass != new_pass) {
            $('#confirm_pass').bt('confirm password is not valid', {
                trigger: 'none',
                clickAnywhereToClose: false,
                positions: ['top'],
                fill: 'rgba(33, 33, 33, .8)',
                spikeLength: 10,
                spikeGirth: 10,

                cssStyles: {color: '#FFF', fontSize: '11px', textAlign: 'justify', width: 'auto'}
            });
            $("#confirm_pass").btOn();
            $("#confirm_pass").focus();
            return false;
        }

        $.ajax({
            url: "<?= Url::to(['site/change-password']) ?>",
            data: {
                'current_pass': current_pass,
                'new_pass': new_pass,
                'confirm_pass': confirm_pass,
            },
            type: "POST",
            success: function (result) {
                if (result != 0) {
                    $("#modal_show").modal("hide");
                    location.href = "<?= Url::to(['site/index']) ?>";
                }
                else {
                    alert("Current password is not valid")
                }

            }
        });
    }
</script>
