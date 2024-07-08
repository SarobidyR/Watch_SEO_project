create database watch_data;
use watch_data;

create table users (
    id_users int(10) not null primary key auto_increment ,
    nom varchar(50),
    identifiant varchar(50),
    mdp varchar(50)
);

create table categories(
    id_categories int(10) not null primary key auto_increment ,
    categories varchar(100),
    images varchar(255),
    featured varchar(10),
    active varchar(10)
);


create table produit(
    id_produit int(10) not null primary key auto_increment,
    id_categories int(10)not null,
  foreign key (id_categories) references categories(id_categories),
    produit varchar(50),
    descriptions varchar(255),
    prix decimal,
    images varchar(255),
    featured varchar(10),
    active varchar(10)
);

create table order(
    id_order int(10) not null primary key auto_increment ,
    id_produit int,
    prix decimal,
    qte int,
    montant_total_produits decimal,
    date_achat datetime,
    statut int default 1,
    id_users int,
    adresse_livraison varchar(50),
    foreign key (id_produit) references produit(id_produit)
);

