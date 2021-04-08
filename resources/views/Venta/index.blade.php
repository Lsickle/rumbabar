@extends('layouts.adminApp')

@section('pagename')
Lista de Ventas
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
@endsection

@section('header')
<div class="sticky-top px-3 mt-2">
    <div class="row bg-light">
        <div class="col">
            <p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'lista de ventas'}}</p>
        </div>
        <div class="col">
            <a class="float-right font-inter-700 text-secondary" href="{{route('home')}}"><i loading="lazy" width="30" height="30" class="d-inline-block align-center fab fa-rockrms fa-lg"></i>umbaBar</a>
        </div>
    </div>
    {{-- <div class="row bg-light mb-2">
        <div class="col">
            <ul class="nav d-flex flex-wrap-reverse flex-md-row border-bottom">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle py-0 px-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">07/11/2020-07/11/1984</a>
                    <div class="dropdown-menu dropdown-menu-left">
                        <h6 class="dropdown-header">Seleccione el Mes o Rango.</h6>
                        <a class="dropdown-item px-3" href="#">Agosto</a>
                        <a class="dropdown-item px-3" href="#">Septiembre</a>
                        <a class="dropdown-item px-3" href="#">Octubre</a>
                        <a class="dropdown-item px-3 active" href="#">Noviembre</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item px-3" href="#">Ultimo Año </a>
                        <a class="dropdown-item px-3" href="#">Ultimo mes</a>
                        <a class="dropdown-item px-3" href="#">Ultimo Semana</a>
                        <div class="dropdown-divider"></div>
                        <form class="form">
                            <a class="dropdown-item px-3" href="#">
                                <label class="my-0" for="inlineFormInputGroupDate1">Desde</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text px-2">
                                            <i class="fas fa-calendar-day"></i>
                                        </div>
                                    </div>
                                    <input type="date" class="form-control" id="inlineFormInputGroupDate1" placeholder="Desde" describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        escoge una fecha valida.
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item px-3" href="#">
                                <label class="my-0" for="inlineFormInputGroupDate2">Hasta</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text px-2">
                                            <i class="fas fa-calendar-day"></i>
                                        </div>
                                    </div>
                                    <input type="date" class="form-control" id="inlineFormInputGroupDate2" placeholder="Desde" describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        escoge una fecha valida.
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item px-3" href="#">
                                <button type="submit" class="btn btn-block btn-primary">Buscar</button>
                            </a>
                        </form>
                    </div>
                </li>
                <li class="flex-grow-1 nav-item">
                    <a class="text-secondary float-right">$ <span style="color: #6D5BD0"><b>{{number_format($totalgeneral, 2, '.', ',')}}</b></span> COP</a>
                </li>
            </ul>
        </div>
    </div> --}}
</div>
@endsection

@section('container')
<div class="container shadow rounded border border-3 h-90 bg-white">
    <div class="row justify-content-between py-2 my-2" id='ventasHeader'>
        <div class="col-12 d-flex justify-content-between">
            <button class="btn btn-outline-secondary dropdown mr-md-2" type="button" data-toggle="collapse" data-target=".collapse" aria-expanded="false" aria-controls="collapseExample">
                <div class="text-nowrap bd-highlight">
                    <i class="fas fa-filter"></i> Filtros
                </div>
            </button>
            <a href="{{route('ventas.create')}}" class="btn text-white font-inter-600" style="background-color:#6D5BD0; font-size:12px;"><b>Crear</b></a>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive mx-md-3">
            <table id="ventasTable" class="table table-hover table-sm text-left mb-0" style="color:#6E6893 !important;">
                <thead class="font-inter-600" style="background-color: #F4F2FF;">
                    <tr>
                        <th id="th-1" scope="col">CLIENTE</th>
                        <th id="th-1" scope="col">MESA</th>
                        <th id="th-3" scope="col">STATUS</th>
                        <th id="th-2" scope="col">Fecha</th>
                        <th id="th-4" scope="col" class="text-right">CANTIDAD</th>
                        <th id="th-5" scope="col">VER</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta)
                    <tr>
                        <td class="align-middle text-nowrap" scope="col">
                            {{$venta->cliente->ClienteNombre}}
                        </td>
                        <td class="align-middle text-nowrap" scope="col">
                            Mesa {{$venta->mesa->MesaId}}
                        </td>
                        <td class="align-middle text-nowrap" scope="col">
                            {{$venta->VentaStatus}}
                        </td>
                        <td class="align-middle text-nowrap" scope="col">
                            {{$venta->updated_at}}
                        </td>
                        <td class="align-middle text-nowrap px-3 text-right" scope="col">
                            @php
                            $subtotal = 0
                            @endphp
                            @foreach ($venta->productos as $producto)
                            @php
                            $subtotal = $producto->pivot->ventaCantidad * $producto->ProductoPrecio;
                            @endphp
                            @endforeach
                            <div class="text-dark">$ {{number_format($subtotal, 2, ',', '.')}}</div>
                        </td>
                        <td class="align-middle text-nowrap" scope="col">
                            <a href="{{route('ventas.show', ['venta' => $venta])}}" class="btn btn-sm btn-info text-white">
                                <div class="text-nowrap">Ver Mas</div>
                            </a>
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
		$('#ventasTable').DataTable({
			"dom":"<'row collapse'<'col-md-8'P><'col-md-4'<'card my-1'<'card-body'Q>>>>" +
				"<'row justify-content-between pt-3 pb-0'<l><'text-center d-none d-md-block'B><f>>" +
				"<'row'<'col-md-12'rt>>" +
				"<'row pt-0 pb-3 justify-content-center justify-content-md-between'<'align-self-center'i><''p>>",
			"searchPanes": {
				cascadePanes: true,
				layout: 'columns-2',
				// columns: [1,4],
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
			// "columnDefs": [
			// 	{ "type": "num-fmt", "targets": [0,2,3]},
			// 	{ "type": "date", "targets": [4,5]},
			// 	{ "type": "html", "targets": '_all'},
			// 	{ "orderable": false, "targets": [6] },
			// 	// { "className": "text-right", "targets": [2,3,5]},
			// 	// { "className": "text-left", "targets": [1]},
			// 	// { "visible": false, "targets": [4]}
			// ],
            // "rowGroup": {
            //     endRender: null,
            //     startRender: function ( rows, group ) {

			// 		var totalcantidad = rows
            //             .data()
            //             .pluck(3)
            //             .reduce( function (a, b) {
            //                 return a + parseFloat(b);
            //             }, 0);

            //         var provedor = rows
            //             .data()
            //             .pluck(4)
            //             .reduce( function (a, b) {
            //                 return b;
            //             }, 0);

            //         return $('<tr/>')
            //             .append( '<td class="text-left" colspan="7">'+provedor+'</td>' )
			// 			.append( '<td>'+totalcantidad+' Unidades.</td>' );;
            //     },
            //     dataSrc: [ 4 ]
            // }
		});
	});
	/*funcion para actualizar elplugin responsive in chrome*/
	function recalcularwitdth() {
	var table = $('#comprasTable').DataTable();
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