<?php
	session_start();
	$page_id = 5;
	$page_title = "Réservation";
	include_once("includes/inc_head.php");

  if (empty($_GET)) header("Location:liste_des_plats.php");
  $slug = htmlspecialchars($_GET["slug"]);

	include("includes/inc_dbh.php");

	$query = "SELECT * FROM plats WHERE pla_slug = '$slug'";
	$result = $dbh->query($query);
  $response = $result->fetch(PDO::FETCH_ASSOC);
  
  if (!$response) $error = true;

	include("includes/inc_dbu.php");
?>
  <body>
			<main>
				<?php 
					include_once("./includes/inc_header.php"); 
				?>
				
				<section class="liste-des-plats">
          <?php 
            if (isset($error)) :
              include_once("404.php");
            else:
          ?>

					<div>
						<div>
							<img src="/photos/photo_<?= $response["pla_id"]; ?>_s.jpg">
						</div>
						<div class="content-plat">
							<h4><?= $response["pla_titre"]; ?></h4>
							<p><?= $response["pla_descr"]; ?></p>
							<p>
								<span class="prix">Prix : <?= $response["pla_prix"]; ?> &euro;</span>
								<a href="/plat/<?= $response["pla_slug"]; ?>">Voir la fiche</a>
							</p>
						</div>
					</div>
          <?php endif; ?>
				</section>

        <section class="reserve">
          <h2>Choisissez une date disponible</h2>
          <div class="calendar">
            <div class="month-container">
              <h3>mois</h3>
              <?php for($i = 1; $i <= 31; $i++) : ?>
              <div class="day"><?= $i ?></div>
            <?php endfor; ?>
            </div>
            <div class="month-container">
              <h3>mois</h3>
            </div>
            <div class="month-container">
              <h3>mois</h3>
            </div>
          </div>
        </section>
				
				<?php
					include_once("./includes/inc_footer.php");
				?>
			</main>
	</body>
</html>