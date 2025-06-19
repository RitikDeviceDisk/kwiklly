@extends('admin.includes.main')

@section('main')
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
        padding: 0px;
        height: 600px;
        width: 100%;
    }
</style>
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
                        <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=drawing"></script>-->
                       <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeNwTqpP2VfgPVtTH6Hzy2BA2zBw3ioUk&amp;sensor=false&amp;libraries=drawing"></script>
                        <form class="cmxform form-horizontal tasi-form" method="post" action="https://kwiklly.com/chef_admin/Home/addpincodelocation">
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-2">State</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="state_id" required="">
                                        <option value="">Select State</option>
                                        <option value="1">Andaman &amp; Nicobar Islands</option><option value="2">Andhra Pradesh</option><option value="3">Arunachal Pradesh</option><option value="4">Assam</option><option value="5">Bihar</option><option value="6">Chandigarh</option><option value="7">Chattisgarh</option><option value="8">Dadra &amp; Nagar Haveli</option><option value="9">Daman &amp; Diu</option><option value="10">Delhi</option><option value="11">Goa</option><option value="12">Gujarat</option><option value="13">Haryana</option><option value="14">Himachal Pradesh</option><option value="15">Jammu &amp; Kashmir</option><option value="16">Jharkhand</option><option value="17">Karnataka</option><option value="18">Kerala</option><option value="19">Lakshadweep</option><option value="20">Madhya Pradesh</option><option value="21">Maharashtra</option><option value="22">Manipur</option><option value="23">Meghalaya</option><option value="24">Mizoram</option><option value="25">Nagaland</option><option value="26">Odisha</option><option value="27">Poducherry</option><option value="28">Punjab</option><option value="29">Rajasthan</option><option value="30">Sikkim</option><option value="31">Tamil Nadu</option><option value="32">Telangana</option><option value="33">Tripura</option><option value="34">Uttar Pradesh</option><option value="35">Uttarakhand</option><option value="36">West Bengal</option>                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-2">Pincode</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="cname" name="id" type="hidden" value="1" aria-required="true" required="">
                                    <input class=" form-control" id="cname" name="pincode" type="text" aria-required="true" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cname" class="control-label col-lg-2">Place</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="address" name="place" type="text" placeholder="Search Address..." oninput="fetchSuggestions(this.value)" aria-required="true" required="">
                                    <input type="hidden" id="latitude">
                                    <input type="hidden" id="longitude">
                                    <ul id="suggestion-list" class="suggestions pt-0"></ul>
                                    <textarea id="lat_long" name="lat_long" rows="5" class="form-control" readonly=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-success" type="submit">Save</button>
                                    <a href="https://kwiklly.com/chef_admin/Home/pincode_locations" class="btn btn-default" type="button">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div  id="map_canvas" >
                <button id="deleteButton">Delete Selected Shape</button>
                <!-- Map will be rendered here -->
            </div>
        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Address Search suggestion by Microsoft Azure Maps API
    const subscriptionKey = "AIzaSyDeNwTqpP2VfgPVtTH6Hzy2BA2zBw3ioUk";
    var polygenCoordinates = [];

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

    // Google Maps and Drawing Manager
    let map, drawingManager;

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

@endsection
@push('scripts')


@endpush
