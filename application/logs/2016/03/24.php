<?php defined('SYSPATH') or die('No direct script access.'); ?>

2016-03-24 15:51:06 --- ERROR: Database_Exception [ 1451 ]: Cannot delete or update a parent row: a foreign key constraint fails (`php`.`factibilidad`, CONSTRAINT `fk_fact_expediente` FOREIGN KEY (`idexpediente`) REFERENCES `expedientes` (`id`)) [ DELETE FROM `expedientes` WHERE `id` = '19' ] ~ MODPATH/database/classes/kohana/database/mysql.php [ 181 ]
2016-03-24 15:53:33 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH/classes/controller/base/expedientesbase.php [ 43 ]
2016-03-24 15:58:17 --- ERROR: Kohana_Exception [ 0 ]: The getCantidadFactibilidad property does not exist in the Model_Expedientes class ~ MODPATH/orm/classes/kohana/orm.php [ 682 ]
2016-03-24 16:27:55 --- ERROR: ErrorException [ 2048 ]: Declaration of Controller_Temporales::action_index() should be compatible with Controller_Expedientesbase::action_index($objeto = NULL) ~ APPPATH/classes/controller/temporales.php [ 11 ]
2016-03-24 16:29:12 --- ERROR: ErrorException [ 1 ]: Call to a member function getErrores() on a non-object ~ APPPATH/views/lists/temporalesList.php [ 4 ]
2016-03-24 18:33:47 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 94 ]
2016-03-24 18:34:39 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 94 ]
2016-03-24 18:35:33 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL inspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 94 ]
2016-03-24 18:37:33 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 94 ]
2016-03-24 18:38:04 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 94 ]
2016-03-24 18:38:04 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 94 ]
2016-03-24 18:38:04 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 94 ]
2016-03-24 18:38:17 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 94 ]
2016-03-24 18:38:18 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 94 ]
2016-03-24 18:38:18 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 94 ]
2016-03-24 18:38:18 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 94 ]
2016-03-24 18:38:19 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 94 ]
2016-03-24 18:39:12 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 95 ]
2016-03-24 18:39:37 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 95 ]
2016-03-24 18:39:38 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 95 ]
2016-03-24 18:39:38 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 95 ]
2016-03-24 18:39:44 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL Expedienteadmin/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 95 ]
2016-03-24 18:40:03 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL InspeccionesReporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 95 ]
2016-03-24 18:40:11 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL Inspeccionesreporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 95 ]
2016-03-24 18:40:35 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL Inspeccionesreporte/index was not found on this server. ~ SYSPATH/classes/kohana/request/client/internal.php [ 95 ]
2016-03-24 18:41:22 --- ERROR: ErrorException [ 2 ]: Missing argument 1 for Model_Inspecciones::filtrarInspeccionesSolicitadas(), called in /var/www/html/sge/sge/externo/application/classes/controller/inspeccionesreporte.php on line 28 and defined ~ APPPATH/classes/model/inspecciones.php [ 54 ]
2016-03-24 18:42:03 --- ERROR: ErrorException [ 2 ]: Missing argument 1 for Model_Inspecciones::filtrarInspeccionesSolicitadas(), called in /var/www/html/sge/sge/externo/application/classes/controller/inspeccionesreporte.php on line 28 and defined ~ APPPATH/classes/model/inspecciones.php [ 54 ]
2016-03-24 18:47:50 --- ERROR: ErrorException [ 8 ]: Undefined variable: expnumeroFiltro ~ APPPATH/views/reporte/inspeccionesHTML.php [ 12 ]
2016-03-24 18:50:42 --- ERROR: ErrorException [ 1 ]: Call to undefined method Controller_Inspeccionesreporte::getDistritos() ~ APPPATH/classes/controller/inspeccionesreporte.php [ 27 ]
2016-03-24 18:51:15 --- ERROR: Kohana_Exception [ 0 ]: View variable is not set: body ~ SYSPATH/classes/kohana/view.php [ 171 ]
2016-03-24 18:52:03 --- ERROR: ErrorException [ 8 ]: Undefined variable: expnumeroFiltro ~ APPPATH/views/reporte/inspeccionesHTML.php [ 12 ]
2016-03-24 18:52:33 --- ERROR: ErrorException [ 8 ]: Use of undefined constant fechaInicial - assumed 'fechaInicial' ~ APPPATH/views/reporte/inspeccionesHTML.php [ 12 ]
2016-03-24 18:52:50 --- ERROR: ErrorException [ 8 ]: Use of undefined constant fechaInicial - assumed 'fechaInicial' ~ APPPATH/views/reporte/inspeccionesHTML.php [ 12 ]
2016-03-24 19:03:55 --- ERROR: ErrorException [ 8 ]: Use of undefined constant fechaInicial - assumed 'fechaInicial' ~ APPPATH/views/reporte/inspeccionesHTML.php [ 14 ]
2016-03-24 19:04:17 --- ERROR: ErrorException [ 8 ]: Use of undefined constant fechaInicial - assumed 'fechaInicial' ~ APPPATH/views/reporte/inspeccionesHTML.php [ 14 ]
2016-03-24 19:38:53 --- ERROR: ErrorException [ 4 ]: syntax error, unexpected ':' ~ APPPATH/views/reporte/inspeccionesHTML.php [ 38 ]