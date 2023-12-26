<div>
    <form wire:submit.prevent="saveLocations" method="post" novalidate>
        @include('partials.alerts')
        <div class="w-100">
            <div class="mb-3">
                <x-form-label id="title" label='Nama Lokasi' />
                <x-form-input id="title" name="title" wire:model.defer="locations.title" />
                <x-form-error key="locations.title" />
            </div>
            <div class="mb-3">
                <x-form-label id="description" label='Keterangan' />
                <textarea id="description" name="description" class="form-control" wire:model.defer="locations.description"></textarea>
                <x-form-error key="locations.description" />
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <x-form-label id="latitude" label='Latitude' />
                        <x-form-input id="latitude" name="latitude" wire:model.defer="locations.latitude">
                        </x-form-input>
                        <x-form-error key="locations.latitude" />
                    </div>

                    <div class="col-6">
                        <x-form-label id="longitude" label='Longitude' />
                        <x-form-input id="longitude" name="longitude" wire:model.defer="locations.longitude">
                        </x-form-input>
                        <x-form-error key="locations.longitude" />
                    </div>

                </div>
            </div>
            <div id="map" style="height:400px; max-width: 700px;" class="mb-3"></div>
        </div>
        <hr>
</div>

<div class="d-flex justify-content-between align-items-center mb-5">
    <button class="btn btn-primary">
        Simpan
    </button>
</div>
</form>
</div>
{{-- <script>
    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: -34.397,
                lng: 150.644
            },
            zoom: 8,
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
                $('#latitude').val(lat)
                $('#longitude').val(lng)
            })

        google.maps.event.addListener(map, 'click',
            function(event) {
                pos = event.latLng
                marker.setPosition(pos)
            })
    }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=-7.050386849309664.113.93992952240825&destinations=-7.039058325972858%2C113.91924418556384&key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&callback=initMap"
    type="text/javascript"></script> --}}
