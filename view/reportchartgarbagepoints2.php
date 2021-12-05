<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/binmodel.php'; //To call bin model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new binAllocation; //To create an object using bin class
$result = $obj->viewAllBinAllocation(); //To get all bins info

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
                    <h1 class="h3 mb-0 text-gray-800">Garbage Points Summery</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-5">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
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
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
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
                                            <canvas id="myChart2" width="400" height="400"></canvas>
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
            labels: ['Spent', 'Balance'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',

                    'rgba(75, 192, 192, 0.2)',

                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)',

                ],
                borderWidth: 1
            }]
        },
        options: {

        }
    });
</script>
</body>

</html>