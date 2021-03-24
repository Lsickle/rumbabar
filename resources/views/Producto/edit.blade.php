@extends('layouts.adminApp')

@section('pagename')
Editar Producto
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
@endsection

@section('header')
<div class="sticky-top px-3 mt-2">
	<div class="row bg-light">
		<div class="col">
			<p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Editar Producto'}}</p>
		</div>
		<div class="col">
			<a class="float-right font-inter-700 text-secondary" href="{{route('home')}}"><i loading="lazy" width="30" height="30" class="d-inline-block align-center fab fa-rockrms fa-lg"></i>umbaBar</a>
		</div>
	</div>
</div>
@endsection

@section('container')
<div class="container shadow rounded border border-3 h-90 bg-white">
	<form action="{{route('productos.update', ['producto'=> $producto])}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')

		<div class="row justify-content-between py-2 my-2" id='ventasHeader'>
			<div class="col-6 my-2 col-md-2 d-flex">
				<div class="input-group">
					<select class="btn btn-outline-secondary" id="inputGroupSelect02" type="button" name="fk_proveedor">
						<option class="text-nowrap bd-highlight" name="fk_proveedor" selected>Proveedor...</option>
						@foreach ($proveedores as $proveedor)
						<option class="text-nowrap bd-highlight" value="{{$proveedor->ProveedorId}}">{{$proveedor->ProveedorNombre}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-6 my-2 col-md-4">
				<input type="submit" value="+ Guardar" class="float-right btn btn-primary text-white font-inter-600" style="font-size:12px;">
			</div>
		</div>

		<div class="row bg-local">
			<div class="col">
				<div class="row m-2">
					<div class="card col-sm-6">
						<div class="card-body">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
									</div>
									<input required name="ProductoNombre" type="text" class="form-control" placeholder="nombre" aria-label="nombre" aria-describedby="basic-addon1">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">#</span>
									</div>
									<input name="ProductoCodigo" type="number" class="form-control" placeholder="Codigo" aria-label="Codigo" aria-describedby="basic-addon1">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">$</span>
									</div>
									<input name="ProductoPrecio" type="number" class="form-control" placeholder="precio" aria-label="precio" aria-describedby="basic-addon1">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<label class="text-secondary form-check-label" for="text">
										Descripcion del Producto
									</label>
									<textarea name="ProductoDescripcion" id="text" name="text" rows="4" cols="50" placeholder="descripcion" aria-label="descripcion" aria-describedby="basic-addon1">
															Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates culpa facilis deserunt repellendus, assumenda pariatur at est, et adipisci voluptate odio sint tempore molestias commodi suscipit molestiae aliquid nulla reiciendis?
														</textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="card col-sm-6">
						<div class="card-body">
							<div class="form-group">
								<label class=" float-left text-secondary form-check-label" for="imagen">
									Imagen del Producto
								</label>
								<div class="input-group">

									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-images"></i></span>
									</div>
									<input name="ProductoImage" id="ProductoImage" type="file" class="form-control" placeholder="imagen" aria-label="imagen" aria-describedby="basic-addon1">
								</div>
								<img width="100%" id="ProductoImageOutput" class="card-img p-2" src="{{asset('img/default-image.png')}}" alt="Card image cap">
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
@push('scripts')
<script src="{{ asset('js/scriptspersonalizados.js')}}"></script>
@endpush
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
@endsection