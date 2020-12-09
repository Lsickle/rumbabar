<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Login - Rumbabar</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">

  <!-- Styles -->

</head>

<body>
	<div class="content p-3 min-vh-90" id="mainContent" style="background-color: F2F0F9;">
		<div class="container">
			<nav class="navbar navbar-light">
				<a class="navbar-brand" href="#"><i loading="lazy" width="36" height="36" class="d-inline-block align-top fab fa-rockrms fa-lg"></i>umbaBar</a>
				<ul class="nav justify-content-end" id="navbarSupportedContent">
					@auth
					<li class="nav-item">
						<a class="nav-link btn btn-outline-dark m-2" href="{{ route('home') }}">Home</a>
					</li>
					@else
						@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link btn btn-outline-dark m-2" href="{{ route('register') }}">Registro</a>
						</li>
						@endif
					@endauth
				</ul>
			</nav>
			<div class="jumbotron py-5 h-90" style="background-image: url('img/bar-background-offcolor.webp');background-repeat: no-repeat; background-size: cover;background-position:center center;">
				<div class="row">
					<div class="col-xl-5">
						<div class="card bg-transparent min-vh-90" style="background-image: linear-gradient(rgba(60, 1, 128, 0.6), rgba(0, 26, 130, 0.6), rgba(23, 201, 0, 0.6));">
							<img class="card-img-top" src="img/espacioParaLogo.png" alt="Card image cap">
							<div class="card-body">
								<h2 style="font-family: 'Revalia', cursive; color:white; background: -webkit-linear-gradient(#030095, #4465dd); background: -o-linear-gradient(#030095, #4465dd); background: -moz-linear-gradient(#030095, #4465dd); background: linear-gradient(#030095, #4465dd); -webkit-background-clip: text; -webkit-text-fill-color: transparent;" class="card-title text-left">Login</h2>
								<form method="POST" action="{{ route('login') }}">
                        		@csrf
									<div class="card border-0 rounded p-3">
										@if ($errors->any())
											<div class="alert alert-danger">
												<ul>
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
										@endif
										<div class="form-group">
											<input name="UsuarioName" type="text" class="form-control @error('UsuarioName') is-invalid @enderror" id="exampleInputUser1" aria-describedby="userHelp"
												placeholder="Ingrese su Usuario" required autocomplete="UsuarioName" autofocus>
											@error('UsuarioName')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="form-group">
											<input name="UsuarioPassword" type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingrese su Contraseña">
											@error('UsuarioPassword')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<button type="submit" class="btn btn-primary">Ingresar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  
  </div>
  <script src="js/app.js"></script>
  <script>
    $(document).ready(function(){
		// $("button").click(function(){
		//     $("p").slideToggle();
		// });
		console.log('hola');
	});
  </script>
</body>

</html>