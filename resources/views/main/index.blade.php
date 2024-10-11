<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />  
    <link rel="icon" href="{{ asset('logo.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('logo.ico') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <title>Pet World</title>
</head>

<body>

    @include('includes.header')

    @yield('main')

    @include('includes.footer')


</body>

</html>
