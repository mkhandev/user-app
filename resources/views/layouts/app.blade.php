<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header>
        <!-- Navigation Bar or Header Content -->
        @include('layouts/header')
    </header>

    <main>
        <div class="container mx-auto">
            @yield('content')
        </div>
    </main>

    <footer>
        <!-- Footer Content -->
        @include('layouts/footer')
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
