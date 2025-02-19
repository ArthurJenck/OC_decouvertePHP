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
$getData = $_POST;

    if (
        !isset($getData['email'])
        || !filter_var($getData['email'], FILTER_VALIDATE_EMAIL)
        || empty($getData['message'])
        || trim($getData['message']) === ''
    ) {
        echo('Il faut un email et un message valides pour soumettre le formulaire.');
        return;
    }
?>
<?php

// Testons si le fichier a bien été envoyé et s'il n'y a pas des erreurs
if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] === 0) {
    // Testons, si le fichier est trop volumineux
    if ($_FILES['screenshot']['size'] > 1000000) {
        echo "L'envoi n'a pas pu être effectué, erreur ou image trop volumineuse";
        return;
    }
    // Testons, si l'extension n'est pas autorisée
    $fileInfo = pathinfo($_FILES['screenshot']['name']);
    $extension = $fileInfo['extension'];
    $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
    if (!in_array($extension, $allowedExtensions)) {
        echo "L'envoi n'a pas pu être effectué, l'extension {$extension} n'est pas autorisée";
        return;
    }
    // Testons, si le dossier uploads est manquant
    $path = __DIR__ . '/uploads/';
    if (!is_dir($path)) {
//        // echo "L'envoi n'a pas pu être effectué, le dossier uploads est manquant";
//        // return;
        mkdir('uploads');
    }
    // On peut valider le fichier et le stocker définitivement
    move_uploaded_file($_FILES['screenshot']['tmp_name'], $path . basename($_FILES['screenshot']['name']));
} else {
    echo "Problème quelque part";
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
         <p class="card-text"><b>Email</b> : <?php echo $getData['email']; ?></p>
         <p class="card-text"><b>Message</b> : <?php echo htmlspecialchars($getData['message']); ?></p>
     </div>
 </div>
 
</div>
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>


</html>