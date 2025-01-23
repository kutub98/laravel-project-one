

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Document')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="icon" href="{{ asset('asset/favicon4.png') }}"   type="image/svg+xml">
    {{-- <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" /> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: "Hind Siliguri", serif;
        }
    </style>

</head>
