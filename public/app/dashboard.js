Highcharts.chart('surat-keluar', {
    chart: {
        type: 'areaspline'
    },
    title: {
        text: 'Grafil Data Surat Keluar'
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 150,
        y: 100,
        floating: true,
        borderWidth: 1,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    xAxis: {
        categories: [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        ]
    },
    yAxis: {
        title: {
            text: 'Surat Keluar'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' Dokumen'
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.4
        }
    },
    series: [{
        name: 'Surat Keterangan',
        data: [3, 4, 3, 5, 4, 10, 12]
    }, {
        name: 'Surat Perizinan',
        data: [1, 3, 4, 3, 3, 5, 4]
    }]
});