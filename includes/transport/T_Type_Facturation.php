<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/26/2017
 * Time: 2:58 AM
 */
class T_Type_Facturation
{
    protected static $table_name = "";

    protected static $db_fields = ['id', 'TypeFacturationID',
        'Type_Facturation',
        'TypeFactureNom',
        'ReportNameFacturation',
        'Note_Type_Facturation',
    ];
    public $id;
    public $TypeFacturationID;
    public $Type_Facturation;
    public $TypeFactureNom;
    public $ReportNameFacturation;
    public $Note_Type_Facturation;

}