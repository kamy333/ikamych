<?php require 'includes/header_account.php'; ?>

<div class="wrapper-page">

    <div class="text-center">
        <a href="index.php" class="logo-lg"><i class="md md-equalizer"></i> <span>Minton</span> </a>
    </div>

    <form class="form-horizontal m-t-20" action="index.php">
        <div class="form-group">
            <div class="col-xs-12">
                <input class="form-control" type="email" required="" placeholder="Email">
                <i class="md md-email form-control-feedback l-h-34"></i>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <input class="form-control" type="text" required="" placeholder="Username">
                <i class="md md-account-circle form-control-feedback l-h-34"></i>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <input class="form-control" type="password" required="" placeholder="Password">
                <i class="md md-vpn-key form-control-feedback l-h-34"></i>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <div class="checkbox checkbox-primary">
                    <input id="checkbox-signup" type="checkbox" checked="checked">
                    <label for="checkbox-signup">
                        I accept <a href="#">Terms and Conditions</a>
                    </label>
                </div>

            </div>
        </div>

        <div class="form-group text-right m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-primary btn-custom waves-effect waves-light w-md" type="submit">Register</button>
            </div>
        </div>

        <div class="form-group m-t-30">
            <div class="col-sm-12 text-center">
                <a href="pages-login.php" class="text-muted">Already have account?</a>
            </div>
        </div>
    </form>

</div>



<?php require 'includes/footer_account.php'; ?>
