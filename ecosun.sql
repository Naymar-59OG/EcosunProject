/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  02/03/2023 12:31:40                      */
/*==============================================================*/


drop table if exists CAPTEURS;

drop table if exists FORMULAIRE;

drop table if exists PROPOSITION;

drop table if exists SOLUTIONS;

drop table if exists UTILISATEURS;

/*==============================================================*/
/* Table : CAPTEURS                                             */
/*==============================================================*/
create table CAPTEURS
(
   ID_CAPTEUR           int not null,
   ID_UTILISATEUR       int,
   TAUX_TEMPERATURE     int,
   TAUX_HUMIDITE        int,
   TAUX_POIDS           int,
   primary key (ID_CAPTEUR)
);

/*==============================================================*/
/* Table : FORMULAIRE                                           */
/*==============================================================*/
create table FORMULAIRE
(
   ID_FORMULAIRE        int not null,
   ID_UTILISATEUR       int not null,
   ID_SOLUTION          int not null,
   DETAILS              longtext,
   NOMBRE               decimal(30),
   PUISSANCE_TOTAL      decimal(30),
   HORAIRES_FONCTIONNEMENT_ datetime,
   primary key (ID_FORMULAIRE)
);

/*==============================================================*/
/* Table : PROPOSITION                                          */
/*==============================================================*/
create table PROPOSITION
(
   ID_SOLUTION          int not null,
   ID_UTILISATEUR       int not null,
   primary key (ID_SOLUTION, ID_UTILISATEUR)
);

/*==============================================================*/
/* Table : SOLUTIONS                                            */
/*==============================================================*/
create table SOLUTIONS
(
   ID_SOLUTION          int not null,
   MODELE               int,
   ORIENTATION          varchar(30),
   PUISSANCE_MODULE     int,
   PUISSANCE            int,
   RESULTAT_CALCUL      dec,
   primary key (ID_SOLUTION)
);

/*==============================================================*/
/* Table : UTILISATEURS                                         */
/*==============================================================*/
create table UTILISATEURS
(
   ID_UTILISATEUR       int not null,
   NOM                  varchar(20),
   PRENOM               varchar(30),
   ADRESSE              varchar(30),
   NUM_UTILISATEUR      varchar(20),
   VILLLE_              decimal(30),
   CODE_POSTALE         decimal(20),
   GENRE                varchar(20),
   EMAIL                varchar(30),
   MOT_DE_PASSE         varchar(30),
   ADMINISTRATEUR       varchar(30),
   CLIENT               char(30),
   primary key (ID_UTILISATEUR)
);

alter table CAPTEURS add constraint FK_DONNEES foreign key (ID_UTILISATEUR)
      references UTILISATEURS (ID_UTILISATEUR) on delete restrict on update restrict;

alter table FORMULAIRE add constraint FK_ASSOCIATION_5 foreign key (ID_UTILISATEUR)
      references UTILISATEURS (ID_UTILISATEUR) on delete restrict on update restrict;

alter table FORMULAIRE add constraint FK_ASSOCIATION_6 foreign key (ID_SOLUTION)
      references SOLUTIONS (ID_SOLUTION) on delete restrict on update restrict;

alter table PROPOSITION add constraint FK_PROPOSITION foreign key (ID_SOLUTION)
      references SOLUTIONS (ID_SOLUTION) on delete restrict on update restrict;

alter table PROPOSITION add constraint FK_PROPOSITION2 foreign key (ID_UTILISATEUR)
      references UTILISATEURS (ID_UTILISATEUR) on delete restrict on update restrict;

