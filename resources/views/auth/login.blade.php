@extends('layouts.logres')

@section('content')
    <div class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}
                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="img/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
                        <p class="center login-form-text"><b>Toko Buku : Raisya Jaya</b></p><hr>
                        <p class="center login-form-text">Jl. Cut Nyak Dien No. 1 Dumai</p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi mdi-account-outline prefix"></i>
                        <input id="email" type="text" name="email">
                        <label for="email" class="center-align">Email</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi mdi-lock-outline prefix"></i>
                        <input id="password" type="password" name="password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="blue waves-effect waves-light btn col s12" type="submit">Masuk</button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <p class="margin medium-small"><a href="{{ url('/register') }}">Daftar Akun ?</a></p>
                    </div>  
                </div>
            </form>
        </div>
    </div>
@endsection