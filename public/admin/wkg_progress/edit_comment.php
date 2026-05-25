<?php require_once('../../../includes/initialize.php'); ?>
<?php
$session->confirmation_protected_page();
if (!User::is_admin()) {
    redirect_to('/public/admin/index.php');
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($id === false || $id === null) {
    $session->message("A valid comment ID is required.");
    redirect_to('manage_comments.php');
}

$comment = Comment::find_by_id($id);
if (!$comment) {
    $session->message("The requested comment was not found.");
    redirect_to('manage_comments.php');
}

if (request_is_post() && isset($_POST['update'])) {
    if (!request_is_same_domain() || !csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
    } else {
        $comment->author = trim((string)($_POST['author'] ?? ''));
        $comment->body = trim((string)($_POST['body'] ?? ''));
        $comment->modified_date = date("Y-m-d H:i:s");

        if ($comment->author === '' || $comment->body === '') {
            $message = "Author and comment are required.";
        } elseif ($comment->update()) {
            $session->message("Comment " . h($comment->id) . " has been updated.");
            redirect_to('manage_comments.php');
        } else {
            $message = "Comment update failed or nothing changed.";
        }
    }
}
?>

<?php $layout_context = "admin"; ?>
<?php $active_menu = "admin"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = false; ?>
<?php $javascript = "form_admin"; ?>
<?php $sub_menu = false; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>
<?php if (!empty($message)) {
    echo output_message(h($message), 'e');
} ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Comment <small>Edit</small></h1>

                <form action="<?php echo h($_SERVER['PHP_SELF'] . '?id=' . u($id)); ?>" method="post" class="form-horizontal">
                    <?php echo csrf_token_tag(); ?>

                    <div class="form-group">
                        <label for="author" class="col-sm-2 control-label">Author</label>
                        <div class="col-sm-6">
                            <input type="text" id="author" name="author" class="form-control" value="<?php echo h($comment->author); ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="body" class="col-sm-2 control-label">Comment</label>
                        <div class="col-sm-6">
                            <textarea id="body" name="body" class="form-control" rows="6" required><?php echo h($comment->body); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <a href="manage_comments.php" class="btn btn-default">Cancel</a>
                            <button type="submit" name="update" value="1" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
