<?php

class LinksQuickLink extends DatabaseObject
{
    protected static $table_name = "links_quick_links";
    protected static $db_fields = ['id', 'section', 'name', 'web_address', 'rank', 'active', 'username'];

    public static $required_fields = ['section', 'name', 'web_address', 'rank', 'active'];

    protected static $db_fields_table_display_short = ['id', 'section', 'name', 'web_address', 'rank', 'active'];
    protected static $db_fields_table_display_full = ['id', 'section', 'name', 'web_address', 'rank', 'active', 'username'];
    protected static $db_field_exclude_table_display_sort = null;

    public static $fields_numeric = ['id', 'rank', 'active'];
    public static $get_form_element = ['section', 'name', 'web_address', 'rank', 'active'];
    public static $get_form_element_others = [];
    public static $form_default_value = ['rank' => '10', 'active' => '1'];
    protected static $form_properties = [
        'section' => [
            'type' => 'text',
            'name' => 'section',
            'label_text' => 'Section',
            'placeholder' => 'Social and Tools',
            'required' => true,
        ],
        'name' => [
            'type' => 'text',
            'name' => 'name',
            'label_text' => 'Name',
            'placeholder' => 'Facebook',
            'required' => true,
        ],
        'web_address' => [
            'type' => 'url',
            'name' => 'web_address',
            'label_text' => 'Website',
            'placeholder' => 'https://example.com',
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
    public static $db_field_search = ['search_all', 'section', 'name', 'web_address', 'active'];

    public static $page_name = "LinksQuickLink";
    public static $page_manage = "/public/admin/crud/ajax/manage_ajax.php?class_name=LinksQuickLink";
    public static $page_new = "/public/admin/crud/ajax/new_ajax.php?class_name=LinksQuickLink";
    public static $page_edit = "/public/admin/crud/ajax/edit_ajax.php?class_name=LinksQuickLink";
    public static $page_delete = "/public/admin/crud/ajax/delete_ajax.php?class_name=LinksQuickLink";
    public static $position_table = "positionRight";
    public static $form_class_dependency = [];

    public $id;
    public $section;
    public $name;
    public $web_address;
    public $rank;
    public $active;
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

        if (!request_is_post() || ($_POST['links_quick_action'] ?? '') !== 'unpin') {
            return;
        }

        if (!User::is_kamy()) {
            $session->message('Sorry, only Kamy can change quick links.');
            redirect_to(current_request_uri());
        }

        if (!request_is_same_domain() || !csrf_token_is_valid('links_quick') || !csrf_token_is_recent('links_quick')) {
            $session->message('Sorry, request was not valid.');
            redirect_to(current_request_uri());
        }

        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        if ($id === false || $id === null) {
            $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        }

        if ($id) {
            static::ensure_table();
            static::unpin($id);
            $session->message('Quick link unpinned.');
            $session->ok(true);
        }

        redirect_to(current_request_uri());
    }

    public static function public_sections(array $defaults)
    {
        static::ensure_table();
        static::seed_defaults($defaults);

        $sections = [];
        $rows = static::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE active=1 ORDER BY id ASC");

        foreach ($rows as $row) {
            if (!isset($sections[$row->section])) {
                $sections[$row->section] = [
                    'title' => $row->section,
                    'tone' => static::section_tone($row->section),
                    'links' => [],
                ];
            }

            $sections[$row->section]['links'][] = [
                'id' => $row->id,
                'label' => $row->name,
                'href' => $row->web_address,
                'section' => $row->section,
                'rank' => $row->rank,
                'active' => $row->active,
            ];
        }

        foreach ($sections as &$section) {
            usort($section['links'], function ($a, $b) {
                $rank_compare = ((int)$a['rank']) <=> ((int)$b['rank']);

                if ($rank_compare !== 0) {
                    return $rank_compare;
                }

                return ((int)$a['id']) <=> ((int)$b['id']);
            });
        }
        unset($section);

        return array_values($sections);
    }

    public static function render_modal_link(array $link)
    {
        if (!User::is_kamy() || empty($link['id'])) {
            return '';
        }

        $id = (int)$link['id'];
        $record = static::find_by_id($id);

        if (!$record) {
            return '';
        }

        $div_id = "quickLinkModal" . $id;
        $edit_url = static::$page_edit . "&id=" . urlencode((string)$id);
        $delete_url = append_query_param(static::$page_delete . "&id=" . urlencode((string)$id), 'return_to', current_request_uri());
        $delete_confirm = "return confirm(" . j("Are you sure you want to delete " . $record->name . "?") . ");";

        $output = "<small class='gemini-links-static-link__info'>";
        $output .= "<a class='links-info-trigger' href='#' data-target='#" . h($div_id) . "' onclick=\"return window.linksOpenDetailModal ? window.linksOpenDetailModal('" . h($div_id) . "') : true;\" aria-label='View details for " . h($record->name) . "' title='View details'>";
        $output .= "<span class='sr-only'>View details</span><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span>";
        $output .= "</a>";
        $output .= "</small>";
        $output .= "<div class='modal fade' id='" . h($div_id) . "' tabindex='-1' role='dialog' aria-hidden='true'>";
        $output .= "    <div class='modal-dialog'>";
        $output .= "        <div class='modal-content'>";
        $output .= "            <div class='modal-header'>";
        $output .= "                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        $output .= "                <h5 class='modal-title'>" . h($record->name) . " <span>Quick link</span></h5>";
        $output .= "            </div>";
        $output .= "            <div class='modal-body'>";
        $output .= "                <dl class='dl-horizontal dd-color-blue'>";
        $output .= "                    <dt><strong>ID:</strong></dt><dd>" . h($record->id) . "</dd>";
        $output .= "                    <dt><strong>Section:</strong></dt><dd>" . h($record->section) . "</dd>";
        $output .= "                    <dt><strong>Name:</strong></dt><dd>" . h($record->name) . "</dd>";
        $output .= "                    <dt><strong>Website:</strong></dt><dd><a target='_blank' rel='noopener noreferrer' href='" . h($record->web_address) . "'>" . h($record->web_address) . "</a></dd>";
        $output .= "                    <dt><strong>Rank:</strong></dt><dd>" . h($record->rank) . "</dd>";
        $output .= "                    <dt><strong>Active:</strong></dt><dd>" . ((int)$record->active === 1 ? 'Yes' : 'No') . "</dd>";
        $output .= "                </dl>";
        $output .= "            </div>";
        $output .= "            <div class='modal-footer'>";
        $output .= "                <div class='links-modal-actions links-modal-actions--quick' role='group' aria-label='Quick link actions'>";
        $output .= "                    <a class='links-modal-btn links-modal-btn--edit btn btn-primary' href='" . h($edit_url) . "'><i class='fa fa-pencil' aria-hidden='true'></i> Edit</a>";
        $output .= "                    <form method='post' action='" . h(current_request_uri()) . "'>";
        $output .= static::links_quick_csrf_token_tag();
        $output .= "                        <input type='hidden' name='links_quick_action' value='unpin'>";
        $output .= "                        <input type='hidden' name='id' value='" . h($record->id) . "'>";
        $output .= "                        <button type='submit' class='links-modal-btn links-modal-btn--copy btn btn-success'><i class='fa fa-thumb-tack' aria-hidden='true'></i> Unpin</button>";
        $output .= "                    </form>";
        $output .= "                    <a class='links-modal-btn links-modal-btn--delete btn btn-danger' href='" . h($delete_url) . "' onclick='" . h($delete_confirm) . "'><i class='fa fa-trash' aria-hidden='true'></i> Delete</a>";
        $output .= "                    <button type='button' class='links-modal-btn links-modal-btn--close btn btn-info' data-dismiss='modal' onclick='return window.linksCloseModalButton ? window.linksCloseModalButton(this) : true;'><i class='fa fa-times' aria-hidden='true'></i> Close</button>";
        $output .= "                </div>";
        $output .= "            </div>";
        $output .= "        </div>";
        $output .= "    </div>";
        $output .= "</div>";

        return $output;
    }

    private static function seed_defaults(array $defaults)
    {
        static $seeded = false;
        global $database;

        if ($seeded) {
            return;
        }

        $result = $database->query("SELECT COUNT(*) AS total FROM " . static::$table_name);
        $row = mysqli_fetch_assoc($result);

        if ((int)($row['total'] ?? 0) === 0) {
            foreach ($defaults as $section) {
                $title = trim((string)($section['title'] ?? ''));
                $rank = 10;

                if ($title === '') {
                    continue;
                }

                foreach (($section['links'] ?? []) as $link) {
                    $label = trim((string)($link['label'] ?? ''));
                    $href = trim((string)($link['href'] ?? ''));

                    if ($label === '' || $href === '') {
                        continue;
                    }

                    $database->execute_prepared(
                        "INSERT INTO " . static::$table_name . " (section, name, web_address, `rank`, active, username) VALUES (?, ?, ?, ?, 1, 'legacy')",
                        [$title, $label, $href, $rank],
                        "sssi"
                    );
                    $rank += 10;
                }
            }
        }

        $seeded = true;
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

    private static function links_quick_csrf_token_tag()
    {
        $id = 'links_quick';

        if (!isset($_SESSION['csrf_token' . $id]) || !csrf_token_is_recent($id)) {
            $token = create_csrf_token($id);
        } else {
            $token = $_SESSION['csrf_token' . $id];
        }

        return "<input type=\"hidden\" name=\"csrf_token{$id}\" value=\"" . h($token) . "\">";
    }

    private static function section_tone($section)
    {
        $tones = [
            'Social and Tools' => 'cyan',
            'Israel' => 'blue',
            'Antisemitism' => 'indigo',
        ];

        return $tones[$section] ?? 'blue';
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
                `section` varchar(120) NOT NULL,
                `name` varchar(180) NOT NULL,
                `web_address` text NOT NULL,
                `rank` int(11) NOT NULL DEFAULT 10,
                `active` tinyint(1) NOT NULL DEFAULT 1,
                `username` varchar(80) DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `section_rank` (`section`, `rank`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8"
        );

        $ready = true;
    }
}
