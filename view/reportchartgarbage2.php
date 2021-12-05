<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/binmodel.php'; //To call bin model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new garbageBinStatus(); //To create an object using bin class
$result = $obj->viewBinWeightGroupedByType();
while ($row = $result->fetch_array()) {
   $result2 =$row;
}
$jsonGarbage =json_encode($result2);



?>
<html lang="en">

<?php include '../common/include_head.php'; ?>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <?php include '../common/include_sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <?php include '../common/include_topbar.php'; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Garbage Report</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-5">
                            <li class="nav-item">
                                <a class="nav-link" href="reportgarbage.php">
                                    <i class="fa fa-table"></i> &nbsp; Table view
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="javascrpit:void(0);">
                                    <i class="fa fa-chart-pie"></i> &nbsp; Chart view
                                </a>
                            </li>
                        </ul>
                        <div>
                            <div class="toggle-btn-set text-center mb-4">
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-primary collapsed" data-toggle="collapse" data-target="#multiCollapseExample1">
                                        <i class="fa fa-trash"></i> &nbsp; Total Garbage Collection
                                    </button>
                                    <button type="button" class="btn btn-outline-primary collapsed" data-toggle="collapse" data-target="#multiCollapseExample2">
                                        <i class="fa fa-user-check"></i> &nbsp; Customer Wise Collection
                                    </button>
                                    <button type="button" class="btn btn-outline-primary collapsed" data-toggle="collapse" data-target=".multi-collapse">
                                        <i class="fa fa-retweet"></i> &nbsp; Toggle both Charts
                                    </button>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-6 collapse multi-collapse" id="multiCollapseExample1">
                                    <div class="card">
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Total Garbage Collection</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3 mb-4 justify-content-center">
                                                <div class="col-sm">
                                                    <label class="">From: </label>
                                                    <input type="date" class="form-control" placeholder="From date">
                                                </div>

                                                <div class="col-sm">
                                                    <label class="">To: </label>
                                                    <input type="date" class="form-control" placeholder="To date">
                                                </div>
                                            </div>
                                            <canvas id="myChart2" width="400" height="400"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 collapse multi-collapse" id="multiCollapseExample2">
                                    <div class="card">
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Customer wise Collection</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3 mb-4 justify-content-center">
                                                <div class="col-sm">
                                                    <div class="row justify-content-center">
                                                        <label class="col-auto col-form-label">Select a customer: </label>
                                                        <select class="col form-control">
                                                            <option>Prashani Gunasekara</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 mb-4 justify-content-center">
                                                <div class="col-sm">
                                                    <label>From: </label>
                                                    <input type="date" class="col form-control" placeholder="From date">
                                                </div>

                                                <div class="col-sm">
                                                    <label>To: </label>
                                                    <input type="date" class="col form-control" placeholder="To date">
                                                </div>
                                            </div>

                                            <canvas id="myChart" width="400" height="400"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>

        <?php include '../common/include_footer.php'; ?>
    </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php include '../common/include_scripts.php'; ?>
<script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Plastic', 'Paper', 'Glass', 'Rubber', 'Metal', 'e-waste'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(249, 105, 14, 0.2)'
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
        }
    });
</script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Plastic', 'Paper', 'Glass', 'Rubber', 'Metal', 'e-waste'],
            datasets: [{
                label: 'weight (kg)',
                data: [10, 12, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(249, 105, 14, 0.2)'
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
</script>
</body>

</html>