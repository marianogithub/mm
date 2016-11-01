<?php
defined('SYSPATH') OR die('No Direct Script Access');

//datos del titular.-
$objeto->titular = $_POST[ "titular" ];
$objeto->dni = $_POST[ "dni" ];
$objeto->domicilio = $_POST[ "domicilio" ];
$objeto->zona = $_POST[ "zona" ];
$objeto->manzanaLote = $_POST[ "manzanaLote" ];
$objeto->distrito = isset($_POST[ "distrito" ]) ? $_POST[ "distrito" ] : "";
$objeto->departemento = $_POST[ "departemento" ];
//datos del poseedor.-
$objeto->poseedor = $_POST[ "poseedor" ];
$objeto->dnip = $_POST[ "dnip" ];
$objeto->domiciliop = $_POST[ "domiciliop" ];
$objeto->zonap = $_POST[ "zonap" ];
$objeto->manzanaLotep = $_POST[ "manzanaLotep" ];
$objeto->distritop = isset($_POST[ "distritop" ]) ? $_POST[ "distritop" ] : "";
$objeto->departementop = $_POST[ "departementop" ];
?>