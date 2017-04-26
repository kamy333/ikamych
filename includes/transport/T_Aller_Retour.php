<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/26/2017
 * Time: 2:48 AM
 */
class T_Aller_Retour extends DatabaseObjectAccess
{
    protected static $table_name = "T_Aller_Retour";

    protected static $db_fields = ['id', 'Aller_Retour',
        'Aller_Retour_ID',

    ];

    public $id;

    public $Annee;
    public $De_A;

}