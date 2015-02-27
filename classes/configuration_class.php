<?php

class configuration {

  // System version
  private $version = "0.0.1";

  // Database connection details
  private $database_host     = "localhost";
  private $database_username = "peregrine_user";
  private $database_pwd      = "peregrine_pwd";
  private $database_name     = "peregrine";

  // Define the sub-directories
  //
  const ROOT_DIR    = "peregrine";	// This will normally be NULL on live server
  const VIEWS_DIR   = "views";
  const CLASSES_DIR = "classes";
  const CSS_DIR     = "css";
  const IMAGES_DIR  = "images";
  const JS_DIR      = "js";
 
  // Define image assests
  private $logo = "peregrine-planning-logo.png";

  // Database connection access functions
  //
  public function getDatabaseHost()     { return $this->database_host; }
  public function getDatabaseUsername() { return $this->database_username; }
  public function getDatabasePwd()      { return $this->database_pwd; }
  public function getDatabaseName()     { return $this->database_name; }

  // Directory & URL functions
  //
  private function getRootURL() { 
    return $_SERVER['HTTP_HOST']. "/" . self::ROOT_DIR . "/";
  }

  public function getDir ($dir_name) { 
    $dir_name_const = "self::".$dir_name;
    if (!defined($dir_name_const)) die (__FUNCTION__ . "ERROR - unknown directory name: $dir_name");
    return constant($dir_name_const);
  }

  public function getURL ($dir_name) {
    $dir_name_const = "self::".$dir_name;
    if (!defined($dir_name_const)) die (__FUNCTION__ . "ERROR - unknown directory name: $dir_name");
    return $this->getRootURL() . constant ($dir_name_const);
  }

  public function getLogo() {
    return $this->logo;
  }
}

?>
