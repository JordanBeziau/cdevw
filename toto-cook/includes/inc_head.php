<?php
  include_once("inc_config.php");
  include_once("inc_session.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>🍖 MARMITO - <?= $page_title ?></title>
  <link rel="stylesheet" href="../css/normalisation.css" >
  <script defer src="../scripts/fonctions.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      burger();
    });
  </script>
  <?php if ($page_id == 0) : ?>
    <link rel="stylesheet" href="../css/jquery.bxslider.css"></link>
    <script defer src="../scripts/jquery.min.js"></script>
    <script defer src="../scripts/jquery.bxslider.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        $('.bxslider').bxSlider({
            auto: true,
            mode: 'fade',
            speed: 4000,
            captions: true
          })
      })
    </script>
    <?php elseif ($page_title === "Inscription") : ?>
    <script src="../scripts/HandleForm.js" defer></script>
    <script>
      document.addEventListener("DOMContentLoaded", () => {

        const handleForm = new HandleForm();

        document.querySelector("#inscription_form").addEventListener("submit", event => {
          event.preventDefault();
          handleForm.check(event);
        })

      });
    </script>
  <?php endif; ?>
  <link rel="stylesheet" href="../css/style.css" >
</head>