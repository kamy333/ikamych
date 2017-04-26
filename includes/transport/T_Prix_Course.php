<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/26/2017
 * Time: 2:56 AM
 */
class T_Prix_Course extends DatabaseObjectAccess
{
    protected static $table_name = "T_Prix_Course";

    protected static $db_fields = ['id', 'Prix_Course', 'Prix_Course_ID',];

    public $id;
    public $Prix_Course;
    public $Prix_Course_ID;

}