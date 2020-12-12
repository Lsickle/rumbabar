<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Registro - Rumbabar</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/app.css">

    <!-- Styles -->

</head>

<body>
    <div class="content p-3 min-vh-90" id="mainContent" style="background-color: F2F0F9;">
        <div class="container">
            <nav class="navbar navbar-light">
                <a class="navbar-brand" href="#"><i loading="lazy" width="36" height="36" class="d-inline-block align-top fab fa-rockrms fa-lg"></i>umbaBar</a>
                <ul class="nav justify-content-end" id="">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-dark m-2" href="{{ route('home') }}">Home</a>
                    </li>
                    @else
                    <li class="nav-item">
						<a class="nav-link btn btn-outline-dark m-2" href="{{ route('login') }}">Login</a>
                    </li>
                    @endauth
                </ul>
            </nav>
            <div class="jumbotron py-5 h-90" style="background-image: url('img/bar-register-bg.webp');background-repeat: no-repeat;
  background-size: cover;background-position:center center;">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="card bg-transparent min-vh-90"
                            style="background-image: linear-gradient(rgba(107, 139, 255, 0.618), rgba(180, 115, 255, 0.6));">
                            <img class="card-img-top" src="img/espacioParaLogo.png" alt="Card image cap">
                            <div class="card-body">
                                <h2 style="font-family: 'Revalia', cursive;
                                font-family: 'Revalia', cursive; 
                                color:white;
    background: -webkit-linear-gradient(#030095, #4465dd);
    background: -o-linear-gradient(#030095, #4465dd);
    background: -moz-linear-gradient(#030095, #4465dd);
    background: linear-gradient(#030095, #4465dd);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;" class="card-title text-left">Registro</h2>
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="card border-0 rounded p-3">
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="registerInputUser1"  aria-describedby="userHelp" placeholder="Ingrese su Usuario" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="registerInputEmail1"  aria-describedby="userHelp" placeholder="Ingrese su Correo" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control  @error('password') is-invalid @enderror" id="registerInputPassword1"  placeholder="Ingrese su Contraseña"  value="{{ old('password') }}" >
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <input name="password_confirmation" type="password" class="form-control"  id="password-confirm" placeholder="Repita su Contraseña">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registrar</button>
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