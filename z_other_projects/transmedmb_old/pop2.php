<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>Hello!</title>

    <!-- css -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css"/>
    <link rel="stylesheet" href="assets/css/style1.css">

    <!-- scripts -->
    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
    <script src="assets/js/screen.js"></script>

</head>

<body>

<div data-role="page" id="slide-modal">

    <div data-role="content">
        <div class="content-padd">

            <h3 style="text-align:center">Contact Us!</h3>
            <a href="mailto:joe@example.com?cc=sally@example.com&bcc=eddy@example.com&subject=Important%20Message&body=You%20should%20checkout%20the%20Mobilize%20mobile%20theme%20on%20Theme%20Forest!"
               data-role="button" data-rel="dialog" data-theme="c">Email Us</a>

            <a href="contact.php" data-role="button" data-theme="c" data-ajax="false">Mobile Contact Form</a>

            <a href="tel:18005551234" data-role="button" data-theme="c">Call 1.800.555.1234</a>
            <p style="text-align:center">123 Fake Street<br/>Boston, MA 01650</p>

            <a href="http://bit.ly/yx2mXZ" data-role="button" data-theme="c">Get Directions</a>

            <a href="index.php" data-role="button" data-rel="back" data-theme="b">Close</a>

        </div><!-- /content padd -->
    </div><!-- /content -->


</div>

</body>
</html>

