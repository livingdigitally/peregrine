<?php

// Class that represents the data in each tab of the source planning spreadsheet
class planning_data {

  const BUSINESS_NAME = "BUSINESS_NAME";
  const CLIENT_NAME   = "CLIENT_NAME";
  // etc.

  private $planning_data = array();

  // Write logger function for this class
  private function writeLog ($method, $message, $terminate = false) {
    // Get access to the logger object that is in the global name space
    global $logger;
    $logger->write ('planning_data', $method, $message, $terminate);
  }


  public function addData ($id, $data_item, $value) {
 
    // Check that the data item being added exists. 
    // If not, write warning message to log and return
    $data_item_const = "planning_data::".$data_item;
    if (!defined($data_item_const)) {
      $this->writeLog (__FUNCTION__, "WARNING - unknown data item: $data_item");
      return false;
    }

    // Add the data item
    $this->planning_data[$id][$data_item] = $value;
  }


  public function getData() {
    return $this->planning_data;
  }
}

?>
