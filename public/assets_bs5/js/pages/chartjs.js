var seed = Date.now();

function randomize(min, max) {
    var _seed = seed;
    min = min === undefined ? 0 : min;
    max = max === undefined ? 1 : max;
    seed = (_seed * 9301 + 49297) % 233280;
    return min + (seed / 233280) * (max - min);
}

function randomScalingFactor() {
    return Math.round(randomize(-100, 100));
};

function generateData() {
    var data = [];
    for (var i = 0; i < 7; i++) {
        data.push({
            x: randomScalingFactor(),
            y: randomScalingFactor()
        });
    }
    return data;
}

$(function () {
    "use strict";

    var myLineChart = new Chart(document.getElementById('chart-line').getContext('2d'), {
        type: 'line',
		data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgb(255, 99, 132)',
                borderWidth: 1,
                data: [
                    20,
                    32,
                    27,
                    54,
                    65,
                    43,
                    35
                ],
                fill: false,
            }, {
                label: 'My Second dataset',
                fill: false,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgb(54, 162, 235)',
                borderWidth: 1,
                data: [
                    55,
                    35,
                    60,
                    80,
                    65,
                    45,
                    57
                ],
            }]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Line Chart'
                }
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Month',
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Value',
                    }
                }
            }
        }
    });

    var myAreaChart = new Chart(document.getElementById('chart-area').getContext('2d'), {
        type: 'line',
		data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgb(255, 99, 132)',
                borderWidth: 1,
                data: [
                    20,
                    32,
                    27,
                    54,
                    65,
                    43,
                    35
                ],
            }, {
                label: 'My Second dataset',
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgb(54, 162, 235)',
                borderWidth: 1,
                data: [
                    55,
                    35,
                    60,
                    80,
                    65,
                    45,
                    57
                ],
            }]
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Area Chart'
                }
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Month',
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Value',
                    }
                }
            }            
        }
    });
    
    
    var myVerticalBarChart = new Chart(document.getElementById('chart-bar-vertical').getContext('2d'), {
        type: 'bar',
        data: {
			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			datasets: [{
				label: 'Dataset 1',
				backgroundColor: 'rgba(255, 99, 132, 0.5)',
				borderColor: 'rgb(255, 99, 132)',
				borderWidth: 1,
				data: [
					-20,
					10,
					30,
					60,
					-10,
					70,
					50
				]
			}, {
				label: 'Dataset 2',
				backgroundColor: 'rgba(54, 162, 235, 0.5)',
				borderColor: 'rgb(54, 162, 235)',
				borderWidth: 1,
				data: [
					-10,
					20,
					40,
					50,
					30,
					-5,
					10
				]
			}]

		},
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Vertical Bar Chart'
                }
            }
        }
    });

    var myHorizontalBarChart = new Chart(document.getElementById('chart-bar-horizontal').getContext('2d'), {
        type: 'bar',
        data: {
			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			datasets: [{
				label: 'Dataset 1',
				backgroundColor: 'rgba(255, 99, 132, 0.5)',
				borderColor: 'rgb(255, 99, 132)',
				borderWidth: 1,
				data: [
					-20,
					10,
					30,
					60,
					-10,
					70,
					50
				]
			}, {
				label: 'Dataset 2',
				backgroundColor: 'rgba(54, 162, 235, 0.5)',
				borderColor: 'rgb(54, 162, 235)',
				borderWidth: 1,
				data: [
					-10,
					20,
					40,
					50,
					30,
					-5,
					10
				]
			}]

		},
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Horizontal Bar Chart'
                }
            }
        }
    });

    var myDonutChart = new Chart(document.getElementById('chart-donut').getContext('2d'), {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    7,
                    71,
                    26,
                    13,
                    10,
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                ],
                label: 'Dataset 1'
            }],
            labels: [
                'Red',
                'Orange',
                'Yellow',
                'Green',
                'Blue'
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Donut Chart'
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });

    var myPieChart = new Chart(document.getElementById('chart-pie').getContext('2d'), {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    7,
                    71,
                    26,
                    13,
                    10,
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                ],
                label: 'Dataset 1'
            }],
            labels: [
                'Red',
                'Orange',
                'Yellow',
                'Green',
                'Blue'
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Pie Chart'
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });    

    var myPolarChart = new Chart(document.getElementById('chart-polar').getContext('2d'), {
        type: 'polarArea',
		data: {
            datasets: [{
                data: [
                    35,
                    47,
                    60,
                    69,
                    80,
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                ],
                label: 'My dataset' // for legend
            }],
            labels: [
                'Red',
                'Orange',
                'Yellow',
                'Green',
                'Blue'
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Polar Area Chart'
                }
            },
            scale: {
                ticks: {
                    beginAtZero: true
                },
                reverse: false
            },
            animation: {
                animateRotate: false,
                animateScale: true
            }
        }
    });

    var myRadarChart = new Chart(document.getElementById('chart-radar').getContext('2d'), {
        type: 'radar',
        data: {
            labels: [['Eating', 'Dinner'], ['Drinking', 'Water'], 'Sleeping', ['Designing', 'Graphics'], 'Coding', 'Cycling', 'Running'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                data: [
                    10,
                    12,
                    15,
                    70,
                    58,
                    65,
                    79
                ]
            }, {
                label: 'My Second dataset',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgb(54, 162, 235)',
                pointBackgroundColor: 'rgb(54, 162, 235)',
                data: [
                    40,
                    1,
                    100,
                    19,
                    15,
                    40,
                    100
                ]
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Radar Chart'
                }
            },
            scale: {
                ticks: {
                    beginAtZero: true
                }
            }
        }
    });

    var myScatterChart = new Chart(document.getElementById('chart-scatter').getContext('2d'), {
        type: 'scatter',
		data: {
			datasets: [{
				label: 'My First dataset',
				borderColor: 'rgb(255, 99, 132)',
				backgroundColor: 'rgba(255, 99, 132, 0.2)',
				data: generateData()
			}, {
				label: 'My Second dataset',
				borderColor: 'rgb(54, 162, 235)',
				backgroundColor: 'rgba(54, 162, 235, 0.2)',
				data: generateData()
			}]
		},
        options: {
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Scatter Chart'
                }
            }
        }
    });

    var myComboChart = new Chart(document.getElementById('chart-combo').getContext('2d'), {
        type: 'bar',
		data: {
			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
			datasets: [{
				type: 'line',
				label: 'Dataset 1',
				borderColor: 'rgb(54, 162, 235)',
				borderWidth: 2,
				fill: false,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				]
			}, {
				type: 'bar',
				label: 'Dataset 2',
				backgroundColor: 'rgb(255, 99, 132)',
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				],
				borderColor: 'white',
				borderWidth: 2
			}, {
				type: 'bar',
				label: 'Dataset 3',
				backgroundColor: 'rgb(75, 192, 192)',
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				]
			}]
		},
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Combo Bar Line Chart'
                }
            },
            interaction: {
                mode: 'index',
                intersect: true
            }
        }
    });

});