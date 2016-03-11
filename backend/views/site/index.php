<?php

/* @var $this yii\web\View */

$this->title = 'Bảng điều khiển';

?>
<script type="text/javascript">
jQuery(document).ready(function($) 
{
	// Sample Toastr Notification
	setTimeout(function()
	{			
		var opts = {
			"closeButton": true,
			"debug": false,
			"positionClass": rtl() || public_vars.$pageContainer.hasClass('right-sidebar') ? "toast-top-left" : "toast-top-right",
			"toastClass": "black",
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};

		toastr.success("You have been awarded with 1 year free subscription. Enjoy it!", "Account Subcription Updated", opts);
	}, 3000);
	
	
	// Sparkline Charts
	$('.inlinebar').sparkline('html', {type: 'bar', barColor: '#ff6264'} );
	$('.inlinebar-2').sparkline('html', {type: 'bar', barColor: '#445982'} );
	$('.inlinebar-3').sparkline('html', {type: 'bar', barColor: '#00b19d'} );
	$('.bar').sparkline([ [1,4], [2, 3], [3, 2], [4, 1] ], { type: 'bar' });
	$('.pie').sparkline('html', {type: 'pie',borderWidth: 0, sliceColors: ['#3d4554', '#ee4749','#00b19d']});
	$('.linechart').sparkline();
	$('.pageviews').sparkline('html', {type: 'bar', height: '30px', barColor: '#ff6264'} );
	$('.uniquevisitors').sparkline('html', {type: 'bar', height: '30px', barColor: '#00b19d'} );
	
	
	$(".monthly-sales").sparkline([1,2,3,5,6,7,2,3,3,4,3,5,7,2,4,3,5,4,5,6,3,2], {
		type: 'bar',
		barColor: '#485671',
		height: '80px',
		barWidth: 10,
		barSpacing: 2
	});	
	
	
	// JVector Maps
	var map = $("#map");
	
	map.vectorMap({
		map: 'europe_merc_en',
		zoomMin: '3',
		backgroundColor: '#383f47',
		focusOn: { x: 0.5, y: 0.8, scale: 3 }
	});		
	
			
	
	// Line Charts
	var line_chart_demo = $("#line-chart-demo");
	
	var line_chart = Morris.Line({
		element: 'line-chart-demo',
		data: [
			{ y: '2006', a: 100, b: 90 },
			{ y: '2007', a: 75,  b: 65 },
			{ y: '2008', a: 50,  b: 40 },
			{ y: '2009', a: 75,  b: 65 },
			{ y: '2010', a: 50,  b: 40 },
			{ y: '2011', a: 75,  b: 65 },
			{ y: '2012', a: 100, b: 90 }
		],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['October 2013', 'November 2013'],
		redraw: true
	});
	
	line_chart_demo.parent().attr('style', '');
	
	
	// Donut Chart
	var donut_chart_demo = $("#donut-chart-demo");
	
	donut_chart_demo.parent().show();
	
	var donut_chart = Morris.Donut({
		element: 'donut-chart-demo',
		data: [
			{label: "Download Sales", value: getRandomInt(10,50)},
			{label: "In-Store Sales", value: getRandomInt(10,50)},
			{label: "Mail-Order Sales", value: getRandomInt(10,50)}
		],
		colors: ['#707f9b', '#455064', '#242d3c']
	});
	
	donut_chart_demo.parent().attr('style', '');
	
	
	// Area Chart
	var area_chart_demo = $("#area-chart-demo");
	
	area_chart_demo.parent().show();
	
	var area_chart = Morris.Area({
		element: 'area-chart-demo',
		data: [
			{ y: '2006', a: 100, b: 90 },
			{ y: '2007', a: 75,  b: 65 },
			{ y: '2008', a: 50,  b: 40 },
			{ y: '2009', a: 75,  b: 65 },
			{ y: '2010', a: 50,  b: 40 },
			{ y: '2011', a: 75,  b: 65 },
			{ y: '2012', a: 100, b: 90 }
		],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Series A', 'Series B'],
		lineColors: ['#303641', '#576277']
	});
	
	area_chart_demo.parent().attr('style', '');
	
	
	
});


function getRandomInt(min, max) 
{
	return Math.floor(Math.random() * (max - min + 1)) + min;
}
</script>


<div class="row">
	<div class="col-sm-3">
	
		<div class="tile-stats tile-red">
			<div class="icon"><i class="entypo-basket"></i></div>
			<div class="num" data-start="0" data-end="420" data-postfix="" data-duration="1500" data-delay="0">0</div>
			
			<h3> Tổng đơn hàng</h3>
			<p> Tổng số đơn hàng trong tháng</p>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-green">
			<div class="icon"><i class="entypo-check"></i></div>
			<div class="num" data-start="0" data-end="200" data-postfix="" data-duration="1500" data-delay="600">0</div>
			
			<h3> Đơn hàng xử lý</h3>
			<p> Tổng số đơn hàng đã xử lý</p>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-aqua">
			<div class="icon"><i class="entypo-attention"></i></div>
			<div class="num" data-start="0" data-end="120" data-postfix="" data-duration="1500" data-delay="1200">0</div>
			
			<h3> Đơn hàng chờ NPL</h3>
			<p> Tổng số đơn hàng chờ NPL về</p>
		</div>
		
	</div>
	
	<div class="col-sm-3">
	
		<div class="tile-stats tile-blue">
			<div class="icon"><i class="entypo-bag"></i></div>
			<div class="num" data-start="0" data-end="100" data-postfix="" data-duration="1500" data-delay="1800">0</div>
			
			<h3> Đơn hàng sản xuất</h3>
			<p> Tổng số đơn hàng sản xuất</p>
		</div>
		
	</div>
</div>

<br />

<div class="row">
	<div class="col-sm-12">
	
		<div class="panel panel-primary" id="charts_env">
		
			<div class="panel-heading">
				<div class="panel-title">Doanh thu</div>
				
				<div class="panel-options">
					<ul class="nav nav-tabs">
						<li class=""><a href="#area-chart" data-toggle="tab">Biểu đồ vùng</a></li>
						<li class="active"><a href="#line-chart" data-toggle="tab"> Biểu đồ đường</a></li>
						<li class=""><a href="#pie-chart" data-toggle="tab"> Biểu đồ tròn</a></li>
					</ul>
				</div>
			</div>
	
			<div class="panel-body">
			
				<div class="tab-content">
				
					<div class="tab-pane" id="area-chart">							
						<div id="area-chart-demo" class="morrischart" style="height: 300px"></div>
					</div>
					
					<div class="tab-pane active" id="line-chart">
						<div id="line-chart-demo" class="morrischart" style="height: 300px"></div>
					</div>
					
					<div class="tab-pane" id="pie-chart">
						<div id="donut-chart-demo" class="morrischart" style="height: 300px;"></div>
					</div>
					
				</div>
				
			</div>

			<table class="table table-bordered table-responsive">

				<thead>
					<tr>
						<th width="50%" class="col-padding-1">
							<div class="pull-left">
								<div class="h4 no-margin">Doanh thu trước thuế</div>
								<small>54,127</small>
							</div>
							<span class="pull-right pageviews">4,3,5,4,5,6,5</span>
							
						</th>
						<th width="50%" class="col-padding-1">
							<div class="pull-left">
								<div class="h4 no-margin">Doanh thu các tháng trong năm</div>
								<small>25,127</small>
							</div>
							<span class="pull-right uniquevisitors">2,3,5,4,3,4,5</span>
						</th>
					</tr>
				</thead>
				
			</table>
			
		</div>	

	</div>

	
</div>


<br />

<div class="row">
	
	<div class="col-sm-3">
	
		<div class="tile-progress tile-red">
			<div class="tile-header">
				<h3>Tổng số đơn hàng</h3>
				<span> Tổng số đơn hàng so với tháng trước</span>
			</div>
			
			<div class="tile-progressbar">
				<span data-fill="35.5%"></span>
			</div>
			
			<div class="tile-footer">
				<h4>
					<span class="pct-counter">0</span>% tăng
				</h4>
				
				<!-- <span>so far in our blog and our website</span> -->
			</div>
		</div>
	</div>
	<div class="col-sm-3">
	
		<div class="tile-progress tile-green">
			<div class="tile-header">
				<h3> Đơn hàng xử lý</h3>
				<span> Đơn hàng xử lý so với tháng trước</span>
			</div>
			
			<div class="tile-progressbar">
				<span data-fill="51.2%"></span>
			</div>
			
			<div class="tile-footer">
				<h4>
					<span class="pct-counter">0</span>% tăng
				</h4>
				
				<!-- <span>so far in our blog and our website</span> -->
			</div>
		</div>
		</div>
		<div class="col-sm-3">
	
		<div class="tile-progress tile-aqua">
			<div class="tile-header">
				<h3>Đơn hàng chờ NPL</h3>
				<span> Tổng đơn hàng chờ so với tháng trước</span>
			</div>
			
			<div class="tile-progressbar">
				<span data-fill="69.9%"></span>
			</div>
			
			<div class="tile-footer">
				<h4>
					<span class="pct-counter">0</span>% tăng
				</h4>
				
				<!-- <span>so far in our blog and our website</span> -->
			</div>
		</div>

	</div>
	<div class="col-sm-3">
	
		<div class="tile-progress tile-aqua">
			<div class="tile-header">
				<h3> Đơn hàng sản xuất</h3>
				<span>Tổng đơn hàng sx so với tháng trước</span>
			</div>
			
			<div class="tile-progressbar">
				<span data-fill="69.9%"></span>
			</div>
			
			<div class="tile-footer">
				<h4>
					<span class="pct-counter">0</span>% tăng
				</h4>
				
				<!-- <span>so far in our blog and our website</span> -->
			</div>
		</div>

	</div>
	
</div>

<br />


<script type="text/javascript">
	// Code used to add Todo Tasks
	jQuery(document).ready(function($)
	{
		var $todo_tasks = $("#todo_tasks");
		
		$todo_tasks.find('input[type="text"]').on('keydown', function(ev)
		{
			if(ev.keyCode == 13)
			{
				ev.preventDefault();
				
				if($.trim($(this).val()).length)
				{
					var $todo_entry = $('<li><div class="checkbox checkbox-replace color-white"><input type="checkbox" /><label>'+$(this).val()+'</label></div></li>');
					$(this).val('');
					
					$todo_entry.appendTo($todo_tasks.find('.todo-list'));
					$todo_entry.hide().slideDown('fast');
					replaceCheckboxes();
				}
			}
		});
	});
</script>

<div class="row">
	
	

	<div class="col-sm-12">
		
		<script type="text/javascript">
			jQuery(document).ready(function($)
			{
				var map = $("#map-2");
				
				map.vectorMap({
					map: 'europe_merc_en',
					zoomMin: '3',
					backgroundColor: '#383f47',
					focusOn: { x: 0.5, y: 0.8, scale: 3 }
				});
			});
		</script>
		
		<div class="tile-group">
			
			<div class="tile-left">
				<div class="tile-entry">
					<h3>Thị trường trọng điểm</h3>
					<!-- <span>top visitors location</span> -->
				</div>
				
				<div class="tile-entry">
					<img src="<?= Yii::$app->request->baseUrl ?>custom/assets/images/sample-al.png" alt="" class="pull-right op" />
					
					<h4>Trung Quốc</h4>
					<span>90%</span>
				</div>
				
				<div class="tile-entry">
					<img src="<?= Yii::$app->request->baseUrl ?>custom/assets/images/sample-it.png" alt="" class="pull-right op" />
					
					<h4>Italy</h4>
					<span>8%</span>
				</div>
				
				<div class="tile-entry">
					<img src="<?= Yii::$app->request->baseUrl ?>custom/assets/images/sample-au.png" alt="" class="pull-right op" />
					
					<h4>Austria</h4>
					<span>2%</span>
				</div>
			</div>
			
			<div class="tile-right">
				
				<div id="map-2" class="map"></div>
				
			</div>
			
		</div>
		
	</div>

</div>
<!-- Footer -->
<footer class="main">
	
		&copy; 2007-2015 <a href="http://www.cloudteam.vn/" target="_blank"><strong>Cloudteam</strong></a>, Inc. Powered by Cloudteam. All rights reservered
	
</footer>	</div>

<!-- Chat Histories -->
<ul class="chat-history" id="sample_history">
	<li>
		<span class="user">Art Ramadani</span>
		<p>Are you here?</p>
		<span class="time">09:00</span>
	</li>
	
	<li class="opponent">
		<span class="user">Catherine J. Watkins</span>
		<p>This message is pre-queued.</p>
		<span class="time">09:25</span>
	</li>
	
	<li class="opponent">
		<span class="user">Catherine J. Watkins</span>
		<p>Whohoo!</p>
		<span class="time">09:26</span>
	</li>
	
	<li class="opponent unread">
		<span class="user">Catherine J. Watkins</span>
		<p>Do you like it?</p>
		<span class="time">09:27</span>
	</li>
</ul>




<!-- Chat Histories -->
<ul class="chat-history" id="sample_history_2">
	<li class="opponent unread">
		<span class="user">Daniel A. Pena</span>
		<p>I am going out.</p>
		<span class="time">08:21</span>
	</li>
	
	<li class="opponent unread">
		<span class="user">Daniel A. Pena</span>
		<p>Call me when you see this message.</p>
		<span class="time">08:27</span>
	</li>
</ul>	
	</div>

<!-- Sample Modal (Default skin) -->
<div class="modal fade" id="sample-modal-dialog-1">
	<div class="modal-dialog">
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Widget Options - Default Modal</h4>
			</div>
			
			<div class="modal-body">
				<p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- Sample Modal (Skin inverted) -->
<div class="modal invert fade" id="sample-modal-dialog-2">
	<div class="modal-dialog">
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Widget Options - Inverted Skin Modal</h4>
			</div>
			
			<div class="modal-body">
				<p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>

<!-- Sample Modal (Skin gray) -->
<div class="modal gray fade" id="sample-modal-dialog-3">
	<div class="modal-dialog">
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Widget Options - Gray Skin Modal</h4>
			</div>
			
			<div class="modal-body">
				<p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
	
	

