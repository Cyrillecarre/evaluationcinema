
// connection à la bdd

<?php
$dsn = 'mysql:host=localhost; port=8888 ;dbname=EvaluationCinema';
$username = 'cyrillecarre';
$password = 'C.Carre';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion à la base de données réussie";

    // Enregistrement dans la table "abonnement"
    $nom = 'Carre';
    $prenom = 'Cyrille';
    $email = 'cyrille.carre@gmail.com';
    $hashedpassword = password_hash('Mdp123456', PASSWORD_DEFAULT);
 
    $query = "INSERT INTO abonnement (nom, prenom, email, hashedpassword) VALUES ('Carre', 'Cyrille', 'cyrille.carre@gmail.com', 'Mdp123456')";     
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nom, $prenom, $email, $hashedpassword]);

    echo "Enregistrement réussi";
 
    // Récupération de l'ID du nouvel utilisateur
    $idUtilisateur = $pdo->lastInsertId();
 
    //selection du film de l'heure et du cinema

    $idCinema = 1; 
    $idFilm = 1;
    $idSalle = 1; 
    $idHoraire = 1;

    /* verification dans la table film_horaire_cinema_salle, compatibilité, penser à mettre une restriction d'inscription dans le cas ou les enregistrement sont
    superieur à la capacité de la salle, mais aussi dans 1 cinema à la fois et dans 1 salle à la fois */

    $queryVerification = "SELECT COUNT(*) FROM film_horaire_cinema_salle WHERE idFilm = 1 AND idCinema = 1 AND idHeure = 1 AND idSalle = 1";
    $stmtVerification = $pdo->prepare($queryVerification);
    $stmtVerification->execute([$idFilm, $idCinema, $idHeure, $idSalle]);
    $nombreReservationsExistante = $stmtVerification->fetchColumn();

    if ($nombreReservationsExistante > 0) {
        echo "Impossible de réserver dans le même cinéma à la même heure";
    } 
    
    else {
    $queryReservation = "INSERT INTO reservation (idUser, idCinema, idSalle, idHeure, idFilm) VALUES ('1', '1', '1', '1', '1')";
    $stmtReservation = $pdo->prepare($queryReservation);
    $stmtReservation->execute([$idUser, $idCinema, $idSalle, $idHeure, $idFilm]);
    echo "Réservation effectuée";
    }
 
} 

catch (PDOException $e) {
    echo "Échec de la connexion à la base de données : " . $e->getMessage();
}

?>

/* dans l'ennonce il est dit que je dois expliquer le processus de sauvegarde, de la bdd complete.
dans le terminal je me connect à mysql,
je tape: mysql -u cyrillecarre -p.  
Use EvaluationCinema pour me connecter à la bdd.
j'effectue les modifications que je souhaite, et je sauvegarde avec la commande: 
mysqldump -u root EvaluationCinema > EvaluationCinema.sql

je pense que la bdd est pas optimum dans le sens ou il y a deux tables qui sont presque identiques, 
la table: film_horaire_cinem_salle et la table reservation. Mais je ne sais pas trop comment optimiser cela,
parce que j'ai besoin de cette table avant reservation pour visualiser si le film est disponible à l'heure et dans le cinema choisi.
Et apres seulement je vais pouvoir enregistrer la reservation dans la table reservation.
*/