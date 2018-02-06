<?php
  session_start();
  
  # Handle connexion
  if (!empty($_POST["email"]) && !empty($_POST["password"])) {
    $email = $_POST["email"];
    $password = md5(htmlspecialchars($_POST["password"]));
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      # Everything ok -> db connexion
      include("inc_dbh.php");

      $query = "SELECT * FROM clients WHERE cli_email='$email' AND cli_mdp='$password'";
      $result = $dbh->query($query);
      $user = $result->fetch(PDO::FETCH_ASSOC);

      if ($user) {
        $_SESSION["client"] = "{$user['cli_prenom']} {$user['cli_nom']}";
        $_SESSION["client_id"] = $user["cli_id"];
      }

      # Logout from db
      include("inc_dbu.php");
    }
  }