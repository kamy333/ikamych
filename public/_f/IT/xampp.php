<?php require_once('../../../includes/initialize.php'); ?>
<?php //if (!$session->is_logged_in()) { redirect_to("login.php"); } ?>
<?php if (User::is_employee()) {
    redirect_to('index.php');
} ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "Others"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<h4 class="text-center">
    <mark><a href="<?php echo $_SERVER["PHP_SELF"] ?>">Xampp
        </a></mark>
</h4>


<h3 class="text-center"> <?php echo $text; ?></h3>

<div class="row">


    <div class="col-lg-12  " style="background-color: white;margin-top: 2em;padding: 2em">
   <pre>
        C:\xampp\apache\conf\extra\httpd-vhosts.conf

       <b>this file is when you want that you will include here a project folder in htdoc folder then
       when in the address bar you will type datatable.ch. Don't forget to start Xampp Apache and MySQL</b>


       &lt;VirtualHost *:80&gt
        ServerName slimapi.localhost
        DocumentRoot "S:\slimapi\public"
        &lt;Directory "S:\slimapi\public"&gt
            Require all granted
            AllowOverride All
        &lt;/Directory&gt
        &lt;/VirtualHost&gt

       #
       	&lt;VirtualHost *:80&gt;
           # ServerAdmin webmaster@datatable.ch
           # DocumentRoot "C:\xampp\htdocs\datatable"
           # ServerName datatable.ch
           # ErrorLog "logs/datatable.ch-error.log"
           # CustomLog "logs/datatable.ch-access.log" common
           # 	&lt;/VirtualHost&gt;

   </pre>
        <hr>
        <pre>

       C:\Windows\System32\drivers\etc\hosts

      <b> this where you link localhost 127.0.0.1  to your project website ex http://datatable.ch</b>


 # Additionally, comments (such as these) may be inserted on individual
# lines or following the machine name denoted by a '#' symbol.
#
# For example:
#
#      102.54.94.97     rhino.acme.com          # source server
#       38.25.63.10     x.acme.com              # x client host

# localhost name resolution is handled within DNS itself.
#	127.0.0.1       localhost
#	::1             localhost



127.0.0.1 		datatable.ch
127.0.0.1		taskapp.localhost
127.0.0.1       mvcapp.com

127.0.0.1		ikamych.com
127.0.0.1		dp.com

127.0.0.1		transmed.com


127.0.0.1		testing.com

127.0.0.1		applimed.com

127.0.0.1		copaamerica2014.com

   </pre>

        <pre>
            C:\xampp\phpMyAdmin\config.inc.php

            <b> MySql data</b>


        </pre>


    </div>

</div>

<hr>

<div class="row">

    <div class="col-lg-2  col-lg-offset-4 " style="background-color: white;margin-top: 2em;padding: 2em">


    </div>
</div>


<?php echo str_repeat("<p style='color:white'>i</p>", 20); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


