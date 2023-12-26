@extends('layouts.auth')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endpush

@section('content')
    <div class="w-100">
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center login-title">
                    <div class="col-md-12 d-flex justify-content-center align-items-center mt-3">
                        <h2>Aplikasi Presensi Pegawai</h2>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center align-items-center mb-3">
                        <h2>Dinas Kebudayaan dan Pariwisata Kabupaten Belitung Timur</h2>
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center mt-5">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="{{ asset('assets/images/6308.jpg') }}" class="img-fluid rounded-5" alt="ilustration">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <h1 class="h3 fw-bold">Silahkan Masuk</h1>
                        </h1>
                        <div class="text-center text-lg-start pt-2">
                            <p>Catatan: Anda dapat masuk pada halaman ini menggunakan akun admin.</p>
                        </div>
                        <form method="POST" action="{{ route('auth.login') }}" id="login-form">
                            <!-- Email input -->
                            <div class="form-floating mb-4">
                                <input type="email" id="floatingInputEmail" class="form-control form-control-lg"
                                    placeholder="name@example.com" name="email" />
                                <label for="floatingInputEmail text-muted">Email</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-floating mb-3">
                                <input type="password" id="floatingPassword" class="form-control form-control-lg"
                                    placeholder="password" name="password" />
                                <label for="floatingPassword text-muted">Password</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" name="remember"
                                        id="flexCheckRemember" />
                                    <label class="form-check-label" for="flexCheckRemember">
                                        Ingat saya
                                    </label>
                                </div>
                                <a href="#!" class="text-body"></a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button class="btn bg-primary btn-secondary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;" type="submit"
                                    id="login-form-button">Masuk</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

@push('script')
    <script type="module" src="{{ asset('js/auth/login.js') }}"></script>
@endpush
