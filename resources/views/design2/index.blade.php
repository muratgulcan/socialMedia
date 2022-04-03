@extends('layouts.app')

@section('content')

@php
 use App\Models\Follow;   

@endphp


    
@section('title','Margravials / Bağımsız İçerik Platformu')

    
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

    <!-- Product Section Begin 
    <nav class="navbar navbar-dark " style="padding-bottom: 1rem; background-color:#000; color:#fff">
        sadfsfsaffsadfas
      </nav>-->
    <section class="product spad">

        
        
        <div class="container">

            
            
            
            <div class="row">

                
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="mainCard mb-3" >
                                
                                <h4 class="titleFont" style="margin-left: 2.5rem; margin-top:1.28rem;">Günün içeriği</h4>
                                <hr style="margin: 1.2rem 2.5rem 1.5rem 2.5rem;">
                                @foreach ($dailyPost as $dailyContent)
                                @php
                                $linkfirst = str_replace(
                                    ['ü', 'Ü','ö','Ö'],
                                    ['u', 'U','o','O', '.', ','],
                                    $dailyContent->title
                                );
                                $seperator = "-";
                                $link = Str::slug($linkfirst, $seperator);

                                

                                @endphp
                                
                                <img  style="margin:0 auto; display:block; margin-top:1rem;" src="<?=url('/')?>/images/posts/postsFirst/{{$dailyContent->first_photo}}" width="700" height="350" >
                                <div class="card-body">
                                    


                                    <h5 class="card-title2 mainFont "><a href="{{route('getIcerik',['username'=> $dailyContent->user->username, 'id'=>$dailyContent->id, 'link'=>$link])}}">{{ $dailyContent->title}}</a></h5>
                                  <p class="card-text2">{{$dailyContent->short_content}}</p>
                                  <a href="{{route('getProfile', ['username'=> $dailyContent->user->username])}}">
                                    <p style="margin-left:1.3rem;"><img src="<?=url('/')?>/images/avatars/{{$dailyContent->user->photo}}"  class="rounded-circle"  width="20" height="20">
                                        <small class="text-muted">
                                            <span> {{$dailyContent->user->username}}</span></a>

                                            <span style="float:right; " class="comment"><i class="fa fa-comments"></i> {{$dailyContent->comments->count()}} </span>
                                            <span style="float:right; margin-right:0.6rem;" class="comment"><i class="fa fa-heart"></i> {{$dailyContent->likes->count()}} </span>
                                            <br>
                                            <span style="float: right;"><i class="far fa-clock" style="margin-right: 0.3rem;"></i>{{$dailyContent->created_at->format('d F H:i')}}
                                            </span>
                                        </p>
                                    
                                </small>
                                  @endforeach
                                </div>
                              </div>

                              
                              <div class="section-title" style="margin-top: 2rem;">
                                <h4>Bu içerikleri sevebilirsiniz</h4>
                            </div>
       
                                <div class="card-group ">
                                @foreach($right_posts as $post)
                                    @php
                                    $linkfirst = str_replace(
                                        ['ü', 'Ü','ö','Ö'],
                                        ['u', 'U','o','O', '.', ','],
                                        $post->title
                                    );
                                    $seperator = "-";
                                    $link = Str::slug($linkfirst, $seperator);
                                    @endphp
                              
                                    
                                        <div class="card forYouCard mask" style="border-radius: 0.6rem;">
                                            <a href="{{route('getIcerik',['username'=> $post->user->username, 'id'=>$post->id, 'link'=>$link])}}"><img src="<?=url('/')?>/images/posts/postsFirst/{{$post->index_photo}}" class="scale-with-grid wp-post-image" ></a>

                                        <div class="card-body">
                                            <h5 class="titleFont2" style="margin-bottom: 1rem;"><a href="{{route('getIcerik',['username'=> $post->user->username, 'id'=>$post->id, 'link'=>$link])}}">{{ $post->title}}</a></h5>

                                            <p class="card-text shortText">{{$post->short_content}}</p>
                                            <a href="{{route('getProfile', ['username'=> $post->user->username])}}"> <img src="<?=url('/')?>/images/avatars/{{$post->user->photo}}" alt="" class="rounded-circle" width="20" height="20"><small class="text-muted"> <span>{{$post->user->username}}</span></a>
                                                <span style="float: right;" class="comment">
                                                    <i class="fa fa-heart" style="margin-right: 0.2rem;" ></i>{{$post->likes->count()}}
                                                    <i class="fa fa-comments" style="margin-right: 0.2rem;"></i> {{$post->comments->count()}} 
                                                </span>
                                                    <hr style="margin-right:-1.2rem; margin-left:-1.2rem;">
                                                    <span style="float: left; margin-top:0.5rem;"><i class="far fa-clock" style="margin-right: 0.3rem;"></i>{{$dailyContent->created_at->format('d F H:i')}}
                                            
                                        </span>
                                            </small>
                                        </div>
                                        </div>
                                        
                                    
                                    
                                    @endforeach
                                </div>

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

                <div class="row">
                    <div class="trending__product">
                <div class="col-lg-10"  style="float:left;">
                    
                    <div class="btn__all">
                      <h2 style="float: left;" class="titleFont">En yeni içerikler</h2>
                        <a href="{{route('kesfet')}}" class="primary-btn grow">Daha fazla gör</a>
                    </div>
                </div>
                <div class="col-md-10 " >
                  
                    @foreach($posts->reverse() as $post)
                    <div class="card mb-2 shadows" style="background-color: #F7F9FA;">
                        <div class="row no-gutters">
                            <div class="col-md-4 kapakImg mask" >
                                <img src="<?=url('/')?>/images/posts/postsFirst/{{$post->index_photo}}" class="scale-with-grid wp-post-image" >
                            </div>
                            <div class="col-md-8 ">
                                <div class="card-body">
                                    <div class="product__item__text2">
                                        @php
                                        $linkfirst = str_replace(
                                            ['ü', 'Ü','ö','Ö'],
                                            ['u', 'U','o','O', '.', ','],
                                            $post->title
                                        );
                                        $seperator = "-";
                                        $link = Str::slug($linkfirst, $seperator);
                                        @endphp



                                        <h5><a href="{{route('getIcerik',['username'=> $post->user->username, 'id'=>$post->id, 'link'=>$link])}}">{{ $post->title}}</a></h5>
                                        
                                    </div>
                                    <p class="card-text shortContentFont">{{$post->short_content}}</p>
                                    <small class="text-muted"><span style=" margin-right:0.5rem;" class="comment"><i class="fa fa-heart"></i> {{$post->likes->count()}} </span>
                                        <span  class="comment"><i class="fa fa-comments"></i> {{$post->comments->count()}} </span></small>
                                        <p class="card-text" style="float: right;"><small class="text-muted">
                                        
                                          <i class="far fa-clock" style="margin-right: 0.3rem;"></i>{{$post->created_at->diffForHumans()}}</small></p>
                                      
                                      <br>
                                      <br>
            
                                      
                                      <a href="{{route('getProfile', ['username'=> $post->user->username])}}"><img src="<?=url('/')?>/images/avatars/{{$post->user->photo}}" alt="" class="rounded-circle" width="20" height="20"><small class="text-muted"> <span>{{$post->user->username}}</span></a></small>
                                             </div>

                        
                            </div>
                        </div>
                    </div>
                    @endforeach 
                    </div>
                </div></div>
                
                
                </div>
                
            </div>
        </div>
    </div>
    <!-- Footer Section Begin -->
<footer class="footer">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="{{route('home')}}">
                        <img src="<?=url('/')?>/images/logo.jpeg" width="200" height="100" style="float:left;" ></a>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active" style="color:#fff;">margravials.com’da yayımlanan tüm içeriklerin yayın hakları saklıdır. Yazarın izni alınmaksızın hiçbir yazılı, basılı ve görsel yayın organında ve sanal ortamda kullanılamaz.

                            İçeriklerde yer alan fikir, görüş, düşünce ile görsel öğelerden yazarlar sorumludur. margravials.com yazarların ürettiği içeriklerden sorumlu tutulamaz.</li>
                </div>
            </div>
            <div class="col-lg-3">
                <p class="card-text shortContentFont">
                    <a href="//www.instagram.com/margravials"><span style="color: #fff;"><i class="fab fa-instagram"></i> Instagram</span></a>
                </p>
                <p class="card-text shortContentFont">
                    <a href="//www.twitter.com/margravials"><span style="color: #fff;"><i class="fab fa-twitter"></i> Twitter</span></a>
                </p>
                

              </div>
          </div>
      </div>
  </footer>
  <!-- Footer Section End -->
</div>
</div>
</section>
<!-- Product Section End -->


<style>

.shortText{
    overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
    }

    .forYouCard{
        margin-right: 0.7rem;
        
    }

    .shadows{
        box-shadow: 10px 10px 5px #aaaaaa;
    }

    .mainCard{
        border-radius: 0.6rem;
        background-color: #fff;
        box-shadow: 4px 4px 25px #aaaaaa;
    }



    .list-group-item{
        padding:.75rem 0.25rem;
    }
    .hruzunluk{
        margin:1rem -1.3rem 0;
    }
    .titleFont{
        font-size: 1.4rem; 
        color:#000;    
        text-shadow: 1px 0 #000;
        letter-spacing:1px;
        font-weight:bold;
    }

    .mainFont{
        font-size: 1.4rem; 
        color:#000;    
        text-shadow: 1px 0 #000;
        letter-spacing:1px;
        font-weight:bold;
    }
    .mainFont:hover{
        font-size: 1.4rem; 
        color:#cd493d;    
        text-shadow: 1px 0 #cd493d;
        letter-spacing:1px;
        font-weight:bold;
  transition-duration: 0.2s;

    }

    .titleFont2{
        font-size: 1rem; 
        color:#000;    
        text-shadow: 1px 0 #000;
        letter-spacing:0.8px;
        font-weight:bold;
    }
    .titleFont2:hover{
        font-size: 1rem; 
        color:#cd493d;    
        text-shadow: 1px 0 #cd493d;
        letter-spacing:0.8px;
  transition-duration: 0.2s;
        font-weight:bold;
    }
.card-title2{
    margin-bottom:0.75rem;
    margin-left:1.3rem;
    margin-right: 1.3rem;
    
}
.card-text2{
    margin-left:1.3rem;
    margin-right: 1.3rem;
}

.contents-items {
    position: fixed;
    width: 174px;
    height: 156px;
    padding-top: 7px;
    background-color: black;
    bottom: 99px;
    right: 90px;
    opacity: 0;
    color: #fff;
    border-radius: 5px;
    transition: all 0.5s
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

h5 a:hover {
  color: #cd493d;
  transition-duration: 0.2s;
}

.vl {
    border-left: 6px solid green;
  height: 500px;
}

.content-button {
    position: fixed;
    width: 65px;
    height: 65px;
    right: 60px;
    bottom: 105px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    background-color: rgb(14, 101, 151);
    font-size: 17px;
    color: #fff
}

.content-button:focus {
    box-shadow: none;
    outline: none
}

.content-button:before {
    font-family: FontAwesome;
    content: "\f044";
    font-size: 2rem;
    padding-left: 0.3rem;
    padding-top:0.2rem;
}

.show-button {
    opacity: 1
}

.items-list {
    list-style: none;
    padding-left: 9px
}



.items-list li {
    padding: 6px;
    padding-left: 15px;
    text-transform: uppercase;
    cursor: pointer
}

.items-list li:hover {
    color: red
}

.items-list li i {
    width: 19px
}


a, a:hover, a:focus, a:active {
      text-decoration: none;
      color: inherit;
 }
</style>


@endsection