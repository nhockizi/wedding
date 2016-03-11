<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<!-- add class "multiple-expanded" to allow multiple submenus to open -->
<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
<!-- Search Bar -->

<li class="opened active">
    <a href="<?= Url::to(['dashboard/index']) ?>">
        <i class="entypo-gauge"></i>
        <span>Bảng điều khiển</span>
    </a>
</li>
<li class="opened active">
    <a href="<?= Url::to(['divination/index']) ?>">
        <i class="entypo-gauge"></i>
        <span>Bói toán</span>
    </a>
</li>
<li>
    <a href="layout-api.html">
        <i class="glyphicon glyphicon-user"></i>
        <span>Tài khoản</span>
    </a>
    <ul>
        <li>
            <a href="<?= Url::to(['user/index']) ?>">
                <span>Quản lý tài khoản</span>
            </a>
        </li>
        <li>
            <a href="<?= Url::to(['user/log']) ?>">
                <span>Nhật kí tài khoản</span>
            </a>
        </li>
        
    </ul>
</li>
<li>
    <a href="layout-api.html">
        <i class="glyphicon glyphicon-user"></i>
        <span>Quản lý Nhân sự</span>
    </a>
    <ul>
        <li>
            <a href="<?= Url::to(['hrm/index']) ?>">
                <span>Thông tin nhân viên</span>
            </a>
        </li>
        <li>
            <a href="<?= Url::to(['hrm/log']) ?>">
                <span>Nhật kí</span>
            </a>
        </li>

    </ul>
</li>
<li>
    <a href="layout-api.html">
        <i class="glyphicon glyphicon-shopping-cart"></i>
        <span>Mặt hàng</span>
    </a>
    <ul>
        <li>
            <a href="<?= Url::to(['contract-with-customer/index']) ?>">
                <span>Hợp đồng với khách hàng</span>
            </a>
        </li>
        <li>
            <a href="<?= Url::to(['product/index']) ?>">
                <span> Sản phẩm</span>
            </a>
        </li>
        <li>
            <a href="<?= Url::to(['customer/index']) ?>">
                <span> Khách hàng</span>
            </a>
        </li>
        <li>
            <a href="<?= Url::to(['product-type/index']) ?>">
                <span>Loại sản phẩm</span>
            </a>
        </li>
        <li>
            <a href='<?= Url::to(['contract-with-supplier/index']) ?>'>Hợp đồng với nhà cung cấp</a>
        </li>
        <li>
            <a href='<?= Url::to(['order-sheet/index']) ?>'>Đơn mua hàng</a>
        </li>
        <li>
            <a href='<?= Url::to(['delivery/index']) ?>'>Bên giao hàng</a>
        </li>
        <li>
            <a href='<?= Url::to(['receiver/index']) ?>'>Bên nhận hàng</a>
        </li>
        <li>
            <a href='<?= Url::to(['supplier/index']) ?>'>Nhà cung cấp</a>
        </li>
        <li>
            <a href='<?= Url::to(['materials/index']) ?>'>Nguyên liệu</a>
        </li>
        <li>
            <a href='<?= Url::to(['accessories/index']) ?>'>Phụ liệu</a>
        </li>
    </ul>
</li>

<li>
    <a href="mailbox.html">
        <i class="entypo-users"></i>
        <span>Kế toán</span>
    </a>
    <ul>
        <li>
            <a href='<?= Url::to(['bill/index']) ?>'>Hóa đơn</a>
        </li>
        <li>
            <a href='<?= Url::to(['import-material/index']) ?>'>Phiếu nhập</a>
        </li>
        <li>
            <a href='<?= Url::to(['export-material/index']) ?>'>Phiếu xuất</a>
        </li>
        <li>
            <a href='<?= Url::to(['import-product/index']) ?>'>Phiếu nhập thành phẩm</a>
        </li>
        <li>
            <a href='<?= Url::to(['export-product/index']) ?>'>Phiếu xuất thành phẩm</a>
        </li>
        <li>
            <a href='<?= Url::to(['liquidation/index']) ?>'>Thanh lý</a>
        </li>
    </ul>
</li>

<li>
    <a href="tables-main.html">
        <i class="entypo-home"></i>
        <span>Kho</span>
    </a>
    <ul>
        <li>
            <a href='<?= Url::to(['check-inventory/index']) ?>'>Kiểm kê kho</a>
        </li>
        <li>
            <a href="<?= Url::to(['material-inventory/index']) ?>">Kho nguyên phụ liệu</a>
        </li>
        <li>
            <a href='<?= Url::to(['product-inventory/index']) ?>'>Kho thành phẩm</a>
        </li>
    </ul>
</li>
<li>
    <a href="charts.html">
        <i class="glyphicon glyphicon-wrench"></i>
        <span>Thiết lập</span>
    </a>
    <ul>
        <li>
            <a href='<?= Url::to(['user/index']) ?>'>Quản lý người dùng</a>
        </li>
        <li>
            <a href='<?= Url::to(['smtp/index']) ?>'>Cấu hình Email</a>
        </li>
        <li>
            <a href='<?= Url::to(['role/index']) ?>'>Vai trò</a>
        </li>
    </ul>
</li>
<!-- end header nav-->
<script type="text/javascript">
    $(function () {
        change_profile();
    })
    function change_profile() {
        $("#emp-profile").click(function () {
            $.ajax({
                url: "<?= Url::to(['user/change-profile']) ?>",
                success: function (result) {
                    $("#modal-1 .modal-content").html(result);
                    $("#modal-1").modal();
                }
            });
        })

    }
</script>

