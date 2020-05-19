$(document).ready(function () {
    $('#customerSegment .item').tab();

    //Modal
    $('.personel').click(function () {
       
        $('#showModal').modal('show');
        
    });


    //Dashboard Data tables
    $(document).ready(function () {
        var table = $('#dashboardTable').DataTable({
            lengthChange: false,
            buttons: ['excel', 'pdf'],
            order: [
                [4, "asc"]
            ],

        });

        table.buttons().container()
            .appendTo($('div.eight.column:eq(0)', table.table().container()));



    });





    // toggler
    $('.ui.dropdown').dropdown();
    $('.sidebar-menu-toggler').on('click', function () {
        var target = $(this).data('target');
        $(target)
            .sidebar({
                dinPage: true,
                transition: 'overlay',
                mobileTransition: 'overlay'
            })
            .sidebar('toggle');
    });

});

// sparkline

$(document).ready(function () {
    $("#sparkline").sparkline([122,145,152,157,164,175,187,190,194,198,200,204], {
        type: 'line',
        barWidth: 7,
        fillColor:'#a7d6e3',
        lineColor:'#2aa8cc',
        highlightLineColor:'white',
        spotColor:false,
        maxSpotColor:'#56b059',
        minSpotColor:'red',
        barColor: '#56b059',
        zeroAxis: false,
        width: '100%',
        height: '91px',
        enableTagOptions:true,
        tagValuesAttribute:'arif'




    });
});


// PieChart (echart)

var eChart = echarts.init(document.getElementById('echart'));
var option = {
    tooltip: {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)",
        backgroundColor: 'rgba(33,33,33,1)',
        borderRadius: 0,
        padding: 10,
        textStyle: {
            color: '#fff',
            fontStyle: 'normal',
            fontWeight: 'normal',
            fontFamily: "'Roboto', sans-serif",
            fontSize: 12
        }
    },
    legend: {
        show: false
    },
    toolbox: {
        show: false,
    },
    calculable: true,
    itemStyle: {
        normal: {
            shadowBlur: 5,
            shadowColor: 'rgba(0, 0, 0, 0.5)'
        }
    },
    animation:true,
    animationType: 'scale',
    animationEasing: 'cubicOut',
    animationDelay: function (idx) {
        return idx * 100;
    },
    series: [{
        name: 'Daire Durumu',
        type: 'pie',
        radius: '80%',
        center: ['50%', '50%'],
        roseType: 'radius',
        color: ['#119dd2', '#d36ee8', '#667add'],
        label: {
            normal: {
                fontFamily: "'Roboto', sans-serif",
                fontSize: 12
            }
        },
        data: [{
                value: 119,
                name: 'Kira'
            },
            {
                value: 54,
                name: 'Boş'
            },
            {
                value: 100,
                name: 'Satıldı'
            },
        ].sort(function (a, b) {
            return a.value - b.value;
        }),
    }],
    
};
eChart.setOption(option);
eChart.resize();





// Income-Outcome Chart

var incomeChart = echarts.init(document.getElementById('incomeChart'));
var xAxis = [];
var tarih = new Date().setFullYear(new Date().getFullYear() - 1);;
var months = ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"]
var lineData = [];
var barData = [];


for (var i = 0; i < 12; i++) {
    // second * hour * day * month
    var date = new Date(tarih += 1000 * 3600 * 24 * 30);
    console.log(date)
    xAxis.push([
        months[date.getMonth()],
        date.getFullYear()
    ].join(' '));
    var b = parseInt((Math.random() + 2) * 20000);
    var d = parseInt((Math.random() + 1) * 18000);
    barData.push(d)
    lineData.push(b);
}

option = {
    backgroundColor: 'transparent',
    toolbox: {
        show: true,

        feature: {
            saveAsImage: {
                type: 'png',
                title: 'Görüntüyü Kaydet',
                name: 'Gelir&Gider Grafiği',
                dataView: {
                    show: true
                }
            },
            magicType: {
                show: true,
                title: {
                    line: 'Line',
                    bar: 'Bar',
                    stack: 'Stack'
                },
                type: ['line', 'bar']

            }
        },
    },
    textStyle: {
        fontWeight: 'bold'
    },

    grid: {
        show: false,
        containLabel: false,
    },
    dataZoom: [{
        xAxisIndex: [0],
        filterMode: 'filter',
        type: 'slider',
        start: 0,
        end: 100
    }],
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    legend: {
        data: ['Gelir', 'Gider'],
        textStyle: {
            color: '#ccc'
        }
    },
    xAxis: {
        data: xAxis,
        axisLine: {
            lineStyle: {
                color: '#ccc'
            }
        }
    },
    yAxis: {
        splitLine: {
            show: false
        },
        axisLine: {
            lineStyle: {
                color: '#ccc'
            }
        }
    },
    series: [{
        name: 'Gelir',
        type: 'bar',
        smooth: true,
        showAllSymbol: true,
        symbol: 'circle',
        symbolSize: 5,
        itemStyle: {
            barBorderRadius: 5,
            color: '#2aa8cc',
        },
        data: lineData
    }, {
        name: 'Gider',
        type: 'bar',
        smooth: true,
        showAllSymbol: true,
        symbol: 'circle',
        symbolSize: 5,
        lineStyle: {

        },
        itemStyle: {
            barBorderRadius: 5,
            color: new echarts.graphic.LinearGradient(
                0, 0, 0, 1,
                [{
                        offset: 0,
                        color: '#bababa'
                    },
                    {
                        offset: 1,
                        color: '#d3d3d3'
                    }
                ]
            )
        },
        data: barData
    }, ]
};
incomeChart.setOption(option);



// Gauge Chart
var gaugeChart = echarts.init(document.getElementById('gauge'));
option = {
    tooltip: {
        formatter: '{a}: {c}₺ <br/>{b}:31850₺ ',

    },
    textStyle: {
        fontFamily: 'Roboto',
    },

    markArea: {
        label: {
            show: true,
            color: 'black',
            fontSize: 12,
        },
        silent: true,
    },

    splitLine: {
        show: true,

    },

    series: [{
        splitLine: {
            show: false,
            length: 1,
        },
        axisLine: {
            lineStyle: {
                color: [
                    [0.2, '#c23531'],
                    [0.8, '#63869e'],
                    [1, '#91c7ae']
                ],
                width: 3.5,

            }
        },
        axisLabel: {
            fontSize: 6,
            fontWeight: 'lighter',
            lineHeight: 15,
            padding: [0, 3, 0, 3],
            formatter: function (value) {
                return value
            }
        },
        axisTick: {
            show: true,
        },
        pointer: {
            length: '60%',
            width: 2,
        },
        animationDuration: 12500,
        title: {
            show: false,
        },
        splitNumber: 5,
        min: 0,
        max: 97600,
        radius: '100%',
        name: 'Ödenen',
        type: 'gauge',
        detail: {
            formatter: '{value}₺',
            fontSize: 12,
            fontFamily: 'Roboto',
            padding: [0, 0, 15, 0]
        },
        data: [{
            value: 65750,
            name: 'Kalan'
        }]
    }]
};
gaugeChart.setOption(option);