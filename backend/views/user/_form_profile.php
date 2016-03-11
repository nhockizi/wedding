<?php
use yii\helpers\Url;
$this->title = 'Thông tin người dùng';
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Thông tin cá nhân</h4>
</div>
<div class="modal-body">
    <form id="form_user">
        <div class="row form-group">
            <div class="col-md-4"><label>Mật khẩu cũ</label></div>
            <div class="col-md-8"><input type="password" class="form-control" id="old-password" name="old-password" value=""></div>
        </div>
        <div class="row form-group">
            <div class="col-md-4"><label>Mật khẩu mới</label></div>
            <div class="col-md-8"><input type="password" class="form-control" id="new-password" name="new-password" value=""></div>
        </div>
        <div class="row">
            <div class="col-md-4"><label>Xác nhận mật khẩu</label></div>
            <div class="col-md-8"><input type="password" class="form-control" id="confirm-password" name="confirm-password" value=""></div>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
    <button type="button" class="btn btn-info" onclick="save_profile();"> Lưu</button>
</div>
<script type="text/javascript">
    function save_profile() {
        var old_password = $('#old-password').val();
        var new_password = $('#new-password').val();
        var confirm_password = $('#confirm-password').val();
        $(".form-control").btOff();
        if(old_password == ""){
            if (new_password != "") {
                $('#new-password').bt('Chưa nhập mật khẩu cũ', {
                    trigger: 'none',
                    clickAnywhereToClose: false,
                    positions: ['top'],
                    fill: 'rgba(33, 33, 33, .8)',
                    spikeLength: 10,
                    spikeGirth: 10,

                    cssStyles: {color: '#FFF', fontSize: '11px', textAlign: 'justify', width: 'auto'}
                });
                $("#new-password").btOn();
                $("#new-password").focus();
                return false;
            }
            if (confirm_password != "") {
                $('#old-password').bt('Chưa nhập mật khẩu cũ', {
                    trigger: 'none',
                    clickAnywhereToClose: false,
                    positions: ['top'],
                    fill: 'rgba(33, 33, 33, .8)',
                    spikeLength: 10,
                    spikeGirth: 10,

                    cssStyles: {color: '#FFF', fontSize: '11px', textAlign: 'justify', width: 'auto'}
                });
                $("#old-password").btOn();
                $("#old-password").focus();
                return false;
            }
        }else{
            if (new_password == "") {
                $('#new-password').bt('Chưa nhập mật khẩu mới', {
                    trigger: 'none',
                    clickAnywhereToClose: false,
                    positions: ['top'],
                    fill: 'rgba(33, 33, 33, .8)',
                    spikeLength: 10,
                    spikeGirth: 10,

                    cssStyles: {color: '#FFF', fontSize: '11px', textAlign: 'justify', width: 'auto'}
                });
                $("#new-password").btOn();
                $("#new-password").focus();
                return false;
            }
            if (confirm_password == "") {
                $('#confirm-password').bt('Chưa nhập lại mật khẩu mới', {
                    trigger: 'none',
                    clickAnywhereToClose: false,
                    positions: ['top'],
                    fill: 'rgba(33, 33, 33, .8)',
                    spikeLength: 10,
                    spikeGirth: 10,

                    cssStyles: {color: '#FFF', fontSize: '11px', textAlign: 'justify', width: 'auto'}
                });
                $("#confirm-password").btOn();
                $("#confirm-password").focus();
                return false;
            }
            if (confirm_password != new_password) {
                $('#confirm-password').bt('nhập lại mật khẩu mới', {
                    trigger: 'none',
                    clickAnywhereToClose: false,
                    positions: ['top'],
                    fill: 'rgba(33, 33, 33, .8)',
                    spikeLength: 10,
                    spikeGirth: 10,

                    cssStyles: {color: '#FFF', fontSize: '11px', textAlign: 'justify', width: 'auto'}
                });
                $("#confirm-password").btOn();
                $("#confirm-password").focus();
                return false;
            }
        }
        $("#modal-1 .modal-content .modal-footer").hide();
        var form = $('#form_user')[0];
        var formData = new FormData(form);
        $.ajax({
            url: "<?= Url::to(['user/save-profile']) ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                if(result == 0){
                    blockUI();
                    $("#modal-1").modal('hide');
                    $.unblockUI();
                    $("#modal-message .modal-content .modal-body").html('Bạn đã thay đổi thông tin tài khoản thành công');
                    $("#modal-message").modal();
                }else{
                    $('#old-password').bt('Mật khẩu sai', {
                        trigger: 'none',
                        clickAnywhereToClose: false,
                        positions: ['top'],
                        fill: 'rgba(33, 33, 33, .8)',
                        spikeLength: 10,
                        spikeGirth: 10,

                        cssStyles: {color: '#FFF', fontSize: '11px', textAlign: 'justify', width: 'auto'}
                    });
                    $("#old-password").btOn();
                    $("#old-password").focus();
                    $("#modal-1 .modal-content .modal-footer").show();
                    return false;
                }
                
            }
        });
    }
</script>