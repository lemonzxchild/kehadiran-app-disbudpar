@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <a href="/positions">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon purple mb-2">
                                    <i class="iconly-boldWork"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">
                                    Posisi
                                </h6>
                                <h6 class="font-extrabold mb-0">{{ $positionCount }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <a href="/employees">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon blue mb-2">
                                    <i class="iconly-boldProfile"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Jumlah Pegawai</h6>
                                <h6 class="font-extrabold mb-0">{{ $userCount }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <a href="/presences/1">
                <div class="card">
                    <div class="card-header">
                        <h6>Kehadiran Hari Ini</h6>
                    </div>
                    <div class="card-body">
                        <div id="chart-visitors-profile"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <script>
        let optionsVisitorsProfile = {
            series: [{{ $present }}, {{ $notPresent }}, {{ $permission }}],
            labels: ["Hadir", "Tidak Hadir", "Izin"],
            colors: ["#18a100", "#FE5454", "#FFF821"],
            chart: {
                type: "donut",
                width: "100%",
                height: "350px",
            },
            legend: {
                position: "bottom",
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: "30%",
                    },
                },
            },
        };
    </script>
@endsection
