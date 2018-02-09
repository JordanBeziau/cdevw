<?php
  $value = htmlspecialchars($_POST["region"]);

  include("includes/inc_config.php");
  include("includes/inc_dbh.php");

  if (mb_strlen($value, "utf-8") > 2) {
    $query = "SELECT departement_code, departement_nom FROM departement WHERE departement_nom LIKE '%$value%'";
  } else {
    $query = "SELECT departement_code, departement_nom FROM departement WHERE departement_nom LIKE '$value%'";
  }
  $result = $dbh->query($query);
  if ($result) {
    echo "<ul>";
    while ($response = $result->fetch(PDO::FETCH_ASSOC)) {
      echo "<li value='{$response["departement_code"]}'>".
        $response["departement_nom"].
      "</li>";
    }
    echo "</ul>";
  }

  include("includes/inc_dbu.php");