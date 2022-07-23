<?php
include "./includes/session.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Blotter</title>
    <?php include "./includes/header.php" ?>
</head>

<body class="hold-transition sidebar-mini skin-blue-light">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/sideMenu.php'; ?>
        <div class="content-wrapper">

            <section class="content-header">
                <h1 style="font-family:poppins">
                    Blotter Reports
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i>Home </a> </li>
                    <li class="active"> Blotter Report</li>
                </ol>
            </section>
            <hr>
            <?php
            include "./includes/alert.php";
            ?>
            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-body bg-white">
                        <div class="row">
                            <!-- chart -->
                            <div class="col-md-5">
                                <p class="text-center mb-2">Ages of Residents that has been blottered</p>
                                <canvas id="chart_ages" width="300px" height="300px"></canvas>
                            </div>
                            <!-- list -->
                            <div class="col-md-7">
                                <p class="text-center mb-2">Monthly Report</p>
                                <div class="row justify-content-center">
                                    <div class="col-4">
                                        <select name="" id="year_select" class="form-control form-control-sm">
                                            <?php
                                            $current = date("Y");
                                            for ($x = $current - 2; $x <= $current; $x++) {
                                            ?>
                                                <option <?php echo $x == $current ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x == $current ? 'This year' : $x ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <canvas id="chart_monthly_report" width="300px" height="200px"></canvas>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col ">
                                <div class="card border-danger border-left border-top-0 border-bottom-0 border-right-0 shadow">
                                    <div class="card-body">
                                        <p>List of residents</p>
                                        <hr>
                                        <ul class="list-group">
                                            <?php
                                            $query = run_query("SELECT DISTINCT suspect, age FROM blotter_history");
                                            while ($row = $query->fetch_assoc()) {
                                            ?>
                                                <li class="list-group-item mb-2">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>Name: <?php echo $row['suspect'] ?></p>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <p>Age: <?php echo $row['age'] ?></p>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

    </div>
    <?php include "./includes/scripts.php" ?>
    <?php include "./includes/blotterModal.php" ?>

    <script>
        $(function() {
            // fetch info 
            $.ajax({
                method: "POST",
                url: "blotter_involved_row.php",
                dataType: "json",
                success: function(res) {
                    console.log("response: ", res);

                    const ctx = document.getElementById('chart_ages').getContext('2d');
                    const labels = ["10-25", "26-41", "42-57", "58-73", "74-89", "90-100"];

                    var ages = [];
                    var chartData = [];
                    res.forEach((s) => {
                        if (ages.indexOf(s.age) < 0) {
                            ages.push(s.age);
                        }
                    });
                    for (let x = 0; x <= labels.length; x++) {
                        chartData[x] = 0;
                    }
                    res.forEach((s) => {
                        var age = s.age;
                        var y = 10;
                        for (let x = 0; x <= labels.length; x++) {
                            for (let i = y; i <= y + 15; i++) {
                                if (age == i) {
                                    chartData[x] += 1;
                                    break;
                                }
                            }
                            y += 16;
                        }
                    });
                    console.log("chartdata: ", chartData)
                    const chart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Ages of Residents that has been blottered.',
                                data: chartData,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                }
            })
        })
        var monthCtx = $('#chart_monthly_report')[0].getContext('2d');
        var monthChart;

        $(function() {
            $.ajax({
                method: "POST",
                'url': 'blotter_month_row.php',
                data: {
                    year: "2021"
                },
                dataType: 'json',
                success: function(data) {
                    var labels = "Jan,Feb,Mar,Apr,May,June,Jul,Aug,Sep,Oct,Nov,Dec".split(",");
                    let chartData = [];
                    for (let x = 0; x < labels.length; x++) {
                        chartData[x] = 0;
                    }
                    data.forEach(d => {
                        let month = d.date.split('-')[1];
                        console.log('month: ', month);
                        chartData[month - 1] += 1;
                    })
                    monthChart = new Chart(monthCtx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Complaints Recorded',
                                data: chartData,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    })
                }
            }).then(() => {
                let year = $(this).find(":selected").val();
                changeData(year, updateChart);
            })

        })

        function updateChart(data) {
            let chartData = [];
            for (let x = 0; x < 12; x++) {
                chartData[x] = 0;
            }
            data.forEach(d => {
                let month = d.date.split('-')[1];
                console.log('month: ', month);
                chartData[month - 1] += 1;
            })
            monthChart.data.datasets[0].data = chartData;
            monthChart.update();
        }

        function changeData(year, cb) {
            // number of blottered residents per month;
            $.ajax({
                async: false,
                method: "POST",
                url: "blotter_month_row.php",
                data: {
                    year
                },
                dataType: "json",
                success: function(res) {
                    cb(res);
                }
            })
        }

        $(document).on("change", '#year_select', function() {
            let year = $(this).find(":selected").val();
            console.log("year: ", year)
            changeData(year, updateChart);

        })
        $(function() {

        })
    </script>
</body>


</html>