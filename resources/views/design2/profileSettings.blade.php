@extends('layouts.app')

@section('content')
    



<head>

  @section('title','Ayarlar')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

</head>


    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>



    <div class="container" style="margin-top:3rem;margin-bottom:3rem;">
        
          
        <div class="row">
          <!-- left column -->
          
            

          <div class="col-md-6">
            <div class="card">
              
              <div class="card-body">
                <h5>Profil Ayarları</h5><br>

              <!-- edit form column -->
                <div class="col-md-12 personal-info">
                  
                  
                  
                  <form class="form-horizontal" method="POST" action="{{route('profileSettingsPost')}}">

                    @csrf


                    


                  

                    <div class="form-group">
                      <div class="col-lg-12">
                        <input class="form-control" name="name" type="text" value="{{Auth::user()->name}}" placeholder="İsim" >
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-12">
                        <input class="form-control" disabled name="username" type="text" value="{{Auth::user()->username}}" placeholder="Kullanıcı adı">
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-12">
                          <textarea class="form-control" maxlength="256"  rows="3" name="info" placeholder="Kişisel bilgiler">{{Auth::user()->info}}</textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-12">
                        <input class="form-control" name="twitter_name" type="text" value="{{Auth::user()->twitter_name}}" placeholder="Twitter adresi">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-12">
                        <input class="form-control" name="instagram_name" type="text" value="{{Auth::user()->instagram_name}}" placeholder="Instagram adresi">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <input class="form-control" name="youtube_name" type="text" value="{{Auth::user()->youtube_name}}" placeholder="Youtube adresi">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <input class="form-control" name="spotify_name" type="text" value="{{Auth::user()->spotify_name}}" placeholder="Spotify adresi">
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="col-md-3 control-label"></label>
                      <div class="col-md-12">
                        <input type="submit" class="site-btn" value="Kaydet">
                        <span></span>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              
              <div class="card-body">
                <h5>Profil Fotoğrafı</h5><br>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

              <!-- edit form column -->
                <div class="col-md-12 personal-info">
                  
                  
                  
                  <form class="form-horizontal" method="POST" action="{{route('profilePhotoPost')}}" enctype="multipart/form-data">

                    @csrf
                  

                      <div class="col-md-12 text-center">
                        <img src="<?=url('/')?>/images/avatars/{{Auth::user()->photo}}" height="150px;" alt="" style="border-radius: 50%; margin-bottom:25px;">
                        
                      </div>                    

                    <div class="form-group">
                      <div class="col-md-12">
                        <input class="form-control" type="file" name="photo">
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="col-md-3 control-label"></label>
                      <div class="col-md-12">
                        <input type="submit" class="site-btn" value="Kaydet">
                        <span></span>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    



    



@endsection