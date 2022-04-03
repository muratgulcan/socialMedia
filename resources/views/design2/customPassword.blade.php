@extends('layouts.app')

@section('content')
    


@section('title','Şifre değiştir')

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
                        <p>Bağımsız Sosyal İçerik Platformu</p>
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
                <div class="col-lg-12 text-center">
                    
                        
                        <form method="POST" action="{{ route('customPasswordPost') }}">
                            @csrf

                            
                            
                            <input  type="hidden" name="email" value="{{Auth::user()->email}}">

                            <button type="submit" style="color: white" class="site-btn">Parola değiştirmek için bağlantı linki yolla</button>


                        </form>

                   
                </div>
                
            </div>
            
        </div>
    </section>
    <!-- Login Section End -->


@endsection