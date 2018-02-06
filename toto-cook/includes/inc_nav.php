<?php
  # format title pages function
  function formatPage($page) {
    return strtolower(str_replace(' ', '_', $page));
  }

  # Array to generate menu
  $tab_pages = ["Accueil", "Liste des plats", "Inscription", "Contact", "Panier"];

  #echo formatPage($tab_pages[1]);
?>

<ul>
  <?php foreach($tab_pages as $index => $page) : ?>
    <li
      <?php if ($page_id === $index) echo "class='actif'"; ?>
    >
      <a href="<?= formatPage($page) ?>">
        <?= $page ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>