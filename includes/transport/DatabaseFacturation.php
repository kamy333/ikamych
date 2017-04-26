<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/25/2017
 * Time: 8:44 PM
 */
class DatabaseFacturation extends DatabaseObjectAccess
{
    protected static $table_name = "DatabaseFacturation";
    protected static $db_fields = ['id',
        'Facture_ID',
        'Facture_ID_Client',
        'Date_Saisie',
        'Pseudo',
        'Ref_Facture',
        'Montant',
        'Statut',
        'Date_Fact_Envoi',
        'Fact_Date_Paiement',
        'Date_Rappel',
        'No_BVR',
        'Course_Periode_Du',
        'Course_Periode_Au',
        'Remarque_Fact',
        'Ref_Fact_MsftWord',
        'NombreCourse',
        'Pseudo_Consolide',
        'Alerte',
        'Num_Facture',
        'Num_Facture_Pseudo',
        'Champ1',
        'Champ2',
        'Champ3',

    ];

    public $id;

    public $Facture_ID;
    public $Facture_ID_Client;
    public $Date_Saisie;
    public $Pseudo;
    public $Ref_Facture;
    public $Montant;
    public $Statut;
    public $Date_Fact_Envoi;
    public $Fact_Date_Paiement;
    public $Date_Rappel;
    public $No_BVR;
    public $Course_Periode_Du;
    public $Course_Periode_Au;
    public $Remarque_Fact;
    public $Ref_Fact_MsftWord;
    public $NombreCourse;
    public $Pseudo_Consolide;
    public $Alerte;
    public $Num_Facture;
    public $Num_Facture_Pseudo;
    public $Champ1;
    public $Champ2;
    public $Champ3;

}