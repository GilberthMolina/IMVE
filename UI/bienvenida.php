<?php
/**
 * Sistema para la Iglesia Manantiales de Vida Eterna
 * Desarrollado por: Gilberth Molina
 * Fecha creación: 26/10/16
 */

session_start();

if (!isset($_SESSION['nombreCompleto'])
    && !isset($_SESSION['token']))
{
    // Si el usuario no ha iniciado sesión se le redirige a la página de inicio de sesión
    header('location: ../index.php');
}
else
{
    $mensajeInicioBienvenida = ($_SESSION['sexo'] == 'F') ? 'Bienvenida' : 'Bienvenido';
    $nombreUsuario = explode(" ", $_SESSION['nombreCompleto'])[0] . ' ' . explode(" ", $_SESSION['nombreCompleto'])[1];
    $mensajeCompletoBienvenida = $mensajeInicioBienvenida . ' ' . $nombreUsuario;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Bienvenido</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="shorcut icon" href="Includes/images/favicon.ico" />
        <link href="Includes/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="Includes/jquerymobile/jquery.mobile-1.4.2.min.css" rel="stylesheet" type="text/css"/>
        <link href="Includes/jqueryconfirm/jquery-confirm.min.css" rel="stylesheet" type="text/css"/>
        <link href="Includes/css/styles.css" rel="stylesheet" type="text/css"/>
        <script src="Includes/jquerymobile/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="Includes/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="Includes/jquerymobile/jquery.mobile-1.4.2.min.js" type="text/javascript"></script>
        <script src="Includes/jqueryconfirm/jquery-confirm.min.js" type="text/javascript"></script>
        <script src="../Negocio/bienvenidaCN.js" type="text/javascript"></script>
        <script src="Includes/js/utilitarios.js" type="text/javascript"></script>
    </head>
    <body>
        <div data-role="page">
            <div data-role="header" data-theme="b" data-position="fixed">
                <a href="#menuIzquierda" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-btn-icon-notext ui-icon-bars"></a>
                <h1><?php echo $mensajeCompletoBienvenida ?></h1>
                <a href="#menuDerecha" class="ui-btn-right ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-right ui-btn-icon-notext ui-icon-user"></a>
            </div>
            <div data-role="panel" id="menuIzquierda" data-theme="b" data-display="reveal" data-dismissible="true">
                <div data-role="collapsible" data-theme="a">
                    <h3>Mantenimientos</h3>
                    <ul data-role="listview" data-inset="true">
                        <li>
                            <a href="#" data-transition="slidedown" onclick="">Mantenimiento #1</a>
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
                            <a href="#" data-transition="slidedown" onclick="">Mantenimiento #6</a>
                        </li>
                    </ul>
                </div>
                <div data-role="collapsible" data-theme="a">
                    <h3>Procesos</h3>
                    <ul data-role="listview" data-inset="true">
                        <li>
                            <a href="#" data-transition="slidedown" onclick="">Personas</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="">Consolidaciones</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="">Seguimientos</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="">Visitas</a>
                        </li>
                    </ul>
                </div>
                <div data-role="collapsible" data-theme="a">
                    <h3>Reportes</h3>
                    <ul data-role="listview" data-inset="true">
                        <li>
                            <a href="#" data-transition="slidedown" onclick="">Reporte #1</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="">Reporte #2</a>
                        </li>
                        <li>
                            <a href="#" data-transition="slidedown" onclick="">Reporte #3</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div data-role="panel" id="menuDerecha" data-position="right" data-theme="b" data-display="reveal" data-dismissible="true">
                <ul data-role="listview" data-inset="true">
                    <li data-role="list-divider" data-theme="a">
                        <h1 style="text-align: left; font-size: large"><?php echo $nombreUsuario ?></h1>
                    </li>
                    <li id="cerrarSesion">
                        <a href="#" data-transition="slidedown" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-power ui-btn-icon-right ui-btn-b" onclick="CerrarSesion()">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
            <div data-role="content">

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