<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/25/2017
 * Time: 8:43 PM
 */
class DatabasePaiement extends DatabaseObjectAccess
{
    protected static $table_name = "DatabasePaiement";
    protected static $db_fields = ['id', 'ID_p',
        'Num_Facture',
        'Pseudo',
        'Paiement',
        'Date_Paiement',
        'Type_Paiement',
        'Lien_Pdf',
        'Date_Saisie',
        'Entry_By',
    ];
    protected static $db_fields_table_display_short = ['id', 'ID_p',
        'Num_Facture',
        'Pseudo',
        'Paiement',
        'Date_Paiement',
        'Type_Paiement',
        'Lien_Pdf',
        'Date_Saisie',
        'Entry_By',
    ];
    protected static $db_fields_table_display_full = ['id', 'ID_p',
        'Num_Facture',
        'Pseudo',
        'Paiement',
        'Date_Paiement',
        'Type_Paiement',
        'Lien_Pdf',
        'Date_Saisie',
        'Entry_By',
    ];


    public $id;
    public $ID_p;
    public $Num_Facture;
    public $Pseudo;
    public $Paiement;
    public $Date_Paiement;
    public $Type_Paiement;
    public $Lien_Pdf;
    public $Date_Saisie;
    public $Entry_By;


}