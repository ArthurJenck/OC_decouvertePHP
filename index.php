<?php
$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => 'Etape 1 : des flageolets !',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => 'Etape 1 : de la semoule',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => false,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => 'Etape 1 : prenez une belle escalope',
        'author' => 'mathieu.nebra@exemple.com',
        'is_enabled' => true,
    ],
];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Affichage des recettes</title>
</head>
<body>
 <h1>Affichage des recettes</h1>
    <ul>
        <?php foreach ($recipes as $recipe) {
         if ($recipe["is_enabled"]) {
          echo '<h2>' . $recipe["title"] . '</h2>';
          echo '<p>' . $recipe["recipe"] . '</p>';
          echo '<em>' . $recipe["author"] . '</em>';
         }
        } ?>
    </ul>
</body>
</html>