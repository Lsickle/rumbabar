function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            var output = $('#' + input.id + 'Output');
            output.attr('src', e.target.result);
            output.attr('class', 'd-block');
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$('input[type="file"]').change(function () {
    readURL(this);
});

function activarSelec2() {
    $('.select2').select2({
        theme: 'bootstrap4',
    });
}
$(document).ready(function () {
    activarSelec2();
});