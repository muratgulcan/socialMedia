@extends('layouts.app')

@section('content')
    

@section('title','Margravials / Giriş Yap')

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
                        <h2>Giriş Yap</h2>
                        <p>Bağımsız İçerik Platformu</p>
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
                <div class="col-lg-6" style="border-right:1px solid #ccc;">
                    <div class="login__form" >
                        <h3>Giriş yap</h3>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger" >
                                
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <strong><li style="list-style:none;">{{ $error }}</li></strong>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf


                            <div class="input__item">
                                <input type="text" class="form-control" oninvalid="this.setCustomValidity('Lütfen bu alanı boş bırakmayınız')" oninput="setCustomValidity('')" placeholder="Email" type="email" name="email" required="" autofocus>
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" class="form-control" oninvalid="this.setCustomValidity('Lütfen bu alanı boş bırakmayınız')" oninput="setCustomValidity('')" placeholder="Parola"  name="password" required autocomplete="current-password">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">Giriş yap</button>
                        </form>
                        <a href="#" class="forget_pass"><strong>  Şifreni mi unuttun?</strong></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Hesabın yok mu?</h3>
                        <a href="{{route('register')}}" class="primary-btn">Kayıt ol</a>
                    </div>
                </div>
            </div>
         
        </div>
    </section>
    <!-- Login Section End -->

  

<style>
    .alert-danger{
        color: black;
        border-color:#fbccd5;
        background-color: #fbccd5;

    }
</style>



@endsection