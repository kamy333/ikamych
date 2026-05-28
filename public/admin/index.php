<?php
require_once('../../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php
if (User::is_visitor()) {
    redirect_to('../../Inspinia/index.php');
}
?>

<?php
$show_testing = false;
$php_self = $_SERVER['PHP_SELF'];
if (isset($_GET['test']) && $_GET['test'] == 1) {
    $show_testing = true;
    $view = "<a class='admin-dashboard__tool-link' href='" . h($php_self) . "' title='Hide admin tools' aria-label='Hide admin tools'><i class='fa fa-eye-slash' aria-hidden='true'></i><span class='sr-only'>Hide admin tools</span></a>";
} else {
    $show_testing = false;
    $view = "<a class='admin-dashboard__tool-link' href='" . h($php_self) . "?test=1' title='Show admin tools' aria-label='Show admin tools'><i class='fa fa-sliders' aria-hidden='true'></i><span class='sr-only'>Show admin tools</span></a>";
}
?>
<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin" ?>
<?php $stylesheets = "" //custom_form  ?>
<?php $sub_menu = true; ?>
<?php $javascript = "form_admin" ?>
<?php $fluid_view = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<style>
    body {
        padding-top: 56px;
        background: #eef2f7;
    }

    #container-view {
        padding-right: 0;
        padding-left: 0;
    }

    .admin-dashboard {
        min-height: calc(100vh - 56px);
        padding: 18px 20px 36px;
        color: #111827;
        background:
            linear-gradient(135deg, rgba(248, 250, 252, 0.96), rgba(226, 232, 240, 0.92)),
            url("<?php echo h(SITE_URL); ?>/public/css/patterns/shattered.png") center center / auto repeat;
    }

    .admin-dashboard__shell {
        width: min(1120px, 100%);
        margin: 0 auto;
    }

    .admin-dashboard__header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 18px;
    }

    .admin-dashboard__eyebrow {
        margin: 0 0 4px;
        color: #0077b6;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .admin-dashboard__title {
        margin: 0;
        color: #06356f;
        font-size: 32px;
        line-height: 1.12;
        font-weight: 800;
    }

    .admin-dashboard__subtitle {
        margin: 6px 0 0;
        color: #2e6f9f;
        font-size: 15px;
    }

    .admin-dashboard__tools {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-end;
        gap: 10px;
    }

    .admin-dashboard__tool-link,
    .admin-dashboard__public-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        min-height: 40px;
        padding: 9px 13px;
        border: 1px solid #cbd5e1;
        background: rgba(255, 255, 255, 0.86);
        color: #334155;
        font-weight: 700;
        text-decoration: none;
    }

    .admin-dashboard__tool-link {
        justify-content: center;
        min-width: 42px;
        padding-right: 12px;
        padding-left: 12px;
        font-size: 16px;
    }

    .admin-dashboard__tool-link:hover,
    .admin-dashboard__tool-link:focus,
    .admin-dashboard__public-link:hover,
    .admin-dashboard__public-link:focus {
        border-color: #0f766e;
        color: #0f766e;
        text-decoration: none;
    }

    .admin-dashboard__grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(min(100%, 420px), 1fr));
        gap: 18px;
        align-items: start;
        margin-bottom: 18px;
    }

    .admin-card {
        background: rgba(255, 255, 255, 0.94);
        border: 1px solid #e2e8f0;
        box-shadow: 0 18px 42px rgba(15, 23, 42, 0.08);
    }

    .admin-card--memorial {
        overflow: hidden;
    }

    .admin-card__body {
        padding: 22px;
    }

    .admin-card__label {
        margin: 0 0 8px;
        color: #0077b6;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .admin-card__title {
        margin: 0;
        color: #06356f;
        font-size: 24px;
        line-height: 1.2;
        font-weight: 800;
    }

    .admin-card__title a {
        color: inherit;
        text-decoration: none;
    }

    .admin-card__title a:hover,
    .admin-card__title a:focus {
        color: #008bd2;
        text-decoration: none;
    }

    .admin-card__image-link {
        display: block;
        height: 430px;
        overflow: hidden;
        background: #111827;
    }

    .admin-card__image-link img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
        opacity: 0.92;
        transition: transform 200ms ease, opacity 200ms ease;
    }

    .admin-card__image-link:hover img,
    .admin-card__image-link:focus img {
        transform: scale(1.035);
        opacity: 1;
    }

    .admin-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .admin-action {
        display: flex;
        align-items: center;
        gap: 12px;
        min-height: 74px;
        padding: 16px;
        border: 1px solid #dbe3ee;
        background: #ffffff;
        color: #111827;
        text-align: left;
        text-decoration: none;
        box-shadow: 0 10px 26px rgba(15, 23, 42, 0.06);
    }

    .admin-action:hover,
    .admin-action:focus {
        border-color: #0f766e;
        color: #0f766e;
        text-decoration: none;
        transform: translateY(-1px);
    }

    .admin-action__icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 40px;
        width: 40px;
        height: 40px;
        background: #e0f2fe;
        color: #0369a1;
        font-size: 18px;
    }

    .admin-action--warning .admin-action__icon {
        background: #fef3c7;
        color: #b45309;
    }

    .admin-action--danger .admin-action__icon {
        background: #fee2e2;
        color: #b91c1c;
    }

    .admin-action--success .admin-action__icon {
        background: #dcfce7;
        color: #15803d;
    }

    .admin-action__title {
        display: block;
        font-size: 15px;
        font-weight: 800;
        line-height: 1.2;
    }

    .admin-action__meta {
        display: block;
        margin-top: 3px;
        color: #64748b;
        font-size: 12px;
        line-height: 1.25;
    }

    .admin-tools-panel {
        margin-top: 18px;
        padding: 22px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        box-shadow: 0 18px 42px rgba(15, 23, 42, 0.08);
        overflow-x: auto;
    }

    @media (max-width: 940px) {
        .admin-dashboard__grid,
        .admin-actions {
            grid-template-columns: 1fr;
        }

        .admin-dashboard__header {
            align-items: flex-start;
            flex-direction: column;
        }

        .admin-dashboard__tools {
            justify-content: flex-start;
        }
    }

    @media (max-width: 640px) {
        .admin-dashboard {
            padding: 12px 12px 28px;
        }

        .admin-dashboard__title {
            font-size: 26px;
        }

        .admin-card__body {
            padding: 18px;
        }

        .admin-card__image-link {
            height: 280px;
        }

        .admin-action {
            min-height: 64px;
            padding: 13px;
        }
    }
</style>

<?php
$actions = [
    [
        'href' => SITE_URL . '/public/calendar.php',
        'icon' => 'fa-calendar',
        'title' => 'Calendar',
        'meta' => 'Open the public planning view',
        'tone' => '',
    ],
    [
        'href' => SITE_URL . '/public/admin/notes.php',
        'icon' => 'fa-edit',
        'title' => 'Notes',
        'meta' => 'Review and update notes',
        'tone' => 'warning',
    ],
    [
        'href' => SITE_URL . '/public/admin/crud/ajax/manage_ajax.php?class_name=Calendar',
        'icon' => 'fa-calendar-o',
        'title' => 'Manage calendar',
        'meta' => 'Edit existing appointments',
        'tone' => '',
    ],
    [
        'href' => SITE_URL . '/public/admin/crud/ajax/new_ajax.php?class_name=Calendar',
        'icon' => 'fa-plus-square',
        'title' => 'New calendar date',
        'meta' => 'Create a new appointment',
        'tone' => 'danger',
        'modal_target' => '#ikamy-calendar-modal',
    ],
    [
        'href' => SITE_URL . '/public/admin/manage_user.php',
        'icon' => 'fa-user',
        'title' => 'Manage users',
        'meta' => 'Accounts and access',
        'tone' => 'success',
    ],
    [
        'href' => SITE_URL . '/public/admin/crud/ajax/manage_ajax.php?class_name=MyExpense',
        'icon' => 'fa-dollar',
        'title' => 'My expenses',
        'meta' => 'Manage personal expenses',
        'tone' => '',
    ],
    [
        'href' => SITE_URL . '/public/admin/crud/ajax/new_ajax.php?class_name=MyExpense',
        'icon' => 'fa-money',
        'title' => 'New expense',
        'meta' => 'Add a personal expense',
        'tone' => 'danger',
        'modal_target' => '#ikamy-expense-modal',
    ],
    [
        'href' => SITE_URL . '/public/admin/crud/ajax/manage_ajax.php?class_name=MyExpenseMumPost',
        'icon' => 'fa-dollar',
        'title' => 'Mum posts',
        'meta' => 'Manage mum expense posts',
        'tone' => '',
    ],
    [
        'href' => SITE_URL . '/public/admin/crud/ajax/new_ajax.php?class_name=MyExpenseMumPost',
        'icon' => 'fa-plus-square',
        'title' => 'New mum post',
        'meta' => 'Add a mum expense post',
        'tone' => 'danger',
    ],
];
?>

<main class="admin-dashboard">
    <div class="admin-dashboard__shell">
        <header class="admin-dashboard__header">
            <div>
                <p class="admin-dashboard__eyebrow">Admin home</p>
                <h1 class="admin-dashboard__title">What do you want to manage?</h1>
                <p class="admin-dashboard__subtitle">Fast access to the pages you use most.</p>
            </div>
            <nav class="admin-dashboard__tools" aria-label="Admin dashboard tools">
                <a class="admin-dashboard__public-link" href="../index.php" title="Public site" aria-label="Public site"><i class="fa fa-arrow-left" aria-hidden="true"></i><span class="sr-only">Public site</span></a>
                <?php if (User::is_kamy()) { ?>
                    <?php echo $view; ?>
                <?php } ?>
            </nav>
        </header>

        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>

        <section class="admin-dashboard__grid">
            <article class="admin-card admin-card--memorial">
                <a class="admin-card__image-link" href="../../Inspinia/papa/francais_discours.php" aria-label="Open Hommage à mon Père">
                    <img src="../../Inspinia/papa/assets/img/photos/WhatsApp Image 2025-02-25 at 06.11.22_2c7722bd.jpg" alt="Papa">
                </a>
                <div class="admin-card__body">
                    <p class="admin-card__label">Memory</p>
                    <h2 class="admin-card__title">
                        <a href="../../Inspinia/papa/francais_discours.php">Hommage à mon Père<br>Shmouel ben Galine-Acher 1932-2025</a>
                    </h2>
                </div>
            </article>

            <?php if (User::is_kamy()) { ?>
                <section class="admin-card">
                    <div class="admin-card__body">
                        <p class="admin-card__label">Shortcuts</p>
                        <div class="admin-actions">
                            <?php foreach ($actions as $action) { ?>
                                <?php $modal_target = $action['modal_target'] ?? ''; ?>
                                <a class="admin-action <?php echo $action['tone'] !== '' ? 'admin-action--' . h($action['tone']) : ''; ?>"
                                   href="<?php echo h($action['href']); ?>"<?php echo $modal_target !== '' ? ' data-ikamy-modal-target="' . h($modal_target) . '"' : ''; ?>>
                                    <span class="admin-action__icon"><i class="fa <?php echo h($action['icon']); ?>" aria-hidden="true"></i></span>
                                    <span>
                                        <span class="admin-action__title"><?php echo h($action['title']); ?></span>
                                        <span class="admin-action__meta"><?php echo h($action['meta']); ?></span>
                                    </span>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            <?php } ?>
        </section>

        <?php if (User::is_kamy() && $show_testing) { ?>
            <section class="admin-tools-panel">
                <?php
                echo DatabaseObject::form_structure();

                if (isset($_GET['class_name'])) {
                    echo '<br><br>';
                    $class_name = MyClasses::allowed_class_from_request();
                    $countrecords = $class_name::count_all();
                    echo "Number of records in db: <b>$countrecords</b> ";
                    echo "<br><br>";
                    echo $class_name::class_structure();
                    echo $class_name::find_column_name();
                }
                ?>
            </section>
        <?php } ?>
    </div>
</main>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>

