
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


var buttonsubmit = $('#submitButton');
function enablebutton(Mensaje) {
	buttonsubmit.disabled = false;
	buttonsubmit.prop('disabled', false);
	buttonsubmit.prop('class', 'btn white');
	buttonsubmit.val(`BUSCAR`);
}
function disablebutton() {
	buttonsubmit.disabled = true;
	buttonsubmit.prop('disabled', true);
	buttonsubmit.prop('class', 'btn blue');
	buttonsubmit.val(`Buscando...`);
}
function renewtoken(token) {
	$('meta[name="csrf-token"]').attr('content', token);
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': token
		}
	});
}


$('#formulario').on("click", function (e) {
	var id = $('#selectCiudad').val();
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		url: "{{route('getProduct')}}",
		method: 'GET',
		data: { 'id': id },
		beforeSend: function () {
			disablebutton();
			$('#divResultadosBusqueda').empty();
		},
		success: function (data, textStatus, jqXHR) {
			renewtoken(data.newtoken);
			switch (jqXHR['status']) {
				case 200:
					toastr.success(data['message']);
					break;

				default:
					toastr.error(data['message']);
					break;
			}
			$('#conteobienes').html("(" + data['total'] + ")")
			$('#divResultadosBusqueda').fadeIn('slow');
			enablebutton();
		},
		error: function (xhr, textStatus, jqXHR) {
			renewtoken(xhr.newtoken);
			toastr.error(xhr['responseJSON']['message']);
			enablebutton();
		},
		complete: function () {

		}
	})
	e.preventDefault();
});

