<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<html lang="tr">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    

    <!-- Css Styles -->
    
    <link rel="stylesheet" href=" {{ asset ('css/ijaboCropTool.min.css')}}"> 
    <link rel="stylesheet" href=" {{ asset ('css/bootstrap.min.css')}}" type="text/css" >
    <link rel="stylesheet" href=" {{ asset ('css/font-awesome.min.css')}}" type="text/css" >
    <link rel="stylesheet" href=" {{ asset ('css/elegant-icons.css')}}" type="text/css" >
    <link rel="stylesheet" href=" {{ asset ('css/plyr.css')}}" type="text/css" >
    <link rel="stylesheet" href=" {{ asset ('css/nice-select.css')}}"  type="text/css">
    <link rel="stylesheet" href=" {{ asset ('css/owl.carousel.min.css')}}"  type="text/css">
    <link rel="stylesheet" href=" {{ asset ('css/slicknav.min.css')}}"  type="text/css">
    <link rel="stylesheet" href=" {{ asset ('css/style3.css')}}"  type="text/css">
    <link rel="stylesheet" href=" {{ asset ('css/trix.css')}}"  type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    
</head>

<body class="home template-slider aside_right with_aside layout-full-width mobile-tb-left if-overlay no-content-padding header-classic header-fw minimalist-header sticky-header sticky-white ab-hide subheader-both-center menuo-right menuo-no-borders footer-copy-center">
    
    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            @guest
            <li style="float:left; margin-top:0.1rem;">
                <a href="{{route('home')}}">
                    <img src="<?=url('/')?>/images/logo.jpeg" width="120" height="60" style="float:left;" ></a>
                </a>
            </li>
            @endguest
            @auth
            <li style="float:left; margin-top:0.7rem;">
                <a href="{{route('home')}}">
                    <img src="<?=url('/')?>/images/logo.jpeg" width="120" height="60" style="float:left;"></a>
                </a>
            </li>
            @endauth
            
            <div class="row">
                
                <div class="col-lg-12">
                    @auth
                    
                    @endauth
                    
                    <div class="header__nav">
                        
                        <nav class="header__menu mobile-menu">
                            
                            
                            <ul class="navbars" >
                                
                                <li class="grow"><a href="{{route('home')}}">Anasayfa</a></li>
                                @auth
                                @if (Auth::user()->share_content == 1)
                                    
                                <li class="grow"><a href="{{route('icerik_olustur')}}"><i class="fas fa-feather-alt" style="margin-right: 0.4rem;"></i>İçerik oluştur</a></li>@endif
                               
                                    <li class="grow"><a href="{{route('timeline')}}">Zaman Akışı</a></li>    
                                @endauth
                                @guest
                                    <li class="grow" style="font-size: 15px; color:#fff; font-weight:500; transition:all,0.5s; cursor: pointer;" data-toggle="modal" data-target="#feedbackIndexModal"> Bize bildirin </li> 
                                @endguest
                                <li class="grow"><a href="{{route('kesfet')}}">Keşfet</a></li>
                                <li>
                                    <form action="{{route('searchUsers')}}" method="POST" role="search">
                                        @csrf
                                        <div class="input-group rounded">
                                            <input type="search" autocomplete="off" id="searchs" style="border-radius: 100rem; color:#000; border-color:#000; box-shadow: none;" class="form-control" name="q" placeholder="Müzik'de ara" />
                                            
                                            <button type="submit"  id="buttons" class="input-group-text border-0" style="background-color:#202d31; color:#fff;">
                                            <i class="fas fa-search "></i>
                                            </button></a>
                                        </div>
                                    </form>
                                </li>
                                @auth
                                <li><a href="{{route('getProfile', ['username'=> Auth::user()->username])}}"><img src="<?=url('/')?>/images/avatars/{{Auth::user()->photo}}"  style="margin-right: 0.3rem;" class="rounded-circle" width="42" height="42">{{Auth::user()->username}}</a>
                                    <ul class="dropdown">
                                        <li style="text-align:left;font-size:16px;color:#111;font-weight:500; padding-left:20px; cursor:pointer;"  data-toggle="modal" data-target="#feedbackIndexModal"> Bize bildirin </li> 
                                        <li style="text-align:left;"><a href="{{route('customPassword')}}">Parolayı değiştir</a></li>
                                        <hr>
                                        <li style="text-align:left;"><a href="{{route('logout')}}"> <i class="fas fa-sign-out-alt"></i> Çıkış Yap</a></li>

                                    </ul>
                                </li>
                                

                                @endauth
                                @guest
                                <li class="grow" style="left:10rem;"><a href="{{route('login')}}"><span onmouseout="this.style.textDecoration='none';" onmouseover="this.style.textDecoration='none';" class="icon_profile arrow_carrot-down"></span></a>
                                @endguest
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    
    
    <div id="Wrapper">
        
        
        <div id="Content">

            
                @yield('content')
            
            
        </div>

         
    </div>




    <div class="modal fade" id="feedbackIndexModal" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel" >Bize bildirin</h5>
                    <button type="button" class="close" data-dismiss="modal" id="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('feedbackPost') }}" >
                    @csrf
                <div class="modal-body">

                    
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
                    <button type="button" data-dismiss="modal" class="site-btn modalSaveButtons">Gönder</button>
                    <button type="button" class="site-btn modalCancelButtons" id="closeModal"  data-dismiss="modal">Vazgeç</button>
                </div>       
            </div>
        </div>
    </div>
</form>


    <style>
        .grow { transition: all .2s ease-in-out;  }
        .grow:hover { transform: scale(1.2);  }
        


       
    </style>



    <!-- JS -->
    <script src=" {{ asset ('js/jquery-3.3.1.min.js')}}"></script>
    <script src=" {{ asset ('js/bootstrap.min.js')}}"></script>
    <script src=" {{ asset ('js/player.js')}}"></script>
    <script src=" {{ asset ('js/jquery.nice-select.min.js')}}"></script>
    <script src=" {{ asset ('js/mixitup.min.js')}}"></script>
    <script src=" {{ asset ('js/jquery.slicknav.js')}}"></script>
    <script src=" {{ asset ('js/owl.carousel.min.js')}}"></script>
    <script src=" {{ asset ('js/main3.js')}}"></script>
    <script src=" {{ asset ('js/trix.js')}}"></script>
    <script src=" {{ asset ('js/sweetalert2.all.min.js')}}"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
      
    <script>
        let input = document.querySelector("#searchs");
        let button = document.querySelector("#buttons");
        button.disabled = true;
        input.addEventListener("change", stateHandle);
        function stateHandle() {
        if (document.querySelector("#searchs").value === "") {
            button.disabled = true;
        } else {
            button.disabled = false;
        }
        }



        $('.modalSaveButtons').click(function(event) {
       event.preventDefault(); 

       
       var feedback_title = $('#feedback_title').val();
       var feedback_content = $('#feedback_content').val();
       var user_id = $('#user_id').val();

        

       $.ajax({
           type: "POST",
           url: "{{ route('feedbackPost') }}",
           data: {feedback_title:feedback_title, feedback_content:feedback_content ,user_id:user_id, _token:'{{ csrf_token() }}'},
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

.navbars{
    margin: 0 -9rem 0 -9rem;
}

textarea{
  resize:none;
}

textarea:focus ~ .placeholder{
  color: #007bff;
}

.modalSaveButtons{
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



    </style>


</body>

</html>