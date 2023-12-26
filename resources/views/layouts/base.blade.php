<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="assets/images/logo/favicon2.png" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/logo/favicon2.png" type="image/png" />
    <link rel="stylesheet" href="assets/css/shared/iconly.css" />
    @include('partials.styles') @stack('style')
    <title>{{ $title }}</title>
</head>

<body>

    <x-toast-container />

    @yield('base')

    @include('partials.scripts')
    @stack('script')

</body>

</html>
