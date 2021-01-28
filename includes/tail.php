                </div>
            </div>
        </div>
        <!-- main content area end -->
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="./assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/metisMenu.min.js"></script>
    <script src="./assets/js/jquery.slimscroll.min.js"></script>
    <script src="./assets/js/jquery.slicknav.min.js"></script>
    <!-- datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="./assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="./assets/js/pie-chart.js"></script>
    <!-- all bar chart -->
    <script src="./assets/js/bar-chart.js"></script>
    <!-- others plugins -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/scripts.js"></script>

    <script>
    function setData(d , ctx) {
        console.log(ctx);
            Chart.defaults.global.defaultFontColor = 'black';
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        d[0].TIME, d[1].TIME, d[2].TIME, d[3].TIME, d[4].TIME, d[5].TIME, d[6].TIME, d[7].TIME, d[8].TIME, d[9].TIME,
                        d[10].TIME, d[11].TIME, d[12].TIME, d[13].TIME, d[14].TIME, d[15].TIME, d[16].TIME, d[17].TIME, d[18].TIME, d[19].TIME
                    ],
                    datasets: [{
                            label: 'CPU Usage',
                            data: [
                                d[0].CPU_USAGE, d[1].CPU_USAGE, d[2].CPU_USAGE, d[3].CPU_USAGE, d[4].CPU_USAGE,
                                d[5].CPU_USAGE, d[6].CPU_USAGE, d[7].CPU_USAGE, d[8].CPU_USAGE, d[9].CPU_USAGE,
                                d[10].CPU_USAGE, d[11].CPU_USAGE, d[12].CPU_USAGE, d[13].CPU_USAGE, d[14].CPU_USAGE,
                                d[15].CPU_USAGE, d[16].CPU_USAGE, d[17].CPU_USAGE, d[18].CPU_USAGE, d[19].CPU_USAGE
                            ],
                            backgroundColor: 'rgba(300, 40, 90, 0.3)',
                            borderColor: 'rgba(300, 40, 90, 1)',
                            borderWidth: 2,
                            pointBackgroundColor: 'rgba(255, 255, 255, 1)',
                            pointBorderColor: 'rgba(23, 30, 60, 1)'
                        },
                        {
                            label: 'BG CPU Usage',
                            data: [
                                d[0].bg_cpu_usage, d[1].bg_cpu_usage, d[2].bg_cpu_usage, d[3].bg_cpu_usage, d[4].bg_cpu_usage,
                                d[5].bg_cpu_usage, d[6].bg_cpu_usage, d[7].bg_cpu_usage, d[8].bg_cpu_usage, d[9].bg_cpu_usage,
                                d[10].bg_cpu_usage, d[11].bg_cpu_usage, d[12].bg_cpu_usage, d[13].bg_cpu_usage, d[14].bg_cpu_usage,
                                d[15].bg_cpu_usage, d[16].bg_cpu_usage, d[17].bg_cpu_usage, d[18].bg_cpu_usage, d[19].bg_cpu_usage
                            ],
                            backgroundColor: 'rgba(33, 200, 60, 0.3)',
                            borderColor: 'rgba(33, 200, 60, 1)',
                            borderWidth: 2,
                            pointBackgroundColor: 'rgba(255, 255, 255, 1)',
                            pointBorderColor: 'rgba(23, 30, 60, 1)'
                        },
                        {
                            label: 'CPU DB WAIT',
                            data: [
                                d[0].CPU_ORA_WAIT, d[1].CPU_ORA_WAIT, d[2].CPU_ORA_WAIT, d[3].CPU_ORA_WAIT, d[4].CPU_ORA_WAIT,
                                d[5].CPU_ORA_WAIT, d[6].CPU_ORA_WAIT, d[7].CPU_ORA_WAIT, d[8].CPU_ORA_WAIT, d[9].CPU_ORA_WAIT,
                                d[10].CPU_ORA_WAIT, d[11].CPU_ORA_WAIT, d[12].CPU_ORA_WAIT, d[13].CPU_ORA_WAIT, d[14].CPU_ORA_WAIT,
                                d[15].CPU_ORA_WAIT, d[16].CPU_ORA_WAIT, d[17].CPU_ORA_WAIT, d[18].CPU_ORA_WAIT, d[19].CPU_ORA_WAIT
                            ],
                            backgroundColor: 'rgba(100, 340, 235, 0.3)',
                            borderColor: 'rgba(100, 340, 235, 1)',
                            borderWidth: 2,
                            pointBackgroundColor: 'rgba(255, 255, 255, 1)',
                            pointBorderColor: 'rgba(23, 30, 60, 1)'
                        },
                        {
                            label: 'SCHEDULER',
                            data: [
                                d[0].SCHEDULER, d[1].SCHEDULER, d[2].SCHEDULER, d[3].SCHEDULER, d[4].SCHEDULER,
                                d[5].SCHEDULER, d[6].SCHEDULER, d[7].SCHEDULER, d[8].SCHEDULER, d[9].SCHEDULER,
                                d[10].SCHEDULER, d[11].SCHEDULER, d[12].SCHEDULER, d[13].SCHEDULER, d[14].SCHEDULER,
                                d[15].SCHEDULER, d[16].SCHEDULER, d[17].SCHEDULER, d[18].SCHEDULER, d[19].SCHEDULER
                            ],
                            backgroundColor: 'rgba(255, 206, 86, 0.3)',
                            borderColor: 'rgba(255, 206, 86, 1)',
                            borderWidth: 2,
                            pointBackgroundColor: 'rgba(255, 255, 255, 1)',
                            pointBorderColor: 'rgba(23, 30, 60, 1)'
                        },
                        {
                            label: 'USER I/O',
                            data: [
                                d[0].user_IO, d[1].user_IO, d[2].user_IO, d[3].user_IO, d[4].user_IO,
                                d[5].user_IO, d[6].user_IO, d[7].user_IO, d[8].user_IO, d[9].user_IO,
                                d[10].user_IO, d[11].user_IO, d[12].user_IO, d[13].user_IO, d[14].user_IO,
                                d[15].user_IO, d[16].user_IO, d[17].user_IO, d[18].user_IO, d[19].user_IO
                            ],
                            backgroundColor: 'rgba(12, 99, 132, 0.3)',
                            borderColor: 'rgba(12, 99, 132, 1)',
                            borderWidth: 2,
                            pointBackgroundColor: 'rgba(255, 255, 255, 1)',
                            pointBorderColor: 'rgba(23, 30, 60, 1)'
                        },
                        {
                            label: 'SYSTEM I/O',
                            data: [
                                d[0].system_IO, d[1].system_IO, d[2].system_IO, d[3].system_IO, d[4].system_IO,
                                d[5].system_IO, d[6].system_IO, d[7].system_IO, d[8].system_IO, d[9].system_IO,
                                d[10].system_IO, d[11].system_IO, d[12].system_IO, d[13].system_IO, d[14].system_IO,
                                d[15].system_IO, d[16].system_IO, d[17].system_IO, d[18].system_IO, d[19].system_IO
                            ],
                            backgroundColor: 'rgba(523, 99, 132, 0.3)',
                            borderColor: 'rgba(532, 99, 132, 1)',
                            borderWidth: 2,
                            pointBackgroundColor: 'rgba(255, 255, 255, 1)',
                            pointBorderColor: 'rgba(23, 30, 60, 1)'
                        },
                        {
                            label: 'CONCURRENCY',
                            data: [
                                d[0].CONCURRENCY, d[1].CONCURRENCY, d[2].CONCURRENCY, d[3].CONCURRENCY, d[4].CONCURRENCY,
                                d[5].CONCURRENCY, d[6].CONCURRENCY, d[7].CONCURRENCY, d[8].CONCURRENCY, d[9].CONCURRENCY,
                                d[10].CONCURRENCY, d[11].CONCURRENCY, d[12].CONCURRENCY, d[13].CONCURRENCY, d[14].CONCURRENCY,
                                d[15].CONCURRENCY, d[16].CONCURRENCY, d[17].CONCURRENCY, d[18].CONCURRENCY, d[19].CONCURRENCY
                            ],
                            backgroundColor: 'rgba(12, 11, 132, 0.3)',
                            borderColor: 'rgba(12, 11, 132, 1)',
                            borderWidth: 2,
                            pointBackgroundColor: 'rgba(255, 255, 255, 1)',
                            pointBorderColor: 'rgba(23, 30, 60, 1)'
                        },
                        {
                            label: 'COMMIT',
                            data: [
                                d[0].COMMIT, d[1].COMMIT, d[2].COMMIT, d[3].COMMIT, d[4].COMMIT,
                                d[5].COMMIT, d[6].COMMIT, d[7].COMMIT, d[8].COMMIT, d[9].COMMIT,
                                d[10].COMMIT, d[11].COMMIT, d[12].COMMIT, d[13].COMMIT, d[14].COMMIT,
                                d[15].COMMIT, d[16].COMMIT, d[17].COMMIT, d[18].COMMIT, d[19].COMMIT
                            ],
                            backgroundColor: 'rgba(99, 22, 11, 0.3)',
                            borderColor: 'rgba(99, 22, 11, 1)',
                            borderWidth: 2,
                            pointBackgroundColor: 'rgba(255, 255, 255, 1)',
                            pointBorderColor: 'rgba(23, 30, 60, 1)'
                        },
                        {
                            label: 'CONFIGURATION',
                            data: [
                                d[0].CONFIGURATION, d[1].CONFIGURATION, d[2].CONFIGURATION, d[3].CONFIGURATION, d[4].CONFIGURATION,
                                d[5].CONFIGURATION, d[6].CONFIGURATION, d[7].CONFIGURATION, d[8].CONFIGURATION, d[9].CONFIGURATION,
                                d[10].CONFIGURATION, d[11].CONFIGURATION, d[12].CONFIGURATION, d[13].CONFIGURATION, d[14].CONFIGURATION,
                                d[15].CONFIGURATION, d[16].CONFIGURATION, d[17].CONFIGURATION, d[18].CONFIGURATION, d[19].CONFIGURATION
                            ],
                            backgroundColor: 'rgba(123, 92, 13, 0.3)',
                            borderColor: 'rgba(123, 92, 13, 1)',
                            borderWidth: 2,
                            pointBackgroundColor: 'rgba(255, 255, 255, 1)',
                            pointBorderColor: 'rgba(23, 30, 60, 1)'
                        },
                        {
                            label: 'NETWORK',
                            data: [
                                d[0].NETWORK, d[1].NETWORK, d[2].NETWORK, d[3].NETWORK, d[4].NETWORK,
                                d[5].NETWORK, d[6].NETWORK, d[7].NETWORK, d[8].NETWORK, d[9].NETWORK,
                                d[10].NETWORK, d[11].NETWORK, d[12].NETWORK, d[13].NETWORK, d[14].NETWORK,
                                d[15].NETWORK, d[16].NETWORK, d[17].NETWORK, d[18].NETWORK, d[19].NETWORK
                            ],
                            backgroundColor: 'rgba(118, 27, 19, 0.3)',
                            borderColor: 'rgba(118, 27, 19, 1)',
                            borderWidth: 2,
                            pointBackgroundColor: 'rgba(255, 255, 255, 1)',
                            pointBorderColor: 'rgba(23, 30, 60, 1)'
                        },
                        {
                            label: 'QUEUEUNG',
                            data: [
                                d[0].QUEUEUNG, d[1].QUEUEUNG, d[2].QUEUEUNG, d[3].QUEUEUNG, d[4].QUEUEUNG,
                                d[5].QUEUEUNG, d[6].QUEUEUNG, d[7].QUEUEUNG, d[8].QUEUEUNG, d[9].QUEUEUNG,
                                d[10].QUEUEUNG, d[11].QUEUEUNG, d[12].QUEUEUNG, d[13].QUEUEUNG, d[14].QUEUEUNG,
                                d[15].QUEUEUNG, d[16].QUEUEUNG, d[17].QUEUEUNG, d[18].QUEUEUNG, d[19].QUEUEUNG
                            ],
                            backgroundColor: 'rgba(118, 27, 132, 0.3)',
                            borderColor: 'rgba(118, 27, 132, 1)',
                            borderWidth: 2,
                            pointBackgroundColor: 'rgba(255, 255, 255, 1)',
                            pointBorderColor: 'rgba(23, 30, 60, 1)'
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                }
            });
    }

    var stat = [];

    function getStat() { 
        return $.ajax({
            url: "http://localhost/Project/database/config.php", //the page containing php script
            type: "post", //request type,
            async: false,
            dataType: 'json',
            data: { "call": "1"},
            success: function (data) {
                stat = data;
            }
        });
    }

    $( window ).on( "load", function() {
        $.when(getStat()).then(function () {
            setData(stat, document.getElementById('myChart'))
        });
    });

    </script>

</body>

</html>