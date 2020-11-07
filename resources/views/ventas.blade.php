<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ventas - Rumbabar</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">

    <!-- Styles -->

</head>

<body>
    <div class="content py-3  min-vh-90 bg-light" id="mainContent">
        <div class="container">
            <div class="sticky-top">
                    <div class="row bg-light">
                        <div class="col">
                            <p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'lista de ventas'}}</p>
                        </div>
                        <div class="col">
                            <a class="float-right font-inter-700 text-secondary" href="#"><i loading="lazy" width="30" height="30" class="d-inline-block align-center fab fa-rockrms fa-lg"></i>umbaBar</a>
                        </div>
                    </div>
                    <div class="row bg-light mb-2">
                        <div class="col">
                            <ul class="nav d-flex flex-wrap-reverse flex-md-row border-bottom">
                                <li class="nav-item px-2">
                                    <a href="">Junio</a>
                                </li>
                                <li class="nav-item px-2">
                                    <a href="">Julio</a>
                                </li>
                                <li class="nav-item dropright">
                                    <a class="nav-link dropdown-toggle py-0 px-2" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">Agosto</a>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Septiembre</a>
                                    <a class="dropdown-item" href="#">Octubre</a>
                                    <a class="dropdown-item" href="#">Noviembre</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Todos los Meses</a>
                                    </div>
                                </li>
                                <li class="flex-grow-1 nav-item">
                                    <a class="text-secondary float-right">Total: $ <span style="color: #6D5BD0"><b>{{'900.00'}}</b></span> COP</a>
                                </li>
                            </ul>
                        </div>
                    </div>
            </div>
            
            <div class="container shadow rounded border border-3 h-90 bg-white">
                <div class="row justify-content-between py-2 my-2" id='ventasHeader'>
                    <div class="col-12 col-sm-2 d-flex justify-content-between">
                        <button class="btn btn-outline-secondary dropdown">
                            <div class="text-nowrap bd-highlight">
                                <i class="fas fa-filter"></i> Filtro
                            </div>
                        </button>
                        <button class="btn text-white font-inter-600" style="background-color:#6D5BD0; font-size:12px;"><b>PAGOS</b></button>
                    </div>
                    <div class="col-12 col-sm-5 my-sm-0 my-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Buscar" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm text-left mb-0" style="color:#6E6893 !important;">
                            <thead class="font-inter-" style="background-color: #F4F2FF; font-size:12px">
                                <tr>
                                    <th id="th-1" scope="col">#</th>
                                    <th id="th-3" scope="col">CLIENTE</th>
                                    <th id="th-4" scope="col">FECHA</th>
                                    <th id="th-5" scope="col">METODO DE PAGO</th>
                                    <th id="th-6" scope="col">CANTIDAD</th>
                                    <th id="th-7" scope="col">VER</th>
                                    <th id="th-8" scope="col"></th>
                                    <th id="th-9" scope="col"><i class="fas fa-ellipsis-v"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="align-middle" scope="row"><i class="far fa-check-square"></i></th>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">Pepito Perez</div>Mesa 2
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Fecha : 14/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-local">
                                                • Local
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Paid on 15/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-efectivo">
                                                • Efectivo
                                            </span>
                                            
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">$200</div>
                                            COP
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <a href="#" class="btn btn-sm btn-info text-white">
                                            <div class="text-nowrap">Ver Mas</div>
                                        </a>
                                    </td>
                                    <td class="align-middle" scope="col">
                                    </td>
                                    <td class="align-middle" scope="col"><i class="fas fa-ellipsis-v"></i></td>
                                </tr>
                                <tr>
                                    <th class="align-middle" scope="row"><i class="far fa-check-square"></i></th>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">Pepito Perez</div>Mesa 4
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Fecha : 14/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-domicilio">
                                                • Domicilio
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Paid on 15/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-credito">
                                                • Credito
                                            </span>
                                            
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">$200</div>
                                            COP
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <a href="#" class="btn btn-sm btn-info text-white">
                                            <div class="text-nowrap">Ver Mas</div>
                                        </a>
                                    </td>
                                    <td class="align-middle" scope="col">
                                    </td>
                                    <td class="align-middle" scope="col"><i class="fas fa-ellipsis-v"></i></td>
                                </tr>
                                <tr>
                                    <th class="align-middle" scope="row"><i class="far fa-check-square"></i></th>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">Pepito Perez</div>Mesa 1
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Fecha : 14/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-primary">
                                                • Local
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Paid on 15/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-debito">
                                                • Debito
                                            </span>
                                            
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">$200</div>
                                            COP
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <a href="#" class="btn btn-sm btn-info text-white">
                                            <div class="text-nowrap">Ver Mas</div>
                                        </a>
                                    </td>
                                    <td class="align-middle" scope="col">
                                    </td>
                                    <td class="align-middle" scope="col"><i class="fas fa-ellipsis-v"></i></td>
                                </tr>
                                <tr>
                                    <th class="align-middle" scope="row"><i class="far fa-square"></i></th>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">Pepito Perez</div>Mesa 1
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Fecha : 14/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-primary">
                                                • Local
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Paid on 15/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-success">
                                                • Local
                                            </span>
                                            
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">$200</div>
                                            COP
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <a href="#" class="btn btn-sm btn-info text-white">
                                            <div class="text-nowrap">Ver Mas</div>
                                        </a>
                                    </td>
                                    <td class="align-middle" scope="col">
                                    </td>
                                    <td class="align-middle" scope="col"><i class="fas fa-ellipsis-v"></i></td>
                                </tr>
                                <tr>
                                    <th class="align-middle" scope="row"><i class="far fa-square"></i></th>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">Pepito Perez</div>Mesa 1
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Fecha : 14/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-primary">
                                                • Local
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Paid on 15/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-success">
                                                • Local
                                            </span>
                                            
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">$200</div>
                                            COP
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <a href="#" class="btn btn-sm btn-info text-white">
                                            <div class="text-nowrap">Ver Mas</div>
                                        </a>
                                    </td>
                                    <td class="align-middle" scope="col">
                                    </td>
                                    <td class="align-middle" scope="col"><i class="fas fa-ellipsis-v"></i></td>
                                </tr>
                                <tr>
                                    <th class="align-middle" scope="row"><i class="far fa-square"></i></th>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">Pepito Perez</div>Mesa 5
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Fecha : 14/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-primary">
                                                • Local
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Paid on 15/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-success">
                                                • Local
                                            </span>
                                            
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">$200</div>
                                            COP
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <a href="#" class="btn btn-sm btn-info text-white">
                                            <div class="text-nowrap">Ver Mas</div>
                                        </a>
                                    </td>
                                    <td class="align-middle" scope="col">
                                    </td>
                                    <td class="align-middle" scope="col"><i class="fas fa-ellipsis-v"></i></td>
                                </tr>
                                <tr>
                                    <th class="align-middle" scope="row"><i class="far fa-square"></i></th>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">Pepito Perez</div>Mesa 1
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Fecha : 14/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-primary">
                                                • Local
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Paid on 15/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-success">
                                                • Local
                                            </span>
                                            
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">$200</div>
                                            COP
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <a href="#" class="btn btn-sm btn-info text-white">
                                            <div class="text-nowrap">Ver Mas</div>
                                        </a>
                                    </td>
                                    <td class="align-middle" scope="col">
                                    </td>
                                    <td class="align-middle" scope="col"><i class="fas fa-ellipsis-v"></i></td>
                                </tr>
                                <tr>
                                    <th class="align-middle" scope="row"><i class="far fa-square"></i></th>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">Pepito Perez</div>Mesa 1
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Fecha : 14/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-primary">
                                                • Local
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Paid on 15/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-success">
                                                • Local
                                            </span>
                                            
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">$200</div>
                                            COP
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <a href="#" class="btn btn-sm btn-info text-white">
                                            <div class="text-nowrap">Ver Mas</div>
                                        </a>
                                    </td>
                                    <td class="align-middle" scope="col">
                                    </td>
                                    <td class="align-middle" scope="col"><i class="fas fa-ellipsis-v"></i></td>
                                </tr>
                                <tr>
                                    <th class="align-middle" scope="row"><i class="far fa-square"></i></th>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">Pepito Perez</div>Mesa 1
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Fecha : 14/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-primary">
                                                • Local
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Paid on 15/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-success">
                                                • Local
                                            </span>
                                            
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">$200</div>
                                            COP
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <a href="#" class="btn btn-sm btn-info text-white">
                                            <div class="text-nowrap">Ver Mas</div>
                                        </a>
                                    </td>
                                    <td class="align-middle" scope="col">
                                    </td>
                                    <td class="align-middle" scope="col"><i class="fas fa-ellipsis-v"></i></td>
                                </tr>
                                <tr>
                                    <th class="align-middle" scope="row"><i class="far fa-square"></i></th>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">Pepito Perez</div>Mesa 1
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Fecha : 14/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-primary">
                                                • Local
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            Paid on 15/APR/2020
                                            <br>
                                            <span class="badge badge-pill badge-success">
                                                • Local
                                            </span>
                                            
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">$200</div>
                                            COP
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <a href="#" class="btn btn-sm btn-info text-white">
                                            <div class="text-nowrap">Ver Mas</div>
                                        </a>
                                    </td>
                                    <td class="align-middle" scope="col">
                                    </td>
                                    <td class="align-middle" scope="col"><i class="fas fa-ellipsis-v"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row flex-row d-flex p-2" style="background-color: #F4F2FF; color:#6E6893 !important;">
                    <div class="mr-auto">filas por pagina: 10</div>
                    <div>1-10 of 276</div>
                    <div><i class="px-2 fas fa-chevron-left"></i><i class="px-2 fas fa-chevron-right"></i></div>
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