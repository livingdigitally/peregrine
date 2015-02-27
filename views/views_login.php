<?php

function viewsLoginDisplayForm($invalid_credentials) {
  global $configuration;

  $invalid_text = ($invalid_credentials ? "Invalid username or password" : "<br>");

  viewsCommonHeader();
  $logo = "http://" . $configuration->getURL('IMAGES_DIR') . "/" . $configuration->getLogo();
  echo "<div class='login_form'>";
  echo "<img src=$logo>";
  echo "<p>Please login to your account below</p>";
  echo "<hr>";
  echo "<form id='login_form' name='login_form' action='' method='post'>";
  echo "<p class='credentials'><input type='text' name='username' placeholder='Username or email'></p>";
  echo "<p class='crednetials'><input type='password' name='password' placeholder='Password'></p>";
  echo "<p class='submit'><input type='submit' name='login' id='login' value='Login'</p>";
  echo "</form>";
  echo "<p class='invalid_credentials'>$invalid_text</p>";
  echo "<hr><br></div>";
  viewsCommonFooter();
}

?>
