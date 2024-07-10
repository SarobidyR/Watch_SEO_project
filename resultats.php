<?php
// Connexion à la base de données
require("connexion_mysql.php");

// Récupération des paramètres de recherche
$produit_name = isset($_GET['produit_name']) ? $_GET['produit_name'] : '';
$prix_min = isset($_GET['prix_min']) ? $_GET['prix_min'] : '';
$prix_max = isset($_GET['prix_max']) ? $_GET['prix_max'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Construction de la requête SQL dynamique
$query = "SELECT p.*, c.categories FROM produit p LEFT JOIN categories c ON p.id_categories = c.id_categories WHERE 1=1";

if (!empty($produit_name)) {
    $query .= " AND p.produit LIKE '%" . $bdd->real_escape_string($produit_name) . "%'";
}
if (!empty($prix_min)) {
    $query .= " AND p.prix >= " . floatval($prix_min);
}
if (!empty($prix_max)) {
    $query .= " AND p.prix <= " . floatval($prix_max);
}
if (!empty($category)) {
    $query .= " AND p.id_categories = " . intval($category);
}

// Exécution de la requête
$result = $bdd->query($query);
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
    <!-- Ajoutez vos éléments de page ici, comme le header -->
    <?php include("header.php"); ?>

    <section class="product spad">
        <div class="container">
            <h2>Résultats de la Recherche</h2>
            <div class="row property__gallery">
                <?php if ($result->num_rows > 0) : ?>
                    <?php while ($produit = $result->fetch_assoc()) : ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix women men kid accessories cosmetic">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?= htmlspecialchars($produit['images']) ?>">
                                    <ul class="product__hover">
                                        <li><a href="<?= htmlspecialchars($produit['images']) ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><?= htmlspecialchars($produit['produit']) ?></h6>
                                    <div class="product__price">$ <?= htmlspecialchars($produit['prix']) ?></div>
                                    <div style="height: 20px;"></div>
                                    <form action="product-details.php" method="post">
                                        <input type="hidden" name="id_produit" value="<?= htmlspecialchars($produit['id_produit']) ?>">
                                        <button type="submit" class="site-btn"><span class="icon_bag_alt"></span> Add to cart</button>
                                    </form>
                                    <br>
                                    <form action="product-details.php" method="post">
                                        <input type="hidden" name="id_produit" value="<?= htmlspecialchars($produit['id_produit']) ?>">
                                        <button type="submit" class="site-btn"><span class="arrow_expand"></span> Voir Détails</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Aucun résultat trouvé.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Ajoutez vos éléments de page ici, comme le footer -->
    <?php include("footer.php"); ?>

    <!-- Ajoutez vos scripts JS ici -->
</body>

</html>

<?php
$bdd->close();
?>