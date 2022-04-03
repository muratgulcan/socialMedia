@extends('layouts.app')

@section('content')
    

@section('title','Şifre değiştir')


<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Şifre değiştir</h2>
                        <p>Bağımsız Sosyal İçerik Platformu </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Giriş yap</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="input__item">
                                <input type="password" class="form-control" placeholder="Parola"  name="password" required autocomplete="current-password">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">Giriş yap</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- Login Section End -->



@endsection