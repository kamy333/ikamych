<?php require_once('../includes/initialize.php'); ?>
<?php // confirm_logged_in();
$session->confirmation_protected_page();
if (User::is_employee() || User::is_secretary() || User::is_visitor()) {
    redirect_to('index.php');
}
?>
<?php $layout_context = "public"; ?>
<?php $active_menu="about"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=false; ?>
<?php $javascript="some_data"; ?>
<?php $incl_message_error=true; ?>
<?php //include_layout_template('header_2.php'); ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>
<?php //

//in case I need to set time zone
//date_default_timezone_set('America/New_York');
date_default_timezone_set('Europe/Zurich');

$bd=new BrowserDetective();
?>

<a  target="_blank" href="http://whatsmy.browsersize.com/">browsersize</a> &nbsp;&nbsp;&nbsp;
<a target="_blank"  href="https://github.com/garetjax/phpbrowscap">phpbrowscap</a> &nbsp;&nbsp;&nbsp;
<a  target="_blank" href="https://github.com/piwik/device-detector">device-detector</a>
<div class="row">
    <div class="col-md-offset-2">
        <h1 class="text-center">Is it Friday?</h1>

<p class="text-center">

    <?php if (getdate()['wday']===5) {
        //true};
        echo "Woo hoo week end starts it is Friday" ;
    } else {
        // false;
    echo "Sorry it is not Friday yet "."<br>";
    $remaining=5-date('N');
        if($remaining < 0){$remaining+=7; }
    echo "You have {$remaining
} days remaining to Friday"    ;
    }
    ?>
        </p>

   <hr>



        <?php


        function is_leap_year($year){
            if($year % 4 > 0){

                $is_leap_year=false; //2015
            }elseif($year %100 >0){
                $is_leap_year=true; //1984
            }elseif($year %400 >0){
                $is_leap_year=false; //2100
            }else{
                $is_leap_year=true; //2000
            }

            return $is_leap_year;
        }

        if (isset($_GET['year'])){
            $year=intval ($_GET['year']);
        }else{
            $year=date('Y');
        }



        echo "year ".$year."<br>";
        echo "$year % 4 = ".($year % 4)." false <br>";
        echo "$year % 100 =".($year % 100)." true<br>";
        echo "$year % 400 =".($year % 400)." false <br>";
        echo "<br>";

        ?>

<h1 class="text-center">Is it a Leap year?</h1>
        <div class="hide">
<p>Add 1 day to Feb (29)</p>
<p>Every hose number is evenly divisible by 4</p>
<p>Except years divisible by 100 but not by 400</p>
    </div>

        <form method="get" action="">
            <input type="text" name="year" value="<?php echo $year; ?>">
            <input type="submit" name="subnit">

        </form>

        <p class="text-center">
  <?php if(is_leap_year($year)){
      echo "Year $year is indeed a leap Year";

  } else {
      echo "No Year $year is Not a leap Year";
  }

  ?>
        </p>
        <?php
 echo "<pre>";
 print_r(getdate());
  echo "</pre>";?>
<?php echo date('l'); ?><br>
<?php echo date('D'); ?><br>
<?php echo date('N'); ?><br>

<?php echo getdate()['weekday']; ?><br>




    <h1 class="text-center">What is my IP?</h1>

        <p>Browser Width:<strong><span id="window-width"></span> </strong></p>
        <p>Browser Height:<strong><span id="window-height"></span></strong></p>

 <p>Your IP address is: <strong> <?php echo $_SERVER['REMOTE_ADDR']?></strong></p>
 <p>Your Proxy (forwarded) IP address is:<strong> <?php echo forwarded_ip()?></strong></p>
        <p>User Agent: <strong> <?php echo $_SERVER['HTTP_USER_AGENT']?></strong></p>
        <p>Browser: <strong> <?php echo $bd->browser_name?></strong></p>
        <p>Platform: <strong> <?php echo $bd->platform;?></strong></p>

        <p>Referrer: <strong> <?php echo $_SERVER['HTTP_REFERER']?></strong></p>
        <p>Request time: <strong> <?php echo date('l, F j, Y g:ia',$_SERVER['REQUEST_TIME']) ?></strong></p>

        <?php foreach ($_SERVER as $key=>$item):?>
            <p><?php echo $key ?>: <strong> <?php echo $_SERVER[$key]?></strong></p>

        <?php endforeach; ?>

</div>
</div>



<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Show Server
</button>
<div class="collapse" id="collapseExample">
    <div class="well">
        <?php
        echo "<pre>";
        print_r($_SERVER);
        echo "</pre>";
        ?>
    </div>
</div>


<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>

