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
    'kicker' => 'Blue Remini links',
    'title' => 'A sharper link library.',
    'copy' => 'Saved references, tools, and study links in a compact blue workspace built around the Blue Remini identity.',
    'messages' => $session->message() . (isset($valid) ? $valid->form_errors() : ''),
    'category_html' => Links::get_search_category(),
    'section_title' => 'Saved categories',
    'columns' => 3,
    'sections' => [
        Links::output_links(),
        Links::output_links('C#'),
        Links::output_links('C#_2'),
        Links::output_links('C#_3'),
        Links::output_links('Xamarin'),
        Links::output_links('SQLServer'),
    ],
    'static_title' => 'Pinned links',
    'static_sections' => public_links_quick_sections(),
]);
?>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php"); ?>
