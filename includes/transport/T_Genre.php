<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/26/2017
 * Time: 2:54 AM
 */
class T_Genre extends DatabaseObjectAccess
{
    protected static $table_name = "T_Genre";

    protected static $db_fields = ['id', 'Genre_ID', 'Genre', 'Genre1',
        'Genre2',
    ];

    public $id;
    public $Genre_ID;
    public $Genre;
    public $Genre1;
    public $Genre2;


}