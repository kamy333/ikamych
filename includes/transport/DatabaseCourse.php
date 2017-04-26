<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/23/2017
 * Time: 4:59 AM
 */
class DatabaseCourse extends DatabaseObjectAccess
{

    protected static $table_name = "DatabaseCourse";


    protected static $db_fields = [
        'id',
        'CourseID', 'StautCourse', 'Pseudo', 'Date',
        'Aller_Retour', 'Heure', 'Depart', 'Arrivee',
        'Prix_Course', 'Type_Transport', 'Chauffeur', 'Bon_No',
        'Nom_Patient', 'Autres_prestations', 'Remarque', 'Facture_ID',
        'Facture_ID_Client', 'Facture_Ref', 'Fact_ouverte', 'Date_Saisie',
        'EntryBy', 'Annee', 'Mois', 'Jour', 'Semaine',
        'Mois_Nom', 'Année_Mois', 'Pseudo_Annee_Mois', 'Année_Mois_Nom',
        'Pseudo_Mois_Annee_Nom', 'Chauffeur_Annee_Mois', 'Chauffeur_Mois_Annee_Nom',
        'Username', 'Trimestre', 'Jour_ddd', 'jour_dddd', 'JourNo_w', 'SemaineAnnee_ww', 'NojourdeAnnee',

    ];


    public $id;
    public $CourseID;
    public $StautCourse;
    public $Pseudo;
    public $Date;
    public $Aller_Retour;
    public $Heure;
    public $Depart;
    public $Arrivee;
    public $Prix_Course;
    public $Type_Transport;
    public $Chauffeur;
    public $Bon_No;
    public $Nom_Patient;
    public $Autres_prestations;
    public $Remarque;
    public $Facture_ID;
    public $Facture_ID_Client;
    public $Facture_Ref;
    public $Fact_ouverte;
    public $Date_Saisie;
    public $EntryBy;
    public $Annee;
    public $Mois;
    public $Jour;
    public $Semaine;
    public $Mois_Nom;
    public $Année_Mois;
    public $Pseudo_Annee_Mois;
    public $Année_Mois_Nom;
    public $Pseudo_Mois_Annee_Nom;
    public $Chauffeur_Annee_Mois;
    public $Chauffeur_Mois_Annee_Nom;
    public $Username;
    public $Trimestre;
    public $Jour_ddd;
    public $jour_dddd;
    public $JourNo_w;
    public $SemaineAnnee_ww;
    public $NojourdeAnnee;


}