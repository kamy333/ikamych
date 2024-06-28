<!--        -->

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <div class="row">
            <div class="col-md-2 col-xs-4">
        <span><a class="btn btn-primary btn-xm" style="width: 7em;" href="class_new.php?class_name=
<?php if (isset($class_name)) {
                echo $class_name;
            } ?>">New <?php if (isset($class_name)) {
                    echo $class_name::$page_name;
                } ?></a></span>
            </div>
            <div class="col-md-6 col-xs-4">
                <h2 class="text-center  ">
                    <span class="hidden-sm hidden-xs">
                    Manage <?php

                        if (isset($class_name)) {
                            echo $class_name::$page_name;
                        }

                        ?>
                        <?php echo str_repeat("&nbsp;", 3); ?>
                    </span>
                    <span>
                    <?php if (isset($class_name)) {
                        echo $class_name::get_modal_search();
                    } ?>
            </span>
                </h2>

            </div>
            <div class=" pull-right  col-xs-4 text-right">
                <span><a class="btn btn-primary btn-xm" style="width: 7em;"
                         href="<?php echo $page_link_view; ?>">
                        <?php if (isset($page_link_text)) {
                            echo $page_link_text;
                        } ?></a></span><?php // echo str_repeat("&nbsp;", 7); ?>
            </div>
        </div>
        <?php

        //if (isset($page_link_view)) {

        if (isset($class_name)) {
            if (isset($page_link_text)) {
                if (isset($offset)) {
                    echo call_user_func_array(array($class_name, 'table_nav'), [$page_link_view, $page_link_text, $offset]);
                }
            }
        }
        //}

        ?>

        <?php
        $output = "";

        $output .= "<button id='ajax-button-on' class='btn btn-info' style='display: none' >On</button>";
        $output .= "<button id='ajax-button-off' class='btn btn-danger' style='display: none'>Off</button>";

        $output .= "<div class='col-md-12' id='table_view' style='margin-top: 1em' >
        <div>
            <div id='result' style='border: blue 1px solid'>
            </div>

            <div id='modals-form' style='margin-top: 1em' >

            </div>
            <div id='spinner'>";

        $output .= "<img src='" . $Nav->path_public . "img/spinner.gif' style='display: none' width='50' height='50'/>";

        $output .= " </div>
            <div id='message-ajax'></div>
        </div>
    </div>";

        $output .= "<div id=\"table_result\">";

        $output .= "<div class='row'>";
        $output .= "<div class='col-md-7";

        if (isset($offset)) {
            $output .= $offset;
        }

        $output .= "' id='pagination' >";
        if (isset($class_name)) {
            $output .= call_user_func_array(array($class_name, 'display_pagination'), []);
        }
        $output .= "</div>";
        $output .= "</div>";

        $output .= "<div class='row'>";
        if (isset($class_name)) {
            $output .= call_user_func_array(array($class_name, 'display_all'), ['', $view_full_table]);
        }
        $output .= "</div>";

        $output .= "</div>";//<!--end of table_result-->

        //        $output .= "<div class='row'>
        //        <div class='col-md-6 col-xs-6'>
        //            <span><a class='btn btn-primary btn-xm' style='width: 7em;' href='class_new.php?class_name=";
        //        $output .= $class_name;
        //        $output .= "'>New ".$class_name::$page_name."</a></span>";
        //        $output .= "</div>";
        //
        //        $output .= "<div class=' col-md-6 col-xs-6 text-right'>";
        //
        //        $output .= "<span><a class='btn btn-primary btn-xm' style='width: 7em;' href='";
        //        $output .= $page_link_view;
        //        $output .= "'</a></span>";
        //        $output .=  str_repeat('&nbsp;', 7);;
        //        $output .= "</div>
        //    </div>";

        $content = $output;

        //   echo  ibox($content ,  13,  "",
        //             $options = ['tools' => true, 'collapse-link' => true, 'dropdown-toggle' => true, 'dropdown-menu' => true, 'close-link' => true,'fullscreen-link'=>true]
        //            );

        ?>


        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="fullscreen-link">
                <i class="fa fa-expand"></i>
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


        <button id="ajax-button-on" class="btn btn-info" style="display: none">On</button>
        <button id="ajax-button-off" class="btn btn-danger" style="display: none">Off</button>


        <div class="col-md-12" id="table_view" style="margin-top: 1em">
            <div>

                <div id="result" style="border: blue 1px solid">

                </div>


                <div id="modals-form" style="margin-top: 1em">

                </div>
                <div id="spinner">
                    <img src="<?php echo $Nav->path_public; ?>img/spinner.gif" style="display: none" width="50"
                         height="50"/>
                </div>
                <div id="message-ajax"></div>


            </div>
        </div>

        <div id="table_result">


            <?php
            echo "<div class=\"row\">";
            if (!isset($offset)) {
                $offset = "";
            }
            echo "<div class=\"col-md-7 {$offset}\" id='pagination' >";

            if (isset($class_name)) {
                echo call_user_func_array(array($class_name, 'display_pagination'), []);
            }
            echo "</div>";
            echo "</div>";

            echo "<div class=\"row\">";
            if (isset($class_name)) {
                echo call_user_func_array(array($class_name, 'display_all'), ['', $view_full_table]);
            }
            echo "</div>";
            ?>

        </div><!--end of table_result-->

        <div class="row">
            <div class="col-md-6 col-xs-6">
                <span><a class="btn btn-primary btn-xm" style="width: 7em;"
                         href="class_new.php?class_name=<?php echo $class_name; ?>">New <?php echo $class_name::$page_name; ?></a></span>
            </div>

            <div class=" col-md-6 col-xs-6 text-right">
                <span><a class="btn btn-primary btn-xm" style="width: 7em;"
                         href="<?php echo $page_link_view; ?>"><?php echo $page_link_text; ?></a></span><?php echo str_repeat("&nbsp;", 7); ?>
            </div>
        </div>


    </div>
</div>