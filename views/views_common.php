<?php

function viewsCommonHeader() {
  global $configuration;
  $style  = "http://" . $configuration->getURL('CSS_DIR') . DIRECTORY_SEPARATOR . "style.css";
  $sorttable_js  = "http://" . $configuration->getURL('JS_DIR') . DIRECTORY_SEPARATOR . "sorttable.js";

  echo "<!DOCTYPE html>";
  echo "<html>";
  echo "<head>";
  echo "<link rel='stylesheet' type='text/css' href='$style'>";
  echo "<script src='$sorttable_js'></script>";
  echo "</head>";
  echo "<body>";
  echo "<div id='container'>";
}

function viewsCommonFooter() {
  echo "</div>";	// End container div
  echo "</body>";
  echo "</html>";
}

function viewsCommonNavigation() {
  global $configuration;

  $logo = "http://" . $configuration->getURL('IMAGES_DIR') . DIRECTORY_SEPARATOR . $configuration->getLogo();
  echo "<div id='navigation'>";
  echo "<div id='logo'><img src=$logo width='100%%'></div>";
  echo "<div id='menu'>";
  echo "<ul>";
  echo "<li><a href='?import'>Import</a></li>";
  echo "<li><a href='index.php'>Logout</a></li>";
  echo "</ul>";
  echo "</div>";
  echo "</div>";
}

?>
