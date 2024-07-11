<?php
require("connexion_mysql.php");

session_start();
$_SESSION['identifiant'] = $_GET['identifiant'];
$_SESSION['mdp'] = $_GET['mdp'];

$format1 = "SELECT * FROM users WHERE identifiant='%s' AND mdp='%s'";
$sql1 = sprintf($format1, $_SESSION['identifiant'], $_SESSION['mdp']);
$resultat1 = mysqli_query($bdd, $sql1);
$donnees1 = mysqli_fetch_assoc($resultat1);
$_SESSION['id'] = $donnees1['id_users'];

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Découvrez la meilleure sélection de montres 
    de luxe neuves et d'occasion sur Ventura . Nous offrons des marques prestigieuses
     comme Rolex, Patek Philippe, et Omega, avec des garanties 
     d'authenticité et un service client inégalé. 
    Achetez, vendez ou échangez vos montres de luxe en toute confiance.">
    <meta name="keywords" content="montres de luxe, montres d'occasion, montres de collection, acheter montres de luxe, vendre montres de luxe, Rolex, Patek Philippe, Audemars Piguet, Omega, Cartier, Breitling, montres haut de gamme, montre de luxe homme, montre de luxe femme, investissement montre de luxe, marché montre de luxe, authentification montres de luxe, revendeur montres de luxe, montre d'occasion certifiée, collection de montres, horlogerie de luxe, acheter Rolex d'occasion, vendre montre Rolex, montre de luxe vintage, montre de sport de luxe, montre automatique de luxe, boutique de montres de luxe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>

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
    <?php
    if ($_SESSION['mdp'] == $donnees1['mdp'])
        header('Location:accueil.php');
    else {
        echo 'Votre identifiant/mot de passe est incorrect';
    }
    ?>
    <br>
    <a href="login.php" class="alert-danger">Veuillez réessayer.</a>
</body>

</html>