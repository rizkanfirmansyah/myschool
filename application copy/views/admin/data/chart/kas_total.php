<script>
        // Pie Chart

           var ctx = document.getElementById("dataTotalKas");
            var dataTotalKas = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Laba","Rugi"],
                    datasets: [{
                             label: "Data",
                              backgroundColor: ['#1cc88a', '#e74a3b'],
                              hoverBackgroundColor: ['#1cc88a', '#e74a3b'],
                              borderColor: "#4e73df",
                            data: ["<?= $labaToday['nominal']; ?>","<?= $rugiToday['nominal']; ?>"],
                        }],
                },
               options: {
                    maintainAspectRatio: false,
                    layout: {
                      padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                      }
                    },
                    scales: {
                      xAxes: [{
                        time: {
                          unit: 'month'
                        },
                        gridLines: {
                          display: false,
                          drawBorder: false
                        },
                        ticks: {
                          maxTicksLimit: 6
                        },
                        maxBarThickness: 100,
                      }],
                      yAxes: [{
                        ticks: {
                          maxTicksLimit: 5,
                          padding: 10,
                          // Include a dollar sign in the ticks
                          callback: function(value, index, values) {
                            return number_format(value);
                          }
                        },
                        gridLines: {
                          color: "rgb(234, 236, 244)",
                          zeroLineColor: "rgb(234, 236, 244)",
                          drawBorder: false,
                          borderDash: [2],
                          zeroLineBorderDash: [2]
                        }
                      }],
                    },
                    legend: {
                      display: false
                    },
                    tooltips: {
                      titleMarginBottom: 10,
                      titleFontColor: '#6e707e',
                      titleFontSize: 14,
                      backgroundColor: "rgb(255,255,255)",
                      bodyFontColor: "#858796",
                      borderColor: '#dddfeb',
                      borderWidth: 1,
                      xPadding: 15,
                      yPadding: 15,
                      displayColors: false,
                      caretPadding: 10,
                      callbacks: {
                        label: function(tooltipItem, chart) {
                          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                          return datasetLabel + ' : ' + number_format(tooltipItem.yLabel);
                        }
                      }
                    },
                  }
                });

</script>