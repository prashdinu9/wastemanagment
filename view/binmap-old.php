<!DOCTYPE html>
<?php
include '../common/session.php';
?>
<html lang="en">

<?php include '../common/include_head.php'; ?>
<!-- map -->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="../js/index.js"></script>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <?php include '../common/include_sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" style="overflow: visible;">

        <!-- Main Content -->
        <div id="content">
            <?php include '../common/include_topbar.php'; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid" style="height: 100vh;">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Bin Map View</h1>
                </div>

                <div class="card shadow mb-4" style="height: 85%;">
                    <div class="card-body" style="height: 100%;">
                        <div id="map"></div>
                        <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9UQuB2T40UrMvYeHb8d6nvGYn3E6inWA&callback=initMap&libraries=&v=weekly" async></script>
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
</body>

</html>