/**
 * Sistema para la Iglesia Manantiales de Vida Eterna
 * Desarrollado por: Gilberth Molina
 * Fecha creación: 31/10/16
 */

// Función para ingresar a la pantalla de bienvenida
function UtiBienvenidaPaginaBienvenida()
{
    RedireccionPagina('bienvenida.php');
}

// Función para ingresar a la pantalla de cambiar contrasena
function UtiBienvenidaPaginaCambiarContrasena()
{
    RedireccionPagina('cambiarContrasena.php');
}

// -----------------------------------------------------------------

// Función para ingresar a la pantalla de mantenimiento de categorias personas
function UtiBienvenidaPaginaMantenimientosCategoriasPersonas()
{
    RedireccionPagina('Mantenimientos/categorias.php');
}

// Función para ingresar a la pantalla de mantenimiento de categorias personasdetalle
function UtiBienvenidaPaginaMantenimientosCategoriasPersonasDetalle()
{
    RedireccionPagina('Mantenimientos/categoriasDetalle.php');
}

// Función para ingresar a la pantalla de mantenimiento de categorias de grupos
function UtiBienvenidaPaginaMantenimientosCategoriasGrupos()
{
    RedireccionPagina('Mantenimientos/categoriasGrupos.php');
}

// Función para ingresar a la pantalla de mantenimiento de categorias de grupos detalle
function UtiBienvenidaPaginaMantenimientosCategoriasGruposDetalle()
{
    RedireccionPagina('Mantenimientos/categoriasGruposDetalle.php');
}

// Función para ingresar a la pantalla de mantenimiento de ministerios
function UtiBienvenidaPaginaMantenimientosMinisterios()
{
    RedireccionPagina('Mantenimientos/ministerios.php');
}

// Función para ingresar a la pantalla de mantenimiento de ministerios detalle
function UtiBienvenidaPaginaMantenimientosMinisteriosDetalle()
{
    RedireccionPagina('Mantenimientos/ministeriosDetalle.php');
}

// Función para ingresar a la pantalla de mantenimiento de roles de usuario
function UtiBienvenidaPaginaMantenimientosRolesUsuarios()
{
    RedireccionPagina('Mantenimientos/rolesUsuarios.php');
}

// Función para ingresar a la pantalla de mantenimiento de roles de usuario detalle
function UtiBienvenidaPaginaMantenimientosRolesUsuariosDetalle()
{
    RedireccionPagina('Mantenimientos/rolesUsuariosDetalle.php');
}

// Función para ingresar a la pantalla de mantenimiento de tipos de compromisos
function UtiBienvenidaPaginaMantenimientosTiposCompromisos()
{
    RedireccionPagina('Mantenimientos/tiposCompromisos.php');
}

// Función para ingresar a la pantalla de mantenimiento de tipos de compromisos detalle
function UtiBienvenidaPaginaMantenimientosTiposCompromisosDetalle()
{
    RedireccionPagina('Mantenimientos/tiposCompromisosDetalle.php');
}

// Función para ingresar a la pantalla de mantenimiento de tipos de relaciones
function UtiBienvenidaPaginaMantenimientosTiposRelaciones()
{
    RedireccionPagina('Mantenimientos/tiposRelaciones.php');
}

// Función para ingresar a la pantalla de mantenimiento de tipos de relaciones detalle
function UtiBienvenidaPaginaMantenimientosTiposRelacionesDetalle()
{
    RedireccionPagina('Mantenimientos/tiposRelacionesDetalle.php');
}

// Función para ingresar a la pantalla de mantenimiento de tipos de seguimientos
function UtiBienvenidaPaginaMantenimientosTiposSeguimientos()
{
    RedireccionPagina('Mantenimientos/tiposSeguimientos.php');
}

// Función para ingresar a la pantalla de mantenimiento de tipos de seguimientos detalle
function UtiBienvenidaPaginaMantenimientosTiposSeguimientosDetalle()
{
    RedireccionPagina('Mantenimientos/tiposSeguimientosDetalle.php');
}

// Función para ingresar a la pantalla de mantenimiento de usuarios
function UtiBienvenidaPaginaMantenimientosUsuarios()
{
    RedireccionPagina('Mantenimientos/usuarios.php');
}

// Función para ingresar a la pantalla de mantenimiento de usuarios
function UtiBienvenidaPaginaMantenimientosUsuariosDetale()
{
    RedireccionPagina('Mantenimientos/usuariosDetalle.php');
}

// -----------------------------------------------------------------

// Función para ingresar a la pantalla de proceso de compromisos
function UtiBienvenidaPaginaCompromisos()
{
    RedireccionPagina('Procesos/compromisos.php');
}

// Función para ingresar a la pantalla de proceso de grupos
function UtiBienvenidaPaginaGrupos()
{
    RedireccionPagina('Procesos/grupos.php');
}

// Función para ingresar a la pantalla de proceso de personas
function UtiBienvenidaPaginaPersonas()
{
    RedireccionPagina('Procesos/personas.php');
}

// Función para ingresar a la pantalla de proceso de seguimientos
function UtiBienvenidaPaginaSeguimientos()
{
    RedireccionPagina('Procesos/seguimientos.php');
}

// Función para ingresar a la pantalla de proceso de visitas
function UtiBienvenidaPaginaVisitas()
{
    RedireccionPagina('Procesos/visitas.php');
}

// -----------------------------------------------------------------

// Función para ingresar a la pantalla de proceso de compromisos
function UtiProcesosPaginaProcesosCompromisos()
{
    RedireccionPagina('Procesos/compromisos.php');
}

// Función para ingresar a la pantalla de proceso de compromisos detalle para agregar
function UtiProcesosPaginaProcesosCompromisosDetalleAgregar()
{
    RedireccionPagina('Procesos/compromisosDetalle.php');
}

// Función para ingresar a la pantalla de proceso de compromisos detalle para agregar
function UtiProcesosPaginaProcesosCompromisosDetalleAgregarDesdeGrupo(p_IdGrupo)
{
    RedireccionPagina('Procesos/compromisosDetalle.php?IdGrupo=' + p_IdGrupo);
}

// Función para ingresar a la pantalla de proceso de compromisos detalle para modificar
function UtiProcesosPaginaProcesosCompromisosDetalleModificar(p_IdCompromiso)
{
    RedireccionPagina('Procesos/compromisosDetalle.php?IdCompromiso=' + p_IdCompromiso);
}

// Función para ingresar a la pantalla de proceso de grupos
function UtiProcesosPaginaProcesosGrupos()
{
    RedireccionPagina('Procesos/grupos.php');
}

// Función para ingresar a la pantalla de proceso de grupos detalle agregar
function UtiProcesosPaginaProcesosGruposDetalleAgregar()
{
    RedireccionPagina('Procesos/gruposDetalle.php');
}

// Función para ingresar a la pantalla de proceso de grupos detalle para modificar
function UtiProcesosPaginaProcesosGruposDetalleModificar(p_IdGrupo)
{
    RedireccionPagina('Procesos/gruposDetalle.php?IdGrupo=' + p_IdGrupo);
}

// Función para ingresar a la pantalla de proceso de grupos detalle para modificar
function UtiProcesosPaginaProcesosGruposDetalleRegresar(p_IdGrupo)
{
    RedireccionPagina('Procesos/gruposDetalle.php?IdGrupo=' + p_IdGrupo);
}

// Función para ingresar a la pantalla de proceso de personas
function UtiProcesosPaginaProcesosPersonas()
{
    RedireccionPagina('Procesos/personas.php');
}

// Función para ingresar a la pantalla de proceso de personas detalle agregar
function UtiProcesosPaginaProcesosPersonasDetalleAgregar()
{
    RedireccionPagina('Procesos/personasDetalle.php');
}

// Función para ingresar a la pantalla de proceso de personas detalle agregar
function UtiProcesosPaginaProcesosPersonasDetalleAgregarDesdeVisita(accion)
{
    RedireccionPagina('Procesos/personasDetalle.php?Accion=' + accion);
}

// Función para ingresar a la pantalla de proceso de personas detalle para modificar
function UtiProcesosPaginaProcesosPersonasDetalleModificar(p_IdPersona)
{
    RedireccionPagina('Procesos/personasDetalle.php?IdPersona=' + p_IdPersona);
}

// Función para ingresar a la pantalla de proceso de seguimientos
function UtiProcesosPaginaProcesosSeguimientos(p_IdVisita)
{
    RedireccionPagina('Procesos/seguimientos.php?IdVisita=' + p_IdVisita);
}

// Función para ingresar a la pantalla de proceso de seguimientos para una visita en especifíco
function UtiProcesosPaginaProcesosSeguimientosDesdeVisita(p_IdVisita)
{
    RedireccionPagina('Procesos/seguimientos.php?IdVisita=' + p_IdVisita);
}

// Función para ingresar a la pantalla de proceso de seguimientos detalle agregar
function UtiProcesosPaginaProcesosSeguimientosDetalleAgregar(p_IdVisita)
{
    RedireccionPagina('Procesos/seguimientosDetalle.php?IdVisita=' + p_IdVisita);
}

// Función para ingresar a la pantalla de proceso de compromisos detalle para agregar
function UtiProcesosPaginaProcesosSeguimientosDetalleAgregarDesdeVisita(p_IdVisita)
{
    RedireccionPagina('Procesos/seguimientosDetalle.php?IdVisita=' + p_IdVisita);
}

// Función para ingresar a la pantalla de proceso de seguimientos detalle modificar
function UtiProcesosPaginaProcesosSeguimientosDetalleModificar(p_IdVisita, p_IdSeguimiento)
{
    RedireccionPagina('Procesos/seguimientosDetalle.php?IdVisita=' + p_IdVisita + '&IdSeguimiento=' + p_IdSeguimiento);
}

// Función para ingresar a la pantalla de proceso de visitas
function UtiProcesosPaginaProcesosVisitas()
{
    RedireccionPagina('Procesos/visitas.php');
}

// Función para ingresar a la pantalla de proceso de visitas detalle agregar
function UtiProcesosPaginaProcesosVisitasDetalleAgregar()
{
    RedireccionPagina('Procesos/visitasDetalle.php');
}

// Función para ingresar a la pantalla de proceso de visitas detalle agregar
function UtiProcesosPaginaProcesosVisitasDetalleAgregarDesdeSeguimiento(p_IdVisita)
{
    RedireccionPagina('Procesos/visitasDetalle.php?IdVisita=' + p_IdVisita);
}

// Función para ingresar a la pantalla de proceso de visitas detalle modificar
function UtiProcesosPaginaProcesosVisitasDetalleModificar(p_IdVisita)
{
    RedireccionPagina('Procesos/visitasDetalle.php?IdVisita=' + p_IdVisita);
}

// -----------------------------------------------------------------

// Función para ingresar a la pantalla reporte de compromisos
function UtiBienvenidaPaginaReportesCompromisos()
{
    RedireccionPagina('Reportes/compromisos.php');
}

// Función para ingresar a la pantalla reporte de grupos
function UtiBienvenidaPaginaReportesGrupos()
{
    RedireccionPagina('Reportes/grupos.php');
}

// Función para ingresar a la pantalla reporte de personas
function UtiBienvenidaPaginaReportesPersonas()
{
    RedireccionPagina('Reportes/personas.php');
}

// -----------------------------------------------------------------

// Función para cerrar sesión en el sistema
function UtiBienvenidaCerrarSesion()
{
    $.confirm({
        theme: 'material'
        , animationBounce: 1.5
        , animation: 'rotate'
        , closeAnimation: 'rotate'
        , title: '<span class="jconfirm-customize">Confirmación</span>' //Se aplica este estilo a los .confirm, puesto que estos los suele colocar en negrita.
        , content: '<span class="jconfirm-customize">¿Esta seguro que desea cerrar la sesión?</span>' //Se aplica este estilo a los .confirm, puesto que estos los suele colocar en negrita.
        , confirmButton: 'Aceptar'
        , confirmButtonClass: 'btn-success'
        , cancelButton: 'Cancelar'
        , cancelButtonClass: 'btn-danger'
        , confirm: function(){
            // Se define el action que será consultado desde la clase de acceso a datos
            var d = "action=cerrarSesion";

            // Enviar por Ajax a indexCAD.php
            $.ajax({
                type: "POST"
                , data: d
                , url: "../Datos/indexCAD.php"
                , success: function(a)
                {
                    $.alert({
                        theme: 'material'
                        , animationBounce: 1.5
                        , animation: 'rotate'
                        , closeAnimation: 'rotate'
                        , title: '<span class="jconfirm-customize">Información</span>' //Se aplica este estilo a los .confirm, puesto que estos los suele colocar en negrita.
                        , content: '<span class="jconfirm-customize">Ha cerrado la sesión, esperamos que vuelva pronto.</span>' //Se aplica este estilo a los .confirm, puesto que estos los suele colocar en negrita.
                        , confirmButton: 'Aceptar'
                        , confirmButtonClass: 'btn-success'
                        , confirm: function(){
                            RedireccionPagina('../index.php');
                        }
                    });
                }
            });
        }
    });
}
