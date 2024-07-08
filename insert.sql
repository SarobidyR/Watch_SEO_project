--categorie
INSERT INTO categories(id_categories, categories) VALUES (1, 'Unisexe');
INSERT INTO categories(id_categories, categories) VALUES (2, 'Homme');
INSERT INTO categories(id_categories, categories) VALUES (3, 'Femme');

--produit
INSERT INTO produit(produit, descriptions, prix, images, id_categories) VALUES ('Longines Silver Square', 'Made of high-quality materials such as stainless steel, gold, platinum, etc., ensuring its durability and excellent quality', 500, 'img/product/Watch1.jpg', 1);
INSERT INTO produit(produit, descriptions, prix, images, id_categories) VALUES ('Casio Back In Black', 'Made of high-quality materials such as stainless steel, gold, platinum, etc., ensuring its durability and excellent quality', 250, 'img/product/Watch2.jpg', 1);
INSERT INTO produit(produit, descriptions, prix, images, id_categories) VALUES ('The Man', 'Made of high-quality materials such as stainless steel, gold, platinum, etc., ensuring its durability and excellent quality', 300, 'img/product/Watch3.jpg', 2);
INSERT INTO produit(produit, descriptions, prix, images, id_categories) VALUES ('Bering Desert', 'Made of high-quality materials such as stainless steel, gold, platinum, etc., ensuring its durability and excellent quality', 300, 'img/product/Watch4.jpg', 2);
INSERT INTO produit(produit, descriptions, prix, images, id_categories) VALUES ('Tissot 1853', 'Made of high-quality materials such as stainless steel, gold, platinum, etc., ensuring its durability and excellent quality', 650, 'img/product/Watch5.jpg', 1);
INSERT INTO produit(produit, descriptions, prix, images, id_categories) VALUES ('Raymond Weil Geneve', 'Made of high-quality materials such as stainless steel, gold, platinum, etc., ensuring its durability and excellent quality', 500, 'img/product/Watch6.jpg', 2);
INSERT INTO produit(produit, descriptions, prix, images, id_categories) VALUES ('Longines Fly Freely', 'Made of high-quality materials such as stainless steel, gold, platinum, etc., ensuring its durability and excellent quality', 350, 'img/product/Watch7.jpg', 3);
INSERT INTO produit(produit, descriptions, prix, images, id_categories) VALUES ('Breda XII', 'Made of high-quality materials such as stainless steel, gold, platinum, etc., ensuring its durability and excellent quality', 300, 'img/product/Watch8.jpg', 3);
INSERT INTO produit(produit, descriptions, prix, images, id_categories) VALUES ('Fossil In Frame', 'Made of high-quality materials such as stainless steel, gold, platinum, etc., ensuring its durability and excellent quality', 550, 'img/product/Watch9.jpg', 3);
INSERT INTO produit(produit, descriptions, prix, images, id_categories) VALUES ('Fossil In The Woods', 'Made of high-quality materials such as stainless steel, gold, platinum, etc., ensuring its durability and excellent quality', 400, 'img/product/Watch10.jpg', 2);
INSERT INTO produit(produit, descriptions, prix, images, id_categories) VALUES ('Bering The Star', 'Made of high-quality materials such as stainless steel, gold, platinum, etc., ensuring its durability and excellent quality', 350, 'img/product/Watch11.jpg', 3);
INSERT INTO produit(produit, descriptions, prix, images, id_categories) VALUES ('Duo-link', 'Made of high-quality materials such as stainless steel, gold, platinum, etc., ensuring its durability and excellent quality', 475, 'img/product/Watch12.jpg', 3);

UPDATE produit
SET descriptions = 'Fabriquée à partir de matériaux de haute qualité tels que l''acier inoxydable, l''or, le platine, etc., garantissant sa durabilité et une qualité exceptionnelle.';
