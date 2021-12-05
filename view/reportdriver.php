<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/customermodel.php'; //To call customer model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new customer; //To create an object using customer class
$result = $obj->ReportCustomer(); //To get all customers info
?>
<html lang="en">

<?php include '../common/include_head.php'; ?>
<link href="../DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../DataTables/SearchBuilder-1.0.1/css/searchBuilder.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../DataTables/Buttons-1.7.0/css/buttons.dataTables.min.css">

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
                    <h1 class="h3 mb-0 text-gray-800">Driver Report</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="row g-3 mb-4 justify-content-center">
                            <div class="col-sm">
                                <label>Driver: </label>
                                <select class="col form-control">
                                    <option>Kamal Gunasekara</option>
                                </select>
                            </div>

                            <div class="col-sm">
                                <label>From: </label>
                                <input type="date" class="col form-control" placeholder="From date">
                            </div>

                            <div class="col-sm">
                                <label>To: </label>
                                <input type="date" class="col form-control" placeholder="To date">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Schedule No</th>
                                    <th>Schedule Date</th>
                                    <th>Expected Weight (kg)</th>
                                    <th>Actual Weight (kg)</th>
                                    <th>Milage</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2021-05-28</td>
                                    <td>20</td>
                                    <td>18</td>
                                    <td>32</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2021-05-29</td>
                                    <td>45</td>
                                    <td>30</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>2021-04-28</td>
                                    <td>10</td>
                                    <td>10</td>
                                    <td>15</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>2021-03-28</td>
                                    <td>45</td>
                                    <td>50</td>
                                    <td>45</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>2021-05-28</td>
                                    <td>20</td>
                                    <td>10</td>
                                    <td>23</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>2021-05-28</td>
                                    <td>20</td>
                                    <td>16</td>
                                    <td>23</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>2021-05-03</td>
                                    <td>30</td>
                                    <td>25</td>
                                    <td>43</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>2021-05-13</td>
                                    <td>10</td>
                                    <td>8</td>
                                    <td>23</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>2021-05-11</td>
                                    <td>15</td>
                                    <td>15</td>
                                    <td>45</td>
                                <tr>
                                    <td>10</td>
                                    <td>2021-05-10</td>
                                    <td>15</td>
                                    <td>12</td>
                                    <td>34</td>
                                </tr>
                                <tr>
                                    <td>Jena</td>
                                    <td>Gaines</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>$90,560</td>
                                </tr>
                                <tr>
                                    <td>Quinn</td>
                                    <td>Flynn</td>
                                    <td>Support Lead</td>
                                    <td>Edinburgh</td>
                                    <td>$342,000</td>
                                </tr>
                                <tr>
                                    <td>Charde</td>
                                    <td>Marshall</td>
                                    <td>Regional Director</td>
                                    <td>San Francisco</td>
                                    <td>$470,600</td>
                                </tr>
                                <tr>
                                    <td>Haley</td>
                                    <td>Kennedy</td>
                                    <td>Senior Marketing Designer</td>
                                    <td>London</td>
                                    <td>$313,500</td>
                                </tr>
                                <tr>
                                    <td>Tatyana</td>
                                    <td>Fitzpatrick</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>$385,750</td>
                                </tr>
                                <tr>
                                    <td>Michael</td>
                                    <td>Silva</td>
                                    <td>Marketing Designer</td>
                                    <td>London</td>
                                    <td>$198,500</td>
                                </tr>
                                <tr>
                                    <td>Paul</td>
                                    <td>Byrd</td>
                                    <td>Chief Financial Officer (CFO)</td>
                                    <td>New York</td>
                                    <td>$725,000</td>
                                </tr>
                                <tr>
                                    <td>Gloria</td>
                                    <td>Little</td>
                                    <td>Systems Administrator</td>
                                    <td>New York</td>
                                    <td>$237,500</td>
                                </tr>
                                <tr>
                                    <td>Bradley</td>
                                    <td>Greer</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>$132,000</td>
                                </tr>
                                <tr>
                                    <td>Dai</td>
                                    <td>Rios</td>
                                    <td>Personnel Lead</td>
                                    <td>Edinburgh</td>
                                    <td>$217,500</td>
                                </tr>
                                <tr>
                                    <td>Jenette</td>
                                    <td>Caldwell</td>
                                    <td>Development Lead</td>
                                    <td>New York</td>
                                    <td>$345,000</td>
                                </tr>
                                <tr>
                                    <td>Yuri</td>
                                    <td>Berry</td>
                                    <td>Chief Marketing Officer (CMO)</td>
                                    <td>New York</td>
                                    <td>$675,000</td>
                                </tr>
                                <tr>
                                    <td>Caesar</td>
                                    <td>Vance</td>
                                    <td>Pre-Sales Support</td>
                                    <td>New York</td>
                                    <td>$106,450</td>
                                </tr>
                                <tr>
                                    <td>Doris</td>
                                    <td>Wilder</td>
                                    <td>Sales Assistant</td>
                                    <td>Sydney</td>
                                    <td>$85,600</td>
                                </tr>
                                <tr>
                                    <td>Angelica</td>
                                    <td>Ramos</td>
                                    <td>Chief Executive Officer (CEO)</td>
                                    <td>London</td>
                                    <td>$1,200,000</td>
                                </tr>
                                <tr>
                                    <td>Gavin</td>
                                    <td>Joyce</td>
                                    <td>Developer</td>
                                    <td>Edinburgh</td>
                                    <td>$92,575</td>
                                </tr>
                                <tr>
                                    <td>Jennifer</td>
                                    <td>Chang</td>
                                    <td>Regional Director</td>
                                    <td>Singapore</td>
                                    <td>$357,650</td>
                                </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="2" style="text-align:right">Total:</th>
                                    <td style="font-weight: bold;">230</td>
                                    <td style="font-weight: bold;">194</td>
                                    <td style="font-weight: bold;">293</td>
                                </tr>
                                </tfoot>
                            </table>
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

<!-- Page level plugins -->
<script src="../DataTables/datatables.min.js"></script>
<script src="../DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="../DataTables/SearchBuilder-1.0.1/js/dataTables.searchBuilder.min.js"></script>
<script src="../DataTables/SearchBuilder-1.0.1/js/searchBuilder.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'QBfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
</body>

</html>