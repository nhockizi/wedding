<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<script src="<?= Yii::$app->request->baseUrl?>/js/wedding/wedding.js"></script>
<input type="hidden" id="base" value="<?= Yii::$app->request->baseUrl?>"/>
<div class="wedding_container">
	<div class="col-md-6 wd_border_left">
		<h3>Form đăng ký Nam</h3>
		<input type="text" placeholder="Tên đầy đủ" class="col-md-8 txt_input">
		<input type="text" placeholder="Ngày sinh" class="col-md-8 txt_input">
		<input type="text" placeholder="Tháng" class="col-md-8 txt_input">
		<input id="year_age_male" type="text" placeholder="Năm" class="col-md-8 txt_input">
	</div>
	<div class="col-md-6 wd_border_right">
		<h3>Form đăng ký Nữ</h3>
		<input type="text" placeholder="Tên đầy đủ" class="col-md-8 txt_input">
		<input type="text" placeholder="Ngày sinh" class="col-md-8 txt_input">
		<input type="text" placeholder="Tháng" class="col-md-8 txt_input">
		<input type="text" id="year_age_female"   placeholder="Năm" class="col-md-8 txt_input">
	</div>
</div>
<div class="clearfix"></div>
<div class="back_page">
	<a id="btn_result_year" class="btn product-details btn_back_page" title="Custom Bedding">
		<span>
			<i class="glyphicon glyphicon-menu-left"></i>
			Kết quả
		</span>
	</a>
</div>