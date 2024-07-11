<?php
    require("connexion_mysql.php");

    session_start();
    if (isset($_SESSION['id'])) {
        $session_id = $_SESSION['id'];

        //ADD ORDERS
        if(isset($_POST['quantite']))
        {
            $quantite = $_POST['quantite'];
            $id_produit = $_POST['id_produit'];
            $prix = $_POST['prix'];
            $total = $prix * $quantite;

            $sql_insert = "INSERT INTO orders (id_produit,  id_users, prix, qte, 
            montant_total_produits, date_achat) VALUES ($id_produit, $session_id,
            $prix, $quantite, $total, NOW())";
            
            $insert = mysqli_query($bdd, $sql_insert);

            header('Location: panier.php');


            if ($insert) {
                // echo "Commande insérée avec succès.";
            } else {            
                // echo "Erreur lors de l'insertion de la commande : " . mysqli_error($bdd);
            }
        }
        else
        {
            header('Location: panier.php');
        }

        //DELETE PRODUIT
        if (isset($_POST['delete_produit'])) {
            $id_produit = $_POST['delete_produit'];
            $sql_delete = "DELETE FROM orders WHERE id_produit = $id_produit";
            $delete = mysqli_query($bdd, $sql_delete);

            header('Location: panier.php');
        }

        if(isset($_POST['commander']))
        {
            $sql_update = "UPDATE orders SET statut = 2";
            $update = mysqli_query($bdd, $sql_update);
            $text = "COMMANDES PASSEES";
            header('Location : panier.php');
        }

        if(isset($_POST['un_produit']))
        {
            $quantite = 1;
            $id_produit = $_POST['un_produit'];
            $prix = $_POST['un_prix'];
            $total = $prix * $quantite;

            $sql_insert = "INSERT INTO orders (id_produit,  id_users, prix, qte, 
            montant_total_produits, date_achat) VALUES ($id_produit, $session_id,
            $prix, $quantite, $total, NOW())";
            
            $insert = mysqli_query($bdd, $sql_insert);

            header('Location: index.php');        
        }

    }
    else
    {
        header('Location: login.php');
    }
?>
