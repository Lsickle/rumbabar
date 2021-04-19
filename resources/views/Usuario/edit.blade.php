@extends('layouts.adminApp')

@section('pagename')
Editar Usuario
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
@endsection

@section('header')
<div class="sticky-top px-3 mt-2">
    <div class="row bg-light">
        <div class="col">
            <p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Editar Usuario'}}</p>
        </div>
        <div class="col">
            <a class="float-right font-inter-700 text-secondary" href="{{route('home')}}"><i loading="lazy" width="30" height="30" class="d-inline-block align-center fab fa-rockrms fa-lg"></i>umbaBar</a>
        </div>
    </div>
</div>
@endsection

@section('container')
<div class="container shadow rounded border border-3 h-90 bg-white">
    <form action="{{route('usuarios.update',[$usuario])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row justify-content-between py-2 my-2" id='rolesHeader'>
            <div class="col-12 my-2">
                <a href="{{route('usuarios.index')}}" class="float-left btn btn-info text-white font-inter-600" style="font-size:12px;">Volver</a>
                <input type="submit" value="+ Guardar" class="float-right btn btn-primary text-white font-inter-600" style="font-size:12px;">
            </div>
        </div>
        <div class="row bg-local">
            <div class="col">
                <div class="row m-2">
                    <div class="card col-sm-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name" class="float-left text-secondary form-check-label">Nombre de Usuario</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                                            </div>
                                            <input required value="{{$usuario->name}}" id="name" name="name" type="text" class="form-control" placeholder="nombre" aria-label="nombre" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="float-left text-secondary form-check-label" for="inputGroupSelect02">Rol</label>
                                        <select class="form-control" id="inputGroupSelect02" name="fk_rol">
                                            <option class="text-nowrap bd-highlight" selected>Roles...</option>
                                            @foreach ($roles as $rol)
                                            <option {{$usuario->fk_rol === $rol->RolId ? 'selected' : '' }}class="text-nowrap bd-highlight" value="{{$rol->RolId}}">{{$rol->RolNombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="float-left text-secondary form-check-label">Correo</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">@</span>
                                            </div>
                                            <input required value="{{$usuario->email}}" id="email" name="email" type="email" class="form-control" placeholder="email" aria-label="email" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="float-left text-secondary form-check-label">Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">#</span>
                                            </div>
                                            <input required id="password" name="password" type="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password-confirm" class="float-left text-secondary form-check-label">Confirmacion Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">#</span>
                                            </div>
                                            <input required id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon1" autocomplete="new-password">
                                        </div>
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
<script src="{{ asset('js/scriptspersonalizados.js')}}"></script>
<script>
    $(document).ready(function(){
        // $("button").click(function(){
        //     $("p").slideToggle();
        // });
        console.log('hola');
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
@endpush