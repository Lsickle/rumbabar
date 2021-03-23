@extends('layouts.adminApp')

@section('pagename')
Nuevo Cliente
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
@endsection

@section('header')
<div class="sticky-top px-3 mt-2">
    <div class="row bg-light">
        <div class="col">
            <p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Nuevo Cliente'}}</p>
        </div>
        <div class="col">
            <a class="float-right font-inter-700 text-secondary" href="{{route('home')}}"><i loading="lazy" width="30" height="30" class="d-inline-block align-center fab fa-rockrms fa-lg"></i>umbaBar</a>
        </div>
    </div>
</div>
@endsection

@section('container')
<div class="container shadow rounded border border-3 h-90 bg-white">

<form action="{{route('clientes.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row justify-content-between py-2 my-2" id='clientesHeader'>
        <div class="col-6 my-2 col-md-2 d-flex">
            {{-- <div class="input-group">
                <select class="btn btn-outline-secondary" id="inputGroupSelect02" type="button" name="fk_proveedor">
                    <option class="text-nowrap bd-highlight" name="fk_proveedor" selected>Proveedor...</option>
                    @foreach ($proveedores as $proveedor)
                    <option class="text-nowrap bd-highlight" value="{{$proveedor->ProveedorId}}">{{$proveedor->ProveedorNombre}}</option>
                    @endforeach
                </select>
            </div> --}}
        </div>
        <div class="col-6 my-2 col-md-4">
            <input type="submit" value="+ Guardar" class="float-right btn btn-primary text-white font-inter-600" style="font-size:12px;">
        </div>
    </div>

    <div class="row bg-local">
        <div class="col">
            <div class="row m-2">
                <div class="card col-sm-12">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                                </div>
                                <input required name="ClienteNombre" type="text" class="form-control" placeholder="nombre" aria-label="nombre" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">#</span>
                                </div>
                                <input name="ClienteDocumento" type="number" class="form-control" placeholder="Documento" aria-label="Documento" aria-describedby="basic-addon1">
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