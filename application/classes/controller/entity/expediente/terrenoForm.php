<?php
defined('SYSPATH') OR die('No Direct Script Access');

//datos del terreno.-
$objeto->padronmun = $_POST[ "padronmun" ];
$objeto->nomcat = $_POST[ "nomcat" ];
$objeto->calleppal = $_POST[ "calleppal" ];
$objeto->calle1 = $_POST[ "calle1" ];
$objeto->discalle1 = $_POST[ "discalle1" ];
$objeto->calle2 = $_POST[ "calle2" ];
$objeto->discalle2 = $_POST[ "discalle2" ];
$objeto->zonater = $_POST[ "zonater" ];
$objeto->lote = $_POST[ "lote" ];
$objeto->distritot = isset($_POST[ "distritot" ]) ? $_POST[ "distritot" ] : "";
$objeto->supterr = $_POST[ "supterr" ];
$objeto->servcirc = $_POST[ "servcirc" ];
$objeto->servgas = $_POST[ "servgas" ];
$objeto->servelect = $_POST[ "servelect" ];
$objeto->servriego = $_POST[ "servriego" ];
$objeto->baldio = $_POST[ "baldio" ];
$objeto->demoler = $_POST[ "demoler" ];
?>