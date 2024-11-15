<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pie-chart.svg') }}" type="image/x-icon">

    <title>@yield('title', 'Investimentos')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    @yield('style')
    <style>
        body {
            font-family: Nunito, sans-serif;
            font-optical-sizing: auto;
            font-style: normal;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100" style="background: #eaeaea;">
    @include('layouts.header')

    <main class="content-wrapper flex-grow-1">
        @yield('content')
    </main>

    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/echarts@5/dist/echarts.min.js"></script>

    @yield('script')
</body>
</html>
