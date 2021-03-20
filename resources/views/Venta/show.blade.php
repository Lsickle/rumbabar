@extends('layouts.adminApp')

@section('pagename')
Registro de venta
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
@endsection

@section('content')
<div class="container">
    <div class="content py-3  min-vh-90 bg-light" id="mainContent">
        <div class="container">
            <div class="sticky-top">
                <div class="row bg-light">
                    <div class="col">
                        <p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Registro de venta'}}</p>
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
    
            <form action="{{route('ventas.store')}}" method="POST">
                @csrf
                <div class="container shadow rounded border border-3 h-90 bg-white">
                    <div class="row justify-content-between py-2 my-2" id='ventasHeader'>
                        <div class="col-6 col-md-2 d-flex justify-content-between">
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="text-nowrap bd-highlight">
                                        <i class="fas fa-caret-down"></i> Mesa 4
                                    </div>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Mesa 1</a>
                                    <a class="dropdown-item" href="#">Mesa 2</a>
                                    <a class="dropdown-item" href="#">Mesa 3</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <button class="float-right btn btn-success text-white font-inter-600" style="font-size:12px;"><b>$ Facturar</b></button>
                        </div>
                        <div class="col-md-3 my-sm-0 my-2">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
                                </div>
                                <input type="text" class="form-control" placeholder="00174" aria-label="productCode" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="row bg-local">
                        <div class="col">
                            <div class="card my-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3"><img class="card-img" src="https://picsum.photos/300/200?text=Image cap" alt="Card image cap"></div>
                                        <div class="col-md-3">
                                            <div class="form-group pt-2 pt-sm-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button id="searchproductButton" class="btn btn-outline-primary" type="button"><i class="fas fa-search"></i></button>
                                                    </div>
                                                    <input id="ProductoId" name="ProductoId" type="number" class="form-control" placeholder="Codigo" aria-label="Codigo" aria-describedby="basic-addon1" value="1">
                                                </div>
                                            </div>
                                            <p id="ProductoNombre" class="card-tittle text-left">Jugo 1.5 Lt.</p>
                                            <p id="ProductoDescripcion" class="card-text text-left">Botella de 1.5 Lt Sabor Mango</p>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    {{-- <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">#</span>
                                                                    </div> --}}
                                                    <input id="ventaCantidad" name="ventaCantidad" type="number" min="1" class="form-control" placeholder="Cantidad" aria-label="Cantidad" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    {{-- <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon1">$</span>
                                                                    </div> --}}
                                                    <input step="0.01" name="ProductoPrecio" id="ProductoPrecio" type="number" class="form-control" placeholder="Precio" aria-label="Precio" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div>
                                                <button class="btn btn-block btn-danger text-white font-inter-600" style="font-size:12px;"><b><i class="fas fa-trash-alt"></i> Reset</b></button>
                                            </div>
                                            <br>
                                            <div>
                                                <button type="button" id="despachar" class="btn btn-block btn-success text-white font-inter-600" style="font-size:12px;"><b>$ Despachar</b></button>
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
                                        <th class="text-right" id="th-5" scope="col">Precio unidad</th>
                                        <th class="text-right" id="th-6" scope="col">SubTotal</th>
                                        <th id="th-9" scope="col">+</th>
                                    </tr>
                                </thead>
                                <tbody id="productTable">
                                    @foreach ($productos as $producto)
                                    <tr>
                                        <th class="align-middle" scope="row"><i class="far fa-check-square"></i></th>
                                        <td class="align-middle" scope="col">
                                            <div class="text-nowrap">
                                                <div class="text-dark">{{$producto->ProductoNombre}}</div>#{{$producto->ProductoId}}
                                            </div>
                                        </td>
                                        <td class="align-middle" scope="col">
                                            <div class="text-nowrap font-inter-600">
                                                <span class="badge badge-domicilio" style="font-size: 20px !important;">
                                                    • {{$producto->pivot->ventaCantidad}}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="align-middle text-right" scope="col">
                                            <div class="text-nowrap">
                                                <div class="text-dark">${{number_format($producto->ProductoPrecio, 2, '.', ',')}}</div>
                                                COP
                                            </div>
                                        </td>
                                        <td class="align-middle text-right" scope="col">
                                            <div class="text-nowrap">
                                                <div class="text-dark">${{number_format(($producto->ProductoPrecio * $producto->pivot->ventaCantidad), 2, '.', ',')}}</div>
                                                COP
                                            </div>
                                        </td>
                                        <td class="align-middle" scope="col"><i class="fas fa-caret-square-up"></i><br><i class="fas fa-caret-square-down"></i></td>
                                    </tr>
                                    @endforeach
                                    {{-- <tr>
                                                        <th class="align-middle" scope="row"><i class="far fa-check-square"></i></th>
                                                        <td class="align-middle" scope="col">
                                                            <div class="text-nowrap">
                                                                <div class="text-dark">Cocacola 1.5 Lt</div>#00175
                                                            </div>
                                                        </td>
                                                        <td class="align-middle" scope="col">
                                                            <div class="text-nowrap font-inter-600">
                                                                <span class="badge badge-domicilio" style="font-size: 20px !important;">
                                                                    • 02
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
                                                                <div class="text-dark">$4000</div>
                                                                COP
                                                            </div>
                                                        </td>
                                                        <td class="align-middle" scope="col"><i class="fas fa-caret-square-up"></i><br><i class="fas fa-caret-square-down"></i></td>
                                                    </tr>
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
                                                                    • 05
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
                                                                <div class="text-dark">$4000</div>
                                                                COP
                                                            </div>
                                                        </td>
                                                        <td class="align-middle" scope="col"><i class="fas fa-caret-square-up"></i><br><i class="fas fa-caret-square-down"></i></td>
                                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row flex-row d-flex p-2" style="background-color: #F4F2FF; color:#6E6893 !important;">
                        <div class="col my-auto">
                            <div class="text-left">filas por página: {{$productos->count()}}</div>
                        </div>
    
                        <div class="col">
                            <div class="text-right">
                                <div class="mx-3">{{$productos->firstItem()}}-{{$productos->lastItem()}} of {{$productos->total()}}</div>
                                <a href="{{$productos->url(1)}}"><i class="px-0 fas fa-angle-double-left"></i></a>
                                <a href="{{$productos->previousPageUrl()}}"><i class="px-1 fas fa-chevron-left"></i></a>
                                <a href="{{$productos->previousPageUrl()}}"><i class="px-1">{{$productos->currentPage() > 1 ? $productos->currentPage() - 1 : ''}}</i></a>
                                <i class="px-0">{{$productos->currentPage()}}</i>
                                <a href="{{$productos->nextPageUrl()}}"><i class="px-1">{{$productos->currentPage() + 1}}</i></a>
                                <a href="{{$productos->nextPageUrl()}}"><i class="px-1 fas fa-chevron-right"></i></a>
                                <a href="{{$productos->url($productos->lastPage())}}"><i class="px-0 fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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
<script type="text/javascript">
    toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "6000",
            "extendedTimeOut": "3000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }
    
            function NotifiTrue(Mensaje) {
                toastr.success(Mensaje);
            }
    
            function NotifiFalse(Mensaje) {
                toastr.error(Mensaje);
            }
</script>
<script>
    var buttonsubmit = $('#searchproductButton');
            function enablesearhbutton(Mensaje) {
                buttonsubmit.disabled = false;
                buttonsubmit.prop('disabled', false);
                buttonsubmit.prop('class', 'btn-primary');
            }
            function disablesearhbutton() {
                buttonsubmit.disabled = true;
                buttonsubmit.prop('disabled', true);
                buttonsubmit.prop('class', 'btn-secondary');
            }
            function renewtoken(token) {
                $('meta[name="csrf-token"]').attr('content', token);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });
            }
</script>
<script type="text/javascript">
    $('#searchproductButton').on( "click", function(e) {
                var id = $('#ProductoId').val();
                var productoNombre = $("#ProductoNombre");
                var productoDescripcion = $('#ProductoDescripcion');
                var ProductoPrecio = $('#ProductoPrecio');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('getProduct')}}",
                    method: 'GET',
                    data: {'id': id},
                    beforeSend: function(){
                        disablesearhbutton();
                        productoNombre.empty();
                        productoDescripcion.empty();
                    },
                    success: function(data, textStatus, jqXHR) {
                        renewtoken(data.newtoken);
                        switch (jqXHR['status']) {
                            case 200:
                                toastr.success(data['message']);
                                break;
    
                            default:
                                toastr.error(data['message']);
                                break;
                        }
                        productoNombre.html(data.producto.ProductoNombre);
                        productoDescripcion.html(data.producto.ProductoDescripcion);
                        ProductoPrecio.val(data.producto.ProductoPrecio);
                        enablesearhbutton();
                    },
                    error: function(xhr, textStatus, jqXHR){
                        renewtoken(xhr.newtoken);
                        xhr.responseJSON.errors.id.forEach( errormessage => {
                            toastr.error(errormessage);
                        });
                        productoNombre.html('no existe');
                        productoDescripcion.html('producto no encontrado');
                        enablesearhbutton();
                    },
                    complete: function(){
    
                    }
                })
                e.preventDefault();
            });
</script>
<script type="text/javascript">
    $('#despachar').on( "click", function(e) {
                    var buttonsubmit = $('#despachar');
                    var id = $('#ProductoId').val();
                    var productoNombre = $("#ProductoNombre");
                    var productoDescripcion = $('#ProductoDescripcion');
                    var ProductoPrecio = $('#ProductoPrecio');
                    var ventaCantidad = $('#ventaCantidad');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{route('addProductVenta', ['venta' => $venta->VentaId])}}",
                        method: 'PUT',
                        data: {
                            'id': id,
                            'ventaCantidad': ventaCantidad.val()
                        },
                        beforeSend: function(){
                            buttonsubmit.disabled = true;
                            buttonsubmit.prop('disabled', true);
                        },
                        success: function(data, textStatus, jqXHR) {
                            console.log(data);
                            console.log(textStatus);
                            console.log(jqXHR);
                            renewtoken(data.newtoken);
                            switch (jqXHR['status']) {
                                case 200:
                                    toastr.success(data['message']);
                                    $('#productTable').prepend(`
                                        <tr>
                                            <th class="align-middle" scope="row"><i class="far fa-check-square"></i></th>
                                            <td class="align-middle" scope="col">
                                                <div class="text-nowrap">
                                                    <div class="text-dark">`+data.producto.ProductoNombre+`</div>#`+data.producto.ProductoId+`
                                                </div>
                                            </td>
                                            <td class="align-middle" scope="col">
                                                <div class="text-nowrap font-inter-600">
                                                    <span class="badge badge-domicilio" style="font-size: 20px !important;">
                                                        • `+data.producto.CantidadVendida+`
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="align-middle text-right" scope="col">
                                                <div class="text-nowrap">
                                                    <div class="text-dark">$`+data.producto.precio+`</div>
                                                    COP
                                                </div>
                                            </td>
                                            <td class="align-middle text-right" scope="col">
                                                <div class="text-nowrap">
                                                    <div class="text-dark">$`+data.producto.subtotal+`</div>
                                                    COP
                                                </div>
                                            </td>
                                            <td class="align-middle" scope="col"><i class="fas fa-caret-square-up"></i><br><i class="fas fa-caret-square-down"></i></td>
                                        </tr>
                                    `);
    
                                    break;
    
                                default:
                                    toastr.error(data['message']);
                                    break;
                            }
                        },
                        error: function(xhr, textStatus, jqXHR){
                            console.log(xhr);
                            console.log(textStatus);
                            console.log(jqXHR);
                            renewtoken(xhr.newtoken);
                            xhr.responseJSON.errors.venta.forEach( errormessage => {
                                toastr.error(errormessage);
                            });
                        },
                        complete: function(){
                            buttonsubmit.disabled = false;
                            buttonsubmit.prop('disabled', false);
                        }
                    })
                    e.preventDefault();
                });
</script>
@endsection