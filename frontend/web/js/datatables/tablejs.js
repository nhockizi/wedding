function datatable(id){
    alert('sasas');
	var table = $('#'+id).dataTable({
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
             "sInfo": "HIển thị _START_ đến _END_ của _TOTAL_ mục",
            "sInfoEmpty": "Hiển thị 0 đến 0 của 0 mục",
             "sInfoFiltered": "(filtered của _MAX_ tồng số trong mục)",
            "sInfoPostFix": "",
            "sUrl": ""
        },
        "aaSorting" : [[0, 'asc']],
        "iDisplayLength": 10,
        "aLengthMenu": [
            [1,10, 20, 50,100,-1],
            [1,10, 20, 50,100,'all']
        ]
    });
    $("#"+id+"_filter").hide();
}