<?php

function viewsCommonHeader() {
  global $configuration;
  $style = "http://" . $configuration->getURL('CSS_DIR') . DIRECTORY_SEPARATOR . "style.css";

  echo "<!DOCTYPE html>";
  echo "<html>";
  echo "<head>";
  echo "<link rel='stylesheet' type='text/css' href='$style'>";
  echo "</head>";
  echo "<body>";
}

function viewsCommonFooter() {
  echo "</body>";
  echo "</html>";
}
?>
