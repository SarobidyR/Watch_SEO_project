<?php

require("connexion_mysql.php");

if (isset($_POST['id_produit'])) {
    $id_produit = $_POST['id_produit'];
    // echo "ID du produit : " . $id_produit;
    $sql_details = "SELECT * FROM produit WHERE id_produit ='%s'";
    $sql2_details = sprintf($sql_details, $id_produit);
    $details_result = mysqli_query($bdd, $sql2_details);
    $details = mysqli_fetch_assoc($details_result);

    $id_categorie = $details['id_categories'];
    $sql_categorie = "SELECT * FROM categories WHERE id_categories ='%s'";
    $sql2_categorie = sprintf($sql_categorie, $id_categorie);
    $categorie_result = mysqli_query($bdd, $sql2_categorie);
    $categorie = mysqli_fetch_assoc($categorie_result);
    $categorie_name = $categorie['categories'];
} else {
    echo "id_produit = null";
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Explorez notre collection de montres, 
    y compris des modèles rares et recherchés. Ventura propose des montres 
     d'occasion en excellent état avec des certificats d'authenticité et des garanties de qualité.">


    <meta name="keywords" content="montres de luxe, montres d'occasion, montres de collection, acheter montres de luxe, vendre montres de luxe, Rolex, Patek Philippe, Audemars Piguet, Omega, Cartier, Breitling, montres haut de gamme, montre de luxe homme, montre de luxe femme, investissement montre de luxe, marché montre de luxe, authentification montres de luxe, revendeur montres de luxe, montre d'occasion certifiée, collection de montres, horlogerie de luxe, acheter Rolex d'occasion, vendre montre Rolex, montre de luxe vintage, montre de sport de luxe, montre automatique de luxe, boutique de montres de luxe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détails produits</title>

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

<body>
    <!-- Page Preloder -->

    <!-- Header Section Begin -->
    <?php include("header.php") ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">

                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img" src="<?php echo $details['images']; ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3><?php echo $details['produit']; ?> <span>Categorie : <?php echo $categorie_name; ?></span></h3>

                        <div class="product__details__price">$ <?php echo $details['prix']; ?> </div>
                        <p><?php echo $details['descriptions']; ?></p>
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantité:</span>
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                            <a href="#" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a>

                        </div>

                    </div>
                </div>

            </div>



        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Instagram Begin -->
    <!-- Instagram End -->

    <!-- Footer Section Begin -->
    <?php include 'footer.php'; ?>