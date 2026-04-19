<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/23/2017
 * Time: 4:59 AM
 */
class DataBaseClient extends DatabaseObjectAccess
{

    protected static $table_name = "DataBaseClient";




    protected static $db_fields = [
        'id',
        'Client_ID', 'Pseudo', 'Pseudo_Consolide', 'Genre', 'Nom',
        'Prenom', 'Adresse', 'Residence', 'Service', 'Tel_Privee', 'CCP',
        'Ville', 'Pays', 'Date_Entree', 'Date_Mise_A_Jour', 'Frequence_Facturation',
        'Client_CloturerYesNo', 'FacturationYesNo', 'Type_Facturation', 'ListeBon_YesNo',
        'ListePatient_YesNo', 'AdresseEnvoie_YesNo', 'AdresseEnvoie_1', 'AdresseEnvoie_2',
        'AdresseEnvoie_3', 'AdresseEnvoie_4', 'AdresseConcerne_5', 'AdresseConcerne_6',
        'Mobile', 'Fax', 'Email', 'Bon', 'No_AVS', 'No_AI',
        'OCPA', 'Police_Assurance', 'Nom_Assureur', 'Payeur_Assurance', 'Transport', 'Date_de_Naissance',
        'ParcoursDe', 'ParcoursA', 'Habituel_Chauffeur', 'Habituel_HeureDepart', 'Habituel_HeureRetour',
        'Habituel_AllerRetour', 'Habituel_PrixCourse', 'Habituel_TypeTransport', 'Habituel_Bon',
        'Dernier_De', 'Dernier_A', 'Commentaires', 'EntryBy',

    ];

    protected static $db_fields_table_display_short = [
        'id',
        'Client_ID', 'Pseudo', 'Pseudo_Consolide', 'Genre', 'Nom',
        'Prenom', 'Adresse', 'Residence', 'Service', 'Tel_Privee', 'CCP',
        'Ville', 'Pays', 'Date_Entree', 'Date_Mise_A_Jour', 'Frequence_Facturation',
        'Client_CloturerYesNo', 'FacturationYesNo', 'Type_Facturation', 'ListeBon_YesNo',
        'ListePatient_YesNo', 'AdresseEnvoie_YesNo', 'AdresseEnvoie_1', 'AdresseEnvoie_2',
        'AdresseEnvoie_3', 'AdresseEnvoie_4', 'AdresseConcerne_5', 'AdresseConcerne_6',
        'Mobile', 'Fax', 'Email', 'Bon', 'No_AVS', 'No_AI',
        'OCPA', 'Police_Assurance', 'Nom_Assureur', 'Payeur_Assurance', 'Transport', 'Date_de_Naissance',
        'ParcoursDe', 'ParcoursA', 'Habituel_Chauffeur', 'Habituel_HeureDepart', 'Habituel_HeureRetour',
        'Habituel_AllerRetour', 'Habituel_PrixCourse', 'Habituel_TypeTransport', 'Habituel_Bon',
        'Dernier_De', 'Dernier_A', 'Commentaires', 'EntryBy',

    ];

    protected static $db_fields_table_display_full = [
        'id',
        'Client_ID', 'Pseudo', 'Pseudo_Consolide', 'Genre', 'Nom',
        'Prenom', 'Adresse', 'Residence', 'Service', 'Tel_Privee', 'CCP',
        'Ville', 'Pays', 'Date_Entree', 'Date_Mise_A_Jour', 'Frequence_Facturation',
        'Client_CloturerYesNo', 'FacturationYesNo', 'Type_Facturation', 'ListeBon_YesNo',
        'ListePatient_YesNo', 'AdresseEnvoie_YesNo', 'AdresseEnvoie_1', 'AdresseEnvoie_2',
        'AdresseEnvoie_3', 'AdresseEnvoie_4', 'AdresseConcerne_5', 'AdresseConcerne_6',
        'Mobile', 'Fax', 'Email', 'Bon', 'No_AVS', 'No_AI',
        'OCPA', 'Police_Assurance', 'Nom_Assureur', 'Payeur_Assurance', 'Transport', 'Date_de_Naissance',
        'ParcoursDe', 'ParcoursA', 'Habituel_Chauffeur', 'Habituel_HeureDepart', 'Habituel_HeureRetour',
        'Habituel_AllerRetour', 'Habituel_PrixCourse', 'Habituel_TypeTransport', 'Habituel_Bon',
        'Dernier_De', 'Dernier_A', 'Commentaires', 'EntryBy',

    ];


    public static $page_name = "Client Access";

    public static $per_page = 20;


    public $id;

    public $Client_ID;
    public $Pseudo;
    public $Pseudo_Consolide;
    public $Genre;
    public $Nom;
    public $Prenom;
    public $Adresse;
    public $Residence;
    public $Service;
    public $Tel_Privee;
    public $CCP;
    public $Ville;
    public $Pays;
    public $Date_Entree;
    public $Date_Mise_A_Jour;
    public $Frequence_Facturation;
    public $Client_CloturerYesNo;
    public $FacturationYesNo;
    public $Type_Facturation;
    public $ListeBon_YesNo;
    public $ListePatient_YesNo;
    public $AdresseEnvoie_YesNo;
    public $AdresseEnvoie_1;
    public $AdresseEnvoie_2;
    public $AdresseEnvoie_3;
    public $AdresseEnvoie_4;
    public $AdresseConcerne_5;
    public $AdresseConcerne_6;
    public $Mobile;
    public $Fax;
    public $Email;
    public $Bon;
    public $No_AVS;
    public $No_AI;
    public $OCPA;
    public $Police_Assurance;
    public $Nom_Assureur;
    public $Payeur_Assurance;
    public $Transport;
    public $Date_de_Naissance;
    public $ParcoursDe;
    public $ParcoursA;
    public $Habituel_Chauffeur;
    public $Habituel_HeureDepart;
    public $Habituel_HeureRetour;
    public $Habituel_AllerRetour;
    public $Habituel_PrixCourse;
    public $Habituel_TypeTransport;
    public $Habituel_Bon;
    public $Dernier_De;
    public $Dernier_A;
    public $Commentaires;
    public $EntryBy;


}