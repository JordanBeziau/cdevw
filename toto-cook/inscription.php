<?php
	session_start();
	if (isset($_SESSION["client_id"])) header("Location:mon_espace");
	$page_id = 2;
	$page_title = "Inscription";
?>
<?php include_once("includes/inc_head.php"); ?>
  <body>
			<main>
				<?php 
					include_once("./includes/inc_header.php"); 
				?>
				
				<section>
					<form action="handle_inscription.php" method="post" id="inscription_form" class="main_form">
					<div>
						<label>
							<input type="radio" name="gender" value="0" checked> Homme
						</label>
						<label>
							<input type="radio" name="gender" value="1"> Femme
						</label>
					</div>
					<input type="text" name="last_name" placeholder="Nom">
					<input type="text" name="first_name" placeholder="Prénom">
					<input type="email" name="email" placeholder="Email">
					<input type="text" name="address" placeholder="Adresse">
					<input type="text" name="post" placeholder="Département">
					<div id="autoCompletion"></div>
					<input type="text" name="city" placeholder="Ville">
					<input type="text" name="phone" placeholder="Téléphone">
					<input type="submit" value="S'incrire" class="main_form">
					</form>
				</section>
				
				<?php
					include_once("./includes/inc_footer.php");
				?>
			</main>
	</body>
</html>