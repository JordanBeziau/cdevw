<?php 
	# Page identification
	session_start();
	$page_id = 0;
	$page_title = "Accueil";
?>
	<?php include_once("includes/inc_head.php"); ?>
	<body>
			<main>
				<?php 
					include_once("includes/inc_header.php"); 
				?>
				
				<section>
					<div class="slider">
						<ul class="bxslider">
							<li><img src="photos/photo_1.jpg" title="Bagel au St Moret et bar mariné"></li>
							<li><img src="photos/photo_2.jpg" title="Omelette au jambon"></li>
							<li><img src="photos/photo_3.jpg" title="Quiche aux asperges"></li>
						</ul>
					</div>
					<h2>Bienvenue sur Marmito !</h2>
						<p>
						Au xxe siècle, on définit généralement et vaguement la gastronomie comme une manière particulièrement attentive, souvent considérée comme élitiste, de cuisiner et, surtout, de déguster des aliments, « avec pour piliers l'art de la cuisine et l'épicurisme »…</p>
<p>Son objectif étant de « satisfaire les papilles » plus que de répondre à un besoin vital, la gastronomie suit ou édicte des règles variables d'un pays à l'autre et dans le temps. Elles sont basées sur des techniques culinaires éventuellement très élaborées et des principes de dégustation faisant aller au-delà du plaisir immédiat, principes extrêmement variables selon les pays et les civilisations.
						</p>
				</section>
				
				<?php
					include_once("./includes/inc_footer.php");
				?>
			</main>
	</body>
</html>
