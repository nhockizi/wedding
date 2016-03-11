$(document).ready(function(){
	// search autocomplete
	/*$('#search_3d_ts').keyup(function(){
	     var data=$('#search_3d_ts').val();
	     var host =$(location).attr('host');
		 $.ajax({
		   type:'POST',
		   url:"http://"+host+"/time-sheet/searchautocomplete",
		   data:"data="+data,
		   dataType: "json",
		   success: function(msg){
		        var availableTags = msg;
				$("#search_3d_ts").autocomplete({
				   source: availableTags
				});
		   }
		});

	});*/
	// filter theo location
	$("#ts_filter_location").change(function(){
        var location=($("#ts_filter_location").val());
        var form_data ={
            LOCATION:(location),
        };
            $.ajax({
                url: "/time-sheet/filtertimesheet",
                type: 'POST',
                data:form_data,
                dataType:'Json',
                success: function(result){
                	scheduler.clearAll();
                    scheduler.parse(result['tt'],"json");
                    $("#ts_filter_project").html(result['project']);
                    $("#ts_filter_product").html(result['product']);
                    $("#ts_filter_team").html(result['team']);
                    $("#ts_filter_user").html(result['user']);
            }});

        });
	// filter theo project
	$("#ts_filter_project").change(function(){
        var project=($("#ts_filter_project").val());
        var form_data ={
            PROJECT:(project),
        };
            $.ajax({
                url: "/time-sheet/filtertimesheet",
                type: 'POST',
                data:form_data,
                dataType:'Json',
                success: function(result){
                	scheduler.clearAll();
                    scheduler.parse(result['tt'],"json");
                    $("#ts_filter_product").html(result['product']);
                    $("#ts_filter_team").html(result['team']);
                    $("#ts_filter_user").html(result['user']);
            }});

        });
	// filter theo product
	$("#ts_filter_product").change(function(){
        var product=($("#ts_filter_product").val());
        var form_data ={
            PRODUCT:(product),
        };
            $.ajax({
                url: "/time-sheet/filtertimesheet",
                type: 'POST',
                data:form_data,
                dataType:'Json',
                success: function(result){
                	scheduler.clearAll();
                    scheduler.parse(result['tt'],"json");
                    $("#ts_filter_team").html(result['team']);
                    $("#ts_filter_user").html(result['user']);
            }});

        });
	// filter theo team
	$("#ts_filter_user_group").change(function(){
        var team=($("#ts_filter_team").val());
        var form_data ={
            TEAM:(team),
        };
            $.ajax({
                url: "/time-sheet/filtertimesheet",
                type: 'POST',
                data:form_data,
                dataType:'Json',
                success: function(result){
                	scheduler.clearAll();
                    scheduler.parse(result['tt'],"json");
                    $("#ts_filter_user").html(result['user']);
            }});

        });
	// filter theo user
	$("#ts_filter_user").change(function(){
        var user=($("#ts_filter_user").val());
        var form_data ={
            USER:(user),
        };
            $.ajax({
                url: "/time-sheet/filtertimesheet",
                type: 'POST',
                data:form_data,
                dataType:'Json',
                success: function(result){
                	scheduler.clearAll();
                    scheduler.parse(result['tt'],"json");
            }});

        });
	// end thay doi theo user id
	// tab search 3d
	/*$("#search_3d_ts").keypress(function(e){
		if(e.which ==13){
			var name=($("#search_3d_ts").val());
        	var host =$(location).attr('host');
            var form_data ={
                    ID:(name),
            };
            $.ajax({
                url: "http://"+host+"/time-sheet/changetimesheetname",
                type: 'POST',
                data:form_data,
                dataType:'Json',
                success: function(result){                	
                	scheduler.clearAll();
                    scheduler.parse(result['tt'],"json");
            }});
            }
    });*/
	// end tab search
	
	/*// su kien click vao o trong trong timesheet
	scheduler.attachEvent("onEmptyClick", function(date , event){
		var action_data = scheduler.getActionData(event);
		var day = scheduler.templates.month_day(date);
		var month = scheduler.date.to_fixed(date.getMonth()+1);
		var year = scheduler.date.to_fixed(date.getFullYear());
		var date_click = year+'-'+month+'-'+day;
		// thêm mới
		$.get('time-sheet/inputhourstimesheet', function(data){
			 $('#modal_spent_time').modal('show')
				.find('#modalContent_spent_time')
				.html(data);
			 $("#timesheet-create_date").val(date_click).prop("readonly", true);
			 $("#update_spent_time").click(function(){
			 	var host =$(location).attr('host');
			 	var spt = $("#timesheet-spent_time").val();
				 if(spt<1 || spt >20)
				 {
				 	alert("Nhập spent time trong khoảng 1-20");
				 	return false;
				 }
				 var create_date = $("#timesheet-create_date").val();
				 var comment = $("#timesheet-comment").val();
				 var task_id = $("#timesheet-task_id").val();
				 var status = $("#timesheet-status").val();
				 var form_data ={
					spent:(spt),
					create:(create_date),
					COMMENT:(comment),
					TASK_ID:(task_id),
					STATUS:(status)
				};
				$(".close").click();
		        $.ajax({
		            url: "http://"+host+"/time-sheet/createtimesheet",
		            type: 'POST',
		            dataType:'Json',
		            data:form_data,
		            success: function(result){
		                scheduler.parse(result['tt'],"json");
		        }});
			 });
		});
	});*/
	
	// su kien click vao event
	scheduler.attachEvent("onClick", function (id, e){
		// click vao task tren timesheet
		$.get('time-sheet/updatetask', {'id':id},function(data){
			$('#modal_report_task').modal('show')
				.find('#modalContent_report_task')
				.html(data);
			// update task tren timesheet
			$("#update_task").click(function(){
			 	var host =$(location).attr('host');
			 	var task_percentage_done= $("#task-percentage_done").val();
			 	var task_note= $("#task-note").val();
				 var form_data ={
				 	ID:(id),
				 	task_pd:(task_percentage_done),
				 	tasknote:(task_note)
				};
				 $(".close").click();
		        $.ajax({
		            url: "http://"+host+"/time-sheet/updatereporttask",
		            type: 'POST',
		            dataType:'Json',
		            data:form_data,
		            success: function(result){
		            	scheduler.clearAll();
		                scheduler.parse(result['tt'],"json");              
		        }});
			 });
			//end update
			// close task tren timesheet
			$("#close_task").click(function(){
			 	var host =$(location).attr('host');
			 	//var task_percentage_done= $("#task-percentage_done").val();
			 	var task_note= $("#task-note").val();
				 var form_data ={
				 	ID:(id),
				 	//task_pd:(task_percentage_done),
				 	tasknote:(task_note)
				};
				 $(".close").click();
		        $.ajax({
		            url: "http://"+host+"/time-sheet/closereporttask",
		            type: 'POST',
		            dataType:'Json',
		            data:form_data,
		            success: function(result){
		            	scheduler.clearAll();
		                scheduler.parse(result['tt'],"json");              
		        }});
			 });
			//close update
		});
		
  });
});
