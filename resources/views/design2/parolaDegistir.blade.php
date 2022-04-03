@extends('layouts.app')

@section('content')
    

@section('title','Parola değiştir / Müzik')

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
                        <h2>Margravials</h2>
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
                    <div class="login__form align-center" >
                        <h3>Parola değiştir</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger" >
                                
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <strong><li style="list-style:none;">{{ $error }}</li></strong>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        
                        <form method="POST" action="{{ route('customPasswordPost') }}">

                            
                            @csrf

                            <div class="input__item" >
                                <input type="password" class="form-control" placeholder="Mevcut parola"  name="current_password" required autocomplete="current-password">
                                <span class="icon_lock"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" class="form-control" placeholder="Yeni parola"  name="new_password" required autocomplete="current-password">
                                <span class="icon_lock"></span>
                            </div>
                            <div class="input__item">
                                <input type="password" class="form-control" placeholder="Parolayı doğrula"  name="new_confirm_password" required autocomplete="current-password">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">Kaydet</button>
                        </form>
                        
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
    .alert-success{
        color: black;
        border-color:#8ad69d;
        background-color: #8ad69d;
    }
</style>



@endsection