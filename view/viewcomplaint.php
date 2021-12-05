<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/complaintmodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$complaintID = $_REQUEST['complaintID'];
$obu = new complaint();

$resultu = $obu->viewComplaint($complaintID);
$rowm = $resultu->fetch_array();

$resultc = $obu->viewComment($complaintID);

//date_default_timezone_set("Asia/colombo");
//$cdate=date("Y-m-d");
//$cid=strtotime($cdate); //Date convert into timestamp
//
//function getDate1($y){
//$a= floor($y/4);
//$ctimestamp=time();
//$seconds=(60*60*24*365)*$y+(60*60*24*$a);
//$timestamp=$ctimestamp-$seconds;
//$aDate=Date("Y-m-d",$timestamp);//To get date from timestamp
//return $aDate;
//}
//
//$maxDate= getDate1(18);
//$minDate=getDate1(60);
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
                            <h1 class="h3 mb-0 text-gray-800">View Complaint</h1>
                        </div>

                        <?php if ($roleID == 1 || $roleID == 2) { ?>

                            <div id="breadcrumbs">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../view/complaint.php">Complaint</a></li>
                                    <li class="active breadcrumb-item">View Complaint</li>
                                </ol>
                            </div>
                        <?php } else { ?>
                            <div id="breadcrumbs">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../view/dashboardcus.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../view/complaintcus.php">Complaint</a></li>
                                    <li class="active breadcrumb-item">View Complaint</li>
                                </ol>
                            </div>

                        <?php } ?>



                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="comment mb-2 row">
                                    <div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">
                                        <a href="">
                                            <img class="mx-auto rounded-circle img-fluid" src="../images/user.jpg" alt="avatar">
                                        </a>
                                    </div>
                                    <div class="comment-content col-md-11 col-sm-10">
                                        <h6 class="-medium comment-meta">
                                            <span># <?php echo $rowm['complaintID']; ?></span> |
                                            <span><?php echo $rowm['cusName']; ?></span> |
                                            <?php echo date('Y-m-d h:ia', strtotime($rowm['complaintDate'])); ?> |
                                            <span class="badge-primary badge-pill"><?php echo $rowm['type']; ?></span>
                                            <?php if ($rowm['status'] == 'Active') { ?>
                                                <span class="badge-pill badge-warning"><?php echo $rowm['status']; ?></span>
                                            <?php } else {
                                                ?>
                                                <span class="badge-pill badge-success"><?php echo $rowm['status']; ?></span>
                                            <?php }
                                            ?>


                                            <div>

                                            </div>
                                        </h6>
                                        <div class="comment-body">
                                            <h4><?php echo $rowm['title']; ?></h4>
                                            <p><?php echo $rowm['description']; ?></p>
                                        </div>
                                    </div>

                                    <?php while ($rowc = $resultc->fetch_array()) { ?>

                                        <div class = "comment-reply col-md-11 offset-md-1 col-sm-10 offset-sm-2">
                                            <div class = "row">
                                                <div class = "comment-content col-md-10 col-sm-10 col-12">
                                                    <h6 class = "small comment-meta"><?php echo date('Y-m-d h:ia', strtotime($rowc['commentDate']));
                                        ?></h6>
                                                    <div class="comment-body" >
                                                        <p><?php echo $rowc['comment']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="comment-avatar col-md-2 col-sm-2 text-center pr-1">
                                                    <div><?php echo $rowc['CommenterName']; ?></div>
                                                    <a href=""><img class="mx-auto rounded-circle img-fluid" src="../images/user.jpg" alt="avatar" style="width: 50px" "></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>


                            </div>
                        </div>
                        <?php if ($rowm['status'] == 'Completed') {
                            ?>
                            <div class="card shadow mb-4" hidden>
                                <div class="card-body">
                                    <form method="post" action="../controller/complaintcontroller.php?status=Addcomment&complaintID=<?php echo $complaintID ?>" enctype="multipart/form-data">
                                        <textarea name="comment" id="comment" cols="30" rows="3" placeholder="Add a comment..." class="form-control"></textarea>

                                        <div class="text-right mt-2">
                                            <button type="submit" class="btn btn-primary">Post</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    <?php } else {
                        ?>
                        <div class="card shadow mb-4" >
                            <div class="card-body">
                                <form method="post" action="../controller/complaintcontroller.php?status=Addcomment&complaintID=<?php echo $complaintID ?>" enctype="multipart/form-data">
                                    <textarea name="comment" id="comment" cols="30" rows="3" placeholder="Add a comment..." class="form-control"></textarea>

                                    <div class="text-right mt-2">
                                        <button type="submit" class="btn btn-primary">Post</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                <?php }
                ?>

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
<!--    <script type="text/javascript">

        function loaddata()
        {
            var name = document.getElementById("username");

            if (name)
            {
                $.ajax({
                    type: 'post',
                    url: 'loaddata.php',
                    data: {
                        user_name: name,
                    },
                    success: function (response) {
                        // We get the element having id of display_info and put the response inside it
                        $('#display_info').html(response);
                    }
                });
            } else
            {
                $('#display_info').html("Please Enter Some Words");
            }
        }

    </script>-->

<!--    <script>
$(document).ready(function () {
    $('#books').empty();

    $.ajax({
        type: 'GET',
        url: '../../library/library.xml',
        dataType: 'xml',
        success: function (xml) {

            $(xml).find('List').each(function () {
                $('#books').append(
                    $(this).find('BookName').text() + '<br />')
            });

            setInterval('location.reload()', 7000);        // Using .reload() method.
        }
    });
});



$(document).ready(function () {
    $.ajax({
        type: 'GET',
        url: '../../library/library.xml',
        dataType: 'xml',
        success: function (xml) {
            setInterval('refreshPage()', 5000);
        }
    });
});

function refreshPage() {
    location.reload(true);
}

function Random(id) {
    var display= parseInt(document.getElementById(id).value);
    if( display === Math.floor((Math.random() * 3) + 1)){
        document.getElementById('show').innerHTML = "EQUAL";
    }
    else{
          document.getElementById('show').innerHTML = "NOT EQUAL";
    }
}
</script>-->


</body>

</html>