<?php

class configuration {

  // System version
  private $version = "0.0.1";

  // Database connection details
  private $database_host     = "localhost";
  private $database_username = "peregrine_user";
  private $database_pwd      = "peregrine_pwd";
  private $database_name     = "peregrine";
 
  // Database connection access functions
  public function getDatabaseHost()     { return $this->database_host; }
  public function getDatabaseUsername() { return $this->database_username; }
  public function getDatabasePwd()      { return $this->database_pwd; }
  public function getDatabaseName()     { return $this->database_name; }
}

?>
