<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ __('Astore | Find & Publish Your Thing') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Font awesome -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- Booststrap icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            body{width: 100%; height: 100vh;background: url('pattern.png') fixed no-repeat center;background-size: cover}
            .over-bg{width: 100%;height: 100vh;background-color: #14141465;}
            .fixed-card{width: 100%;}
            .card-body{width: 560px;position: absolute;left: calc(50% - 280px);top: calc(50% - 240.055px);background-color: #fafafa;
                outline: 1px solid #141414;border-radius: 7px;padding: 0px;}
            .sign{top: calc(50% - 323.18px);}
            .mail{top: calc(50% - 161.03px);}
            .hdr{line-height: 20px;}
            .hdr h4{font-family: Matura MT Script Capitals;background: #fff;color: #141414;padding: 20px;border-radius: 7px 7px 0 0;}
            .form-card{padding: 20px;}
            .form-card input{background-color: #fff;}
            .socials div{display: flex;justify-content: center;}
            .socials a{margin: 5px;}
            .socials a i{background-color: #141414;padding: 5px;font-size: 16px; font-weight: 500;color: #fff;}
            @media(max-width: 600px){
                .card-body{width: 400px;left: calc(50% - 200px);top: calc(50% - 233.195px);}
                .hdr h4, .form-card{padding: 20px 10px;}
            }
            @media(max-width: 420px){
                .card-body{width: 320px;left: calc(50% - 160px);top: calc(50% - 213.02px);}
                .hdr h4, .form-card{padding: 10px;}
                .sign{top: calc(50% - 296.095px);}
            }
        </style>
    </head>
    <body>
        <div class="over-bg">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
