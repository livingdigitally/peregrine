<?php

include_once ('classes/planning_data_class.php');

/*
/ Database class
*/

class database {

  // Variable to hold the database connection object
  private $database;

  // Column names for the planning_client table
  private $planning_client_CLIENT_NAME   = "name";
  private $planning_client_BUSINESS_NAME = "business_name";


  //
  // P R I V A T E   M E T H O D S
  //

  // Each class should have a local write log that ensure the correct class name is always passed to the logger
  private function writeLog ($method, $message, $terminate = false) {
    // Get access to the logger object that is in the global name space
    global $logger;
    $logger->write ('database', $method, $message, $terminate);
  }


  // Create a connection to the database
  private function openConnection() {

    // Get access to the configuration object that is in the global name space
    global $configuration;

    // Create a new database connection
    $this->database = new mysqli ($configuration->getDatabaseHost(),
                                  $configuration->getDatabaseUsername(),
                                  $configuration->getDatabasePwd(),
                                  $configuration->getDatabaseName());

    // Test whether the new database connection was successful or not
    // On failure, write the error message to the log file and die
    if ($this->database->connect_errno) $this->writeLog (__FUNCTION__, "database error: " . $this->database->connect_error, true);
  }


  // Create / update the database tables
  private function initialiseTables() {

    // Test to ensure we have got a connection to the database.  If not, write to error log and terminate
    if (!$this->database) $this->writeLog(__FUNCTION__, "no database connection exists", true);
 
    // Get the currently installed version from the database
    // If a new version (or first!) version installed, upgrade database tables if necessary

    // For now, simply create a basic table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS `planning_client` (
                                                       `client_id` int(11) unsigned NOT NULL auto_increment,
                                                        `$this->planning_client_CLIENT_NAME` varchar(255) NOT NULL,
                                                        `$this->planning_client_BUSINESS_NAME` varchar(255) NOT NULL,
                                                        PRIMARY KEY (`client_id`)
                                                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8; ";

    // Execute the sql command
    // On error, write the error message to the log and terminate
    mysqli_query ($this->database, $sql) or $this->writeLog(__FUNCTION__, "database error: " . mysqli_error ($this->database), true);;
  }


 
  // Retrieve the data from the database as requested by the supplied query
  // Return data in the planningData object
  private function addPlanningClientData ($client_name, $business_name) {

    // This needs to be far more elbaorate (e.g. accommodate changes to existing details)
    // This just inserts a new record blindly
    $sql = "INSERT INTO `planning_client` (name, business_name) VALUES ('$client_name', '$business_name')";

    // Execute the sql command
    // On error, write the error message to the log and terminate
    mysqli_query ($this->database, $sql) or $this->writeLog(__FUNCTION__, "database error: " . mysqli_error ($this->database), true);
  }


  //
  // P U B L I C   M E T H O D S
  //
  // The constructor function is called when the class is instantiated.
  public function __construct() {
    // Initialise the database object, in this case create a database connection
    $this->openConnection();

    // Initialisr the database tables
    $this->initialiseTables();
  }


  // Update the database usingn the supplied planning data
  public function addData ($planning_data) {
    global $logger;
    $xls_data = $planning_data->getData();
    foreach ($xls_data as $each_row) {
      $client_name   = $each_row[$planning_data::CLIENT_NAME];
      $business_name = $each_row[$planning_data::BUSINESS_NAME];
      $this->addPlanningClientData ($business_name, $client_name);
    }
  }

 
  // Retrieve the data from the database as requested by the supplied query
  // Return data in the planningData object
  public function getData ($query) {

    // Test to ensure we have got a connection to the database.  If not, write to error log and terminate
    if (!$this->database) $this->writeLog(__FUNCTION__, "no database connection exists", true);

    $planningData = new planning_data;
    // Get the required database using the supplied query information and store in the planningData object
    // This example just gets everything from the planning_client table
    $sql = "SELECT * from planning_client";

    // Execute the sql query and get the result
    $sql_result = mysqli_query ($this->database, $sql) or $this->writeLog (__FUNCTION__, "database error: " . mysqli_error ($this->database), true);

    // Iterate through the returned results
    $planning_data_id = 1;
    while ($row = mysqli_fetch_array ($sql_result)) {
      $client_name   = $row[$this->planning_client_CLIENT_NAME];
      $business_name = $row[$this->planning_client_BUSINESS_NAME];
      $planningData->addData ($planning_data_id, $planningData::CLIENT_NAME, $client_name);
      $planningData->addData ($planning_data_id, $planningData::BUSINESS_NAME, $business_name);
      $planning_data_id++;
    }

    // Return the planning data
    return $planningData;
    
  }
 


}

?>
