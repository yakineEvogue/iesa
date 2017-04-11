--- Création d'une BDD : securite

CREATE TABLE membre (
  id_membre int(3) NOT NULL AUTO_INCREMENT,
  pseudo varchar(20) NOT NULL,
  mdp varchar(20) NOT NULL,
  nom varchar(20) NOT NULL,
  prenom varchar(20) NOT NULL,
  email varchar(50) NOT NULL,
  PRIMARY KEY (id_membre),
  UNIQUE KEY pseudo (pseudo)
) ENGINE=InnoDB ;


INSERT INTO membre (id_membre, pseudo, mdp, nom, prenom, email) VALUES
(1, 'Juju', 'soleil', 'Cottet', 'Julien', 'contact@monsite.com'),
(2, 'LaMarie', 'planete', 'Thoyer', 'Marie', 'marie.thoyer@gmail.com'),
(3, 'Laurence75', 'mars1980', 'Winter', 'Laurence', 'laurence75@hotmail.fr');