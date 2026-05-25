<?php require_once('../../includes/initialize.php'); ?>
<?php
$session->confirmation_protected_page();
if (!User::is_admin()) {
    redirect_to('/public/admin/index.php');
}

$message = "";
$uploaded_file = "";
$upload_dir = PATH_UPLOAD;
$allowed_extensions = ['jpg', 'jpeg', 'png'];
$allowed_mime_types = ['image/jpeg', 'image/png'];
$max_file_size = 1048576;

function upload_safe_filename($filename)
{
    $filename = basename((string)$filename);
    $filename = preg_replace('/[^A-Za-z0-9._-]/', '_', $filename);
    $filename = trim((string)$filename, '._');

    return $filename !== '' ? $filename : null;
}

if (request_is_post() && isset($_POST['submit'])) {
    if (!request_is_same_domain() || !csrf_token_is_valid() || !csrf_token_is_recent()) {
        $message = "Sorry, request was not valid.";
    } else {
        $file = $_FILES['file_upload'] ?? null;

        if (!$file || !is_array($file) || ($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
            $upload_errors = [
                UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize.",
                UPLOAD_ERR_FORM_SIZE => "Larger than form MAX_FILE_SIZE.",
                UPLOAD_ERR_PARTIAL => "Partial upload.",
                UPLOAD_ERR_NO_FILE => "No file.",
                UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
                UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
                UPLOAD_ERR_EXTENSION => "File upload stopped by extension.",
            ];
            $message = $upload_errors[$file['error'] ?? UPLOAD_ERR_NO_FILE] ?? "Unable to upload file.";
        } elseif (($file['size'] ?? 0) > $max_file_size) {
            $message = "File is larger than the allowed size.";
        } else {
            $safe_filename = upload_safe_filename($file['name'] ?? '');
            $extension = strtolower(pathinfo((string)$safe_filename, PATHINFO_EXTENSION));
            $tmp_file = $file['tmp_name'] ?? '';
            $target_path = $safe_filename ? $upload_dir . DS . $safe_filename : '';

            $mime_type = '';
            if ($tmp_file && is_uploaded_file($tmp_file)) {
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $mime_type = (string)$finfo->file($tmp_file);
            }

            if (!$safe_filename || !in_array($extension, $allowed_extensions, true) || !in_array($mime_type, $allowed_mime_types, true)) {
                $message = "Only JPG and PNG images can be uploaded.";
                log_action('Upload file rejected', ($_SESSION['username'] ?? 'unknown') . " rejected upload " . (string)($file['name'] ?? ''));
            } elseif (file_exists($target_path)) {
                $message = "A file with that name already exists.";
            } elseif (!move_uploaded_file($tmp_file, $target_path)) {
                $message = "The file could not be moved to the upload folder.";
                log_action('Upload file error', ($_SESSION['username'] ?? 'unknown') . " failed upload " . $safe_filename);
            } else {
                $uploaded_file = $safe_filename;
                $message = "File uploaded successfully.";
                log_action('Upload file success', ($_SESSION['username'] ?? 'unknown') . " uploaded file " . $safe_filename);
            }
        }
    }
}
?>

<?php $layout_context = "admin"; ?>
<?php $active_menu = "myproject"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<?php echo isset($valid) ? $valid->form_errors() : "" ?>
<?php echo isset($valid) ? $valid->form_warnings() : "" ?>

<?php if ($message !== "") {
    echo output_message(h($message), $uploaded_file !== "" ? "ok" : "e");
} ?>

<div class="row">
    <div class="col-md-6 col-md-offset-2 col-lg-7 col-lg-offset-2">
        <div class="background_light_blue">
            <form action="<?php echo h($_SERVER['PHP_SELF']); ?>" class="form-inline" enctype="multipart/form-data" method="post">
                <?php echo csrf_token_tag(); ?>
                <fieldset id="login" title="Course">
                    <legend class="text-center" style="color: #0000ff">Upload file or image</legend>

                    <div class="form-group">
                        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo h($max_file_size); ?>">
                        <label class="sr-only" for="file_upload">File to upload</label>
                        <input type="file" class="form-control" id="file_upload" name="file_upload" accept=".jpg,.jpeg,.png,image/jpeg,image/png">
                        <p class="help-block">
                            <?php if ($uploaded_file !== "") { ?>
                                <a href="<?php echo h("../uploads/" . u($uploaded_file)); ?>"><?php echo h($uploaded_file); ?></a>
                            <?php } ?>
                        </p>
                    </div>

                    <button type="submit" name="submit" value="Upload" class="btn btn-primary">Upload</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php
if (is_dir($upload_dir)) {
    $dir_array = scandir($upload_dir);
    echo "<ul class='list-group'>";
    foreach ($dir_array as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        $path = $upload_dir . DS . $file;
        if (!is_file($path)) {
            continue;
        }

        $output = " &nbsp; &nbsp; last modified (content) - " . h(date('d/m/Y H:i', filemtime($path))) . " | ";
        $output .= "last changed (content or metadata) - " . h(date('d/m/Y H:i', filectime($path))) . " | ";
        $output .= "last accessed (any read/change) - " . h(date('d/m/Y H:i', fileatime($path))) . " | ";

        echo "<li class='list-group-item'><a href='" . h("../uploads/" . u($file)) . "'>" . h($file) . "</a>{$output}</li>";
    }
    echo "</ul>";
}
?>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
