<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Registro - Rumbabar</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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
    -webkit-text-fill-color: transparent;" class="card-title text-left">Registro de Usuario</h2>
                                <form>
                                    <div class="card border-0 rounded p-3">
                                        <div class="form-group">
                                            <input name="username" type="text" class="form-control" id="registerInputUser1" aria-describedby="userHelp" placeholder="Ingrese su Usuario">
                                        </div>
                                        <div class="form-group">
                                            <input name="contraseña" type="password" class="form-control" id="registerInputPassword1" placeholder="Ingrese su Contraseña">
                                        </div>
                                        <div class="form-group">
                                            <input name="contraseñaVerify" type="password" class="form-control" id="registerVerifyPassword1" placeholder="Repita su Contraseña">
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