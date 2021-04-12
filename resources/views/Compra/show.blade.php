@extends('layouts.adminApp')

@section('pagename')
Compra #{{$compra->CompraId}}
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
@endsection

@section('header')
<div class="sticky-top px-3 my-2">
	<div class="row bg-light align-items-center">
		<div class="col">
			{{-- <p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Registro de compra'}}</p> --}}
			<a class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;" href="#">{{'Compra #'.$compra->CompraId}}</a>
		</div>
		<div class="col">
			<a class="float-right font-inter-700 text-secondary" href="{{route('home')}}"><i loading="lazy" width="30" height="30" class="d-inline-block align-center fab fa-rockrms fa-lg"></i>umbaBar</a>
		</div>
	</div>
</div>
@endsection

@section('container')
<div class="container shadow rounded border border-3 h-90 bg-white">
	<div class="row justify-content-between py-2 my-2" id='ventasHeader'>
		<div class="col-md-6 my-2">
			<button class="w-100 text-nowrap bd-highlight btn btn-outline-secondary" type="button">
				<i class="fas fa-caret-down"></i> Proveedor: {{$compra->proveedor->ProveedorNombre}}
			</button>
		</div>
		<div class="my-2 col-md-6">
			<div class="form-group w-100">
				<select onchange="showProduct()" class="form-control select2" id="selectProducto">
					<option class="text-nowrap bd-highlight" selected value="">Seleccion el Producto...</option>
					@foreach ($compra->proveedor->productos as $producto)
					<option class="text-nowrap bd-highlight" value="{{$producto->ProductoId}}">{{$producto->ProductoNombre}}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="row bg-local ">
		<div class="col">
			<div class="card my-2">
				<div class="card-body">
					<div class="row">
						<div class="col-md-3"><img id="SetProductoImage" class="card-img" src="https://picsum.photos/300/200?text=Image cap" alt="Card image cap"></div>
						<div class="col-md-3">
							<div class="form-group pt-2 pt-sm-0">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
									</div>
									<input disabled id="SetProductoCodigo" type="number" class="form-control" placeholder="Codigo" aria-label="Codigo" aria-describedby="basic-addon1">
								</div>
							</div>
							<p class="card-tittle text-left"><b id="SetProductoNombre">Jugo 1.5 Lt.</b></p>
							<p class="card-text text-left" id="SetProductoDescripcion">Botella de 1.5 Lt Sabor Mango</p>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<div class="input-group">
									<input id="SetProductoCantidad" type="number" class="form-control" placeholder="Cantidad" aria-label="Cantidad" aria-describedby="basic-addon1" min="1">
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<div class="input-group">
									<input disabled id="SetProductoPrecio" type="text" class="form-control" placeholder="Precio" aria-label="Precio" aria-describedby="basic-addon1">
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<div>
								<form action="{{route('compras.destroy', ['compra'=>$compra])}}" method="POST">
									@method('DELETE')
									@csrf
									<button type="submit" class="btn btn-block btn-danger text-white font-inter-600" style="font-size:12px;"><b><i class="fas fa-trash-alt"></i> Borrar Compra</b></button>
								</form>
							</div>
							<br>
							<div>
								<button onclick="addToCompra()" type="button" class="btn btn-block btn-success text-white font-inter-600" style="font-size:12px;"><b>$ Añadir Producto</b></button>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="row flex-row d-flex p-2">
		<div class="table-responsive">
			<table id="productsCompraTable" class="table table-hover table-sm text-left mb-0 w-100" style="color:#6E6893 !important;">
				<thead class="font-inter-600" style="background-color: #F4F2FF;">
					<tr>
						<th id="th-1" scope="col">Producto</th>
						<th id="th-2" scope="col" class="text-center">Cantidad</th>
						<th id="th-3" scope="col" class="text-center">Precio unidad</th>
						<th id="th-4" scope="col" class="text-center">SubTotal</th>
						<th id="th-5" scope="col">Restar</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($compra->productos as $producto)
					<tr id="productRow{{$producto->ProductoId}}">
						<td id="ProductoId{{$producto->ProductoId}}" class="align-middle text-nowrap text-dark" scope="row">
							{{$producto->ProductoNombre}}
						</td>
						<td id="compraCantidad{{$producto->ProductoId}}" class="align-middle text-nowrap text-dark">
							{{$producto->pivot->compraCantidad}}
						</td>
						<td class="align-middle text-nowrap text-dark">
							$ {{number_format($producto->ProductoPrecio, 2, '.', ',')}}
						</td>
						<td id="compraSubtotal{{$producto->ProductoId}}" class="align-middle text-nowrap text-dark">
							$ {{number_format($producto->pivot->compraSubtotal, 2, '.', ',')}}
						</td>
						<td class="align-middle text-dark" style="width: 15%;">
							<div class="input-group">
								<input id="restarCantidad{{$producto->ProductoId}}" type="number" step="1" class="form-control" placeholder="0" aria-label="#" value="1">
								<div class="input-group-append">
									<button onclick="dropToCompra({{$producto->ProductoId}})" class="btn btn-outline-danger" type="button">Restar</button>
								</div>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th id="th-1" scope="col">Producto</th>
						<th id="th-2" scope="col">Cantidad</th>
						<th id="th-3" scope="col">Precio unidad</th>
						<th id="th-4" scope="col">SubTotal</th>
						<th id="th-5" scope="col">Restar</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
@endsection

@push('scripts')
{{-- toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

{{-- jszip --}}
<script src="{{asset('js/jszip.js')}}"></script>

{{-- pdfmake --}}
<script src="{{asset('js/pdfmake.js')}}"></script>

{{-- datatables --}}
<script src="{{asset('js/datatables-bs4.js')}}"></script>
<script src="{{asset('//cdn.datatables.net/plug-ins/1.10.24/api/sum().js')}}"></script>



<script>
	$(document).ready(function() {
		/*var rol defino el rol del usuario*/
		var rol = "<?php echo Auth::user()->fk_rol; ?>";
		/*var botoncito define los botones que se usaran si el usuario es programador*/
		var botoncito = (rol == 1) ? [{extend: 'colvis', text: 'Columnas'}, {extend: 'copy', text: 'Copiar'}, {extend: 'excel', text: 'Excel'}, {extend: 'pdf', text: 'Pdf'}, {extend: 'collection', text: 'Selector', buttons: ['selectRows', 'selectCells']}] : [{extend: 'colvis', text: 'Columnas'}, {extend: 'excel', text: 'Excel'}];
		/*inicializacion de datatable general*/
		$('#productsCompraTable').DataTable({
			"dom":"<'row justify-content-between pt-3 pb-0'<l><'text-center d-none d-md-block'B><f>>" +
				"<'row'<'col-md-12'rt>>" +
				"<'row pt-0 pb-3 justify-content-center justify-content-md-between'<'align-self-center'i><''p>>",
			"scrollX": false,
			"serverSide": false,
			"autoWidth": false,
			"select": true,
			"colReorder": true,
			"ordering": true,
			"order": [0, 'desc'],
			"searchHighlight": true,
			"responsive": true,
			"keys": true,
			"lengthChange": true,
			"searching": true,
			"buttons": [
				botoncito
			],
			"language": {
				"sProcessing":     "Procesando...",
				"sLengthMenu":     "_MENU_ Filas",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "_START_ al _END_ de _TOTAL_",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered":   "",
				"sInfoPostFix":    "",
				"sSearch":         "_INPUT_",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "->",
					"sPrevious": "<-"
				},

				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				},
				"colvis": 'Columnas Visibles',
				"columnDefs": [
					{ "width": "20%", "targets": 4 }
				],
			},
			"createdRow": function (row, data, index) {
				$('td', row).eq(0).addClass('align-middle text-nowrap text-dark');//add style to cell in third column
				$('td', row).eq(1).addClass('align-middle text-nowrap px-3 text-right text-dark');
				$('td', row).eq(2).addClass('align-middle text-nowrap px-3 text-right text-dark');
				$('td', row).eq(3).addClass('align-middle text-nowrap px-3 text-right text-dark');
				$('td', row).eq(4).addClass('align-middle text-dark');
				$('td', row).eq(4).css('width', '15%');
			},
			"drawCallback": function () {
				var api = this.api();
				$( api.table().footer() ).html(
					`<th  scope="col" colspan="3">TOTAL</th>
					<th  scope="col" class="pr-3 text-right">`+formatter.format(api.column( 3, {filter:'applied'} ).data().sum())+`</th>
					<th  scope="col" colspan="2"></th>`
				);
			}
		});
	});
	/*funcion para actualizar elplugin responsive in chrome*/
	function recalcularwitdth() {
		var table = $('#productsCompraTable').DataTable();
		table.columns.adjust();
		table.responsive.recalc();
	// console.log('tabla recalculada');
	}
	$(document).ready(function () {
		var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
		// la funcion se ejecuta unicaente en chrome
		if(is_chrome)
		{
			setTimeout(recalcularwitdth, 100);
		}
	});
</script>

<script type="text/javascript">
	toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "150",
        "hideDuration": "500",
        "timeOut": "3000",
        "extendedTimeOut": "1500",
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
	function borrarproducto(id){
		$("#products"+id).remove();
	}
	function reiniciarcompra(){
		$("#listadeproductos").empty();
	}

	function showProduct(){
		var select = $('#selectProducto');
		var id = select.val();

		var productoNombre = $("#SetProductoNombre");
		var productoDescripcion = $('#SetProductoDescripcion');
		var ProductoPrecio = $('#SetProductoPrecio');
		var ProductoCantidad = $('#SetProductoCantidad');
		var ProductoCodigo = $('#SetProductoCodigo');
		var ProductoImage = $('#SetProductoImage');

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
				ProductoPrecio.val(data.producto.ProductoPrecio.toLocaleString('es-CO', { style: 'currency', currency: 'COP' }));
				ProductoCantidad.val(1);
				ProductoCantidad.attr('min', 0);
				ProductoCodigo.val(data.producto.ProductoCodigo);
				if (data.producto.ProductoImage == 'img/default-image.png') {
					ProductoImage.attr('src', '/img/default-image.png');
				}else{
					ProductoImage.attr('src', data.urlImage);
				}
				// enablesearhbutton();
			},
			error: function(xhr, textStatus, jqXHR){
				renewtoken(xhr.newtoken);
				xhr.responseJSON.errors.id.forEach( errormessage => {
					toastr.error(errormessage);
				});
				productoNombre.html('no existe');
				productoDescripcion.html('producto no encontrado');
				// enablesearhbutton();
			},
			complete: function(){

			}
		});
	}

	function addToCompra(){
		var select = $('#selectProducto');
		var id = select.val();

		var productoNombre = $("#SetProductoNombre");
		var productoDescripcion = $('#SetProductoDescripcion');
		var ProductoPrecio = $('#SetProductoPrecio');
		var ProductoCantidad = $('#SetProductoCantidad');
		var ProductoCodigo = $('#SetProductoCodigo');
		var ProductoImage = $('#SetProductoImage');

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: "{{route('addProductCompra', ['compra' => $compra])}}",
			method: 'PUT',
			data: {
				'id': id,
				'compraCantidad': ProductoCantidad.val(),
				},
			beforeSend: function(){
				// disablesearhbutton();
				// productoNombre.empty();
				// productoDescripcion.empty();
			},
			success: function(data, textStatus, jqXHR) {
				renewtoken(data.newtoken);
				switch (jqXHR['status']) {
					case 200:
						toastr.success(data['message']);
						if ($( "#productsCompraTable" ).has( "tbody tr #ProductoId"+data.producto.ProductoId ).length) {

							$('#compraCantidad'+data.producto.ProductoId).text(data.producto.CantidadComprada);
							$('#compraSubtotal'+data.producto.ProductoId).text(data.producto.subtotal.toLocaleString('es-CO', { style: 'currency', currency: 'COP' }));
						}else{
							var table = $('#productsCompraTable').DataTable();

							var rowAdded = table.row.add([
								data.producto.ProductoNombre,
								data.producto.CantidadComprada,
								"$ "+data.producto.ProductoPrecio,
								"$ "+data.producto.subtotal,
								`<div class="input-group">
									<input id="restarCantidad`+data.producto.ProductoId+`" type="number" step="1" class="form-control" placeholder="0" aria-label="#" value="1">
									<div class="input-group-append">
										<button onclick="dropToCompra(`+data.producto.ProductoId+`)" class="btn btn-outline-danger" type="button">Restar</button>
									</div>
								</div>`,
							]).node();
							rowAdded.id = "productRow"+data.producto.ProductoId;
							rowAdded.children[0].id="ProductoId"+data.producto.ProductoId;
							rowAdded.children[1].id="compraCantidad"+data.producto.ProductoId;
							rowAdded.children[3].id="compraSubtotal"+data.producto.ProductoId;
							rowAdded.children[0].style.background = "#a1ffeb";
							table.draw(false);
						}

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
				productoNombre.html('no existe');
				productoDescripcion.html('producto no encontrado');
				// enablesearhbutton();
			},
			complete: function(){

			}
		});
	}

	function dropToCompra(id){
		var ProductoCantidad = $('#compraCantidad'+id);
		var restarCantidad = $('#restarCantidad'+id);
		var compraSubtotal = $('#compraSubtotal'+id);
		var productRow = $('#productRow'+id);

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: "{{route('dropProductCompra', ['compra' => $compra])}}",
			method: 'PUT',
			data: {
				'id': id,
				'compraCantidad': restarCantidad.val(),
				},
			beforeSend: function(){

			},
			success: function(data, textStatus, jqXHR) {
				renewtoken(data.newtoken);
				switch (jqXHR['status']) {
					case 200:
						toastr.success(data['message']);

						if (data.producto.CantidadComprada > 0) {
							ProductoCantidad.text(data.producto.CantidadComprada);
							compraSubtotal.text(data.producto.subtotal.toLocaleString('es-CO', { style: 'currency', currency: 'COP' }));
						}else{
							var table = $('#productsCompraTable').DataTable();
							var row = table.row('#productRow'+id);
							row.remove();
							productRow.remove()
						}
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
			},
			complete: function(){

			}
		});
	}
	var formatter = new Intl.NumberFormat('en-US', {
	style: 'currency',
	currency: 'USD',
	maximumFractionDigits: 2,
	//maximumFractionDigits: 0,
	});
</script>
@endpush
