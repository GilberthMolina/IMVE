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
        <script src="../../Negocio/Procesos/gruposCN.js" type="text/javascript"></script>
        <script src="../Includes/js/utilitarios.js" type="text/javascript"></script>
        <!-- Fin carga de los archivos javascript -->
    </head>
    <body onload="GruposOnLoad()">
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
                        <li class="menu-actual">
                            Grupos
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
                    <div id="menuAccionesGrupos">
                        <h3 class="text-center">Acciones Masivas</h3>
                        <hr>
                        <div class="row">
                            <div class="col-ws-12">
                                <div data-role="collapsible" data-theme="b" data-content-theme="a" data-inset="true">
                                    <h2>Contactar personas</h2>
                                    <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" class="text-right" style="margin-bottom: 0px" onchange="GruposCargarPersonasGrupoAccionesSeleccion()">
                                        <input type="radio" name="filtroGruposContacto" id="sms" value="S" checked="checked">
                                        <label for="sms">SMS</label>
                                        <input type="radio" name="filtroGruposContacto" id="correo" value="C">
                                        <label for="correo">Correo</label>
                                    </fieldset>
                                    <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" class="text-right" style="margin-bottom: -10px" onchange="GruposCargarPersonasGrupoAccionesSeleccion()">
                                        <input type="radio" name="filtroGruposTipoIntegrante" id="lideres" value="S" checked="checked">
                                        <label for="lideres">Líderes</label>
                                        <input type="radio" name="filtroGruposTipoIntegrante" id="participantes" value="N">
                                        <label for="participantes">Participantes</label>
                                        <input type="radio" name="filtroGruposTipoIntegrante" id="todos" value="">
                                        <label for="todos">Todos</label>
                                    </fieldset>
                                    <br>
                                    <form class="ui-filterable" style="margin-bottom: -20px">
                                        <input id="filtroSeleccion" data-type="search" placeholder="Filtrar personas">
                                    </form>
                                    <div id="GruposAccionesSeleccion">
                                        <!-- Aquí se insertan los datos dinámicamente -->
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-ws-12">
                                            <a href="sms:" class="ui-shadow ui-btn ui-corner-all ui-btn-b ui-icon-comment ui-btn-icon-left ui-btn-inline ui-mini" id="btnGruposEnviarSMS" onclick="GruposBtnEnviarSMS()">Enviar SMS</a>
                                            <a href="mailto:" class="ui-shadow ui-btn ui-corner-all ui-btn-b ui-icon-mail ui-btn-icon-left ui-btn-inline ui-mini" id="btnGruposEnviarCorreo" onclick="GruposBtnEnviarCorreo()">Enviar Correo</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-center">Grupos</h3>
                    <hr>
                    <fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" class="text-right" onchange="GruposCargarGruposListado()">
                        <input type="radio" name="estadoGrupo" id="activas" value="A" checked="checked">
                        <label for="activas">Activos</label>
                        <input type="radio" name="estadoGrupo" id="inactivas" value="I">
                        <label for="inactivas">Inactivos</label>
                    </fieldset>
                    <form class="ui-filterable">
                        <input id="filtro" data-type="search" placeholder="Búsqueda">
                    </form>
                    <div id="divListaGrupos">
                        <!-- Aquí se insertan los datos dinámicamente -->
                    </div>
                </div>
            </div>
            <div data-role="footer" data-theme="b" data-position="fixed">
                <div data-role="navbar">
                    <ul>
                        <li><button href="#" class="ui-btn ui-shadow ui-corner-all ui-btn-icon-top ui-icon-gear" data-theme="b" onclick="GruposMostrarAccionesMasivas()">Acciones masivas</button></li>
                        <li><a href="#" data-transition="flip" data-icon="plus" data-theme="b" onclick="UtiProcesosPaginaProcesosGruposDetalleAgregar()">Agregar</a></li>
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