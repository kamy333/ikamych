<?php require_once('../includes/initialize.php'); ?>
<?php require_once('links_public_hub_view.php'); ?>
<?php LinksCategoryVisibility::handle_public_request(); ?>
<?php LinksQuickLink::handle_public_request(); ?>
<?php LinksPinnedColumn::handle_public_request('category'); ?>

<?php
$class_name = "Links";
$layout_context = "public";
$active_menu = "links";
$stylesheets = "";
$fluid_view = true;
$javascript = "";
$incl_message_error = true;
?>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php"); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php"); ?>

<?php
public_links_render_page([
    'kicker' => 'Blue Remini links',
    'title' => 'A sharper link library.',
    'copy' => 'Saved references, tools, and study links in a compact blue workspace built around the Blue Remini identity.',
    'messages' => $session->message() . (isset($valid) ? $valid->form_errors() : ''),
    'category_html' => Links::get_search_category(),
    'pin_controls' => LinksPinnedColumn::pin_controls('category'),
    'visibility_controls' => LinksCategoryVisibility::controls(),
    'section_title' => 'Saved categories',
    'columns' => 3,
    'sections' => LinksPinnedColumn::public_sections('category'),
    'static_title' => 'Pinned links',
    'static_sections' => public_links_quick_sections(),
]);
?>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php"); ?>
