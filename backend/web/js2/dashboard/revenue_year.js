$(function () {
    $('#revenue_year').highcharts({
        chart: {
                 style: {
                    fontFamily: 'Calibri',
                }

            },
        title: {
            text: 'Doanh thu trong năm',
            x: -20 //center
        },
        xAxis: {
            categories: ['1', '2', '3', '4', '5', '6',
                '7', '8', '9', '10', '11', '12']
        },
        yAxis: {
            title: {
                text: 'Triệu đô'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: 'Triệu'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Doanh thu trong năm',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
            color: '#7CB5EC'
        }, {
            name:'Doanh thu trước thuế',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0],
            color: '#00cc00'
        }]
    });
});