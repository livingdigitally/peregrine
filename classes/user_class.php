<?php

class user {

  public function validateCredentials ($username, $password) {
    if ($username == "test" && $password == "test") {
      return true;
    } else {
      return false;
    }
  }
}

?>
