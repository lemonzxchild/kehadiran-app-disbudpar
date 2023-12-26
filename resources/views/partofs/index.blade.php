@extends('layouts.app')

@push('style')
    @powerGridStyles
@endpush

@section('buttons')
    <div class="btn-toolbar mb-2 mb-md-0">
        <div>
            <a href="{{ route('partofs.create') }}" class="btn btn-success">
                Tambah Data Bagian
            </a>
        </div>
    </div>
@endsection

@section('content')
    @include('partials.alerts')
    <livewire:partof-table />
@endsection

@push('script')
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    @powerGridScripts
@endpush
