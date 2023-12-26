@extends('layouts.app')

@push('style')
    @powerGridStyles
@endpush

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-3 mb-md-0">
                    {{-- <h5 class="card-title">{{ $attendance->title }}</h5> --}}
                    <h6 class="card-subtitle mb-2 text-muted">{{ $attendance->description }}</h6>
                    <hr class="hr hr-blurry" />
                    <div class="row">
                        <div class="col-md-2 mb-1">
                            <small class="fw-bold text-muted d-block">Range Jam Masuk</small>
                            <h6>{{ $attendance->start_time }} - {{ $attendance->batas_start_time }}</h6>
                        </div>
                        <div class="col-md-2 mb-1">
                            <small class="fw-bold text-muted d-block">Range Jam Pulang</small>
                            <h6>{{ $attendance->end_time }} - {{ $attendance->batas_end_time }}</h6>
                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('presences.not-present', $attendance->id) }}"
                                class="btn btn-sm btn-danger mt-1 w-100">Daftar
                                Pegawai
                                Belum
                                Presensi</a>
                        </div>
                        <div class="col-md-3"><a href="{{ route('presences.permissions', $attendance->id) }}"
                                class="btn btn-sm btn-primary mt-1 w-100">Daftar
                                Pegawai
                                Izin</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-8">
                            <div class="mb-2">
                                <small class="fw-bold text-muted d-block">Yang Mengakses Presensi</small>
                                <div>
                                    @foreach ($attendance->positions as $position)
                                        <span class="badge text-bg-success d-inline-block me-1">{{ $position->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                </div> --}}

            </div>
        </div>
    </div>

    <div>
        <livewire:presence-table attendanceId="{{ $attendance->id }}" />
    </div>
@endsection

@push('script')
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    @powerGridScripts
@endpush
