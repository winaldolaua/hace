<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>HCCI | {{ $title ?? "" }}</title>
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>

    <body>
        <div id="wrapper">
            @include('partials.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @include('partials.navbar')
                    <div>@yield('container')</div>
                </div>
            </div>
        </div>
        @include('partials.footer')
    </body>

</html>