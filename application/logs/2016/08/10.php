<?php defined('SYSPATH') or die('No direct script access.'); ?>

2016-08-10 00:33:37 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: externo/index.php ~ SYSPATH/classes/kohana/request.php [ 760 ]
2016-08-10 00:45:45 --- ERROR: ErrorException [ 1 ]: Uncaught TypeError: Argument 1 passed to Kohana_Kohana_Exception::handler() must be an instance of Exception, instance of Error given in /var/www/html/externo/system/classes/kohana/kohana/exception.php:83
Stack trace:
#0 [internal function]: Kohana_Kohana_Exception::handler(Object(Error))
#1 {main}
  thrown ~ SYSPATH/classes/kohana/kohana/exception.php [ 83 ]