<?php

function screenHandler($data) {
  global $logger, $user;

  $invalid_credentials = NULL;

  if (isset ($data['login'])) {
    $username = $data['username'];
    $password = $data['password'];
    $valid_user = $user->validateCredentials($username, $password);
    if ($valid_user) {
        viewsHomePageDisplay();
      return;
    } else {
      $invalid_credentials = true;
    }
  }
  viewsLoginDisplayForm($invalid_credentials);
}
?>
