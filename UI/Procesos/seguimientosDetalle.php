<?php
/**
 * Sistema para la Iglesia Manantiales de Vida Eterna
 * Desarrollado por: Gilberth Molina
 * Fecha creación: 01/11/16
 */

/**
 * ob_start(): Se utiliza para limpiar las cabeceras puesto que daban conflicto a la hora de redireccionar al index,
 * si el usuario no habia iniciado sesión en la aplicación
 */
ob_start();

// Se realiza el llamado a la clase de obtener datos de la sesion actual
require("../Includes/utilitarios/procesos.php");
$utilitarios = new UtilitariosProcesos();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sistema IMVE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!-- Forzar a no cargar datos de la caché -->
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <!-- Fin forzar a no cargar datos de la caché -->
        <!-- Se carga el favicon -->
        <link rel="shorcut icon" href="../Includes/images/favicon.ico" />
        <!-- Fin carga el favicon -->
        <!-- Se cargan las hojas de estilo -->
        <link href="../Includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Includes/jquerymobile/jquery.mobile-1.4.2.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Includes/jqueryconfirm/jquery-confirm.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Includes/css/fonts/Lato.css" rel="stylesheet" type="text/css">
        <link href="../Includes/css/styles.css" rel="stylesheet" type="text/css"/>
        <!-- Fin carga de las hojas de estilo -->
        <!-- Se cargan los archivos javascript -->
        <script src="../Includes/jquerymobile/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="../Includes/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../Includes/jquerymobile/jquery.mobile-1.4.2.min.js" type="text/javascript"></script>
        <script src="../Includes/jqueryconfirm/jquery-confirm.min.js" type="text/javascript"></script>
        <script src="../../Negocio/Utilitarios/procesos.js" type="text/javascript"></script>
        <script src="../../Negocio/Procesos/seguimientosCN.js" type="text/javascript"></script>
        <script src="../Includes/js/utilitarios.js" type="text/javascript"></script>
        <!-- Fin carga de los archivos javascript -->
    </head>
    <body onload="SeguimientosDetalleOnLoad()">
        <div data-role="page">
            <div data-role="header" data-theme="b" data-position="fixed">
                <a href="#menuIzquierda" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-btn-icon-notext ui-icon-bars"></a>
                <h1>Sistema IMVE</h1>
                <a href="#menuDerecha" class="ui-btn-right ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-btn-icon-notext ui-icon-user"></a>
            </div>
            <div data-role="panel" id="menuIzquierda" data-theme="b" data-display="reveal" data-dismissible="true">
                <ul data-role="listview" data-inset="true" data-icon="false" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-home">
                    <li>
                        <a href="#" class="menu-inicio" data-transition="slidedown" onclick="UtiProcesosPaginaBienvenida()">Inicio</a>
                    </li>
                </ul>
                <?php if($utilitarios->ObtenerRolUsuario() == "SuperAdmin" || $utilitarios->ObtenerRolUsuario() == "Administrador"){ ?>
                    <div data-role="collapsible" data-theme="a">
                        <h3>Mantenimientos</h3>
                        <ul data-role="listview">
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaMantenimientosCategoriasPersonas()">Categorías de personas</a>
                            </li>
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaMantenimientosCategoriasGrupos()">Categorías de grupos</a>
                            </li>
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaMantenimientosMinisterios()">Ministerios</a>
                            </li>
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaMantenimientosRolesUsuarios()">Roles de usuarios</a>
                            </li>
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaMantenimientosTiposCompromisos()">Tipos de compromisos</a>
                            </li>
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaMantenimientosTiposRelaciones()">Tipos de relaciones</a>
                            </li>
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaMantenimientosTiposSeguimientos()">Tipos de seguimientos</a>
                            </li>
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaMantenimientosUsuarios()">Usuarios</a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
                <div data-role="collapsible" data-theme="a">
                    <h3>Procesos</h3>
                    <ul data-role="listview">
                        <li>
                            <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaProcesosCompromisos()">Compromisos</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaProcesosGrupos()">Grupos</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaProcesosPersonas()">Personas</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaProcesosVisitas()">Visitas</a>
                        </li>
                    </ul>
                </div>
                <div data-role="collapsible" data-theme="a">
                    <h3>Reportes</h3>
                    <ul data-role="listview">
                        <li>
                            <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaReportesCompromisos()">Compromisos</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaReportesGrupos()">Grupos</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaReportesPersonas()">Personas</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div data-role="panel" id="menuDerecha" data-position="right" data-theme="b" data-display="reveal" data-dismissible="true">
                <div data-role="collapsible" data-theme="a">
                    <h3><?php echo $utilitarios->ObtenerNombreUsuario() ?></h3>
                    <ul data-role="listview">
                        <li>
                            <a href="#" style="font-size: 15px" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-edit ui-btn-icon-right ui-btn-b" onclick="UtiProcesosPaginaCambiarContrasena()">Cambiar mi contraseña</a>
                        </li>
                        <li>
                            <a href="#" style="font-size: 15px" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-power ui-btn-icon-right ui-btn-b" onclick="UtiProcesosCerrarSesion()">Cerrar sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div data-role="content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2 col-md-3 col-lg-3"></div>
                        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
                            <h3 class="text-center">Mantenimiento de Seguimientos</h3>
                            <hr>
                            <form method="post" action="#" id="seguimientosDetalle">
                                <div>
                                    <label for="cboIdTipoSeguimiento">Tipo de seguimiento:<img src="../Includes/images/warning.ico" alt="Necesario" height="24px" width="24px" align="right"></label>
                                    <select name="cboIdTipoSeguimiento" id="cboIdTipoSeguimiento">
                                        <option value="0">Seleccione</option>
                                        <!-- Aquí se insertan los datos dinámicamente -->
                                    </select>
                                </div>
                                <br>
                                <div>
                                    <label for="txtDescripcionSeguimiento">Descripción:<img src="../Includes/images/warning.ico" alt="Necesario" height="24px" width="24px" align="right"></label>
                                    <input type="text" name="txtDescripcionSeguimiento" id="txtDescripcionSeguimiento" maxlength="50" data-clear-btn="true"/>
                                </div>
                                <br>
                                <div>
                                    <label for="txtFechaPropuesta">Fecha propuesta de realización:<img src="../Includes/images/warning.ico" alt="Necesario" height="24px" width="24px" align="right"></label>
                                    <input type="date" name="txtFechaPropuesta" id="txtFechaPropuesta" data-clear-btn="true" value="" />
                                </div>
                                <br>
                                <div>
                                    <label for="txtObservacionesSeguimiento">Observaciones:<img src="../Includes/images/warning.ico" alt="Necesario" height="24px" width="24px" align="right"></label>
                                    <textarea name="txtObservacionesSeguimiento" id="txtObservacionesSeguimiento" maxlength="250" placeholder="Observaciones del seguimiento."></textarea>
                                </div>
                                <br>
                                <div>
                                    <label for="cboEstadoSeguimiento">Estado:</label>
                                    <select name="cboEstadoSeguimiento" id="cboEstadoSeguimiento" disabled>
                                        <option value="0">Seleccione</option>
                                        <option value="N" selected>Abierto</option>
                                        <option value="S">Cerrado</option>
                                    </select>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-1"></div>
                                    <div class="col-xs-10">
                                        <button type="button" id="btnAceptar" data-theme="b" onclick="SeguimientosRegistrarSeguimiento(ObtenerParametroPorNombre('IdVisita'))" class="ui-btn ui-shadow ui-corner-all ui-btn-b ui-btn-icon-left ui-icon-plus">Agregar</button>
                                    </div>
                                    <div class="col-xs-1"></div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-2 col-md-3 col-lg-3"></div>
                    </div>
                </div>
            </div>
            <div data-role="footer" data-theme="b" data-position="fixed">
                <div data-role="navbar">
                    <div id="NuevoSeguimiento">
                        <ul>
                            <li><a href="#" data-transition="flip" data-icon="carat-l" data-theme="b" onclick="UtiProcesosPaginaProcesosSeguimientos()">Atrás</a></li>
                        </ul>
                    </div>
                    <div id="DetalleSeguimiento">
                        <ul>
                            <li><a href="#" data-transition="flip" data-icon="carat-l" data-theme="b" onclick="UtiProcesosPaginaProcesosSeguimientos(ObtenerParametroPorNombre('IdVisita'))">Seguimientos</a></li>
                            <li><a href="#" data-transition="flip" data-icon="carat-r" data-theme="b" onclick="UtiProcesosPaginaProcesosVisitasDetalleAgregarDesdeSeguimiento(ObtenerParametroPorNombre('IdVisita'))">Volver a la Visita</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
/**
 * ob_end_flush(): Se utiliza para limpiar las cabeceras puesto que daban conflicto a la hora de redireccionar al index,
 * si el usuario no habia iniciado sesión en la aplicación
 */
ob_end_flush();
?>