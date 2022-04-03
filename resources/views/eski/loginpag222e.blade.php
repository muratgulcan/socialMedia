
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		@section('title','Giriş Yap')
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="{{asset('css/fonts/linearicons/style.css')}}">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{asset('css/style.css')}}">
	</head>

	<body>

		<div class="logo2">
			<a id="logo" href="{{route('main')}}" > <img class="img_logo" src="/images/club.png" /> </a>
		</div>

		<div class="wrapper">
			<div class="inner">
				<img src="images/image-1.png" alt="" class="image-1">
				<form method="POST" action="{{ route('login') }}">
					@csrf



					<h3>Giriş Yap</h3>
					
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus>

					</div>

					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" placeholder="Parola"  name="password" required autocomplete="current-password">

					</div>

					<button type="submit">
						<span>Giriş yap</span>
					</button>
				</form>
				<img src="images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
		<script src="{{asset('js/main2.js')}}"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>