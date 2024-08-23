@extends('layouts.app')

@section('content')

<div class="content">
    <form action="{{ route('site_survey.store') }}" method="post">
        @csrf
        <div class="mapform">
            <div class="row">
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="lat" name="lat" id="lat" readonly>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="lng" name="lng" id="lng" readonly>
                </div>
            </div>

            <!-- Ensure this container has height and width -->
            <div id="map" style="height: 400px; width: 100%;" class="my-3"></div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    let map = L.map('map').setView([3.2888784335929744,102.06586684019376], 8);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
                    
                   

                    map.on('click', function (e) {
                        marker.setLatLng(e.latlng);
                        document.getElementById('lat').value = e.latlng.lat;
                        document.getElementById('lng').value = e.latlng.lng;
                    });
                });
            </script>
        </div>

        <input type="submit" class="btn btn-primary">
    </form>
</div>

@endsection
