@extends('layouts.app')

@section('content')

@php
 use App\Models\Follow;   

@endphp

@section('title',$user->name . ' ' . '(@'.$user->username.')')
    
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
                        <img src="<?=url('/')?>/images/avatars/{{$user->photo}}" alt=""  class="rounded-circle image-previewer" width="150" height="150">
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
                                
                                  <a href="{{route('unfollow',['id'=>$user->id])}}" id="unfollow" type="submit" class="site-btn unfollowButton"  >takibi bırak</a>
                                
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
                                            
                    @endphp 
                    
                    
                    <ul class="list-group list-group-flush" >
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" id="secondSpan">
                        <a href="{{route('getProfile',['username'=>$user->username])}}"><h6 style="color: black; margin:auto; "><span ><strong> {{$user->posts->count()}} </strong><small class="text-muted smallFont " >içerik</small></span></h6></a>
                      

                        
                        <a href="{{route('followings',['username'=>$user->username])}}"><h6 style="color: #000" ><span id="secondSpan"><strong>{{$user->follows->count()}} </strong><small class="text-muted smallFont" >takip edilen</small></span></h6></a>

                        <a href="{{route('followers',['username'=>$user->username])}}"><h6 style="color: black;"><span class="text-secondary"> <strong>{{ $followerw->count() }} </strong><small class="text-muted smallFont" >takipçi</small></span></h6></a>
                      </li>
                    </ul>
                   
                    
                    
                  </div>
                  <div class="card mt-3">
                  <ul class="list-group list-group-flush">
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
                <button  type="submit" class="btn btn-primary btn-lg btn-block profileEditButton" data-toggle="modal" data-target="#modalForm" >Profili düzenle</button>
              @endif
              @endauth
  
                </div>
                
                <div class="col-md-8">

                  
                    <h6 class="titleFont" style="margin-bottom: 1rem;">İçerikler</h6>
                
                  
                  @foreach($user->posts->reverse() as $post)
                  <div class="card mb-3 card-color shadows" >
                    <div class="row no-gutters">
                      <div class="col-md-4 kapakImg mask">
                        <img src="<?=url('/')?>/images/posts/postsFirst/{{$post->index_photo}}" class="scale-with-grid wp-post-image">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body" style="padding: 0.25rem;">
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

                            <h5 ><a href="{{route('getIcerik',['username'=> $post->user->username, 'id'=>$post->id, 'link'=>$link])}}">{{ $post->title}}</a></h5>   

                        </div>
                          <p class="card-text shortContentFont">{{$post->short_content}}</p>

                          <small class="text-muted"><span style=" margin-right:0.5rem;" class="comment"><i class="fa fa-heart"></i> {{$post->likes->count()}} </span>
                            <span  class="comment"><i class="fa fa-comments"></i> {{$post->comments->count()}} </span></small>
                            <p class="card-text" style="float: right;"><small class="text-muted">
                            
                              <i class="far fa-clock" style="margin-right: 0.3rem;"></i>{{$post->created_at->diffForHumans()}}</small></p>
                          
                          <br>
                          <br>

                          
                          <a href="{{route('getProfile', ['username'=> $post->user->username])}}"><img src="<?=url('/')?>/images/avatars/{{$post->user->photo}}" alt="" class="rounded-circle" width="20" height="20"><small class="text-muted"> <span>{{$post->user->username}}</span></a>@if(Auth::check() && (Auth::user()->id == $user->id))<span class="icon_trash" style="color: red; float:right;" type="button" data-toggle="modal" data-target="#default{{ $post->id }}"></span>@endif</small>
                            
                            
                          

                            
                          
                          <div class="modal fade" id="default{{ $post->id }}" style="margin-top: 10%;" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header border-0">
                                  <h5 class="modal-title" id="deleteModal">İçeriği silmek istiyor musunuz?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                
                                <form method="POST" action="{{ route('icerikDelete',$post->id) }}">
                                  @csrf
                                  <div class="modal-body">
                                    Bu işlemi gerçekleştirirseniz geri almanız mümkün olmayacaktır ve herkes tarafından görünen içeriğiniz anasayfada ve profilinizde bir daha görünmemek üzere silinecektir.
                                  </div>
                                  <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Vazgeç</button>
                                    <button type="submit"  class="btn btn-danger">Sil</button>
                                  </div>
                                </form>
                                
                              </div>
                            </div>
                          </div>
                         
                      
                        
                        </div>
                         

                        
                      </div>
                    </div>
                  </div>
                  
                  @endforeach

                  

                
                </div>


                
                
              </div>
              
            </div>
            
        </div>

        @auth
        <div class="modal fade" id="modalForm" tabindex="-1"  aria-hidden="true" >
          <div class="modal-dialog" >
              <div class="modal-content" style="background-color: #f3f6f6; ">
                  <div class="modal-header border-0">
                      <h5 class="modal-title" id="exampleModalLabel" >Profili düzenle</h5>
                      <button type="button" class="close" data-dismiss="modal" id="closeModal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form method="POST" action="{{ route('profileSettingsPost') }}" enctype="multipart/form-data" id="editModal">
                    @csrf

                  
                  <div class="modal-body">


                    <div class="col-md-12 text-center ">

                      
                      
                      <label for="file">
                        <img src="<?=url('/')?>/images/avatars/{{Auth::user()->photo}}"   width="150px;" height="150px;" style="cursor: pointer;" class="imgSmt image-previewer">
                      <i class="fas fa-camera iconPhoto" style="cursor: pointer;"></i>
                      <div class="input-file-upload">
                        <input type='file' name="photo" id="file" onchange="readURL(this);" style="display: none;" />
                      </div>
                    </label>
                    </div>
                                     

                    

                    <div class="form-group">
                      <div class="col-lg-12">
                        
                        <textarea class="form-control" name="name" id="name" rows="1" type="text" style="padding-top:1rem; border-color:#ced4da; " placeholder="İsim" >{{Auth::user()->name}}</textarea>
                        <span class="placeholder">İsim</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-12">
                        <input class="form-control" disabled name="username"  id="username" style="border-color:#ced4da" type="text" value="{{Auth::user()->username}}" placeholder="Kullanıcı adı">
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-12">
                          <textarea class="form-control" maxlength="256" id="info"  rows="3" style="padding-top:1rem; border-color:#ced4da" name="info" placeholder="Kişisel bilgiler">{{Auth::user()->info}}</textarea>
                          <span class="placeholder">Hakkımda</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-12">
                        <textarea class="form-control" name="twitter_name" maxlength="20" id="twitter_name" type="text" style="padding-top:1rem;border-color:#ced4da" placeholder="Twitter adresi">{{Auth::user()->twitter_name}}</textarea>
                        <span class="placeholder">Twitter adresi</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-12">
                        <textarea class="form-control" name="instagram_name" maxlength="20" id="instagram_name" type="text" style="padding-top:1rem;border-color:#ced4da"  placeholder="Instagram adresi">{{Auth::user()->instagram_name}}</textarea>
                        <span class="placeholder">Instagram adresi</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-12">
                        <textarea class="form-control" name="spotify_name" maxlength="20" id="spotify_name" type="text" style="padding-top:1rem;border-color:#ced4da"  placeholder="Spotify adresi">{{Auth::user()->spotify_name}}</textarea>
                        <span class="placeholder">Spotify adresi</span>
                      </div>
                    </div>


                  </div>     
                  <div class="modal-footer border-0">
                    <button type="submit" class="site-btn modalSaveButtons3 "  >Kaydet</button>
                    <button type="button" class="site-btn modalCancelButtons" id="closeModal"  data-dismiss="modal">Vazgeç</button>
                  </div>       
              </div>
          </div>
      </div>
    </form>
      @endauth


      <script src=" {{ asset ('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/ijaboCropTool.min.js')}}"></script>

<script>



$('#file').ijaboCropTool({
          preview : '.image-previewer',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['Kaydet','Vazgeç'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("profileSettingsPost") }}',
          withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
            Swal.fire(
              'Başarılı',
              'Profil resmin başarıyla değişti',
              'success'
            )
          },
          onError:function(message, element, status){
            Swal.fire("Hata", "Ayarlar kaydedilemedi", "error")
          }
       });

document.getElementById("closeModal").addEventListener("click", function(){ 
   document.getElementById("editModal").reset();
});






  


</script>



        <style>
          
textarea{
  resize:none;
}



.titleFont{
        font-size: 1.4rem; 
        color:#000;    
        text-shadow: 1px 0 #000;
        letter-spacing:1px;
        font-weight:bold;
    }

.iconPhoto{
  top: 4.2rem;
  left: 13.8rem;
  position: absolute;
  color: #fff;
  font-size: 1.5rem;
}
.imgSmt:hover {
  border: 3px solid rgb(60, 175, 214);
}

h5 a:hover {
  color: #cd493d;
  transition-duration: 0.2s;
}


.imgSmt{
  border-radius: 50%; margin-bottom:25px; filter: brightness(50%);
  background-color:#fff;

}

.shortContentFont{
  font-family: "Helvetica Neue", Roboto, "Segoe UI", Calibri, sans-serif;
}

.placeholder {
  position: absolute;
  font-size:12px;
  pointer-events: none;
  left: 28px;
  top: 3px;
  transition: 0.1s ease all;
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

.unfollowButton:hover{
  transition-duration: 0.4s;
  background-color:rgb(229, 95, 82);
  border-color:rgb(149, 151, 159);
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
      background-color: #fff; 
      color: #212529; 
      margin:1rem  0; 
      border-radius: 120px;
    }

    .btn-primary.focus, .btn-primary:focus{
      border: 1px solid; 
      border-color: #212529;  
      background-color: #fff; 
      color: #212529; 
      margin:1rem  0; 
      border-radius: 120px;
    }

    .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle{
      border: 1px solid; 
      border-color: #212529;  
      background-color: #212529; 
      color: #fff; 
      margin:1rem  0; 
      border-radius: 120px;
    }
    .btn-primary.focus, .btn-primary:focus{
      box-shadow: 0 0 0 0.2rem rgb(255 255 255 / 50%);
    }
    .btn-primary:not(:disabled):not(.disabled).active:focus, .btn-primary:not(:disabled):not(.disabled):active:focus, .show>.btn-primary.dropdown-toggle:focus{
      box-shadow: 0 0 0 0.2rem rgb(255 255 255 / 50%);

    }

    .smallFont{

      font-size: 95%
    }

    .modalSaveButtons3{
      background-color:rgb(48, 191, 125);
      color:#fff;
    }


    .modalCancelButtons{
      background-color:#6c757d;
      color: #fff;
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
          .shadows{
        box-shadow: 3px 3px 15px #aaaaaa;
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
          .card-color{
        background-color: #F7F9FA;
    }
          </style>





@endsection