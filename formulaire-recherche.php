<?php
// Connexion à la base de données
require("connexion_mysql.php");


$categoryOptions = "";
$sql = "SELECT id_categories, categories FROM categories";
$result = $bdd->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categoryOptions .= "<option value='" . htmlspecialchars($row['id_categories']) . "'>" . htmlspecialchars($row['categories']) . "</option>";
    }
}

$bdd->close();
?>

<!DOCTYPE html>
<html lang="fr">

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

<body>
    <!-- Page Preloder -->

    <!-- Offcanvas Menu Begin -->

    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <<?php include("header.php"); ?> <!-- Header Section End -->

        <!-- Breadcrumb Begin -->

        <!-- Breadcrumb End -->

        <!-- Checkout Section Begin -->
        <section class="checkout spad">
            <div class="container">
                <div class="row">

                </div>
                <form action="resultats.php" class="checkout__form" method="get">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5>Rechercher une montre</h5>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                        <p>Nom du produit<span>*</span></p>
                                        <input type="text" id="produit_name" name="produit_name"><br>
                                    </div>
                                    <div class="checkout__form__input">
                                        <label for="prix_min">Prix Min:</label>
                                        <input type="number" id="prix_min" name="prix_min" step="0.01"><br>
                                    </div>
                                    <div class="checkout__form__input">
                                        <label for="prix_max">Prix Max:</label>
                                        <input type="number" id="prix_max" name="prix_max" step="0.01"><br>
                                    </div>
                                </div>
                                 <div class="col-lg-12 mb-5">
                                    <div class="checkout__form__input">
                                        <p>Catégorie: <span>*</span></p>
                                        <select id="category" name="category">
                                            <option value="">Toutes</option>
                                            <?php echo $categoryOptions; ?>
                                        </select><br>
                                    </div>
                                </div>
                                </br>
                                <input type="submit" class="site-btn" value="Rechercher">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->

        <!-- Instagram Begin -->
        <?php include("footer.php"); ?>