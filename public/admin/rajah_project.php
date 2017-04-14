<?php require_once('../../includes/initialize.php'); ?>
<?php  $session->confirmation_protected_page(); ?>

<?php if(User::is_employee() || User::is_visitor()){ redirect_to('index.php');}?>

<?php $layout_context = "admin"; ?>
<?php $active_menu="myproject"; ?>
<?php $stylesheets="";  ?>
<?php $fluid_view=true; ?>
<?php $javascript=""; ?>
<?php $incl_message_error=true; ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>

<h4 class="text-center"><mark><a href="<?php echo $_SERVER["PHP_SELF"] ?>">Rajah production company </a> </mark></h4>


<div class="row">
<div class="col-md-3">
<h5>Client</h5>
    <ul>
        <li>id</li>
        <li>pseudo</li>
        <li>company_name</li>
        <li>first_name</li>
        <li>last_name</li>
        <li>address</li>
        <li>zip</li>
        <li>city</li>
        <li>country</li>
        <li>phone</li>
        <li>mobile</li>
        <li>email</li>
        <li>website</li>
        <li>comment</li>
    </ul>
</div>

<div class="col-md-3">
<h5>Project</h5>
    <ul>
        <li>id</li>
        <li>project_code str</li>
        <li>project_name</li>
        <li>client_id int </li>
        <li>start_date</li>
        <li>end_date</li>
        <li>currency var(3)</li>

    </ul>
</div>

<!--</div>-->
<!---->
<!--<div class="row">-->
    <div class="col-md-3">
        <h5>Invoice Estimate</h5>
        <ul>
            <li>id</li>
            <li>Estimate_no</li>
            <li>project_id int</li>
            <li>category str</li>
            <li>start_date</li>
            <li>end_date</li>
            <li>quantity int</li>
            <li>js price_client</li>
            <li>js price_co</li>
            <li>default price bol</li>
            <li>gross_amount</li>
            <li>vat bol</li>
            <li>margin</li>
            <li>upload</li>
            <li>comment</li>
            <li>input_date</li>
            <li>user</li>

        </ul>
    </div>

    <div class="col-md-3">
        <h5>Invoice Actual</h5>
        <ul>
            <li>id</li>
            <li>project_id int</li>
            <li>category str</li>
            <li>start_date</li>
            <li>end_date</li>
            <li>quantity int</li>
            <li>js price_client</li>
            <li>js price_co</li>
            <li>default price bol</li>
            <li>gross_amount</li>
            <li>vat bol</li>
            <li>margin</li>
            <li>upload</li>
            <li>comment</li>
            <li>input_date</li>
            <li>user</li>

        </ul>
    </div>


</div>



<div class="row">
    <div class="col-md-2">
<h5>Category_1</h5>
<ul>
    <li>id</li>
    <li>name</li>
    <li>code</li>
    <li>category_1_id</li>
    <li>category_2_id</li>
    <li>price_client</li>
    <li>price_company</li>


    <li></li>
</ul>
</div>

    <div class="col-md-2">
<h5>Category_2</h5>
<ul>
    <li>id</li>
    <li>name</li>
    <li>code</li>

</ul>

</div>
    <div class="col-md-2">
    <h5>Category_3</h5>
<ul>
    <li>id</li>
    <li>name</li>
    <li>code</li>
</ul>
</div>
    </div>


<div class="row">
<div class="col-md-2">
<h5>Invoice</h5>
<ul>
    <li>id</li>
    <li>client_id</li>
    <li>project_id</li>
    <li>gross_amount</li>
    <li>vat</li>
    <li>total_amount</li>
    <li>currency</li>
    <li>amount_ccy</li>
</ul>
</div>

<div class="col-md-2">
<h5>Cash Received</h5>
<li>id</li>
<li>client_id</li>
<li>project_id</li>
<li>amount_chf</li>
<li>amount_ccy</li>
</div>
</div>

<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>
