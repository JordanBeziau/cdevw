<?php 
	# Page identification
	session_start();
	$page_id = 1;
	$page_title = "Plat";
	$error = false;
  include_once("includes/inc_head.php");
  
  if (!isset($_GET)) header("Location:liste_des_plats.php");
	$slug = htmlspecialchars($_GET["slug"]);
  include("includes/inc_dbh.php");

  $query = "SELECT *
		FROM plats
		LEFT JOIN ingredients
		ON plats.pla_id = ingredients.ing_pla_id
		WHERE pla_slug='{$slug}'";
  $result = $dbh->query($query);
	$response = $result->fetchAll(PDO::FETCH_ASSOC);

	if (!$response) $error = true;

  include("includes/inc_dbu.php");
?>
	<?php include_once("includes/inc_head.php"); ?>
	<body>
			<main>
				<?php 
					include_once("includes/inc_header.php"); 
				?>
				
				<section class="plat">
					<?php if (!$error) : ?>
						<h1><?= $response[0]["pla_titre"]; ?></h1>
						<figure>
							<img src="/photos/photo_<?= $response[0]["pla_id"] ?>.jpg" title="<?= $response[0]["pla_titre"]; ?>">
						</figure>
						<p><?= $response[0]["pla_descr"]; ?></p>
						<ul>
							<?php foreach($response as $ing) : ?>
							<li><?= $ing["ing_descr"]; ?></li>
							<?php endforeach; ?>
						</ul>
						<a href="/reserve/<?= $slug ?>">Réserver</a>
					<?php 
						else:
							include_once("404.php");
						endif;
					?>
				</section>
				
				<?php
					include_once("./includes/inc_footer.php");
				?>
			</main>
	</body>
</html>
