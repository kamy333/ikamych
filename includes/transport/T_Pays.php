<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/26/2017
 * Time: 2:57 AM
 */
class T_Pays extends DatabaseObjectAccess
{
    protected static $table_name = "T_Pays";

    protected static $db_fields = ['id', 'Pays',
        'Pays_ID',
    ];
    protected static $db_fields_table_display_short = ['id', 'Pays',
        'Pays_ID',
    ];
    protected static $db_fields_table_display_full = ['id', 'Pays',
        'Pays_ID',
    ];

    public $id;
    public $Pays;
    public $Pays_ID;

}