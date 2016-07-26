// http://code.highcharts.com/zips/Highcharts-4.0.1.zip

function parseArray(data) {
    var array = [];
    for (var i = 0; i < data.length; i++) {
        array.push([data[i].artist_name, parseFloat(data[i].percentage)]);
    }
    return array;
}

function makeGraphic(dataGraphic, graphicTitle, type) {
    $('#graphic').empty();
    switch(type) {
        default:
        case 1:
            pieChart(dataGraphic, graphicTitle);
            break;
        case 2:
            circleDonut(dataGraphic, graphicTitle);
            break;
        case 3:
            semiCircleDonut(dataGraphic, graphicTitle);
    }
}

function pieChart(dataGraphic, graphicTitle) {
    $('#graphic').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: graphicTitle,
            align: 'center',
            verticalAlign: 'top'
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
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: parseArray(dataGraphic)
        }]
    });
}

function circleDonut(dataGraphic, graphicTitle) {
    $('#graphic').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: graphicTitle,
            align: 'center',
            verticalAlign: 'top'
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
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            innerSize: '70%',
            data: parseArray(dataGraphic)
        }]
    });
}

function semiCircleDonut(dataGraphic, graphicTitle) {
    $('#graphic').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: graphicTitle,
            align: 'center',
            verticalAlign: 'top'
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
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%']
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            innerSize: '50%',
            data: parseArray(dataGraphic)
        }]
    });
}
