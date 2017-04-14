<?php $session->confirmation_protected_page(); ?>


<?php


?>


<div class="row">
    <div class="col-lg-12  white-bg">
        <div class="text-center m-t-lg">


            <h1>Welcome to your profile page <strong>

                    <?php if (isset($user)) {
                        echo $user->full_name();
                    } ?></strong></h1>

        </div>
    </div>


    <div class="row" style="margin-top: 10%">
        <div class="col-lg-4 col-lg-offset-1">
            <div class="contact-box">
                <a href="#">
                    <div class="col-sm-4">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" src="<?php if (isset($user)) {
                                echo $user->user_path_and_placeholder();
                            } ?>">
                            <div class="m-t-xs font-bold"><?php if (isset($user)) {
                                    echo $user->user_type;
                                } ?></div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h3><strong><?php if (isset($user)) {
                                    echo $user->full_name();
                                } ?></strong></h3>
                        <p><i class="fa fa-user"></i> <?php if (isset($user)) {
                                echo $user->username;
                            } ?></p>
                        <p><i class="fa fa-envelope"></i><strong> <?php if (isset($user)) {
                                    echo $user->email;
                                } ?></strong></p>

                        <address>

                            <?php if (isset($user)) {
                                if (!empty($user->address)) { ?>
                                    <?php echo $user->address; ?><br>
                                <?php }
                            } ?>

                            <?php if (isset($user)) {
                                if (!empty($user->cp)) { ?>
                                    <?php echo $user->cp . " "; ?>
                                <?php }
                            } ?>

                            <?php if (isset($user)) {
                                if (!empty($user->city)) { ?>
                                    <?php echo $user->city . ""; ?><br>
                                <?php }
                            } ?>

                            <?php if (isset($user)) {
                                if (!empty($user->country)) { ?>
                                    <?php echo $user->country . ""; ?><br>
                                <?php }
                            } ?>


                            <?php if (isset($user)) {
                                if (!empty($user->phone)) { ?>
                                    <span style="margin-right: 2%"><i
                                                class="fa fa-phone"></i></span> <?php echo $user->phone; ?><br>
                                <?php }
                            } ?>

                            <?php if (isset($user)) {
                                if (!empty($user->mobile)) { ?>
                                    <span style="margin-right: 2.6%"><i
                                                class="fa fa-mobile"></i></span> <?php echo $user->mobile; ?>

                                <?php }
                            } ?>

                        </address>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-5 col-lg-offset-1">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1">Password</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2">Other info</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-3">Photo</a></li>

                    </ul>
                    <div class="tab-content">

                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body ">
                                <p class="text-center"><strong>Change password here</strong></p>
                                <?php echo UpdateUserProfile::form_change_password(); ?>

                                <div class="col-lg-6 col-lg-offset-1" style=" ">
                                </div>
                            </div>
                        </div>


                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <p class="text-center"><strong>Update user info</strong></p>

                                <?php echo UpdateUserProfile::form_additional_info(); ?>

                            </div>
                        </div>


                        <div id="tab-3" class="tab-pane">
                            <div class="panel-body">
                                <p class="text-center"><strong>Update your picture</strong></p>

                                <?php echo UpdateUserProfile::form_photo(); ?>

                            </div>
                        </div>


                    </div>


                </div>
            </div>

        </div>