<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/26/2017
 * Time: 2:42 AM
 */
class T_Adresse extends DatabaseObjectAccess
{

    protected static $table_name = "T_Adresse";

    protected static $db_fields = ['id', 'Annee',
        'De_A',
    ];

    public $id;

    public $Annee;
    public $De_A;


}