<?php
/**
 * Sistema para la Iglesia Manantiales de Vida Eterna
 * Desarrollado por: Gilberth Molina
 * Fecha creación: 26/10/16
 */

// Se realiza el llamado a la clase de obtener datos de la sesion actual
require("UI/Includes/utilitarios/VERSION.php");
$versionApp = new VersionAPP();

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
        <link rel="shorcut icon" href="UI/Includes/images/favicon.ico" />
        <!-- Fin carga el favicon -->
        <!-- Se cargan las hojas de estilo -->
        <link href="UI/Includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="UI/Includes/jquerymobile/jquery.mobile-1.4.2.min.css" rel="stylesheet" type="text/css"/>
        <link href="UI/Includes/jqueryconfirm/jquery-confirm.min.css" rel="stylesheet" type="text/css"/>
        <link href="UI/Includes/css/fonts/Lato.css" rel="stylesheet" type="text/css">
        <link href="UI/Includes/css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="UI/Includes/css/animate.css" rel="stylesheet" type="text/css"/>
        <!-- Fin carga de las hojas de estilo -->
        <!-- Se cargan los archivos javascript -->
        <script src="UI/Includes/jquerymobile/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="UI/Includes/jquerymobile/jquery.mobile-1.4.2.min.js" type="text/javascript"></script>
        <script src="UI/Includes/jqueryconfirm/jquery-confirm.min.js" type="text/javascript"></script>
        <script src="UI/Includes/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="Negocio/indexCN.js" type="text/javascript"></script>
        <script src="UI/Includes/js/utilitarios.js" type="text/javascript"></script>
        <!-- Fin carga de los archivos javascript -->
    </head>
    <body>
        <div data-role="page">
            <div data-role="header" data-theme="b" data-position="fixed">
                <h3>Sistema IMVE</h3>
            </div>
            <div data-role="content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2 col-md-3 col-lg-3"></div>
                        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
                            <h3 class="text-center">Inicio de sesión</h3>
                            <hr>
                            <form method="post" action="#" id="inicioSesion">
                                <div>
                                    <label for="txtIdentificacion">Identificación:<img src="UI/Includes/images/warning.ico" alt="Necesario" height="24px" width="24px" align="right"></label>
                                    <input type="text" name="txtIdentificacion" id="txtIdentificacion" placeholder="Ejm: 102220333" maxlength="30" onKeyPress="return SoloNumeros(event)" onblur="EsNumero($('#txtIdentificacion').val(), 'La identificación')" data-clear-btn="true">
                                </div>
                                <br>
                                <div>
                                    <label for="txtContrasena">Contraseña:<img src="UI/Includes/images/warning.ico" alt="Necesario" height="24px" width="24px" align="right"></label>
                                    <input type="password" name="txtContrasena" id="txtContrasena" maxlength="50" data-clear-btn="true">
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-1"></div>
                                    <div class="col-xs-10">
                                        <a href="#" id="btnIngresar" data-role="button" data-transition="pop" data-theme="b" class="ui-btn ui-shadow ui-corner-all ui-btn-b ui-btn-icon-left ui-icon-check" onclick="IniciarSesion()">Ingresar</a>
                                        <a href="#" id="btnRegistrarse" data-role="button" data-transition="slidefade" data-theme="b" class="ui-btn ui-shadow ui-corner-all ui-btn-b ui-btn-icon-left ui-icon-lock" onclick="PaginaRestablecerContrasena()">¿Olvidó su contraseña?</a>
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
                            <a href="#acercade" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-top ui-icon-info" data-rel="dialog" data-transition="slidedown">Acerca de</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div data-role="page" id="acercade" data-theme="a">
            <div data-role="header" data-theme="b">
                <h1>Acerca de</h1>
            </div>
            <div data-role="content">
                <h2 class="text-center" style="margin-top: 0px">Iglesia Manantiales de Vida Eterna</h2>
                <p class="text-justify" style="margin-top: 20px">
                    <strong>Misión:</strong> Manantiales de Vida Eterna, ministerio Cristo céntrico, llamado a ganar Cartago y Costa Rica para el reino de Dios. Proclama bajo la unción del Espíritu Santo, el evangelio que salva para vida eterna.
                </p>
                <br>
                <p class="text-justify" style="margin-top: -10px">
                    <strong>Visión:</strong> Ser una Iglesia reconocida como un ministerio de alcance sólido y edificado conforme al carácter de Jesucristo, logrando la excelencia mediante la dirección del Señor.
                </p>
                <hr>
                <p class="text-center" style="margin-top: -10px">
                    <strong>Desarrollador:</strong> Gilbert Molina Castrillo.
                </p>
                <p class="text-center" style="margin-top: -10px">
                    <strong>Contacto:</strong> <a href="mailto:gmolinac@outlook.com">gmolinac@outlook.com</a>.
                </p>
                <p class="text-center" style="margin-top: 10px">
                    <strong><?php echo $versionApp->obtenerNombreApp() . ' ' . $versionApp->obtenerVersionApp()?></strong>
                </p>
            </div>
        </div>
    </body>
</html>