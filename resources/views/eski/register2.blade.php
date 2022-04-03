<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Kayıt Ol</title>
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


				<form method="POST" action="{{ route('register') }}">

					@csrf


					<h3>Üye Ol</h3>

					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input id="name" maxlength="16" class="form-control" placeholder="Kullanıcı adı" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input id="email" type="text" class="form-control" placeholder="E-mail" name="email" :value="old('email')" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input id="password" type="password" class="form-control" placeholder="Parola"  name="password" equired autocomplete="new-password">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input id="password_confirmation" type="password" class="form-control" placeholder="Parolayı yeniden giriniz"  name="password_confirmation" required autocomplete="new-password">
					</div>

					

					<button type="submit">
						<span>Kayıt Ol</span>
					</button>
				</form>
				<img src="images/image-2.png" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
		<script src="{{asset('js/main2.js')}}"></script>
		<script>

			$(function() {
					$('#name').on('keypress', function(e) {
						if (e.which == 32){
							console.log('Space Detected');
							return false;
						}
					});
			});

		</script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>


