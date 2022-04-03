@extends('layouts.app')

@section('content')
    

@php
use App\Models\Follow;   

@endphp


@section('title', 'Hata')


        
        <div id="preloder">
            <div class="loader"></div>
        </div>
    
        
    
        
        
    
  
    


    <section class="product spad">
        
        <div class="container">
            
            <div class="row ">
                <div class="col-lg-12">
                    
                
                    
                    <h6 class="titleFont">Üzgünüz, aramak istediğiniz şeyi bulamadık.</h6>
                    <br>
                    <h6 style="text-align: center; font-size:3rem;"> ✌️😥</h6>
                        
                    

                    
                </div>
            </div>
        </div>
    </section>

    
<style>
       .titleFont{
        font-size: 2rem; 
        color:#000;    
        text-shadow: 1px 0 #000;
        letter-spacing:1px;
        font-weight:bold;
        text-align: center;
    }
</style>

   

@endsection