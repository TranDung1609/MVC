<?php
require_once('config.php');
require_once ('lib/function.php');
session_start();

if (isset($_GET['controller'])) {
  define ('SITE_ROOT', realpath(dirname(__FILE__)));
  $controller = $_GET['controller'];
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {
    $action = 'index';
  }
} else {
  $controller = 'pages';
  $action = 'home';
}
require_once('routes.php');