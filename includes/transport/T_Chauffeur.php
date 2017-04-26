<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/26/2017
 * Time: 2:51 AM
 */
class T_Chauffeur extends DatabaseObjectAccess
{
    protected static $table_name = "T_Chauffeur";

    protected static $db_fields = ['id',
        'Chauffeur_ID',
        'Chauffeur',
        'Company',

    ];

    public $id;
    public $Chauffeur_ID;
    public $Chauffeur;
    public $Company;


}