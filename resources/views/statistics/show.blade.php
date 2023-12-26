@extends('layouts.app')

@section('buttons')
    {{-- <div class="btn-toolbar mb-2 mb-md-0">
        <div>
            <a href="{{ route('statistics.index') }}" class="btn btn-sm btn-light">
                <span data-feather="arrow-left-circle" class="align-text-bottom"></span>
                Kembali
            </a>
        </div>
    </div> --}}
@endsection

@section('content')
    @include('partials.alerts')

    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <label for="filterDate" class="form-label fw-bold">Tampilkan Berdasarkan Bulan</label>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="get">
                        <div class="input-group">
                            <input type="month" class="form-control" id="filterDate" name="display-by-date"
                                value="{{ request('display-by-date') }}">
                            <button class="btn btn-primary" type="submit" id="button-addon1">Tampilkan</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex flex-row-reverse bd-highlight align-items-center">
                    <button class="btn btn-success" onclick="ExportToExcel('xlsx')">Ekspor Data ke Excel</button>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="p-3 rounded bg-light border my-3 d-flex align-items-center justify-content-between">
            <div>Bulan : <span class="fw-bold">
                    {{ \Carbon\Carbon::parse($date)->monthName }}
                </span>
            </div>
            <div>Tahun : <span class="fw-bold">{{ $year }}</span></div>
            <div>Jumlah Pegawai : <span class="fw-bold">{{ count($statistics) }}</span></div>
        </div>
        <table class="display" id="myTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nama Pegawai</th>
                    <th>No Telepon</th>
                    <th>Hadir</th>
                    <th>Tidak Hadir</th>
                    <th>Izin</th>
                    <th>Waktu Kerja / Kehadiran</th>
                    <th>Waktu Kerja Total</th>
                    <th>Tepat Waktu</th>
                    <th>Terlambat</th>
                    <th>Overtime</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($statistics as $data)
                    <tr>
                        <td align="center">{{ $data['id'] ?? '0' }}</td>
                        <td>{{ $data['name'] ?? '0' }}</td>
                        <td>{{ $data['phone'] ?? '0' }}</td>
                        <td align="center">{{ $data['jumlah_hadir'] ?? '0' }}</td>
                        <td align="center">{{ $data['jumlah_tidak_hadir'] ?? '0' }}</td>
                        <td align="center">{{ $data['jumlah_izin'] ?? '0' }}</td>
                        <td align="center">
                            <?php
                            // Assuming $data['total_working_hours'] is in the format "hours:minutes" or null
                            $totalWorkingTime = $data['total_working_hours_hadir'] ?? '0';
                            
                            // Split the hours and minutes
                            $timeComponents = explode(':', $totalWorkingTime);
                            
                            // Ensure that the array has at least 2 elements (hours and minutes)
                            if (count($timeComponents) >= 2) {
                                [$hours, $minutes] = $timeComponents;
                            
                                // Remove leading zeros from hours
                                $hours = ltrim($hours, '0');
                            
                                // Output the formatted time
                                echo $hours . ' jam ' . $minutes . ' menit';
                            } else {
                                echo 'Data Kosong';
                            }
                            ?>
                        </td>
                        <td align="center">
                            <?php
                            // Assuming $data['total_working_hours'] is in the format "hours:minutes:seconds" or null
                            $totalWorkingHours = $data['total_working_hours'];
                            
                            if ($totalWorkingHours !== null) {
                                // Split the hours, minutes, and seconds
                                $timeComponents = explode(':', $totalWorkingHours);
                            
                                // Ensure that the array has at least 3 elements (hours, minutes, and seconds)
                                if (count($timeComponents) >= 3) {
                                    [$hours, $minutes, $seconds] = $timeComponents;
                            
                                    // Remove leading zeros from hours, minutes, and seconds
                                    $hours = ltrim($hours, '0');
                                    $minutes = ltrim($minutes, '0');
                            
                                    // Output the formatted time
                                    echo $hours . ' jam ' . $minutes . ' menit ';
                                } else {
                                    echo 'Data Invalid';
                                }
                            } else {
                                echo 'Data Kosong';
                            }
                            ?>
                        </td>
                        <td align="center">{{ $data['jumlah_tepat_waktu'] ?? '0' }}</td>
                        <td align="center">{{ $data['jumlah_terlambat'] ?? '0' }}</td>
                        <td align="center">{{ $data['jumlah_overtime'] ?? '0' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- </div> --}}
    </div>
@endsection
