<?php require_once('../../../includes/initialize.php'); ?>

<?php $class_name = "Links"; ?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "Kamy"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>


<h1 class="text-center">Finance Course <a href="/public/_f/article/music.php">or listen Music</a></h1>


<div class="row">
    <?php if (isset($session)) {
        echo $session->message();
    } ?>
    <?php echo isset($valid) ? $valid->form_errors() : "" ?>
</div>


<div class="row">


    <div class="col-lg-6   col-lg-offset-3">


       <p><a href="https://www.udemy.com/course/the-complete-cryptocurrency-course-more-than-5-courses-in-1/?couponCode=_INVEST_IN_CRYPTOS"> 1.	The Complete Cryptocurrency Course: More than 5 Courses in 1 (Learn everything you need to know about cryptocurrency and blockchain, including investing, mining and much more!):</a></p>
        <hr>
        <p>        <a href="https://www.udemy.com/course/the-complete-personal-finance-course-save-protect-make-more/?couponCode=_SAVE_AND_MAKE_MORE"> 2.	The Complete Personal Finance Course: Save,Protect, Make More (3 Courses in 1! Save,Protect & Make More! By an Award Winning MBA Professor, VC & Best Selling Online Business Teacher): </a></p>
        <hr>

        <p><a href="https://www.udemy.com/course/the-complete-financial-analyst-training-and-investing-course/?couponCode=_MAKE_IT_ON_WALL_ST"> 3.	The Complete Financial Analyst Training & Investing Course (Succeed as a Financial Analyst &Investor by Award Winning MBA Prof who worked @Goldman, in Hedge Funds & Venture Capital): </a></p>
        <hr>

        <p><a href="https://www.udemy.com/course/introduction-to-accounting-finance-modeling-valuation-by-chris-haroun/?couponCode=_EASY_LEARN_FINANCE">4.	Introduction to Finance, Accounting, Modeling and Valuation (Learn Finance & Accounting from Scratch by an Award Winning MBA Professor, Ivy Grad, worked @ Goldman & VC): </a></p>
        <hr>

<p><a href="https://www.udemy.com/course/hedge-fund-mutual-fund-careers-the-complete-guide-how-to-pick-stocks/?couponCode=_INVEST_LIKE_A_PRO">5.	Invest in Stocks Like a Pro Investor by a Pro Investor! (Succeed as a Stock Picker or Financial Analyst by an Award Winning MBA Prof., worked @ Goldman, Hedge Funds & in VC):</a></p>
        <hr>

        <p><a href="https://www.udemy.com/course/introduction-to-accounting-finance-modeling-valuation-by-chris-haroun/?utm_source=email-sendgrid&utm_term=14942868&utm_medium=1787702&utm_content=promo&utm_campaign=2021-02-01&couponCode=_EASY_LEARN_FINANCE">6.      introduction-to-accounting-finance-modeling-valuation</a></p>
        
        <p><a href="https://www.udemy.com/course/the-complete-business-plan-course/?utm_campaign=2021-02-01&utm_source=email-sendgrid&utm_term=14942868&utm_medium=1787702&utm_content=promo">7.the-complete-business-plan-course</a></p>







    </div>
    </div>


<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>


