CREATE TABLE etudiant (
id_etu	SERIAL NOT NULL,
nom	VARCHAR(100) NOT NULL,
prenom	VARCHAR(100) NOT NULL,
mail	VARCHAR(100) NOT NULL,
mdp	VARCHAR(100) NOT NULL,
CONSTRAINT pk_etu PRIMARY KEY(id_etu)
);

CREATE TABLE categorie (
nom_cat	VARCHAR(100) NOT NULL,
CONSTRAINT pk_cat PRIMARY KEY(nom_cat)
);

CREATE TABLE bani (
id_etu	SERIAL NOT NULL,
id_ban	INTEGER NOT NULL,
CONSTRAINT pk_bani PRIMARY KEY(id_etu, id_ban),
CONSTRAINT fk_bani1 FOREIGN KEY (id_etu) REFERENCES etudiant(id_etu),
CONSTRAINT fk_bani2 FOREIGN KEY (id_ban) REFERENCES etudiant(id_etu)
);

CREATE TABLE administrateur (
id_adm	SERIAL NOT NULL,
CONSTRAINT pk_adm PRIMARY KEY (id_adm),
CONSTRAINT fk_adm FOREIGN KEY (id_adm) references etudiant(id_etu)
);

CREATE TABLE annonce (
id_ann	SERIAL NOT NULL,
descri	VARCHAR(250) NOT NULL,
nom_cat	VARCHAR(100) NOT NULL,
id_pro	INTEGER NOT NULL,
Date_d	TIMESTAMP WITHOUT TIME ZONE,
Date_f	TIMESTAMP WITHOUT TIME ZONE,
Date_c	TIMESTAMP WITHOUT TIME ZONE,
nb_max	INTEGER NOT NULL,
rep	BOOLEAN NOT NULL,
bn_rep	INTEGER NOT NULL,
freq	INTEGER NOT NULL,
adress	VARCHAR(100),
clos	BOOLEAN NOT NULL,
CONSTRAINT pk_ann PRIMARY KEY(id_ann),
CONSTRAINT fk_ann1 FOREIGN KEY (nom_cat) references categorie(nom_cat),
CONSTRAINT fk_ann2 FOREIGN KEY (id_pro) references etudiant(id_etu)
);

CREATE TABLE archive (
id_arch	SERIAL NOT NULL,
descri	VARCHAR(250) NOT NULL,
nom_cat	VARCHAR(100) NOT NULL,
id_pro	INTEGER NOT NULL,
Date_d	TIMESTAMP WITHOUT TIME ZONE,
Date_f	TIMESTAMP WITHOUT TIME ZONE,
Date_c	TIMESTAMP WITHOUT TIME ZONE,
nb_max	INTEGER NOT NULL,
adress	VARCHAR(100),
CONSTRAINT pk_arch PRIMARY KEY(id_arch),
CONSTRAINT fk_arch1 FOREIGN KEY (nom_cat) references categorie(nom_cat),
CONSTRAINT fk_arch2 FOREIGN KEY (id_pro) references etudiant(id_etu)
);