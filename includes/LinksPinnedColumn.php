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

        if (!User::is_kamy()) {
            $session->message('Sorry, only Kamy can change pinned link columns.');
            redirect_to(current_request_uri());
        }

        if (!request_is_same_domain() || !csrf_token_is_valid('links_pin') || !csrf_token_is_recent('links_pin')) {
            $session->message('Sorry, request was not valid.');
            redirect_to(current_request_uri());
        }

        static::ensure_table();

        $action = $_POST['links_pin_action'];
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

    public static function pin_controls($source_field = 'category')
    {
        if (!User::is_kamy()) {
            return '';
        }

        static::ensure_table();

        $source_field = static::normal_source_field($source_field);
        $selected = static::selected_filter_value();

        if ($selected === '') {
            return "<div class='links-pin-panel'><span class='links-pin-panel__note'>Choose a category, then pin it as a column.</span></div>";
        }

        $is_pinned = static::is_pinned($source_field, $selected);
        $output = "<div class='links-pin-panel'>";
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

        $output .= "<a class='links-pin-panel__manage' href='" . h(static::$page_manage) . "'><i class='fa fa-list' aria-hidden='true'></i> Manage pins</a>";
        $output .= "</div>";

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
