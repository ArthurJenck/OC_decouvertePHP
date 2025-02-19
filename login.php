<?php
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');
?>
<!DOCTYPE html>
<html>


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Site de recettes - Connexion</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
$postData = $_POST;
$users = [
  [
    "email" => "johndoe@gmail.com",
    "password" => "azertyuiop"
  ]
];

if (isset($postData["email"]) && isset($postData["password"])) {
  if (!filter_var($postData["email"], FILTER_VALIDATE_EMAIL)) {
    $errorMessage = "L'adresse-mail est invalide";
  } else {
    foreach ($users as $user) {
      if ($user["email"] === $postData["email"] && $user["password"] === $postData["password"]) {
        $loggedUser = [
          "email" => $user["email"]
        ];
      } else {
        $errorMessage = sprintf("Identifiants incorrects", $postData["email"], strip_tags($postData["password"]));
      }
    }
  }
}
?>


<body class="d-flex flex-column min-vh-100">
  <div class="container">
    <!-- inclusion de l'entête du site -->
    <?php require_once(__DIR__ . '/header.php'); ?>

    <?php
    if (!isset($loggedUser)) : ?>
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
        Bonjour <?php $loggedUser["email"] ?> et bienvenue sur le site !
      </p>
    <?php endif ?>


  </div>
  <!-- inclusion du bas de page du site -->
  <?php require_once(__DIR__ . '/footer.php'); ?>
</body>


</html>