// function datatable(id){
//  var table = $('#'+id).dataTable({
//       "oLanguage": {
//            "sLengthMenu": "Show _MENU_ entries",
//             "sSearch": "Search:",
//             "oPaginate": {
//                 "sPrevious": "Previous",
//                 "sNext": "Next"
//             },
//             "sEmptyTable": "No data",
//             "sProcessing": "Loading...",
//             "sZeroRecords": "No matching records found",
//              "sInfo": "Showing _START_ to _END_ of _TOTAL_ entries",
//             "sInfoEmpty": "Showing 0 to 0 of 0 entries",
//              "sInfoFiltered": "(filtered from _MAX_ total entries)",
//             "sInfoPostFix": "",
//             "sUrl": ""
//         },
//         "aaSorting" : [[0, 'asc']],
//         "iDisplayLength": 5,
//         "aLengthMenu": [
//             [5,10, 10, 15, 20, 50, 100,-1],
//             [5,10, 10, 15, 20, 50, 100,'all']
//         ]
//     });
// }
function datatable(id) {
    var table = $('#' + id).dataTable({
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
        "aaSorting": [
            [0, 'asc']
        ],
        "iDisplayLength": 10,
        "aLengthMenu": [
            [1, 10, 20, 50, 100, -1],
            [1, 10, 20, 50, 100, 'all']
        ]
    });
    // $("#"+id+"_filter").hide();
}
$.fn.dataTable.pipeline = function(opts) {
    // Configuration options
    var conf = $.extend({
        pages: 5, // number of pages to cache
        url: '', // script url
        data: null, // function or object with parameters to send to the server
        // matching how `ajax.data` works in DataTables
        method: 'POST' // Ajax HTTP method
    }, opts);

    // Private variables for storing the cache
    var cacheLower = -1;
    var cacheUpper = null;
    var cacheLastRequest = null;
    var cacheLastJson = null;

    return function(request, drawCallback, settings) {
        var ajax = false;
        var requestStart = request.start;
        var drawStart = request.start;
        var requestLength = request.length;
        var requestEnd = requestStart + requestLength;

        if (settings.clearCache) {
            // API requested that the cache be cleared
            ajax = true;
            settings.clearCache = false;
        } else if (cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper) {
            // outside cached data - need to make a request
            ajax = true;
        } else if (JSON.stringify(request.order) !== JSON.stringify(cacheLastRequest.order) ||
            JSON.stringify(request.columns) !== JSON.stringify(cacheLastRequest.columns) ||
            JSON.stringify(request.search) !== JSON.stringify(cacheLastRequest.search)
        ) {
            // properties changed (ordering, columns, searching)
            ajax = true;
        }

        // Store the request for checking next time around
        cacheLastRequest = $.extend(true, {}, request);

        if (ajax) {
            // Need data from the server
            if (requestStart < cacheLower) {
                requestStart = requestStart - (requestLength * (conf.pages - 1));

                if (requestStart < 0) {
                    requestStart = 0;
                }
            }

            cacheLower = requestStart;
            cacheUpper = requestStart + (requestLength * conf.pages);

            request.start = requestStart;
            request.length = requestLength * conf.pages;

            // Provide the same `data` options as DataTables.
            if ($.isFunction(conf.data)) {
                // As a function it is executed with the data object as an arg
                // for manipulation. If an object is returned, it is used as the
                // data object to submit
                var d = conf.data(request);
                if (d) {
                    $.extend(request, d);
                }
            } else if ($.isPlainObject(conf.data)) {
                // As an object, the data given extends the default
                $.extend(request, conf.data);
            }

            settings.jqXHR = $.ajax({
                "type": conf.method,
                "url": conf.url,
                "data": request,
                "dataType": "json",
                "cache": false,
                "success": function(json) {
                    cacheLastJson = $.extend(true, {}, json);

                    if (cacheLower != drawStart) {
                        json.data.splice(0, drawStart - cacheLower);
                    }
                    json.data.splice(requestLength, json.data.length);

                    drawCallback(json);
                }
            });
        } else {
            json = $.extend(true, {}, cacheLastJson);
            json.draw = request.draw; // Update the echo for each response
            json.data.splice(0, requestStart - cacheLower);
            json.data.splice(requestLength, json.data.length);

            drawCallback(json);
        }
    };
};
// Register an API method that will empty the pipelined data, forcing an Ajax
// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
$.fn.dataTable.Api.register('clearPipeline()', function() {
    return this.iterator('table', function(settings) {
        settings.clearCache = true;
    });
});
