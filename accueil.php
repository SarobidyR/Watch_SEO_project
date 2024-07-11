<?php

require("connexion_mysql.php");

session_start();
if (!isset($_SESSION['identifiant'])) {
    header('Location:index.php');
}
if (!isset($_SESSION['mdp'])) {
    header('Location:index.php');
}
$identifiant = $_SESSION['identifiant'];
$mdp = $_SESSION['mdp'];
$id = $_SESSION['id'];


$format1 = "SELECT * FROM users WHERE identifiant='%s'";
$sql1 = sprintf($format1, $identifiant);
$resultat1 = mysqli_query($bdd, $sql1);
$donnees1 = mysqli_fetch_assoc($resultat1);

$sql_produit = "SELECT * FROM produit";
$query_produit = mysqli_query($bdd, $sql_produit);

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Découvrez la meilleure 
    sélection de montres de luxe neuves et d'occasion sur Ventura.
        Nous offrons des marques prestigieuses comme Rolex, Patek Philippe, et Omega,
        avec des garanties d'authenticité et un service client inégalé.
        Achetez, vendez ou échangez vos montres de luxe en toute confiance.">

    <meta name="keywords" content="montres de luxe, montres d'occasion, montres de collection, acheter montres de luxe, vendre montres de luxe, Rolex, Patek Philippe, Audemars Piguet, Omega, Cartier, Breitling, montres haut de gamme, montre de luxe homme, montre de luxe femme, investissement montre de luxe, marché montre de luxe, authentification montres de luxe, revendeur montres de luxe, montre d'occasion certifiée, collection de montres, horlogerie de luxe, acheter Rolex d'occasion, vendre montre Rolex, montre de luxe vintage, montre de sport de luxe, montre automatique de luxe, boutique de montres de luxe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>

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

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXXXX-X"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-XXXXXXXXX-X');
    </script>
    <!-- End Google Analytics -->

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-XXXXXXX');
    </script>
    <!-- End Google Tag Manager -->

</head>

</head>

<body>


    <!-- Header Section Begin -->
    <?php include("header.php") ?>
    <!-- Header Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h2>Bonjour <?php echo $donnees1['nom']; ?> !</h2>
                        <br>
                        <h4>Nos Produits</h4>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".women">Women’s</li>
                        <li data-filter=".men">Men’s</li>
                        <li data-filter=".men">Unisex</li>
                    </ul>
                </div>
            </div>
            <div class="row property__gallery">
                <?php while ($produit = mysqli_fetch_assoc($query_produit)) { ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix mb-5">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="<?php echo $produit['images']; ?>">
                                <ul class="product__hover">
                                    <li><a href="img/product/Watch1.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                    <li><a href="#"><span class="icon_heart_alt"></span></a></li>

                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><?php echo $produit['produit']; ?></h6>
                                <div class="product__price">$ <?php echo $produit['prix']; ?></div>
                                <div style="height: 20px;"></div>
                                <form action="product-details.php" method="post">
                                    <input type="hidden" name="id_produit" value="<?php echo $produit['id_produit']; ?>">
                                    <button type="submit" class="site-btn" style="background: #f2f2f2; color: #111111;">Voir details</button>
                                </form>

                                <div style="height: 5px;"></div>
                                <form action="order_traitement.php" method="post">
                                    <input type="hidden" name="un_produit" value="<?php echo $produit['id_produit']; ?>">
                                    <input type="hidden" name="un_prix" value="<?php echo $produit['prix']; ?>">

                                    <button type="submit" class="site-btn"><span class="icon_bag_alt"></span> Ajouter au panier</button>

                                </form>
                                <br>

                            </div>
                        </div>
                    </div>
                    <br>
                <?php } ?>

            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Banner Section Begin -->

    <!-- Trend Section End -->

    <!-- Discount Section Begin -->

    <!-- Services Section End -->

    <!-- Instagram Begin -->
    <!-- Instagram End -->

    <!-- Footer Section Begin -->
    <?php include("footer.php") ?>