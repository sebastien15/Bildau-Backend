<?php

require_once('./Modals/ReportModel.php');
require_once('./controller/ReportController.php');
require_once('./router.php');

$controller = new ReportsController();
$router = new Router($controller);
$router->handleRequest();
