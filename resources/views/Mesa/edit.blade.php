@extends('layouts.adminApp')

@section('pagename')
Actualizar Mesa
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
@endsection

@section('header')
<div class="sticky-top px-3 mt-2">
    <div class="row bg-light">
        <div class="col">
            <p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Actualizar Mesa'}}</p>
        </div>
        <div class="col">
            <a class="float-right font-inter-700 text-secondary" href="{{route('home')}}"><i loading="lazy" width="30" height="30" class="d-inline-block align-center fab fa-rockrms fa-lg"></i>umbaBar</a>
        </div>
    </div>
</div>
@endsection

@section('container')
<div class="container shadow rounded border border-3 h-90 bg-white">
    <form action="{{route('mesas.update', ['mesa' => $mesa])}}" method="POST" id="createMesaForm">
        @method('PUT')
        @csrf
        <div class="row justify-content-between py-2 my-2" id='mesasCreateHEader'>
            <div class="col-6 my-2 col-md-2 d-flex">
                <div class="input-group">
                    <select class="btn btn-outline-secondary" id="inputGroupSelect02" type="button">
                        <option class="text-nowrap bd-highlight" name="fk_local" selected>Local...</option>
                        <option class="text-nowrap bd-highlight" value="1">local 1</option>
                        <option class="text-nowrap bd-highlight" value="2">local 2</option>
                        <option class="text-nowrap bd-highlight" value="3">local 3</option>
                    </select>
                </div>
            </div>
            <div class="col-6 my-2 col-md-4">
                <input type="submit" class="float-right btn btn-primary text-white font-inter-600" style="font-size:12px;" value="+ Actualizar">
            </div>
        </div>
        <div class="row bg-local">
            <div class="col">
                <div class="row m-2">
                    <div class="card col">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="MesaPuestos"><b>Número de Puestos (Mesa #{{$mesa->MesaId}})</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">#</span>
                                    </div>
                                    <input value="{{$mesa->MesaPuestos}}" id="MesaPuestos" name="MesaPuestos" type="number" class="form-control" placeholder="Número de Puestos" aria-label="Número de Puestos" aria-describedby="basic-addon1">
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