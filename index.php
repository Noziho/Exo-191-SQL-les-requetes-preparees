<?php

/**
 * Reprenez le code de l'exercice précédent et transformez vos requêtes pour utiliser les requêtes préparées
 * la méthode de bind du paramètre et du choix du marqueur de données est à votre convenance.
 */

require __DIR__ . '/Config.php';
require __DIR__ . '/DBconnect.php';
/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */

try {
    /**
     * Créez ici votre objet de connection PDO, et utilisez à chaque fois le même objet $pdo ici.
     */


    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */
    $nom = "Decroix";
    $prenom = "Noah";
    $mail = "noah.decroixx3@gmail.com";
    $password = "dede";
    $adresse = "mon adresse";
    $postal_code = '59530';
    $pays = "France";

    $stm = DB_Connect::dbConnect()->prepare("
        INSERT INTO utilisateur (family_name, name, email, password, adresse, postal_code, country)
        VALUES (:nom, :prenom, :mail, :password, :adresse, :postal_code, :pays)
    ");

    $stm->bindParam(':nom', $nom);
    $stm->bindParam(':prenom', $prenom);
    $stm->bindParam(':mail', $mail);
    $stm->bindParam(':password', $password);
    $stm->bindParam(':adresse', $adresse);
    $stm->bindParam(':postal_code', $postal_code);
    $stm->bindParam(':pays', $pays);

    //$stm->execute();

    //echo "Première requête préparé sucess";

    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    $titre = "Mon titre";
    $prix = 12;
    $descriC = "ma descri courte";
    $descriL = "ma descri un peu plus longue";

    $stm2 = DB_Connect::dbConnect()->prepare("
    INSERT INTO produit (title, price, description_courte, description_longue)
    VALUES (:titre, :prix, :descriptionC, :descriptionL)
    
    ");

    $stm2->bindParam(':titre', $titre);
    $stm2->bindParam(':prix', $prix);
    $stm2->bindParam(':descriptionC', $descriC);
    $stm2->bindParam(':descriptionL', $descriL);

    //$stm2->execute();

    //echo "Deuxième requête sucess";

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */
    $nom2 = "Decroixxx";
    $prenom2 = "Noahxxx";
    $mail2 = "noah.decroixxxxx3@gmail.com";
    $password2 = "dedeee";
    $adresse2 = "mon adresseeee";
    $postal_code2 = '59530';
    $pays2 = "France";

    $nom3 = "Decroixxxxx";
    $prenom3 = "Noahxxxxxx";
    $mail3 = "noah.decroixxxxxxxx3@gmail.com";
    $password3 = "dedeee";
    $adresse3 = "mon adresseeee";
    $postal_code3 = '59530';
    $pays3 = "France";

    $stm3 = DB_Connect::dbConnect()->prepare("
    INSERT INTO utilisateur (family_name, name, email, password, adresse, postal_code, country)
    VALUES (:nom, :prenom, :mail, :password, :adresse, :postal_code, :pays),
           (:nom2, :prenom2, :mail2, :password2, :adresse2, :postal_code2, :pays2)
    
    ");

    $stm3->bindParam(':nom', $nom2);
    $stm3->bindParam(':prenom', $prenom2);
    $stm3->bindParam(':mail', $mail2);
    $stm3->bindParam(':password', $password2);
    $stm3->bindParam(':adresse', $adresse2);
    $stm3->bindParam(':postal_code', $postal_code2);
    $stm3->bindParam(':pays', $pays2);

    $stm3->bindParam(':nom2', $nom3);
    $stm3->bindParam(':prenom2', $prenom3);
    $stm3->bindParam(':mail2', $mail3);
    $stm3->bindParam(':password2', $password3);
    $stm3->bindParam(':adresse2', $adresse3);
    $stm3->bindParam(':postal_code2', $postal_code3);
    $stm3->bindParam(':pays2', $pays3);

    //$stm3->execute();

    //echo "3e requête sucess";

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    $titre = "Mon titreEE";
    $prix = 122;
    $descriC = "ma descri courte";
    $descriL = "ma descri un peu plus longue";

    $stm4 = DB_Connect::dbConnect()->prepare("
    INSERT INTO produit (title, price, description_courte, description_longue)
    VALUES (:titre, :prix, :descriptionC, :descriptionL),
           (:titre2, :prix2, :descriptionC2, :descriptionL2)
    
    ");

    $stm4->bindParam(':titre', $titre);
    $stm4->bindParam(':prix', $prix);
    $stm4->bindParam(':descriptionC', $descriC);
    $stm4->bindParam(':descriptionL', $descriL);

    $stm4->bindParam(':titre2', $titre);
    $stm4->bindParam(':prix2', $prix);
    $stm4->bindParam(':descriptionC2', $descriC);
    $stm4->bindParam(':descriptionL2', $descriL);

    $stm4->execute();

    echo "Dernière requête sucess";
}
catch (PDOException $e) {
    echo $e->getMessage();
}
