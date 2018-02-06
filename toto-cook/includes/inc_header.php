<header>
  <div id="ident">
  <?php if (isset($_SESSION['client_id'])) : ?>
    <span>Bonjour <?= $_SESSION["client"] ?>.</span>
  <?php else : ?>
    <form action="" method="post">
      <input type="text" name="email" placeholder="email">
      <input type="password" name="password" placeholder="password">
      <input type="submit" value="Connexion">
    </form>
  <?php endif; ?>
  </div>
  <h1>Marmito</h1>
  <h4>Les bons p'tits plats de Tony</h4>
  <nav>
    <?php include_once("inc_nav.php"); ?>
  </nav>
</header>