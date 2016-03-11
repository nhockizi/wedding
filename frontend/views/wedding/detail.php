<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="col-md-12">
	<div class="col-md-6" style="text-align:center;">
		<span class="wd_detail_header">Kết quả Nam</span>
		<?php foreach ($divination_male as $key => $value): ?>
			<div class="col-md-12 divination_column">
				<div>
					<span>Năm tuổi :</span>
					<?= $value->year_age ?>
				</div>
				<div>
					<span>Cung Hoàng Đạo :</span>
					<?= $value->zodiac ?>
				</div>
				<div>
					<span>Niên mệnh năm sinh Nam :</span>
					<?= $value->par_year_male ?>
				</div>
				<div>
					<span>Cung mệnh nam :</span>
					<?= $value->supply_clause_male ?>
				</div>
				<div>
					<span>Ngũ hành :</span>
					<?= $value->element ?>
				</div>
				<div style="width:210px;margin:10px auto">
					<?php
						$color = $value->color_male;
						$co = explode(",",$color);
						if(count($co) > 0){

							foreach ($co as $item){
								$item = trim($item);
								// echo $item ;
								if($item == "Xanh"){
									echo "<a class='xanh'></a>";
								}
								else if($item == "Đỏ"){
									echo "<a class='do'></a>";
								}
								else if($item == "Vàng"){
									echo "<a class='vang'></a>";
								}
								else if($item == "Đen"){
									echo "<a class='den'></a>";
								}
								else if($item == "Trắng"){
									echo "<a class='trang'></a>";
								}
							}
						}
					?>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<div class="col-md-6" style="text-align:center;">
		<span class="wd_detail_header">Kết quả Nữ</span>
		<?php foreach ($divination_female as $key => $value): ?>
			<div class="col-md-12 divination_column">
				<div>
					<span>Năm tuổi :</span>
					<?= $value->year_age ?>
				</div>
				<div>
					<span>Cung Hoàng Đạo :</span>
					<?= $value->zodiac ?>
				</div>
				<div>
					<span>Niên mệnh năm sinh Nữ :</span>
					<?= $value->par_year_female ?>
				</div>
				<div>
					<span>Cung mệnh nữ :</span>
					<?= $value->supply_clause_female ?>
				</div>
				<div>
					<span>Ngũ hành :</span>
					<?= $value->element ?>
				</div>
				<div style="width:210px;margin:10px auto">
					<?php
						$color = $value->color_female;
						$co = explode(",",$color);
						if(count($co) > 0){

							foreach ($co as $item){
								$item = trim($item);
								if($item == "Xanh"){
									echo "<a class='xanh'></a>";
								}
								else if($item == "Đỏ"){
									echo "<a class='do'></a>";
								}
								else if($item == "Vàng"){
									echo "<a class='vang'></a>";
								}
								else if($item == "Đen"){
									echo "<a class='den'></a>";
								}
								else if($item == "Trắng"){
									echo "<a class='trang'></a>";
								}
							}
						}
					?>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>