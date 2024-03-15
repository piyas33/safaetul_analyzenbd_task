<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Task || Admin Panel</title>

    <!-- Styles -->
    @include('partials.styles')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('partials.header')
    @include('partials.sidebar')
    @yield('content')
    @include('partials.footer')
</div>
@include('partials.scripts')
</body>
</html>
