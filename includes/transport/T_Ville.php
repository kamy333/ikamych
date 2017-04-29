<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/26/2017
 * Time: 2:57 AM
 */
class T_Ville extends DatabaseObjectAccess
{
    protected static $table_name = "T_Ville";
    protected static $db_fields = ['id', 'Ville',
        'Ville_ID',
    ];
    protected static $db_fields_table_display_short = ['id', 'Ville',
        'Ville_ID',
    ];
    protected static $db_fields_table_display_full = ['id', 'Ville',
        'Ville_ID',
    ];


    public $id;
    public $Ville;
    public $Ville_ID;

}