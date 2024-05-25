<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- FONTS --}}
    <link href="https://fonts.cdnfonts.com/css/market-deco" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/m-plus-code-latin" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/safilms-crawford" rel="stylesheet">
    {{-- FONTAWESOME --}}
    <script src="https://kit.fontawesome.com/7d149bc2d8.js" crossorigin="anonymous"></script>

    {{-- VITE --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Presto.it</title>
</head>

<body>
    <x-navbar />

    <div class="min-vh-100 page-Bg-color">
        {{ $slot }}
    </div>

    <x-footer />
</body>

</html>
