<?php require_once('../../../includes/initialize.php'); ?>
<?php
$session->confirmation_protected_page();
if (!User::is_admin()) {
    redirect_to('/public/admin/index.php');
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($id === false || $id === null) {
    $session->message("A valid photo ID is required.");
    redirect_to('manage_photos.php');
}

$photo = Photo::find_by_id($id);
if (!$photo) {
    $session->message("The requested photo was not found.");
    redirect_to('manage_photos.php');
}

if (request_is_post() && isset($_POST["update"])) {
    if (!csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
    } else {
        $photo->title = trim((string)($_POST["title"] ?? ""));
        $photo->caption = trim((string)($_POST["caption"] ?? ""));
        $photo->alternate_text = trim((string)($_POST["alternate_text"] ?? ""));
        $photo->description = trim((string)($_POST["description"] ?? ""));

        if ($photo->update()) {
            $session->message("Photo " . h($photo->id) . " has been updated.");
            redirect_to('manage_photos.php');
        }

        $message = "Photo update failed.";
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
    echo output_message(h($message));
} ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Photo <small>Edit</small></h1>

                <form action="<?php echo h($_SERVER['PHP_SELF'] . "?id=" . u($id)); ?>" method="post">
                    <?php echo csrf_token_tag(); ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="<?php echo h($photo->title); ?>">
                        </div>

                        <div class="form-group">
                            <a href="#" class="thumbnail">
                                <img src="<?php echo h($photo->picture_path()); ?>" width="110" height="110" alt="<?php echo h($photo->alternate_text); ?>">
                            </a>
                        </div>

                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <input type="text" id="caption" name="caption" class="form-control" value="<?php echo h($photo->caption); ?>">
                        </div>
                        <div class="form-group">
                            <label for="alternate_text">Alternate Text</label>
                            <input type="text" id="alternate_text" name="alternate_text" class="form-control" value="<?php echo h($photo->alternate_text); ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?php echo h($photo->description); ?></textarea>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="photo-info-box">
                            <div class="info-box-header">
                                <h4>Save</h4>
                            </div>
                            <div class="inside">
                                <div class="box-inner">
                                    <p class="text">Photo Id: <span class="data photo_id_box"><?php echo h($photo->id); ?></span></p>
                                    <p class="text">Filename: <span class="data"><?php echo h($photo->filename); ?></span></p>
                                    <p class="text">File Type: <span class="data"><?php echo h($photo->type); ?></span></p>
                                    <p class="text">File Size: <span class="data"><?php echo h($photo->size); ?></span></p>
                                </div>
                                <div class="info-box-footer clearfix">
                                    <div class="info-box-update pull-right">
                                        <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="col-md-4">
                    <form method="post" action="delete_photo.php">
                        <?php echo csrf_token_tag(); ?>
                        <input type="hidden" name="id" value="<?php echo h($photo->id); ?>">
                        <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Delete this photo?');">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
