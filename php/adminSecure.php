<?php
session_start();

if($_SESSION['creds']=="admin"){
  echo "valid";
}

?>
