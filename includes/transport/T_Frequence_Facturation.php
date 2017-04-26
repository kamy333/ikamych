<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/26/2017
 * Time: 2:53 AM
 */
class T_Frequence_Facturation extends DatabaseObjectAccess
{
    protected static $table_name = "T_Frequence_Facturation";

    protected static $db_fields = ['id',
        'FrequenceID',
        'Frequence_Facturation',
        'Note_Frequence_Facturation',

    ];

    public $id;
    public $FrequenceID;
    public $Frequence_Facturation;
    public $Note_Frequence_Facturation;

}