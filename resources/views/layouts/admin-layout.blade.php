<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/required.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/textBG.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('pageTitle')</title>
</head>

<body>
    <div class="wrapper">
        <x-admin-components.sidebar />
        <div class="main">
            <x-admin-components.admin-navbar />
            @yield('dashboard')

            @yield('users')

            @yield('profile')
            @yield('password')

            @yield('settings')
            @yield('banner')
        </div>
    </div>

    @stack('javascript')
    <script src="{{ asset('js/sidebarToggle.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}" defer></script>
</body>

</html>
