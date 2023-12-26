@extends('layouts.app')

@push('style')
    @powerGridStyles
@endpush

@section('buttons')
    <div class="btn-toolbar mb-2 mb-md-0">
        <div>
            <a href="{{ route('attendances.edit', ['id' => 1]) }}" class="btn btn-success">
                {{-- <span data-feather="plus-circle" class="align-text-bottom me-1"></span> --}}
                <i class="bi bi-sliders"></i>
            </a>
        </div>
    </div>
@endsection

@section('content')
    @include('partials.alerts')
    <div class="row">
        <div class="col">
            <h6>Keterangan</h6>
            <p>{{ $data->description }}</p>
        </div>
    </div>
    <div class="row">
        <hr class="hr" />
        <div class="vr" style="height: 50px;"></div>
        <div class="col">
            <h6>Jam Presensi Masuk:</h6>
            <h4>{{ $start }} - {{ $batasstart }}</h4>
        </div>
        <div class="vr" style="height: 50px;"></div>
        <div class="col">
            <h6>Jam Presensi Pulang:</h6>
            <h4>{{ $end }} - {{ $batasend }}</h4>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    @powerGridScripts
@endpush
