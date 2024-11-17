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
                    <p class="fs-2 text-bolder"><i class="bi bi-people fs-1 fw-bold text-success"></i> <span class="text-dark ms-2"><?php echo $check_in->type ?></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="card-title fs-3 fw-bold text-danger my-0 py-1">Check Out</p>
                <div class="d-flex align-items-center">
                    <p class="fs-2 text-bolder"><i class="bi bi-people fs-1 fw-bold text-danger"></i> <span class="text-dark ms-2"><?php echo $check_out->type ?></span></p>
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
                let days = [];

                for(let i = 1; i <= 31; i++) {
                    days.push(i);
                }

                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                            name: 'Check In',
                            data: [0.4, 0.2, 1],
                        }, {
                            name: 'Check Out',
                            data: [0.5, 0.55, 1]
                        }],

                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                                show: false
                            },
                        },
                        markers: {
                            size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                            type: "gradient",
                            gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0.3,
                                opacityTo: 0.4,
                                stops: [0, 90, 100]
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'straight',
                            width: 1
                        },
                        xaxis: {
                            type: 'numeric',
                            categories: days
                        },
                        tooltip: {
                            x: {
                                format: 'dd/MM/yy HH:mm'
                            },
                        }
                    }).render();
                });
            </script>
        </div>
    </div>

</div>