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

if ($result->num_rows > 0) {
    echo "<h2>Résultats de la Recherche:</h2>";
    echo "<table border='1'>
            <tr>
                <th>Nom du Produit</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Images</th>
                <th>Catégorie</th>

            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['produit']) . "</td>
            <td>" . htmlspecialchars($row['descriptions']) . "</td>
                <td>" . htmlspecialchars($row['prix']) . "</td>
                <td>" . htmlspecialchars($row['images']) . "</td>
                <td>" . htmlspecialchars($row['categories']) . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Aucun résultat trouvé.";
}

$bdd->close();
