<header>
  <div id="ident">
  <form action="<?= basename($_SERVER["PHP_SELF"]); ?>" method="post">
  <?php if (isset($_SESSION['client_id'])) : ?>
    <span>Bonjour <?= $_SESSION["client"] ?>.</span>
    <input type="hidden" name="logout" value="true" />
    <input type="submit" value="Déconnexion" />
  <?php else : ?>
      <input type="text" name="email" placeholder="email">
      <input type="password" name="password" placeholder="password">
      <input type="submit" value="Connexion">
    </form>
  <?php endif; ?>
  </div>
  <h1>Marmito</h1>
  <h4>Les bons p'tits plats de Tony - <?= $page_title; ?></h4>
  <nav>
    <?php include_once("inc_nav.php"); ?>
  </nav>
</header>