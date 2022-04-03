@extends('layouts.app')

@section('content')
    

@php
use App\Models\Follow;   
@endphp


@section('title', $query. ' / '.  'Arama sonuçları')


        
        <div id="preloder">
            <div class="loader"></div>
        </div>
    
        
    
        
        
    
  
    
        <!-- Product Section Begin -->

        <section class="product spad">
            
            <div class="container">
                
                <div class="row ">
                    <div class="col-lg-7">
                 
                        <h5 class="titleFont" style="margin-bottom: 1rem;"><span><a href="{{route('searchUsers')}}"> Kullanıcılar </a></span> <span class="secondSpan"><a href=""> İçerikler</a></span> </h5>
                        

                        @if(isset($details ))


                        @foreach ($details as $results)
                                          
                        <div class="card mb-2" >
                            <div class="row no-gutters">
                                <div class="col-md-4 kapakImg" >
                                    <img src="<?=url('/')?>/images/posts/postsFirst/{{$results->index_photo}}" alt="" width="300" height="200"  >
                                </div>
                                <div class="col-md-8 ">
                                    <div class="card-body">
                                        <div class="product__item__text2">
                                            @php
                                            $linkfirst = str_replace(
                                                ['ü', 'Ü','ö','Ö'],
                                                ['u', 'U','o','O', '.', ','],
                                                $results->title
                                            );
                                            $seperator = "-";
                                            $link = Str::slug($linkfirst, $seperator);
                                            @endphp
    
    
    
                                            <h5><a href="{{route('getIcerik',['username'=> $results->user->username, 'id'=>$results->user->id, 'link'=>$link])}}">{{ $results->title}}</a></h5>
                                            
                                        </div>
                                        <p class="card-text shortContentFont">{{$results->short_content}}</p>
                                        <a href="{{route('getProfile', ['username'=> $results->user->username])}}"><img src="<?=url('/')?>/images/avatars/{{$results->user->photo}}" alt="" class="rounded-circle" width="20" height="20"><small class="text-muted"> {{$results->user->username}}</a><span style="float: right;">{{$results->created_at->format('d/m/Y H:i')}}</span></small>
                                    </div>
    
                            
                                </div>
                            </div>
                        </div>
                        @endforeach
                        

                        @elseif(isset($message))
                            <h4 style="text-align: center; margin-top:5rem;"    >{{$message}}</h4>
                        @endif

                        
                    </div>
    

                    <div class="col-lg-4 col-md-6 col-sm-8">
                        
                        <div class="product__sidebar" >
         
                                    <div class="card" style="margin-bottom: 2rem;">
                                        <div class="card-body">
                                           
                                                <h5 class="titleFont">Haftanın enleri</h5>
                                                <hr class="hruzunluk">
                                            
                
                                                <ul class="list-group list-group-flush" style="background-color: #f7f6f4;  ">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="width:100%; background-color: #F7F9FA;">
                                                        <strong style="font-size: 2rem;">1 &nbsp;</strong>
                                                        <img src="images/foryou/atiye.jpeg" class="rounded-circle" width="30" height="30"><h6 class="card-text" style="padding-left:0.4rem; color: #000;" > 
                                                        
                                                        <strong>Atiye</strong>
                                                        <br>
                                                        <small class="text-muted" >Salla</small>
                                                        
                                                        </a></h6>
                                                        
                                                        <h6 style="margin-left: auto;"></h6>
                                                        
                                                    </li>
                                                </ul>
                                                <ul class="list-group list-group-flush" style="background-color: #f7f6f4;  ">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="width:100%; background-color: #F7F9FA;">
                                                        <strong style="font-size: 2rem;">2 &nbsp;</strong>
                                                        <img src="images/foryou/gripin.jpeg" class="rounded-circle" width="30" height="30"><h6 class="card-text" style="padding-left:0.4rem; color: #000;" > 
                                                        
                                                        <strong>Gripin</strong>
                                                        <br>
                                                        <small class="text-muted" >Beş</small>
                                                        
                                                        </a></h6>
                                                        
                                                        <h6 style="margin-left: auto;"></h6>
                                                        
                                                    </li>
                                                </ul>
                                                <ul class="list-group list-group-flush" style="background-color: #f7f6f4;  ">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="width:100%; background-color: #F7F9FA;">
                                                        <strong style="font-size: 2rem;">3 &nbsp;</strong>
                                                        <img src="images/foryou/dua.jpeg" class="rounded-circle" width="30" height="30"><h6 class="card-text" style="padding-left:0.4rem; color: #000;" > 
                                                        
                                                        <strong>Dua Lipa</strong>
                                                        <br>
                                                        <small class="text-muted" >New Rules</small>
                                                        
                                                        </a></h6>
                                                        
                                                        <h6 style="margin-left: auto;"></h6>
                                                        
                                                    </li>
                                                </ul>
                                                <ul class="list-group list-group-flush" style="background-color: #f7f6f4;  ">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="width:100%; background-color: #F7F9FA;">
                                                        <strong style="font-size: 2rem;">4 &nbsp;</strong>
                                                        <img src="images/foryou/eminem.jpeg" class="rounded-circle" width="30" height="30"><h6 class="card-text" style="padding-left:0.4rem; color: #000;" > 
                                                        
                                                        <strong>Eminem</strong>
                                                        <br>
                                                        <small class="text-muted" >Rap God</small>
                                                        
                                                        </a></h6>
                                                        
                                                        <h6 style="margin-left: auto;"></h6>
                                                        
                                                    </li>
                                                </ul>
                                                <ul class="list-group list-group-flush" style="background-color: #f7f6f4;  ">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="width:100%; background-color: #F7F9FA;">
                                                        <strong style="font-size: 2rem;">5 &nbsp;</strong>
                                                        <img src="images/foryou/gokhan.jpeg" class="rounded-circle" width="30" height="30"><h6 class="card-text" style="padding-left:0.4rem; color: #000;" > 
                                                        
                                                        <strong>Gökhan Türkmen</strong>
                                                        <br>
                                                        <small class="text-muted" >Lafı Güzaf</small>
                                                        
                                                        </a></h6>
                                                        
                                                        <h6 style="margin-left: auto;"></h6>
                                                        
                                                    </li>
                                                </ul>
                                                <ul class="list-group list-group-flush" style="background-color: #f7f6f4;  ">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="width:100%; background-color: #F7F9FA;">
                                                        <strong style="font-size: 2rem;">6 &nbsp;</strong>
                                                        <img src="images/foryou/hayko.jpeg" class="rounded-circle" width="30" height="30"><h6 class="card-text" style="padding-left:0.4rem; color: #000;" > 
                                                        
                                                        <strong>Hayko Cepkin</strong>
                                                        <br>
                                                        <small class="text-muted" >Sandığım Hazır</small>
                                                        
                                                        </a></h6>
                                                        
                                                        <h6 style="margin-left: auto;"></h6>
                                                        
                                                    </li>
                                                </ul>
                                                <ul class="list-group list-group-flush" style="background-color: #f7f6f4;  ">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="width:100%; background-color: #F7F9FA;">
                                                        <strong style="font-size: 2rem;">7 &nbsp;</strong>
                                                        <img src="images/foryou/teoman.jpeg" class="rounded-circle" width="30" height="30"><h6 class="card-text" style="padding-left:0.4rem; color: #000;" > 
                                                        
                                                        <strong>Teoman</strong>
                                                        <br>
                                                        <small class="text-muted" >Gönülçelen</small>
                                                        
                                                        </a></h6>
                                                        
                                                        <h6 style="margin-left: auto;"></h6>
                                                        
                                                    </li>
                                                </ul>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
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
                                            <ul class="list-group list-group-flush" style="background-color: #f7f6f4;  ">
                                                
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="width:100%; background-color: #F7F9FA;">
                                                    <a href="{{route('getProfile', ['username'=> $randomusers->username])}}"><img src="<?=url('/')?>/images/avatars/{{$randomusers->photo}}" class="rounded-circle" width="30" height="30"><h6 class="card-text" style="padding-left:0.4rem; color: #000;"> 
                                                    <strong>{{$randomusers->name}}</strong>
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
    
                                <hr>
    
                                @endauth
    
                                
    
                                <div class="section-title">
                                    <h5>En çok okunanlar</h5>
                                </div>
                                
                                    @foreach($right_posts as $post)
                                    
                                        <div class="product__item col-md-9 col-sm-9">
                                            <div class="product__item__pic set-bg " >
                                                <img src="<?=url('/')?>/images/posts/postsFirst/{{$post->index_photo}}" alt=""  width="300" height="200" class="shadows">
                                                  
                                                <div class="comment"><i class="fa fa-eye"></i> 43561</div>
                                            </div>
                                            <div class="product__item__text">
    
    
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
                                                <a href="{{route('getProfile', ['username'=> $post->user->username])}}"><img src="<?=url('/')?>/images/avatars/{{$post->user->photo}}" alt="" class="rounded-circle" width="20" height="20"><small class="text-muted"> {{$post->user->username}}</a></small>
                                            </div>
                                        </div>
                                    
                                    @endforeach
    
    
                                    
                                   
                                
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
    <!-- Product Section End -->
    
    
    <style>

        textarea{
          resize:none;
        }
        
        .iconPhoto{
          top: 4.2rem;
          left: 13.8rem;
          position: absolute;
          color: #fff;
          font-size: 1.5rem;
        }
        
        .imgSmt{
          border-radius: 50%; margin-bottom:25px; filter: brightness(50%);
        }
        .secondSpan{
            margin-left: 25.5rem;
        }
        
        .placeholder {
          position: absolute;
          font-size:12px;
          pointer-events: none;
          left: 28px;
          top: 3px;
          transition: 0.1s ease all;
        }
        .titleFont{
                font-size: 1.4rem; 
                color:#000;    
                text-shadow: 1px 0 #000;
                letter-spacing:1px;
                font-weight:bold;
            }
            .card{
        border-radius: 1.3rem;
        background-color: #F7F9FA;
    }

    a, a:hover, a:focus, a:active {
      text-decoration: none;
      color: inherit;
 }
        
        textarea:focus ~ .placeholder{
          color: #007bff;
        }
        
        .btn-primary:hover{
          background-color: #212529;
          border-color:#212529;
        }
        
        .btn-primary.focus, .btn-primary:focus{
          background-color: #143a50;
          border-color:#143a50;
        }
        
                  
        
        .kapakImg{
                margin-bottom: auto;
                margin-top: auto;
                display: block
                ;
            }
        
            .profileEditButton{
              border: 1px solid; 
              border-color: #212529;  
              background-color: #212529; 
              color: #fff; 
              margin:1rem  0; 
              border-radius: 120px;
            }
        
            .smallFont{
        
              font-size: 95%
            }
        
            .modalSaveButtons{
              background-color:#007bff;
              color:#fff;
            }
        
        
            .modalCancelButtons{
              background-color:#6c757d;
              color: #fff;
            }
                  .smallFont{
        
        font-size: 95%
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
                  
                  .content-button {
                      position: fixed;
                      width: 65px;
                      height: 65px;
                      right: 60px;
                      bottom: 135px;
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
                  </style>
    
    

      


   

@endsection