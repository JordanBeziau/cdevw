<?php
  session_start();
  if (isset($_SESSION["client_id"])) header("Location:mon_espace");
	$page_id = 0;
  $page_title = "";

  include_once("includes/inc_head.php");

  $is_data_ok = true;
  if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
      $data[$key] = $value;
    }
  } else {
    header("Location:inscription.php");
  }

  function genMDP() {
    $password = "";
    $letters = array_merge(range("A", "Z"), range("a", "z"));
    $numbers = str_split("0123456789");
    $special_char = str_split("!-_$");

    $chars = array_merge($letters, $numbers, $special_char);
    shuffle($chars);

    $iterate = rand(16,20);
    for ($i = 0; $i < $iterate; $i++) {
      $password .= $chars[rand(0, count($chars) - 1)];
    }
    
    return $password;
  }

  $data["password"] = genMDP();

  include("includes/inc_dbh.php");

  $query = "SELECT cli_prenom, cli_nom FROM clients WHERE cli_email = '{$data['email']}'";
  $result = $dbh->query($query);
  $response = $result->fetch(PDO::FETCH_ASSOC);

  if ($response) {
    $ident = $response["cli_prenom"] . " " . $response["cli_nom"];
  } else {
    $query = "INSERT INTO clients (cli_nom, cli_prenom, cli_genre, cli_email, cli_adresse, cli_cp, cli_ville, cli_tel, cli_mdp) VALUES (:last_name, :first_name, :gender, :email, :address, :post, :city, :phone, :password)";
    $model = $dbh->prepare($query);
    foreach ($data as $key => $value) {
      if ($key === "password") {
        $model->bindValue($key, md5($value));
      } else {
        $model->bindValue($key, $value);
      }
    }
    if ($model->execute()) $error = false;
  }
  // -H3Lxhs4RLL!E$PQgM
  include("includes/inc_dbu.php");
?>
<?php include_once("includes/inc_head.php"); ?>
  <body>
			<main>
				<?php 
					include_once("./includes/inc_header.php"); 
				?>
				
				<section>
        <?php
          if (isset($ident)) {
            echo "<h3>Bonjour $ident</h3>".
              "<p>Vous êtes déjà inscrit chez nous...</p>";
          } else {
            if ($error) {
              echo "<h3>Problème</h3>".
                "<p>Une erreur est survenue lors de votre enregistrement, veuillez recommencer</p>";
            } else {
              echo "<h3>Félicitation !</h3>".
                "<p>Grâce à votre email et au mot de passe suivant <strong>{$data['password']}</strong>, vous pouvez vous connecter et passer commande chez nous.</p>";
            }
          }
        ?>
				</section>
				
				<?php
					include_once("./includes/inc_footer.php");
				?>
			</main>
	</body>
</html>