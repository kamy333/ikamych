<?php

/**
 * Created by PhpStorm.
 * User: Kamran
 * Date: 24.11.2015
 * Time: 00:47
 */

//protected static $db_fields = array('','','','','','','','','','');

class MyLoan extends MyExpense
{

    protected static $table_name = "myloan";

    public static $page_name = "Loan";

    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=MyLoan"; // "new_link.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=MyLoan"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=MyLoan"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=MyLoan"; //  "delete_link.php";
    public static $position_table = "positionBoth"; // positionLeft // positionBoth  positionRight

//    public static $form_class_dependency = array('MyLoanPerson', 'MyLoanType');


}

class MyLoanPerson extends MyExpensePerson
{

    protected static $table_name = "myloan_person";

    public static $page_name = "Loan Person";

    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=MyLoanPerson"; // "new_link.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=MyLoanPerson"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=MyLoanPerson"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=MyLoanPerson"; //  "delete_link.php";
    public static $position_table = "positionLeft"; // positionLeft // positionBoth  positionRight


}

class MyLoanType extends MyExpenseType
{

    protected static $table_name = "myloan_type";

    public static $page_name = "Loan Type";

    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=MyLoanType"; // "new_link.php";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=MyLoanType"; // "new_link.php";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=MyLoanType"; //  "edit_link.php";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=MyLoanType"; //  "delete_link.php";
    public static $position_table = "positionLeft"; // positionLeft // positionBoth  positionRight

}