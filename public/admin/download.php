<?php


require_once('../../includes/initialize.php');
$session->confirmation_protected_page();
if (User::is_caroline_only() || User::is_employee() || User::is_secretary() || User::is_visitor()) {
    redirect_to('index.php');
}

require_once LIB_PATH.DS.'src'.DS.'Foundationphp'.DS.'Psr4Autoloader.php';

$loader = new Foundationphp\Psr4Autoloader();
$loader->register();
$loader->addNamespace('Foundationphp', LIB_PATH.DS.'src'.DS.'Foundationphp');

use Foundationphp\Exporter\Csv;

//$class_name="Client";

if (isset($_POST['download'])) {

    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
    } else {

        $class_name = MyClasses::allowed_class_from_post();
        MyClasses::require_class_access($class_name);
        $table_name = $class_name::get_table_name();

//$database = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
//$database->set_charset('utf-8');

//if ($database->connect_error) {
//$error = $database->connect_error;
//} else {
//$sql = 'SELECT * FROM' . ' '.$table_name ;
////$sql.= " ".get_where_string($class_name);
//
//$result = $database->query($sql);
//    if ($database->error) {
//        $error = $database->error;
//    }
//
//}

        $sql = 'SELECT * FROM' . ' ' . $table_name;
        $result = $database->query($sql);




        try {
//        $options['suppress'] = 'transmission';
//        $options['delimiter'] = "\t";
            $options['suppress'] = 'hashed_password';
            new Csv($result, $table_name.'.csv', $options);
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
}

$all_class = array_values(array_intersect(['User','UserType','Client','Category','BlacklistIp','FailedLogin','Links','LinksCategory','Project','Category1','Category2','InvoiceActual','InvoiceSend','MyCigarette','MyExpense','MyExpensePerson','MyExpenseType','MyHouseExpense','MyHouseExpenseType','Chat','Notification','ToDoList','Currency'], MyClasses::$all_class));
?>

<?php $layout_context = "admin"; ?>
<?php $active_menu="download" ?>
<?php $stylesheets="" //custom_form  ?>
<?php $view_full_table = false; ?>
<?php $view_full_table==1? $fluid_view=true :$fluid_view=false; ?>
<?php $javascript="form_admin" ?>
<?php $sub_menu=false ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."header.php") ?>
<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."nav.php") ?>
<?php  echo isset($valid)? $valid->form_errors():"" ?>
<?php echo isset($message) ? output_message($message) : ''; ?>

<style>
    body {
        background: #edf5ff;
    }

    .download-admin-page {
        min-height: calc(100vh - 70px);
        padding: 24px 14px 92px;
        color: #081d3f;
        background:
            radial-gradient(circle at top left, rgba(58, 166, 255, 0.20), transparent 34%),
            linear-gradient(135deg, #f7fbff 0%, #edf6ff 44%, #e8f2ff 100%);
    }

    .download-admin-shell {
        width: min(1120px, 100%);
        margin: 0 auto;
    }

    .download-admin-hero {
        display: grid;
        grid-template-columns: minmax(0, 1fr) auto;
        gap: 24px;
        align-items: center;
        min-height: 190px;
        padding: 28px;
        border-radius: 8px;
        background: linear-gradient(135deg, #062b67 0%, #004f9f 44%, #00a6d6 100%);
        color: #ffffff;
        box-shadow: 0 24px 70px rgba(8, 29, 63, 0.22);
        overflow: hidden;
    }

    .download-admin-kicker {
        margin: 0 0 8px;
        color: #a8eeff;
        font-size: 12px;
        font-weight: 900;
        text-transform: uppercase;
    }

    .download-admin-hero h1 {
        margin: 0;
        font-size: 38px;
        line-height: 1.1;
        font-weight: 900;
    }

    .download-admin-hero p {
        max-width: 620px;
        margin: 10px 0 0;
        color: #dff7ff;
        font-size: 16px;
        line-height: 1.5;
    }

    .download-admin-logo {
        width: 128px;
        height: 128px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.20);
        background: rgba(255, 255, 255, 0.10);
    }

    .download-admin-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 300px;
        gap: 18px;
        margin-top: 18px;
    }

    .download-admin-panel,
    .download-admin-side {
        border: 1px solid #dbeafe;
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.94);
        box-shadow: 0 18px 46px rgba(8, 29, 63, 0.10);
    }

    .download-admin-panel {
        padding: 22px;
    }

    .download-admin-panel__header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 16px;
    }

    .download-admin-panel h2,
    .download-admin-side h2 {
        margin: 0;
        color: #081d3f;
        font-size: 18px;
        font-weight: 900;
    }

    .download-admin-count {
        padding: 6px 10px;
        border-radius: 999px;
        background: #e8f7ff;
        color: #006aa6;
        font-size: 12px;
        font-weight: 900;
    }

    .download-class-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 10px;
        margin: 0;
    }

    .download-class-option {
        position: relative;
    }

    .download-class-option input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .download-class-choice {
        display: flex;
        min-height: 68px;
        align-items: center;
        gap: 11px;
        padding: 12px;
        border: 1px solid #d3e6f8;
        border-radius: 8px;
        background: #ffffff;
        cursor: pointer;
        transition: border-color 160ms ease, box-shadow 160ms ease, transform 160ms ease, background 160ms ease;
    }

    .download-class-choice:hover {
        border-color: #8bd4f4;
        box-shadow: 0 10px 26px rgba(8, 29, 63, 0.09);
        transform: translateY(-1px);
    }

    .download-class-option input:checked + .download-class-choice {
        border-color: #00a6d6;
        background: linear-gradient(135deg, #f4fbff 0%, #e7f7ff 100%);
        box-shadow: inset 4px 0 0 #008bd2, 0 12px 28px rgba(0, 139, 210, 0.15);
    }

    .download-class-icon {
        display: inline-flex;
        width: 36px;
        height: 36px;
        flex: 0 0 36px;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background: #e8f7ff;
        color: #0077b6;
        font-size: 16px;
    }

    .download-class-name {
        display: block;
        color: #081d3f;
        font-size: 14px;
        font-weight: 900;
        line-height: 1.2;
        overflow-wrap: anywhere;
    }

    .download-admin-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 20px;
    }

    .download-admin-btn {
        display: inline-flex;
        min-height: 46px;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 0 18px;
        border: 0;
        border-radius: 8px;
        font-weight: 900;
        text-decoration: none;
    }

    .download-admin-btn--primary {
        background: linear-gradient(135deg, #0077e6 0%, #00a6d6 100%);
        color: #ffffff;
        box-shadow: 0 14px 30px rgba(0, 119, 230, 0.24);
    }

    .download-admin-btn--secondary {
        border: 1px solid #c8d6e6;
        background: #e8eef5;
        color: #2f4358;
    }

    .download-admin-btn:hover,
    .download-admin-btn:focus {
        filter: brightness(0.97);
        text-decoration: none;
    }

    .download-admin-side {
        padding: 18px;
    }

    .download-admin-side-list {
        display: grid;
        gap: 12px;
        margin-top: 14px;
    }

    .download-admin-note {
        display: grid;
        grid-template-columns: 34px minmax(0, 1fr);
        gap: 10px;
        align-items: start;
        padding: 12px;
        border-radius: 8px;
        background: #f5faff;
        color: #2f4358;
    }

    .download-admin-note i {
        display: inline-flex;
        width: 34px;
        height: 34px;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background: #e2f5ff;
        color: #0077b6;
    }

    .download-admin-note strong {
        display: block;
        margin-bottom: 2px;
        color: #081d3f;
        font-weight: 900;
    }

    @media (max-width: 980px) {
        .download-admin-grid,
        .download-admin-hero {
            grid-template-columns: 1fr;
        }

        .download-admin-logo {
            display: none;
        }

        .download-class-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 640px) {
        .download-admin-page {
            padding: 0 0 84px;
        }

        .download-admin-hero,
        .download-admin-panel,
        .download-admin-side {
            border-right: 0;
            border-left: 0;
            border-radius: 0;
            box-shadow: none;
        }

        .download-admin-hero {
            padding: 24px 16px;
        }

        .download-admin-hero h1 {
            font-size: 30px;
        }

        .download-class-grid,
        .download-admin-actions {
            grid-template-columns: 1fr;
            display: grid;
        }
    }
</style>

<main class="download-admin-page">
    <div class="download-admin-shell">
        <section class="download-admin-hero">
            <div>
                <p class="download-admin-kicker">Admin export</p>
                <h1>Download CSV</h1>
                <p>Choose a data table and export a clean CSV file for review, backup, or spreadsheet work.</p>
            </div>
            <img class="download-admin-logo" src="/public/img/kamy_gemini_blue.png" alt="Kamy Blue Remini">
        </section>

        <div class="download-admin-grid">
            <section class="download-admin-panel">
                <div class="download-admin-panel__header">
                    <h2>Choose a table</h2>
                    <span class="download-admin-count"><?php echo h((string)count($all_class)); ?> available</span>
                </div>

                <form name="form_client" method="post" action="<?php echo h($_SERVER["PHP_SELF"]);?>">
                    <?php echo csrf_token_tag(); ?>

                    <div class="download-class-grid">
                        <?php foreach ($all_class as $index => $cl) { ?>
                            <div class="download-class-option">
                                <input id="download-class-<?php echo h((string)$index); ?>" type="radio" name="class_name" value="<?php echo h($cl); ?>" <?php echo $index === 0 ? 'checked' : ''; ?>>
                                <label class="download-class-choice" for="download-class-<?php echo h((string)$index); ?>">
                                    <span class="download-class-icon"><i class="fa fa-database" aria-hidden="true"></i></span>
                                    <span class="download-class-name"><?php echo h($cl); ?></span>
                                </label>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="download-admin-actions">
                        <a href="index.php" class="download-admin-btn download-admin-btn--secondary">
                            <i class="fa fa-times" aria-hidden="true"></i> Cancel
                        </a>
                        <button type="submit" name="download" class="download-admin-btn download-admin-btn--primary">
                            <i class="fa fa-download" aria-hidden="true"></i> Download CSV
                        </button>
                    </div>
                </form>
            </section>

            <aside class="download-admin-side">
                <h2>Export notes</h2>
                <div class="download-admin-side-list">
                    <div class="download-admin-note">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        <div><strong>CSV format</strong> Opens easily in Excel, Numbers, or Google Sheets.</div>
                    </div>
                    <div class="download-admin-note">
                        <i class="fa fa-shield" aria-hidden="true"></i>
                        <div><strong>Admin only</strong> Access stays behind the existing permission checks.</div>
                    </div>
                    <div class="download-admin-note">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <div><strong>Protected fields</strong> Password hashes stay suppressed by the current exporter.</div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</main>


<?php include(SITE_ROOT.DS.'public'.DS.'layouts'.DS."footer.php") ?>



