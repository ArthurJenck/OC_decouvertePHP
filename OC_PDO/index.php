<?php
try {
 // On se connecte à MySQL
 $mysqlClient = new PDO('mysql:host=localhost;dbname=partage_de_recettes;charset=utf8', 'root', '');
} catch (Exception $e) {
 // En cas d'erreur, on affiche un message et on arrête tout
 die('Erreur : ' . $e->getMessage());
}
// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table recipes
$sqlQuery = 'SELECT * FROM recipes WHERE author = :author AND is_enabled = :is_enabled';

$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute([
 "author" => $_GET["author"],
 "is_enabled" => 0
]);
$recipes = $recipesStatement->fetchAll();

// On affiche chaque recette une à une
foreach ($recipes as $recipe) {
?>
 <p><?php echo $recipe['title']; ?></p>
<?php
}
?>