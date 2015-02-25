<?php

  class logger {

    private function getCallingFunctionName() {
    }

    // Write the supplied message to the log file
    // Die if terminate is true.  
    // Terminate is false by default 
    //
    public function write ($class, $method, $message, $terminate = false) {
      // This function will write to a log file
      // Just writing to stdout for now
      echo "<br>$class::$method - $message"; 

      if ($terminate) die ("<br>Terminating due to previous error");

    }

    // Debugging function
    // Display data objects to the screen in a nice format
    public function dump ($data) {
      echo "<pre>";
      print_r ($data);
      echo "</pre>";
    }
  }
?>
