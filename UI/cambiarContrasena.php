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
require("Includes/utilitarios/bienvenida.php");
$utilitarios = new UtilitariosBienvenida();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>IMVE | Iglesia Manantiales de Vida Eterna</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!-- Forzar a no cargar datos de la caché -->
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <!-- Fin forzar a no cargar datos de la caché -->
        <!-- Se carga el favicon -->
        <link rel="shorcut icon" href="Includes/images/favicon.ico"/>
        <!-- Fin carga el favicon -->
        <!-- Se cargan las hojas de estilo -->
        <link href="Includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="Includes/jquerymobile/jquery.mobile-1.4.2.min.css" rel="stylesheet" type="text/css"/>
        <link href="Includes/jqueryconfirm/jquery-confirm.min.css" rel="stylesheet" type="text/css"/>
        <link href="Includes/jqueryui/jquery-ui-1.12.1.css" rel="stylesheet" type="text/css"/>
        <link href="Includes/css/fonts/Lato.css" rel="stylesheet" type="text/css">
        <link href="Includes/css/styles.css" rel="stylesheet" type="text/css"/>
        <!-- Fin carga de las hojas de estilo -->
        <!-- Se cargan los archivos javascript -->
        <script src="Includes/jquerymobile/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="Includes/jqueryui/jquery-ui-1.12.1.js" type="text/javascript"></script>
        <script src="Includes/jquerymobile/jquery.mobile-1.4.2.min.js" type="text/javascript"></script>
        <script src="Includes/jqueryconfirm/jquery-confirm.min.js" type="text/javascript"></script>
        <script src="Includes/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../Negocio/Utilitarios/bienvenida.js" type="text/javascript"></script>
        <script src="../Negocio/cambiarContrasenaCN.js" type="text/javascript"></script>
        <script src="Includes/js/utilitarios.js" type="text/javascript"></script>
        <!-- Fin carga de los archivos javascript -->
    </head>
    <body>
        <div data-role="page">
            <div data-role="header" data-theme="b" data-position="fixed">
                <a href="#menuIzquierda" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-btn-icon-notext ui-icon-bars"></a>
                <h1>Sistema IMVE</h1>
                <a href="#menuDerecha" class="ui-btn-right ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-btn-icon-notext ui-icon-user"></a>
            </div>
            <div data-role="panel" id="menuIzquierda" data-theme="b" data-display="reveal" data-dismissible="true">
                <ul data-role="listview" data-inset="true" data-icon="false" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-left ui-icon-home">
                    <li>
                        <a href="#" class="menu-inicio" data-transition="slidedown" onclick="UtiBienvenidaPaginaBienvenida()">Inicio</a>
                    </li>
                </ul>
                <?php if($utilitarios->ObtenerRolUsuario() == "SuperAdmin" || $utilitarios->ObtenerRolUsuario() == "Administrador"){ ?>
                    <div data-role="collapsible" data-theme="a">
                        <h3>Mantenimientos</h3>
                        <ul data-role="listview">
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiBienvenidaPaginaMantenimientosCategoriasPersonas()">Categorías de personas</a>
                            </li>
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiBienvenidaPaginaMantenimientosCategoriasGrupos()">Categorías de grupos</a>
                            </li>
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiBienvenidaPaginaMantenimientosMinisterios()">Ministerios</a>
                            </li>
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiBienvenidaPaginaMantenimientosRolesUsuarios()">Roles de usuarios</a>
                            </li>
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiBienvenidaPaginaMantenimientosTiposCompromisos()">Tipos de compromisos</a>
                            </li>
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiBienvenidaPaginaMantenimientosTiposRelaciones()">Tipos de relaciones</a>
                            </li>
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiBienvenidaPaginaMantenimientosTiposSeguimientos()">Tipos de seguimientos</a>
                            </li>
                            <li>
                                <a href="#" data-transition="slidedown" onclick="UtiBienvenidaPaginaMantenimientosUsuarios()">Usuarios</a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
                <div data-role="collapsible" data-theme="a">
                    <h3>Procesos</h3>
                    <ul data-role="listview">
                        <li>
                            <a href="#" data-transition="slidedown" onclick="UtiBienvenidaPaginaCompromisos()">Compromisos</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="UtiBienvenidaPaginaGrupos()">Grupos</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="UtiBienvenidaPaginaPersonas()">Personas</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="UtiBienvenidaPaginaVisitas()">Visitas</a>
                        </li>
                    </ul>
                </div>
                <div data-role="collapsible" data-theme="a">
                    <h3>Reportes</h3>
                    <ul data-role="listview">
                        <li>
                            <a href="#" data-transition="slidedown" onclick="UtiBienvenidaPaginaReportesCompromisos()">Compromisos</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="UtiBienvenidaPaginaReportesGrupos()">Grupos</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="UtiBienvenidaPaginaReportesPersonas()">Personas</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div data-role="panel" id="menuDerecha" data-position="right" data-theme="b" data-display="reveal" data-dismissible="true">
                <div data-role="collapsible" data-theme="a">
                    <h3><?php echo $utilitarios->ObtenerNombreUsuario() ?></h3>
                    <ul data-role="listview">
                        <li>
                            <a href="#" style="font-size: 15px" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-edit ui-btn-icon-right ui-btn-b" onclick="UtiBienvenidaPaginaCambiarContrasena()">Cambiar mi contraseña</a>
                        </li>
                        <li>
                            <a href="#" style="font-size: 15px" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-power ui-btn-icon-right ui-btn-b" onclick="UtiBienvenidaCerrarSesion()">Cerrar sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div data-role="content">
                <div class="container">
                    <h3 class="text-center">Cambiar su contraseña</h3>
                    <hr>
                    <div class="row">
                        <div class="col-sm-2 col-md-3 col-lg-3"></div>
                        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
                            <form method="post" action="#" id="restablecerContrasena">
                                <div>
                                    <label for="txtContrasenaNueva">Contraseña nueva:<img src="Includes/images/warning.ico" alt="Necesario" height="24px" width="24px" align="right"></label>
                                    <input type="password" name="txtContrasenaNueva" id="txtContrasenaNueva" maxlength="50" data-clear-btn="true">
                                </div>
                                <br>
                                <div>
                                    <label for="txtConfirmarContrasenaNueva">Confirmar contraseña:<img src="Includes/images/warning.ico" alt="Necesario" height="24px" width="24px" align="right"></label>
                                    <input type="password" name="txtConfirmarContrasenaNueva" id="txtConfirmarContrasenaNueva" maxlength="50" data-clear-btn="true">
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-1"></div>
                                    <div class="col-xs-10">
                                        <a href="#" id="btnCambiar" data-role="button" data-theme="b" class="ui-btn ui-shadow ui-corner-all ui-btn-b ui-btn-icon-left ui-icon-edit" onclick="CambiarContrasena()">Cambiar</a>
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
                    <ul>
                        <li>
                            <h6 style="text-align: center">&nbsp;</h6>
                        </li>
                    </ul>
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