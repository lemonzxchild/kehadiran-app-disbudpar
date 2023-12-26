<div>
    <div class="content">
        <form action="{{ route('store') }}" method="post" name="location" onsubmit="return validateForm()">
            @csrf
            <div class="mapform">
                <div class="row">
                    <div class="mb-3">
                        <x-form-label id="title" label='Nama Lokasi' />
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="mb-3">
                        <x-form-label id="description" label='Deskripsi' />
                        <textarea type="text" class="form-control" name="description" id="description"></textarea>
                    </div>
                </div>

                <x-form-label id="description" label='Lokasi' />
                <h6>Klik untuk memilih titik lokasi pada peta!</h6>
                <div id="map" style="height:400px; max-width: 700px;" class=""></div>

                <div class="row">
                    <div class="col-6 mb-3 mt-3">
                        <x-form-label id="Latitude" label='Latitude' />
                        <input type="text" class="form-control" name="latitude" id="lat">
                    </div>
                    <div class="col-6 mb-3 mt-3">
                        <x-form-label id="Longitude" label='Longitude' />
                        <input type="text" class="form-control" name="longitude" id="lng">
                    </div>
                    <div class="col-6 mb-3">
                        <x-form-label id="distance" label='Jarak Radius (dalam meter)' />
                        <input type="text" class="form-control" name="distance" id="distance">
                    </div>
                </div>
                <script>
                    let map;

                    function initMap() {
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: {
                                lat: -7.7468514223931235,
                                lng: 110.35540568856668
                            },
                            zoom: 14,
                            scrollwheel: true,
                        });
                        const uluru = {
                            lat: -34.397,
                            lng: 150.644
                        };
                        let marker = new google.maps.Marker({
                            position: uluru,
                            map: map,
                            draggable: true
                        });
                        google.maps.event.addListener(marker, 'position_changed',
                            function() {
                                let lat = marker.position.lat()
                                let lng = marker.position.lng()
                                $('#lat').val(lat)
                                $('#lng').val(lng)
                            })
                        google.maps.event.addListener(map, 'click',
                            function(event) {
                                pos = event.latLng
                                marker.setPosition(pos)
                            })
                    }
                </script>
                <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&callback=initMap"
                    type="text/javascript"></script>
                <script>
                    function validateForm() {
                        var title = document.forms["location"]["title"].value;
                        if (title == "") {
                            alert("Judul tidak boleh kosong!");
                            return false;
                        }
                        var description = document.forms["location"]["description"].value;
                        if (description == "") {
                            alert("Deskripsi tidak boleh kosong!");
                            return false;
                        }
                        var latitude = document.forms["location"]["latitude"].value;
                        if (latitude == "") {
                            alert("Pilih lokasi pada map terlebih dahulu!");
                            return false;
                        }
                        var longitude = document.forms["location"]["longitude"].value;
                        if (longitude == "") {
                            alert("Pilih lokasi pada map terlebih dahulu!");
                            return false;
                        }
                        var distance = document.forms["location"]["distance"].value;

                        if (distance === "") {
                            alert("Jarak Radius tidak boleh kosong!");
                            return false;
                        }

                        // Check if the distance is a valid integer
                        if (!Number.isInteger(Number(distance))) {
                            alert("Jarak Radius harus berupa bilangan bulat!");
                            return false;
                        }
                    }
                </script>
            </div>

            <input type="submit" class="btn btn-primary">
        </form>


    </div>
