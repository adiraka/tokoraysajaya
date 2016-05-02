<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <title>Admin Panel</title>
    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/materialize.css') }}" media="screen,projection">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/materialdesignicons.css') }}" media="screen,projection">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}" media="screen,projection">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/datatables.css') }}" media="screen,projection">

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>

</head>
<body>
    
    @include('layouts.partials.header')
    
    <div id="main">
        <div class="wrapper">
            @include('layouts.partials.sidebar')
            <section id="content">
                <div id="breadcrumbs-wrapper" class=" grey lighten-3">
                    <div class="container">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <h5 class="breadcrumbs-title">{{ $title }}</h5>
                                <ol class=""></ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="section">
                        @yield('content')
                    </div>
                </div>
            </section>          
        </div>
    </div>
    
    @include('layouts.partials.footer')
    
    <script src="{{ URL::asset('js/materialize.js') }}"></script>
    <script src="{{ URL::asset('js/pace.min.js') }}"></script>
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script src="{{ URL::asset('js/datatables.js') }}"></script>
    @stack('scripts')

</body>
</html>