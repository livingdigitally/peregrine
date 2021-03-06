<?php

// Enable error reporting
error_reporting (-1);
ini_set ('display_errors', 'On');

include_once 'classes/configuration_class.php';
$configuration = NEW configuration;

// Define the location of the files to include
$views_common     = $configuration->getDir('VIEWS_DIR')   . DIRECTORY_SEPARATOR . "views_common.php";
$views_login      = $configuration->getDir('VIEWS_DIR')   . DIRECTORY_SEPARATOR . "views_login.php";
$views_home       = $configuration->getDir('VIEWS_DIR')   . DIRECTORY_SEPARATOR . "views_home.php";
$screen           = $configuration->getDir('VIEWS_DIR')   . DIRECTORY_SEPARATOR . "screen.php";
$logger_class     = $configuration->getDir('CLASSES_DIR') . DIRECTORY_SEPARATOR . "logger_class.php";
$user_class       = $configuration->getDir('CLASSES_DIR') . DIRECTORY_SEPARATOR . "user_class.php";
$data_table_class = $configuration->getDir('CLASSES_DIR') . DIRECTORY_SEPARATOR . "data_table_class.php";

// Include all requied files
include_once $views_common;
include_once $views_login;
include_once $views_home;
include_once $logger_class;
include_once $screen;
include_once $user_class;
include_once $data_table_class;

// Instantiate the global objects
$logger = new logger;
$user   = new user;

// Invoke the main handler
screenHandler();
?>
