<!-- resources/views/layouts/adminmain.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Indonesia Drilling School')</title>

    @vite(['resources/css/appadmin.css', 'resources/js/appadmin.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body class="bg-gray-50">

    @include('admin.sidebar')
    @include('admin.topbar')

    <!-- Tambahkan pl-6 untuk memberi ruang ekstra di sebelah kiri -->
    <main class="ml-64 pt-16 pl-6">
        @yield('content')
    </main>

</body>

</html>