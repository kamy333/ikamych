<?php require_once('../includes/initialize.php'); ?>
<?php require_once('links_hub_view.php'); ?>

<?php
$class_name = "Links";
$stylesheets = "";
$fluid_view = true;
$javascript = "";
$incl_message_error = true;
?>

<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC); ?>

<?php
links_hub_render_page([
    'kicker' => 'Sub category 1',
    'title' => 'Links by first subcategory',
    'copy' => 'A compact view for the first saved link grouping, with the same clean cards and category navigation.',
    'messages' => $session->message() . (isset($valid) ? $valid->form_errors() : ''),
    'category_html' => Links::get_search_category(true),
    'section_title' => 'Sub category 1 links',
    'sections' => [
        Links::output_links(null, true),
        Links::output_links('PHP'),
    ],
]);
?>

<?php include(FOOTER_PUBLIC); ?>
