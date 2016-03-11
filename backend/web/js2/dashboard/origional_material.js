$(function () {

    $(document).ready(function () {

        // Build the chart
        $('#origional_material').highcharts({
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
                text: 'Xuất xứ nguyện phụ liệu',
                
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
                    y: 56.33
                }, {
                    name: 'Việt Nam',
                    y: 24.03,
                    sliced: true,
                    selected: true,
                    color: '#00CC00',
                }, {
                    name: ' Mỹ',
                    y: 0.2 
                }, {
                    name: ' Đài Loan',
                    y: 4.77
                }, {
                    name: 'Campuchia',
                    y: 0.91
                }, {
                    name: ' Úc',
                    y: 10.38
                }]
            }]
        });
    });
});