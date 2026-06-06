<?php //It seems that class Session is not working on a sub include file?>
<?php if (isset($_SESSION["user_id"])) {
    $user = User::find_by_id($_SESSION['user_id']);
} else {
    $user = "";
} ?>

<?php

$show_testing = $show_testing ?? false;
$show_admin_context_label = (isset($layout_context) && $layout_context == "admin") || (isset($session) && $session->is_logged_in() && User::is_admin());

if ($layout_context == "public") {
    $path_admin = MY_URL_ADMIN;
    $path_public = MY_URL_PUBLIC;
} else {
    $path_admin = MY_URL_ADMIN;
    $path_public = MY_URL_PUBLIC;
} ?>



<?php if ($layout_context == "public") { ?>
    <script>
        var $layout_context = "public";
        var $path_admin = "admin/";
        var $path_public = "";
        var $path = "";
    </script>
<?php } else { ?>
    <script>
        var $layout_context = "admin";
        var $path_admin = "";
        var $path_public = "../";
        var $path = "../";
    </script>

<?php } ?>

<div class="row">
    <nav class="navbar navbar-default navbar-fixed-top " role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand active" href="<?php echo SITE_URL; ?>/public/index.php"><?php echo LOGO ?><?php if ($show_admin_context_label) { ?><span class="ikamy-logo-context-label">Admin</span><?php } ?></a>

        </div>
        <div class="collapse navbar-collapse" id="collapse">
            <ul class="nav navbar-nav">

                <li <?php if (isset($active_menu) && $active_menu == "home") {
                    echo "class=\"active\"";
                } ?>>
                    <?php if ($layout_context == "public") { ?>
                        <a href="<?php echo $path_admin; ?>index.php">Home</a>
                    <?php } ?>

                </li>

                <?php echo $Nav->menu_item('', 'Galleries', $Nav->http . 'Inspinia/index.php', ''); ?>


                <li
                    <?php if (isset($active_menu) && $active_menu == "about") {
                        echo " class=\"dropdown active\"";
                    } else {
                        echo " class=\" dropdown\"";
                    } ?>
                ><a href="#" data-toggle="dropdown">About us<span class="caret"></span></a>
                    <ul class="dropdown-menu">


                        <?php echo $Nav->menu_item('', 'About us1', 'about_us.php', 'public'); ?>
                        <?php echo $Nav->menu_item('', 'About us 2', 'about_us_2.php', 'public'); ?>
                        <?php
                        if (User::is_admin()) {
                            echo "<li class=\"divider\"></li>";
                            echo $Nav->menu_item('', 'JB Video', 'web_jb_02/jb_request_02.html', 'public');

                            echo "<li class=\"divider\"></li>";
                            echo $Nav->menu_item('', 'Inspinia', '../inspinia/index.php', 'public');
                            echo $Nav->menu_item('', 'Inspinia Full2', '../Inspinia_Full_Version_2/index.php', 'public', true);
                            echo $Nav->menu_item('', 'Inspinia Full', '../inspinia_Full_Version/index.php', 'public', true);
                            echo "<li class=\"divider\"></li>";

                            echo $Nav->menu_item('', 'SmartAdmin', '../smartAdmin/index.php', 'public');
                            echo $Nav->menu_item('', 'SmartAdmin Full', '../SmartAdmin_Full_Version/index.php', 'public');


                            echo "<li class=\"divider\"></li>";
                            echo $Nav->menu_item('', 'Minton', '../minton/index.php', 'public');
                            echo $Nav->menu_item('', 'Minton Full', '../Minton_Full_Version/index.php', 'public');

                            echo "<li class=\"divider\"></li>";
                            echo $Nav->menu_item('', 'Your info', 'some_data.php', 'public');

                        }
                        ?>

                    </ul>
                </li>


                <li
                    <?php if (isset($active_menu) && $active_menu == "links") {
                        echo "class=\"active\"";
                    } ?>
                ><a href="<?php echo $path_public; ?>myLinks.php?category=Others">Links</a></li>

                <?php if (isset($_SESSION["user_id"]) && User::is_kamy()) { ?>
                    <li
                        <?php if (isset($active_menu) && $active_menu == "saved_links") {
                            echo "class=\"active\"";
                        } ?>
                    ><a href="<?php echo $path_public; ?>saved_links.php">Saved links</a></li>
                <?php } ?>

                <li
                    <?php if (isset($active_menu) && $active_menu == "contact") {
                        echo "class=\"active\"";
                    } ?>
                ><a href="<?php echo $path_public; ?>contact.php">Contact</a></li>


                <li
                    <?php if (isset($active_menu) && $active_menu == "Others") {
                        echo " class=\"dropdown active\"";
                    } else {
                        echo " class=\" dropdown\"";
                    } ?>
                ><a href="#" data-toggle="dropdown">Other<span class="caret"></span></a>

                    <ul class="dropdown-menu">

                        <li><a href="<?php echo $path_admin; ?>download.php">Download</a></li>
                        <?php echo "<li class=\"divider\"></li>";
                        echo $Nav->menu_item('Calendar', 'Calendar', 'manage_ajax.php', 'admin/crud/ajax');
                        echo $Nav->menu_item('Note', 'Note', 'new_ajax.php', 'admin/crud/ajax');
                        echo "<li class=\"divider\"></li>";
                        ?>

                        <li><a href="<?php echo $path_public; ?>_f/pages.php">Other Links</a></li>


                        <li class="divider"></li>

                        <li><a href="<?php echo $path_public; ?>_f/IT/xampp.php">Xampp</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/IT/python_django.php">Python Django</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/IT/python_kivy.php">Python Kivy</a></li>


                        <li><a href="<?php echo $path_public; ?>_f/IT/lesson_git.php">Git</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/IT/lesson_git2.php">Git2 branch</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/IT/lesson_git3.php">Git2 branch update</a></li>

                        <li><a href="<?php echo $path_public; ?>_f/IT/lesson_OOP_PHP.php">OOP PHP</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/IT/lesson_OOP_PHP.php">OOP PHP2</a></li>


                    </ul>
                </li>


                <?php if (isset($_SESSION["user_id"]) && ($user->is_employee())) { ?>

                <li
                    <?php if (isset($active_menu) && $active_menu == "admin") {
                        echo " class=\"dropdown active\"";
                    } else {
                        echo " class=\" dropdown\"";
                    } ?>
                ><a href="#" data-toggle="dropdown">Mon Menu<span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li><a href="#">Menu1</a></li>
                        <li><a href="#">Menu2</a></li>
                    </ul>
                </li>


                <?php } ?>






                <?php

                if (isset($_SESSION["user_id"]) && ($user->is_manager() || $user->is_admin() || $user->is_secretary())) {
                    $management_menu_is_active = isset($active_menu) && ($active_menu == "admin" || $active_menu == "adminNew");

                    $management_item = function ($class, $label, $allow_new = true, $manage_page = 'manage_ajax.php', $new_page = 'new_ajax.php', $area = 'admin/crud/ajax') use ($Nav) {
                        $active = '';
                        $class_query = '';

                        if ($class !== '') {
                            $class_query = '?class_name=' . rawurlencode($class);

                            if (isset($_GET['class_name']) && $_GET['class_name'] == $class) {
                                $active = ' active';
                            }
                        }

                        $findme = '/';
                        $pos = strpos($area, $findme);

                        if ($area == 'admin') {
                            $path = $Nav->path_admin;
                        } elseif ($area == 'public') {
                            $path = $Nav->path_public;
                        } elseif ($pos === false) {
                            $path = $area;
                        } else {
                            $array = explode($findme, $area);
                            $count = count($array);
                            $path = "/" . $Nav->top_folder;

                            for ($x = 0; $x < $count; $x++) {
                                $path .= "/" . $array[$x];
                            }

                            $path .= "/";
                        }

                        $manage_url = str_replace("///", "/", $path . $manage_page . $class_query);
                        $new_url = str_replace("///", "/", $path . $new_page . $class_query);
                        $output = "<li class=\"ikamy-management-item{$active}\">";
                        $output .= "<a class=\"ikamy-management-item__label\" href=\"" . h($manage_url) . "\">" . h($label) . "</a>";
                        $output .= "<span class=\"ikamy-management-item__actions\">";
                        $output .= "<a class=\"ikamy-management-item__action\" href=\"" . h($manage_url) . "\" title=\"Manage " . h($label) . "\"><i class=\"fa fa-list\" aria-hidden=\"true\"></i><span>Manage</span></a>";

                        if ($allow_new) {
                            $output .= "<a class=\"ikamy-management-item__action ikamy-management-item__action--new\" href=\"" . h($new_url) . "\" title=\"New " . h($label) . "\"><i class=\"fa fa-plus\" aria-hidden=\"true\"></i><span>New</span></a>";
                        }

                        $output .= "</span>";
                        $output .= "</li>";

                        return $output;
                    };

                    $management_link = function ($label, $page, $title, $icon = 'fa-external-link') use ($Nav) {
                        $href = str_replace("///", "/", $Nav->path_public . $page);
                        $script_name = basename((string)($_SERVER['SCRIPT_NAME'] ?? ''));
                        $active = ($script_name === basename($page)) ? ' active' : '';
                        $output = "<li class=\"ikamy-management-item{$active}\">";
                        $output .= "<a class=\"ikamy-management-item__label\" href=\"" . h($href) . "\">" . h($label) . "</a>";
                        $output .= "<span class=\"ikamy-management-item__actions\">";
                        $output .= "<a class=\"ikamy-management-item__action\" href=\"" . h($href) . "\" title=\"" . h($title) . "\"><i class=\"fa " . h($icon) . "\" aria-hidden=\"true\"></i><span>Open</span></a>";
                        $output .= "</span>";
                        $output .= "</li>";

                        return $output;
                    };
                    ?>


                <li
                    <?php if ($management_menu_is_active) {
                        echo " class=\"dropdown ikamy-management-menu active\"";
                    } else {
                        echo " class=\"dropdown ikamy-management-menu\"";
                    } ?>
                ><a href="#" data-toggle="dropdown">Management<span class="caret"></span></a>

                    <ul class="dropdown-menu ikamy-management-dropdown">
                        <?php if (User::is_admin()) { ?>
                            <li class="dropdown-header">Planning</li>
                            <?php echo $management_item('Calendar', 'Calendar'); ?>
                        <?php } ?>

                        <li class="dropdown-header">Content and tools</li>
                        <?php echo $management_item('Article', 'Article'); ?>
                        <?php echo $management_item('Book', 'Book'); ?>
                        <?php echo $management_item('ToDoList', 'To Do List'); ?>
                        <?php echo $management_item('Chat', 'Chat'); ?>
                        <?php echo $management_item('ChatFriend', 'Chat Friend'); ?>

                        <li class="dropdown-header">Expenses</li>
                        <?php echo $management_item('MyHouseExpense', 'House Expense'); ?>
                        <?php echo $management_item('MyExpense', 'Expense'); ?>
                        <?php if (User::is_admin()) { ?>
                            <?php echo $management_item('MyExpenseMum', 'Expense Mum'); ?>
                            <?php echo $management_item('MyExpenseMumPost', 'Expense Mum Post'); ?>
                        <?php } ?>
                        <?php if (User::is_admin() || User::is_caroline()) { ?>
                            <?php echo $management_item('MyExpenseCaroline', 'Expense Mum Caroline'); ?>
                        <?php } ?>
                        <?php echo $management_item('MyLoan', 'Loan'); ?>
                        <?php if (User::is_admin() || User::is_caroline() || User::is_weslley()) { ?>
                            <?php echo $management_link('Loans', 'loan_expense.php', 'Open loans overview', 'fa-table'); ?>
                            <?php echo $management_link('Loans Mum', 'loan_expense_1.php', 'Open mum loans summary', 'fa-line-chart'); ?>
                        <?php } ?>
                        <?php echo $management_item('MyExpensePerson', 'Expense Person'); ?>
                        <?php echo $management_item('MyExpenseType', 'Expense Type'); ?>
                        <?php echo $management_item('MyHouseExpenseType', 'House Expense Type'); ?>
                        <?php echo $management_item('Currency', 'Currency'); ?>

                        <li class="dropdown-header">People</li>
                        <li class="ikamy-management-item">
                            <a class="ikamy-management-item__label" href="/public/admin/manage_user.php">User</a>
                            <span class="ikamy-management-item__actions">
                                <a class="ikamy-management-item__action" href="/public/admin/manage_user.php" title="Manage User"><i class="fa fa-list" aria-hidden="true"></i><span>Manage</span></a>
                                <a class="ikamy-management-item__action ikamy-management-item__action--new" href="<?php echo h(str_replace("///", "/", "/" . $Nav->top_folder . "/admin/crud/ajax/new_ajax.php?class_name=User")); ?>" title="New User"><i class="fa fa-plus" aria-hidden="true"></i><span>New</span></a>
                            </span>
                        </li>

                        <li class="dropdown-header">Links</li>
                        <?php echo $management_link('Saved links', 'saved_links.php', 'Open saved URLs', 'fa-bookmark'); ?>
                        <?php echo $management_item('Links', 'Links'); ?>
                        <?php echo $management_item('LinksCategory', 'Links Category'); ?>
                    </ul>
                </li>

                <?php if (User::is_kamy() && 1 == 2) { ?>

                <li
                    <?php if (isset($active_menu) && $active_menu == "photo_gallery") {
                        echo " class=\"dropdown active\"";
                    } else {
                        echo " class=\" dropdown\"";
                    } ?>
                ><a href="#" data-toggle="dropdown">Photo Gallery<span class="caret"></span></a>

                    <ul class="dropdown-menu">


                        <?php echo $Nav->menu_item('', 'Photos', 'manage_photos.php', 'admin/wkg_progress') ?>
                        <?php echo $Nav->menu_item('', 'Comments', 'manage_comments.php', 'admin/wkg_progress') ?>
                        <?php echo $Nav->menu_item('', 'Comment Photo', 'manage_comments_photo.php', 'admin/wkg_progress') ?>

                        <?php echo $Nav->menu_item('', 'New Photo', 'new_photo.php', 'admin/wkg_progress') ?>

                        <?php echo "<li class=\"divider\"></li>"; ?>
                        <?php echo $Nav->menu_item('', 'Public Photo', 'photo.php', "public") ?>
                        <?php echo $Nav->menu_item('', 'Public Photo Gallery', 'photo_gallery.php', "public") ?>


                    </ul>
                </li>
                <?php } ?>


                <?php if (User::is_kamy() && 1 == 2) { ?>

                <li
                    <?php if (isset($active_menu) && $active_menu == "photo_gallery") {
                        echo " class=\"dropdown active\"";
                    } else {
                        echo " class=\" dropdown\"";
                    } ?>
                ><a href="#" data-toggle="dropdown">Photo Gallery<span class="caret"></span></a>

                    <ul class="dropdown-menu">


                        <?php echo $Nav->menu_item('', 'Photos', 'manage_photos.php', 'admin/wkg_progress') ?>
                        <?php echo $Nav->menu_item('', 'Comments', 'manage_comments.php', 'admin/wkg_progress') ?>
                        <?php echo $Nav->menu_item('', 'Comment Photo', 'manage_comments_photo.php', 'admin/wkg_progress') ?>

                        <?php echo $Nav->menu_item('', 'New Photo', 'new_photo.php', 'admin/wkg_progress') ?>

                        <?php echo "<li class=\"divider\"></li>"; ?>
                        <?php echo $Nav->menu_item('', 'Public Photo', 'photo.php', "public") ?>
                        <?php echo $Nav->menu_item('', 'Public Photo Gallery', 'photo_gallery.php', "public") ?>


                    </ul>
                </li>
                <?php } ?>


                <?php if (User::is_kamy()) { ?>
                <li
                    <?php if (isset($active_menu) && $active_menu == "Kamy") {
                        echo " class=\"dropdown active\"";
                    } else {
                        echo " class=\" dropdown\"";
                    } ?>
                ><a href="#" data-toggle="dropdown">Kamy<span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $path_public; ?>_f/ocas/ocas.php">Ocas</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/kamy/recurring_appointment.php">Recurring
                                Calendar</a></li>
                        <li><a href="<?php echo $path_public; ?>admin/delete_unwanter_user.php">Del unwanted
                                Users</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $path_public; ?>_f/music/music.php">Music</a></li>

                        <li><a href="<?php echo $path_public; ?>_f/kamy/kamy_1.php">Finance</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/kamy/loan_expense.php">Loans Kamy</a></li>
                        <li><a href="<?php echo $path_public; ?>_f/kamy/pay_brazil.php">Pay Bresil</a></li>

                        <li class="divider"></li>
                        <li><a target="_blank" rel="noopener noreferrer" href="https://app.nearscreen.com/accounts/login/">nearscreen
                                Seatable</a></li>
                        <li><a target="_blank" rel="noopener noreferrer" href="https://cloud.seatable.io/accounts/login/">Kamran
                                Seatable</a></li>
                        <li><a target="_blank" rel="noopener noreferrer" href="https://web.nearscreen.com/login/">nearscreen WeWeb</a>
                        </li>

                        <li><a target="_blank" rel="noopener noreferrer" href="https://dashboard.weweb.io/sign-in">WeWeb
                                Dashboard(dev@nearscreen)</a></li>
                        <li><a target="_blank" rel="noopener noreferrer" href="https://sso.nearscreen.com/admin">aMember</a></li>

                    </ul>
                </li>

                <?php } ?>


                <?php // } ?>
                <?php } ?>

            </ul>


            <?php

            ?>

<!--            <i class='fa fa-calendar'>&nbsp;-->

            <ul class="nav navbar-nav navbar-right nav-quick-actions">
                <?php
                if (User::is_kamy()) {
                    $note_quick_class = User::is_admin() ? "nav-quick-action nav-quick-action--add nav-quick-action--note-add" : "nav-quick-action nav-quick-action--add nav-quick-action--note-add nav-quick-action--end";
                    echo "<li><a class='nav-quick-action nav-quick-action--calendar' href='" . SITE_URL . "/public/calendar.php' title='Manage calendar' aria-label='Manage calendar' data-tooltip='Manage calendar'><i class='fa fa-calendar' aria-hidden='true'></i><span class='sr-only'>Manage calendar</span></a></li>";
                    echo "<li><a class='nav-quick-action nav-quick-action--add nav-quick-action--calendar-add' href='" . SITE_URL . "/public/admin/crud/ajax/new_ajax.php?class_name=Calendar' title='Add calendar date' aria-label='Add calendar date' data-tooltip='Add calendar date' data-ikamy-modal-target='#ikamy-calendar-modal'><span class='nav-quick-action__stack'><i class='fa fa-calendar-o' aria-hidden='true'></i><i class='fa fa-plus nav-quick-action__badge' aria-hidden='true'></i></span><span class='sr-only'>Add calendar date</span></a></li>";
                    echo "<li><a class='nav-quick-action nav-quick-action--notes' href='" . SITE_URL . "/public/admin/notes.php?viewAllNote=no' title='Quick notes' aria-label='Quick notes' data-tooltip='Quick notes'><i class='fa fa-edit' aria-hidden='true'></i><span class='sr-only'>Quick notes</span></a></li>";
                    echo "<li><a class='" . h($note_quick_class) . "' href='" . SITE_URL . "/public/admin/crud/ajax/new_ajax.php?class_name=Note' title='Add note' aria-label='Add note' data-tooltip='Add note' data-ikamy-modal-target='#ikamy-note-modal'><span class='nav-quick-action__stack'><i class='fa fa-edit' aria-hidden='true'></i><i class='fa fa-plus nav-quick-action__badge' aria-hidden='true'></i></span><span class='sr-only'>Add note</span></a></li>";
                }
                if (User::is_admin()) {
                    $expense_quick_class = User::is_kamy() ? "nav-quick-action nav-quick-action--add nav-quick-action--expense-add" : "nav-quick-action nav-quick-action--add nav-quick-action--expense-add nav-quick-action--solo";
                    echo "<li><a class='" . h($expense_quick_class) . "' href='" . SITE_URL . "/public/admin/crud/ajax/new_ajax.php?class_name=MyExpense' title='Add expense' aria-label='Add expense' data-tooltip='Add expense' data-ikamy-modal-target='#ikamy-expense-modal'><span class='nav-quick-action__stack'><i class='fa fa-money' aria-hidden='true'></i><i class='fa fa-plus nav-quick-action__badge' aria-hidden='true'></i></span><span class='sr-only'>Add expense</span></a></li>";
                }
                ?>

                <?php
                list ($date_fr, $date_fr_short, $date_fr_long, $date_fr_hr, $date_fr_short_hr, $date_fr_long_hr, $date_fr_full_hr) = date_fr(); ?>

                <!--                <p class="navbar-text " style="">-->
                <?php //echo now()//echo h($date_fr_long_hr); ?><!--</p>-->
                <!---->
                <?php if (isset($_SESSION["user_id"])) { ?>

                    <li class="active nav-user-menu"><a href="<?php echo $path_admin; ?>logout.php"
                                          data-toggle="dropdown"><?php echo "&nbsp;&nbsp;" ?>
                            <small><strong><?php echo $user->username . "&nbsp;&nbsp;"; ?></strong></small>


                            <?php
                            $username = $user->username;
                            if (file_exists($path_public . "img/{$username}.JPG")) {
                                echo "<span><img class='img-thumbnail img-responsive img-circle'  src='{$path_public}img/{$username}.JPG' alt='{$username}'style='width:2em;height:2em;'</span>";
                            }
                            ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <?php if (isset($_SESSION["user_id"]) and $user->is_admin()) { ?>
                                <li><a href="<?php echo $path_admin; ?>index.php">Index Admin</a></li>
                                <li><a href="<?php echo $path_admin; ?>profile.php">Profile</a></li>
                                <li><a href="<?php echo $path_admin; ?>upload.php">Upload file photo</a></li>
                                <li class="divider"></li>

                                <?php echo $Nav->menu_item('FailedLogin', 'Manage Failed Login', 'manage_ajax.php', 'admin/crud/ajax'); ?>
                                <?php echo $Nav->menu_item('BlacklistIp', 'Manage Blacklist Ip', 'manage_ajax.php', 'admin/crud/ajax'); ?>
                                <?php echo $Nav->menu_item('UserType', 'Manage User Type', 'manage_ajax.php', 'admin/crud/ajax'); ?>

                                <li><a href="<?php echo $path_admin; ?>logfile.php">Log File</a></li>

                                <li class="divider"></li>
                            <?php } ?>

                            <li><a href="<?php echo $path_admin; ?>logout.php">Logout</a></li>

                        </ul>


                    </li>

                <?php } else { ?>

                <li<?php if (isset($active_menu) && $active_menu == "login") {
                    echo " class=\"active \"";
                } ?>
                ><a href="<?php echo $path_admin; ?>login.php"><span class='glyphicon glyphicon-user'
                                                                     aria-hidden='true'></span><?php echo "&nbsp;&nbsp;" ?>
                        Login<?php echo "&nbsp;&nbsp;&nbsp;&nbsp;"; ?></a></li><?php } ?>


            </ul>


        </div>
    </nav>


</div>

<?php if (isset($_SESSION["user_id"]) && (User::is_kamy() || User::is_admin())) { ?>
    <?php $ikamy_nav_csrf_token = create_csrf_token(); ?>

    <div class="modal fade ikamy-create-modal" id="ikamy-calendar-modal" tabindex="-1" role="dialog"
         aria-labelledby="ikamy-calendar-modal-title">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="form-horizontal ikamy-create-modal__form"
                      data-create-action="<?php echo h(SITE_URL . '/public/admin/crud/ajax/new_ajax.php?class_name=Calendar'); ?>"
                      data-edit-action="<?php echo h(SITE_URL . '/public/admin/crud/ajax/edit_ajax.php?class_name=Calendar&id=__ID__'); ?>"
                      action="<?php echo h(SITE_URL . '/public/admin/crud/ajax/new_ajax.php?class_name=Calendar'); ?>"
                      method="post">
                    <input type="hidden" name="csrf_token" value="<?php echo h($ikamy_nav_csrf_token); ?>">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="return_to" value="">
                    <input type="hidden" name="ikamy_modal" value="calendar">

                    <div class="modal-header ikamy-create-modal__header ikamy-create-modal__header--calendar">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p class="ikamy-create-modal__eyebrow">Calendar</p>
                        <h4 class="modal-title" id="ikamy-calendar-modal-title">New calendar date</h4>
                    </div>

                    <div class="modal-body ikamy-create-modal__body">
                        <div class="ikamy-create-modal__status" hidden></div>
                        <div class="ikamy-create-modal__row">
                            <div class="ikamy-create-modal__cell">
                                <div class="form-group">
                                    <span class="control-label ikamy-create-modal__group-label">Person<span class="ikamy-required-star" aria-hidden="true">*</span></span>
                                    <div class="ikamy-choice-group" role="radiogroup" aria-label="Person">
                                        <label class="ikamy-choice ikamy-choice--person-kamy">
                                            <input id="ikamy-calendar-person-kamy" name="person" type="radio"
                                                   value="0" required checked>
                                            <span>Kamy</span>
                                        </label>
                                        <label class="ikamy-choice ikamy-choice--person-mum">
                                            <input id="ikamy-calendar-person-mum" name="person" type="radio"
                                                   value="1" required>
                                            <span>Mum</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ikamy-create-modal__row">
                            <div class="ikamy-create-modal__cell">
                                <div class="form-group">
                                    <label class="control-label" for="ikamy-calendar-title">Title<span class="ikamy-required-star" aria-hidden="true">*</span></label>
                                    <input class="form-control" id="ikamy-calendar-title" name="title" type="text"
                                           placeholder="What is planned?" required>
                                </div>
                            </div>
                        </div>

                        <div class="ikamy-create-modal__row ikamy-create-modal__row--three">
                            <div class="ikamy-create-modal__cell">
                                <div class="form-group">
                                    <label class="control-label" for="ikamy-calendar-date">Date<span class="ikamy-required-star" aria-hidden="true">*</span></label>
                                    <input class="form-control js-flatpickr-date" id="ikamy-calendar-date" name="start_date" type="text"
                                           value="<?php echo h(date('Y-m-d')); ?>" required>
                                </div>
                            </div>
                            <div class="ikamy-create-modal__cell">
                                <div class="form-group">
                                    <label class="control-label" for="ikamy-calendar-start">Start<span class="ikamy-required-star" aria-hidden="true">*</span></label>
                                    <input class="form-control js-flatpickr-time" id="ikamy-calendar-start" name="start_time" type="text"
                                           placeholder="HH:MM"
                                           required>
                                </div>
                            </div>
                            <div class="ikamy-create-modal__cell">
                                <div class="form-group">
                                    <label class="control-label" for="ikamy-calendar-end">End</label>
                                    <input class="form-control js-flatpickr-time" id="ikamy-calendar-end" name="end_time" type="text"
                                           placeholder="HH:MM">
                                </div>
                            </div>
                        </div>

                        <div class="ikamy-create-modal__row">
                            <div class="ikamy-create-modal__cell">
                                <div class="form-group">
                                    <label class="control-label" for="ikamy-calendar-comment">Comment</label>
                                    <textarea class="form-control" id="ikamy-calendar-comment" name="comment" rows="2"
                                              placeholder="Optional details"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="ikamy-create-modal__row">
                            <div class="ikamy-create-modal__cell">
                                <div class="form-group ikamy-create-modal__compact-group">
                                    <span class="control-label ikamy-create-modal__group-label">Birthday<span class="ikamy-required-star" aria-hidden="true">*</span></span>
                                    <div class="ikamy-choice-group ikamy-choice-group--compact" role="radiogroup" aria-label="Birthday">
                                        <label class="ikamy-choice">
                                            <input id="ikamy-calendar-birthday-no" name="is_birthday" type="radio"
                                                   value="0" required checked>
                                            <span>No</span>
                                        </label>
                                        <label class="ikamy-choice">
                                            <input id="ikamy-calendar-birthday-yes" name="is_birthday" type="radio"
                                                   value="1" required>
                                            <span>Yes</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer ikamy-create-modal__footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary ikamy-create-modal__submit">
                            <i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Create date
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade ikamy-create-modal" id="ikamy-note-modal" tabindex="-1" role="dialog"
         aria-labelledby="ikamy-note-modal-title">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="form-horizontal ikamy-create-modal__form"
                      data-create-action="<?php echo h(SITE_URL . '/public/admin/crud/ajax/new_ajax.php?class_name=Note'); ?>"
                      data-edit-action="<?php echo h(SITE_URL . '/public/admin/crud/ajax/edit_ajax.php?class_name=Note&id=__ID__'); ?>"
                      action="<?php echo h(SITE_URL . '/public/admin/crud/ajax/new_ajax.php?class_name=Note'); ?>"
                      method="post">
                    <input type="hidden" name="csrf_token" value="<?php echo h($ikamy_nav_csrf_token); ?>">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="return_to" value="">
                    <input type="hidden" name="ikamy_modal" value="note">
                    <input type="hidden" name="user_id" value="<?php echo h($_SESSION['user_id']); ?>">
                    <input type="hidden" name="progress" value="5">

                    <div class="modal-header ikamy-create-modal__header ikamy-create-modal__header--note">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p class="ikamy-create-modal__eyebrow">Notes</p>
                        <h4 class="modal-title" id="ikamy-note-modal-title">New note</h4>
                    </div>

                    <div class="modal-body ikamy-create-modal__body">
                        <div class="ikamy-create-modal__status" hidden></div>
                        <div class="form-group">
                            <label class="control-label" for="ikamy-note-text">Note<span class="ikamy-required-star" aria-hidden="true">*</span></label>
                            <textarea class="form-control" id="ikamy-note-text" name="note" rows="4"
                                      placeholder="Write the note..." required></textarea>
                        </div>

                        <div class="ikamy-create-modal__row ikamy-create-modal__row--note-meta">
                            <div class="ikamy-create-modal__cell">
                                <div class="form-group">
                                    <label class="control-label" for="ikamy-note-due">Due date</label>
                                    <input class="form-control js-flatpickr-date" id="ikamy-note-due" name="due_date" type="text"
                                           value="<?php echo h(date('Y-m-d')); ?>">
                                </div>
                            </div>
                            <div class="ikamy-create-modal__cell">
                                <div class="form-group">
                                    <label class="control-label" for="ikamy-note-rank">Rank</label>
                                    <input class="form-control" id="ikamy-note-rank" name="rank" type="number" min="0"
                                           value="1">
                                </div>
                            </div>
                            <div class="ikamy-create-modal__cell">
                                <div class="form-group">
                                    <span class="control-label ikamy-create-modal__group-label">Done/finished<span class="ikamy-required-star" aria-hidden="true">*</span></span>
                                    <div class="ikamy-choice-group ikamy-choice-group--compact" role="radiogroup" aria-label="Done or finished">
                                        <label class="ikamy-choice">
                                            <input id="ikamy-note-done-no" name="done" type="radio" value="0" required checked>
                                            <span>No</span>
                                        </label>
                                        <label class="ikamy-choice">
                                            <input id="ikamy-note-done-yes" name="done" type="radio" value="1" required>
                                            <span>Yes</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="ikamy-note-web-address">Website address</label>
                            <input class="form-control" id="ikamy-note-web-address" name="web_address" type="url"
                                   placeholder="https://example.com">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="ikamy-note-comment">Comment</label>
                            <textarea class="form-control" id="ikamy-note-comment" name="comment" rows="3"
                                      placeholder="Optional details"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer ikamy-create-modal__footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary ikamy-create-modal__submit">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Create note
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if (User::is_admin()) { ?>
        <?php
        $ikamy_expense_people = MyExpensePerson::find_by_sql("SELECT * FROM myexpense_person ORDER BY `rank` ASC, person_name ASC");
        $ikamy_expense_types = MyExpenseType::find_by_sql("SELECT * FROM myexpense_type ORDER BY `rank` ASC, expense_type ASC");
        $ikamy_expense_currencies = Currency::find_by_sql("SELECT * FROM currency ORDER BY `rank` ASC, currency ASC");
        $ikamy_expense_default_person_id = "2";
        ?>
        <div class="modal fade ikamy-create-modal" id="ikamy-expense-modal" tabindex="-1" role="dialog"
             aria-labelledby="ikamy-expense-modal-title">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form class="form-horizontal ikamy-create-modal__form"
                          data-create-action="<?php echo h(SITE_URL . '/public/admin/crud/ajax/new_ajax.php?class_name=MyExpense'); ?>"
                          action="<?php echo h(SITE_URL . '/public/admin/crud/ajax/new_ajax.php?class_name=MyExpense'); ?>"
                          method="post">
                        <input type="hidden" name="csrf_token" value="<?php echo h($ikamy_nav_csrf_token); ?>">
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="return_to" value="">
                        <input type="hidden" name="ikamy_modal" value="expense">
                        <input type="hidden" name="modification_time" value="<?php echo h(datetime_sql()); ?>">

                        <div class="modal-header ikamy-create-modal__header ikamy-create-modal__header--expense">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p class="ikamy-create-modal__eyebrow">Expense</p>
                            <h4 class="modal-title" id="ikamy-expense-modal-title">New expense</h4>
                            <a class="ikamy-create-modal__header-link" href="<?php echo h(SITE_URL . '/Inspinia/loan_exp.php'); ?>">
                                <i class="fa fa-list" aria-hidden="true"></i> Manage expenses
                            </a>
                        </div>

                        <div class="modal-body ikamy-create-modal__body">
                            <div class="ikamy-create-modal__status" hidden></div>

                            <div class="ikamy-create-modal__row ikamy-create-modal__row--three">
                                <div class="ikamy-create-modal__cell">
                                    <div class="form-group">
                                        <label class="control-label" for="ikamy-expense-amount">Amount<span class="ikamy-required-star" aria-hidden="true">*</span></label>
                                        <input class="form-control" id="ikamy-expense-amount" name="amount" type="number"
                                               step="0.01" placeholder="0.00" required>
                                    </div>
                                </div>
                                <div class="ikamy-create-modal__cell">
                                    <div class="form-group">
                                        <label class="control-label" for="ikamy-expense-ccy-id">Currency<span class="ikamy-required-star" aria-hidden="true">*</span></label>
                                        <select class="form-control" id="ikamy-expense-ccy-id" name="ccy_id" required>
                                            <?php foreach ($ikamy_expense_currencies as $currency) { ?>
                                                <option value="<?php echo h((string)$currency->id); ?>"<?php echo (string)$currency->id === "1" ? " selected" : ""; ?>><?php echo h((string)$currency->currency); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="ikamy-create-modal__cell">
                                    <div class="form-group">
                                        <label class="control-label" for="ikamy-expense-rate">Rate<span class="ikamy-required-star" aria-hidden="true">*</span></label>
                                        <input class="form-control" id="ikamy-expense-rate" name="rate" type="number"
                                               step="0.00001" min="0.00001" value="1" required>
                                    </div>
                                </div>
                            </div>

                            <div class="ikamy-create-modal__row ikamy-create-modal__row--three">
                                <div class="ikamy-create-modal__cell">
                                    <div class="form-group">
                                        <label class="control-label" for="ikamy-expense-date">Expense date<span class="ikamy-required-star" aria-hidden="true">*</span></label>
                                        <input class="form-control js-flatpickr-date" id="ikamy-expense-date" name="expense_date" type="text"
                                               value="<?php echo h(date('Y-m-d')); ?>" required>
                                    </div>
                                </div>
                                <div class="ikamy-create-modal__cell">
                                    <div class="form-group">
                                        <label class="control-label" for="ikamy-expense-person-id">Person<span class="ikamy-required-star" aria-hidden="true">*</span></label>
                                        <select class="form-control" id="ikamy-expense-person-id" name="person_id" required>
                                            <?php foreach ($ikamy_expense_people as $person) { ?>
                                                <option value="<?php echo h((string)$person->id); ?>"<?php echo (string)$person->id === $ikamy_expense_default_person_id ? " selected" : ""; ?>><?php echo h((string)$person->person_name); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="ikamy-create-modal__cell">
                                    <div class="form-group">
                                        <label class="control-label" for="ikamy-expense-type-id">Expense type<span class="ikamy-required-star" aria-hidden="true">*</span></label>
                                        <select class="form-control" id="ikamy-expense-type-id" name="expense_type_id" required>
                                            <option value="">Choose type</option>
                                            <?php foreach ($ikamy_expense_types as $expense_type) { ?>
                                                <option value="<?php echo h((string)$expense_type->id); ?>"><?php echo h((string)$expense_type->expense_type); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="ikamy-create-modal__row">
                                <div class="ikamy-create-modal__cell">
                                    <div class="form-group ikamy-create-modal__compact-group">
                                        <span class="control-label ikamy-create-modal__group-label">Cash<span class="ikamy-required-star" aria-hidden="true">*</span></span>
                                        <div class="ikamy-choice-group ikamy-choice-group--compact" role="radiogroup" aria-label="Cash">
                                            <label class="ikamy-choice">
                                                <input id="ikamy-expense-cash-no" name="cash" type="radio" value="0" required checked>
                                                <span>No</span>
                                            </label>
                                            <label class="ikamy-choice">
                                                <input id="ikamy-expense-cash-yes" name="cash" type="radio" value="1" required>
                                                <span>Yes</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="ikamy-expense-comment">Comment</label>
                                <textarea class="form-control" id="ikamy-expense-comment" name="comment" rows="3"
                                          placeholder="Optional details"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="ikamy-expense-document">Document</label>
                                <input class="form-control" id="ikamy-expense-document" name="document" type="text"
                                       placeholder="Document path or reference">
                            </div>
                        </div>

                        <div class="modal-footer ikamy-create-modal__footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary ikamy-create-modal__submit">
                                <i class="fa fa-money" aria-hidden="true"></i> Create expense
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>

<?php //  echo "<p class='text-left'><small>".$complete_date."</small></p>";?>






<?php if (isset($_SESSION["user_id"]) && ($user->is_manager() || $user->is_admin() || $user->is_employee()) && $show_testing) { ?>


    <?php if (isset($layout_context) && $layout_context == "admin") { ?>

        <?php if (isset($sub_menu)) { ?>


            <ol class="breadcrumb">

            </ol>

        <?php } ?>

    <?php } // end $sub_menu ?>
<?php } ?>



<?php if (isset($incl_message_error) && ($incl_message_error)) { ?>


<?php } ?>


