<!--Address Auto Suggession-->
<style>
    .suggestions {
        list-style-type: none;
        padding: 0;
        border: 1px solid #ccc;
        max-height: 150px;
        overflow-y: auto;
        position: absolute;
        background-color: #fff;
        z-index: 1000;
        /*width: 100%;*/
    }

    .suggestions li {
        padding: 8px;
        cursor: pointer;
    }

    .suggestions li:hover {
        background-color: #f0f0f0;
    }

    #map_canvas {
        margin: 0;
        padding: 0;
        height: 600px;
        width: 100%;
    }
</style>
<!--Address Auto Suggession-->

<?php
if (isset($this->session->userdata['super_admin'])) {
    $id = $this->session->userdata['super_admin']['id'];
}
?>

<div class="wraper container-fluid">
    <div class="page-title">
        <h3 class="title">Add Pincode Locations with geofence</h3>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default" style="height: 400px;">
                <div class="panel-heading">
                    <h3 class="panel-title">Add Pincode Locations</h3>
                </div>
                <div class="panel-body">
                    <div class=" form">
                        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=drawing"></script>
                        <form class="cmxform form-horizontal tasi-form" method="post" action="<?php echo base_url() ?>chef_admin/Home/addpincodelocation">
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-2">State</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="state_id" required="">
                                        <option value="">Select State</option>
                                        <?php foreach ($statelist as $value) { ?>
                                            <option value="<?= $value->state_id ?>" <?= $pincode_location->state_id == $value->state_id ? 'selected' : '' ?>><?= $value->state_name ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-2">Pincode</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="cname" name="id" type="hidden" value="<?php echo $id ?>" aria-required="true" required="">
                                    <input class=" form-control" id="cname" name="pincode" type="text" aria-required="true" required="" value="<?= $pincode_location->pincode ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-2">Place</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="address" name="place" type="text" placeholder="Search Address..." oninput="fetchSuggestions(this.value)" aria-required="true" required value="<?= $pincode_location->place ?>">
                                    <input type="hidden" id="latitude">
                                    <input type="hidden" id="longitude">
                                    <ul id="suggestion-list" class="suggestions pt-0"></ul>
                                    <textarea id="lat_long" name="lat_long" rows="5" class="form-control" readonly><?= $pincode_location->lat_long ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-success" type="submit">Save</button>
                                    <button class="btn btn-default" type="button">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-12" id="map_canvas">
            <button id="deleteButton">Delete Selected Shape</button>
            <!-- Map will be rendered here -->
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Address Search suggestion by Microsoft Azure Maps API
    const subscriptionKey = "<?= AZURE_SUBSCRIPTION_KEY ?>";
    // const subscriptionKey = "5ivJH4zk2T617DGoyaWhom4hLUoDsn48vjsbaO5JyaBs0qcwE1z2JQQJ99AJACYeBjFRsxEYAAAgAZMP40AC";
    var polygenCoordinates = [];

    // Google Maps and Drawing Manager
    let map, drawingManager;

    var savedPolygenCoordinatesStr = '<?= ($pincode_location->lat_long) ?>';
    var savedPolygenCoordinatesArr = JSON.parse(savedPolygenCoordinatesStr);
    console.log("savedPolygenCoordinatesArr", savedPolygenCoordinatesArr)

    function fetchSuggestions(input) {
        if (input.length < 3) {
            document.getElementById("suggestion-list").innerHTML = "";
            return;
        }

        const apiUrl = `https://atlas.microsoft.com/search/address/json?api-version=1.0&query=${encodeURIComponent(input)}&subscription-key=${subscriptionKey}`;

        fetch(apiUrl)
            .then((response) => response.json())
            .then((data) => displaySuggestions(data.results))
            .catch((error) => console.error("Error fetching suggestions:", error));
    }

    function displaySuggestions(suggestions) {
        const suggestionList = document.getElementById("suggestion-list");
        suggestionList.innerHTML = ""; // Clear existing suggestions

        suggestions.forEach((suggestion) => {
            const li = document.createElement("li");
            li.textContent = suggestion.address.freeformAddress;
            li.onclick = () => selectSuggestion(
                suggestion.address.freeformAddress,
                suggestion.position.lat,
                suggestion.position.lon
            );
            suggestionList.appendChild(li);
        });
    }

    function selectSuggestion(address, lat, lon) {
        document.getElementById("address").value = address;
        document.getElementById("latitude").value = lat;
        document.getElementById("longitude").value = lon;

        // Clear the suggestion list
        document.getElementById("suggestion-list").innerHTML = "";

        // Display map
        const selectedLocation = new google.maps.LatLng(lat, lon);
        map.setCenter(selectedLocation);
        map.setZoom(15); // Zoom into the selected location

        // Optionally add a marker for the selected location
        new google.maps.Marker({
            position: selectedLocation,
            map: map,
            title: address
        });
    }

    function initialize() {
        const mapOptions = {
            center: new google.maps.LatLng(20.5937, 78.9629),
            zoom: 6,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

        // Drawing Manager
        drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.POLYGON,
            drawingControl: true,
            drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER,
                drawingModes: [google.maps.drawing.OverlayType.POLYGON]
            },
            polygonOptions: {
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                editable: true,
                draggable: false
            }
        });

        drawingManager.setMap(map);

        // Event: Polygon Complete
        google.maps.event.addListener(drawingManager, 'polygoncomplete', function(polygon) {

            // google.maps.event.addListener(polygon, 'radius_changed', function () {
            //     console.log('radius changed');
            // });

            const path = polygon.getPath();
            const coordinatesArr = [];
            for (let i = 0; i < path.getLength(); i++) {
                const latLng = path.getAt(i);
                coordinatesArr.push(`${latLng.lat()}, ${latLng.lng()}`);
            }

            polygenCoordinates.push(coordinatesArr);
            document.getElementById("lat_long").value = JSON.stringify(polygenCoordinates);
            drawingManager.setDrawingMode(null); // Stop drawing after one polygon
        });
    }

    // Delete Shape Button
    document.getElementById("deleteButton").addEventListener("click", function() {
        drawingManager.setDrawingMode(null);
        alert("Deleted the shape.");
    });

    google.maps.event.addDomListener(window, 'load', initialize);
</script>