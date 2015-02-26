<?php

class data_table {

  const HEADER_ROW = "header_row";
  const DATA_ROW   = "data_row";

  private $table;

  // Write logger function for this class
  private function writeLog ($method, $message, $terminate = false) {
    // Get access to the logger object that is in the global name space
    global $logger;
    $logger->write ('data_table', $method, $message, $terminate);
  }

  public function __construct() {
    $this->table = "<table class='sortable'>";
  }

  public function addRow($row_type, $columns) {
    
    global $logger;

    // Check the parameters are valid
    $row_type_const = "self::".strtoupper($row_type);
    if (!defined($row_type_const)) {
      $this->writeLog (__FUNCTION__, "ERROR - unknown row item: $row_type", true);
    }   
    if (!is_array ($columns)) {
      $this->writeLog (__FUNCTION__, "ERROR - invalid colum data: $columns", true);
    }

    // Define the html table tags according to the row type
    $row_type_html = ($row_type == self::HEADER_ROW ? "th" : "td");

    $this->table .= "<tr>";
    foreach ($columns as $each_column) {
      $this->table .= "<$row_type_html>$each_column</$row_type_html>";
    }
    $this->table .= "</tr>";
  }

  public function finalise() {
    $this->table .= "</table>";
  }
 
  public function display() {
    echo $this->table;
  }
}

?>
