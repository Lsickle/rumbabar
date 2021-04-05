@extends('layouts.adminApp')

@section('pagename')
Lista de Productos
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />

@endsection

@section('header')
<div class="sticky-top px-3 mt-2">
	<div class="row bg-light">
		<div class="col">
			<p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Lista de Productos'}}</p>
		</div>
		<div class="col">
			<a class="float-right font-inter-700 text-secondary" href="{{route('home')}}"><i loading="lazy" width="30" height="30" class="d-inline-block align-center fab fa-rockrms fa-lg"></i>umbaBar</a>
		</div>
	</div>
</div>
@endsection

@section('container')
<div class="container shadow rounded border border-3 h-90 bg-white">
	<div class="row justify-content-between py-2 my-2" id='mesaslistHeader'>
		<div class="col-12 col-sm-2 d-flex justify-content-between">
			<button class="btn btn-outline-secondary dropdown" type="button" data-toggle="collapse" data-target=".collapse" aria-expanded="false" aria-controls="collapseExample">
				<div class="text-nowrap bd-highlight">
					<i class="fas fa-filter"></i> Filtros
				</div>
			</button>
			<a href="{{route('productos.create')}}" class="btn text-white font-inter-600" style="background-color:#6D5BD0; font-size:12px;"><b>CREAR</b></a>
		</div>
		<div class="col-12 col-sm-5 my-sm-0 my-2">
			{{-- <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
				</div>
				<input id="inputsearchProduct" type="text" class="form-control" placeholder="Buscar" aria-label="Username" aria-describedby="basic-addon1">
			</div> --}}
		</div>
	</div>
	<div class="row">
		<div class="col table-responsive">
			<table id="productsTable" class="table table-hover table-sm mb-0" style="color:#6E6893 !important;">
				<thead class="font-inter-600" style="background-color: #F4F2FF;">
					<tr>
						<th id="th-1" scope="col" class="text-center">#</th>
						<th id="th-2" scope="col" class="">NOMBRE</th>
						<th id="th-3" scope="col" class="text-center">PRECIO</th>
						<th id="th-4" scope="col" class="text-center">CANTIDAD</th>
						<th id="th-4" scope="col" class="text-center">PROVEEDOR</th>
						<th id="th-5" scope="col" class="text-center">ACTUALIZACION</th>
						<th id="th-6" scope="col" class="text-center">EDITAR</th>
						<th id="th-7" scope="col" class="text-center">ELIMINAR</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($productos as $producto)
					<tr>
						<th class="align-middle" scope="row">#{{$producto->ProductoId}}</th>
						<td class="align-middle" scope="col">
							{{$producto->ProductoNombre}}
						</td>
						<td class="align-middle text-nowrap text-dark" scope="col">
							{{ number_format($producto->ProductoPrecio, 2) }}
						</td>
						<td class="align-middle text-nowrap text-dark" scope="col">
							{{$producto->ProductoCantidad}}
						</td>
						<td class="align-middle text-nowrap text-dark" scope="col">
							{{$producto->proveedor->ProveedorNombre}}
						</td>
						<td class="align-middle text-nowrap text-dark" scope="col">
							{{$producto->updated_at}}
						</td>
						<td class="align-middle" scope="col">
							<a href="{{route('productos.edit', ['producto' => $producto->ProductoId])}}" class="btn btn-sm btn-warning">
								<div class="text-nowrap">Editar</div>
							</a>
						</td>
						<td class="align-middle" scope="col">
							<form method="POST" id="formDestroy{{$producto->ProductoId}}" action="{{route('productos.destroy', ['producto' => $producto->ProductoId])}}">
								@csrf
								@method('DELETE')
								<input type="submit" class="btn btn-sm btn-danger text-nowrap" value="Eliminar">
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@push('scripts')
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
{{-- toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

{{-- jszip --}}
<script src="{{asset('js/jszip.js')}}"></script>

{{-- pdfmake --}}
<script src="{{asset('js/pdfmake.js')}}"></script>

{{-- datatables --}}
<script src="{{asset('js/datatables-bs4.js')}}"></script>

<script>
	$(document).ready(function() {
		/*var rol defino el rol del usuario*/
		var rol = "<?php echo Auth::user()->fk_rol; ?>";
		/*var botoncito define los botones que se usaran si el usuario es programador*/
		var botoncito = (rol == 1) ? [{extend: 'colvis', text: 'Columnas'}, {extend: 'copy', text: 'Copiar'}, {extend: 'excel', text: 'Excel'}, {extend: 'pdf', text: 'Pdf'}, {extend: 'collection', text: 'Selector', buttons: ['selectRows', 'selectCells']}] : [{extend: 'colvis', text: 'Columnas'}, {extend: 'excel', text: 'Excel'}];
		/*inicializacion de datatable general*/
		$('#productsTable').DataTable({
			"dom":"<'row collapse'<'col-md-8'P><'col-md-4'<'card my-1'<'card-body'Q>>>>" +
				"<'row justify-content-between pt-3 pb-0'<l><'text-center d-none d-md-block'B><f>>" +
				"<'row'<'col-md-12'rt>>" +
				"<'row pt-0 pb-3 justify-content-center justify-content-md-between'<'align-self-center'i><''p>>",
			"searchPanes": {
				cascadePanes: true,
				layout: 'columns-1',
				columns: [4],
				count: '{total}',
				countFiltered: '{shown} / {total}',
				viewTotal: true,
				dtOpts: {
					select: {
						style: 'multi'
					}
				}
			},
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
				"colvis": 'Columnas Visibles'
			},
			"columnDefs": [
				{ "type": "num-fmt", "targets": [0,2,3]},
				{ "type": "date", "targets": [5]},
				{ "type": "html", "targets": '_all'},
				{ "orderable": false, "targets": [6,7] },
				{ "className": "text-right", "targets": [2,3,5]},
				{ "className": "text-left", "targets": [1]},
				// { "visible": false, "targets": [4]}
			],
            // "rowGroup": {
            //     endRender: null,
            //     startRender: function ( rows, group ) {


            //         var provedor = rows
            //             .data()
            //             .pluck(4)
            //             .reduce( function (a, b) {
            //                 return b;
            //             }, 0);

            //         return $('<tr/>')
            //             .append( '<td class="text-left" colspan="8">'+provedor+'</td>' );
            //     },
            //     dataSrc: [ 4 ]
            // }
		});
	});
	/*funcion para actualizar elplugin responsive in chrome*/
	function recalcularwitdth() {
	var table = $('#productsTable').DataTable();
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
@endpush
