<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mcf carreer transition</title>
    @include('admin.layouts.css')
</head>
<body>

<div class="wrapper">

    @include('admin.layouts.sidebar')

    <div class="main">

        @include('admin.layouts.navbar')

        <main class="content">
            @yield('content')
        </main>

        {{-- footer--}}

        @include('admin.layouts.footer')
    </div>
</div>


@include('admin.layouts.js')
</body>
</html>
