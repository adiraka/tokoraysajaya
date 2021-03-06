<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <title>Raisya Jaya</title>
    
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/materialize.css') }}" media="screen,projection">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/materialdesignicons.css') }}" media="screen,projection">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}" media="screen,projection">

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>

</head>
<body>

    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="{{ route('welcome') }}" class="brand-logo">Selamat Datang</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ url('/login') }}">Login</a></li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="{{ url('/login') }}">Login</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi mdi-menu"></i></a>
        </div>
    </nav>

    <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
            <div class="container">
                <br><br>
                <h1 class="header center red-text text-darken-1">Toko Buku : Raisya Jaya</h1>
                <div class="row center">
                    <h5 class="header col s12 light">JL. CUT NYAK DIEN NO. 1 HP. 081371044390 - DUMAI</h5>
                </div>
                <div class="row center">
                    <a href="#" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">LOGIN</a>
                </div>
                <br><br>
            </div>
        </div>
        <div class="parallax"><img src="img/banner1.jpg" alt="Unsplashed background img 1"></div>
    </div>

    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center brown-text"><i class="mdi mdi-flash"></i></h2>
                        <h5 class="center">Transaksi Lebih Cepat</h5>

                        <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center brown-text"><i class="mdi mdi-account-multiple"></i></h2>
                        <h5 class="center">Tampilan Yang Menarik</h5>

                        <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center brown-text"><i class="mdi mdi-settings"></i></h2>
                        <h5 class="center">Mudah Digunakan</h5>

                        <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="page-footer teal" style="padding-left: 0 !important">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Tentang Kami</h5>
                    <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Settings</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Connect</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                2016 @ Powered by STT Dumai
            </div>
        </div>
    </footer>

    <script src="{{ URL::asset('js/materialize.js') }}"></script>
    <script src="{{ URL::asset('js/init.js') }}"></script>

</body>
</html>