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
  $table_headers = array ('Name', 'Address', 'Proposal', 'Description', 'Date');
  $dataTable->addRow ($dataTable::HEADER_ROW, $table_headers);

  $row_data = array ('Mr & Mrs Crosby 1', 'Flambirds Farm Hackmans Lane Purleigh Chelmsford Essex CM3 6RN', 'Conversion to 2 houses', 'Prior approval of proposed change of use of an agriculrutal building into two dwellinghouses (use class c3)', '20/02/2015');
  $dataTable->addRow ($dataTable::DATA_ROW, $row_data);

  $row_data = array ('Mr & Mrs Crosby 2', 'Flambirds Farm Hackmans Lane Purleigh Chelmsford Essex CM3 6RN', 'Conversion to 2 houses', 'Prior approval of proposed change of use of an agriculrutal building into two dwellinghouses (use class c3)', '01/02/2015');
  $dataTable->addRow ($dataTable::DATA_ROW, $row_data);

  $row_data = array ('Mr & Mrs Crosby 3', 'Flambirds Farm Hackmans Lane Purleigh Chelmsford Essex CM3 6RN', 'Conversion to 2 houses', 'Prior approval of proposed change of use of an agriculrutal building into two dwellinghouses (use class c3)', '31/01/2015');
  $dataTable->addRow ($dataTable::DATA_ROW, $row_data);

  $row_data = array ('Mr & Mrs Crosby 3', 'Flambirds Farm Hackmans Lane Purleigh Chelmsford Essex CM3 6RN', 'Conversion to 2 houses', 'Prior approval of proposed change of use of an agriculrutal building into two dwellinghouses (use class c3)', '31/01/2015');
  $dataTable->addRow ($dataTable::DATA_ROW, $row_data);
  $row_data = array ('Mr & Mrs Crosby 3', 'Flambirds Farm Hackmans Lane Purleigh Chelmsford Essex CM3 6RN', 'Conversion to 2 houses', 'Prior approval of proposed change of use of an agriculrutal building into two dwellinghouses (use class c3)', '31/01/2015');
  $dataTable->addRow ($dataTable::DATA_ROW, $row_data);
  $row_data = array ('Mr & Mrs Crosby 3', 'Flambirds Farm Hackmans Lane Purleigh Chelmsford Essex CM3 6RN', 'Conversion to 2 houses', 'Prior approval of proposed change of use of an agriculrutal building into two dwellinghouses (use class c3)', '31/01/2015');
  $dataTable->addRow ($dataTable::DATA_ROW, $row_data);
  $row_data = array ('Mr & Mrs Crosby 3', 'Flambirds Farm Hackmans Lane Purleigh Chelmsford Essex CM3 6RN', 'Conversion to 2 houses', 'Prior approval of proposed change of use of an agriculrutal building into two dwellinghouses (use class c3)', '31/01/2015');
  $dataTable->addRow ($dataTable::DATA_ROW, $row_data);
  $row_data = array ('Mr & Mrs Crosby 3', 'Flambirds Farm Hackmans Lane Purleigh Chelmsford Essex CM3 6RN', 'Conversion to 2 houses', 'Prior approval of proposed change of use of an agriculrutal building into two dwellinghouses (use class c3)', '31/01/2015');
  $dataTable->addRow ($dataTable::DATA_ROW, $row_data);

  $dataTable->finalise();

  echo "<dvi id='data-table'>";
  $dataTable->display();
  echo "</div>";
}


?>
