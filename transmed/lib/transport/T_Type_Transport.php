<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/26/2017
 * Time: 2:58 AM
 */
class T_Type_Transport extends DatabaseObjectAccess
{
    protected static $table_name = "T_Type_Transport";

    protected static $db_fields = ['id', 'Type_Transport_ID', 'Type_Transport',];
    protected static $db_fields_table_display_short = ['id', 'Type_Transport_ID', 'Type_Transport',];
    protected static $db_fields_table_display_full = ['id', 'Type_Transport_ID', 'Type_Transport',];

    public $id;
    public $Type_Transport_ID;
    public $Type_Transport;


}