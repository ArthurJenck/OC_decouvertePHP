<?php
$postData = $_POST;

if (isset($postData["email"]) && isset($postData["password"])) {
  if (!filter_var($postData["email"], FILTER_VALIDATE_EMAIL)) {
    $errorMessage = "L'adresse-mail est invalide";
  } else {
    foreach ($users as $user) {
      if ($user["email"] === $postData["email"] && $user["password"] === $postData["password"]) {
        $_SESSION["LOGGED_USER"] = $user["email"];
      } else {
        $errorMessage = sprintf("Identifiants incorrects", $postData["email"], strip_tags($postData["password"]));
      }
    }
  }
}
?>

<?php
if (!isset($_SESSION["LOGGED_USER"])) : ?>
  <form action="index.php" method="POST">
    <?php if (isset($errorMessage)) : ?>
      <div class="alert alert-danger">
        <?php echo $errorMessage ?>
      </div>
    <?php endif ?>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help">
      <div id="email-help" class="form-text">L'email sera utilisé pour la création de votre compte.</div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Mot de passe</label>
      <input type="password" class="form-control" id="password" name="password" />
    </div>
    <button class="btn btn-primary">Envoyer</button>
  </form>
<?php else : ?>

  <p class="alert alert-success" role="alert">
    Bonjour <?php echo $_SESSION["LOGGED_USER"] ?> et bienvenue sur le site !
  </p>
<?php endif ?>