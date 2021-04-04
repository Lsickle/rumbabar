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
	<div class="row">
		<div class="col table-responsive">
			<table id="productsTable" class="table table-hover table-sm mb-0" style="color:#6E6893 !important;">
				<thead class="font-inter-600" style="background-color: #F4F2FF;">
					<tr>
						<th id="th-1" scope="col" class="text-center">#</th>
						<th id="th-2" scope="col" class="">NOMBRE</th>
						<th id="th-3" scope="col" class="text-center">PRECIO</th>
						<th id="th-4" scope="col" class="text-center">CANTIDAD</th>
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
							<div class="text-nowrap">
								<div class="text-dark">{{$producto->ProductoNombre}}</div>
							</div>
						</td>
						<td class="align-middle" scope="col">
							<div class="text-nowrap">
								<div class="text-dark">{{ number_format($producto->ProductoPrecio, 2) }}</div>
							</div>
						</td>
						<td class="align-middle" scope="col">
							<div class="text-nowrap">
								<div class="text-dark">{{$producto->ProductoCantidad}}</div>
							</div>
						</td>
						<td class="align-middle" scope="col">
							<div class="text-nowrap">
								{{$producto->updated_at}}
								<br>
								<span class="badge badge-pill badge-local">
									• Local
								</span>
							</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.min.js"></script> --}}

<script>
	$(document).ready(function() {
		/*var rol defino el rol del usuario*/
		var rol = "<?php echo Auth::user()->fk_rol; ?>";
		/*var botoncito define los botones que se usaran si el usuario es programador*/
		var botoncito = (rol == 1) ? [{extend: 'colvis', text: 'Columnas'}, {extend: 'copy', text: 'Copiar'}, {extend: 'excel', text: 'Excel'}, {extend: 'pdf', text: 'Pdf'}, {extend: 'collection', text: 'Selector', buttons: ['selectRows', 'selectCells']}]
								   : [{extend: 'colvis', text: 'Columnas'}, {extend: 'excel', text: 'Excel'}];
		/*inicializacion de datatable general*/
		$('#productsTable').DataTable({
			dom:"<'row justify-content-between pt-3 pb-0'<l><'text-center d-none d-md-block'B><f>>" +
				"<'row'<'col-md-12'tr>>" +
				"<'row pt-0 pb-3 justify-content-center justify-content-md-between'<'align-self-center'i><''p>>",
			scrollX: false,
			autoWidth: false,
			select: true,
			colReorder: true,
			ordering: true,
			order: [0, 'desc'],
			searchHighlight: true,
			responsive: true,
			keys: true,
			lengthChange: true,
			searching: true,
			buttons: [
				botoncito
			],
			language: {
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
				{ "type": "num-fmt", "targets": 0 },
				{ "orderable": false, "targets": [5,6] },
				{ "className": "text-right", "targets": [2,3,4]},
				{ "className": "text-left", "targets": [1]},
				// { "type": "date", "targets": 4 }
			]
            // "rowGroup": {
            //     endRender: null,
            //     startRender: function ( rows, group ) {
            //         var subtotalTrat = rows
            //             .data()
            //             .pluck(8)
            //             .reduce( function (a, b) {
            //                 return a + parseFloat(b);
            //             }, 0);

            //         var categoria = rows
            //             .data()
            //             .pluck(6)
            //             .reduce( function (a, b) {
            //                 return b;
            //             }, 0);

            //         return $('<tr/>')
            //             .append( '<td colspan="6">'+group+'</td>' )
            //             .append( '<td>'+subtotalTrat+' Kg.</td>' )
            //             .append( '<td/>' )
            //             .append( '<td/>' );
            //     },
            //     dataSrc: [ 0, 5 ]
            // },
			// "columnDefs": [ {
            //     targets: [ 0, 5 ],
            //     visible: false
            // }
			// ]
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
