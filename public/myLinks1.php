<?php require_once('../includes/initialize.php'); ?>
<?php require_once('links_public_hub_view.php'); ?>

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
    'kicker' => 'Blue Remini subcategory 1',
    'title' => 'First subcategory links.',
    'copy' => 'The first subcategory view, cleaned up with the same compact Blue Remini card system.',
    'messages' => $session->message() . (isset($valid) ? $valid->form_errors() : ''),
    'category_html' => Links::get_search_category(true),
    'section_title' => 'Sub category 1 links',
    'columns' => 2,
    'sections' => [
        Links::output_links(null, true),
        Links::output_links('PHP'),
    ],
]);
?>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php"); ?>
