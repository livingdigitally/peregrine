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

  public function createDataItemLink ($link, $hover_text) {
    $dataItemLink = array ('LINK' => $link,
                           'HOVER' => $hover_text);
    return $dataItemLink;
  }

  public function createDataItem ($text, $width, $link = NULL) {
    $dataItem = array ('WIDTH' => $width,
                       'TEXT'  => $text,
                       'LINK'  => $link);
    return $dataItem;
  }

  public function addRow($row_type, $data_items) {
    
    global $logger;

    // Check the parameters are valid
    $row_type_const = "self::".strtoupper($row_type);
    if (!defined($row_type_const)) {
      $this->writeLog (__FUNCTION__, "ERROR - unknown row item: $row_type", true);
    }   
    if (!is_array ($data_items)) {
      $this->writeLog (__FUNCTION__, "ERROR - invalid colum data: $data_items", true);
    }

    // Define the html table tags according to the row type
    $row_type_html = ($row_type == self::HEADER_ROW ? "th title='Click to sort'" : "td");

    $this->table .= "<tr'>";
    foreach ($data_items as $each_data_item) {

      $width = $each_data_item['WIDTH'];
      $text  = $each_data_item['TEXT'];
      $link  = $each_data_item['LINK']['LINK'];
      $hover = $each_data_item['LINK']['HOVER'];

      $width_html = ($width ? "style='width:$width" . "px'" : NULL);

      $this->table .= "<$row_type_html $width_html>";
      $this->table .= ($link ? "<a href='$link' title='$hover' target='_blank'>" : NULL);
      $this->table .= $text;
      $this->table .= ($link ? "</a>" : NULL);
      $this->table .- "</$row_type_html>";
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
