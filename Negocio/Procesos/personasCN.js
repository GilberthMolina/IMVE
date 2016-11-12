/**
 * Sistema para la Iglesia Manantiales de Vida Eterna
 * Desarrollado por: Gilberth Molina
 * Fecha creación: 31/10/16
 */

// Variable para determinar si se debe de registar el usuario con el concentimiento de que no tendrá correo electrónico registrado
var registarSinCorreo = false;

// Variable que se utiliza para mostrar u ocultar las acciones masivas de las personas
var mostrarAcciones = false;

// Función que se ejecuta al cargar la pagina
function PersonasOnLoad() {
    PersonasCargarPersonasListado();
    PersonasCargarPersonasAccionesSeleccion();
    PersonasCargarPersonasAccionesSeleccionActivasDesactivas();

    $('#btnEnviarSMS').hide();
    $('#btnEnviarCorreo').hide();
    $('#btnActivarPersonas').hide();
    $('#btnDesactivarPersonas').hide();
    $('#menuAcciones').hide();
}

// Función que se ejecuta al cargar la pagina
function PersonasDetalleOnLoad(){
    PesonasCargarPersonaPorId();
}

// Función que se ejecuta cuando cambia la provincia seleccionada
function PersonasOnSelectedChangeProvincias(){
    $('div#cboIdCanton-button').children('span').html('Seleccione');
    $('div#cboIdDistrito-button').children('span').html('Seleccione');

    CargarCantones();
    CargarDistritos();
}

// Función que se ejecuta cuando cambia el cantón seleccionada
function PersonasOnSelectedChangeCantones(){
    $('div#cboIdDistrito-button').children('span').html('Seleccione');

    CargarDistritos();
}

// Función para obtener todos los grupos activos y mostralos al usuarios para que seleccione en los cuales es participante
function PersonasCargarGruposParticipante()
{
    // Se define el action que será consultado desde la clase de acceso a datos
    var d = "action=obtenerGruposParticipantesListado";

    // Enviar por Ajax a gruposCAD.php
    $.ajax({
        type: "POST"
        , data: d
        , url: "../../../IMVE/Datos/Procesos/gruposCAD.php"
        , success: function(a) {
            $("#PersonaGruposParticipante").html(a).selectmenu('refresh');
        }
    })
}

// Función para obtener todos los grupos activos y mostralos al usuarios para que seleccione en los cuales es líder
function PersonasCargarGruposLider()
{
    // Se define el action que será consultado desde la clase de acceso a datos
    var d = "action=obtenerGruposLideresListado";

    // Enviar por Ajax a gruposCAD.php
    $.ajax({
        type: "POST"
        , data: d
        , url: "../../../IMVE/Datos/Procesos/gruposCAD.php"
        , success: function(a) {
            $("#PersonaGruposLider").html(a).selectmenu('refresh');
        }
    })
}

// Función que se ejecuta cuando cambia el cantón seleccionada
function PersonasMostrarAcciones(){
    if (mostrarAcciones == false)
    {
        mostrarAcciones = true;
        $("#menuAcciones").show();
    }
    else if (mostrarAcciones == true)
    {
        mostrarAcciones = false;
        $("#menuAcciones").hide();
    }
}

// Función que carga la fecha actual en el campo de fecha de nacimiento
function PersonasAsignarFechaActual()
{
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth() + 1;
    var a = date.getFullYear();
    var fechaCompleta = d + '/' + m + '/' + a;

    document.getElementById("txtFechaNacimiento").defaultValue = fechaCompleta;
}

// Función para obtener todos las personas registradas
function PersonasCargarPersonasListado() {
    var ordenamiento = $('#ordenamientoSeleccion').val();
    var estado = $('#estadoSeleccion').val();

    // Se define el action que será consultado desde la clase de acceso a datos
    var d = "action=obtenerListadoPersonasPorOrdenamientoEstado&ordenamiento=" + ordenamiento + "&estado=" + estado;

    // Enviar por Ajax a personasCAD.php
    $.ajax({
        type: "POST"
        , data: d
        , url: "../../../IMVE/Datos/Procesos/personasCAD.php"
        , success: function(a) {
            $("#divListaPersonas").html(a).trigger("create");
        }
    })
}

// Función para cargar una personas por su id
function PesonasCargarPersonaPorId() {
    var IdPersona = ObtenerParametroPorNombre('IdPersona');

    if(IdPersona != ''){

        // Se define el action que será consultado desde la clase de acceso a datos
        var d = "action=cargarPersona&IdPersona=" + IdPersona;

        // Enviar por Ajax a personasCAD.php
        $.ajax({
            type: "POST"
            , data: d
            , url: "../../../IMVE/Datos/Procesos/personasCAD.php"
            , success: function(a) {
                $("#personasDetalle").html(a).trigger("create");
            }
        });
    }
    else
    {
        PersonasAsignarFechaActual();
        CargarProvincias();
        PersonasCargarGruposParticipante();
        PersonasCargarGruposLider();
    }
}

// Función para obtener todos las personas con sus celulares y correos
function PersonasCargarPersonasAccionesSeleccion() {
    var accion = ObtenerValorRadioButtonPorNombre('filtroAccion');
    var inicioHref = (accion == "S") ? "sms:" : "mailto:";

    // Se define el action que será consultado desde la clase de acceso a datos
    var d = "action=obtenerListadoPersonasCelularesCorreos&accion=" + accion;

    // Enviar por Ajax a personasCAD.php
    $.ajax({
        type: "POST"
        , data: d
        , url: "../../../IMVE/Datos/Procesos/personasCAD.php"
        , success: function(a) {
            $("#accionesSeleccion").html(a).trigger("create");
        }
    });

    $('#btnEnviarSMS').hide();
	$('#btnEnviarSMS').attr("href", inicioHref);
	$('#btnEnviarCorreo').hide();
	$('#btnEnviarCorreo').attr("href", inicioHref);
}

// Función para obtener todos las personas con sus celulares y correos
function PersonasCargarPersonasAccionesSeleccionActivasDesactivas() {
    var estado = ObtenerValorRadioButtonPorNombre('filtroActivasDesactivas');

    // Se define el action que será consultado desde la clase de acceso a datos
    var d = "action=obtenerListadoPersonasFiltradasPorEstado&estado=" + estado;

    // Enviar por Ajax a personasCAD.php
    $.ajax({
        type: "POST"
        , data: d
        , url: "../../../IMVE/Datos/Procesos/personasCAD.php"
        , success: function(a) {
            $("#accionesSeleccionActivasDesactivas").html(a).trigger("create");
        }
    });

    $('#btnActivarPersonas').hide();
    $('#btnDesactivarPersonas').hide();
}

// Función para el evento clic del botón btnEnviarSMS
function PersonasBtnEnviarSMS() {
    var valorHref = $('#btnEnviarSMS').attr("href");

    if(valorHref == 'sms:'){
        $.alert({
            theme: 'material'
            , animationBounce: 1.5
            , animation: 'rotate'
            , closeAnimation: 'rotate'
            , title: 'Advertencia'
            , content: 'No ha seleccionado ninguna persona para enviarle un mensaje de texto.'
            , confirmButton: 'Aceptar'
            , confirmButtonClass: 'btn-warning'
        });

        return false;
    }
    else{
        return true;
    }
}

// Función para el evento clic del botón btnEnviarCorreo
function PersonasBtnEnviarCorreo() {
    var valorHref = $('#btnActivarPersonas').attr("href");

    if(valorHref == 'mailto:'){
        $.alert({
            theme: 'material'
            , animationBounce: 1.5
            , animation: 'rotate'
            , closeAnimation: 'rotate'
            , title: 'Advertencia'
            , content: 'No ha seleccionado ninguna persona para enviarle un correo electrónico.'
            , confirmButton: 'Aceptar'
            , confirmButtonClass: 'btn-warning'
        });

        return false;
    }
    else{
        return true;
    }
}

// Función para el evento clic del botón btnActivarPersonas
function PersonasBtnActivarPersonas() {
    var estado = ObtenerValorRadioButtonPorNombre('filtroActivasDesactivas');
    var estadoNuevo = (estado == 'A') ? 'I' : 'A';

    var personasActualizar = $('#accionesSeleccionPersonasActivarDesactivar').val();
    var listaPersonasJson = JSON.stringify(personasActualizar);

    // Se define el action que será consultado desde la clase de acceso a datos
    var d = "action=modificarEstadoPersonas&listaPersonas=" + listaPersonasJson + "&estado=" + estadoNuevo;

    // Enviar por Ajax a personasCAD.php
    $.ajax({
        type: "POST"
        , data: d
        , url: "../../../IMVE/Datos/Procesos/personasCAD.php"
        , success: function(a) {
            if (a == 1)
            {
                $.alert({
                    theme: 'material'
                    , animationBounce: 1.5
                    , animation: 'rotate'
                    , closeAnimation: 'rotate'
                    , title: 'Información'
                    , content: 'A las personas seleccionadas se les ha cambiado su estado a activas.'
                    , confirmButton: 'Aceptar'
                    , confirmButtonClass: 'btn-success'
                });
            }
            else
            {
                $.alert({
                    theme: 'material'
                    , animationBounce: 1.5
                    , animation: 'rotate'
                    , closeAnimation: 'rotate'
                    , title: 'Error'
                    , content: 'No se pudo actualizar el estado de la persona, intente de nuevo.'
                    , confirmButton: 'Aceptar'
                    , confirmButtonClass: 'btn-danger'
                });
            }
        }
    });

    PersonasCargarPersonasAccionesSeleccionActivasDesactivas();
    PersonasCargarPersonasListado();
}

// Función para el evento clic del botón btnDesactivarPersonas
function PersonasBtnDesactivarPersonas() {
    var estado = ObtenerValorRadioButtonPorNombre('filtroActivasDesactivas');
    var estadoNuevo = (estado == 'A') ? 'I' : 'A';

    var personasActualizar = $('#accionesSeleccionPersonasActivarDesactivar').val();
    var listaPersonasJson = JSON.stringify(personasActualizar);

    // Se define el action que será consultado desde la clase de acceso a datos
    var d = "action=modificarEstadoPersonas&listaPersonas=" + listaPersonasJson + "&estado=" + estadoNuevo;

    // Enviar por Ajax a personasCAD.php
    $.ajax({
        type: "POST"
        , data: d
        , url: "../../../IMVE/Datos/Procesos/personasCAD.php"
        , success: function(a) {
            if (a == 1)
            {
                $.alert({
                    theme: 'material'
                    , animationBounce: 1.5
                    , animation: 'rotate'
                    , closeAnimation: 'rotate'
                    , title: 'Información'
                    , content: 'A las personas seleccionadas se les ha cambiado su estado a inactivas.'
                    , confirmButton: 'Aceptar'
                    , confirmButtonClass: 'btn-success'
                });
            }
            else
            {
                $.alert({
                    theme: 'material'
                    , animationBounce: 1.5
                    , animation: 'rotate'
                    , closeAnimation: 'rotate'
                    , title: 'Error'
                    , content: 'No se pudo actualizar el estado de la persona, intente de nuevo.'
                    , confirmButton: 'Aceptar'
                    , confirmButtonClass: 'btn-danger'
                });
            }
        }
    });

    PersonasCargarPersonasAccionesSeleccionActivasDesactivas();
    PersonasCargarPersonasListado();
}

// Función para enviar un sms o un correo a las personas seleccionadas
function PersonasAccionesSeleccionarPersonas() {
    var accion = ObtenerValorRadioButtonPorNombre('filtroAccion');
    var arregloSeleccionMasiva = $('#accionesSeleccionPersonas').val();
    var inicioHref = (accion == "S") ? "sms:" : "mailto:";

    if(arregloSeleccionMasiva != null){
        var nuevoSeleccion = arregloSeleccionMasiva.toString().replace(",",";");
        var valorCompletoHref = inicioHref + nuevoSeleccion.replace(",",";");

        if(accion == 'S')
        {
            $('#btnEnviarSMS').show();
            $('#btnEnviarSMS').attr("href", valorCompletoHref);
        }
        else
        {
            $('#btnEnviarCorreo').show();
            $('#btnEnviarCorreo').attr("href", valorCompletoHref);
        }
    }
    else{
        if(accion == 'S')
        {
            $('#btnEnviarSMS').hide();
            $('#btnEnviarSMS').attr("href", inicioHref);
        }
        else
        {
            $('#btnEnviarCorreo').hide();
            $('#btnEnviarCorreo').attr("href", inicioHref);
        }
    }
}

// Función para activar o desactivar las personas seleccionadas
function PersonasAccionesSeleccionarActivarDesactivarPersonas(){
    var estado = ObtenerValorRadioButtonPorNombre('filtroActivasDesactivas');
    var personasActualizar = $('#accionesSeleccionPersonasActivarDesactivar').val();

    if(personasActualizar != null){
        if(estado == 'A'){
            $('#btnDesactivarPersonas').show();
        } else if(estado == 'I'){
            $('#btnActivarPersonas').show();
        }
    } else {
        $('#btnActivarPersonas').hide();
        $('#btnDesactivarPersonas').hide();
    }
}

// Función para registrar persona en el sistema
function PersonasRegistrarPersona() {
    var identificacion = $('#txtIdentificacion').val().trim();
    var nombre = $('#txtNombre').val().trim();
    var apellido1 = $('#txtApellido1').val().trim();
    var apellido2 = $('#txtApellido2').val().trim();
    var fechaNacimiento = $('#txtFechaNacimiento').val();
    var distrito = $('#cboIdDistrito').val();
    var direccionDomicilio = $('#txtDireccionDomicilio').val().trim();
    var direccionDomicilioNuevo = "";
    var telefono = $('#txtTelefono').val().trim();
    var celular = $('#txtCelular').val().trim();
    var correo = $('#txtCorreo').val().trim();
    var sexo = $('#cboSexo').val();

    var gruposParticipante = $('#PersonaGruposParticipante').val();
    var listaGruposParticipanteJson = JSON.stringify(gruposParticipante);

    var gruposLider = $('#PersonaGruposLider').val();
    var listaGruposLiderJson = JSON.stringify(gruposLider);

    if(direccionDomicilio.includes("Clear text"))
    {
        direccionDomicilioNuevo = direccionDomicilio.substring(0, direccionDomicilio.length-10);
    }
    else
    {
        direccionDomicilioNuevo = direccionDomicilio;
    }

    if(identificacion == ""
        || nombre == ""
        || apellido1 == ""
        || sexo == "")
    {
        $.alert({
            theme: 'material'
            , animationBounce: 1.5
            , animation: 'rotate'
            , closeAnimation: 'rotate'
            , title: 'Advertencia'
            , content: 'Debe de ingresar los datos que son necesarios del formulario.'
            , confirmButton: 'Aceptar'
            , confirmButtonClass: 'btn-warning'
        });
    }
    else
    {
        if(!PersonasValidarCorreo())
        {
            return false;
        }
        else
        {
            if(correo == ''
               && registarSinCorreo == false)
            {
                $.confirm({
                    theme: 'material'
                    , animationBounce: 1.5
                    , animation: 'rotate'
                    , closeAnimation: 'rotate'
                    , title: 'Confirmación'
                    , content: '<p>El correo electrónico es necesario posteriormente para recordar la contraseña, en caso de que la olvide. <br><br> ¿Desea continuar sin ingresar un correo electrónico?</p>'
                    , confirmButton: 'Acepto'
                    , confirmButtonClass: 'btn-success'
                    , cancelButton: 'No acepto'
                    , cancelButtonClass: 'btn-warning'
                    , confirm: function(){
                        registarSinCorreo = true;

                        PersonasIngresarUsuario(identificacion
                            , nombre
                            , apellido1
                            , apellido2
                            , fechaNacimiento
                            , distrito
                            , direccionDomicilioNuevo
                            , telefono
                            , celular
                            , correo
                            , sexo
                            , listaGruposParticipanteJson
                            , listaGruposLiderJson);
                    }
                    , cancel: function(){
                        registarSinCorreo = false;
                    }
                });
            }
            else
            {
                PersonasIngresarUsuario(identificacion
                    , nombre
                    , apellido1
                    , apellido2
                    , fechaNacimiento
                    , distrito
                    , direccionDomicilioNuevo
                    , telefono
                    , celular
                    , correo
                    , sexo
                    , listaGruposParticipanteJson
                    , listaGruposLiderJson);
            }
        }
    };
}

// Función que registra el usuario del usuario a la base de datos por medio de Ajax
function PersonasIngresarUsuario(p_Identificacion, p_Nombre, p_Apellido1, p_Apellido2, p_FechaNacimiento, p_Distrito , p_DireccionDomicilio, p_Telefono, p_Celular, p_Correo, p_Sexo, p_listaGruposParticipante, p_listaGruposLider){
    // Se define el action que será consultado desde la clase de acceso a datos
    var d = "action=registrarPersona&identificacion=" + p_Identificacion + "&nombre=" + p_Nombre + "&apellido1=" + p_Apellido1 + "&apellido2=" + p_Apellido2 + "&fechaNacimiento="
        + p_FechaNacimiento + "&distrito=" + p_Distrito + "&direccionDomicilio=" + p_DireccionDomicilio + "&telefono=" + p_Telefono + "&celular=" + p_Celular + "&correo=" + p_Correo
        + "&sexo=" + p_Sexo + "&listaGruposParticipante=" + p_listaGruposParticipante + "&listaGruposLider=" + p_listaGruposLider;

    // Enviar por Ajax a personasCAD.php
    $.ajax({
        type: "POST"
        , data: d
        , url: "../../../IMVE/Datos/Procesos/personasCAD.php"
        , success: function(a)
        {
            // Se divide la variable separandola por comas.
            var resultado = a.split(',');

            if(resultado[0] == 1)
            {
                $.alert({
                    theme: 'material'
                    , animationBounce: 1.5
                    , animation: 'rotate'
                    , closeAnimation: 'rotate'
                    , title: 'Información'
                    , content: 'La persona se registró satisfactoriamente.'
                    , confirmButton: 'Aceptar'
                    , confirmButtonClass: 'btn-success'
                    , confirm: function(){
                        RedireccionPagina('personas.php');
                    }
                });
            }
            else if(a.includes("Duplicate"))
            {
                $.alert({
                    theme: 'material'
                    , animationBounce: 1.5
                    , animation: 'rotate'
                    , closeAnimation: 'rotate'
                    , title: 'Advertencia'
                    , content: 'Una persona con la misma identificación ya se encuentra registrada.'
                    , confirmButton: 'Aceptar'
                    , confirmButtonClass: 'btn-warning'
                });
            }
            else
            {
                $.alert({
                    theme: 'material'
                    , animationBounce: 1.5
                    , animation: 'rotate'
                    , closeAnimation: 'rotate'
                    , title: 'Error'
                    , content: 'No se pudo realizar el registro de la persona, intente de nuevamente.'
                    , confirmButton: 'Aceptar'
                    , confirmButtonClass: 'btn-danger'
                });
            }
        }
    });
};

// Función para modificar un grupo
function PersonasModificarPersona(p_IdPersona) {
    var idPersona = p_IdPersona;
    var identificacion = $('#txtIdentificacion').val().trim();
    var nombre = $('#txtNombre').val().trim();
    var apellido1 = $('#txtApellido1').val().trim();
    var apellido2 = $('#txtApellido2').val().trim();
    var fechaNacimiento = $('#txtFechaNacimiento').val();
    var distrito = $('#cboIdDistrito').val();
    var direccionDomicilio = $('#txtDireccionDomicilio').val().trim();
    var direccionDomicilioNuevo = "";
    var telefono = $('#txtTelefono').val().trim();
    var celular = $('#txtCelular').val().trim();
    var correo = $('#txtCorreo').val().trim();
    var sexo = $('#cboSexo').val();
    var estado = $('#cboEstadoPersona').val();

    if(direccionDomicilio.includes("Clear text"))
    {
        direccionDomicilioNuevo = direccionDomicilio.substring(0, direccionDomicilio.length-10);
    }
    else
    {
        direccionDomicilioNuevo = direccionDomicilio;
    }

    if(identificacion == ""
        || nombre == ""
        || apellido1 == ""
        || sexo == "")
    {
        $.alert({
            theme: 'material'
            , animationBounce: 1.5
            , animation: 'rotate'
            , closeAnimation: 'rotate'
            , title: 'Advertencia'
            , content: 'Debe de ingresar los datos que son necesarios del formulario.'
            , confirmButton: 'Aceptar'
            , confirmButtonClass: 'btn-warning'
        });
    }
    else
    {
        if(!PersonasValidarCorreo())
        {
            return false;
        }
        else
        {
            if(correo == ''
                && registarSinCorreo == false)
            {
                $.confirm({
                    theme: 'material'
                    , animationBounce: 1.5
                    , animation: 'rotate'
                    , closeAnimation: 'rotate'
                    , title: 'Confirmación'
                    , content: '<p>El correo electrónico es necesario posteriormente para recordar la contraseña, en caso de que la olvide. <br><br> ¿Desea continuar sin ingresar un correo electrónico?</p>'
                    , confirmButton: 'Acepto'
                    , confirmButtonClass: 'btn-success'
                    , cancelButton: 'No acepto'
                    , cancelButtonClass: 'btn-warning'
                    , confirm: function(){
                        registarSinCorreo = true;

                        PersonasModificarPersonaEspecifica(idPersona
                            , identificacion
                            , nombre
                            , apellido1
                            , apellido2
                            , fechaNacimiento
                            , distrito
                            , direccionDomicilioNuevo
                            , telefono
                            , celular
                            , correo
                            , sexo
                            , estado);
                    }
                    , cancel: function(){
                        registarSinCorreo = false;
                    }
                });
            }
            else
            {
                PersonasModificarPersonaEspecifica(idPersona
                    , identificacion
                    , nombre
                    , apellido1
                    , apellido2
                    , fechaNacimiento
                    , distrito
                    , direccionDomicilioNuevo
                    , telefono
                    , celular
                    , correo
                    , sexo
                    , estado);
            }
        }
    };
}

// Función que registra a la pesona a la base de datos por medio de Ajax
function PersonasModificarPersonaEspecifica(p_IdPersona, p_Identificacion, p_Nombre, p_Apellido1, p_Apellido2, p_FechaNacimiento, p_Distrito , p_DireccionDomicilio, p_Telefono, p_Celular, p_Correo, p_Sexo, p_Estado){
    // Se define el action que será consultado desde la clase de acceso a datos
    var d = "action=modificarPersona&idPersona=" + p_IdPersona + "&identificacion=" + p_Identificacion + "&nombre=" + p_Nombre + "&apellido1=" + p_Apellido1 + "&apellido2=" + p_Apellido2 + "&fechaNacimiento="
        + p_FechaNacimiento + "&distrito=" + p_Distrito + "&direccionDomicilio=" + p_DireccionDomicilio + "&telefono=" + p_Telefono + "&celular=" + p_Celular + "&correo=" + p_Correo
        + "&sexo=" + p_Sexo+ "&estado=" + p_Estado;

    // Enviar por Ajax a personasCAD.php
    $.ajax({
        type: "POST"
        , data: d
        , url: "../../../IMVE/Datos/Procesos/personasCAD.php"
        , success: function(a)
        {
            // Se divide la variable separandola por comas.
            var resultado = a.split(',');

            if(resultado[0] == 1)
            {
                $.alert({
                    theme: 'material'
                    , animationBounce: 1.5
                    , animation: 'rotate'
                    , closeAnimation: 'rotate'
                    , title: 'Información'
                    , content: 'La persona se modificó satisfactoriamente.'
                    , confirmButton: 'Aceptar'
                    , confirmButtonClass: 'btn-success'
                    , confirm: function(){
                        RedireccionPagina('personas.php');
                    }
                });
            }
            else if(a.includes("Duplicate"))
            {
                $.alert({
                    theme: 'material'
                    , animationBounce: 1.5
                    , animation: 'rotate'
                    , closeAnimation: 'rotate'
                    , title: 'Advertencia'
                    , content: 'Una persona con la misma identificación ya se encuentra registrada.'
                    , confirmButton: 'Aceptar'
                    , confirmButtonClass: 'btn-warning'
                });
            }
            else
            {
                $.alert({
                    theme: 'material'
                    , animationBounce: 1.5
                    , animation: 'rotate'
                    , closeAnimation: 'rotate'
                    , title: 'Error'
                    , content: 'No se pudo realizar el registro de la persona, intente de nuevamente.'
                    , confirmButton: 'Aceptar'
                    , confirmButtonClass: 'btn-danger'
                });
            }
        }
    });
};

// Función que valida si el correo eléctronico introducido es valido
function PersonasValidarCorreo() {
    var correo = $('#txtCorreo').val().trim();
    var RegExp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(correo != "")
    {
        if (!RegExp.test(correo))
        {
            $.alert({
                theme: 'material'
                , animationBounce: 1.5
                , animation: 'rotate'
                , closeAnimation: 'rotate'
                , title: 'Advertencia'
                , content: 'El correo "' + correo +'" no es válido, por favor verifíquelo.'
                , confirmButton: 'Aceptar'
                , confirmButtonClass: 'btn-warning'
            });
            return false;
        }
        else
        {
            return true;
        }
    }
    else
    {
        return true;
    }
}
