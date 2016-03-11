$(function () {
    $('#top_5_revenue_of_product').highcharts({

        chart: {
            type: 'column',
             style: {
                    fontFamily: 'Calibri',
                }
        },

        title: {
            text: 'Top 5 sản phẩm thu về'
        },

        xAxis: {
            categories: ['Style A', 'Style B', 'Style C', 'Style D', 'Style E']
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: ' Triệu đô '
            }
        },

        tooltip: {
            formatter: function () {
                return '<b>' + this.x + '</b><br/>' +
                    this.series.name + ': ' + this.y + '<br/>' +
                    'Total: ' + this.point.stackTotal;
            }
        },

        plotOptions: {
            column: {
                stacking: 'normal'
            }
        },

        series: [{
            name: 'Giá trị trước thuế',
            data: [5, 3, 4, 7, 2],
            stack: 'male',
            color: '#7CB5EC'
        }, {
            name: 'Tổng giá trị',
            data: [3, 0, 4, 4, 3],
            stack: 'female',
            color:'#00cc00',
        }]
    });
});