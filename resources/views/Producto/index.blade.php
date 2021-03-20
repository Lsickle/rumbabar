@extends('layouts.adminApp')

@section('pagename')
Lista de Productos
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
@endsection

@section('header')
<div class="sticky-top px-3 mt-2">
    <div class="col">
        <p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Lista de Productos'}}</p>
    </div>
    <div class="col">
        <a class="float-right font-inter-700 text-secondary" href="{{route('home')}}"><i loading="lazy" width="30" height="30" class="d-inline-block align-center fab fa-rockrms fa-lg"></i>umbaBar</a>
    </div>
</div>
@endsection

@section('container')
<div class="container shadow rounded border border-3 h-90 bg-white">
    <div class="row justify-content-between py-2 my-2" id='mesaslistHeader'>
        <div class="col-12 col-sm-2 d-flex justify-content-between">
            <button class="btn btn-outline-secondary dropdown">
                <div class="text-nowrap bd-highlight">
                    <i class="fas fa-filter"></i> Filtro
                </div>
            </button>
            <a href="{{route('productos.create')}}" class="btn text-white font-inter-600" style="background-color:#6D5BD0; font-size:12px;"><b>CREAR</b></a>
        </div>
        <div class="col-12 col-sm-5 my-sm-0 my-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                </div>
                <input id="inputsearchProduct" type="text" class="form-control" placeholder="Buscar" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table id="productsTable" class="table table-hover table-sm text-left mb-0" style="color:#6E6893 !important;">
                <thead class="font-inter-600" style="background-color: #F4F2FF;">
                    <tr>
                        <th id="th-1" scope="col">#</th>
                        <th id="th-3" scope="col">NOMBRE</th>
                        <th id="th-4" scope="col">PRECIO</th>
                        <th id="th-4" scope="col" class="text-center" >CANTIDAD</th>
                        <th id="th-4" scope="col">ACTUALIZACION</th>
                        <th id="th-7" scope="col" class="text-right">EDITAR</th>
                        <th id="th-7" scope="col" class="text-right">ELIMINAR</th>
                        <th id="th-8" scope="col"></th>
                        <th id="th-9" scope="col"><i class="fas fa-ellipsis-v"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                    <tr>
                        <th class="align-middle" scope="row">#{{$producto->ProductoId}}</th>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                <div class="text-dark">{{$producto->ProductoNombre}}</div>
                            </div>
                        </td>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                <div class="text-dark">${{$producto->ProductoPrecio}}</div>
                            </div>
                        </td>
                        <td class="align-middle text-center" scope="col">
                            <div class="text-nowrap">
                                <div class="text-dark">{{$producto->ProductoCantidad}}</div>
                            </div>
                        </td>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                Fecha : {{$producto->updated_at}}
                                <br>
                                <span class="badge badge-pill badge-local">
                                    • Local
                                </span>
                            </div>
                        </td>
                        <td class="align-middle text-right" scope="col">
                            <a href="{{route('mesas.edit', ['mesa' => $producto->ProductoId])}}" class="btn btn-sm btn-warning">
                                <div class="text-nowrap">Editar</div>
                            </a>
                        </td>
                        <td class="align-middle text-right" scope="col">
                            <form method="POST" id="formDestroy{{$producto->ProductoId}}" action="{{route('productos.destroy', ['producto' => $producto->ProductoId])}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-sm btn-danger text-nowrap" value="Eliminar">
                            </form>
                        </td>
                        <td class="align-middle" scope="col">
                        </td>
                        <td class="align-middle" scope="col"><i class="fas fa-ellipsis-v"></i></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row flex-row d-flex" style="background-color: #F4F2FF; color:#6E6893 !important;">
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
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        // $("button").click(function(){
        //     $("p").slideToggle();
        // });
        console.log('hola');
        $("#inputsearchProduct").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#productsTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
@endsection