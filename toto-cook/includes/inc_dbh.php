<?php
  # DB connexion
  try {
    $dbh = new PDO(DSN, USER, PASSWORD);
  } catch(Exception $error) {
    die("Error : " . $error->getMessage());
  }