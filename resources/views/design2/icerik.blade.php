@extends('layouts.app')

@section('content')

@php
 use App\Models\Likes;   
 use App\Models\Follow;   

@endphp

@section('title',$icerik->title)


    
    <div id="preloder">
        <div class="loader"></div>
    </div>

    

    <!-- Hero Section Begin 

    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                <div class="hero__items set-bg" >
                    <img src="images/hero/hero-1.jpg" width="500" height="500">
                    <div class="hero__text">
                        <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                        <p>After 30 days of travel across the world...</p>
                        <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>

                
                <div class="hero__items set-bg" >
                    <img src="images/image1.jpg" width="500" height="500">
                    <div class="hero__text">
                        <h2>deneme</h2>
                        <p>fikret</p>
                        <a href="#"><span>izle</span> <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
-->
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        
                        <div class="row">
                            
                            <div class="section-title">
                                <h2>{{ $icerik->title}}</h2>
                                <hr style="margin-right: 5rem; margin-left:1rem;">
                            </div>
                            
                            <div class="col-lg-11" >
                                <div class="blog__details__content" >
                                    <div class="blog__details__text" >
                                        <img src="<?=url('/')?>/images/posts/postsFirst/{{$icerik->first_photo}}" alt=""  width="750" height="375" style="margin-bottom: 1rem;">
                                        
                                        {!! $icerik->content !!}
                                    </div>
                                </div>
                            </div>            
                        </div>
                        
                        <hr >

                        <div class="d-flex justify-content-between"><a href="{{route('getProfile', ['username'=> $icerik->user->username])}}"><img src="<?=url('/')?>/images/avatars/{{$icerik->user->photo}}" alt="" style="margin-right: 0.4rem;" class="rounded-circle" width="35" height="35"><small class="text-muted"><strong>{{$icerik->user->username}}</strong></a> </small><small class="text-muted" style="float: right;"><i class="far fa-clock" style="margin-right: 0.3rem; margin-top:0.8rem;" ></i>{{$icerik->created_at->format('d F H:i')}}</span></small></div>
                        
                        <hr>
                        
                        <button style="float:right; border:0; background:none;" data-toggle="modal" data-target="#feedbackModal"><small><i class="fas fa-exclamation" style="" ></i></button></small>
                        @auth
                        
                            
                              
                                
                              @php
                              
                               $likesCheck = Likes::where('user_id', Auth::user()->id)->where('post_id', $icerik->id)->first();
                               
                              
                              @endphp
                                @if(empty($likesCheck))
                                <a href="{{route('like',['id'=>$icerik->id])}}" style="float:right; border:0; background:none; margin-right:2rem;" type="submit"  ><i class="fas fa-heart like"  ></i><br><small class="likeCount" ><b>{{$icerik->likes->count()}}</b></small></a>
                                @else
                                
                                <a href="{{route('unlike',['id'=>$icerik->id])}}"   style="float:right; border:0; background:none; margin-right:2rem;" type="submit" ><i class="fas fa-heart unlike"  ></i><br><small class="unlikeCount" ><b>{{$icerik->likes->count()}}</b></small></a>
                                
                                @endif
                           
                          
                        
                        @endauth

                        

                        


                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-8">
                            <div class="anime__details__review">
                                <div class="section-title">
                                    <h5>Yorumlar</h5>
                                </div>


                                @if($icerik->comments->count() < 1)
                                    <h4 style="text-align: center;"   >Henüz yorum yok, ilk yorum yapan sen ol ✌️</h4>
                                @endif


                                @foreach($icerik->comments as $comment)

                                

                               
                                    <div class="anime__review__item">

                                        
                                    
                                        <div class="anime__review__item__pic">
                                            <img src="<?=url('/')?>/images/avatars/{{$comment->user->photo}}" alt="">
                                        </div>

                                        
                                    
                                        <div class="anime__review__item__text">
                                           <h6><a href="{{route('getProfile', ['username'=> $comment->user->username])}}" style="color:inherit;">{{$comment->user->name }}</a></a><span style="float: right;">{{$comment->created_at->diffForHumans()}}</span></h6>
                                           
                                            <p> {{$comment->comment }}</p>
                                            
                                            
                                           
                                            <p class="card-text">@if(Auth::check() && (Auth::user()->id == $comment->user->id))<span class="icon_trash" style="color: inherit; float:right;" type="button" data-toggle="modal" data-target="#default{{ $comment->id }}"></span>@endif</p>
                                            


                                            <div class="modal fade" id="default{{ $comment->id }}" style="margin-top: 10%;" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header border-0">
                                                      <h5 class="modal-title" id="deleteModal">Yorumu silmek istiyor musunuz?</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    
                                                    <form method="POST" action="{{ route('deleteComments',$comment->id) }}">
                                                      @csrf
                                                      <div class="modal-body">
                                                        Bu işlemi gerçekleştirirseniz geri almanız mümkün olmayacaktır ve herkes tarafından görünen yorumunuz bir daha görünmemek üzere silinecektir.
                                                      </div>
                                                      <div class="modal-footer border-0">
                                                        <button type="button" class="btn btn-light" data-dismiss="modal">Vazgeç</button>
                                                        <button type="submit" id="id" name="id" data-target="#deleteModals" class="btn btn-danger">Sil</button>
                                                      </div>
                                                    </form>
                                                    
                                                  </div>
                                                </div>
                                              </div>
                                        </div>
                                    
                                    </div>
                               
                                    
                                @endforeach
                            </div>
                            @auth
                            <div class="anime__details__form">
                                <div class="section-title">
                                    <h5>senin yorumun</h5>
                                </div>
                                <form method="POST" action="{{route('comments')}}" class="form-horizontal">
                                    @csrf
                                    <textarea class="form-control" maxlength="256"  rows="2" name="comment"></textarea>
                                    <input type="hidden" name="post_id" value="{{$icerik->id}}">
                                    <button type="submit"><i class="fa fa-location-arrow"></i> yorum yap</button>
                                </form>
                            </div>
                            @endauth
                        </div>
                        
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-8">
                    
                    <div class="product__sidebar" >
                    @include('design2.forYou')

                    @auth
                        
                    
                    <div class="card" >
                        <div class="card-body">
                        
                            <h5 class="titleFont">Takip edebilirsin</h5>

                            <hr class="hruzunluk">
                            @foreach($randomUsers as $randomusers)
                            @php
                                $check= Follow::where('user_id',Auth::user()->id)->where('follower_id',$randomusers->id)->first();
                            @endphp
                            
                            
                            @if(!$check)
                                <ul class="list-group list-group-flush" style="background-color: #fff;  ">
                                    
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="width:100%; background-color: #fff;">
                                        <a href="{{route('getProfile', ['username'=> $randomusers->username])}}"><img src="<?=url('/')?>/images/avatars/{{$randomusers->photo}}" class="rounded-circle" width="40" height="40"><h6 class="card-text" style="padding-left:0.4rem; color: #000;"> 
                                        <strong><span>{{$randomusers->name}}</span></strong>
                                        <br>
                                        <small class="text-muted" > {{"@".$randomusers->username}}</small>
                                        
                                        </a></h6>
                                        <a href="{{route('follow',['id'=>$randomusers->id])}}" style="margin-left: auto;"><i class="fas fa-user-plus" style="margin-left: auto;" ></i></a>
                                        
                                </li>
                                

                                </ul>
                            @endif
                            
                            @endforeach
            
                        </div>
                    </div>
                    @endauth
                </div>
            
            </div>
        
    </div>
    
</div>

</div>

</section>


                            <div class="modal fade" id="feedbackModal" tabindex="-1"  aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title" id="exampleModalLabel" >Bize bildirin</h5>
                                        <button type="button" class="close" data-dismiss="modal" id="closeModal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form method="POST" action="{{ route('feedbackPost') }}" id="feedback" >
                                        @csrf
                                    <div class="modal-body">

                                        
                                        <input type="hidden" id="icerik_id" name="icerik_id" value="{{$icerik->id}}">
                                        @auth
                                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                            
                                        @endauth

                                                        
                                        <div class="form-group">
                                        <div class="col-lg-12">
                                            
                                            <textarea class="form-control" name="feedback_title" id="feedback_title" rows="1" type="text" style="padding-top:1rem; border-color:#ced4da; "  ></textarea>
                                            <span class="placeholder">Başlık giriniz</span>
                                        </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                
                                                <textarea class="form-control" name="feedback_content" id="feedback_content" rows="3" type="text" style="padding-top:1rem; border-color:#ced4da; "  ></textarea>
                                                <span class="placeholder">Konuyu giriniz</span>
                                            </div>
                                            </div>
                                    


                                    </div>     
                                    <div class="modal-footer border-0">
                                        <button type="button" data-dismiss="modal" id="tests" class="site-btn modalSaveButtons2 ">Gönder</button>
                                        <button type="button" class="site-btn modalCancelButtons" id="closeModal"  data-dismiss="modal">Vazgeç</button>
                                    </div>       
                                </div>
                            </div>
                        </div>
                    </form>
                       
<!-- Product Section End -->
<script src=" {{ asset ('js/jquery-3.3.1.min.js')}}"></script>

<script>

$('.modalSaveButtons2').click(function(event) {
       event.preventDefault(); 

       
       var feedback_title = $('#feedback_title').val();
       var feedback_content = $('#feedback_content').val();
       var icerik_id = $('#icerik_id').val();
       var user_id = $('#user_id').val();

        

       $.ajax({
           type: "POST",
           url: "{{ route('feedbackPost') }}",
           data: {feedback_title:feedback_title, feedback_content:feedback_content, icerik_id:icerik_id,user_id:user_id, _token:'{{ csrf_token() }}'},
           success: function() {
            
                Swal.fire(
                'Başarılı',
                'Geri bildirimin için teşekkür ederiz.',
                'success'
                )
           },

           error: function(){
            Swal.fire(
                'Hata',
                'Lütfen tekrar deneyiniz.',
                'error'
                )
           }
       });
   });


</script>
<style>
 p{
 color: #000;   
}
a, a:hover, a:focus, a:active {
      text-decoration: none;
      color: inherit;
 }

.like{
    font-size: 2rem; float:right; color:rgb(164, 164, 164); 
    transition: all 0.25s ease-in-out 0s;
}
.like:hover{
    color:red !important;
    animation: like 1.25s ease-in-out infinite;
    
}

@keyframes like {
 0% {
  transform:scale(1)
 }
 15% {
  transform:scale(1.2)
 }
 30% {
  transform:scale(1)
 }
 45% {
  transform:scale(1.2)
 }
 60% {
  transform:scale(1)
 }
 100% {
  transform:scale(1)
 }
}

.unlike{
    font-size: 2rem; float:right; color:red;
    transition: all 0.25s ease-in-out 0s;
}

.unlike:hover{
     color:rgb(164, 164, 164) !important;
     animation: unlike 1.25s ease-in-out infinite;
}

@keyframes unlike {
 0% {
  transform:scale(1)
 }
 15% {
  transform:scale(1.2)
 }
 30% {
  transform:scale(1)
 }
 45% {
  transform:scale(1.2)
 }
 60% {
  transform:scale(1)
 }
 100% {
  transform:scale(1)
 }
}

.likeCount{
    margin-left: 0.8rem;color: black; 
}



.unlikeCount{
    margin-left: 0.8rem;color: red; 
}



.fa-exclamation{
    font-size: 2rem;  float:right; color:rgb(90, 59, 9);
}

.fa-exclamation:hover{
    color:rgb(243, 183, 43) !important;
    transition: 0.4s;
}

textarea{
  resize:none;
}

textarea:focus ~ .placeholder{
  color: #007bff;
}

.modalSaveButtons2{
      background-color:rgb(48, 191, 125);
      color:#fff;
    }

.modalCancelButtons{
background-color:#6c757d;
color: #fff;
}


.placeholder {
  position: absolute;
  font-size:12px;
  pointer-events: none;
  left: 28px;
  top: 3px;
  transition: 0.1s ease all;
}


h5 a:hover {
  color: #b7892e;
  transition-duration: 0.2s;
}
    a:link span{
        text-decoration: none;
        }

        a:visited  span{
        text-decoration: none;
        }

        a:hover span{
        text-decoration: underline;
        }

        a:active span{
        text-decoration: underline;
        }

</style>

@endsection