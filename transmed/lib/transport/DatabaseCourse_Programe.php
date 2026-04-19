<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/25/2017
 * Time: 8:42 PM
 */
class DatabaseCourse_Programe extends DatabaseObjectAccess
{
    protected static $table_name = "DatabaseCourse_Programe";

    protected static $db_fields = [
        'id',
        'CourseID',
        'StatutCourse',
        'Pseudo',
        'Date',
        'Heure',
        'Heure_Arrive',
        'Depart',
        'Arrivee',
        'Prix_Course',
        'Type_Transport',
        'Chauffeur',
        'Bon_No',
        'Nom_patient',
        'Autres_prestations',
        'Remarque',
        'Date_Saisie',
        'EntryBy',
        'FacturationYesNo',
        'Type_Facturation',
        'ListeBon_YesNo',
        'ListePatient_YesNo',
        'AdresseEnvoie_YesNo',
        'AdresseEnvoie_1',
        'AdresseEnvoie_2',
        'AdresseEnvoie_3',
        'AdresseEnvoie_4',
        'AdresseConcerne_5',
        'AdresseConcerne_6',
        'Mobile',
        'Fax',
        'Email',
        'Bon',
        'No_AVS',
        'No_AI',
        'OCPA',
        'Police_Assurance',
        'Nom_Assureur',
        'Payeur_Assurance',
        'Transport',
        'Note_Client',
        'ParcoursDe',
        'ParcoursA',
        'Habituel_Chauffeur',
        'Habituel_HeureDepart',
        'Habituel_HeureRetour',
        'Habituel_AllerRetour',
        'Habituel_PrixCourse',
        'Habituel_TypeTransport',
        'Habituel_Bon',
        'Dernier_De',
        'Dernier_A',
        'Commentaires',

    ];

    protected static $db_fields_table_display_short = [
        'id',
        'CourseID',
        'StatutCourse',
        'Pseudo',
        'Date',
        'Heure',
        'Heure_Arrive',
        'Depart',
        'Arrivee',
        'Prix_Course',
        'Type_Transport',
        'Chauffeur',
        'Bon_No',
        'Nom_patient',
        'Autres_prestations',
        'Remarque',
        'Date_Saisie',
        'EntryBy',
        'FacturationYesNo',
        'Type_Facturation',
        'ListeBon_YesNo',
        'ListePatient_YesNo',
        'AdresseEnvoie_YesNo',
        'AdresseEnvoie_1',
        'AdresseEnvoie_2',
        'AdresseEnvoie_3',
        'AdresseEnvoie_4',
        'AdresseConcerne_5',
        'AdresseConcerne_6',
        'Mobile',
        'Fax',
        'Email',
        'Bon',
        'No_AVS',
        'No_AI',
        'OCPA',
        'Police_Assurance',
        'Nom_Assureur',
        'Payeur_Assurance',
        'Transport',
        'Note_Client',
        'ParcoursDe',
        'ParcoursA',
        'Habituel_Chauffeur',
        'Habituel_HeureDepart',
        'Habituel_HeureRetour',
        'Habituel_AllerRetour',
        'Habituel_PrixCourse',
        'Habituel_TypeTransport',
        'Habituel_Bon',
        'Dernier_De',
        'Dernier_A',
        'Commentaires',

    ];

    protected static $db_fields_table_display_full = [
        'id',
        'CourseID',
        'StatutCourse',
        'Pseudo',
        'Date',
        'Heure',
        'Heure_Arrive',
        'Depart',
        'Arrivee',
        'Prix_Course',
        'Type_Transport',
        'Chauffeur',
        'Bon_No',
        'Nom_patient',
        'Autres_prestations',
        'Remarque',
        'Date_Saisie',
        'EntryBy',
        'FacturationYesNo',
        'Type_Facturation',
        'ListeBon_YesNo',
        'ListePatient_YesNo',
        'AdresseEnvoie_YesNo',
        'AdresseEnvoie_1',
        'AdresseEnvoie_2',
        'AdresseEnvoie_3',
        'AdresseEnvoie_4',
        'AdresseConcerne_5',
        'AdresseConcerne_6',
        'Mobile',
        'Fax',
        'Email',
        'Bon',
        'No_AVS',
        'No_AI',
        'OCPA',
        'Police_Assurance',
        'Nom_Assureur',
        'Payeur_Assurance',
        'Transport',
        'Note_Client',
        'ParcoursDe',
        'ParcoursA',
        'Habituel_Chauffeur',
        'Habituel_HeureDepart',
        'Habituel_HeureRetour',
        'Habituel_AllerRetour',
        'Habituel_PrixCourse',
        'Habituel_TypeTransport',
        'Habituel_Bon',
        'Dernier_De',
        'Dernier_A',
        'Commentaires',

    ];


    public $id;
    public $CourseID;
    public $StatutCourse;
    public $Pseudo;
    public $Date;
    public $Heure;
    public $Heure_Arrive;
    public $Depart;
    public $Arrivee;
    public $Prix_Course;
    public $Type_Transport;
    public $Chauffeur;
    public $Bon_No;
    public $Nom_patient;
    public $Autres_prestations;
    public $Remarque;
    public $Date_Saisie;
    public $EntryBy;
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
    public $Note_Client;
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


}