<?php

function screenHandler() {
  global $logger, $user;

  $invalid_credentials = NULL;

  if (isset ($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $valid_user = $user->validateCredentials($username, $password);
    if ($valid_user) {
        viewsHomePageDisplay();
      return;
    } else {
      $invalid_credentials = true;
    }
  }

  if (isset($_GET['id'])) {
    echo "Display the full proposal information";
    return;
  }

  if (isset($_GET['import'])) {
    echo "Display the import screen";
    return;
  }

  viewsLoginDisplayForm($invalid_credentials);
}
?>
