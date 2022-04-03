@extends('layouts.app')

@section('content')

@php
 use App\Models\Follow;   

@endphp

@section('title','Margravials / Keşfet')

    
    <div id="preloder">
        <div class="loader"></div>
    </div>
    

    <div class="container">
        <div class="main-body" style="margin-top: 2.4rem; ">

            <div class="section-title">
                <h4>en yeni içerikler</h4>
            </div>
              <div class="row gutters-sm" >
                <div class="col-md-8 ">
                  
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

                   
                    
                        <ul class="pagination justify-content-center" style="margin-bottom:8rem;">
                            {{$posts->onEachSide(1)->links()}}
                        </ul>
                      

                </div>


                <div class="col-lg-4 col-md-4 col-sm-8" style="position: relative; bottom:0;" >
                    @auth
                    <div class="product__sidebar" >
                    @endauth

    
                            
                    @include('design2.forYou')
                            </div>
                            @auth
                            <div class="card card-radius" >
                                <div class="card-body">
                                    
                                        <h5 class="titleFont">Takip edebilirsin</h5>
    
                                        <hr class="hruzunluk">
                                    
    
                                    
    
                                
                                
                                    @foreach($randomUsers as $randomusers)
                                    @php
                                        $check= Follow::where('user_id',Auth::user()->id)->where('follower_id',$randomusers->id)->first();
                                    @endphp
                                    
                                    
                                    @if(!$check)
                                        <ul class="list-group list-group-flush " >
                                            
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
    </div>


    

<style>

.page-link{
    color:#000;
}
.page-item.active .page-link{
    background-color: #212d30;
    border-color:#212d30;
}
.page-link:hover{
    color: #000;
}

.page-link:focus{
    box-shadow: none;
}
    .kapakImg{
        margin-bottom: auto;
        margin-top: auto;
        display: block
        ;
    }
    .card{
        background-color: #fff;
    }
    .card-radius{
        border-radius: 0.6rem;
        
    }

    .shadows{
        box-shadow: 3px 3px 15px #aaaaaa;
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

    .shortContentFont{
  font-family: "Helvetica Neue", Roboto, "Segoe UI", Calibri, sans-serif;
}

    .list-group-item{
        padding:.75rem 0.25rem;
    }
    .hruzunluk{
        margin:1rem -1.3rem 0;
    }

    .text-muted{
  font-family: "Helvetica Neue", Roboto, "Segoe UI", Calibri, sans-serif;
}

h5 a:hover {
  color: #cd493d;
  transition-duration: 0.2s;
}
    .titleFont{
        font-size: 1.4rem; 
        color:#000;    
        text-shadow: 1px 0 #000;
        letter-spacing:1px;
        font-weight:bold;
    }
    a, a:hover, a:focus, a:active {
      text-decoration: none;
      color: inherit;
 }

 

</style>


@endsection