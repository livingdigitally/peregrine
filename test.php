<?php

include_once 'classes/database_class.php';
include_once 'classes/logger_class.php';
include_once 'classes/configuration_class.php';
include_once 'classes/planning_data_class.php';
include_once 'classes/database_query_class.php';

// Instantiate the various objects
$logger            = new logger;
$configuration     = new configuration;
$peregrineDatabase = new database();

echo "<br>Finished";

// Instantiate a tab of XLS data
$planningData = new planning_data();

// Add data from the XLS to the planning data object
echo "<br>Adding first data item to the planning data object";
$planningData->addData (1, $planningData::BUSINESS_NAME, 'My First Business Name');
$planningData->addData (1, $planningData::CLIENT_NAME, 'My First Client Name');
$planningData->addData (1, 'blah', 'My First Client Name');

echo "<br>Adding second data item to the planning data object";
$planningData->addData (2, $planningData::BUSINESS_NAME, 'My Second Business Name');
$planningData->addData (2, $planningData::CLIENT_NAME, 'My Second Client Name');

// Pass the XLS planning data to the database object using the planningData object
echo "<br>Plassing the planning data object to the database class for storage";
$peregrineDatabase->addData ($planningData);

// Retrieve the required planning data from the database using the required query
echo "<br>Retrieving planning data from the database";
$a_query = new database_query;
$retrieved_planning_data = $peregrineDatabase->getData ($a_query);

$logger->dump ($retrieved_planning_data);

echo "<br>Finished";
?>
