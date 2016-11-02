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
        <link rel="shorcut icon" href="../Includes/images/favicon.ico" />
        <link href="../Includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Includes/jquerymobile/jquery.mobile-1.4.2.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Includes/jqueryconfirm/jquery-confirm.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Includes/css/fonts/Lato.css" rel="stylesheet" type="text/css">
        <link href="../Includes/css/styles.css" rel="stylesheet" type="text/css"/>
        <script src="../Includes/jquerymobile/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="../Includes/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../Includes/jquerymobile/jquery.mobile-1.4.2.min.js" type="text/javascript"></script>
        <script src="../Includes/jqueryconfirm/jquery-confirm.min.js" type="text/javascript"></script>
        <script src="../../Negocio/Utilitarios/procesos.js" type="text/javascript"></script>
        <script src="../../Negocio/Procesos/personasCN.js" type="text/javascript"></script>
        <script src="../../Negocio/Mantenimientos/provinciasCN.js" type="text/javascript"></script>
        <script src="../../Negocio/Mantenimientos/cantonesCN.js" type="text/javascript"></script>
        <script src="../../Negocio/Mantenimientos/distritosCN.js" type="text/javascript"></script>
        <script src="../Includes/js/utilitarios.js" type="text/javascript"></script>
    </head>
    <body>
        <div data-role="page">
            <div data-role="header" data-theme="b" data-position="fixed">
                <a href="#menuIzquierda" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-btn-icon-notext ui-icon-bars"></a>
                <h1>Sistema IMVE</h1>
                <a href="#menuDerecha" class="ui-btn-right ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-btn-icon-notext ui-icon-user"></a>
            </div>
            <div data-role="panel" id="menuIzquierda" data-theme="b" data-display="reveal" data-dismissible="true">
                <ul data-role="listview" data-inset="true">
                    <li>
                        <a href="#" class="menu-inicio" data-transition="slidedown" onclick="UtiProcesosPaginaBienvenida()">Inicio</a>
                    </li>
                </ul>
                <div data-role="collapsible" data-theme="a">
                    <h3>Mantenimientos</h3>
                    <ul data-role="listview">
                        <li>
                            <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaMantenimientosUsuarios()">Usuarios</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="">Mantenimiento #2</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="">Mantenimiento #3</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="">Mantenimiento #4</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="">Mantenimiento #5</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="">Mantenimiento N</a>
                        </li>
                    </ul>
                </div>
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
                            <a href="#" data-transition="slidedown" onclick="UtiProcesosPaginaProcesosSeguimientos()">Seguimientos</a>
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
                            <a href="#" style="font-size: 15px" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-edit ui-btn-icon-right ui-btn-b" onclick="UtiProcesosPaginaCambiarContrasena()">Cambiar contraseña</a>
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
                            <h3 class="text-center">Grupos</h3>
                            <hr>
                            <form method="post" action="#" id="compromisos" enctype="multipart/form-data">
    
                            </form>
                        </div>
                        <div class="col-sm-2 col-md-3 col-lg-3"></div>
                    </div>
                </div>
            </div>
            <div data-role="footer" data-theme="b" data-position="fixed">
                <div data-role="navbar">
                    <ul>
                        <li><a href="#" data-transition="flip" data-icon="carat-l" data-theme="b" onclick="UtiProcesosPaginaProcesosGrupos()">Atrás</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
/**
 * ob_end_flush(): Se utilza para limpiar las cabeceras puesto que daban conflicto a la hora de redireccionar al index,
 * si el usuario no habia iniciado sesión en la aplicación
 */
ob_end_flush();
?>