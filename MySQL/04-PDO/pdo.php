<?php 

// https://www.php.net/manual/fr/book.pdo.php

// PDO : Php Data Object
// La class PDO représente la connexion à la BDD
// La class PDOStatement représente une réponse de la BDD
// https://www.php.net/manual/fr/class.pdostatement.php

/*

    methode exec() : pour exécuter des requetes de type action (INSERT INTO, UPDATE, DELETE)
        - Valeur de retour :
            - Echec : Erreur de syntaxe sur la requete.
            - Succès : on obtient un entier (int) représentant le nombre de ligne affectée

    methode query() : pour exécuter tout type de requete
        - valeur de retour :
            - Echec : Erreur de syntaxe sur la requete.
            - Succès : on obtient un nouvel objet issu de la class PDOStatement

    methode prepare() et execute() : 
        - valeur de retour :
            - prepare() :
                - On obtient toujours un nouvel objet issu de la class PDOStatement
                - bindParam() ou bindValue() pour la gestion des valeurs passées à la requete
                - et on lance la requete avec execute()
                    - Echec : Erreur de syntaxe sur la requete.
                    - Succès : le même objet PDOStatement contenant la réponse de la bdd
*/


//------------------------------------------------------------------
//------------------------------------------------------------------
// Connexion à la BDD
//------------------------------------------------------------------
//------------------------------------------------------------------

// Nous avons besoin de 5 informations
$host = 'mysql:host=localhost;dbname=entreprise'; // sgbd - adresse serveur - nom de la bdd
$login = 'root'; // pseudo de connexion à la BDD
$password = ''; // Mot de passe de connexion à la BDD - vide sur WAMP et XAMPP en revanche sur MAMP $password = 'root';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // pour la gestion des erreurs
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' // pour forcer la gestion de l'utf-8 
];

// Instanciation de l'objet PDO
$pdo = new PDO($host, $login, $password, $options);

echo '<pre>'; var_dump($pdo); echo '</pre>';
echo '<pre>'; var_dump(get_class_methods($pdo)); echo '</pre>';


echo '<h2>01 - Requete de type action avec exec() pour des requetes de type INSERT, UPDATE, DELETE</h2>';

if(false) {
    $resultat = $pdo->exec("INSERT INTO employes (id_employes, nom, prenom, sexe, service, salaire, date_embauche) VALUES (NULL, 'Quittard', 'Mathieu', 'm', 'informatique', 3000, CURDATE())");

    echo 'Nombre de ligne impactée par la requete : ' . $resultat . '<br>';
}

echo '<h2>01 - Methode query() pour une seule ligne de résultat</h2>';
// query() nous permet d'executer toutes les requetes possibles (INSERT, UPDATE, DELETE, SELECT, ALTER, SHOW ...)

$resultat = $pdo->query("SELECT * FROM employes WHERE id_employes = 350");
echo '<pre>'; var_dump($resultat); echo '</pre>';
echo '<pre>'; var_dump(get_class_methods($resultat)); echo '</pre>';

/*
+-------------+-------------+---------+------+-----------+---------------+---------+
| id_employes | prenom      | nom     | sexe | service   | date_embauche | salaire |
+-------------+-------------+---------+------+-----------+---------------+---------+
|         350 | Jean-pierre | Laborde | m    | direction | 2010-12-09    |    5000 |
+-------------+-------------+---------+------+-----------+---------------+---------+
*/

// En l'état les données obtenues sont inexploitables
// Pour les rendre exploitables via PHP nous devons appliquer un traitement 

// fetch() permet de rendre les données exploitable selon un format (array, object ...)
// une ligne traitée avec fetch n'existe plus dans la réponse

// Avec FETCH_ASSOC
// $data = $resultat->fetch(PDO::FETCH_ASSOC); // pour obtenir un tableau array associatif
// Avec FETCH_NUM
// $data = $resultat->fetch(PDO::FETCH_NUM); // pour obtenir un tableau array avec les indices numériques
// Avec FETCH_BOTH (cas par défaut si non précisé)
// $data = $resultat->fetch(PDO::FETCH_BOTH); // mélange de FETCH_ASSOC et de FETCH_NUM 
// Avec FETCH_OBJ
$data = $resultat->fetch(PDO::FETCH_OBJ); // pour obtenir un nouvel objet (stdClass) contenant les données sous forme de propriété


echo '<pre>'; print_r($data); echo '</pre>';

// echo 'Bonjour '  . $data['prenom'] . ', votre service est : ' . $data['service'] . '<hr>'; // Avec FETCH_ASSOC
// echo 'Bonjour '  . $data[1] . ', votre service est : ' . $data[4] . '<hr>'; // Avec FETCH_NUM
echo 'Bonjour '  . $data->prenom . ', votre service est : ' . $data->service . '<hr>'; // Avec FETCH_OBJ

echo '<ul>';
foreach($data AS $info) {
    echo '<li>' . $info . '</li>';
}
echo '</ul>';

echo '<h2>03 - requete de type select pour un ensemble de ligne avec fetch()</h2>';

$reponse = $pdo->query("SELECT * FROM employes WHERE service = 'commercial'");

// rowCount() est une methode de PDOStatement nous permettant d'obtenir le nombre de ligne obtenues
echo 'Il y a ' . $reponse->rowCount() . ' employés dans le service commercial<hr>';

// fetch() renvoie false lorsqu'il n'y a plus de ligne à traiter
echo '<div style="display: flex; flex-wrap : wrap; ">';
while($ligne = $reponse->fetch(PDO::FETCH_ASSOC)) {
    // echo '<pre>'; print_r($ligne); echo '</pre>';
    echo '<div style="width: 28%; padding: 1%; border: 1px solid black; margin: 1%;">';
    foreach($ligne AS $indice => $valeur) {
        echo $indice . ' : ' . $valeur . '<br>';
    }
    echo '</div>';

}
echo '</div>';


echo '<h2>04 - requete de type select pour un ensemble de ligne avec fetchAll()</h2>';
// fetchAll() va traiter toutes les lignes d'un coup et nous renvoyer un tableau array multidimensionnel
$reponse = $pdo->query("SELECT * FROM employes WHERE service = 'commercial'");
$data = $reponse->fetchAll(PDO::FETCH_OBJ);
echo '<pre>'; print_r($data); echo '</pre>';

foreach($data AS $ligne) {
    echo '- ' . $ligne->prenom . ' ' . $ligne->nom . ' | ' . $ligne->service . '<br>';
}
echo '<hr>';

echo '<h2>Affichez la liste des BDD du serveur dans une liste ul li</h2>';
$reponse = $pdo->query('SHOW DATABASES');

echo '<ul>';
while($ligne = $reponse->fetch(PDO::FETCH_ASSOC)) {
    // echo '<pre>'; print_r($ligne); echo '</pre>';
    echo '<li>' . $ligne['Database'] . '</li>';
}
echo '</ul>';

echo '<h2>Il est possible de faire un foreach sur la réponse brut (un fetch est appliqué automatiquement avec le mode par défaut (FETCH_BOTH))</h2>';
$reponse = $pdo->query("SELECT * FROM employes LIMIT 5");
echo '<ul>';
foreach($reponse AS $ligne) {
    echo '<li>' . $ligne['prenom'] . '</li>';
}
echo '</ul>';

echo '<h2>05 - Affichage de la réponse sous form de tableau html quelque soit la requête</h2>';
$reponse = $pdo->query("SELECT * FROM employes LIMIT 5");

echo '<table border="1" style="border-collapse: collapse; width: 100%">';

echo '<tr>';
for($i = 0; $i < $reponse->columnCount(); $i++) {
    // echo '<pre>'; print_r($reponse->getColumnMeta($i)); echo '</pre>';
    $infosColonne = $reponse->getColumnMeta($i);
    echo '<th style="padding: 5px;">' . $infosColonne['name'] . '</th>';
}
echo '</tr>';

while($ligne = $reponse->fetch(PDO::FETCH_OBJ)) {
    echo '<tr>';
    foreach($ligne AS $info) {
        echo '<td style="padding: 5px;">' . $info . '</td>';
    }
    echo '</tr>';
}

echo '</table>';

echo '<h2>06 - </h2>';

echo '<h2>06 - prepare() + bindParam() + execute() pour la sécurité</h2>';
// https://fr.wikipedia.org/wiki/Injection_SQL
// Si je dois exécuter une requete qui contient des informations provenant d'un utilisateur (POST, GET, COOKIE), nous ne pouvons faire confiance à l'utilisateur.
// Dans ce cas il est obligatoire d'utiliser la methode prepare()
// Comme query(), prepare() permet d'exécuter tout type de requete
// L'idée est de préparer la requete et on représente les informations attendues
// Ensuite dans un deuxième temps on fourni ces informations via bindParam ou autre
// le fait de séparer la requete des informations fournies, bloque toutes les injections SQL potentielles.

$info = 'truc';
$pdo->query("SELECT * FROM employes WHERE service = '$info'"); // INTERDIT !!!

// Pour représenter une information on utilise un marqueur

$prenom = 'Chloe';
$id = 417;

$req_preparee = $pdo->prepare("SELECT * FROM employes WHERE prenom = :prenom AND id_employes = :id"); // :prenom et :id sont des marqueurs nominatif
echo '<pre>'; var_dump($req_preparee); echo '</pre>';

// on fourni les informations attendues via bindParam
// bindValue attend une valeur.
// bindParam attend une variable

$req_preparee->bindParam(':id', $id, PDO::PARAM_STR);
$req_preparee->bindParam(':prenom', $prenom, PDO::PARAM_STR);

// la requete est prête, on peut la lancer
$req_preparee->execute();

$data = $req_preparee->fetch(PDO::FETCH_ASSOC);

echo '<pre>'; print_r($data); echo '</pre><hr>';


// il est possible de ne pas passer par les bindParam et de fournir les informations dans l'execute() sous form de tableau array
$req_preparee = $pdo->prepare("SELECT * FROM employes WHERE prenom = :prenom AND id_employes = :id");
$req_preparee->execute([':prenom' => $prenom, ':id' => $id]);

$data = $req_preparee->fetch(PDO::FETCH_ASSOC);

echo '<pre>'; print_r($data); echo '</pre><hr>';

// il est possible de représenter les informatiosn par un marqueur simple ? dans ce cas on fourni un tableau à l'execute en respectant
$req_preparee = $pdo->prepare("SELECT * FROM employes WHERE prenom = ? AND id_employes = ?");
$req_preparee->execute([$prenom, $id]);

$data = $req_preparee->fetch(PDO::FETCH_ASSOC);

echo '<pre>'; print_r($data); echo '</pre><hr>';





























echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';