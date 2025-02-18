<html>

<head>
 <meta charset="utf-8" />
 <title>Ceci est une page HTML de test</title>
</head>

<body>
 <h1><?php 
  $firstName = "Arthur";
  $isEnabled = true
 ?>
 <?php echo "Bonjour {$firstName}" ?></h1>
 <p><?php 
  if ($isEnabled):
   echo "Vous pouvez accéder au site ✅";
  
 ?></p>
 <h2>Page de test</h2>
 <p>
  Cette page contient du code HTML avec des balises PHP.<br />
  <?php echo "Ceci est du texte <br>" ?>
  <?php echo("Ceci est \"aussi\" du <strong>texte</strong>" // Commentaire monoligne
  ) ?>
  <?php 
   /*
    Commentaire multiligne
   */
  ?>

 <br> 
 Voici quelques petits tests :


 </p>

 <ul>
  <li style="color: blue;">Texte en bleu</li>
  <li style="color: red;">Texte en rouge</li>
  <li style="color: green;">Texte en vert</li>
 </ul>

 <p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s') ?>.</p> 
   <?php endif ;
   if (!$isEnabled) {
   echo "Accès refusé ❌";
  }?>
</body>

</html>