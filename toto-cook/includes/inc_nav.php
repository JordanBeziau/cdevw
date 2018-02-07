<?php
  # format title pages function
  function formatPage($page) {
    return strtolower(str_replace(' ', '_', $page));
  }

  # Array to generate menu
  $tab_pages = ["Accueil", "Liste des plats", "Inscription", "Contact", "Panier"];
?>

<div id="burger"></div>

<ul id="menu">
  <?php foreach($tab_pages as $index => $page) : ?>
    <li
      <?php if ($page_id === $index) echo "class='actif'"; ?>
    >
    <?php if ($page === "Inscription" && isset($_SESSION["client_id"])) : ?>
      <a href="/mon_espace">Mon espace</a>
    <?php else : ?>
      <a href="<?= formatPage($page) ?>">
        <?= $page ?>
      </a>
    <?php endif; ?>
    </li>
  <?php endforeach; ?>
</ul>