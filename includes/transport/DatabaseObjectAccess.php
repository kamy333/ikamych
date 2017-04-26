<?php

/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 4/25/2017
 * Time: 8:49 PM
 */
class DatabaseObjectAccess extends DatabaseObject
{

    public static $class_access = ['DatabaseClient', 'DatabaseCourse', 'DatabaseCourse_Programe',
        'DatabaseFacturation', 'DatabasePaiement', 'T_Adresse', 'T_Aller_Retour', 'T_Chauffeur',
        'T_Frequence_Facturation', 'T_Genre', 'T_heure', 'T_Pays', 'T_Prix_Course', 'T_Transport',
        'T_Type_Facturation'
    ];


    public static $class_transmed = ['TransportChauffeur.php', 'TransportClient.php', 'TransportType.php', 'TransportProgramming.php', 'TransportProgrammingModel.php', 'ViewTransportModel.php', 'ViewTransportModel.php', 'ViewTransportModelVisibleNo.php', 'ViewTransportModelVisibleYes.php', 'ViewTransportModelPivot.php', 'ViewTransportModelPivotNo.php', 'ViewTransportModelPivotYes.php', 'ViewTransportSummaryCourseDateProgram.php', 'ViewTransportModelByChauffeur.php'
    ];


    public static function require_file()
    {

        foreach (self::$class_access as $file) {
            require_once(LIB_PATH . DS . 'transport' . DS . "$file.php");
        }

        foreach (self::$class_transmed as $file) {
            require_once(LIB_PATH . DS . 'transport' . DS . "$file.php");
        }


    }


}