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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Avancée de Produits</title>
</head>

<body>
    <h1>Recherche Avancée de Produits</h1>
    <form action="search.php" method="get">
        <label for="produit_name">Nom du Produit:</label>
        <input type="text" id="produit_name" name="produit_name"><br>

        <label for="prix_min">Prix Min:</label>
        <input type="number" id="prix_min" name="prix_min" step="0.01"><br>

        <label for="prix_max">Prix Max:</label>
        <input type="number" id="prix_max" name="prix_max" step="0.01"><br>

        <label for="category">Catégorie:</label>
        <select id="category" name="category">
            <option value="">Toutes</option>
            <?php echo $categoryOptions; ?>
        </select><br>

        <input type="submit" value="Rechercher">
    </form>
</body>

</html>