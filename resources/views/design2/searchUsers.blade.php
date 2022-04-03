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
                    <div class="col-lg-8">
                        
                 
                        <h5 class="titleFont" style="margin-bottom: 1rem;"><span class="firstSpan">Kullanıcılar </span> </h5>
                        

                        
                        @if(isset($user ))

                        
                            @foreach ($user as $results)
                            @auth
                    
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="border-radius: 1.3rem; margin-bottom:0.5rem;">
                            <a href="{{route('getProfile', ['username'=> $results->username])}}" style="color:inherit;"><img src="<?=url('/')?>/images/avatars/{{$results->photo}}" class="rounded-circle" width="45" height="45"><h6 style="padding-left:0.4rem; color: #000;"> 
                            <span>{{$results->name}}</span>
                            <br>
                            <small  class="text-muted" > {{"@".$results->username}}</small></a>
                            <br>
                            <small  class="text" > {{$results->info}}</small>
                            
                            </h6>
        
                            
        
                            @php
                                $check= Follow::where('user_id',Auth::user()->id)->where('follower_id',$results->id)->first();
                            @endphp
        
        
                            @if($results->id == Auth::user()->id)  
                            <h6 style="margin-left: auto;">  </h6>
                            @else
                                @if($check)
                                <h6  style="margin-left: auto;" ><a href="{{route('unfollow',['id'=>$results->id])}}" id="unfollow" type="submit" class="site-btn unfollowButton2"   >takibi bırak</a>
                                </h6>
                                
                                @else
                                <h6  style="margin-left: auto;" ><a href="{{route('followSearch',['id'=>$results->id])}}" id="follow" type="submit" class="site-btn followButton2"  >takip et</a>
        
                                </h6>
        
                                @endif
                            @endif
        
                            @endauth
        
                            @guest
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" >
                                <a href="{{route('getProfile', ['username'=> $results->username])}}" style="color:inherit;"><img src="<?=url('/')?>/images/avatars/{{$results->photo}}" class="rounded-circle" width="45" height="45"><h6 style="padding-left:0.4rem; color: #000;"> 
                                <span>{{$results->name}}</span>
                                <br>
                                <small  class="text-muted" > {{"@".$results->username}}</small></a>
                                <br>
                                <small  class="text" > {{$results->info}}</small>
                                
                                </h6>
        
                                <h6 style="margin-left: auto;">  </h6>
                            </li>
                            @endguest
                            
                            
                            </li>


                            @endforeach

                            
                            @if($user->count()===0)
                     

                            
                                <h6 class="titleFont"  style="text-align: center; margin-top:-0.2rem; ">Üzgünüz istediğiniz kullanıcıları bulamadık... </h6>
                                <br>
                                <h6 style="font-size: 2.6rem; text-align:center;"> ✌️😥</h6>

                            @endif
                        @endif
                            

                            <hr>

                            <!-- İÇERİK ARAMA --> 

                            <h5 class="titleFont" style="margin-bottom: 1rem;"><span class="firstSpan"> İçerikler</span> </h5>

                        @if(isset($searchPost))

                            @foreach ($searchPost as $searchpost)
                                
                            

                            <div class="card mb-3 card-color shadows" >
                                <div class="row no-gutters">
                                  <div class="col-md-4 kapakImg">
                                    <img src="<?=url('/')?>/images/posts/postsFirst/{{$searchpost->index_photo}}" alt=""  width="300" height="200">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body" style="padding: 0.25rem;">
                                      <div class="product__item__text2">    
            
                                        @php
                                                    $linkfirst = str_replace(
                                                        ['ü', 'Ü','ö','Ö'],
                                                        ['u', 'U','o','O', '.', ','],
                                                        $searchpost->title
                                                    );
                                                    $seperator = "-";
                                                    $link = Str::slug($linkfirst, $seperator);
                                                    @endphp
            
            
                                    </div>
                                    <h5 class="titleFont4"><a href="{{route('getIcerik',['username'=> $searchpost->user->username, 'id'=>$searchpost->id, 'link'=>$link])}}">{{ $searchpost->title}}</a></h5>
                                      <p class="card-text " style="margin-top: 0.3rem;">{{$searchpost->short_content}}</p>
                                      
                                      <p class="card-text"><small class="text-muted"><i class="far fa-clock" style="margin-right: 0.3rem;"></i>{{$searchpost->created_at->diffForHumans()}}</small></p>
                                      
                                     
                                  
                                    
                                    </div>
                                     
            
                                    
                                  </div>
                                </div>
                              </div>

                              

                            
                            @endforeach
                            @if($searchPost->count()===0)
                     

                            
                                <h6 class="titleFont"  style="text-align: center; margin-top:-0.2rem; ">Üzgünüz istediğiniz içerikleri bulamadık... </h6>
                                <br>
                                <h6 style="font-size: 2.6rem; text-align:center;"> ✌️😥</h6>
                                
                            @endif

                            
                        @endif

                        
                    </div>
    

                    <div class="col-lg-4 col-md-6 col-sm-8">
                        
                        <div class="product__sidebar" >
         
                                    @include('design2.forYou')
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
                                                
                                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="width:100%; background-color: #fff;">
                                                    <a href="{{route('getProfile', ['username'=> $randomusers->username])}}"><img src="<?=url('/')?>/images/avatars/{{$randomusers->photo}}" class="rounded-circle" width="30" height="30"><h6 class="card-text" style="padding-left:0.4rem; color: #000;"> 
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
    
                                <hr>
    
                                @endauth
    
                                
    
                                
    
    
                                    
                                   
                                
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
            float:right;
        }

        .secondSpan a:link {
        text-decoration: none;
        }

        .secondSpan a:visited {
        text-decoration: none;
        }

        .secondSpan a:hover {
        text-decoration: underline;
        }

        .secondSpan a:active {
        text-decoration: underline;
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

        

        .firstSpan a:link {
        text-decoration: none;
        }

        .firstSpan a:visited {
        text-decoration: none;
        }

        .firstSpan a:hover {
        text-decoration: underline;
        }

        .firstSpan a:active {
        text-decoration: underline;
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

.unfollowButton2{
  background-color: #212529; color: #fff; margin:0; border-radius: 120px; font-size:0.6rem;"

}



.unfollowButton2:hover{
  transition-duration: 0.4s;
  background-color:rgb(229, 95, 82);
  border-color:rgb(149, 151, 159);
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
.titleFont{
    font-size: 1.4rem; 
    color:#000;    
    text-shadow: 1px 0 #000;
    letter-spacing:1px;
    font-weight:bold;
}
.titleFont4{
    font-size: 1.2rem; 
    color:#000;    
    text-shadow: 1px 0 #000;
    letter-spacing:0.8px;
    font-weight:bold;
}

.titleFont2{
    font-size: 1.8rem; 
    color:#000;    
    text-shadow: 1px 0 #000;
    letter-spacing:1px;
    font-weight:bold;
    text-align: center;
    margin-top: 5rem;
}
.card{
    border-radius: 0.6rem;
    background-color: #fff;
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
    </script>

   

@endsection