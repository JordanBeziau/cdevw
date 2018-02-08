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
            <?php
          
            setlocale(LC_TIME, "fr_FR");

            $days = ["Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"];
            $months = [];
            for ($i = 1; $i <= 12; $i++) {
              array_push($months, ucfirst(strftime("%B", mktime(0,0,0,$i,1,date("Y")))));
            }

            $today = date("j");
            $month = date("n") - 1;
            $year = date("Y");
            $display_year = $year;

            for ($j = 0; $j < 3; $j++) :
              $display_month = $month + $j;
              if ($display_month > 11) {
                $display_month -= 12;
                $display_year = $year + 1;
              }

              $first_day = date("N", mktime(0,0,0,$display_month + 1,1,$display_year)) - 2;
              $days_number = date("t", mktime(0,0,0,$display_month + 1,1,$display_year));

            ?>
            <div class="month-container">
              <h3><?= $months[$display_month] ." ". $display_year; ?></h3>

              <?php foreach ($days as $day) : ?>
                <div class="day word"><?= $day ?></div>
              <?php endforeach; 

              for($i = - $first_day; $i <= $days_number; $i++) :
                if ($i <= 0) {
                  echo "<div class='day empty'></div>";
                } elseif ($i <= $today && (($display_month + 1) == date("n"))) {
                  echo "<div class='day past'>$i</div>";
                } else {
                  echo "<div class='day ok'>$i</div>";
                }
               endfor; ?>

            </div>
            <?php endfor; ?>
          </div>
          <form action="">
               <input type="hidden" name="pla_id" value="<?= $response["pla_id"]; ?>">
               <input type="hidden" name="">
               <input type="text">
          </form>
        </section>
				
				<?php
					include_once("./includes/inc_footer.php");
				?>
			</main>
	</body>
</html>