<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/22/2017
 * Time: 5:30 AM
 */
class TransportZone extends DatabaseObject
{
    protected static $table_name = "transport_zone";

    protected static $db_fields = array('id', 'zone', 'zone_exception', 'rank', 'comment', 'input_date', 'modification_time', 'username');


    public $id;
    public $zone;
    public $zone_exception;
    public $rank;
    public $comment;
    public $input_date;
    public $modification_time;
    public $username;

}