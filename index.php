<?php

// Déclaration du tableau des recettes
$recipes = [
    ['Cassoulet','[...]','mickael.andrieu@exemple.com',true,],
    ['Couscous','[...]','matthieu.nebra@openclassrooms.com',false,],
    ['Blanquette','[...]','arthurjenckdev@gmail.com',false,],
    ['Tajine','[...]','john.doe@gmail.com',true,],
];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Affichage des recettes</title>
</head>
<body>
    <ul>
        <?php for ($line = 0; $line < count($recipes); $line++): ?> 
            <li><?php echo "{$recipes[$line][0]} ({$recipes[$line][2]})"; ?></li>
        <?php endfor; ?>
    </ul>
</body>
</html>