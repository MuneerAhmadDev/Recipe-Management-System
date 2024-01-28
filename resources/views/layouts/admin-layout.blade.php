<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

            @yield('category')
            @yield('add-category')
            @yield('update-category')

            @yield('cuisine')
            @yield('add-cuisine')
            @yield('update-cuisine')

            @yield('profile')
            @yield('password')

            @yield('settings')
            @yield('banner')
        </div>
    </div>

    <script src="{{ asset('js/sidebarToggle.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}" defer></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('javascript')

</body>

</html>
