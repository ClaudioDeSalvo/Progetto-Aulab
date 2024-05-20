<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap"
        rel="stylesheet">
    {{-- FONTAWESOME --}}
    <script src="https://kit.fontawesome.com/7d149bc2d8.js" crossorigin="anonymous"></script>

    {{-- VITE --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Presto.it</title>
</head>

<body>
    <x-navbar />

    <div class="min-vh-100 open-sans-text">
        {{ $slot }}
    </div>

    <x-footer />
</body>

</html>
