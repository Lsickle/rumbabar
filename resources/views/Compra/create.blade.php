@extends('layouts.adminApp')

@section('pagename')
Nueva Compra
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
@endsection

@section('header')
<div class="sticky-top px-3 mt-2">
    <div class="row bg-light">
        <div class="col">
            <p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Nueva Compra'}}</p>
        </div>
        <div class="col">
            <a class="float-right font-inter-700 text-secondary" href="{{route('home')}}"><i loading="lazy" width="30" height="30" class="d-inline-block align-center fab fa-rockrms fa-lg"></i>umbaBar</a>
        </div>
    </div>
</div>
@endsection

@section('container')
<div class="container shadow rounded border border-3 h-90 bg-white">
<form action="{{route('compras.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row justify-content-between py-2 my-2" id='comprasHeader'>
        <div class="col-12 my-2">
            <a href="{{route('compras.index')}}" class="float-left btn btn-info text-white font-inter-600" style="font-size:12px;">Volver</a>
            <input type="submit" value="+ Guardar" class="float-right btn btn-success text-white font-inter-600" style="font-size:12px;">
        </div>
    </div>

    <div class="row bg-local">
        <div class="col">
            <div class="row m-2">
                <div class="card col-sm-12">
                    <div class="card-body row">
                        <div class="form-group col-md-8">
                            <label class="float-left text-secondary form-check-label" for="selectProveedor">Proveedor</label>
                            <select required onchange="reiniciarcompra()" class="form-control" id="selectProveedor" name="fk_proveedor">
                                <option class="text-nowrap bd-highlight" selected value="">Seleccion el Proveedor...</option>
                                @foreach ($proveedores as $proveedor)
                                <option class="text-nowrap bd-highlight" value="{{$proveedor->ProveedorId}}">{{$proveedor->ProveedorNombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="float-left text-secondary form-check-label" for="addproduct">  Filtrar Productos </label>
                            <button type="button" id="addproduct" class="btn btn-primary w-100">Agregar producto</button>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="float-left text-secondary form-check-label" for="scanButton"> Codigo QR/Barra </label>
                            <button type="button" class="btn btn-primary w-100" id="scanButton"> Escanear</button>
                        </div>
                    </div>
                </div>
                <div class="card my-2 col-sm-12">
                    <div class="card-body" id="listadeproductos">
                        <div class="row" id="products0">
                            <div class="form-group col-md-2">
                                <img width="100%" id="ProductoImageOutput0" class="card-img p-2 d-none d-md-block" src="{{asset('img/default-image.png')}}" alt="Card image cap">
                            </div>
                            <div class="form-group col-md-8">
                                <label class="float-left text-secondary form-check-label" for="inputGroupSelect02">Producto</label>
                                <div class="input-group" id="inputGroupSelect02">
                                    <div class="input-group-prepend">
                                        <button onclick="borrarproducto(0)" class="btn btn-outline-danger" type="button">Borrar</button>
                                    </div>
                                    <select required class="form-control" id="productsSelect0" name="fk_producto[]">
                                        <option class="text-nowrap bd-highlight" value="" selected>Producto...</option>
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
                                    <input required name="compraCantidad[]" type="number" class="form-control" placeholder="Cantidad" aria-label="Cantidad" aria-describedby="basic-addon1" min="0" value="0">
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
<script>
    $(document).ready(function(){
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

        $.ajax({
            url: "/filterproducts",
            method: 'GET',
            data: {
                'proveedor': proveedor,
            },
            beforeSend: function(){
                buttonsubmit.disabled = true;
                buttonsubmit.prop('disabled', true);
            },
            success: function(data, textStatus, jqXHR) {
                renewtoken(data.newtoken);
                console.log(data);
                switch (jqXHR['status']) {
                    case 200:
                        productcounter=productcounter+1;
                        toastr.success(data['message']);
                        $('#listadeproductos').prepend(`
                            <div class="row" id="products`+productcounter+`">
                                <div class="form-group col-md-2">
                                    <img width="100%" id="ProductoImageOutput`+productcounter+`" class="card-img p-2 d-none d-md-block" src="{{asset('img/default-image.png')}}" alt="Card image cap">
                                </div>
                                <div class="form-group col-md-8">
                                    <label class="float-left text-secondary form-check-label" for="inputGroupSelect`+productcounter+`2">Producto</label>
                                    <div class="input-group" id="inputGroupSelect`+productcounter+`2">
                                        <div class="input-group-prepend">
                                            <button onclick="borrarproducto(`+productcounter+`)" class="btn btn-outline-danger" type="button">Borrar</button>
                                        </div>
                                        <select required class="form-control" id="productsSelect`+productcounter+`" name="fk_producto[]">
                                            <option class="text-nowrap bd-highlight" value="" selected>Producto...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="float-left text-secondary form-check-label" for="inputGroup`+productcounter+`3">Cantidad</label>
                                    <div class="input-group" id="inputGroup`+productcounter+`3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">#</span>
                                        </div>
                                        <input required name="compraCantidad[]" type="number" class="form-control" placeholder="Cantidad" aria-label="Cantidad" aria-describedby="basic-addon1" min="0" value="0">
                                    </div>
                                </div>
                            </div>
                        `);
                        data.productos.forEach(element => {
                            $('#productsSelect'+productcounter).append(`
                                <option class="text-nowrap bd-highlight" value="`+element.ProductoId+`">`+element.ProductoNombre+`</option>
                            `);
                        });

                        break;

                    default:
                        toastr.error(data['message']);
                        break;
                }
            },
            error: function(xhr, textStatus, jqXHR){
                renewtoken(xhr.newtoken);
                xhr.responseJSON.errors.proveedor.forEach( errormessage => {
                    toastr.error(errormessage);
                });
            },
            complete: function(){
                buttonsubmit.disabled = false;
                buttonsubmit.prop('disabled', false);
            }
        });
        e.preventDefault();
    });
});

function borrarproducto(id){
    $("#products"+id).remove();
}
function reiniciarcompra(){
    $("#listadeproductos").empty();
}

</script>
@endpush