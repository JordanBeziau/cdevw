<?php
	session_start();
	$page_id = 1;
	$page_title = "Liste des plats";
	include_once("includes/inc_head.php");

	include("includes/inc_dbh.php");

	$query = "SELECT pla_id, pla_titre, pla_descr, pla_prix, pla_slug FROM plats ORDER BY pla_prix";
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
						<div class="content-plat">
							<h4><?= $plat["pla_titre"]; ?></h4>
							<p><?= $plat["pla_descr"]; ?></p>
							<p>
								<span class="prix">Prix : <?= $plat["pla_prix"]; ?> &euro;</span>
								<a href="/reserve/<?= $plat["pla_slug"] ?>">Réserver</a>
								<a href="/plat/<?= $plat["pla_slug"]; ?>">Voir la fiche</a>
							</p>
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