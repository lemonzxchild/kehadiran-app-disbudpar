@extends('layouts.app')

@push('style')
    @powerGridStyles
@endpush

@section('content')
    <div class="row">
        <div class="col-md-7">
            <h6 class="mb-4">Silahkan memilih jadwal untuk dilihat rekapnya.</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <ul class="list-group">
                @foreach ($attendances as $attendance)
                    <a href="{{ route('statistics.show', $attendance->id) }}"
                        class="list-group-item d-flex justify-content-between align-items-start py-3">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">{{ $attendance->title }}</div>
                            <p class="mb-0">{{ $attendance->description }}</p>
                        </div>
                        @include('partials.attendance-badges')
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    @powerGridScripts
@endpush
