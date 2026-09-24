<?php

class LinksPinnedColumn extends DatabaseObject
{
    protected static $table_name = "links_pinned_columns";
    protected static $db_fields = ['id', 'source_field', 'source_value', 'label', 'rank', 'active', 'username'];

    public static $required_fields = ['source_field', 'source_value', 'label', 'rank', 'active'];

    protected static $db_fields_table_display_short = ['id', 'source_field', 'source_value', 'label', 'rank', 'active'];
    protected static $db_fields_table_display_full = ['id', 'source_field', 'source_value', 'label', 'rank', 'active', 'username'];
    protected static $db_field_exclude_table_display_sort = null;

    public static $fields_numeric = ['id', 'rank', 'active'];
    public static $get_form_element = ['source_field', 'source_value', 'label', 'rank', 'active'];
    public static $get_form_element_others = [];
    public static $form_default_value = [
        'source_field' => 'category',
        'rank' => '10',
        'active' => '1',
    ];

    protected static $form_properties = [
        'source_field' => [
            'type' => 'text',
            'name' => 'source_field',
            'label_text' => 'Source',
            'placeholder' => 'category',
            'required' => true,
        ],
        'source_value' => [
            'type' => 'text',
            'name' => 'source_value',
            'label_text' => 'Value',
            'placeholder' => 'PHP',
            'required' => true,
        ],
        'label' => [
            'type' => 'text',
            'name' => 'label',
            'label_text' => 'Label',
            'placeholder' => 'PHP',
            'required' => true,
        ],
        'rank' => [
            'type' => 'number',
            'name' => 'rank',
            'label_text' => 'Rank',
            'min' => 0,
            'placeholder' => 'a number to sort',
            'required' => true,
        ],
        'active' => [
            'type' => 'radio',
            [0, [
                'label_all' => 'Active',
                'name' => 'active',
                'label_radio' => 'No',
                'value' => '0',
                'id' => 'active_no',
                'default' => false,
            ]],
            [1, [
                'label_all' => 'Active',
                'name' => 'active',
                'label_radio' => 'Yes',
                'value' => '1',
                'id' => 'active_yes',
                'default' => true,
            ]],
        ],
    ];

    protected static $form_properties_search = [];
    public static $db_field_search = ['search_all', 'source_field', 'source_value', 'label', 'active'];

    public static $page_name = "LinksPinnedColumn";
    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=LinksPinnedColumn";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=LinksPinnedColumn";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=LinksPinnedColumn";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=LinksPinnedColumn";
    public static $position_table = "positionRight";
    public static $form_class_dependency = ['Links'];

    public $id;
    public $source_field;
    public $source_value;
    public $label;
    public $rank;
    public $active;
    public $username;

    public function form_validation()
    {
        $valid = new FormValidation();
        $valid->validate_presences(self::$required_fields);
        return $valid;
    }

    public static function handle_public_request($source_field = 'category')
    {
        global $session;

        if (!request_is_post() || ($_POST['links_pin_action'] ?? '') === '') {
            return;
        }

        $is_ajax = ($_POST['links_pin_ajax'] ?? '') === '1';

        if (!User::is_kamy()) {
            if ($is_ajax) {
                static::pin_json_response(['error' => 'You cannot change pinned categories.'], 403);
            }
            $session->message('Sorry, only Kamy can change pinned link columns.');
            redirect_to(current_request_uri());
        }

        if (!request_is_same_domain() || !csrf_token_is_valid('links_pin') || !csrf_token_is_recent('links_pin')) {
            if ($is_ajax) {
                static::pin_json_response(['error' => 'The request expired. Reload the page and try again.'], 403);
            }
            $session->message('Sorry, request was not valid.');
            redirect_to(current_request_uri());
        }

        static::ensure_table();

        $action = $_POST['links_pin_action'];
        if ($action === 'toggle_category' && $is_ajax) {
            $id = filter_var($_POST['category_id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
            $active = $_POST['active'] ?? null;
            $category = $id ? LinksCategory::find_by_id((int)$id) : false;
            if (!$category || !in_array($active, ['0', '1'], true)) {
                static::pin_json_response(['error' => 'Category not found.'], 422);
            }

            static::set_category_active((string)$category->category, $active === '1');
            static::pin_json_response(['active' => $active === '1']);
        }
        if ($action === 'pin') {
            $value = trim((string)($_POST['source_value'] ?? ''));
            $field = static::normal_source_field($_POST['source_field'] ?? $source_field);

            if ($value === '') {
                $session->message('Choose a category before pinning a column.');
                redirect_to(current_request_uri());
            }

            static::pin($field, $value);
            $session->message(h($value) . ' pinned as a links column.');
            $session->ok(true);
            redirect_to(current_request_uri());
        }

        if ($action === 'unpin') {
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
            if ($id === false || $id === null) {
                $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
            }

            if ($id) {
                static::unpin($id);
                $session->message('Pinned links column removed.');
                $session->ok(true);
            }

            redirect_to(current_request_uri());
        }

        if ($action === 'save_pins') {
            static::save_category_pins($_POST['pinned_category_ids'] ?? [], $_POST['pin_ranks'] ?? []);
            $session->message('Pinned category order updated.');
            $session->ok(true);
            redirect_to(current_request_uri());
        }

        if ($action === 'create_category') {
            $name = trim(is_string($_POST['category_name'] ?? null) ? $_POST['category_name'] : '');
            $length = function_exists('mb_strlen') ? mb_strlen($name, 'UTF-8') : strlen($name);
            if ($length < 1 || $length > 20 || preg_match('/[\x00-\x1F]/', $name)) {
                $_SESSION['links_pin_error'] = 'Enter a category name of up to 20 characters.';
                $_SESSION['links_pin_old_name'] = $name;
                redirect_to(current_request_uri());
            }

            global $database;
            $existing = $database->query_prepared(
                'SELECT id FROM links_category WHERE LOWER(category) = LOWER(?) LIMIT 1',
                [$name],
                's'
            );
            $exists = (bool)$database->fetch_array($existing);
            $database->free_result($existing);
            if ($exists) {
                $_SESSION['links_pin_error'] = 'This category already exists. Select it in the list below.';
                $_SESSION['links_pin_old_name'] = $name;
                redirect_to(current_request_uri());
            }

            $rank_result = $database->query('SELECT COALESCE(MAX(`rank`), 0) + 10 AS next_rank FROM links_category');
            $rank_row = $database->fetch_array($rank_result);
            $database->free_result($rank_result);
            $icon = static::normal_category_icon($_POST['category_icon'] ?? 'fa-folder-o');
            $database->execute_prepared(
                'INSERT INTO links_category (category, icon, `rank`) VALUES (?, ?, ?)',
                [$name, $icon, (int)$rank_row['next_rank']],
                'ssi'
            );

            if (!empty($_POST['pin_new_category'])) {
                static::pin('category', $name);
            }

            $session->message(h($name) . ' category created.');
            $session->ok(true);
            redirect_to('/public/myLinks.php?category=' . rawurlencode($name));
        }

        if ($action === 'update_category') {
            static::update_category_from_request($is_ajax);
        }

        if ($action === 'delete_category') {
            static::delete_category_from_request($is_ajax);
        }
    }

    public static function public_sections($source_field = 'category')
    {
        static::ensure_table();
        static::seed_defaults();

        $sections = [Links::output_links()];
        $selected = static::selected_filter_value();

        foreach (static::active_columns($source_field) as $column) {
            if (
                static::normal_source_field($column->source_field) === $source_field
                && strcasecmp((string)$column->source_value, (string)$selected) === 0
            ) {
                continue;
            }

            $sections[] = static::render_column($column);
        }

        return $sections;
    }

    public static function active_category_values()
    {
        static::ensure_table();
        static::seed_defaults();
        return array_map(function ($column) {
            return (string)$column->source_value;
        }, static::active_columns('category'));
    }

    public static function pin_controls($source_field = 'category')
    {
        if (!User::is_kamy()) {
            return '';
        }

        static::ensure_table();

        $source_field = static::normal_source_field($source_field);
        $selected = static::selected_filter_value();

        $is_pinned = $selected !== '' && static::is_pinned($source_field, $selected);
        $output = "<div class='links-pin-panel'>";
        if ($selected === '') {
            $output .= "<span class='links-pin-panel__note'>Choose a category, then pin it as a column.</span>";
        } else {
            $output .= "<span class='links-pin-panel__label'>Selected: <strong>" . h($selected) . "</strong></span>";

            if ($is_pinned) {
                $output .= "<span class='links-pin-panel__status'><i class='fa fa-thumb-tack' aria-hidden='true'></i> Pinned</span>";
            } else {
                $output .= "<form method='post' action='" . h(current_request_uri()) . "'>";
                $output .= static::links_pin_csrf_token_tag();
                $output .= "<input type='hidden' name='links_pin_action' value='pin'>";
                $output .= "<input type='hidden' name='source_field' value='" . h($source_field) . "'>";
                $output .= "<input type='hidden' name='source_value' value='" . h($selected) . "'>";
                $output .= "<button type='submit' class='links-pin-panel__button'><i class='fa fa-thumb-tack' aria-hidden='true'></i> Pin column</button>";
                $output .= "</form>";
            }
        }

        $output .= "<button type='button' class='links-pin-panel__manage' data-toggle='modal' data-target='#links-pin-modal'><i class='fa fa-list' aria-hidden='true'></i> Manage pins</button>";
        $output .= "</div>";

        $output .= static::pin_modal();

        return $output;
    }

    private static function render_column($column)
    {
        $field = static::normal_source_field($column->source_field);
        $value = (string)$column->source_value;
        $html = Links::output_links($value, $field === 'sub_category_1', $field === 'sub_category_2');

        if (!User::is_kamy()) {
            return $html;
        }

        $output = "<div class='links-pinned-column'>";
        $output .= "<form class='links-pinned-column__unpin' method='post' action='" . h(current_request_uri()) . "'>";
        $output .= static::links_pin_csrf_token_tag();
        $output .= "<input type='hidden' name='links_pin_action' value='unpin'>";
        $output .= "<input type='hidden' name='id' value='" . h($column->id) . "'>";
        $output .= "<button type='submit' title='Remove pinned column' aria-label='Remove pinned column'><i class='fa fa-times' aria-hidden='true'></i></button>";
        $output .= "</form>";
        $output .= $html;
        $output .= "</div>";

        return $output;
    }

    private static function pin($source_field, $source_value)
    {
        global $database, $session;

        if (static::is_pinned($source_field, $source_value)) {
            return;
        }

        $existing = static::find_by_sql_prepared(
            "SELECT * FROM " . static::$table_name . " WHERE source_field=? AND source_value=? LIMIT 1",
            [$source_field, $source_value],
            "ss"
        );

        if (!empty($existing)) {
            $database->execute_prepared(
                "UPDATE " . static::$table_name . " SET active=1, `rank`=? WHERE id=?",
                [static::next_rank(), (int)$existing[0]->id],
                "ii"
            );
            return;
        }

        $rank = static::next_rank();
        $username = isset($session->user_id) ? (string)$session->user_id : '';

        $database->execute_prepared(
            "INSERT INTO " . static::$table_name . " (source_field, source_value, label, `rank`, active, username) VALUES (?, ?, ?, ?, 1, ?)",
            [$source_field, $source_value, $source_value, $rank, $username],
            "sssis"
        );
    }

    private static function save_category_pins($selected_ids, $rank_values)
    {
        global $database, $session;

        $selected_ids = is_array($selected_ids) ? $selected_ids : [];
        $rank_values = is_array($rank_values) ? $rank_values : [];
        $selected = [];
        foreach ($selected_ids as $id) {
            $selected[(int)$id] = true;
        }

        $existing = static::find_by_sql_prepared(
            "SELECT * FROM " . static::$table_name . " WHERE source_field = ?",
            ['category'],
            's'
        );
        $existing_values = [];
        foreach ($existing as $column) {
            $key = function_exists('mb_strtolower') ? mb_strtolower((string)$column->source_value, 'UTF-8') : strtolower((string)$column->source_value);
            $existing_values[$key] = true;
        }

        $username = isset($session->user_id) ? (string)$session->user_id : '';
        foreach (LinksCategory::find_all() as $category) {
            $id = (int)$category->id;
            $name = (string)$category->category;
            $key = function_exists('mb_strtolower') ? mb_strtolower($name, 'UTF-8') : strtolower($name);
            $active = isset($selected[$id]) ? 1 : 0;
            if (!$active && !isset($existing_values[$key])) {
                continue;
            }

            $rank = filter_var($rank_values[$id] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]);
            if ($rank === false || $rank === null) {
                $rank = 100000;
            }

            $database->execute_prepared(
                "INSERT INTO " . static::$table_name . " (source_field, source_value, label, `rank`, active, username) VALUES ('category', ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE active = VALUES(active), `rank` = VALUES(`rank`)",
                [$name, $name, $rank, $active, $username],
                'ssiis'
            );
        }
    }

    private static function set_category_active($name, $active)
    {
        global $database;

        if ($active) {
            static::pin('category', $name);
            return;
        }

        $database->execute_prepared(
            "UPDATE " . static::$table_name . " SET active = 0 WHERE source_field = 'category' AND source_value = ?",
            [$name],
            's'
        );
    }

    private static function pin_json_response(array $payload, $status = 200)
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($payload, JSON_UNESCAPED_UNICODE);
        exit;
    }

    public static function category_icon_options()
    {
        return [
            'fa-folder-o' => 'Folder',
            'fa-code' => 'Code',
            'fa-database' => 'Database',
            'fa-globe' => 'Website',
            'fa-book' => 'Book',
            'fa-graduation-cap' => 'Learning',
            'fa-video-camera' => 'Video',
            'fa-music' => 'Music',
            'fa-camera' => 'Photo',
            'fa-shopping-cart' => 'Shopping',
            'fa-briefcase' => 'Work',
            'fa-heart' => 'Favorites',
            'fa-star' => 'Star',
            'fa-lightbulb-o' => 'Ideas',
            'fa-plane' => 'Travel',
            'fa-link' => 'Links',
        ];
    }

    private static function normal_category_icon($icon)
    {
        $icon = is_string($icon) ? trim($icon) : '';
        return array_key_exists($icon, static::category_icon_options()) ? $icon : 'fa-folder-o';
    }

    private static function category_action_response($is_ajax, $message, $redirect, $status = 200)
    {
        global $session;

        if ($is_ajax) {
            static::pin_json_response($status === 200
                ? ['message' => $message, 'redirect' => $redirect]
                : ['error' => $message], $status);
        }

        $session->message($message);
        if ($status === 200) {
            $session->ok(true);
        }
        redirect_to($redirect);
    }

    private static function update_category_from_request($is_ajax)
    {
        global $database;

        $id = filter_var($_POST['category_id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        $category = $id ? LinksCategory::find_by_id((int)$id) : false;
        $name = trim(is_string($_POST['category_name'] ?? null) ? $_POST['category_name'] : '');
        $length = function_exists('mb_strlen') ? mb_strlen($name, 'UTF-8') : strlen($name);
        $rank = filter_var($_POST['category_rank'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]);
        $icon = static::normal_category_icon($_POST['category_icon'] ?? 'fa-folder-o');
        if (!$category || $length < 1 || $length > 20 || preg_match('/[\x00-\x1F]/', $name) || $rank === false || $rank === null) {
            static::category_action_response($is_ajax, 'Enter a valid name and order for this category.', current_request_uri(), 422);
        }

        $duplicate = $database->query_prepared(
            'SELECT id FROM links_category WHERE LOWER(category) = LOWER(?) AND id <> ? LIMIT 1',
            [$name, (int)$id],
            'si'
        );
        $exists = (bool)$database->fetch_array($duplicate);
        $database->free_result($duplicate);
        if ($exists) {
            static::category_action_response($is_ajax, 'This category name is already in use.', current_request_uri(), 422);
        }

        $old_name = (string)$category->category;
        try {
            $database->query('START TRANSACTION');
            $database->execute_prepared(
                'UPDATE links_category SET category = ?, icon = ?, `rank` = ? WHERE id = ?',
                [$name, $icon, (int)$rank, (int)$id],
                'ssii'
            );
            $database->execute_prepared(
                'UPDATE links SET category = ? WHERE category_id = ?',
                [$name, (int)$id],
                'si'
            );
            $database->execute_prepared(
                "UPDATE links_pinned_columns SET source_value = ?, label = IF(label = ?, ?, label) WHERE source_field = 'category' AND source_value = ?",
                [$name, $old_name, $name, $old_name],
                'ssss'
            );
            $database->execute_prepared(
                "UPDATE links_category_visibility SET source_value = ? WHERE source_field = 'category' AND source_value = ?",
                [$name, $old_name],
                'ss'
            );
            $database->query('COMMIT');
        } catch (Throwable $exception) {
            $database->query('ROLLBACK');
            static::category_action_response($is_ajax, 'This category could not be updated.', current_request_uri(), 422);
        }

        $redirect = strcasecmp((string)($_GET['category'] ?? ''), $old_name) === 0
            ? '/public/myLinks.php?category=' . rawurlencode($name)
            : current_request_uri();
        static::category_action_response($is_ajax, 'Category updated.', $redirect);
    }

    private static function delete_category_from_request($is_ajax)
    {
        global $database;

        $id = filter_var($_POST['category_id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        $category = $id ? LinksCategory::find_by_id((int)$id) : false;
        if (!$category || strcasecmp((string)$category->category, 'Others') === 0) {
            static::category_action_response($is_ajax, 'This category cannot be deleted.', current_request_uri(), 422);
        }

        $count_result = $database->query_prepared('SELECT COUNT(*) AS total FROM links WHERE category_id = ?', [(int)$id], 'i');
        $count_row = $database->fetch_array($count_result);
        $database->free_result($count_result);
        $link_count = (int)($count_row['total'] ?? 0);
        $replacement_id = filter_var($_POST['replacement_category_id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        $replacement = $replacement_id ? LinksCategory::find_by_id((int)$replacement_id) : false;
        if ($link_count > 0 && (!$replacement || (int)$replacement_id === (int)$id)) {
            static::category_action_response($is_ajax, 'Choose another category for the existing links.', current_request_uri(), 422);
        }

        $name = (string)$category->category;
        try {
            $database->query('START TRANSACTION');
            if ($link_count > 0) {
                $database->execute_prepared(
                    'UPDATE links SET category_id = ?, category = ? WHERE category_id = ?',
                    [(int)$replacement_id, (string)$replacement->category, (int)$id],
                    'isi'
                );
            }
            $database->execute_prepared(
                "DELETE FROM links_pinned_columns WHERE source_field = 'category' AND source_value = ?",
                [$name],
                's'
            );
            $database->execute_prepared(
                "DELETE FROM links_category_visibility WHERE source_field = 'category' AND source_value = ?",
                [$name],
                's'
            );
            $database->execute_prepared('DELETE FROM links_category WHERE id = ?', [(int)$id], 'i');
            $database->query('COMMIT');
        } catch (Throwable $exception) {
            $database->query('ROLLBACK');
            static::category_action_response($is_ajax, 'This category could not be deleted.', current_request_uri(), 422);
        }

        $redirect = strcasecmp((string)($_GET['category'] ?? ''), $name) === 0
            ? '/public/myLinks.php?category=' . rawurlencode($replacement ? (string)$replacement->category : 'Others')
            : current_request_uri();
        static::category_action_response($is_ajax, 'Category deleted.', $redirect);
    }

    private static function pin_modal()
    {
        global $database;

        $categories = LinksCategory::find_all();
        usort($categories, function ($a, $b) {
            return strcasecmp((string)$a->category, (string)$b->category);
        });

        $columns = static::find_by_sql_prepared(
            "SELECT * FROM " . static::$table_name . " WHERE source_field = ?",
            ['category'],
            's'
        );
        $by_value = [];
        foreach ($columns as $column) {
            $key = function_exists('mb_strtolower') ? mb_strtolower((string)$column->source_value, 'UTF-8') : strtolower((string)$column->source_value);
            $by_value[$key] = $column;
        }

        $link_counts = [];
        $count_result = $database->query('SELECT category_id, COUNT(*) AS total FROM links GROUP BY category_id');
        while ($count_row = $database->fetch_array($count_result)) {
            $link_counts[(int)$count_row['category_id']] = (int)$count_row['total'];
        }
        $database->free_result($count_result);
        $icon_options = static::category_icon_options();

        $error = (string)($_SESSION['links_pin_error'] ?? '');
        $old_name = (string)($_SESSION['links_pin_old_name'] ?? '');
        unset($_SESSION['links_pin_error'], $_SESSION['links_pin_old_name']);
        $return_uri = current_request_uri();

        ob_start();
        ?>
        <div class="modal fade links-pin-modal" id="links-pin-modal" tabindex="-1" role="dialog" aria-labelledby="links-pin-modal-title" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title" id="links-pin-modal-title">Manage pinned categories</h5>
                    </div>
                    <div class="modal-body">
                        <p class="links-pin-modal__intro">Switch categories on or off instantly. Edit an order number, then save the order.</p>

                        <details class="links-pin-modal__new"<?php echo $error !== '' ? ' open' : ''; ?>>
                            <summary><i class="fa fa-plus" aria-hidden="true"></i> Add a category</summary>
                            <form method="post" action="<?php echo h($return_uri); ?>" data-links-pin-create novalidate>
                                <?php echo static::links_pin_csrf_token_tag(); ?>
                                <input type="hidden" name="links_pin_action" value="create_category">
                                <label for="links-pin-category-name">Category name</label>
                                <div class="links-pin-modal__new-row">
                                    <input id="links-pin-category-name" name="category_name" type="text" maxlength="20" value="<?php echo h($old_name); ?>" required aria-describedby="links-pin-name-error">
                                    <button class="links-pin-modal__primary" type="submit"><i class="fa fa-plus" aria-hidden="true"></i> Add category</button>
                                </div>
                                <p class="links-pin-modal__error" id="links-pin-name-error" role="alert"<?php echo $error === '' ? ' hidden' : ''; ?>><?php echo h($error); ?></p>
                                <label class="links-pin-modal__icon-label" for="links-pin-new-icon">Icon</label>
                                <div class="links-pin-modal__icon-select">
                                    <i class="fa fa-folder-o" id="links-pin-new-icon-preview" aria-hidden="true"></i>
                                    <select id="links-pin-new-icon" name="category_icon">
                                        <?php foreach ($icon_options as $icon_class => $icon_label) { ?>
                                            <option value="<?php echo h($icon_class); ?>"><?php echo h($icon_label); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <label class="links-pin-modal__pin-new"><input type="checkbox" name="pin_new_category" value="1" checked> Pin this category now</label>
                            </form>
                        </details>

                        <section class="links-pin-modal__editor" id="links-pin-editor" hidden aria-labelledby="links-pin-editor-title">
                            <h6 id="links-pin-editor-title">Edit category</h6>
                            <form method="post" action="<?php echo h($return_uri); ?>" data-pin-edit-form novalidate>
                                <?php echo static::links_pin_csrf_token_tag(); ?>
                                <input type="hidden" name="links_pin_action" value="update_category">
                                <input type="hidden" name="category_id" value="">
                                <div class="links-pin-modal__edit-grid">
                                    <label>Category name <input name="category_name" type="text" maxlength="20" required></label>
                                    <label>Category order <input name="category_rank" type="number" min="0" required></label>
                                </div>
                                <p class="links-pin-modal__field-note">The category name also changes on its existing links.</p>
                                <fieldset class="links-pin-modal__icons">
                                    <legend>Icon</legend>
                                    <?php foreach ($icon_options as $icon_class => $icon_label) { ?>
                                        <label title="<?php echo h($icon_label); ?>">
                                            <input type="radio" name="category_icon" value="<?php echo h($icon_class); ?>">
                                            <span><i class="fa <?php echo h($icon_class); ?>" aria-hidden="true"></i><small><?php echo h($icon_label); ?></small></span>
                                        </label>
                                    <?php } ?>
                                </fieldset>
                                <p class="links-pin-modal__error" data-pin-edit-error role="alert" hidden></p>
                                <div class="links-pin-modal__actions">
                                    <button type="button" class="links-modal-btn links-modal-btn--close" data-pin-back>Back</button>
                                    <button type="submit" class="links-modal-btn links-modal-btn--edit"><i class="fa fa-save" aria-hidden="true"></i> Save category</button>
                                </div>
                            </form>
                        </section>

                        <section class="links-pin-modal__delete" id="links-pin-delete" hidden aria-labelledby="links-pin-delete-title">
                            <h6 id="links-pin-delete-title">Delete category</h6>
                            <form method="post" action="<?php echo h($return_uri); ?>" data-pin-delete-form>
                                <?php echo static::links_pin_csrf_token_tag(); ?>
                                <input type="hidden" name="links_pin_action" value="delete_category">
                                <input type="hidden" name="category_id" value="">
                                <p class="links-pin-modal__delete-message"></p>
                                <label class="links-pin-modal__replacement" hidden>Move its links to
                                    <select name="replacement_category_id">
                                        <option value="">Choose a category</option>
                                        <?php foreach ($categories as $candidate) { ?>
                                            <option value="<?php echo h((string)$candidate->id); ?>"><?php echo h($candidate->category); ?></option>
                                        <?php } ?>
                                    </select>
                                </label>
                                <p class="links-pin-modal__error" data-pin-delete-error role="alert" hidden></p>
                                <div class="links-pin-modal__actions">
                                    <button type="button" class="links-modal-btn links-modal-btn--close" data-pin-back>Back</button>
                                    <button type="submit" class="links-pin-modal__danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete category</button>
                                </div>
                            </form>
                        </section>

                        <form method="post" action="<?php echo h($return_uri); ?>" class="links-pin-modal__existing">
                            <?php echo static::links_pin_csrf_token_tag(); ?>
                            <input type="hidden" name="links_pin_action" value="save_pins">
                            <div class="links-pin-modal__list-header">
                                <h6>Existing categories</h6>
                                <input id="links-pin-search" type="search" placeholder="Find a category" aria-label="Find a category">
                            </div>
                            <div class="links-pin-modal__list">
                                <?php foreach ($categories as $index => $category) {
                                    $name = (string)$category->category;
                                    $key = function_exists('mb_strtolower') ? mb_strtolower($name, 'UTF-8') : strtolower($name);
                                    $column = $by_value[$key] ?? null;
                                    $checked = $column && (int)$column->active === 1;
                                    $rank = $column ? (int)$column->rank : (($index + 1) * 10);
                                    $id = (int)$category->id;
                                    $icon = static::normal_category_icon($category->icon ?? 'fa-folder-o');
                                    $link_count = $link_counts[$id] ?? 0;
                                    ?>
                                    <div class="links-pin-modal__choice" data-pin-category data-id="<?php echo h((string)$id); ?>" data-name="<?php echo h($name); ?>" data-category-rank="<?php echo h((string)$category->rank); ?>" data-icon="<?php echo h($icon); ?>" data-link-count="<?php echo h((string)$link_count); ?>">
                                        <label for="links-pin-choice-<?php echo h((string)$id); ?>">
                                            <input id="links-pin-choice-<?php echo h((string)$id); ?>" type="checkbox" name="pinned_category_ids[]" value="<?php echo h((string)$id); ?>" data-pin-toggle<?php echo $checked ? ' checked' : ''; ?>>
                                            <span class="links-pin-modal__switch" aria-hidden="true"></span>
                                            <i class="fa <?php echo h($icon); ?>" aria-hidden="true"></i>
                                            <span><?php echo h($name); ?></span>
                                        </label>
                                        <input type="number" min="0" name="pin_ranks[<?php echo h((string)$id); ?>]" value="<?php echo h((string)$rank); ?>" aria-label="Order for <?php echo h($name); ?>">
                                        <button type="button" class="links-pin-modal__row-action" data-pin-edit-button title="Edit <?php echo h($name); ?>" aria-label="Edit <?php echo h($name); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                        <button type="button" class="links-pin-modal__row-action links-pin-modal__row-action--delete" data-pin-delete-button title="Delete <?php echo h($name); ?>" aria-label="Delete <?php echo h($name); ?>"<?php echo strcasecmp($name, 'Others') === 0 ? ' disabled' : ''; ?>><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </div>
                                <?php } ?>
                            </div>
                            <p class="links-pin-modal__error" id="links-pin-action-error" role="alert" hidden></p>
                            <p class="links-pin-modal__count" aria-live="polite"></p>
                            <div class="links-pin-modal__actions">
                                <button type="button" class="links-modal-btn links-modal-btn--close" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="links-modal-btn links-modal-btn--edit"><i class="fa fa-save" aria-hidden="true"></i> Save order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

    private static function links_pin_csrf_token_tag()
    {
        $id = 'links_pin';

        if (!isset($_SESSION['csrf_token' . $id]) || !csrf_token_is_recent($id)) {
            $token = create_csrf_token($id);
        } else {
            $token = $_SESSION['csrf_token' . $id];
        }

        return "<input type=\"hidden\" name=\"csrf_token{$id}\" value=\"" . h($token) . "\">";
    }

    private static function unpin($id)
    {
        global $database;

        $database->execute_prepared(
            "UPDATE " . static::$table_name . " SET active=0 WHERE id=?",
            [(int)$id],
            "i"
        );
    }

    private static function active_columns($source_field)
    {
        $source_field = static::normal_source_field($source_field);

        return static::find_by_sql_prepared(
            "SELECT * FROM " . static::$table_name . " WHERE active=1 AND source_field=? ORDER BY `rank` ASC, id ASC",
            [$source_field],
            "s"
        );
    }

    private static function is_pinned($source_field, $source_value)
    {
        $source_field = static::normal_source_field($source_field);
        $source_value = trim((string)$source_value);

        $rows = static::find_by_sql_prepared(
            "SELECT * FROM " . static::$table_name . " WHERE active=1 AND source_field=? AND source_value=? LIMIT 1",
            [$source_field, $source_value],
            "ss"
        );

        return !empty($rows);
    }

    private static function next_rank()
    {
        global $database;

        $result = $database->query("SELECT COALESCE(MAX(`rank`), 0) + 10 AS next_rank FROM " . static::$table_name);
        $row = mysqli_fetch_assoc($result);

        return (int)($row['next_rank'] ?? 10);
    }

    private static function selected_filter_value()
    {
        return isset($_GET['category']) ? trim((string)$_GET['category']) : '';
    }

    private static function normal_source_field($source_field)
    {
        $source_field = trim((string)$source_field);
        $allowed = ['category', 'sub_category_1', 'sub_category_2'];

        return in_array($source_field, $allowed, true) ? $source_field : 'category';
    }

    private static function ensure_table()
    {
        static $ready = false;
        global $database;

        if ($ready) {
            return;
        }

        $database->query(
            "CREATE TABLE IF NOT EXISTS `" . static::$table_name . "` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `source_field` varchar(40) NOT NULL DEFAULT 'category',
                `source_value` varchar(120) NOT NULL,
                `label` varchar(120) NOT NULL,
                `rank` int(11) NOT NULL DEFAULT 10,
                `active` tinyint(1) NOT NULL DEFAULT 1,
                `username` varchar(80) DEFAULT NULL,
                PRIMARY KEY (`id`),
                UNIQUE KEY `source_value_unique` (`source_field`, `source_value`),
                KEY `rank` (`rank`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8"
        );

        $ready = true;
    }

    private static function seed_defaults()
    {
        static $seeded = false;
        global $database;

        if ($seeded) {
            return;
        }

        $result = $database->query("SELECT COUNT(*) AS total FROM " . static::$table_name);
        $row = mysqli_fetch_assoc($result);

        if ((int)($row['total'] ?? 0) === 0) {
            $defaults = ['C#', 'C#_2', 'C#_3', 'Xamarin', 'SQLServer'];
            $rank = 10;

            foreach ($defaults as $value) {
                $database->execute_prepared(
                    "INSERT INTO " . static::$table_name . " (source_field, source_value, label, `rank`, active, username) VALUES ('category', ?, ?, ?, 1, 'legacy')",
                    [$value, $value, $rank],
                    "ssi"
                );
                $rank += 10;
            }
        }

        $seeded = true;
    }
}
