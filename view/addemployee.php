<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/commonmodel.php'; //To call common vehicle model

$ob = new dbconnection();
$con = $ob->connection();

$obj = new role(); //To create an object using role class
$result = $obj->viewRole(); //To get all roles' info
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
                            <h1 class="h3 mb-0 text-gray-800">Add Employee</h1>
                        </div>

                        <div id="breadcrumbs">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="../view/employee.php">Employee</a></li>
                                <li class="active breadcrumb-item">Add Employee</li>
                            </ol>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form method="post" action="../controller/employeecontroller.php?status=Add" enctype="multipart/form-data">
                                    <div id="msg" name='msg'></div>
                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Name <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" required="" name="name" id="name" placeholder="Name" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Designation <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="roleID" id="roleID" required="" class="form-control">
                                                <option value="">Select a Designation</option>
                                                <?php while ($rowc = $result->fetch_assoc()) { ?>
                                                    <option value="<?php echo $rowc['roleID']; ?>">
                                                        <?php echo ucfirst($rowc['roleName']); ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>ID Number</label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" required="" name="nic" id="nic" placeholder="ID Number" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Contact No <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="tel" required="" name="contactNo" id="contactNo" placeholder="Contact No" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Email <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="email" required="" name="email" id="email" placeholder="Email" class="form-control" onkeyup="checkEmail(this.value)" autocomplete="off" />
                                            <span id="show"></span>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Address <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <textarea name="address" id="address" class="form-control" placeholder="Address" required></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Contract Type</label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="contract" id="contract" class="form-control">
                                                <option value="">Select a Contract Type</option>
                                                <option value=" Full-Time">
                                                    Full-Time
                                                </option>
                                                <option value=" Part-Time">
                                                    Part-Time
                                                </option>
                                                <option value=" Contract">
                                                    Contract
                                                </option>
                                                <option value=" Trainee">
                                                    Trainee
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Hire Date</label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="date" name="hireDate" id="hireDate" placeholder="hireDate" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12"></div>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <button type="submit" class="btn btn-success">Save</button>
                                            <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                        </div>
                                    </div>
                                </form>
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

        <script type="text/javascript">
            $(document).ready(function () {
                $('form').submit(function () {
                    var name = $('#name').val();
                    $('#msg').text("Empty Name");
                    $('#name').focus();
                    return false;
                }});
            });

        </script>

    </body>

</html>