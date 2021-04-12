@extends('layouts.adminApp')

@section('pagename')
Venta {{$venta->VentaId}}
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('css/toastr.css')}}" />
@endsection

@section('header')
<div class="sticky-top px-3 mt-2">
	<div class="row bg-light">
		<div class="col">
			<p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Registro de venta'}}</p>
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
		<div class="col-6 col-md-2 d-flex justify-content-between">
			<div class="dropdown">
				<button disabled class="btn btn-secondary" type="button" id="dropdownMenuButton">
					<div class="text-nowrap bd-highlight">
						<i class="fas fa-caret-down"></i> Mesa {{$venta->fk_mesa}}
					</div>
				</button>
			</div>
		</div>
		<div class="col-6 col-md-3">
			<button class="float-right btn btn-success text-white font-inter-600" style="font-size:12px;"><b>$ Facturar</b></button>
		</div>
		<div class="col-md-3 my-sm-0 my-2">
			<div class="input-group">
				<div class="input-group-prepend">
					<button class="btn btn-primary" type="button"><i class="fas fa-user"></i></button>
				</div>
				<input disabled type="text" class="form-control" aria-describedby="basic-addon1" value="{{$venta->cliente->ClienteNombre}}">
			</div>
		</div>
	</div>
	<div class="row bg-local">
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
									<select onchange="showProduct()" class="form-control" id="selectProducto">
										<option class="text-nowrap bd-highlight" selected value="">Seleccion el Producto...</option>
										@foreach ($productos as $producto)
										<option class="text-nowrap bd-highlight" value="{{$producto->ProductoId}}">{{$producto->ProductoNombre}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<p class="card-tittle text-left"><b id="SetProductoNombre">Jugo 1.5 Lt.</b></p>
							<p class="card-text text-left" id="SetProductoDescripcion">Botella de 1.5 Lt Sabor Mango</p>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<div class="input-group">
									<input id="SetProductoCantidad" type="number" class="form-control" placeholder="Cantidad" aria-label="Cantidad" aria-describedby="basic-addon1">
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
								<form action="{{route('ventas.destroy', ['venta'=>$venta])}}" method="POST">
									@method('DELETE')
									@csrf
									<button type="submit" class="btn btn-block btn-danger text-white font-inter-600" style="font-size:12px;"><b><i class="fas fa-trash-alt"></i> Borrar Venta</b></button>
								</form>
							</div>
							<br>
							<div>
								<button disabled id="addButton" onclick="addToVenta()" type="button" class="btn btn-block btn-success text-white font-inter-600" style="font-size:12px;"><i id="addIcon" class="fas fa-plus"></i> <b> Añadir Producto</b></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="table-responsive">
			<table id="productsVentaTable" class="table table-hover table-sm text-left mb-0" style="color:#6E6893 !important;">
				<thead class="font-inter-600" style="background-color: #F4F2FF;">
					<tr>
						<th id="th-1" scope="col" class="">Producto</th>
						<th id="th-2" scope="col" class="text-center">Cantidad</th>
						<th id="th-4" scope="col" class="text-center">SubTotal</th>
						<th id="th-3" scope="col" class="text-center">Precio unidad</th>
						<th id="th-5" scope="col" class="text-center">Restar</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($venta->productos as $producto)
					<tr id="productRow{{$producto->ProductoId}}">
						<td id="ProductoId{{$producto->ProductoId}}" class="align-middle text-nowrap text-dark" scope="row">
							{{$producto->ProductoNombre}}
						</td>
						<td id="ventaCantidad{{$producto->ProductoId}}" class="align-middle text-nowrap px-3 text-right text-dark">
							{{$producto->pivot->ventaCantidad}}
						</td>
						<td id="ventaSubtotal{{$producto->ProductoId}}" class="align-middle text-nowrap px-3 text-right text-dark">
							$ {{number_format($producto->pivot->ventaSubtotal, 2, '.', ',')}}
						</td>
						<td class="align-middle text-nowrap px-3 text-right text-dark">
							$ {{number_format($producto->ProductoPrecio, 2, '.', ',')}}
						</td>
						<td class="align-middle text-dark" style="width: 15%;">
							<div class="input-group">
								<input id="restarCantidad{{$producto->ProductoId}}" type="number" step="1" class="form-control" placeholder="0" aria-label="#" value="1" min="1">
								<div class="input-group-append">
									<button onclick="dropToVenta({{$producto->ProductoId}})" class="btn btn-outline-danger" type="button">Restar</button>
								</div>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th id="tf-1" scope="col">Producto</th>
						<th id="tf-2" scope="col">Cantidad</th>
						<th id="tf-4" scope="col">SubTotal</th>
						<th id="tf-3" scope="col">Precio unidad</th>
						<th id="tf-5" scope="col">Restar</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
@endsection

@push('scripts')
{{-- toastr --}}
<script src="{{asset('js/toastr.js')}}"></script>
{{-- jszip --}}
<script src="{{asset('js/jszip.js')}}"></script>
{{-- pdfmake --}}
<script src="{{asset('js/pdfmake.js')}}"></script>

{{-- personalizados --}}
<script src="{{asset('js/scriptspersonalizados.js')}}"></script>

{{-- select2 --}}
{{-- <script src="{{asset('js/select2.js')}}"></script> --}}

{{-- datatables --}}
<script src="{{asset('js/datatables-bs4.js')}}"></script>
<script src="{{asset('//cdn.datatables.net/plug-ins/1.10.24/api/sum().js')}}"></script>


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
	$(document).ready(function() {
		/*var rol defino el rol del usuario*/
		var rol = "<?php echo Auth::user()->fk_rol; ?>";
		/*var botoncito define los botones que se usaran si el usuario es programador*/
		var botoncito = (rol == 1) ? [{extend: 'colvis', text: 'Columnas'}, {extend: 'copy', text: 'Copiar'}, {extend: 'excel', text: 'Excel'}, {extend: 'pdf', text: 'Pdf'}, {extend: 'collection', text: 'Selector', buttons: ['selectRows', 'selectCells']}] : [{extend: 'colvis', text: 'Columnas'}, {extend: 'excel', text: 'Excel'}];
		/*inicializacion de datatable general*/
		$('#productsVentaTable').DataTable({
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
					"sPrevious": "<-",
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				},
				"colvis": 'Columnas Visibles'

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
					`<th  scope="col" colspan="2">TOTAL</th>
					<th  scope="col" class="text-right pr-3">`+formatter.format(api.column( 2, {filter:'applied'} ).data().sum())+`</th>
					<th  scope="col" colspan="3"></th>`
				);
			}
		});
	});

	var formatter = new Intl.NumberFormat('en-US', {
	style: 'currency',
	currency: 'USD',
	maximumFractionDigits: 2,
	//maximumFractionDigits: 0,
	});
	/*funcion para actualizar elplugin responsive in chrome*/
	function recalcularwitdth() {
		var table = $('#productsVentaTable').DataTable();
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
            url: "{{route('addProductVenta', ['venta' => $venta])}}",
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

    function borrarproducto(id){
		$("#products"+id).remove();
	}

	function reiniciarventa(){
		$("#listadeproductos").empty();
	}

	function showProduct(){
		var select = $('#selectProducto');
		var id = select.val();
		var button = $('#addButton');

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
						button.attr('disabled', false);
						break;

					default:
						toastr.error(data['message']);
						break;
				}
				productoNombre.html(data.producto.ProductoNombre);
				productoDescripcion.html(data.producto.ProductoDescripcion);
				ProductoPrecio.val(data.producto.ProductoPrecio.toLocaleString('es-CO', { style: 'currency', currency: 'COP' }));
				ProductoCantidad.val(1);
				ProductoCantidad.attr('min', 1);
				ProductoCantidad.attr('max', data.producto.ProductoCantidad);
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

    function addToVenta(){
		var select = $('#selectProducto');
		var id = select.val();

		var productoNombre = $("#SetProductoNombre");
		var productoDescripcion = $('#SetProductoDescripcion');
		var ProductoPrecio = $('#SetProductoPrecio');
		var ProductoCantidad = $('#SetProductoCantidad');
		var ProductoCodigo = $('#SetProductoCodigo');
		var ProductoImage = $('#SetProductoImage');
		var button = $('#addButton');
		var icon = $('#addIcon');

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: "{{route('addProductVenta', ['venta' => $venta])}}",
			method: 'PUT',
			data: {
				'id': id,
				'ventaCantidad': ProductoCantidad.val(),
				},
			beforeSend: function(){
				// disablesearhbutton();
				// productoNombre.empty();
				// productoDescripcion.empty();
				icon.toggleClass( "fa-sync fa-spin fa-plus" );
				button.attr('disabled', true);
			},
			success: function(data, textStatus, jqXHR) {
				renewtoken(data.newtoken);
				switch (jqXHR['status']) {
					case 200:
						console.log(data)
						toastr.success(data['message']);
						if ($( "#productsVentaTable" ).has( "tbody tr #ProductoId"+data.producto.ProductoId ).length) {
							var table = $('#productsVentaTable').DataTable();
							$('#ventaCantidad'+data.producto.ProductoId).text(data.producto.CantidadVendida);
							$('#ventaSubtotal'+data.producto.ProductoId).text(data.producto.subtotal.toLocaleString('es-CO', { style: 'currency', currency: 'COP' }));

							table.draw();
						}else{
							var table = $('#productsVentaTable').DataTable();

							var rowAdded = table.row.add([
								data.producto.ProductoNombre,
								data.producto.CantidadVendida,
								"$ "+data.producto.subtotal,
								"$ "+data.producto.ProductoPrecio,
								`<div class="input-group">
									<input id="restarCantidad`+data.producto.ProductoId+`" type="number" step="1" class="form-control" placeholder="0" aria-label="#" value="1" min="1">
									<div class="input-group-append">
										<button onclick="dropToVenta(`+data.producto.ProductoId+`)" class="btn btn-outline-danger" type="button">Restar</button>
									</div>
								</div>`,
							]).node();
							rowAdded.id = "productRow"+data.producto.ProductoId;
							rowAdded.children[0].id="ProductoId"+data.producto.ProductoId;
							rowAdded.children[1].id="ventaCantidad"+data.producto.ProductoId;
							rowAdded.children[2].id="ventaSubtotal"+data.producto.ProductoId;
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
			},
			complete: function(){
				icon.toggleClass( "fa-sync fa-spin fa-plus" );
				button.attr('disabled', false);
			}
		});
	}

	function dropToVenta(id){
		var ProductoCantidad = $('#ventaCantidad'+id);
		var restarCantidad = $('#restarCantidad'+id);
		var ventaSubtotal = $('#ventaSubtotal'+id);
		var productRow = $('#productRow'+id);

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: "{{route('dropProductVenta', ['venta' => $venta])}}",
			method: 'PUT',
			data: {
				'id': id,
				'ventaCantidad': restarCantidad.val(),
				},
			beforeSend: function(){

			},
			success: function(data, textStatus, jqXHR) {
				renewtoken(data.newtoken);
				switch (jqXHR['status']) {
					case 200:
						toastr.success(data['message']);

						if (data.producto.CantidadRestada > 0) {
							ProductoCantidad.text(data.producto.CantidadRestada);
							ventaSubtotal.text(data.producto.subtotal.toLocaleString('es-CO', { style: 'currency', currency: 'COP' }));
						}else{
							var table = $('#productsVentaTable').DataTable();
							var row = table.row('#productRow'+id);
							row.remove();
							productRow.remove();
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
