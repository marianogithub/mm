<?php
defined('SYSPATH') OR die('No Direct Script Access');

function usarProyectoClave($usarProyecto, $name) {
    return $_POST[$usarProyecto ? "clavearq" : $name ];
}
function usarProyectoCaja($usarProyecto, $name) {
    return $_POST[$usarProyecto ? "cajaproy" : $name ];
}
function usarProyectoCert($usarProyecto, $name) {
    return $_POST[$usarProyecto ? "certproy" : $name ];
}

//datos de profesionales.-
//proyecto
$objeto->clavearq = $_POST[ "clavearq" ];
$objeto->cajaproy = $_POST[ "cajaproy" ];
$objeto->certproy = $_POST[ "certproy" ];
//Direccion Tecnica
$usarProyecto = !isset($_POST["dirTecnicaName"]);
$objeto->clavedirtec = usarProyectoClave($usarProyecto, "clavedirtec");
$objeto->cajadittec = usarProyectoCaja($usarProyecto, "cajadittec");
$objeto->certdittec = usarProyectoCert($usarProyecto, "certdittec");
//Calculo
$usarProyecto = !isset($_POST["calculoName"]);
$objeto->clavecal = usarProyectoClave($usarProyecto, "clavecal");
$objeto->cajacal = usarProyectoCaja($usarProyecto, "cajacal");
$objeto->certcal = usarProyectoCert($usarProyecto, "certcal");
//Dir. Estructura
$usarProyecto = !isset($_POST["dirEstructuraName"]);
$objeto->clavedirest = usarProyectoClave($usarProyecto, "clavedirest");
$objeto->cajadirest = usarProyectoCaja($usarProyecto, "cajadirest");
$objeto->certdirest = usarProyectoCert($usarProyecto, "certdirest");
//Proyecto Electricidad
$usarProyecto = !isset($_POST["electricidadName"]);
$objeto->claveelec = usarProyectoClave($usarProyecto, "claveelec");
$objeto->cajaelec = usarProyectoCaja($usarProyecto, "cajaelec");
$objeto->certelec = usarProyectoCert($usarProyecto, "certelec");
//Dir. Tec. Electrica
$usarProyecto = !isset($_POST["dirElectricidadName"]);
$objeto->claveelecdirtec = usarProyectoClave($usarProyecto, "claveelecdirtec");
$objeto->cajaelectdirtec = usarProyectoCaja($usarProyecto, "cajaelectdirtec");
$objeto->certelectdirtec = usarProyectoCert($usarProyecto, "certelectdirtec");
//Proyecto Sanitario
$usarProyecto = !isset($_POST["sanitarioName"]);
$objeto->clavesani = usarProyectoClave($usarProyecto, "clavesani");
$objeto->cajasani = usarProyectoCaja($usarProyecto, "cajasani");
$objeto->certasani = usarProyectoCert($usarProyecto, "certasani");
//Dir. Tec. Sanitario
$usarProyecto = !isset($_POST["dirSanitarioName"]);
$objeto->clavesanidirtec = usarProyectoClave($usarProyecto, "clavesanidirtec");
$objeto->cajasanidirtec = usarProyectoCaja($usarProyecto, "cajasanidirtec");
$objeto->certsanidirtec = usarProyectoCert($usarProyecto, "certsanidirtec");
?>