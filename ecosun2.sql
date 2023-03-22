/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  17/03/2023 09:43:11                      */
/*==============================================================*/


drop table if exists BESOIN_PUISSANCE;

drop table if exists CALCUL_PUISSANCE;

drop table if exists CAPTEUR;

drop table if exists CLIENT;

drop table if exists GAMME_MOBIL_WATT;

drop table if exists HEURES_FONCTIONNEMENT;

drop table if exists TYPE_APPAREIL;

drop table if exists TYPE_CAPTEUR;

drop table if exists TYPE_CLIENT;

/*==============================================================*/
/* Table : BESOIN_PUISSANCE                                     */
/*==============================================================*/
create table BESOIN_PUISSANCE
(
   ID_BESOIN            int not null,
   PUISSANCE            int,
   primary key (ID_BESOIN)
);

/*==============================================================*/
/* Table : CALCUL_PUISSANCE                                     */
/*==============================================================*/
create table CALCUL_PUISSANCE
(
   ID_TYPEAPPAREIL      int not null,
   ID_BESOIN            int not null,
   ID_HEURE_FONCTION    int not null,
   NOMBRE_APPAREIL      int,
   NOMBRE_HEURES        int,
   primary key (ID_TYPEAPPAREIL, ID_BESOIN, ID_HEURE_FONCTION)
);

/*==============================================================*/
/* Table : CAPTEUR                                              */
/*==============================================================*/
create table CAPTEUR
(
   ID_CAPTEUR           int not null,
   TYPE_CAPTEUR         char(255) not null,
   ID_SOLUTION          int not null,
   VALEUR_CAPTEUR       float,
   DATE_CAPTEUR         timestamp,
   primary key (ID_CAPTEUR)
);

/*==============================================================*/
/* Table : CLIENT                                               */
/*==============================================================*/
create table CLIENT
(
   ID_CLIENT            int not null,
   ID_SOLUTION          int,
   ID_BESOIN            int not null,
   TYPE_CLIENT          char(255) not null,
   NOM_REP_CLIENT       varchar(255),
   PRENOM_REP           varchar(255),
   PAYS_REP_CLIENT      char(50),
   VILLE_CLIENT         varchar(50),
   EMAIL_REP_CLIEN      varchar(255),
   PASSWORD             varchar(255),
   primary key (ID_CLIENT)
);

/*==============================================================*/
/* Table : GAMME_MOBIL_WATT                                     */
/*==============================================================*/
create table GAMME_MOBIL_WATT
(
   ID_SOLUTION          int not null,
   MODELE               varchar(255),
   ORIENTATION          varchar(30),
   MODULE               varchar(255),
   PUISSANCE_MAX        float,
   primary key (ID_SOLUTION)
);

/*==============================================================*/
/* Table : HEURES_FONCTIONNEMENT                                */
/*==============================================================*/
create table HEURES_FONCTIONNEMENT
(
   ID_HEURE_FONCTION    int not null,
   LIBELLE_HEURE_FONCTION varchar(30),
   primary key (ID_HEURE_FONCTION)
);

/*==============================================================*/
/* Table : TYPE_APPAREIL                                        */
/*==============================================================*/
create table TYPE_APPAREIL
(
   ID_TYPEAPPAREIL      int not null,
   LIBELLE_TYPE_APPAREIL varchar(225),
   primary key (ID_TYPEAPPAREIL)
);

/*==============================================================*/
/* Table : TYPE_CAPTEUR                                         */
/*==============================================================*/
create table TYPE_CAPTEUR
(
   TYPE_CAPTEUR         char(255) not null,
   LIBELLE_CAPTEUR      varchar(100),
   primary key (TYPE_CAPTEUR)
);

/*==============================================================*/
/* Table : TYPE_CLIENT                                          */
/*==============================================================*/
create table TYPE_CLIENT
(
   TYPE_CLIENT          char(255) not null,
   LIBELLE_TYPE_CLIENT  char(255),
   primary key (TYPE_CLIENT)
);

alter table CALCUL_PUISSANCE add constraint FK_CALCUL_PUISSANCE foreign key (ID_TYPEAPPAREIL)
      references TYPE_APPAREIL (ID_TYPEAPPAREIL) on delete restrict on update restrict;

alter table CALCUL_PUISSANCE add constraint FK_CALCUL_PUISSANCE2 foreign key (ID_BESOIN)
      references BESOIN_PUISSANCE (ID_BESOIN) on delete restrict on update restrict;

alter table CALCUL_PUISSANCE add constraint FK_CALCUL_PUISSANCE3 foreign key (ID_HEURE_FONCTION)
      references HEURES_FONCTIONNEMENT (ID_HEURE_FONCTION) on delete restrict on update restrict;

alter table CAPTEUR add constraint FK_POSSEDE foreign key (TYPE_CAPTEUR)
      references TYPE_CAPTEUR (TYPE_CAPTEUR) on delete restrict on update restrict;

alter table CAPTEUR add constraint FK_RECUPERE foreign key (ID_SOLUTION)
      references GAMME_MOBIL_WATT (ID_SOLUTION) on delete restrict on update restrict;

alter table CLIENT add constraint FK_ACHETE foreign key (ID_SOLUTION)
      references GAMME_MOBIL_WATT (ID_SOLUTION) on delete restrict on update restrict;

alter table CLIENT add constraint FK_ASSOCIATION_5 foreign key (ID_BESOIN)
      references BESOIN_PUISSANCE (ID_BESOIN) on delete restrict on update restrict;

alter table CLIENT add constraint FK_DOIT_AVOIR foreign key (TYPE_CLIENT)
      references TYPE_CLIENT (TYPE_CLIENT) on delete restrict on update restrict;

