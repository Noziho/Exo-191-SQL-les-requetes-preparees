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
    $prenom= "Noah";
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

    $stm->execute();

    echo "Première requête préparé sucess";

    /**
     * 2. Insérez un nouveau produit dans la table produit
     */
    $insert2 = 'INSERT INTO produit (title, price, description_courte, description_longue) VALUES ';
    $sql2 = $insert2 . "('titre', '12', 'descri courte', 'descri longue')";
    //DB_Connect::dbConnect()->exec($sql2);
    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    $sql = "
        INSERT INTO utilisateur (family_name, name, email, password, adresse, postal_code, country)
         VALUES ('test', 'testtest', 'dede@gmail.com', 'dedede', 'monadresee', '55555', 'France'),
                ('teste', 'testtestee', 'dedeeee@gmail.com', 'dededdesdse', 'monadresedddde', '555555', 'France')   
    ";

    //DB_Connect::dbConnect()->exec($sql);
    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    $request = "
            INSERT INTO produit (title, price, description_courte, description_longue)
             VALUES ('titre1', '34', 'descrcourte', 'descr longue'),
                    ('titre2', '32', 'descrrr', 'descfzokfzeofz')
    ";
    DB_Connect::dbConnect()->exec($request);

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    DB_Connect::dbConnect()->beginTransaction();

    $request2 = $insert . "
    ('test', 'testtest', 'deddddd121212e@gmail.com', 'dedede', 'monadresee', '55555', 'France'),
    ('test', 'testtest', 'ded22332122121e@gmail.com', 'dedede', 'monadresee', '55555', 'France'),
    ('test', 'testtest', 'dede43412121234@gmail.com', 'dedede', 'monadresee', '55555', 'France')
    ";

    $request3 = $insert2 . "
    ('produit1', '499', 'descri courte', 'descri longue),
    ('produit2', '499', 'descri courte', 'descri longue),
    ('produit3', '499', 'descri courte', 'descri longue)
    
    ";

    DB_Connect::dbConnect()->exec($request2);
    DB_Connect::dbConnect()->commit();

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */
    echo "La ou les requêtes a/ont fonctionné(es)";
} catch (PDOException $e) {
    DB_Connect::dbConnect()->rollBack();
    echo "Erreur: " . $e->getMessage();
}
require __DIR__ . '/Config.php';
require __DIR__ . '/DB_Connect.php';
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
    $insert = 'INSERT INTO utilisateur (family_name, name, email, password, adresse, postal_code, country) VALUES';

    $sql1 = $insert . "('Decroix', 'Noah', 'noah.decroix3@gmail.com', 'dede', 'mon adresse', '59530', 'France')";

    //DB_Connect::dbConnect()->exec($sql1);

    /**
     * 2. Insérez un nouveau produit dans la table produit
     */
    $insert2 = 'INSERT INTO produit (title, price, description_courte, description_longue) VALUES ';
    $sql2 = $insert2 . "('titre', '12', 'descri courte', 'descri longue')";
    //DB_Connect::dbConnect()->exec($sql2);
    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    $sql = "
        INSERT INTO utilisateur (family_name, name, email, password, adresse, postal_code, country)
         VALUES ('test', 'testtest', 'dede@gmail.com', 'dedede', 'monadresee', '55555', 'France'),
                ('teste', 'testtestee', 'dedeeee@gmail.com', 'dededdesdse', 'monadresedddde', '555555', 'France')   
    ";

    //DB_Connect::dbConnect()->exec($sql);
    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    $request = "
            INSERT INTO produit (title, price, description_courte, description_longue)
             VALUES ('titre1', '34', 'descrcourte', 'descr longue'),
                    ('titre2', '32', 'descrrr', 'descfzokfzeofz')
    ";
    DB_Connect::dbConnect()->exec($request);

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    DB_Connect::dbConnect()->beginTransaction();

    $request2 = $insert . "
    ('test', 'testtest', 'deddddd121212e@gmail.com', 'dedede', 'monadresee', '55555', 'France'),
    ('test', 'testtest', 'ded22332122121e@gmail.com', 'dedede', 'monadresee', '55555', 'France'),
    ('test', 'testtest', 'dede43412121234@gmail.com', 'dedede', 'monadresee', '55555', 'France')
    ";

    $request3 = $insert2 . "
    ('produit1', '499', 'descri courte', 'descri longue),
    ('produit2', '499', 'descri courte', 'descri longue),
    ('produit3', '499', 'descri courte', 'descri longue)
    
    ";

    DB_Connect::dbConnect()->exec($request2);
    DB_Connect::dbConnect()->commit();

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */
    echo "La ou les requêtes a/ont fonctionné(es)";
} catch (PDOException $e) {
    DB_Connect::dbConnect()->rollBack();
    echo "Erreur: " . $e->getMessage();
}