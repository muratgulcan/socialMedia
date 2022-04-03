@extends('layouts.app')

@section('content')
    

@php
use App\Models\Follow;   

@endphp


@section('title', $query. ' / '.  'Arama sonuçları')


        
        <div id="preloder">
            <div class="loader"></div>
        </div>
    
        
    
        
        
    
  
    


    <section class="product spad">
        
        <div class="container">
            
            <div class="row ">
                <div class="col-lg-12">
                    
                
                    
                    Üzgünüz, aramak istediğiniz şeyi bulamadık.
                        
                    

                    
                </div>
            </div>
        </div>
    </section>

    


   

@endsection