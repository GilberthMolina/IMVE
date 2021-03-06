<?php
/**
 * Sistema para la Iglesia Manantiales de Vida Eterna
 * Desarrollado por: Gilberth Molina
 * Fecha creación: 17/11/16
 */

session_start();

error_reporting(1);
ini_set('display_errors', 1);

// Se realiza el llamado a la clase de conexion
require("../conexionMySQL.php");
$db = new MySQL();

// Se realiza la llamada de la librería para generar PDF
require_once('../Utilitarios/MPDF57/mpdf.php');

// Genera el reporte de compromisos por grupo
if (isset($_GET['fechaInicio']) && isset($_GET['fechaFin']) && isset($_GET['tipoResponsable'])) {
    try {
        $fechaInicio     = $_GET['fechaInicio'];
        $fechaFin        = $_GET['fechaFin'];
        $tipoResponsable = $_GET['tipoResponsable'];

        $sqlCompromiso      = "CALL ReporteCompromisosResponsables('$fechaInicio','$fechaFin','$tipoResponsable')";
        $consultaCompromiso = $db->consulta($sqlCompromiso);

        // Encabezado del reporte
        $html =
            '<div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 style="margin-top: 13px" class="text-center">Iglesia Manantiales de Vida Eterna</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-ws-12 col-sm-10">
                        <h3 class="text-center">Reporte de compromisos con sus respectivas fechas y responsables</h3>
                        <hr>
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th colspan="3" class="text-center" style="background-color: #008200; color: #FFFFFF; height: 30px">Filtros proporcionados</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="background-color: #1164b4; color: #FFFFFF; height: 30px">Fecha inicio</th>
                                    <th class="text-center" style="background-color: #1164b4; color: #FFFFFF; height: 30px">Fecha fin</th>
                                    <th class="text-center" style="background-color: #1164b4; color: #FFFFFF; height: 30px">Responsable</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td class="text-center" style="height: 30px">' . date_format(date_create($fechaInicio), 'd-m-Y') . '</td>
                                    <td class="text-center" style="height: 30px">' . date_format(date_create($fechaFin), 'd-m-Y') . '</td>';
                                    if($tipoResponsable == 'P' || $tipoResponsable == 'p'){
                                        $html .= '<td class="text-center" style="height: 30px">Personas</td>';
                                    }else if($tipoResponsable == 'G' || $tipoResponsable == 'g'){
                                        $html .= '<td class="text-center" style="height: 30px">Grupos</td>';
                                    }
                                    else{
                                        $html .= '<td class="text-center" style="height: 30px">Todos</td>';
                                    }
                                $html .= '</tr>
                            </tbody>
                        </table>';

        // Contenido del reporte
        if($db->num_rows($consultaCompromiso) != 0)
        {
            $html .=
                '<table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="background-color: #008200; color: #FFFFFF; vertical-align: middle; height: 50px">Compromiso</th>
                            <th class="text-center" style="background-color: #008200; color: #FFFFFF; vertical-align: middle; height: 50px">Tipo de compromiso</th>
                            <th class="text-center" style="background-color: #008200; color: #FFFFFF; vertical-align: middle; height: 50px">Ministerio</th>';
                            if($tipoResponsable == 'P' || $tipoResponsable == 'p'){
                                $html .= '<th class="text-center" style="background-color: #008200; color: #FFFFFF; vertical-align: middle; height: 50px">Persona</th>';
                            }else if($tipoResponsable == 'G' || $tipoResponsable == 'g'){
                                $html .= '<th class="text-center" style="background-color: #008200; color: #FFFFFF; vertical-align: middle; height: 50px">Grupo</th>';
                            }
                            else{
                                $html .= '<th class="text-center" style="background-color: #008200; color: #FFFFFF; vertical-align: middle; height: 50px">Reponsable</th>';
                            }

                  $html .= '<th class="text-center" style="background-color: #008200; color: #FFFFFF; vertical-align: middle; height: 50px">Fecha y hora de inicio</th>
                            <th class="text-center" style="background-color: #008200; color: #FFFFFF; vertical-align: middle; height: 50px">Fecha y hora de finalización</th>
                            <th class="text-center" style="background-color: #008200; color: #FFFFFF; vertical-align: middle; height: 50px">Lugar</th>
                            <th class="text-center" style="background-color: #008200; color: #FFFFFF; vertical-align: middle; height: 50px">Estado del compromiso</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">';
            if($db->num_rows($consultaCompromiso) != 0)
            {
                while($resultadosCompromiso = $db->fetch_array($consultaCompromiso))
                {
                    $html .= '<tr>
                                <td class="text-center" style="height: 30px">' . utf8_encode($resultadosCompromiso["Compromiso"]) . '</td>
                                <td class="text-center" style="height: 30px">' . utf8_encode($resultadosCompromiso["TipoCompromiso"]) . '</td>
                                <td class="text-center" style="height: 30px">' . utf8_encode($resultadosCompromiso["Ministerio"]) . '</td>
                                <td class="text-center" style="height: 30px">' . utf8_encode($resultadosCompromiso["Responsable"]) . '</td>
                                <td class="text-center" style="height: 30px">' . date_format(date_create($resultadosCompromiso["FechaInicio"]), 'd-m-Y') . ' ' . date_format(date_create(explode(' ', $resultadosCompromiso["FechaInicio"])[1]), 'g:ia') . '</td>
                                <td class="text-center" style="height: 30px">' . date_format(date_create($resultadosCompromiso["FechaFinal"]), 'd-m-Y') . ' ' . date_format(date_create(explode(' ', $resultadosCompromiso["FechaFinal"])[1]), 'g:ia') . '</td>
                                <td class="text-center" style="height: 30px">' . utf8_encode($resultadosCompromiso["Lugar"]) . '</td>
                                <td class="text-center" style="height: 30px">' . utf8_encode($resultadosCompromiso["Estado"]) . '</td>
                            </tr>';
                }
            }
            $html .= '</tbody>
                    </table>
            </div>';
        }
        else
        {
            $html .=
                '<h4 class="text-center"><b>Lo sentimos, no hay datos para los filtros proporcionados.</b></h4>
                    </div>
                    <div class="col-sm-1"></div>
                </div>';
        }

        // Final del reporte
        $html .= '</div>
                <div class="col-sm-1"></div>
            </div>';

        // Variables utilizadas en el header y footer
        $nombreSistema = 'Sistema IMVE';
        $nombreIglesia = 'Iglesia Manantiales de Vida Eterna';

        // Se procede a generar el PDF con el header, el contenido y footer
        $mpdf = new mPDF('c', 'Letter-L');
        $mpdf->setHeader('|' . $nombreSistema . '|');
        date_default_timezone_set('America/Costa_Rica');
        $mpdf->setFooter(date('d-m-Y g:ia') . '|' . $nombreIglesia . '|' . 'Página ' . '{PAGENO}');
        // Se configura el CSS a utilizar
        $css = file_get_contents('../../UI/Includes/bootstrap/css/bootstrap.min.css');
        $mpdf->writeHTML($css, 1);
        $mpdf->writeHTML($html,2);
        // Se coloca el nombre del reporte, y configura para que sea desplegado en el navegador web
        $mpdf->Output('ReporteCompromisos.pdf', 'I');
        // Se coloca el nombre del reporte, y configura para que sea descargado inmediantamente
        //$mpdf->Output('ReporteCompromisos.pdf', 'D');

    }
    catch (Exception $e) {
        echo 'Excepción capturada: ', $e->getMessage(), "\n";
    }
}
