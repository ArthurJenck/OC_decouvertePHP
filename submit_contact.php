<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
$getData = $_GET;

if (!isset($getData['email']) || !isset($getData['message']))
{
    echo('Il faut un email et un message pour soumettre le formulaire.');
    // Arrête l'exécution de ce fichier par PHP
    return;
}
?>

<body class="d-flex flex-column min-vh-100">
<div class="container">
        <?php require_once(__DIR__ . '/header.php'); ?>
  <h1>Message bien reçu !</h1>
         
 <div class="card">
     
     <div class="card-body">
         <h5 class="card-title">Rappel de vos informations</h5>
         <p class="card-text"><b>Email</b> : <?php echo $_GET['email']; ?></p>
         <p class="card-text"><b>Message</b> : <?php echo $_GET['message']; ?></p>
     </div>
 </div>
 
</div>
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>


</html>