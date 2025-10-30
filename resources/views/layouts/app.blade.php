<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Indonesia Drilling School')</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <!-- Load built CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-wG3newB9.css') }}">

    <!-- Load built JS -->
    <script type="module" src="{{ asset('build/assets/app-EphZmeVH.js') }}"></script>

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body class="bg-white text-gray-800">

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

</body>

</html>