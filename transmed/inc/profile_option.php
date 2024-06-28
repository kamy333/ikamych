<?php
/**
 * Created by PhpStorm.
 * User: kamy3
 * Date: 10/6/2018
 * Time: 2:41 AM
 */

$session->confirmation_protected_page(); ?>
<div class="row">
    <div class="col-lg-12  white-bg">
        <div class="text-center m-t-lg">


            <h4>Select options page <strong>

                    <?php if (isset($user)) {
                        echo $user->full_name();
                    } ?></strong></h4>

        </div>
    </div>
</div>


<?php

function checkbox_switchery($id = "idSwitch1", $name = "chk1", $label = "option", $check = true)
{

    if ($check) {
        $checked = "checked";
    } else {
        $checked = "";
    }


    $output = "";
    $output .= "
            <div class='switch'>
                 <span><strong>{$label}</strong></span>
                <div class='onoffswitch'>
                    <input type='checkbox' name='{$name}' {$checked} class='onoffswitch-checkbox' id='{$id}'>
                    <label class='onoffswitch-label' for='{$id}'>
                        <span class='onoffswitch-inner'></span>
                        <span class='onoffswitch-switch'></span>
                    </label>
                </div>
            </div>";

    return $output;


}


?>


<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Custom switch </h5>
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
        <h4>
            Options
        </h4>
        <p>
            Here you can change some options for your experience
        </p>
        <form action="profile.php" id="form_option" method="get">

            <div class="row">
                <div class="col-lg-2">
                    <?php echo checkbox_switchery("idSwitch1", "chk1", "option", true); ?>
                </div>

                <div class="col-lg-2">
                    <?php echo checkbox_switchery("idSwitch2", "chk2", "option2", true); ?>

                </div>
            </div>

            <!--            <input type="submit" name="submit" value="Submit">-->


            <?php

            $output .= "";
            $output .= "<div class='col-sm-1 col-sm-offset-3'>";
            $output .= "<input type='submit' name='submit' class='btn btn-primary' value='Submit options'  >";
            $output .= "</div>";

            echo $output;
            ?>

        </form>


    </div>
</div>

<!-- Switchery -->
<script src="js/plugins/switchery/switchery.js"></script>


