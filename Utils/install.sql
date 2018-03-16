CREATE TABLE IF NOT EXISTS `person`(
        idperson  int (11) Auto_increment  NOT NULL ,
        email     Varchar (40) NOT NULL,
        password  Varchar (200) NOT NULL ,
        firstname Varchar (20) NOT NULL ,
        lastname  Varchar (20) NOT NULL,
        PRIMARY KEY (idperson)
)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `organization` (
  idorganization INT NOT NULL  AUTO_INCREMENT,
  idperson INT(11),
  name VARCHAR(50),
  PRIMARY KEY (idorganization),
  FOREIGN KEY (idperson) REFERENCES person(idperson)
)ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `campaign` (
  idcampaign INT NOT NULL AUTO_INCREMENT,
  idorganization INT,
  name VARCHAR(50),
  startdate DATETIME,
  enddate DATETIME,
  numberoptions INT NOT NULL,
  PRIMARY KEY (idcampaign),
  FOREIGN KEY (idorganization) REFERENCES organization(idorganization)
  
)ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `invitation` (
  idinvitation INT NOT NULL AUTO_INCREMENT,
  idcampaign INT,
  email VARCHAR (255) NOT NULL,
  code VARCHAR (100) NOT NULL,
  hasvoted TINYINT (1) NOT NULL,
  PRIMARY KEY (idinvitation),
  FOREIGN KEY (idcampaign) REFERENCES campaign(idcampaign)
) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `choice` (
  idoption INT NOT NULL AUTO_INCREMENT,
  idcampaign INT,
  name VARCHAR(100),
  PRIMARY KEY (idoption),
  FOREIGN KEY (idcampaign) REFERENCES campaign(idcampaign)
) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `vote` (
  idoption INT,
  voted DATETIME,
  FOREIGN KEY (idoption) REFERENCES choice(idoption)
) ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- on peut rajouter notre alter table à la fin du script