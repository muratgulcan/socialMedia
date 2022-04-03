@extends('layouts.app')

@section('content')

@php
 use App\Models\Follow;   

@endphp

@section('title',$user->name . ' ' . '(@'.$user->username.') adlı kişinin takip ettikleri')


    
    <div id="preloder">
        <div class="loader"></div>
    </div>
    

    <div class="container">
        <div class="main-body" style="margin-top: 2.4rem;">

        
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="<?=url('/')?>/images/avatars/{{$user->photo}}" alt="" class="rounded-circle" width="150" height="150">
                        <div class="mt-3">
                          <h4><strong>{{$user->name}}</strong></h4>
                          <p class="text-muted font-size-sm">{{"@".$user->username}}</p>
                          <p class="text-secondary mb-1">{!!nl2br(e($user->info))!!}</p>

                          @auth
                          @if($user->id != Auth::user()->id)
                            
                              
                                
                              @php
                              
                               $followCheck = Follow::where('user_id', Auth::user()->id)->where('follower_id', $user->id)->first();
                               
                              
                              @endphp
                                @if(empty($followCheck))
                                <a href="{{route('follow',['id'=>$user->id])}}" id="follow" type="submit" class="site-btn followButton"   >takip et</a>
                                @else
                                
                                  <a href="{{route('unfollow',['id'=>$user->id])}}" id="unfollow" type="submit" class="site-btn unfollowButton"   >takibi bırak</a>
                                
                                @endif
                           
                            @endif

                            @endauth
                          
                          
                          

                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="card mt-3">
                    
                    
                    
                        
                    
                    @php
                          
                    $followerw = Follow::where('follower_id', $user->id)->get();
                    $followern = Follow::where('follower_id', $user->name)->get();
                                            
                    @endphp 
                        
                    
                    
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <a href="{{route('getProfile',['username'=>$user->username])}}"><h6 style="color: black; margin:auto; "><span><strong> {{$user->posts->count()}} </strong><small class="text-muted smallFont" >içerik</small></span></h6></a>
                          
    
                            
                            <a href="{{route('followings',['username'=>$user->username])}}"><h6 style="color: #000" ><span><strong>{{$user->follows->count()}} </strong><small class="text-muted smallFont" >takip edilen</small></span></h6></a>
    
                            <a href="{{route('followers',['username'=>$user->username])}}"><h6 style="color: black;"><span > <strong>{{ $followerw->count() }} </strong><small class="text-muted smallFont" >takipçi</small></span></h6></a>
                          </li>
                        </ul>
                  </div>
                      
                   
                    
                        <div class="card mt-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                          <i class="fab fa-twitter" style="color:rgba(29,161,242,1.00)"></i><span class="text-secondary">{{$user->twitter_name}}</span>
                        </li>
                        
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <i class="fab fa-instagram"></i><span class="text-secondary">{{$user->instagram_name}}</span>
                      </li>
                      
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <i class="fab fa-spotify" style="color: #1ED760"></i><span class="text-secondary">{{$user->spotify_name}}</span>
                      </li>
                    </ul>
                  </div>

                  @auth
                  @if($user->id == Auth::user()->id)
                <a href=""  type="submit" class="btn btn-primary btn-lg btn-block profileEditButton" data-toggle="modal" data-target="#modalForm" >Profili düzenle</a>
              @endif
              <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h5 class="modal-title" id="exampleModalLabel" >Profili düzenle</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="{{ route('profileSettingsPost') }}" enctype="multipart/form-data">
                          @csrf
                        <div class="modal-body">


                          <div class="col-md-12 text-center">
                            <img src="<?=url('/')?>/images/avatars/{{Auth::user()->photo}}"  id="file_upload" width="150px;" height="150px;" alt="" class="imgSmt">
                            <label for="file">
                            <i class="fas fa-camera iconPhoto" ></i>
                            <div class="input-file-upload">
                              <input type='file' id="file" onchange="readURL(this);" style="display: none;" />
                            </div>
                          </label>
                          </div>
                                           
    
                       


                          <div class="form-group">
                            <div class="col-lg-12">
                              
                              <textarea class="form-control" name="name" rows="1" type="text" style="padding-top:1rem;" placeholder="İsim" >{{Auth::user()->name}}</textarea>
                              <span class="placeholder">İsim</span>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-12">
                              <input class="form-control" disabled name="username" type="text" value="{{Auth::user()->username}}" placeholder="Kullanıcı adı">
                              
                            </div>
                          </div>
      
                          <div class="form-group">
                            <div class="col-lg-12">
                                <textarea class="form-control" maxlength="256"  rows="3" style="padding-top:1rem;" name="info" placeholder="Kişisel bilgiler">{{Auth::user()->info}}</textarea>
                                <span class="placeholder">Hakkımda</span>
                            </div>
                          </div>
      
                          <div class="form-group">
                            <div class="col-md-12">
                              <textarea class="form-control" name="twitter_name" type="text" style="padding-top:1rem;" placeholder="Twitter adresi">{{Auth::user()->twitter_name}}</textarea>
                              <span class="placeholder">Twitter adresi</span>
                            </div>
                          </div>
      
                          <div class="form-group">
                            <div class="col-md-12">
                              <textarea class="form-control" name="instagram_name" type="text" style="padding-top:1rem;"  placeholder="Instagram adresi">{{Auth::user()->instagram_name}}</textarea>
                              <span class="placeholder">Instagram adresi</span>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-12">
                              <textarea class="form-control" name="spotify_name" type="text" style="padding-top:1rem;"  placeholder="Spotify adresi">{{Auth::user()->spotify_name}}</textarea>
                              <span class="placeholder">Spotify adresi</span>
                            </div>
                          </div>


                        </div>     
                        <div class="modal-footer border-0">
                          <button type="submit" class="site-btn modalSaveButtons">Kaydet</button>
                          <button type="button" class="site-btn modalCancelButtons" data-dismiss="modal">Vazgeç</button>
                        </div>       
                    </div>
                </div>
            </div>

            @endauth
  
                </div>

                
                
                <div class="col-md-7">
                  
                    <h5 class="titleFont" style="margin-bottom: 1rem;">Takip edilenler</h5>
                
                    
                 @foreach ($user->follows as $following)
                    
                 @auth
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" >
                        <a href="{{route('getProfile', ['username'=> $following->username])}}" style="color:inherit;"><img src="<?=url('/')?>/images/avatars/{{$following->photo}}" class="rounded-circle" width="45" height="45"><h6 style="padding-left:0.4rem; color: #000; "> 
                        {{$following->name}}
                        <br>
                        <small  class="text-muted" > {{"@".$following->username}} </small></a>
                        <br>
                        <small  class="text" > {{$following->info}}</small>
                      
                        </h6>

                    
                        
                       

                        @php
                            $check= Follow::where('user_id',Auth::user()->id)->where('follower_id',$following->id)->first();
                        @endphp

                        

                        @if($following->id == Auth::user()->id)  
                            <h6 style="margin-left: auto;">  </h6>
                        @else
                            @if($check)
                                <h6  style="margin-left: auto; " ><a href="{{route('unfollow',['id'=>$following->id])}}" id="unfollow" type="submit" class="site-btn unfollowButton2"   >takibi bırak</a>
                                </h6>
                    
                            @else
                                <h6  style="margin-left: auto;" ><a href="{{route('follow',['id'=>$following->id])}}" id="follow" type="submit" class="site-btn followButton2" >takip et </a>

                                </h6>

                            @endif
                        @endif

                        @endauth
                    </li>

                        @guest
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" >
                            <a href="{{route('getProfile', ['username'=> $following->username])}}" style="color:inherit;"><img src="<?=url('/')?>/images/avatars/{{$following->photo}}" class="rounded-circle" width="45" height="45"><h6 style="padding-left:0.4rem; color: #000; margin-right:auto;"> 
                            {{$following->name}}
                            <br>
                            <small  class="text-muted" > {{"@".$following->username}} </small></a>
                            <br>
                            <small  class="text" > {{$following->info}}</small>
                          
                            </h6>

                            <h6 style="margin-left: auto;">  </h6>
                        </li>
                        @endguest
                      
                
                    
                     
                 @endforeach

                
                </div>


                
                
              </div>
            </div>
        </div>


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
.titleFont{
        font-size: 1.4rem; 
        color:#000;    
        text-shadow: 1px 0 #000;
        letter-spacing:1px;
        font-weight:bold;
    }

.placeholder {
  position: absolute;
  font-size:12px;
  pointer-events: none;
  left: 28px;
  top: 3px;
  transition: 0.1s ease all;
}

.followButton2{
  border: 1px solid; border-color: #212529;   background-color: #fff; color: #212529; margin:0; border-radius: 120px; font-size:0.6rem;
}

.followButton2:hover{
  transition-duration: 0.4s;
  background-color:rgb(204, 204, 207);
  border-color:rgb(149, 151, 159);
  color: #000;
}
.unfollowButton{
  background-color: #212529; color: #fff; margin:1rem 2rem 0; border-radius: 120px
}

.followButton{
  border: 1px solid; border-color: #212529;   background-color: #fff; color: #212529; margin:1rem 2rem 0; border-radius: 120px
}
.followButton:hover{
  transition-duration: 0.4s;
  background-color:rgb(204, 204, 207);
  border-color:rgb(149, 151, 159);
  color: #000;
}


.unfollowButton:hover{
  transition-duration: 0.4s;
  background-color:rgb(229, 95, 82);
  border-color:rgb(149, 151, 159);
  color: #fff;
}
.unfollowButton2{
  background-color: #212529; color: #fff; margin:0; border-radius: 120px; font-size:0.6rem;"

}

.unfollowButton2:hover{
  transition-duration: 0.4s;
  background-color:rgb(229, 95, 82);
  border-color:rgb(149, 151, 159);
  color: #fff;
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

.text-muted{
  font-family: "Helvetica Neue", Roboto, "Segoe UI", Calibri, sans-serif;
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