var cantidad_max_telefonos = 3; //max de 3 campos

var cantidad_actual_telefonos = 1;

var cantidad_max_especialidades = 3; //max de 3 campos

var cantidad_actual_especialidades = 1;

/*
* Metodos con el manejo de campos de telefonos
* */
$("#add_telefono").click(function (e) {
    e.preventDefault(); //prevenir novos clicks
    if (cantidad_actual_telefonos < cantidad_max_telefonos) {
        $("#lista-telefonos").append(
            '<div class="row">\
                <div class="input-field col s10">\
                    <input id="telefono" name="telefonos[]" type="text" class="validate">\
                    <label for="telefono">Telefono</label>\
                </div>\
                <a class="btn-floating btn-small waves-effect waves-light red remover_telefono"><i class="material-icons">remove</i></a>\
            </div>'
        );
        cantidad_actual_telefonos++;
    }
});
// Remover el div anterior
$("#lista-telefonos").on("click", ".remover_telefono", function (e) {
    e.preventDefault();
    $(this).parent("div").remove();
    cantidad_actual_telefonos--;
});


/*
* Metodos con el manejo de campos de especialidades
* */

// Remover el div anterior
$("#lista-selects").on("click", ".remover_select", function (e) {
    e.preventDefault();
    $(this).parent("div").remove();
    cantidad_actual_especialidades--;
});
