<?php
require_once('../../../includes/initialize.php');

$session->confirmation_protected_page();
if (!User::is_admin()) {
    redirect_to('/public/admin/index.php');
}

if (!request_is_post() || !request_is_same_domain() || !csrf_token_is_valid() || !csrf_token_is_recent()) {
    $session->message("Sorry, request was not valid.");
    redirect_to('manage_photos.php');
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($id === false || $id === null) {
    $session->message("A valid photo ID is required.");
    redirect_to('manage_photos.php');
}

$photo = Photo::find_by_id($id);
if (!$photo) {
    $session->message("The requested photo was not found.");
    redirect_to('manage_photos.php');
}

if ($photo->delete_picture()) {
    $session->message("Photo " . h($id) . " has been deleted.");
} else {
    $session->message("Photo " . h($id) . " could not be deleted.");
}

redirect_to('manage_photos.php');
