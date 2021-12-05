<?php
$locations = array();

include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string

$ob = new dbconnection();
$con = $ob->connection();

$query = $con->query("SELECT * FROM binallocation ba
    INNER JOIN bintype bt ON ba.binTypeID= bt.binTypeID
    INNER JOIN customer c ON ba.cusID=c.cusID
INNER JOIN route r ON r.routeID = c.routeID
WHERE ba.binStatus ='Active' ORDER BY c.cusName");

while ($row = $query->fetch_assoc()) {
    $name = $row['cusName'];
    $longitude = $row['longitude'];
    $latitude = $row['latitude'];
    $link = $row['binType'];
    $status = $row['isbinFull'];

    $locations[] = array('name' => $name, 'lat' => $latitude, 'lng' => $longitude, 'lnk' => $link, 'lstatus' => $status); //, 'markericon' => $locationMarkerIcon
}
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB9UQuB2T40UrMvYeHb8d6nvGYn3E6inWA"></script>
<script type="text/javascript">
    var map;
    var Markers = {};
    var infowindow;

    var locations = [
<?php
for ($i = 0; $i < sizeof($locations); $i++) {
    $j = $i + 1;
    ?>[
                'AMC Service',
                '<p><?php echo $locations[$i]['lnk']; ?></p>',
    <?php echo $locations[$i]['lat']; ?>,
    <?php echo $locations[$i]['lng']; ?>,
                "<?php echo $locations[$i]['lstatus']; ?>",
                0,
        ] <?php
    if ($j != sizeof($locations))
        echo ",";
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
            if (locations[i][4] == 'Yes')
            {
                url = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
            }

            var marker = new google.maps.Marker({
                position: position,
                map: map,
                icon: {
                    url: url
                }
            });
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][1]);
                    infowindow.setOptions({
                        maxWidth: 200
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

<body id="map-canvas">