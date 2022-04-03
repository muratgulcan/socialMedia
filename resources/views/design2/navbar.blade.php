<div class="col-lg-10">
    <div class="header__nav">
        <nav class="header__menu mobile-menu">
            
            
            <ul>
                <li><a href="{{route('home')}}">Anasayfa</a></li>
                <li><a href="{{route('icerik_olustur')}}">İçerik oluştur</a></li>
                <li><a href="{{route('kesfet')}}">Keşfet</a></li>
                <li><input   name="search" autocomplete="off" class="form-control" placeholder="&#xF002; Müzik'de ara" type="text" style="border-radius: 100rem;font-family:Arial, FontAwesome"  >
                    <ul class="dropdown" > 
                        
                        @foreach ($search_user as $searchuser)
                            <li><a href=""> {{"@".$searchuser->username}}</a></li>
                            <hr>
                        @endforeach
                        
                    </ul>
                </li>
                
                @auth
                <li><a href="{{route('getProfile', ['username'=> Auth::user()->username])}}"><img src="<?=url('/')?>/images/avatars/{{Auth::user()->photo}}" alt="" style="margin-right: 0.3rem;" class="rounded-circle" width="42" height="42">{{Auth::user()->username}}</a>
                    <ul class="dropdown">
                        <li><a href="{{route('profileSettings')}}">Profil Düzenle</a></li>
                        <li><a href="{{route('logout')}}">Çıkış Yap</a></li>

                    </ul>
                </li>
                

                @endauth
                @guest
                <li><a href="{{route('login')}}"><span class="icon_profile arrow_carrot-down"></span></a>
                @endguest
            </ul>
        </nav>
    </div>
</div>