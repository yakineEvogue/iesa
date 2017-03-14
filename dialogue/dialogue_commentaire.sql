CREATE TABLE commentaire (
  id_commentaire int(3) NOT NULL auto_increment,
  pseudo varchar(20) NOT NULL,
  message text NOT NULL,
  date_enregistrement datetime NOT NULL,
  PRIMARY KEY  (id_commentaire)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

