<?php
  
  if (isset($_POST["logout"])) {
    unset($_SESSION["client"]);
    unset($_SESSION["client_id"]);
  }

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

      # Logout from db
      include("inc_dbu.php");

      if ($user) {
        $_SESSION["client"] = "{$user['cli_prenom']} {$user['cli_nom']}";
        $_SESSION["client_id"] = $user["cli_id"];
      }
    }
    # LOGS
    $log_date = date("ymd-His");
    $log_ip = getIP();

    isset($_SESSION["client_id"]) ?
      $file = "cli_{$user["cli_id"]}":
      $file = "auth_try";

    $cursor = fopen("logs/$file.log", "a");

    $email = addslashes(htmlspecialchars($email));
    isset($_SESSION["client_id"]) ?
      fputs($cursor, "$log_ip-$log_date\n"):
      fputs($cursor, "$log_ip-$log_date-$email\n");

    fclose($cursor);
  }