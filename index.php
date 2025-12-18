<!doctype html>
<html lang="fr"> <!-- Début du document HTML, langue définie en français -->

<head>
  <meta charset="utf-8"> <!-- Définition de l'encodage des caractères pour éviter les problèmes d'affichage -->
  <title>Labyrinthe — Accueil</title> <!-- Titre de la page qui s'affiche dans l'onglet du navigateur -->
  <link rel="stylesheet" href="style.css"> <!-- Lien vers le fichier CSS pour le style de la page -->
</head>

<body>
  <main>
    <h1>Labyrinthe</h1> <!-- Titre principal visible sur la page -->
    <p>Bienvenue ! Clique sur "Jouer" pour lancer une partie.</p> <!-- Petit texte d'accueil -->

    <div style="text-align:center; margin:20px 0;"> <!-- Zone centrée pour les boutons avec un petit espace en haut et en bas -->
      <a href="labyrinthe.php"> <!-- Lien vers la page du labyrinthe -->
        <button>Jouer</button> <!-- Bouton pour commencer une partie -->
      </a>

      <a href="labyrinthe.php?page=regles"> <!-- Lien vers la page des règles du jeu -->
        <button>Règles</button> <!-- Bouton pour afficher les règles -->
      </a>
    </div>
  </main>
</body>
</html>
