@extends('layouts.app')

@section('content')
    
@section('title','Kayıt ol')

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
                        <h2>Kayıt ol</h2>
                        <p>Bağımsız İçerik Platformu</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login2 spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" style="border-right:1px solid #ccc;">
                    <div class="login__form" >
                        <h3>Kayıt ol</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger" >
                                
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <strong><li style="list-style:none;"> {{ $error }}</li></strong>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="input__item">
                                <input id="name" class="form-control" placeholder="Adınız" type="text" name="name"  required="" oninvalid="this.setCustomValidity('Lütfen bu alanı boş bırakmayınız')" oninput="setCustomValidity('')"  >
                                <span class="icon_profile"></span>
                            </div>

                            <div class="input__item">
                                <input id="username" maxlength="16" class="form-control" onkeypress="return /[a-zA-Z0-9-]+/i.test(event.key)" placeholder="Kullanıcı adınız" type="text" name="username"  required="" oninvalid="this.setCustomValidity('Lütfen bu alanı boş bırakmayınız')" oninput="setCustomValidity('')" >
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" required="" oninvalid="this.setCustomValidity('Lütfen bu alanı boş bırakmayınız')" oninput="setCustomValidity('')">
                                <span class="icon_mail"></span>
                            </div>

                            <div class="input__item">
                                <input id="password" type="password" class="form-control" placeholder="Parola"  name="password" required oninvalid="this.setCustomValidity('Lütfen bu alanı boş bırakmayınız')" oninput="setCustomValidity('')">
                                <span class="icon_lock"></span>
                            </div>
                            <div class="input__item">
                                <input id="password_confirmation" type="password" class="form-control" placeholder="Parolanızı yeniden giriniz"  name="password_confirmation" required oninvalid="this.setCustomValidity('Lütfen bu alanı boş bırakmayınız')" oninput="setCustomValidity('')">
                                <span class="icon_lock"></span>
                            </div>

                            <button type="submit" class="site-btn">Kayıt ol</button>
                        </form>
                        <a href="{{route('login')}}" class="forget_pass2"><strong> Hesabınız var mı? Giriş yapın</strong></a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Login Section End -->

  


    </div>
    <!-- Search model end -->



    <script>

        $(function() {
                $('#username').on('keypress', function(e) {
                    if (e.which == 32){
                        console.log('Space Detected');
                        return false;
                    }
                });

                $('#email').on('keypress', function(e) {
                    if (e.which == 32){
                        console.log('Space Detected');
                        return false;
                    }
                });

                $('#password').on('keypress', function(e) {
                    if (e.which == 32){
                        console.log('Space Detected');
                        return false;
                    }
                });

                $('#password_confirmation').on('keypress', function(e) {
                    if (e.which == 32){
                        console.log('Space Detected');
                        return false;
                    }
                });


        });



        

    </script>

<style>
    .alert-danger{
        color: black;
        border-color:#fbccd5;
        background-color: #fbccd5;

    }
</style>


@endsection