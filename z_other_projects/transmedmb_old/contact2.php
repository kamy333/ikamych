<?php include_once('assets/contact/assets/config.php'); ?>
<?php include_once('assets/contact/assets/language.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>Mobilize</title>
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png"/>
    <script>
        if (window.screen.height == 568) { // iPhone 4"
            document.querySelector("meta[name=viewport]").content = "width=320.1";
        }
    </script>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- css -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css"/>
    <link rel="stylesheet" href="assets/css/style1.css">

    <!-- scripts -->
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script>
        $(document).bind("mobileinit", function () {
            $.mobile.ajaxEnabled = false;
        });
    </script>
    <script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
    <script src="assets/contact/js/contact.js"></script>
    <script src="assets/js/screen.js"></script>

</head>
<body>

<div data-role="page">

    <!-- header -->
    <div data-role="header" class="page-header" data-add-back-btn="true">
        <a href="index.php" data-icon="arrow-l" data-iconpos="notext" data-direction="reverse" data-rel="back">Back</a>
        <div class="logo"></div>
        <a href="index.php" data-icon="home" data-iconpos="notext" data-direction="reverse" rel="external"
           class="ui-btn-right">Home</a>
    </div>
    <!--/header -->

    <!-- main content -->
    <div data-role="content">

        <!-- banner & title -->
        <div class="bannerContainer">
            <img src="assets/images/headers/1.jpg" class="banner">
        </div>
        <h2 class="pageTitle"><span>Contact Us</span></h2>
        <div class="shadow1box"><img src="assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
        <!-- /banner & title -->

        <div class="content-padd">


            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum
                tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas
                semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien
                ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi.
                Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac
                dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus,
                tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi,
                tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>


            <div id="errors" class="hide ui-corner-all"></div>
            <p align="right">* <?php echo $language->field_required ?></p>
            <form name="form1" id="form1">
                <div data-role="fieldcontain">
                    <label for="name"><?php echo $language->name ?> *</label>
                    <input type="text" name="name" id="name"/>
                </div>
                <div data-role="fieldcontain">
                    <label for="lastname"><?php echo $language->lastname ?> *</label>
                    <input type="text" name="lastname" id="lastname"/>
                </div>
                <div data-role="fieldcontain">
                    <label for="email"><?php echo $language->email ?> *</label>
                    <input type="text" name="email" id="email"/>
                </div>
                <div data-role="fieldcontain">
                    <label for="phone"><?php echo $language->phone ?> *</label>
                    <input type="text" name="phone" id="phone"/>
                </div>
                <div data-role="fieldcontain">
                    <label for="subject"><?php echo $language->subject ?> *</label>
                    <input type="text" name="subject" id="subject"/>
                </div>
                <div data-role="fieldcontain">
                    <label for="message"><?php echo $language->message ?> *</label>
                    <textarea name="message" id="message" rows="8" cols="25"></textarea>
                </div>
                <?php if ($mailing_list) : ?>
                    <div data-role="fieldcontain">
                        <fieldset data-role="controlgroup" data-type="horizontal">
                            <legend><?php echo $language->join_mailing_list ?></legend>
                            <input type="radio" name="mailing_list" id="mailing_list-1" value="yes" checked="checked"/>
                            <label for="mailing_list-1"><?php echo $language->yes_please ?></label>
                            <input type="radio" name="mailing_list" id="mailing_list-0" value="no"/>
                            <label for="mailing_list-0"><?php echo $language->no_thanks ?></label>
                        </fieldset>
                    </div>
                <?php endif ?>
                <?php if ($how_you_found_us) : ?>
                    <div data-role="fieldcontain">
                        <label for="how_you_found_us"><?php echo $language->how_did_you_find_us ?></label>
                        <select id="how_you_found_us" name="how_you_found_us">
                            <?php if (is_array($how_you_found_us_options)) :
                                foreach ($how_you_found_us_options as $value) :
                                    echo '<option value="' . $value . '">' . $value . '</option>';
                                endforeach;
                            endif
                            ?>
                        </select>
                    </div>
                <?php endif ?>
                <div data-role="fieldcontain">
                    <label for="captcha"><?php echo $language->are_you_human ?> *</label>
                    <span id="are_you_human"></span><input type="text" name="captcha" id="captcha"/>
                </div>
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <label for="copy"><?php echo $language->send_yourself ?></label>
                        <input name="copy" type="checkbox" id="copy" value="y"/>
                    </fieldset>
                </div>
                <fieldset class="ui-grid-a">
                    <div class="ui-block-a">
                        <button type="reset"><?php echo $language->cancel ?></button>
                    </div>
                    <div class="ui-block-b">
                        <button type="submit" id="sbm"><?php echo $language->submit ?></button>
                    </div>
                </fieldset>
            </form>

        </div><!-- /content padd -->
    </div><!-- /content -->

    <!-- footer -->
    <?php include "layouts/footer.php" ?>
    <!-- /footer -->

</div>


<!-- after submit -->
<div data-role="page" id="done">

    <!-- header -->
    <div data-role="header" class="page-header" data-add-back-btn="true">
        <a data-icon="arrow-l" data-iconpos="notext" data-direction="reverse" data-rel="back" rel="external" href="#">Back</a>
        <div class="logo"></div>
        <a href="index.php" data-icon="home" data-iconpos="notext" data-direction="reverse" rel="external"
           class="ui-btn-right">Home</a>
    </div>
    <!--/header -->


    <div data-role="content">

        <!-- title -->
        <h2 class="pageTitle"><span>Success!</span></h2>
        <div class="shadow1box"><img src="assets/images/shadow1.png" class="shadow1" alt="shadow"></div>
        <!-- /title -->

        <div class="content-padd">

            <h4>Your email has been sent successfully!</h4>
            <p>We will be in touch soon.</p>

        </div><!-- /content padd -->
    </div><!-- /content -->

    <!-- footer -->
    <?php include "layouts/footer_fixed.php" ?>
    <!-- /footer -->


</div>
<!-- /after submit -->


</body>
</html>