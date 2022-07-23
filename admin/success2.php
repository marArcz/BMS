<div class="row row-cols-lg-2 row-cols-md-2 row-cols-sm-1 row-cols-xl-4">
                        <div class="col-md mb-3">
                            <!-- positions -->
                            <?php
                            $query = run_query("SELECT * FROM position");
                            ?>
                            <div class="card bg-primary rounded-0">
                                <div class="card-body text-white">
                                    <div class="row">
                                        <div class="col-5">
                                            <h5><?php echo $query->num_rows ?></h5>
                                            <p><small>No. of Positions</small></p>
                                        </div>
                                        <div class="col-auto text-right text-white-50">
                                            <h1><i class="fa fa-tasks fa-2x"></i></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center text-white">
                                    <a href="positions.php" class="text-white">More Info <span class="fa-arrow-circle-right fa"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <!-- candidate -->
                            <?php
                            $query = run_query("SELECT * FROM candidate");
                            ?>
                            <div class="card bg-success rounded-0">
                                <div class="card-body text-white">
                                    <div class="row gx-0">
                                        <div class="col-7">
                                            <h5><?php echo $query->num_rows ?></h5>
                                            <p><small>No. of Candidates</small></p>
                                        </div>
                                        <div class="col text-right text-white-50">
                                            <h1><i class="fa fa-black-tie fa-2x"></i></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center text-white">
                                    <a href="positions.php" class="text-white">More Info <span class="fa-arrow-circle-right fa"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <!-- positions -->
                            <?php
                            $query = run_query("SELECT * FROM voters");
                            ?>
                            <div class="card bg-info rounded-0">
                                <div class="card-body text-white">
                                    <div class="row">
                                        <div class="col">
                                            <h5><?php echo $query->num_rows ?></h5>
                                            <p><small>Registered Voters</small></p>
                                        </div>
                                        <div class="col-auto text-right text-white-50">
                                            <h1><i class="fa fa-group fa-2x"></i></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center text-white">
                                    <a href="positions.php" class="text-white">More Info <span class="fa-arrow-circle-right fa"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <!-- voters voted -->
                            <?php
                            $query = run_query("SELECT * FROM voters INNER JOIN votes ON voters.id = votes.voter");
                            ?>
                            <div class="card bg-danger rounded-0">
                                <div class="card-body text-white">
                                    <div class="row">
                                        <div class="col-5">
                                            <h5><?php echo $query->num_rows ?></h5>
                                            <p><small>Voters voted</small></p>
                                        </div>
                                        <div class="col-auto text-right text-white-50">
                                            <h1><i class="fa fa-pencil fa-2x"></i></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center text-white">
                                    <a href="positions.php" class="text-white">More Info <span class="fa-arrow-circle-right fa"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="my-3">Votes Tally</h5>
                    <div class="card mb-3">
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM position ORDER BY priority ASC";
                            $query = run_query($sql);
                            $inc = 2;
                            while ($row = $query->fetch_assoc()) {
                                $inc = ($inc == 2) ? 1 : $inc + 1;
                                if ($inc == 1) echo "<div class='row'>";
                                echo "
                            <div class='col-sm-6 mb-3'>
                            <div id='box-tally' class='card'>
                                <div class='card-header'>
                                <h4 class='card-title'><b>" . $row['description'] . "</b></h4>
                                </div>
                                <div class='card-body'>
                                <div class='chart'>
                                    <canvas id='" . preg_replace('/\s+/', '', $row['description']) . "' style='height:200px'></canvas>
                                </div>
                                </div>
                            </div>
                            </div>
                        ";
                                if ($inc == 2) echo "</div>";
                            }
                            if ($inc == 1) echo "<div class='col-sm-6'></div></div>";
                            ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include "./includes/scripts.php" ?>
    <?php
    $posQuery = run_query("SELECT * FROM position ORDER BY priority ASC");
    while ($row = $posQuery->fetch_assoc()) {
        $cquery = run_query("SELECT * FROM candidate WHERE positionID = " . $row['id']);
        $carray = array();
        $varray = array();
        while ($crow = $cquery->fetch_assoc()) {
            array_push($carray, $crow['lastname']);
            $vquery = run_query("SELECT * FROM votes WHERE candidate = " . $crow['id']);
            array_push($varray, $vquery->num_rows);
        }
        $carray = json_encode($carray);
        $varray = json_encode($varray);
    ?>
        <script>
            $(function() {
                var rowid = '<?php echo $row['id']; ?>';
                var description = '<?php echo preg_replace('/\s+/', '', $row['description']) ?>';
                var barChartCanvas = $('#' + description).get(0).getContext('2d')
                var barChart = new Chart(barChartCanvas)
                var barChartData = {
                    labels: <?php echo $carray; ?>,
                    datasets: [{
                        label: 'Votes',
                        fillColor: 'rgba(60,141,188,0.9)',
                        strokeColor: 'rgba(60,141,188,0.8)',
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: <?php echo $varray; ?>
                    }]
                }
                var barChartOptions = {
                    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                    scaleBeginAtZero: true,
                    //Boolean - Whether grid lines are shown across the chart
                    scaleShowGridLines: true,
                    //String - Colour of the grid lines
                    scaleGridLineColor: 'rgba(0,0,0,.05)',
                    //Number - Width of the grid lines
                    scaleGridLineWidth: 1,
                    //Boolean - Whether to show horizontal lines (except X axis)
                    scaleShowHorizontalLines: true,
                    //Boolean - Whether to show vertical lines (except Y axis)
                    scaleShowVerticalLines: true,
                    //Boolean - If there is a stroke on each bar
                    barShowStroke: true,
                    //Number - Pixel width of the bar stroke
                    barStrokeWidth: 2,
                    //Number - Spacing between each of the X value sets
                    barValueSpacing: 5,
                    //Number - Spacing between data sets within X values
                    barDatasetSpacing: 1,
                    //String - A legend template
                    legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
                    //Boolean - whether to make the chart responsive
                    responsive: true,
                    maintainAspectRatio: true
                }

                barChartOptions.datasetFill = false
                var myChart = barChart.HorizontalBar(barChartData, barChartOptions)
                //document.getElementById('legend_'+rowid).innerHTML = myChart.generateLegend();
            });
        </script>
    <?php
    }
    ?>