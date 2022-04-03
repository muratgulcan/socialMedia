@extends('layouts.app')

@section('content')


@section('title','Feedback')

<section class="product spad">

<div class="container">
    <div class="col-lg-12">
        

<ul class="list-group">
  @foreach ($feedbacks as $feedbackPost)
      
  
    <li class="list-group-item">
      <strong>{{$feedbackPost->feedback_title}}</strong> <span style="float: right;">İçerik id'si: {{$feedbackPost->icerik_id}}</span>
      <br>
      
      {{$feedbackPost->feedback_content}}
      <br>
      <small>&#8226; <strong>{{$feedbackPost->user->username ?? 'anonim'}}</strong> tarafından bildirildi</small>
      
    
    
    
    </li>


    @endforeach

  </ul>


</div>
</div>

</section>

@endsection