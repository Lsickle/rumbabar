@extends('layouts.adminApp')

@section('pagename')
Nombre de la pagina
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
@endsection

@section('header')
    <div class="sticky-top px-3 mt-2">
        <div class="row bg-light">
            <div class="col">
                <p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Registro de compra'}}</p>
            </div>
            <div class="col">
                <a class="float-right font-inter-700 text-secondary" href="{{route('home')}}"><i loading="lazy" width="30" height="30" class="d-inline-block align-center fab fa-rockrms fa-lg"></i>umbaBar</a>
            </div>
        </div>
        <div class="row bg-light mb-2">
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
        </div>
    </div>
@endsection

@section('container')
<div class="container shadow rounded border border-3 h-90 bg-white">
    <div class="row justify-content-between py-2 my-2" id='ventasHeader'>
        <div class="col-6 my-2 col-md-3">
            <button class="float-left btn btn-success text-white font-inter-600" style="font-size:12px;"><b>$ Ingresar a Inventario</b></button>
        </div>
        <div class="col-6 my-2 col-md-3">
            <a href="{{route('productos.create')}}" class="float-right btn btn-primary text-white font-inter-600" style="font-size:12px;"><b>+ Nuevo Producto</b></a>
        </div>
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
        <div class="col-6 my-2 col-md-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="00174" aria-label="productCode" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
    <div class="row bg-local ">
        <div class="col">
            <div class="card my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"><img class="card-img" src="https://picsum.photos/300/200?text=Image cap" alt="Card image cap"></div>
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
                        <div class="col-md-2">
                            <div>
                                <button class="btn btn-block btn-danger text-white font-inter-600" style="font-size:12px;"><b><i class="fas fa-trash-alt"></i> Reset</b></button>
                            </div>
                            <br>
                            <div>
                                <button class="btn btn-block btn-success text-white font-inter-600" style="font-size:12px;"><b>$ Añadir a Compra</b></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover table-sm text-left mb-0" style="color:#6E6893 !important;">
                <thead class="font-inter-600" style="background-color: #F4F2FF;">
                    <tr>
                        <th id="th-1" scope="col">#</th>
                        <th id="th-3" scope="col">Producto</th>
                        <th id="th-4" scope="col">Cantidad</th>
                        <th id="th-5" scope="col">Precio unidad</th>
                        <th id="th-6" scope="col">Precio</th>
                        <th id="th-9" scope="col">+</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="align-middle" scope="row"><i class="far fa-check-square"></i></th>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                <div class="text-dark">Cocacola 1.5 Lt</div>#00175
                            </div>
                        </td>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap font-inter-600">
                                <span class="badge badge-domicilio" style="font-size: 20px !important;">
                                    • 48
                                </span>
                            </div>
                        </td>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                <div class="text-dark">$2000</div>
                                COP
                            </div>
                        </td>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                <div class="text-dark">$95.000</div>
                                COP
                            </div>
                        </td>
                        <td class="align-middle" scope="col"><i class="fas fa-caret-square-up"></i><br><i class="fas fa-caret-square-down"></i></td>
                    </tr>
                    <tr>
                        <th class="align-middle" scope="row"><i class="far fa-check-square"></i></th>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                <div class="text-dark">Cocacola 1.5 Lt</div>#00176
                            </div>
                        </td>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap font-inter-600">
                                <span class="badge badge-domicilio" style="font-size: 20px !important;">
                                    • 20
                                </span>
                            </div>
                        </td>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                <div class="text-dark">$2000</div>
                                COP
                            </div>
                        </td>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                <div class="text-dark">$40000</div>
                                COP
                            </div>
                        </td>
                        <td class="align-middle" scope="col"><i class="fas fa-caret-square-up"></i><br><i class="fas fa-caret-square-down"></i></td>
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
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        // $("button").click(function(){
        //     $("p").slideToggle();
        // });
        console.log('hola');
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
@endsection