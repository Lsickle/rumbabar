<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link rel="stylesheet" href="css/app.css">

  <!-- Styles -->

</head>

<body>
	<div class="content bg-gradient-secondary p-3 min-vh-100">
		<div class="container">
			@if (Route::has('login'))
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand" href="#"><i loading="lazy" width="36" height="36"
						class="d-inline-block align-top fab fa-rockrms fa-lg"></i>umbaBar</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			
				<ul class="nav justify-content-end collapse navbar-collapse" id="navbarSupportedContent">
					@auth
					<li class="nav-item">
						<a class="nav-link btn btn-outline-dark m-2" href="{{ route('home') }}"><span
								class="sr-only">(current)</span>Home</a>
					</li>
					@else
					{{-- <li class="nav-item">
						<a class="nav-link btn btn-outline-dark m-2 active" href="{{ route('login') }}">Login</a>
					</li> --}}
					@endauth
					@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link btn btn-outline-dark m-2" href="{{ route('register') }}">Registro</a>
					</li>
					@endif
				</ul>
			</nav>
			@endif
			<div class="jumbotron py-5 h-100" style="background-image: url('img/bar-background.jpg');background-repeat: no-repeat;
  background-size: cover;background-position:center center;">
				<div class="row">
					<div class="col-lg-5">
						<div class="card bg-transparent" style="width: 18rem;background-image: linear-gradient(rgba(60, 1, 128, 0.6), rgba(0, 26, 130, 0.6), rgba(23, 201, 0, 0.6));">
							<img class="card-img-top" src="img/espacioParaLogo.png" alt="Card image cap">
							<div class="card-body">
								{{-- pendiente instalacion de fuente "revalia" --}}
								<h3 class="card-title text-left">Login</h3>
								<form>
									<div class="card border-0 rounded p-2">
										<div class="form-group">
											<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
												placeholder="ingrese su Usuario">
										</div>
										<div class="form-group">
											<input type="password" class="form-control" id="exampleInputPassword1" placeholder="ingrese su Contraseña">
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