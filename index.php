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

$users = [
 [
   'full_name' => 'Mickaël Andrieu',
   'email' => 'mickael.andrieu@exemple.com',
   'age' => 34,
  ],
  [
   'full_name' => 'Mathieu Nebra',
   'email' => 'mathieu.nebra@exemple.com',
   'age' => 34,
  ],
  [
   'full_name' => 'Laurène Castor',
   'email' => 'laurene.castor@exemple.com',
   'age' => 28,
  ],
 ];


function isValidRecipe(array $recipe) : bool
{
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;
}

function getRecipes(array $recipes) : array
{
    $validRecipes = [];

    foreach($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }

    return $validRecipes;
}
 
function displayAuthor(string $authorEmail, array $users): string
{
    foreach ($users as $user) {
        if ($authorEmail === $user['email']) {
            return $user['full_name'] . '(' . $user['age'] . ' ans)';
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Affichage des recettes</title>
</head>
<body>
 <h1>Affichage des recettes</h1>
    <ul>
        <?php foreach (getRecipes($recipes) as $recipe) {
         if ($recipe["is_enabled"]) {
          echo '<h2>' . $recipe["title"] . '</h2>';
          echo '<p>' . $recipe["recipe"] . '</p>';
          echo displayAuthor($recipe["author"], $users);
         }
        } ?>
    </ul>
</body>
</html>