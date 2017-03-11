// Radialize the colors
Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
    return {
        radialGradient: {
            cx: 0.5,
            cy: 0.3,
            r: 0.7
        },
        stops: [
            [0, color],
            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
        ]
    };
});

// Build the chart
Highcharts.chart('chart-populasi-desa', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Populasi Penduduk Desa - Kecamatan Koba'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                },
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Populasi',
        data: [
            { name: 'Koba', y: 56.33 },
            {
                name: 'Nibung',
                y: 24.03,
                sliced: true,
                selected: true
            },
            { name: 'Arung Dalam', y: 10.38 },
            { name: 'Kurau', y: 4.77 }, { name: 'Kurau Barat', y: 0.91 },
            { name: 'Simpang Perlang', y: 0.2 }
        ]
    }]
});