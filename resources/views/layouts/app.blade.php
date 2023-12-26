@extends('layouts.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush

@section('base')
    <div id="app">
        @include('partials.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading d-flex justify-content-between">
                <h3>{{ $title }}</h3>
                @yield('buttons')
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        @yield('content')
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
