<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="card-title fs-3 fw-bold text-primary my-0 py-1">Total Employees</p>
                <div class="d-flex align-items-center">
                    <p class="fs-2 text-bolder"><i class="bi bi-people fs-1 fw-bold text-primary"></i> <span class="text-dark ms-2"><?php echo $count->id ?></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="card-title fs-3 fw-bold text-success my-0 py-1">Check Ins</p>
                <div class="d-flex align-items-center">
                    <p class="fs-2 text-bolder"><i class="bi bi-people fs-1 fw-bold text-success"></i> <span class="text-dark ms-2"><?php echo count($check_in) ?></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="card-title fs-3 fw-bold text-danger my-0 py-1">Check Out</p>
                <div class="d-flex align-items-center">
                    <p class="fs-2 text-bolder"><i class="bi bi-people fs-1 fw-bold text-danger"></i> <span class="text-dark ms-2"><?php echo count($check_out) ?></span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <p class="fs-3 text-bold card-title">Monthly Attendance</p>
            <div id="reportsChart"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const checkIns = <?php echo json_encode($checkIns); ?>;
                    const checkOuts = <?php echo json_encode($checkOuts); ?>;

                    const checkInSeries = checkIns.map(item => {
                        const [month, day, year] = item.date.split('-'); // Split the 'MM-DD-YYYY' format
                        return {
                            x: parseInt(day), // Use the day as the x-axis value
                            y: item.time // Use time directly for the y-axis
                        };
                    });

                    const checkOutSeries = checkOuts.map(item => {
                        const [month, day, year] = item.date.split('-'); // Split the 'MM-DD-YYYY' format
                        return {
                            x: parseInt(day), // Use the day as the x-axis value
                            y: item.time // Use time directly for the y-axis
                        };
                    });

                    // Configure ApexCharts
                    const options = {
                        chart: {
                            type: 'scatter',
                            height: 350,
                            toolbar: {
                                show: false
                            },
                        },
                        series: [{
                                name: 'Check-Ins',
                                data: checkInSeries
                            },
                            {
                                name: 'Check-Out',
                                data: checkOutSeries
                            },
                        ],
                        xaxis: {
                            title: {
                                text: 'Day of the Month'
                            },
                            tickAmount: 30, // Show days 1 to 30
                            labels: {
                                formatter: value => Math.round(value)
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'Check-In Time'
                            },
                            labels: {
                                formatter: value => value // Display time as is
                            }
                        },
                        tooltip: {
                            x: {
                                title: 'Day'
                            },
                            y: {
                                title: 'Time'
                            }
                        }
                    };
                    const chart = new ApexCharts(document.querySelector("#reportsChart"), options);
                    chart.render();
                });
                // Render the chart






                // document.addEventListener("DOMContentLoaded", () => {
                //     new ApexCharts(document.querySelector("#reportsChart"), {
                //         series: [{
                //             name: 'Check In',
                //             data: in_data,
                //         }, {
                //             name: 'Check Out',
                //             data: out_data
                //         }],

                //         chart: {
                //             height: 350,
                //             type: 'scatter',
                //             toolbar: {
                //                 show: false
                //             },
                //         },
                //         markers: {
                //             size: 4
                //         },
                //         colors: ['#4154f1', '#2eca6a', '#ff771d'],

                //         dataLabels: {
                //             enabled: false
                //         },
                //         stroke: {
                //             curve: 'straight',
                //             width: 1
                //         },
                //         xaxis: {
                //             title: {
                //                 text: 'Day of the Month'
                //             },
                //             tickAmount: 30,
                //             labels: {
                //                 formatter: value => Math.round(value)
                //             }
                //         },
                //         yaxis: {
                //             title: {
                //                 text: 'Check-In Time'
                //             },
                //             tickAmount: 24,
                //             labels: {
                //                 formatter: value => Math.round(value)
                //             }
                //         },
                //         tooltip: {
                //             x: {
                //                 title: 'Day'
                //             },
                //             y: {
                //                 title: 'Time'
                //             }
                //         }
                //     }).render();
                // });
            </script>
        </div>
    </div>

</div>