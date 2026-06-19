<?php require_once('../includes/initialize.php'); ?>
<?php $session->confirmation_protected_page(); ?>
<?php
if (!User::is_kamy() && !User::is_admin()) {
    redirect_to('/public/index.php');
}

$user_id = (int)$session->user_id;
$page_url = '/public/saved_links.php';
$saved_links_return_to = current_request_uri();
$saved_links_csrf_id = 'saved_links';

if (request_is_post()) {
    if (!request_is_same_domain() || !csrf_token_is_valid($saved_links_csrf_id) || !csrf_token_is_recent($saved_links_csrf_id)) {
        $session->message('Security token expired. Please try again.');
        redirect_to($page_url);
    }

    $action = $_POST['action'] ?? '';

    try {
        if ($action === 'generate_token') {
            $generated = UserApiToken::generateForUser($user_id, $_POST['token_name'] ?? 'Chrome URL Saver');
            $_SESSION['saved_links_new_token'] = $generated['token'];
            $session->message('New Chrome extension token created.');
            $session->ok(true);
            redirect_to($page_url);
        }

        if ($action === 'revoke_token') {
            $id = saved_links_post_id('id');
            if (UserApiToken::revokeForUser($user_id, $id)) {
                $session->message('Token revoked.');
                $session->ok(true);
            } else {
                $session->message('Token could not be revoked.');
            }
            redirect_to($page_url);
        }

        if ($action === 'update_link') {
            $id = saved_links_post_id('id');
            if (!SavedLink::findForUserById($user_id, $id)) {
                throw new InvalidArgumentException('Saved link was not found.');
            }

            SavedLink::updateForUser($user_id, $id, [
                'title' => $_POST['title'] ?? '',
                'note' => $_POST['note'] ?? '',
                'status' => $_POST['status'] ?? 'inbox',
            ]);
            $session->message('Saved link updated.');
            $session->ok(true);
            redirect_to($page_url);
        }

        if ($action === 'set_status') {
            $id = saved_links_post_id('id');
            SavedLink::setStatusForUser($user_id, $id, $_POST['status'] ?? 'inbox');
            $session->message('Saved link status updated.');
            $session->ok(true);
            redirect_to($page_url);
        }

        if ($action === 'delete_link') {
            $id = saved_links_post_id('id');
            if (SavedLink::deleteForUser($user_id, $id)) {
                $session->message('Saved link deleted.');
                $session->ok(true);
            } else {
                $session->message('Saved link could not be deleted.');
            }
            redirect_to($page_url);
        }

        if ($action === 'import_to_links') {
            $id = saved_links_post_id('id');
            $saved_link = SavedLink::findForUserById($user_id, $id);
            if (!$saved_link) {
                throw new InvalidArgumentException('Saved link was not found.');
            }

            $links_category = saved_links_resolve_links_category(
                (int)($_POST['links_category_id'] ?? 0),
                $_POST['new_links_category'] ?? ''
            );
            $rank = filter_input(INPUT_POST, 'rank', FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]);
            if ($rank === false || $rank === null) {
                $rank = 10;
            }

            $new_link_id = saved_links_import_to_links($user_id, $saved_link, [
                'category_id' => $links_category['id'],
                'category' => $links_category['category'],
                'sub_category_1' => $_POST['sub_category_1'] ?? '',
                'sub_category_2' => $_POST['sub_category_2'] ?? '',
                'rank' => $rank,
            ]);

            if (!empty($_POST['archive_saved_link'])) {
                SavedLink::setStatusForUser($user_id, $id, 'archived');
            }

            $session->message('Saved link added to MyLinks as ID ' . $new_link_id . '.');
            $session->ok(true);
            redirect_to(saved_links_safe_return_url($page_url));
        }
    } catch (Throwable $exception) {
        $session->message($exception->getMessage());
        redirect_to(saved_links_safe_return_url($page_url));
    }
}

$new_token = $_SESSION['saved_links_new_token'] ?? '';
unset($_SESSION['saved_links_new_token']);

$status_filter = trim((string)($_GET['status'] ?? ''));
if ($status_filter !== '' && !in_array($status_filter, SavedLink::statusOptions(), true)) {
    $status_filter = '';
}

$search = trim((string)($_GET['search'] ?? ''));
$links = SavedLink::allForUser($user_id, [
    'status' => $status_filter,
    'search' => $search,
    'limit' => 200,
]);
$counts = SavedLink::countsForUser($user_id);
$tokens = UserApiToken::tokensForUser($user_id);
$link_categories = saved_links_link_categories();
$api_endpoint = SITE_URL . '/public/api/v1/saved-links.php';
$saved_links_csrf_token = create_csrf_token($saved_links_csrf_id);
?>
<?php $layout_context = 'public'; ?>
<?php $active_menu = 'saved_links'; ?>
<?php $stylesheets = ''; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ''; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . 'header.php'); ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . 'nav.php'); ?>

<style>
    body {
        background: #eef3f8;
        padding-top: 56px;
    }

    .saved-links-page {
        color: #162033;
        min-height: calc(100vh - 56px);
        padding: 22px 18px 82px;
    }

    .saved-links-shell {
        margin: 0 auto;
        max-width: 1180px;
    }

    .saved-links-header {
        align-items: flex-end;
        display: flex;
        gap: 16px;
        justify-content: space-between;
        margin-bottom: 18px;
    }

    .saved-links-header h1 {
        color: #0b4778;
        font-size: 32px;
        font-weight: 800;
        line-height: 1.15;
        margin: 0;
    }

    .saved-links-header p {
        color: #4b6179;
        margin: 6px 0 0;
    }

    .saved-links-panel,
    .saved-link-item {
        background: #fff;
        border: 1px solid #d8e2ec;
        border-radius: 8px;
        box-shadow: 0 14px 34px rgba(15, 23, 42, 0.07);
    }

    .saved-links-panel {
        margin-bottom: 18px;
        padding: 18px;
    }

    details.saved-links-panel {
        padding: 0;
    }

    .saved-links-panel h2 {
        color: #163f63;
        font-size: 18px;
        font-weight: 800;
        margin: 0 0 14px;
    }

    .saved-links-panel__summary {
        align-items: center;
        cursor: pointer;
        display: flex;
        gap: 12px;
        justify-content: space-between;
        list-style: none;
        padding: 18px;
    }

    .saved-links-panel__summary::-webkit-details-marker {
        display: none;
    }

    .saved-links-panel__summary h2 {
        margin: 0;
    }

    .saved-links-panel__summary i {
        color: #31556f;
        transition: transform 0.16s ease;
    }

    details[open] > .saved-links-panel__summary i {
        transform: rotate(180deg);
    }

    .saved-links-panel__body {
        border-top: 1px solid #e5edf5;
        padding: 18px;
    }

    .saved-links-help {
        color: #41566d;
    }

    .saved-links-help h3 {
        color: #173f63;
        font-size: 15px;
        font-weight: 800;
        margin: 18px 0 8px;
    }

    .saved-links-help h3:first-child {
        margin-top: 0;
    }

    .saved-links-help ol,
    .saved-links-help ul {
        margin-bottom: 0;
        padding-left: 22px;
    }

    .saved-links-help li {
        margin-bottom: 6px;
    }

    .saved-links-help code {
        background: #edf4fa;
        border-radius: 4px;
        color: #173f63;
        padding: 2px 5px;
    }

    .saved-links-token-grid,
    .saved-links-filter {
        display: grid;
        gap: 12px;
        grid-template-columns: minmax(0, 1fr) auto;
    }

    .saved-links-field label {
        color: #52667c;
        display: block;
        font-size: 12px;
        font-weight: 800;
        margin-bottom: 5px;
        text-transform: uppercase;
    }

    .saved-links-field input,
    .saved-links-field textarea,
    .saved-links-field select {
        border: 1px solid #cbd8e5;
        border-radius: 6px;
        color: #1d2b3f;
        display: block;
        min-height: 40px;
        padding: 8px 10px;
        width: 100%;
    }

    .saved-links-field textarea {
        min-height: 84px;
        resize: vertical;
    }

    .saved-links-btn {
        align-items: center;
        border: 0;
        border-radius: 6px;
        display: inline-flex;
        font-weight: 800;
        gap: 7px;
        justify-content: center;
        min-height: 40px;
        padding: 9px 13px;
        text-decoration: none;
    }

    .saved-links-btn:hover,
    .saved-links-btn:focus {
        text-decoration: none;
    }

    .saved-links-btn--primary {
        background: #0b8fcb;
        color: #fff;
    }

    .saved-links-btn--neutral {
        background: #e8eef5;
        color: #254158;
    }

    .saved-links-btn--success {
        background: #0f766e;
        color: #fff;
    }

    .saved-links-btn--danger {
        background: #b42318;
        color: #fff;
    }

    .saved-links-token {
        background: #f7fbff;
        border: 1px solid #b9d6ee;
        border-radius: 8px;
        margin-bottom: 14px;
        padding: 12px;
    }

    .saved-links-token input {
        font-family: Consolas, Monaco, monospace;
    }

    .saved-links-token-list {
        display: grid;
        gap: 10px;
        margin-top: 14px;
    }

    .saved-links-token-row {
        align-items: center;
        border-top: 1px solid #e4edf5;
        display: grid;
        gap: 10px;
        grid-template-columns: minmax(0, 1fr) auto;
        padding-top: 10px;
    }

    .saved-links-token-row strong {
        color: #20344c;
    }

    .saved-links-token-row span {
        color: #607387;
        display: inline-block;
        font-size: 13px;
        margin-right: 10px;
    }

    .saved-links-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 14px;
    }

    .saved-links-tab {
        background: #fff;
        border: 1px solid #c9d7e5;
        border-radius: 6px;
        color: #30465e;
        font-weight: 800;
        padding: 8px 11px;
        text-decoration: none;
    }

    .saved-links-tab--active,
    .saved-links-tab:hover,
    .saved-links-tab:focus {
        background: #163f63;
        border-color: #163f63;
        color: #fff;
        text-decoration: none;
    }

    .saved-links-list {
        display: grid;
        gap: 12px;
    }

    .saved-link-item {
        overflow: hidden;
    }

    .saved-link-row {
        align-items: center;
        display: grid;
        gap: 12px;
        grid-template-columns: minmax(0, 1fr) auto auto;
        list-style: none;
        min-height: 72px;
        padding: 12px 14px;
    }

    .saved-link-row:hover {
        background: #f6f9fc;
    }

    .saved-link-summary__main {
        min-width: 0;
    }

    .saved-link-toggle {
        background: transparent;
        border: 0;
        color: inherit;
        cursor: pointer;
        display: block;
        min-width: 0;
        padding: 0;
        text-align: left;
        width: 100%;
    }

    .saved-link-toggle:focus {
        outline: 3px solid rgba(14, 143, 203, 0.25);
        outline-offset: 4px;
    }

    .saved-link-summary__title {
        color: #0e3759;
        display: block;
        font-size: 18px;
        font-weight: 800;
        line-height: 1.25;
        overflow: hidden;
        overflow-wrap: anywhere;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .saved-link-summary__url {
        color: #4d6c85;
        display: block;
        font-size: 13px;
        line-height: 1.3;
        margin-top: 3px;
        overflow: hidden;
        overflow-wrap: anywhere;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .saved-link-item__meta {
        color: #718196;
        font-size: 12px;
        margin-top: 10px;
    }

    .saved-link-toggle__hint {
        align-items: center;
        color: #31556f;
        display: inline-flex;
        font-size: 13px;
        font-weight: 800;
        gap: 6px;
        justify-content: center;
        margin-top: 5px;
        min-width: 76px;
    }

    .saved-link-toggle__hint i {
        transition: transform 0.16s ease;
    }

    .saved-link-toggle[aria-expanded="true"] .saved-link-toggle__hint i {
        transform: rotate(180deg);
    }

    .saved-link-details__panel {
        border-top: 1px solid #e5edf5;
        padding: 14px;
    }

    .saved-link-details__panel[hidden] {
        display: none;
    }

    .saved-link-status {
        border-radius: 999px;
        color: #fff;
        display: inline-flex;
        font-size: 12px;
        font-weight: 800;
        line-height: 1;
        padding: 7px 10px;
        text-transform: uppercase;
    }

    .saved-link-status--inbox {
        background: #0b8fcb;
    }

    .saved-link-status--kept {
        background: #0f766e;
    }

    .saved-link-status--archived {
        background: #71717a;
    }

    .saved-link-form {
        display: grid;
        gap: 10px;
        grid-template-columns: minmax(0, 1.4fr) minmax(180px, 0.45fr);
    }

    .saved-link-import {
        background: #f5fbff;
        border: 1px solid #c9e2f5;
        border-radius: 8px;
        margin-top: 14px;
        padding: 14px;
    }

    .saved-link-import h3 {
        color: #0b4778;
        font-size: 16px;
        font-weight: 900;
        margin: 0 0 12px;
    }

    .saved-link-import__grid {
        display: grid;
        gap: 10px;
        grid-template-columns: minmax(190px, 1fr) minmax(160px, 0.7fr) minmax(160px, 0.7fr) 110px;
    }

    .saved-link-import__grid .saved-links-field--wide {
        grid-column: 1 / -1;
    }

    .saved-link-import__archive {
        align-items: center;
        color: #254158;
        display: inline-flex;
        font-weight: 800;
        gap: 8px;
        margin: 12px 0 0;
    }

    .saved-link-form .saved-links-field--wide {
        grid-column: 1 / -1;
    }

    .saved-link-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: flex-end;
        margin-top: 10px;
    }

    .saved-link-row-actions {
        align-items: center;
        display: flex;
        flex-wrap: nowrap;
        gap: 6px;
        justify-content: flex-end;
    }

    .saved-link-row-actions form {
        margin: 0;
    }

    .saved-link-icon-btn {
        min-height: 38px;
        min-width: 38px;
        padding: 0;
        width: 38px;
    }

    .saved-link-icon-btn[disabled] {
        cursor: default;
        opacity: 0.72;
    }

    .saved-links-empty {
        color: #53677c;
        padding: 24px;
        text-align: center;
    }

    @media (max-width: 760px) {
        .saved-links-header,
        .saved-link-row,
        .saved-links-token-grid,
        .saved-links-filter,
        .saved-links-token-row,
        .saved-link-form,
        .saved-link-import__grid {
            grid-template-columns: 1fr;
        }

        .saved-links-header {
            align-items: start;
            display: grid;
        }

        .saved-link-actions {
            justify-content: stretch;
        }

        .saved-link-status,
        .saved-link-toggle__hint {
            justify-self: start;
        }

        .saved-link-row-actions {
            justify-content: flex-start;
        }

        .saved-links-btn {
            width: 100%;
        }

        .saved-link-icon-btn {
            width: 38px;
        }
    }
</style>

<main class="saved-links-page">
    <div class="saved-links-shell">
        <header class="saved-links-header">
            <div>
                <h1>Saved links</h1>
                <p><?php echo h((string)$counts['all']); ?> saved URLs from Chrome and the site.</p>
            </div>
            <a class="saved-links-btn saved-links-btn--neutral" href="<?php echo h(SITE_URL . '/public/myLinks.php?category=Others'); ?>">
                <i class="fa fa-link" aria-hidden="true"></i>
                Links page
            </a>
        </header>

        <?php echo $session->message(); ?>

        <details class="saved-links-panel" <?php echo $new_token !== '' ? 'open' : ''; ?>>
            <summary class="saved-links-panel__summary">
                <h2>Chrome extension token</h2>
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </summary>
            <div class="saved-links-panel__body">
                <?php if ($new_token !== '') { ?>
                    <div class="saved-links-token">
                        <div class="saved-links-field">
                            <label for="saved-links-new-token">New token</label>
                            <input id="saved-links-new-token" type="text" value="<?php echo h($new_token); ?>" readonly>
                        </div>
                    </div>
                <?php } ?>

                <form method="post" action="<?php echo h($page_url); ?>" class="saved-links-token-grid">
                    <input type="hidden" name="csrf_token<?php echo h($saved_links_csrf_id); ?>" value="<?php echo h($saved_links_csrf_token); ?>">
                    <input type="hidden" name="action" value="generate_token">
                    <div class="saved-links-field">
                        <label for="token-name">Token name</label>
                        <input id="token-name" name="token_name" type="text" value="Chrome URL Saver">
                    </div>
                    <button class="saved-links-btn saved-links-btn--primary" type="submit">
                        <i class="fa fa-key" aria-hidden="true"></i>
                        Generate token
                    </button>
                </form>

                <div class="saved-links-field" style="margin-top: 12px;">
                    <label for="saved-links-api-endpoint">API endpoint</label>
                    <input id="saved-links-api-endpoint" type="text" value="<?php echo h($api_endpoint); ?>" readonly>
                </div>

                <?php if (!empty($tokens)) { ?>
                    <div class="saved-links-token-list">
                        <?php foreach ($tokens as $token) { ?>
                            <div class="saved-links-token-row">
                                <div>
                                    <strong><?php echo h($token['name']); ?></strong>
                                    <span>Prefix <?php echo h($token['token_prefix']); ?></span>
                                    <span>Created <?php echo h($token['created_at']); ?></span>
                                    <?php if (!empty($token['last_used_at'])) { ?>
                                        <span>Used <?php echo h($token['last_used_at']); ?></span>
                                    <?php } ?>
                                    <?php if (!empty($token['revoked_at'])) { ?>
                                        <span>Revoked <?php echo h($token['revoked_at']); ?></span>
                                    <?php } ?>
                                </div>
                                <?php if (empty($token['revoked_at'])) { ?>
                                    <form method="post" action="<?php echo h($page_url); ?>">
                                        <input type="hidden" name="csrf_token<?php echo h($saved_links_csrf_id); ?>" value="<?php echo h($saved_links_csrf_token); ?>">
                                        <input type="hidden" name="action" value="revoke_token">
                                        <input type="hidden" name="id" value="<?php echo h($token['id']); ?>">
                                        <button class="saved-links-btn saved-links-btn--danger" type="submit">
                                            <i class="fa fa-ban" aria-hidden="true"></i>
                                            Revoke
                                        </button>
                                    </form>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </details>

        <details class="saved-links-panel">
            <summary class="saved-links-panel__summary">
                <h2>Chrome extension setup help</h2>
                <i class="fa fa-chevron-down" aria-hidden="true"></i>
            </summary>
            <div class="saved-links-panel__body saved-links-help">
                <h3>Install on this computer</h3>
                <ol>
                    <li>Open <code>chrome://extensions</code> in Chrome.</li>
                    <li>Enable <strong>Developer mode</strong>.</li>
                    <li>Click <strong>Load unpacked</strong>.</li>
                    <li>Select <code>S:\ikamych\chrome-extension\ikamych-url-saver</code>.</li>
                    <li>Open the extension options.</li>
                    <li>Generate a token here, paste it into <strong>API token</strong>, then click <strong>Save</strong> and <strong>Test</strong>.</li>
                </ol>

                <h3>Install after reinstalling Chrome or on another computer</h3>
                <ol>
                    <li>Make sure this project folder, including <code>chrome-extension\ikamych-url-saver</code>, exists on that computer.</li>
                    <li>Load the folder again from <code>chrome://extensions</code>.</li>
                    <li>Generate a new token from this page and paste it into the extension options.</li>
                    <li>Use production URLs for the live site, or local URLs when testing with <code>ikamy.local</code>.</li>
                </ol>

                <h3>Endpoint values</h3>
                <ul>
                    <li>Production API: <code>https://www.ikamy.ch/public/api/v1/saved-links.php</code></li>
                    <li>Production page: <code>https://www.ikamy.ch/public/saved_links.php</code></li>
                    <li>Local API: <code>http://ikamy.local/public/api/v1/saved-links.php</code></li>
                    <li>Local page: <code>http://ikamy.local/public/saved_links.php</code></li>
                </ul>

                <h3>Token safety</h3>
                <ul>
                    <li>The token starts with <code>iks_</code> and is shown only when generated.</li>
                    <li>Generate one token per computer when possible.</li>
                    <li>Revoke old tokens from this page when a computer is replaced or lost.</li>
                </ul>
            </div>
        </details>

        <section class="saved-links-panel">
            <form method="get" action="<?php echo h($page_url); ?>" class="saved-links-filter">
                <div class="saved-links-field">
                    <label for="saved-links-search">Search</label>
                    <input id="saved-links-search" name="search" type="search" value="<?php echo h($search); ?>">
                </div>
                <button class="saved-links-btn saved-links-btn--primary" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    Search
                </button>
            </form>
        </section>

        <nav class="saved-links-tabs" aria-label="Saved link status">
            <?php echo saved_links_status_tab('All', '', $status_filter, $counts['all'], $search); ?>
            <?php echo saved_links_status_tab('Inbox', 'inbox', $status_filter, $counts['inbox'], $search); ?>
            <?php echo saved_links_status_tab('Kept', 'kept', $status_filter, $counts['kept'], $search); ?>
            <?php echo saved_links_status_tab('Archived', 'archived', $status_filter, $counts['archived'], $search); ?>
        </nav>

        <section class="saved-links-list" aria-label="Saved URLs">
            <?php if (empty($links)) { ?>
                <div class="saved-links-panel saved-links-empty">No saved links found.</div>
            <?php } ?>

            <?php foreach ($links as $link) { ?>
                <article class="saved-link-item">
                    <div class="saved-link-row">
                        <button class="saved-link-toggle" type="button" aria-expanded="false" aria-controls="saved-link-panel-<?php echo h($link['id']); ?>" data-saved-link-toggle>
                            <span class="saved-link-summary__main">
                                <span class="saved-link-summary__title"><?php echo h($link['title']); ?></span>
                                <span class="saved-link-summary__url"><?php echo h($link['url']); ?></span>
                                <span class="saved-link-toggle__hint">
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    Details
                                </span>
                            </span>
                        </button>

                        <span class="saved-link-status saved-link-status--<?php echo h($link['status']); ?>">
                            <?php echo h($link['status']); ?>
                        </span>

                        <div class="saved-link-row-actions" aria-label="Saved link shortcuts">
                            <a class="saved-links-btn saved-links-btn--neutral saved-link-icon-btn" href="<?php echo h($link['url']); ?>" target="_blank" rel="noopener noreferrer" title="Open link" aria-label="Open link">
                                <i class="fa fa-external-link" aria-hidden="true"></i>
                            </a>
                            <button class="saved-links-btn saved-links-btn--primary saved-link-icon-btn" type="button" title="Add to MyLinks" aria-label="Add to MyLinks" data-saved-link-open-import="saved-link-panel-<?php echo h($link['id']); ?>">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                            <form method="post" action="<?php echo h($page_url); ?>">
                                <input type="hidden" name="csrf_token<?php echo h($saved_links_csrf_id); ?>" value="<?php echo h($saved_links_csrf_token); ?>">
                                <input type="hidden" name="action" value="set_status">
                                <input type="hidden" name="id" value="<?php echo h($link['id']); ?>">
                                <input type="hidden" name="status" value="kept">
                                <button class="saved-links-btn saved-links-btn--success saved-link-icon-btn" type="submit" title="<?php echo $link['status'] === 'kept' ? 'Already kept' : 'Keep link'; ?>" aria-label="<?php echo $link['status'] === 'kept' ? 'Already kept' : 'Keep link'; ?>" <?php echo $link['status'] === 'kept' ? 'disabled' : ''; ?>>
                                    <i class="fa fa-save" aria-hidden="true"></i>
                                </button>
                            </form>
                            <form method="post" action="<?php echo h($page_url); ?>" onsubmit="return confirm('Delete this saved link?');">
                                <input type="hidden" name="csrf_token<?php echo h($saved_links_csrf_id); ?>" value="<?php echo h($saved_links_csrf_token); ?>">
                                <input type="hidden" name="action" value="delete_link">
                                <input type="hidden" name="id" value="<?php echo h($link['id']); ?>">
                                <button class="saved-links-btn saved-links-btn--danger saved-link-icon-btn" type="submit" title="Delete link" aria-label="Delete link">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="saved-link-details__panel" id="saved-link-panel-<?php echo h($link['id']); ?>" hidden>
                        <div class="saved-link-item__meta">
                            Saved <?php echo h($link['saved_at']); ?> from <?php echo h($link['source']); ?>
                        </div>

                        <form method="post" action="<?php echo h($page_url); ?>" class="saved-link-form">
                            <input type="hidden" name="csrf_token<?php echo h($saved_links_csrf_id); ?>" value="<?php echo h($saved_links_csrf_token); ?>">
                            <input type="hidden" name="action" value="update_link">
                            <input type="hidden" name="id" value="<?php echo h($link['id']); ?>">

                            <div class="saved-links-field">
                                <label for="saved-link-title-<?php echo h($link['id']); ?>">Title</label>
                                <input id="saved-link-title-<?php echo h($link['id']); ?>" name="title" type="text" value="<?php echo h($link['title']); ?>" required>
                            </div>

                            <div class="saved-links-field">
                                <label for="saved-link-status-<?php echo h($link['id']); ?>">Status</label>
                                <select id="saved-link-status-<?php echo h($link['id']); ?>" name="status">
                                    <?php foreach (SavedLink::statusOptions() as $status) { ?>
                                        <option value="<?php echo h($status); ?>" <?php echo $link['status'] === $status ? 'selected' : ''; ?>>
                                            <?php echo h(ucfirst($status)); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="saved-links-field saved-links-field--wide">
                                <label for="saved-link-note-<?php echo h($link['id']); ?>">Note</label>
                                <textarea id="saved-link-note-<?php echo h($link['id']); ?>" name="note"><?php echo h($link['note']); ?></textarea>
                            </div>

                            <div class="saved-link-actions saved-links-field--wide">
                                <a class="saved-links-btn saved-links-btn--neutral" href="<?php echo h($link['url']); ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="fa fa-external-link" aria-hidden="true"></i>
                                    Open
                                </a>
                                <button class="saved-links-btn saved-links-btn--success" type="submit">
                                    <i class="fa fa-save" aria-hidden="true"></i>
                                    Save
                                </button>
                            </div>
                        </form>

                        <div class="saved-link-actions">
                            <?php if ($link['status'] !== 'archived') { ?>
                                <form method="post" action="<?php echo h($page_url); ?>">
                                    <input type="hidden" name="csrf_token<?php echo h($saved_links_csrf_id); ?>" value="<?php echo h($saved_links_csrf_token); ?>">
                                    <input type="hidden" name="action" value="set_status">
                                    <input type="hidden" name="id" value="<?php echo h($link['id']); ?>">
                                    <input type="hidden" name="status" value="archived">
                                    <button class="saved-links-btn saved-links-btn--neutral" type="submit">
                                        <i class="fa fa-archive" aria-hidden="true"></i>
                                        Archive
                                    </button>
                                </form>
                            <?php } ?>
                        </div>

                        <form method="post" action="<?php echo h($page_url); ?>" class="saved-link-import" id="saved-link-import-<?php echo h($link['id']); ?>">
                            <input type="hidden" name="csrf_token<?php echo h($saved_links_csrf_id); ?>" value="<?php echo h($saved_links_csrf_token); ?>">
                            <input type="hidden" name="action" value="import_to_links">
                            <input type="hidden" name="id" value="<?php echo h($link['id']); ?>">
                            <input type="hidden" name="return_to" value="<?php echo h($saved_links_return_to); ?>">

                            <h3>Add to MyLinks</h3>
                            <div class="saved-link-import__grid">
                                <div class="saved-links-field">
                                    <label for="saved-link-category-<?php echo h($link['id']); ?>">Category</label>
                                    <select id="saved-link-category-<?php echo h($link['id']); ?>" name="links_category_id">
                                        <?php foreach ($link_categories as $category) { ?>
                                            <option value="<?php echo h((string)$category['id']); ?>" <?php echo strcasecmp($category['category'], 'Others') === 0 ? 'selected' : ''; ?>>
                                                <?php echo h($category['category']); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="saved-links-field">
                                    <label for="saved-link-sub-category-1-<?php echo h($link['id']); ?>">Sub category 1</label>
                                    <input id="saved-link-sub-category-1-<?php echo h($link['id']); ?>" name="sub_category_1" type="text" value="">
                                </div>

                                <div class="saved-links-field">
                                    <label for="saved-link-sub-category-2-<?php echo h($link['id']); ?>">Sub category 2</label>
                                    <input id="saved-link-sub-category-2-<?php echo h($link['id']); ?>" name="sub_category_2" type="text" value="">
                                </div>

                                <div class="saved-links-field">
                                    <label for="saved-link-rank-<?php echo h($link['id']); ?>">Rank</label>
                                    <input id="saved-link-rank-<?php echo h($link['id']); ?>" name="rank" type="number" min="0" value="10">
                                </div>

                                <div class="saved-links-field saved-links-field--wide">
                                    <label for="saved-link-new-category-<?php echo h($link['id']); ?>">Or new category</label>
                                    <input id="saved-link-new-category-<?php echo h($link['id']); ?>" name="new_links_category" type="text" value="" placeholder="Leave empty to use selected category">
                                </div>
                            </div>

                            <label class="saved-link-import__archive" for="saved-link-archive-<?php echo h($link['id']); ?>">
                                <input id="saved-link-archive-<?php echo h($link['id']); ?>" name="archive_saved_link" type="checkbox" value="1" checked>
                                Archive this saved link after adding it to MyLinks
                            </label>

                            <div class="saved-link-actions">
                                <button class="saved-links-btn saved-links-btn--primary" type="submit">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Add to MyLinks
                                </button>
                            </div>
                        </form>
                    </div>
                </article>
            <?php } ?>
        </section>
    </div>
</main>

<script>
    (function() {
        document.querySelectorAll('[data-saved-link-toggle]').forEach(function(toggle) {
            toggle.addEventListener('click', function() {
                var panel = document.getElementById(toggle.getAttribute('aria-controls'));
                var expanded = toggle.getAttribute('aria-expanded') === 'true';

                if (!panel) {
                    return;
                }

                toggle.setAttribute('aria-expanded', expanded ? 'false' : 'true');
                panel.hidden = expanded;
            });
        });

        document.querySelectorAll('[data-saved-link-open-import]').forEach(function(button) {
            button.addEventListener('click', function() {
                var panel = document.getElementById(button.getAttribute('data-saved-link-open-import'));
                var toggle = document.querySelector('[aria-controls="' + button.getAttribute('data-saved-link-open-import') + '"]');
                var category;

                if (!panel) {
                    return;
                }

                panel.hidden = false;
                if (toggle) {
                    toggle.setAttribute('aria-expanded', 'true');
                }

                category = panel.querySelector('select[name="links_category_id"]');
                if (category) {
                    category.focus();
                }
            });
        });
    })();
</script>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . 'footer.php'); ?>

<?php
function saved_links_post_id(string $key): int
{
    $id = filter_input(INPUT_POST, $key, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);

    if ($id === false || $id === null) {
        throw new InvalidArgumentException('A valid record ID is required.');
    }

    return (int)$id;
}

function saved_links_status_tab(string $label, string $status, string $active_status, int $count, string $search): string
{
    $params = [];
    if ($status !== '') {
        $params['status'] = $status;
    }
    if ($search !== '') {
        $params['search'] = $search;
    }

    $href = '/public/saved_links.php';
    if (!empty($params)) {
        $href .= '?' . http_build_query($params);
    }

    $active = $status === $active_status ? ' saved-links-tab--active' : '';
    if ($status === '' && $active_status === '') {
        $active = ' saved-links-tab--active';
    }

    return "<a class='saved-links-tab{$active}' href='" . h($href) . "'>" . h($label) . " <span>" . h((string)$count) . "</span></a>";
}

function saved_links_safe_return_url(string $fallback): string
{
    $return_to = $_POST['return_to'] ?? '';

    return is_safe_local_redirect($return_to) ? $return_to : $fallback;
}

function saved_links_link_categories(): array
{
    global $database;

    $result = $database->query("SELECT id, category FROM links_category ORDER BY `rank` ASC, category ASC");
    $categories = [];

    while ($row = $database->fetch_array($result)) {
        $categories[] = [
            'id' => (int)$row['id'],
            'category' => (string)$row['category'],
        ];
    }

    $database->free_result($result);

    return $categories;
}

function saved_links_resolve_links_category(int $category_id, string $new_category): array
{
    global $database;

    $new_category = saved_links_clean_text($new_category, 80);
    if ($new_category !== '') {
        $result = $database->query_prepared(
            "SELECT id, category FROM links_category WHERE LOWER(category) = LOWER(?) LIMIT 1",
            [$new_category],
            "s"
        );
        $row = $database->fetch_array($result);
        $database->free_result($result);

        if ($row) {
            return ['id' => (int)$row['id'], 'category' => (string)$row['category']];
        }

        $rank_result = $database->query("SELECT COALESCE(MAX(`rank`), 0) + 10 AS next_rank FROM links_category");
        $rank_row = $database->fetch_array($rank_result);
        $database->free_result($rank_result);
        $rank = (int)($rank_row['next_rank'] ?? 10);

        $database->execute_prepared(
            "INSERT INTO links_category (category, `rank`) VALUES (?, ?)",
            [$new_category, $rank],
            "si"
        );

        return ['id' => (int)$database->insert_id(), 'category' => $new_category];
    }

    if ($category_id < 1) {
        throw new InvalidArgumentException('Choose a MyLinks category or enter a new one.');
    }

    $result = $database->query_prepared(
        "SELECT id, category FROM links_category WHERE id = ? LIMIT 1",
        [$category_id],
        "i"
    );
    $row = $database->fetch_array($result);
    $database->free_result($result);

    if (!$row) {
        throw new InvalidArgumentException('Selected MyLinks category was not found.');
    }

    return ['id' => (int)$row['id'], 'category' => (string)$row['category']];
}

function saved_links_import_to_links(int $user_id, array $saved_link, array $options): int
{
    global $database;

    $title = saved_links_clean_text($saved_link['title'] ?? '', 80);
    if ($title === '') {
        $host = parse_url((string)$saved_link['url'], PHP_URL_HOST);
        $title = $host ? saved_links_clean_text((string)$host, 80) : 'Saved link';
    }

    $description = saved_links_clean_text($saved_link['note'] ?? '', 4000);
    $sub_category_1 = saved_links_clean_text($options['sub_category_1'] ?? '', 120);
    $sub_category_2 = saved_links_clean_text($options['sub_category_2'] ?? '', 120);
    $rank = (int)($options['rank'] ?? 10);
    $username = saved_links_current_username($user_id);

    $database->execute_prepared(
        "INSERT INTO links (name, web_address, description, category_id, category, sub_category_1, sub_category_2, privacy, `rank`, username) VALUES (?, ?, ?, ?, ?, ?, ?, 0, ?, ?)",
        [
            $title,
            (string)$saved_link['url'],
            $description,
            (int)$options['category_id'],
            (string)$options['category'],
            $sub_category_1,
            $sub_category_2,
            $rank,
            $username,
        ],
        "sssisssis"
    );

    return (int)$database->insert_id();
}

function saved_links_current_username(int $user_id): string
{
    $user = User::find_by_id($user_id);

    if ($user && isset($user->username) && trim((string)$user->username) !== '') {
        return (string)$user->username;
    }

    return 'kamy';
}

function saved_links_clean_text($value, int $length): string
{
    $value = trim((string)$value);

    if (function_exists('mb_substr')) {
        return mb_substr($value, 0, $length, 'UTF-8');
    }

    return substr($value, 0, $length);
}
?>
