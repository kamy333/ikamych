<?php

class LinksCategoryVisibility extends DatabaseObject
{
    protected static $table_name = "links_category_visibility";
    protected static $db_fields = ['id', 'source_field', 'source_value', 'hidden', 'rank', 'username'];

    public static $required_fields = ['source_field', 'source_value', 'hidden'];

    protected static $db_fields_table_display_short = ['id', 'source_field', 'source_value', 'hidden', 'rank'];
    protected static $db_fields_table_display_full = ['id', 'source_field', 'source_value', 'hidden', 'rank', 'username'];
    protected static $db_field_exclude_table_display_sort = null;

    public static $fields_numeric = ['id', 'hidden', 'rank'];
    public static $get_form_element = ['source_field', 'source_value', 'hidden', 'rank'];
    public static $get_form_element_others = [];
    public static $form_default_value = ['source_field' => 'category', 'hidden' => '1', 'rank' => '10'];
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
        'hidden' => [
            'type' => 'number',
            'name' => 'hidden',
            'label_text' => 'Hidden',
            'min' => 0,
            'placeholder' => '1',
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
    ];
    protected static $form_properties_search = [];
    public static $db_field_search = ['search_all', 'source_field', 'source_value', 'hidden', 'rank'];

    public static $page_name = "LinksCategoryVisibility";
    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=LinksCategoryVisibility";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=LinksCategoryVisibility";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=LinksCategoryVisibility";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=LinksCategoryVisibility";
    public static $position_table = "positionRight";
    public static $form_class_dependency = ['Links'];

    public $id;
    public $source_field;
    public $source_value;
    public $hidden;
    public $rank;
    public $username;

    public function form_validation()
    {
        $valid = new FormValidation();
        $valid->validate_presences(self::$required_fields);
        return $valid;
    }

    public static function handle_public_request()
    {
        global $session;

        if (!request_is_post() || ($_POST['links_visibility_action'] ?? '') !== 'save') {
            return;
        }

        if (!User::is_kamy()) {
            $session->message('Sorry, only Kamy can change visible link categories.');
            redirect_to(current_request_uri());
        }

        if (!request_is_same_domain() || !csrf_token_is_valid('links_visibility') || !csrf_token_is_recent('links_visibility')) {
            $session->message('Sorry, request was not valid.');
            redirect_to(current_request_uri());
        }

        static::ensure_table();
        static::save_visibility($_POST['all_values'] ?? [], $_POST['visible_values'] ?? [], $_POST['rank_values'] ?? []);
        $session->message('Visible link categories updated.');
        $session->ok(true);
        redirect_to(current_request_uri());
    }

    public static function controls()
    {
        if (!User::is_kamy()) {
            return '';
        }

        static::ensure_table();

        $output = "<div class='links-visibility-panel'>";
        $output .= "<button type='button' class='links-visibility-panel__button' data-toggle='modal' data-target='#links-visibility-modal'><i class='fa fa-eye' aria-hidden='true'></i> Visible categories</button>";
        $output .= "<a class='links-visibility-panel__manage' href='" . h(static::$page_manage) . "'><i class='fa fa-list' aria-hidden='true'></i> Manage hidden</a>";
        $output .= "</div>";
        $output .= static::modal();

        return $output;
    }

    public static function is_hidden($source_field, $source_value)
    {
        $source_field = static::normal_source_field($source_field);
        $source_value = trim((string)$source_value);

        if ($source_value === '') {
            return true;
        }

        $hidden = static::hidden_map();
        $key = static::key($source_field, $source_value);

        return isset($hidden[$key]);
    }

    public static function sort_values($source_field, array $values)
    {
        $ranks = static::rank_map($source_field);
        $original_positions = [];

        foreach (array_values($values) as $index => $value) {
            $original_positions[static::key($source_field, $value)] = $index;
        }

        usort($values, function ($a, $b) use ($source_field, $ranks, $original_positions) {
            $a_key = static::key($source_field, $a);
            $b_key = static::key($source_field, $b);
            $a_rank = $ranks[$a_key] ?? 100000;
            $b_rank = $ranks[$b_key] ?? 100000;

            if ($a_rank !== $b_rank) {
                return $a_rank <=> $b_rank;
            }

            return ($original_positions[$a_key] ?? 0) <=> ($original_positions[$b_key] ?? 0);
        });

        return $values;
    }

    private static function modal()
    {
        $groups = static::all_groups();
        $output = "<div class='modal fade links-visibility-modal' id='links-visibility-modal' tabindex='-1' role='dialog' aria-labelledby='links-visibility-modal-title' aria-hidden='true'>";
        $output .= "    <div class='modal-dialog modal-lg' role='document'>";
        $output .= "        <div class='modal-content'>";
        $output .= "            <form method='post' action='" . h(current_request_uri()) . "'>";
        $output .= "                <div class='modal-header'>";
        $output .= "                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        $output .= "                    <h5 class='modal-title' id='links-visibility-modal-title'>Visible link categories</h5>";
        $output .= "                </div>";
        $output .= "                <div class='modal-body'>";
        $output .= static::links_visibility_csrf_token_tag();
        $output .= "                    <input type='hidden' name='links_visibility_action' value='save'>";
        $output .= "                    <p class='links-visibility-modal__intro'>Uncheck categories that should be hidden from the links page.</p>";
        $output .= "                    <div class='links-visibility-modal__grid'>";

        foreach ($groups as $source_field => $group) {
            $output .= "                    <section class='links-visibility-modal__group'>";
            $output .= "                        <h6>" . h($group['label']) . "</h6>";

            $fallback_rank = 10;
            foreach ($group['values'] as $value) {
                $encoded = static::encode_value($source_field, $value);
                $checked = static::is_hidden($source_field, $value) ? '' : ' checked';
                $rank = static::rank_for($source_field, $value, $fallback_rank);
                $id = "links-visible-" . preg_replace('/[^a-z0-9_-]+/i', '-', strtolower($source_field . '-' . $value));
                $output .= "                        <label class='links-visibility-choice' for='" . h($id) . "'>";
                $output .= "                            <input type='hidden' name='all_values[]' value='" . h($encoded) . "'>";
                $output .= "                            <input id='" . h($id) . "' type='checkbox' name='visible_values[]' value='" . h($encoded) . "'" . $checked . ">";
                $output .= "                            <span>" . h($value) . "</span>";
                $output .= "                            <input class='links-visibility-choice__rank' type='number' min='0' name='rank_values[" . h($encoded) . "]' value='" . h((string)$rank) . "' aria-label='Sort order for " . h($value) . "'>";
                $output .= "                        </label>";
                $fallback_rank += 10;
            }

            $output .= "                    </section>";
        }

        $output .= "                    </div>";
        $output .= "                </div>";
        $output .= "                <div class='modal-footer links-visibility-modal__footer'>";
        $output .= "                    <button type='button' class='links-modal-btn links-modal-btn--close' data-dismiss='modal'><i class='fa fa-times' aria-hidden='true'></i> Cancel</button>";
        $output .= "                    <button type='submit' class='links-modal-btn links-modal-btn--edit'><i class='fa fa-save' aria-hidden='true'></i> Save visibility</button>";
        $output .= "                </div>";
        $output .= "            </form>";
        $output .= "        </div>";
        $output .= "    </div>";
        $output .= "</div>";

        return $output;
    }

    private static function save_visibility(array $all_values, array $visible_values, array $rank_values)
    {
        global $database, $session;

        $all = static::decode_values($all_values);
        $visible = static::decode_values($visible_values);
        $visible_keys = [];

        foreach ($visible as $item) {
            $visible_keys[static::key($item['source_field'], $item['source_value'])] = true;
        }

        $database->query("DELETE FROM " . static::$table_name);
        $username = isset($session->user_id) ? (string)$session->user_id : '';

        foreach ($all as $item) {
            $key = static::key($item['source_field'], $item['source_value']);
            $encoded = static::encode_value($item['source_field'], $item['source_value']);
            $rank = filter_var($rank_values[$encoded] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]);
            if ($rank === false || $rank === null) {
                $rank = 100000;
            }
            $hidden = isset($visible_keys[$key]) ? 0 : 1;

            $database->execute_prepared(
                "INSERT INTO " . static::$table_name . " (source_field, source_value, hidden, `rank`, username) VALUES (?, ?, ?, ?, ?)",
                [$item['source_field'], $item['source_value'], $hidden, $rank, $username],
                "ssiis"
            );
        }
    }

    private static function decode_values(array $values)
    {
        $decoded = [];

        foreach ($values as $value) {
            $parts = explode('|', (string)$value, 2);

            if (count($parts) !== 2) {
                continue;
            }

            $source_field = static::normal_source_field($parts[0]);
            $source_value = trim((string)base64_decode($parts[1], true));

            if ($source_value === '') {
                continue;
            }

            $decoded[static::key($source_field, $source_value)] = [
                'source_field' => $source_field,
                'source_value' => $source_value,
            ];
        }

        return array_values($decoded);
    }

    private static function encode_value($source_field, $source_value)
    {
        return static::normal_source_field($source_field) . '|' . base64_encode((string)$source_value);
    }

    private static function all_groups()
    {
        return [
            'category' => [
                'label' => 'Categories',
                'values' => static::values_from_records(Links::find_all_category_from_links(), 'category'),
            ],
            'sub_category_1' => [
                'label' => 'Sub category 1',
                'values' => static::values_from_records(Links::find_all_category_1_from_links(), 'sub_category_1'),
            ],
            'sub_category_2' => [
                'label' => 'Sub category 2',
                'values' => static::values_from_records(Links::find_all_category_2_from_links(), 'sub_category_2'),
            ],
        ];
    }

    private static function values_from_records(array $records, $field)
    {
        $values = [];

        foreach ($records as $record) {
            $value = trim((string)($record->$field ?? ''));

            if ($value === '') {
                continue;
            }

            $values[$value] = $value;
        }

        return static::sort_values($field, array_values($values));
    }

    private static function hidden_map()
    {
        static $hidden = null;

        if ($hidden !== null) {
            return $hidden;
        }

        static::ensure_table();
        $hidden = [];
        $rows = static::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE hidden=1");

        foreach ($rows as $row) {
            $hidden[static::key($row->source_field, $row->source_value)] = true;
        }

        return $hidden;
    }

    private static function rank_map($source_field = null)
    {
        static $ranks = null;

        if ($ranks === null) {
            static::ensure_table();
            $ranks = [];
            $rows = static::find_by_sql("SELECT * FROM " . static::$table_name);

            foreach ($rows as $row) {
                $ranks[static::key($row->source_field, $row->source_value)] = (int)$row->rank;
            }
        }

        if ($source_field === null) {
            return $ranks;
        }

        $source_field = static::normal_source_field($source_field);
        return array_filter($ranks, function ($key) use ($source_field) {
            return strpos($key, $source_field . '|') === 0;
        }, ARRAY_FILTER_USE_KEY);
    }

    private static function rank_for($source_field, $source_value, $fallback = 100000)
    {
        $ranks = static::rank_map();
        $key = static::key($source_field, $source_value);

        return $ranks[$key] ?? $fallback;
    }

    private static function links_visibility_csrf_token_tag()
    {
        $id = 'links_visibility';

        if (!isset($_SESSION['csrf_token' . $id]) || !csrf_token_is_recent($id)) {
            $token = create_csrf_token($id);
        } else {
            $token = $_SESSION['csrf_token' . $id];
        }

        return "<input type=\"hidden\" name=\"csrf_token{$id}\" value=\"" . h($token) . "\">";
    }

    private static function normal_source_field($source_field)
    {
        $source_field = trim((string)$source_field);
        $allowed = ['category', 'sub_category_1', 'sub_category_2'];

        return in_array($source_field, $allowed, true) ? $source_field : 'category';
    }

    private static function key($source_field, $source_value)
    {
        return static::normal_source_field($source_field) . '|' . strtolower(trim((string)$source_value));
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
                `hidden` tinyint(1) NOT NULL DEFAULT 1,
                `rank` int(11) NOT NULL DEFAULT 10,
                `username` varchar(80) DEFAULT NULL,
                PRIMARY KEY (`id`),
                UNIQUE KEY `source_value_unique` (`source_field`, `source_value`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8"
        );

        static::ensure_rank_column();

        $ready = true;
    }

    private static function ensure_rank_column()
    {
        global $database;

        $result = $database->query("SHOW COLUMNS FROM `" . static::$table_name . "` LIKE 'rank'");

        if (mysqli_num_rows($result) === 0) {
            $database->query("ALTER TABLE `" . static::$table_name . "` ADD COLUMN `rank` int(11) NOT NULL DEFAULT 10 AFTER `hidden`");
        }
    }
}
