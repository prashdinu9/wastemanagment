<!DOCTYPE html>
<?php
$locations = array();

include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string

$ob = new dbconnection();
$con = $ob->connection();

$query =  $con->query("SELECT * FROM locations");


while ($row = $query->fetch_assoc()) {
    $name = $row['name'];
    $longitude = $row['lon'];
    $latitude = $row['lat'];
    $link = $row['address'];
    $status = $row['locstatus'];

    $locations[] = array('name' => $name, 'lat' => $latitude, 'lng' => $longitude, 'lnk' => $link, 'lstatus' => $status); //, 'markericon' => $locationMarkerIcon
}
?>
<html lang="en">

<?php include '../common/include_head.php'; ?>

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
                        <div id="map-canvas"></div>
                        <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
                        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB9UQuB2T40UrMvYeHb8d6nvGYn3E6inWA"></script>
                        <script type="text/javascript">
                            var map;
                            var Markers = {};
                            var infowindow;

                            var locations = [
                                    <?php
                                    for ($i = 0; $i < sizeof($locations); $i++)
                                    {
                                    $j = $i + 1; ?>[
                                    'AMC Service',
                                    '<p><a href="<?php echo $locations[0]['lnk']; ?>">Bin Locations</a></p>',
                                    <?php echo $locations[$i]['lat']; ?>,
                                    <?php echo $locations[$i]['lng']; ?>,
                                    "<?php echo $locations[$i]['lstatus']; ?>",
                                    0,

                                ] <?php if ($j != sizeof($locations)) echo ",";
                                }
                                ?>
                            ];

                            var origin = new google.maps.LatLng(locations[0][2], locations[0][3]);

                            function initialize() {
                                var mapOptions = {
                                    zoom: 16,
                                    center: origin
                                };

                                map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                                infowindow = new google.maps.InfoWindow();

                                for (i = 0; i < locations.length; i++) {

                                    //Setting Location
                                    var position = new google.maps.LatLng(locations[i][2], locations[i][3]);

                                    //Validating marker color according to status
                                    let url = "http://maps.google.com/mapfiles/ms/icons/green-dot.png";
                                    if(locations[i][4] == 'Active' )
                                    {
                                        url = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
                                    }

                                    var marker = new google.maps.Marker({
                                        position: position,
                                        map: map,
                                        icon: {
                                            url : url
                                        }
                                    });
                                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                        return function() {
                                            infowindow.setContent(locations[i][1]);
                                            infowindow.setOptions({
                                                maxWidth: 100
                                            });
                                            infowindow.open(map, marker);
                                        }
                                    })(marker, i));
                                    Markers[locations[i][4]] = marker;
                                }
                                //locate(0);
                            }


                            function locate(marker_id) {
                                var myMarker = Markers[marker_id];
                                var markerPosition = myMarker.getPosition();
                                map.setCenter(markerPosition);
                                google.maps.event.trigger(myMarker, 'click');
                            }

                            google.maps.event.addDomListener(window, 'load', initialize);
                        </script>
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