<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Registro de Producto - Rumbabar</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="css/app.css">

</head>

<body>
    <div class="content py-3  min-vh-90 bg-light" id="mainContent">
        <div class="container">
            <div class="sticky-top">
                <div class="row bg-light">
                    <div class="col">
                        <p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Nuevo Producto'}}</p>
                    </div>
                    <div class="col">
                        <a class="float-right font-inter-700 text-secondary" href="#"><i loading="lazy" width="30" height="30" class="d-inline-block align-center fab fa-rockrms fa-lg"></i>umbaBar</a>
                    </div>
                </div>
                {{-- <div class="row bg-light mb-2">
                    <div class="col">
                        <ul class="nav d-flex flex-wrap-reverse flex-md-row border-bottom">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle py-0 px-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">All</a>
                                <div class="dropdown-menu dropdown-menu-left">
                                    <h6 class="dropdown-header">Seleccione el Mes o Rango.</h6>
                                    <a class="dropdown-item px-3" href="#">Agosto</a>
                                    <a class="dropdown-item px-3" href="#">Septiembre</a>
                                    <a class="dropdown-item px-3" href="#">Octubre</a>
                                    <a class="dropdown-item px-3 active" href="#">Noviembre</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item px-3" href="#">Ultimo Año </a>
                                    <a class="dropdown-item px-3" href="#">Ultimo mes</a>
                                    <a class="dropdown-item px-3" href="#">Ultimo Semana</a>
                                    <div class="dropdown-divider"></div>
                                    <form class="form">
                                        <a class="dropdown-item px-3" href="#">
                                            <label class="my-0" for="inlineFormInputGroupDate1">Desde</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text px-2">
                                                        <i class="fas fa-calendar-day"></i>
                                                    </div>
                                                </div>
                                                <input type="date" class="form-control" id="inlineFormInputGroupDate1" placeholder="Desde" describedby="inputGroupPrepend" required>
                                                <div class="invalid-feedback">
                                                escoge una fecha valida.
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item px-3" href="#">
                                            <label class="my-0" for="inlineFormInputGroupDate2">Hasta</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text px-2">
                                                        <i class="fas fa-calendar-day"></i>
                                                    </div>
                                                </div>
                                                <input type="date" class="form-control" id="inlineFormInputGroupDate2" placeholder="Desde" describedby="inputGroupPrepend" required>
                                                <div class="invalid-feedback">
                                                escoge una fecha valida.
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item px-3" href="#">
                                            <button type="submit" class="btn btn-block btn-primary">Buscar</button>
                                        </a>
                                    </form>
                                </div>
                            </li>
                            <li class="flex-grow-1 nav-item">
                                <a class="text-secondary float-right">Cantidad total: $<span style="color: #6D5BD0"><b>{{'37.600,24'}}</b></span> COP</a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
            
            <div class="container shadow rounded border border-3 h-90 bg-white">
                <div class="row justify-content-between py-2 my-2" id='ventasHeader'>
                    <div class="col-6 my-2 col-md-2 d-flex">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="text-nowrap bd-highlight">
                                    <i class="fas fa-caret-down"></i> Proveedor: Postobon
                                </div>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Colanta</a>
                                <a class="dropdown-item" href="#">Femsa</a>
                                <a class="dropdown-item" href="#">Doria</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 my-2 col-md-4">
                        <button class="float-right btn btn-primary text-white font-inter-600" style="font-size:12px;"><b>+ Guardar</b></button>
                    </div>
                </div>
                <div class="row bg-local ">
                    <div class="col">
                        <div class="card my-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5"><img class="card-img" src="https://picsum.photos/300/200?text=Image cap" alt="Card image cap"></div>
                                    <div class="col-md-3">
                                        <div class="form-group pt-2 pt-sm-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                                </div>
                                                <input type="number" class="form-control" placeholder="Codigo" aria-label="Codigo" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <p class="card-tittle text-left"><b>Jugo 1.5 Lt.</b></p>
                                        <p class="card-text text-left">Botella de 1.5 Lt Sabor Mango</p>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Cantidad" aria-label="Cantidad" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Precio" aria-label="Precio" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bg-local">
                    <div class="col">
                        <div class="row m-2">
                            <div class="card col-sm-6">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="nombre" aria-label="nombre" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">#</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="Codigo" aria-label="Codigo" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">$</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="precio" aria-label="precio" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label class="text-secondary form-check-label" for="text">
                                                Descripcion del Producto
                                            </label>
                                            <textarea id="text" name="text" rows="4" cols="50" placeholder="descripcion" aria-label="descripcion" aria-describedby="basic-addon1">
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates culpa facilis deserunt repellendus, assumenda pariatur at est, et adipisci voluptate odio sint tempore molestias commodi suscipit molestiae aliquid nulla reiciendis?
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-sm-6">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class=" float-left text-secondary form-check-label" for="imagen">
                                                Imagen del Producto
                                            </label>
                                        <div class="input-group">
                                            
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-images"></i></span>
                                            </div>
                                            <input id="imagen" type="file" class="form-control" placeholder="imagen" aria-label="imagen" aria-describedby="basic-addon1">
                                        </div>    
                                        <img class="card-img p-2" src="https://picsum.photos/600/400?text=Image cap" alt="Card image cap">
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                    </div>
                </div>
                <div class="row flex-row bg-white d-flex p-4">
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