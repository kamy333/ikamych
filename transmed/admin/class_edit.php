<?php require_once('../../includes/initialize.php');
$session->confirmation_protected_page();
if(User::is_employee() || User::is_secretary()){ redirect_to('index.php');}
if(User::is_visitor() ){ redirect_to('../index.php');}

?>

<?php if(isset($_GET["class_name"])){$class_name= urldecode($_GET["class_name"]) ;} else {$class_name="User";}  ?>

<?php
if(isset($_GET['id'])){
$post_link=$_SERVER["PHP_SELF"]."?id=".urldecode($_GET['id']);
$page="Update";
$page1="Update ";
$text_post="Updated";
$text_post1="update";

}else{
$post_link=$_SERVER["PHP_SELF"];
$page="New";
$page1="Add New ";
$text_post="created";
$text_post1="creation";

}


if(request_is_post() && request_is_same_domain()) {

    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
    } else {

        $new_item=new $class_name() ;
        $expected_fields=$class_name::get_table_field();
        foreach($expected_fields as $field){
            if(isset($_POST[$field])){
                $new_item->$field=trim($_POST{$field}) ;
            }

        }

        //todo complete valid like pseudo

        $valid=  $new_item->form_validation();

        if(empty($valid->errors)) {
            if ($new_item->save()){
//                $session->message($class_name.$new_item->pseudo." "."has been $text_post with ID (".$new_item->id .")");
                $session->message($class_name.$new_item->id." "."has been $text_post with ID (".$new_item->id .")");

                $session->ok(true);
                redirect_to($class_name::$page_manage);
            } else {
                $session->message($class_name.$new_item->id." "."$text_post1 failed");

            }



        }


    }
} else {
    if(request_is_get()){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $get_item=  $class_name::find_by_id($id);
        }



    }

}






?>

<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript="forms"; ?>
<?php $incl_message_error=true; ?>

<?php include(HEADER) ?>
<?php include(SIDEBAR) ?>
<?php include(NAV) ?>

<?php  echo isset($valid)? $valid->form_errors():"" ?>
<?php  echo isset($valid)? $valid->form_warnings():"" ?>
<?php echo isset($message)? output_message($message):""; ?>
<?php checking(false);?>

<!--<div class="col-md-4">-->
<!--    <p>-->
<!--        A placeholder value can be defined and will be displayed until a selection is made.-->
<!--    </p>-->
<!--    <select class="select2_demo_3 form-control">-->
<!--        <option></option>-->
<!--        <option value="Bahamas">Bahamas</option>-->
<!--        <option value="Bahrain">Bahrain</option>-->
<!--        <option value="Bangladesh">Bangladesh</option>-->
<!--        <option value="Barbados">Barbados</option>-->
<!--        <option value="Belarus">Belarus</option>-->
<!--        <option value="Belgium">Belgium</option>-->
<!--        <option value="Belize">Belize</option>-->
<!--        <option value="Benin">Benin</option>-->
<!--    </select>-->
<!---->
<!--</div>-->

<!--<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Chosen select <small>http://harvesthq.github.io/chosen/</small></h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#">Config option 1</a>
                </li>
                <li><a href="#">Config option 2</a>
                </li>
            </ul>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <p>
            With chosen select uesr can fase chose from large in select input.
        </p>
        <div class="form-group">
            <label class="font-noraml">Basic example</label>
            <div class="input-group">
                <select data-placeholder="Choose a Country..." class="chosen-select" style="width:350px;" tabindex="2">
                    <option value="">Select</option>
                    <option value="United States">United States</option>

                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>

                      </select>
            </div>
        </div>
        <div class="form-group">
            <label class="font-noraml">Multi select</label>
            <div class="input-group">
                <select data-placeholder="Choose a Country..." class="chosen-select" multiple style="width:350px;" tabindex="4">
                    <option value="">Select</option>
                    <option value="United States">United States</option>
                    <option value="United Kingdom">United Kingdom</option>
                       <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>

                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                    <option value="Saint Lucia">Saint Lucia</option>
                    <option value="Saint Martin (French part)">Saint Martin (French part)</option>
                      <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                    <option value="South Sudan">South Sudan</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                 <option value="Zimbabwe">Zimbabwe</option>
                </select>
            </div>
        </div>

    </div>
</div>-->


<div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center m-t-lg">
                        <h1>Form Edit for <?php echo $class_name; ?></h1>
                                                <small></small>
                        <div class="col-md-7 col-md-offset-2 col-lg-7 col-lg-offset-2">
                            <a href="index.php">Index</a> &nbsp;&nbsp;
                            <a href="<?php echo $class_name::$page_manage ?>" >Manage <?php echo $class_name ?></a>

                            <div class ="background_light_blue">


                                <form name="form_client"  class="form-horizontal" method="post" action="<?php echo $post_link;?>">

<!--                                    <fieldset id="login" title="Client">-->
<!--                                        <legend class="text-center" style="color: #0000ff">--><?php //echo $page1 . $class_name::$page_name ?><!--</legend>-->


                                        <?php



                                        echo  Table::ibox_table($class_name::construct_form($get_item),'Edit '.$class_name,12) ;
                                        echo Form::form_id();
                                        echo csrf_token_tag();?>



<!--                                    </fieldset>-->



                                    <div class="col-sm-offset-3 col-sm-7 col-xs-3">
                                        <button type="submit" name="submit" class="btn btn-primary"><?php echo $page ." ".$class_name; ?></button>
                                    </div>

                                    <div class="text-right " >
                                        <a href="<?php echo $class_name::$page_manage; ?>" class="btn btn-info " role="button">Cancel</a>
                                    </div>



                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



</div>





<?php include(FOOTER) ?>

