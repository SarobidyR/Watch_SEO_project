<?php

require("connexion_mysql.php");

session_start();
if (isset($_SESSION['id'])) {
    $session_id = $_SESSION['id'];

    $sql_orders = "SELECT * FROM v_orders_produits WHERE id_users = $session_id and statut = 1";
    $query_orders = mysqli_query($bdd, $sql_orders);
} else {
    header('Location: index.php');
}


$sql_orders = "SELECT * FROM v_orders_produits WHERE id_users = $session_id and statut = 1";
$query_orders = mysqli_query($bdd, $sql_orders);

//Total
$total = 0;
$list_orders = mysqli_query($bdd, $sql_orders);

while ($order = mysqli_fetch_assoc($list_orders)) {
    $total = $total + $order['montant_total_produits'];
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panier</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <?php include("header.php") ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="accueil.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($orders = mysqli_fetch_assoc($query_orders)) { ?>
                                    <tr>
                                        <td class="cart__product__item">
                                            <img src="<?php echo $orders['images']; ?>" alt="" height="80">
                                            <div class="cart__product__item__title">
                                                <h6><?php echo $orders['produit']; ?></h6>
                                            </div>
                                        </td>
                                        <td class="cart__price"><?php echo $orders['prix']; ?></td>
                                        <td class="cart__quantity">
                                            <?php echo $orders['qte']; ?>
                                        </td>
                                        <td class="cart__total"><?php echo $orders['montant_total_produits']; ?></td>
                                        <form action="order_traitement.php" method="post">
                                            <td class="cart__close"><button type="submit"><span class="icon_close"></button></span></td>
                                            <input type="hidden" name="delete_produit" value="<?php echo $orders['id_produit']; ?>">
                                        </form>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">

            </div>
            <div class="col-lg-4">
                <div class="cart__total__procced">
                    <form action="order_traitement.php" method="post">

                        <h6>Cart total</h6>
                        <ul>
                            <li>Total <span>$ <?php echo $total; ?></span></li>
                        </ul>
                        <input type="hidden" name="commander" value="1">
                        <button type="submit" class="site-btn"> Passer commande</button>

                    </form>

                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->

    <!-- Instagram Begin -->

    <!-- Instagram End -->

    <!-- Footer Section Begin -->
    <?php include("footer.php") ?>