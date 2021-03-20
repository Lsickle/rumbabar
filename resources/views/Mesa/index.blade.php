@extends('layouts.adminApp')

@section('pagename')
Lista de Mesas
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
@endsection

@section('header')
<div class="sticky-top px-3 mt-2">
    <div class="col">
        <p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Nuevo Producto'}}</p>
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
            <a href="{{route('mesas.create')}}" class="btn text-white font-inter-600" style="background-color:#6D5BD0; font-size:12px;"><b>CREAR</b></a>
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
                <thead class="font-inter-600" style="background-color: #F4F2FF;">
                    <tr>
                        <th id="th-1" scope="col">#</th>
                        <th id="th-3" scope="col">PUESTOS</th>
                        <th id="th-4" scope="col">FECHA</th>
                        <th id="th-7" scope="col" class="text-right">EDITAR</th>
                        <th id="th-8" scope="col"></th>
                        <th id="th-9" scope="col"><i class="fas fa-ellipsis-v"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mesas as $mesa)
                    <tr>
                        <th class="align-middle" scope="row">#{{$mesa->MesaId}}</th>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                <div class="text-dark">{{$mesa->MesaPuestos}}</div>
                            </div>
                        </td>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                Fecha : {{$mesa->created_at}}
                                <br>
                                <span class="badge badge-pill badge-local">
                                    • Local
                                </span>
                            </div>
                        </td>
                        <td class="align-middle text-right" scope="col">
                            <a href="{{route('mesas.show', ['mesa' => $mesa->MesaId])}}" class="btn btn-sm btn-warning">
                                <div class="text-nowrap">Editar</div>
                            </a>
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
            <div class="text-left">filas por página: {{$mesas->count()}}</div>
        </div>
    
        <div class="col">
            <div class="text-right">
                <div class="mx-3">{{$mesas->firstItem()}}-{{$mesas->lastItem()}} of {{$mesas->total()}}</div>
                <a href="{{$mesas->url(1)}}"><i class="px-0 fas fa-angle-double-left"></i></a>
                <a href="{{$mesas->previousPageUrl()}}"><i class="px-1 fas fa-chevron-left"></i></a>
                <a href="{{$mesas->previousPageUrl()}}"><i class="px-1">{{$mesas->currentPage() > 1 ? $mesas->currentPage() - 1 : ''}}</i></a>
                <i class="px-0">{{$mesas->currentPage()}}</i>
                <a href="{{$mesas->nextPageUrl()}}"><i class="px-1">{{$mesas->currentPage() + 1}}</i></a>
                <a href="{{$mesas->nextPageUrl()}}"><i class="px-1 fas fa-chevron-right"></i></a>
                <a href="{{$mesas->url($mesas->lastPage())}}"><i class="px-0 fas fa-angle-double-right"></i></a>
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
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
@endsection