<?php
use yii\helpers\Url;
$this->title = 'Tài khoản người dùng';
?>
<ol class="breadcrumb bc-3">
    <li>
        <a href="<?= Url::to(['site/index']) ?>"><i class="entypo-home"></i>Bảng điều khiển</a>
    </li>
    <li class="active">
        <strong>Quản lý tài khoản người dùng</strong>
    </li>
</ol>
<div class="form-group">
   <button class="btn btn-green btn-icon" type="button" onclick="Create()">
        Thêm
        <i class="entypo-pencil"></i>
    </button> 
</div>
<table class="table table-bordered datatable" id="table_user">
    <thead>
        <tr>
            <th style="width:15px;">
                <input class="ace cb_all" type="checkbox">
            </th>
            <th>Họ &amp; tên </th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Nhóm</th>
            <th style="width:140px;">Thao tác</th>
        </tr>
    </thead>
</table>
<script type="text/javascript">
    $(document).ready(function () {
        AjaxTable('table_user','<?= Url::to(['user/load-ajax']) ?>');
    });
    function refreshTable() {
        var table = $('#table_user').DataTable();
        table.destroy();
         AjaxTable('table_user','<?= Url::to(['user/load-ajax']) ?>');
    }
	function AjaxTable(id,url){
    $('#'+id).DataTable( {
        "oLanguage": {
           "sLengthMenu": "Hiện _MENU_ mục",
            "sSearch": "Tìm kiếm:",
            "oPaginate": {
                "sPrevious": "Trước",
                "sNext": "Kế tiếp"
            },
            "sEmptyTable": "Không có dữ liệu",
            "sProcessing": "Đang tải dữ liệu...",
            "sZeroRecords": "Không tìm thấy dữ liệu phù hợp",
             "sInfo": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
            "sInfoEmpty": "Hiển thị 0 đến 0 của 0 mục",
             "sInfoFiltered": "(filtered của _MAX_ tồng số trong mục)",
            "sInfoPostFix": "",
            "sUrl": ""
        },
        "aaSorting" : [[1, 'desc']],
        "columnDefs": [
                        {"targets": 0, "orderable": false},
                        {"targets": 7, "orderable": false},
                      ],
        "processing": true,
        "serverSide": true,
        "ajax": $.fn.dataTable.pipeline( {
            url: url,
            pages: 5
        } )
    } );
    //$("#"+id+"_filter").hide();
}

</script>