<?php
require_once('../../../includes/initialize.php');

$session->confirmation_protected_page();
if (!User::is_admin()) {
    redirect_to('/public/admin/index.php');
}

if (!request_is_post() || !request_is_same_domain() || !csrf_token_is_valid() || !csrf_token_is_recent()) {
    $session->message("Sorry, request was not valid.");
    redirect_to('manage_Comment.php');
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($id === false || $id === null) {
    $session->message("A valid comment ID is required.");
    redirect_to('manage_Comment.php');
}

$comment = Comment::find_by_id($id);
if (!$comment) {
    $session->message("The requested comment was not found.");
    redirect_to('manage_Comment.php');
}

$comment->delete();
$session->message("Comment " . h($id) . " has been deleted.");
redirect_to('manage_Comment.php');
