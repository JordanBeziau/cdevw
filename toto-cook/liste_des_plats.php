<?php
	session_start();
	$page_id = 1;
	$page_title = "Liste des plats";
	include_once("includes/inc_head.php");

	include("includes/inc_dbh.php");

	$query = "SELECT pla_id, pla_titre, pla_descr, pla_prix FROM plats";
	$result = $dbh->query($query);
	$response = $result->fetchAll(PDO::FETCH_ASSOC);

	include("includes/inc_dbu.php");
?>
  <body>
			<main>
				<?php 
					include_once("./includes/inc_header.php"); 
				?>
				
				<section class="liste-des-plats">
					<?php
						foreach ($response as $plat) :
					?>
					<div>
						<div>
							<img src="photos/photo_<?= $plat["pla_id"]; ?>_s.jpg">
						</div>
						<div>
							<h4><?= $plat["pla_titre"]; ?></h4>
							<p><?= $plat["pla_descr"]; ?></p>
							<p class="prix">Prix : <?= $plat["pla_prix"]; ?></p>
						</div>
					</div>
						<?php endforeach; ?>
				</section>
				
				<?php
					include_once("./includes/inc_footer.php");
				?>
			</main>
	</body>
</html>