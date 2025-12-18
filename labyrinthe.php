<?php
<<<<<<< HEAD
session_start(); // Démarre une session pour stocker les infos du joueur (position, clés, score, etc.)

// Définition du fichier de base de données SQLite
$bdd_fichier = 'labyrinthe.db';
if (!file_exists($bdd_fichier)) {
    die("Erreur : fichier de base '$bdd_fichier' introuvable."); // Stoppe le script si la DB n'existe pas
}
$sqlite = new SQLite3($bdd_fichier); // Connexion à la base de données SQLite

// Début d'une nouvelle partie
if (isset($_POST['commencer'])) {
    // Récupère le couloir de départ depuis la base
=======
session_start();


$bdd_fichier = 'labyrinthe.db';
if (!file_exists($bdd_fichier)) {
    die("Erreur : fichier de base '$bdd_fichier' introuvable.");
}
$sqlite = new SQLite3($bdd_fichier);


if (isset($_POST['commencer'])) {
>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
    $res = $sqlite->query("SELECT id FROM couloir WHERE type='depart' LIMIT 1");
    $row = $res->fetchArray(SQLITE3_ASSOC);

    if (!$row) die("Erreur : aucun couloir de type 'depart' dans la base.");

<<<<<<< HEAD
    // Initialisation des variables de session pour la partie
    $_SESSION['position'] = intval($row['id']); // position actuelle du joueur
    $_SESSION['deplacements'] = 0; // nombre de déplacements
    $_SESSION['cles'] = 0; // nombre de clés possédées
    $_SESSION['cle_collecte'] = []; // liste des couloirs où des clés ont été collectées
    $_SESSION['grilles_ouvertes'] = []; // liste des passages ouverts par clé

    header("Location: labyrinthe.php"); // Redirection vers la page de jeu
    exit;
}

// Affichage de la page des règles
=======
    $_SESSION['position'] = intval($row['id']);
    $_SESSION['deplacements'] = 0;
    $_SESSION['cles'] = 0;
    $_SESSION['cle_collecte'] = [];
    $_SESSION['grilles_ouvertes'] = [];

    header("Location: labyrinthe.php");
    exit;
}


>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
if (isset($_GET['page']) && $_GET['page'] === 'regles') :
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Règles du Labyrinthe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>📜 Règles du jeu</h1>
    <ul>
        <li>Le joueur commence au centre du labyrinthe et doit atteindre la sortie pour gagner.</li>
        <li>Certains passages sont fermés par des grilles et ne peuvent être franchis qu'en collectant des clés dispersées dans le labyrinthe.</li>
        <li>Il faut planifier vos déplacements pour récupérer les clés nécessaires et ouvrir les grilles au bon moment.</li>
        <li>La partie se termine lorsque le joueur atteint la sortie. Votre score correspond au nombre de déplacements effectués.</li>
    </ul>

    <form action="labyrinthe.php" method="get">
<<<<<<< HEAD
        <button>Retour à l'accueil</button> <!-- Bouton pour revenir à l'accueil -->
=======
        <button>Retour à l'accueil</button>
>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
    </form>
</body>
</html>
<?php
<<<<<<< HEAD
exit; // Fin du script pour la page des règles
endif;

// Affichage de la page d'accueil si la partie n'a pas encore commencé
=======
exit;
endif;


>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
if (!isset($_SESSION['position'])):
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Labyrinthe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bienvenue dans le Labyrinthe !</h1>
    <p>Vous êtes au cœur d'une forêt mystérieuse… Trouvez votre chemin et atteignez la sortie !</p>
    <form action="labyrinthe.php" method="post">
<<<<<<< HEAD
        <button name="commencer">Commencer la partie</button> <!-- Commencer le jeu -->
    </form>

    <form action="labyrinthe.php" method="get">
        <button name="page" value="regles">Règles du jeu</button> <!-- Lien vers les règles -->
=======
        <button name="commencer">Commencer la partie</button>
    </form>

    <form action="labyrinthe.php" method="get">
        <button name="page" value="regles">Règles du jeu</button>
>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
    </form>
</body>
</html>
<?php
<<<<<<< HEAD
exit; // Fin du script pour l'accueil
endif;
?>

=======

exit;
endif;


?>
>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Labyrinthe en cours</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
<<<<<<< HEAD
// Initialisation des variables de session si elles n'existent pas
=======

>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
if (!isset($_SESSION['deplacements'])) $_SESSION['deplacements'] = 0;
if (!isset($_SESSION['cles'])) $_SESSION['cles'] = 0;
if (!isset($_SESSION['cle_collecte'])) $_SESSION['cle_collecte'] = [];
if (!isset($_SESSION['grilles_ouvertes'])) $_SESSION['grilles_ouvertes'] = [];

<<<<<<< HEAD
// Fonction pour générer une clé unique pour chaque passage (utile pour les grilles)
=======
>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
function passage_key(int $a, int $b): string {
    return ($a <= $b) ? "$a-$b" : "$b-$a";
}

<<<<<<< HEAD
$msg = ""; // Message à afficher au joueur

// Utilisation d'une clé pour ouvrir une grille
=======
$msg = "";


>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
if (isset($_GET['useKey']) && isset($_GET['id'])) {
    $target = intval($_GET['id']);
    $current = $_SESSION['position'] ?? null;

    if ($current === null) $msg = "Démarre une partie d'abord.";
    else {
<<<<<<< HEAD
        // Vérifie si une grille existe entre le couloir actuel et le couloir cible
=======
>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
        $check = $sqlite->prepare("
            SELECT * FROM passage
            WHERE ((couloir1 = :a AND couloir2 = :b) OR (couloir1 = :b AND couloir2 = :a))
              AND type = 'grille'
            LIMIT 1
        ");
        $check->bindValue(':a', $current, SQLITE3_INTEGER);
        $check->bindValue(':b', $target, SQLITE3_INTEGER);
        $r = $check->execute()->fetchArray(SQLITE3_ASSOC);

        if (!$r) $msg = "Aucune grille entre $current et $target.";
        else {
            if ($_SESSION['cles'] > 0) {
<<<<<<< HEAD
                $_SESSION['cles'] -= 1; // Retire une clé
                $pk = passage_key($current, $target); // Génère la clé unique pour le passage
                if (!in_array($pk, $_SESSION['grilles_ouvertes'])) $_SESSION['grilles_ouvertes'][] = $pk;
                $_SESSION['position'] = $target; // Déplace le joueur
                $_SESSION['deplacements'] += 1; // Compte le déplacement
                header("Location: labyrinthe.php?id=".$target); // Redirection pour mettre à jour la page
=======
                $_SESSION['cles'] -= 1;
                $pk = passage_key($current, $target);
                if (!in_array($pk, $_SESSION['grilles_ouvertes'])) $_SESSION['grilles_ouvertes'][] = $pk;
                $_SESSION['position'] = $target;
                $_SESSION['deplacements'] += 1;
                header("Location: labyrinthe.php?id=".$target);
>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
                exit;
            } else $msg = "Vous n'avez pas de clé pour ouvrir la grille.";
        }
    }
}

<<<<<<< HEAD
// Déplacement simple sans clé
=======

>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
if (isset($_GET['id']) && !isset($_GET['useKey'])) {
    $target = intval($_GET['id']);
    $current = $_SESSION['position'] ?? null;

    if ($current === null) $msg = "Démarre une partie d'abord.";
    else {
<<<<<<< HEAD
        // Vérifie s'il existe un passage entre le couloir actuel et le couloir cible
=======
>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
        $check = $sqlite->prepare("
            SELECT * FROM passage
            WHERE (couloir1 = :a AND couloir2 = :b) OR (couloir1 = :b AND couloir2 = :a)
            LIMIT 1
        ");
        $check->bindValue(':a', $current, SQLITE3_INTEGER);
        $check->bindValue(':b', $target, SQLITE3_INTEGER);
        $r = $check->execute()->fetchArray(SQLITE3_ASSOC);

        if (!$r) $msg = "Pas de passage direct entre $current et $target.";
        else {
            $type_passage = $r['type'] ?? 'normal';
<<<<<<< HEAD
            if ($type_passage === 'grille') { // Passage fermé par une grille
=======
            if ($type_passage === 'grille') {
>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
                $pk = passage_key($current, $target);
                if (in_array($pk, $_SESSION['grilles_ouvertes'])) {
                    $_SESSION['position'] = $target;
                    $_SESSION['deplacements'] += 1;
                    header("Location: labyrinthe.php?id=".$target);
                    exit;
                } else $msg = "Grille verrouillée entre $current et $target. Si vous avez une clé, utilisez le lien proposé pour l'ouvrir.";
<<<<<<< HEAD
            } else { // Passage normal
=======
            } else {
>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
                $_SESSION['position'] = $target;
                $_SESSION['deplacements'] += 1;
                header("Location: labyrinthe.php?id=".$target);
                exit;
            }
        }
    }
}

<<<<<<< HEAD
// Récupère les infos du couloir actuel
$position_actuelle = $_SESSION['position'] ?? null;
=======

$position_actuelle = $_SESSION['position'] ?? null;


>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
$stmt = $sqlite->prepare("SELECT * FROM couloir WHERE id = :id LIMIT 1");
$stmt->bindValue(':id', $position_actuelle, SQLITE3_INTEGER);
$couloir = $stmt->execute()->fetchArray(SQLITE3_ASSOC);

if (!$couloir) {
    echo "<h1>Couloir introuvable (id={$position_actuelle})</h1>";
    echo '<p><a href="labyrinthe.php?restart=1">Restart</a></p>';
    exit;
}

<<<<<<< HEAD
// Collecte des clés si le joueur est sur un couloir contenant une clé
=======

>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
if ($couloir['type'] === 'cle' && !in_array($position_actuelle, $_SESSION['cle_collecte'])) {
    $_SESSION['cles'] += 1;
    $_SESSION['cle_collecte'][] = $position_actuelle;
    $msg = "🔑 Vous avez trouvé une clé !";
}

<<<<<<< HEAD
// Gestion de la sortie
if ($couloir['type'] === 'sortie') {
    $score = $_SESSION['deplacements'] ?? 0;
    session_destroy(); // Fin de la partie
=======

if ($couloir['type'] === 'sortie') {
    $score = $_SESSION['deplacements'] ?? 0;
    session_destroy();
>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
    echo "<h1>🎉 Félicitations ! Vous avez atteint la sortie !</h1>";
    echo "<p>VOTRE SCORE (Nombre de déplacements) : <strong>$score</strong></p>";
    echo '<p><a href="labyrinthe.php">Rejouer</a></p>';
    exit;
}

<<<<<<< HEAD
// Affichage des infos du joueur
=======

>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
echo "<h1>Labyrinthe</h1>";
echo "<p>🔑 Clés en possession : <strong>{$_SESSION['cles']}</strong> &nbsp;|&nbsp; Score : <strong>{$_SESSION['deplacements']}</strong></p>";
if ($msg !== "") echo "<p style='color:green;'>".htmlspecialchars($msg)."</p>";

<<<<<<< HEAD
// Affichage des passages possibles
=======

>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
$stmt2 = $sqlite->prepare("SELECT * FROM passage WHERE couloir1 = :id OR couloir2 = :id");
$stmt2->bindValue(':id', $position_actuelle, SQLITE3_INTEGER);
$passages = $stmt2->execute();

echo "<h2>Vous êtes dans le couloir {$couloir['id']} (Type : ".htmlspecialchars($couloir['type']).")</h2>";
echo "<h3>Passages possibles :</h3><ul>";
$any = false;
while ($p = $passages->fetchArray(SQLITE3_ASSOC)) {
    $any = true;
    $a = $p['couloir1'];
    $b = $p['couloir2'];
    $id_suivant = ($a == $position_actuelle) ? $b : $a;
    $typep = $p['type'] ?? 'normal';

<<<<<<< HEAD
    if ($typep === 'grille') { // Gestion des grilles
=======
    if ($typep === 'grille') {
>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
        $pk = passage_key($a, $b);
        if (in_array($pk, $_SESSION['grilles_ouvertes'])) {
            echo "<li>🔓 Grille (ouverte) vers {$id_suivant} — <a href='labyrinthe.php?id={$id_suivant}'>(passage:libre)</a></li>";
        } else {
            if ($_SESSION['cles'] > 0) {
                echo "<li>🔐 Grille vers {$id_suivant} — <a href='labyrinthe.php?useKey=1&id={$id_suivant}'>Utiliser 1 clé et ouvrir</a></li>";
            } else {
                echo "<li>🔐 Grille vers {$id_suivant} — <strong>bloquée (clé requise)</strong></li>";
            }
        }
<<<<<<< HEAD
    } else { // Passage normal
=======
    } else {
>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
        echo "<li><a href='labyrinthe.php?id={$id_suivant}'>Aller au couloir {$id_suivant} (passage: {$typep})</a></li>";
    }
}
if (!$any) echo "<li>Aucun passage.</li>";
echo "</ul>";

<<<<<<< HEAD
// Bouton pour réinitialiser la partie
echo '<p><a href="labyrinthe.php?restart=1">Restart (réinitialise la partie)</a></p>';
if (isset($_GET['restart'])) {
    session_destroy();
    header("Location: labyrinthe.php"); // Redirection vers le début
=======

echo '<p><a href="labyrinthe.php?restart=1">Restart (réinitialise la partie)</a></p>';
if (isset($_GET['restart'])) {
    session_destroy();
    header("Location: labyrinthe.php");
>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
    exit;
}
?>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 2b34c527e4102b0c0d6df9fe3901c4e7b179e090
