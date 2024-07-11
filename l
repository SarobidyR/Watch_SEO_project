CREATE OR REPLACE VIEW v_orders_produits AS
SELECT id_order, orders.id_produit, id_users, produit, orders.prix, qte,
montant_total_produits, statut, date_achat, id_categories, images
FROM orders
JOIN produit ON orders.id_produit = produit.id_produit;