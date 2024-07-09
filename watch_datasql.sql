create database watch_data;
use watch_data;

create table users (
    id_users int(10) not null primary key auto_increment ,
    nom varchar(50),
    identifiant varchar(50),
    mdp varchar(50)
);

create table categories(
    id_categories int(10) not null primary key,
    categories varchar(100) UNIQUE,
    featured varchar(10) default null,
    active varchar(10) default null
);

create table order(
    id_order int(10) not null primary key auto_increment ,
    id_produit int,
    id_users int,
    prix decimal,
    qte int,
    montant_total_produits decimal,
    statut int default 1,
    date_achat datetime,
);

create table produit(
    id_produit int(10) not null primary key auto_increment,
    produit varchar(50),
    descriptions varchar(255),
    prix decimal,
    images varchar(255),
    id_categories int(10),
    featured varchar(10) default null,
    active varchar(10) default null,
    FOREIGN KEY(id_categories) REFERENCES categories(id_categories)
);