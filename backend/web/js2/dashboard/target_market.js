$(function () {
    $(document).ready(function () {

        // Build the chart
        $('#target_market').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie',
                 style: {
                    fontFamily: 'Calibri',
                }
            },
            title: {
                text: 'Thị trường trọng điểm'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Tỉ lệ',
                colorByPoint: true,
                data: [{
                    name: 'Trung Quốc',
                    y: 24.03,
                }, {
                    name: 'Bangladesh',
                    y: 0.2
                   
                }, {
                    name: ' Indonesia',
                    y: 56.33,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Ấn độ',
                    y: 4.77
                }, {
                    name: 'Hoa Kỳ',
                    y: 0.91
                }, {
                    name: ' Úc',
                    y: 10.38,
                }]
            }]
        });
    });
});