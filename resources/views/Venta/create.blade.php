@extends('layouts.adminApp')

@section('pagename')
Nueva Venta
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('css/toastr.css')}}" />
@endsection

@section('header')
<div class="sticky-top px-3 mt-2">
    <div class="row bg-light">
        <div class="col">
            <p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Nueva Venta'}}</p>
        </div>
        <div class="col">
            <a class="float-right font-inter-700 text-secondary" href="{{route('home')}}"><i loading="lazy" width="30" height="30" class="d-inline-block align-center fab fa-rockrms fa-lg"></i>umbaBar</a>
        </div>
    </div>
</div>
@endsection

@section('container')
<div class="container shadow rounded border border-3 h-90 bg-white">
    <form action="{{route('ventas.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row justify-content-between py-2 my-2" id='comprasHeader'>
            <div class="col-12 my-2">
                <a href="{{route('ventas.index')}}" class="float-left btn btn-info text-white font-inter-600" style="font-size:12px;">Volver</a>
                <input type="submit" value="+ Guardar" class="float-right btn btn-success text-white font-inter-600" style="font-size:12px;">
            </div>
        </div>

        <div class="row bg-local">
            <div class="col">
                <div class="row m-2">
                    <div class="card col-sm-12">
                        <div class="card-body row">
                            <div class="form-group col-md-6">
                                <label class="text-left text-secondary form-check-label w-100" for="selectCliente">
                                Clientes
                                <select required onchange="reiniciarventa()" class="form-control select2" id="selectCliente" name="fk_cliente">
                                    <option disabled class="text-nowrap bd-highlight" selected value="">Seleccione el Cliente...</option>
                                    @foreach ($clientes as $cliente)
                                    <option class="text-nowrap bd-highlight" value="{{$cliente->ClienteId}}">{{$cliente->ClienteNombre}}</option>
                                    @endforeach
                                </select>
                                </label>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="text-left text-secondary form-check-label w-100" for="selectMesa">
                                Mesas
                                <select required class="form-control select2" id="selectMesa" name="fk_mesa">
                                    <option disabled class="text-nowrap bd-highlight" selected value="">Seleccione la Mesa..</option>
                                    @foreach ($mesas as $mesa)
                                    <option class="text-nowrap bd-highlight" value="{{$mesa->MesaId}}">{{$mesa->MesaId}}</option>
                                    @endforeach
                                </select>
                                </label>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="float-left text-secondary form-check-label" for="addproduct"> Filtrar Productos </label>
                                <button type="button" id="addproduct" class="btn btn-primary w-100">Agregar producto</button>
                            </div>
                            {{-- <div class="form-group col-md-2">
                                <label class="float-left text-secondary form-check-label" for="scanButton"> Codigo QR/Barra </label>
                                <button type="button" class="btn btn-primary w-100" id="scanButton"> Escanear</button>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card my-2 col-sm-12">
                        <div class="card-body" id="listadeproductos">
                            <div class="row" id="products0">
                                <div class="form-group col-md-2">
                                    <img width="100%" id="ProductoImageOutput0" class="card-img p-2 d-none d-md-block" src="{{asset('img/default-image.png')}}" alt="Card image cap">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="float-left text-secondary form-check-label" for="inputGroupSelect02">Producto</label>
                                    <div class="input-group" id="inputGroupSelect02">
                                        <div class="input-group-prepend">
                                            <button onclick="borrarproducto(0)" class="btn btn-outline-danger" type="button">Borrar</button>
                                        </div>
                                        <select onchange="updateproductdata(0)" required class="select2 form-control" id="productsSelect0" name="fk_producto[]">
                                            <option disabled class="text-nowrap bd-highlight" value="" selected>Seleccione el Producto...</option>
                                            @foreach ($productos as $producto)
                                            <option class="text-nowrap bd-highlight" value="{{$producto->ProductoId}}">{{$producto->ProductoNombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="float-left text-secondary form-check-label" for="inputGroup03">Cantidad</label>
                                    <div class="input-group" id="inputGroup03">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">#</span>
                                        </div>
                                        <input required name="compraCantidad[]" id="compraCantidad0" type="number" min="1" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="float-left text-secondary form-check-label" for="inputGroup04">Precio</label>
                                    <div class="input-group" id="inputGroup04">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">$</span>
                                        </div>
                                        <input disabled id="compraPrecio0" type="text" class="form-control" placeholder="Precio" aria-label="Precio" aria-describedby="basic-addon1" min="0" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row flex-row bg-white d-flex p-4">
        </div>

    </form>

</div>
@endsection

@push('scripts')
{{-- toastr --}}
<script src="{{asset('js/toastr.js')}}"></script>

{{-- select2 --}}
<script src="{{asset('js/select2.js')}}"></script>

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
    var buttonsubmit = $('#addProduct');
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
        $('input[name="_token"]').val(token);
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var productcounter = 0;
        $('#addproduct').on("click", function(e) {
            var buttonsubmit = $('#addProduct');
            var proveedor = $('#selectProveedor').val();

            productcounter = ++productcounter;

            $('#listadeproductos').prepend(`
                <div class="row" id="products`+productcounter+`">
                    <div class="form-group col-md-2">
                        <img width="100%" id="ProductoImageOutput`+productcounter+`" class="card-img p-2 d-none d-md-block" src="{{asset('img/default-image.png')}}" alt="Card image cap">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="float-left text-secondary form-check-label" for="inputGroupSelect`+productcounter+`2">Producto</label>
                        <div class="input-group" id="inputGroupSelect`+productcounter+`2">
                            <div class="input-group-prepend">
                                <button onclick="borrarproducto(`+productcounter+`)" class="btn btn-outline-danger" type="button">Borrar</button>
                            </div>
                            <select onchange="updateproductdata(`+productcounter+`)" required class="form-control select2" id="productsSelect`+productcounter+`" name="fk_producto[]">
                                <option class="text-nowrap bd-highlight" value="" selected>Seleccione el Producto...</option>
                                @foreach ($productos as $producto)
                                <option class="text-nowrap bd-highlight" value="{{$producto->ProductoId}}">{{$producto->ProductoNombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="float-left text-secondary form-check-label" for="inputGroup`+productcounter+`3">Cantidad</label>
                        <div class="input-group" id="inputGroup`+productcounter+`3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">#</span>
                            </div>
                            <input id="compraCantidad`+productcounter+`" required name="compraCantidad[]" type="number" class="form-control" placeholder="Cantidad" aria-label="Cantidad" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="float-left text-secondary form-check-label" for="inputGroup`+productcounter+`4">Precio</label>
                        <div class="input-group" id="inputGroup`+productcounter+`4">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input disabled id="compraPrecio`+productcounter+`" type="text" class="form-control" placeholder="Precio" aria-label="Precio" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
            `);
            activarSelec2();
            e.preventDefault();
        });
    });

    function borrarproducto(id){
        $("#products"+id).slideUp( "slow", function() {
            $("#products"+id).remove();
        });
    }
    function reiniciarventa(){
        $("#listadeproductos").empty();
    }
    function updateproductdata(contador){
        var select = $('#productsSelect'+contador);
        var id = select.val();
        var compraPrecio = $('#compraPrecio'+contador);
        var compraCantidad = $('#compraCantidad'+contador);
        var compraImage = $('#ProductoImageOutput'+contador);

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
                // disablesearhbutton();
                // productoNombre.empty();
                // productoDescripcion.empty();
            },
            success: function(data, textStatus, jqXHR) {
                renewtoken(data.newtoken);
                switch (jqXHR['status']) {
                    case 200:
                        compraPrecio.val(data.producto.ProductoPrecio);
                        compraCantidad.attr('min', 1);
                        compraCantidad.attr('max', data.producto.ProductoCantidad);
                        // compraCantidad.attr('placeholder', data.producto.ProductoCantidad);
                        if (data.producto.ProductoImage == 'img/default-image.png') {
                        compraImage.attr('src', '/img/default-image.png');
                        }else{
                        compraImage.attr('src', data.urlImage);
                        }
                        toastr.success(data['message']);
                        break;

                    default:
                        toastr.error(data['message']);
                        break;
                }
            },
            error: function(xhr, textStatus, jqXHR){
                renewtoken(xhr.newtoken);
                xhr.responseJSON.errors.id.forEach( errormessage => {
                    toastr.error(errormessage);
                });
                compraPrecio.val(0);
                compraCantidad.attr('max', 0);
                compraImage.attr('src', 'http://rumbabar.test/img/default-image.png');
            },
            complete: function(){

            }
        });
        // e.preventDefault();
    }
    function activarSelec2(){
        $('.select2').select2({
            theme: 'bootstrap4',
        });
    }
    $(document).ready(function () {
        activarSelec2();
    });

</script>
@endpush