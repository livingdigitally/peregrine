<?php

function viewsHomePageDisplay() {
  viewsCommonHeader();  
  viewsCommonNavigation();
  viewsHomeFilter();
  viewsHomeDataTable();
  viewsCommonFooter();
}

function viewsHomeFilter() {
  echo "<div id='filter'>";
  echo "<p>FILTER MENU</p>";
  echo "<p>FILTER ONE</p>";
  echo "<p>FILTER TWO</p>";
  echo "</div>";
}

function viewsHomeDataTable() {

  $dataTable = new data_table;

  $table_header_1 = $dataTable->createDataItem('Name', NULL);
  $table_header_2 = $dataTable->createDataItem('Address', NULL);
  $table_header_3 = $dataTable->createDataItem('Proposal', NULL);
  $table_header_4 = $dataTable->createDataItem('Description', 300);
  $table_header_5 = $dataTable->createDataItem('Date', 80);
  $table_headers = array ($table_header_1, $table_header_2, $table_header_3, $table_header_4, $table_header_5);

  $dataTable->addRow ($dataTable::HEADER_ROW, $table_headers);

  $view_proposal_link = $dataTable->createDataItemLink ('?id=FIXME', 'View proposal');

  $table_data_item_1 = $dataTable->createDataItem('Mr & Mrs Crosby',NULL, $view_proposal_link);

  $address = "Flambirds Farm Hackmans Lane Purleigh Chelmsford Essex CM3 6RN";
  $table_data_item_2_link = $dataTable->createDataItemLink (getGoogleMapsURL($address), 'View address in google maps');

  $table_data_item_2 = $dataTable->createDataItem($address, NULL, $table_data_item_2_link);

  $table_data_item_3 = $dataTable->createDataItem('Conversion to 2 houses',NULL, $view_proposal_link);

  $table_data_item_4 = $dataTable->createDataItem('Prior approval of proposed change of use of an agriculrutal building into two dwellinghouses (use class c3)',NULL, $view_proposal_link);

  $table_data_item_5 = $dataTable->createDataItem('20/02/2015',NULL);

  $table_row_data = array ($table_data_item_1, $table_data_item_2, $table_data_item_3, $table_data_item_4, $table_data_item_5);

  $dataTable->addRow ($dataTable::DATA_ROW, $table_row_data);
  $dataTable->addRow ($dataTable::DATA_ROW, $table_row_data);
  $dataTable->addRow ($dataTable::DATA_ROW, $table_row_data);
  $dataTable->addRow ($dataTable::DATA_ROW, $table_row_data);
  $dataTable->addRow ($dataTable::DATA_ROW, $table_row_data);
  $dataTable->addRow ($dataTable::DATA_ROW, $table_row_data);
  $dataTable->addRow ($dataTable::DATA_ROW, $table_row_data);
  $dataTable->addRow ($dataTable::DATA_ROW, $table_row_data);
  $dataTable->addRow ($dataTable::DATA_ROW, $table_row_data);


  $dataTable->finalise();

  echo "<div id='data-table'>";
  $dataTable->display();
  echo "</div>";
}

function viewHomeFullProposoal() {
  echo "<br>View full proposal";
}

function getGoogleMapsURL ($address) {
  $sanitised_address = str_replace (' ', '+', $address);
  return "https://www.google.co.uk/maps/search/$sanitised_address";
  }


?>
