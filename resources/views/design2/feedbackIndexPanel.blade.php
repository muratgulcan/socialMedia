@extends('layouts.app')

@section('content')


@section('title','Feedback Index')

<section class="product spad">

<div class="container">
    <div class="col-lg-12">
        

<ul class="list-group">
  @foreach ($feedbacks as $feedbackPost)
      
  
    <li class="list-group-item">
      <strong>{{$feedbackPost->feedback_title}}</strong> <span style="float: right;"></span>
      <br>
      
      {{$feedbackPost->feedback_content}}
      <br>
      
    
    
    
    </li>


    @endforeach

  </ul>


</div>
</div>

</section>

@endsection