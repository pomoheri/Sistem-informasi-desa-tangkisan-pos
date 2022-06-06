var optionsChartArea = {
    series: [{
        name: 'Visits',
        data: [40, 11, 32, 45, 32, 34, 52, 41]
    }],
    chart: {
        height: 40,
        type: 'area',
        toolbar: {
            show: false
        },
        zoom: {
            enabled: false
        },
        sparkline: {
            enabled: true
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false
        },
        labels: {
            show: false,
        },
        crosshairs: {
            show: false,
            position: 'front',
            stroke: {
                width: 1,
                dashArray: 3
            }
        },
        tooltip: {
            enabled: false,
            formatter: undefined,
            offsetY: 0
        }        
    },
    yaxis: {
        min: 0,
        max: 55,
        labels: {
            show: false
        }
    },
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        },
    },
    colors: ['#975fe4'],
    fill: {
        type: 'solid'
    }
};

var optionsChartColumn = {
    series: [{
        name: 'Net Profit',
        data: [60, 50, 44, 30, 20, 45, 57, 50, 61, 45, 63, 50, 66]
    }],
    chart: {
        type: 'bar',
        height: 40,
        toolbar: {
            show: false
        },
        zoom: {
            enabled: false
        },
        sparkline: {
            enabled: true
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb'],
    },
    yaxis: {
        title: {
            text: '$ (thousands)'
        }
    },
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return "$ " + val + " thousands"
            }
        }
    }
};

var optionsChartSales = {
    series: [{
        name: 'Sales',
        data: [780, 1180, 820, 410, 580, 410, 600, 420, 800, 800, 1200, 980]
    }],
    chart: {
        type: 'bar',
        height: 350,
        toolbar: {
            show: false
        },
        zoom: {
            enabled: false
        },
        sparkline: {
            enabled: false
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '55%'
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021'],
        axisBorder: {
            show: true
        },
        axisTicks: {
            show: true
        },
    },
    yaxis: {
        axisBorder: {
            show: true
        },
        axisTicks: {
            show: true
        }
    },
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return "$ " + val + " thousands"
            }
        }
    }
};

var optionsChartRadialBar = {
    series: [44, 55, 67, 83, 75],
    chart: {
        height: 280,
        type: 'radialBar',
    },
    plotOptions: {
        radialBar: {
            dataLabels: {
                name: {
                    fontSize: '10px',
                },
                value: {
                    fontSize: '14px',
                },
                total: {
                    show: true,
                    label: 'Sales',
                    formatter: function (w) {
                        // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                        return '$ 20,341'
                    }
                }
            }
        }
    },
    labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
};

var optionsChartArea1 = {
    series: [{
        name: 'Users',
        data: [11, 40, 22, 45, 25, 44, 17]
    }],
    chart: {
        height: 40,
        type: 'area',
        toolbar: {
            show: false
        },
        zoom: {
            enabled: false
        },
        sparkline: {
            enabled: true
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false
        },
        labels: {
            show: false,
        },
        crosshairs: {
            show: false,
            position: 'front',
            stroke: {
                width: 1,
                dashArray: 3
            }
        },
        tooltip: {
            enabled: false,
            formatter: undefined,
            offsetY: 0
        }        
    },
    yaxis: {
        min: 0,
        max: 55,
        labels: {
            show: false
        }
    },
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        },
    }
};

var optionsChartArea2 = {
    series: [{
        name: 'Per Capita',
        data: [11, 40, 22, 45, 25, 44, 17]
    }],
    chart: {
        height: 40,
        type: 'area',
        toolbar: {
            show: false
        },
        zoom: {
            enabled: false
        },
        sparkline: {
            enabled: true
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"],
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false
        },
        labels: {
            show: false,
        },
        crosshairs: {
            show: false,
            position: 'front',
            stroke: {
                width: 1,
                dashArray: 3
            }
        },
        tooltip: {
            enabled: false,
            formatter: undefined,
            offsetY: 0
        }        
    },
    yaxis: {
        min: 0,
        max: 55,
        labels: {
            show: false
        }
    },
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        },
    }
};


(function () {
    "use strict";

    var chartArea = new ApexCharts(document.querySelector("#chartArea"), optionsChartArea);
    chartArea.render();

    var chartColumn = new ApexCharts(document.querySelector("#chartColumn"), optionsChartColumn);
    chartColumn.render();

    var chartSales = new ApexCharts(document.querySelector("#chartSales"), optionsChartSales);
    chartSales.render();

    var chartArea1 = new ApexCharts(document.querySelector("#chartArea1"), optionsChartArea1);
    chartArea1.render();

    var chartArea2 = new ApexCharts(document.querySelector("#chartArea2"), optionsChartArea2);
    chartArea2.render();

    var chartRadialBar = new ApexCharts(document.querySelector("#chartRadialBar"), optionsChartRadialBar);
    chartRadialBar.render();
    
})();