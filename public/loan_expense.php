<?php require_once('../includes/initialize.php');
$session->confirmation_protected_page();

if (!User::is_caroline() && !User::is_weslley()) {
    redirect_to('/public/index.php');
}

$stylesheets = "";
$layout_context = "public";
$active_menu = "about";
$fluid_view = true;
$javascript = "";
$incl_message_error = true;

if (!function_exists('loan_exp_int')) {
    function loan_exp_int($value, $default = 1)
    {
        $int = filter_var($value, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);
        return $int === false ? (int) $default : (int) $int;
    }

    function loan_exp_decimal($value)
    {
        $value = trim((string) $value);
        if ($value === "" || !is_numeric($value)) {
            return null;
        }

        return (float) $value;
    }

    function loan_exp_sql_filters($alias, $category, $amountFilter, $amountMin, $amountMax, $datePeriod, $dateYear, $dateMonth, array &$params, &$types)
    {
        $sql = "";

        if ($category !== "All") {
            $sql .= " AND {$alias}.expense_type_id IN ($category) ";
        }

        if ($amountFilter === "negative") {
            $sql .= " AND {$alias}.amount < 0 ";
        } elseif ($amountFilter === "range") {
            if ($amountMin !== null) {
                $sql .= " AND {$alias}.amount >= ? ";
                $params[] = $amountMin;
                $types .= "d";
            }
            if ($amountMax !== null) {
                $sql .= " AND {$alias}.amount <= ? ";
                $params[] = $amountMax;
                $types .= "d";
            }
        }

        if ($datePeriod === "year" && $dateYear !== null) {
            $sql .= " AND {$alias}.expense_date >= ? AND {$alias}.expense_date < ? ";
            $params[] = sprintf('%04d-01-01', $dateYear);
            $params[] = sprintf('%04d-01-01', $dateYear + 1);
            $types .= "ss";
        } elseif ($datePeriod === "month" && $dateMonth instanceof DateTime) {
            $params[] = $dateMonth->format('Y-m-01');
            $params[] = (clone $dateMonth)->modify('+1 month')->format('Y-m-01');
            $sql .= " AND {$alias}.expense_date >= ? AND {$alias}.expense_date < ? ";
            $types .= "ss";
        }

        return $sql;
    }

    function loan_exp_clean_text($value, $max = 1000)
    {
        return substr(trim((string) $value), 0, $max);
    }

    function loan_exp_date_or_today($value)
    {
        $value = trim((string) $value);
        $date = DateTime::createFromFormat('Y-m-d', $value);

        if (!$date || $date->format('Y-m-d') !== $value) {
            return date('Y-m-d');
        }

        return $value;
    }

    function loan_exp_bool_cash($value)
    {
        return (string) $value === "1" ? 1 : 0;
    }

    function loan_exp_current_query(array $overrides = [])
    {
        $query = $_GET;

        foreach ($overrides as $key => $value) {
            if ($value === null || $value === "") {
                unset($query[$key]);
            } else {
                $query[$key] = $value;
            }
        }

        return http_build_query($query);
    }

    function loan_exp_current_url(array $overrides = [])
    {
        $query = loan_exp_current_query($overrides);
        return $_SERVER['PHP_SELF'] . ($query ? "?" . $query : "");
    }

    function loan_exp_pagination_html($page, $totalPages, $totalCount, $offset, $perPage, $position = "bottom")
    {
        $page = (int) $page;
        $totalPages = max(1, (int) $totalPages);
        $totalCount = (int) $totalCount;
        $offset = (int) $offset;
        $perPage = (int) $perPage;
        $showingStart = $totalCount ? $offset + 1 : 0;
        $showingEnd = min($offset + $perPage, $totalCount);
        $class = "loan-exp-pagination loan-exp-pagination--" . ($position === "top" ? "top" : "bottom");
        $previousDisabled = $page <= 1 ? " class='disabled'" : "";
        $nextDisabled = $page >= $totalPages ? " class='disabled'" : "";
        $start = max(1, $page - 2);
        $end = min($totalPages, $page + 2);

        $html = "<div class='" . h($class) . "'>";
        $html .= "<div>Showing " . h($showingStart) . "-" . h($showingEnd) . " of " . h(number_format($totalCount)) . "</div>";
        $html .= "<ul class='pagination'>";
        $html .= "<li{$previousDisabled}><a href='" . h($page <= 1 ? "#" : loan_exp_current_url(["page" => $page - 1])) . "'>&laquo;</a></li>";

        for ($i = $start; $i <= $end; $i++) {
            $active = $i === $page ? " class='active'" : "";
            $html .= "<li{$active}><a href='" . h(loan_exp_current_url(["page" => $i])) . "'>" . h($i) . "</a></li>";
        }

        $html .= "<li{$nextDisabled}><a href='" . h($page >= $totalPages ? "#" : loan_exp_current_url(["page" => $page + 1])) . "'>&raquo;</a></li>";
        $html .= "</ul></div>";

        return $html;
    }

    function loan_exp_safe_return_url($value)
    {
        $value = trim((string) $value);
        if ($value === "") {
            return null;
        }

        $parts = parse_url($value);
        if ($parts === false || isset($parts["scheme"]) || isset($parts["host"])) {
            return null;
        }

        $path = $parts["path"] ?? "";
        if ($path !== $_SERVER['PHP_SELF']) {
            return null;
        }

        return $path
            . (isset($parts["query"]) ? "?" . $parts["query"] : "")
            . (isset($parts["fragment"]) ? "#" . $parts["fragment"] : "");
    }

    function loan_exp_url_with_params($url, array $params)
    {
        $parts = parse_url($url);
        if ($parts === false) {
            return $url;
        }

        $query = [];
        if (isset($parts["query"])) {
            parse_str($parts["query"], $query);
        }

        foreach ($params as $key => $value) {
            if ($value === null || $value === "") {
                unset($query[$key]);
            } else {
                $query[$key] = $value;
            }
        }

        return ($parts["path"] ?? "")
            . ($query ? "?" . http_build_query($query) : "")
            . (isset($parts["fragment"]) ? "#" . $parts["fragment"] : "");
    }

    function loan_exp_redirect_back($status, $fallback = null, $id = null)
    {
        $fallback = loan_exp_safe_return_url($fallback) ?: loan_exp_current_url(["page" => 1]);
        redirect_to(loan_exp_url_with_params($fallback, [
            "loan_status" => $status,
            "loan_id" => $id,
        ]));
    }

    function loan_exp_select_options($items, $valueField, $labelField, $selectedValue)
    {
        $output = "";

        foreach ($items as $item) {
            $value = (string) $item->$valueField;
            $selected = $value === (string) $selectedValue ? " selected" : "";
            $output .= "<option{$selected} value='" . h($value) . "'>" . h($item->$labelField) . "</option>";
        }

        return $output;
    }

    function loan_exp_format_amount($number)
    {
        $number = is_numeric($number) ? (float) $number : 0.0;
        $class = $number < 0 ? "loan-exp-negative" : "";
        return "<span class='" . h($class) . "'>" . h(number_format($number, 2)) . "</span>";
    }

    function loan_exp_comment_text($comment)
    {
        $comment = strip_tags(html_entity_decode((string) $comment, ENT_QUOTES, 'UTF-8'));
        return trim(preg_replace('/\s+/', ' ', $comment));
    }

    function loan_exp_order_options()
    {
        return [
            "id" => ["label" => "ID", "sql" => "t1.id"],
            "name" => ["label" => "Name", "sql" => "t2.person_name"],
            "date" => ["label" => "Date", "sql" => "t1.expense_date"],
            "amount_chf" => ["label" => "Amount CHF", "sql" => "amountCHF"],
            "amount" => ["label" => "Amount CCY", "sql" => "t1.amount"],
            "comment" => ["label" => "Comment", "sql" => "t1.comment"],
            "currency" => ["label" => "Currency", "sql" => "t4.currency"],
            "cash" => ["label" => "Cash", "sql" => "t1.cash"],
            "type" => ["label" => "Type", "sql" => "t3.expense_type"],
            "category" => ["label" => "Category", "sql" => "t3.category"],
        ];
    }

    function loan_exp_order_value($value)
    {
        $options = loan_exp_order_options();
        return array_key_exists((string) $value, $options) ? (string) $value : "id";
    }

    function loan_exp_sort_header($key, $label, $align = "")
    {
        global $order_by, $sort;

        $isActive = $order_by === $key;
        $nextSort = $isActive && $sort === "ASC" ? "DESC" : "ASC";
        $icon = "";

        if ($isActive) {
            $icon = $sort === "ASC" ? " <i class='fa fa-sort-asc' aria-hidden='true'></i>" : " <i class='fa fa-sort-desc' aria-hidden='true'></i>";
        }

        $class = trim("loan-exp-sort-link " . ($isActive ? "loan-exp-sort-link--active" : "") . " " . $align);
        return "<a class='" . h($class) . "' href='" . h(loan_exp_current_url(["order_by" => $key, "sort" => $nextSort, "page" => 1, "loan_status" => null])) . "'>" . h($label) . $icon . "</a>";
    }

    function loan_exp_fetch_rows($sql, array $params = [], $types = "")
    {
        global $database;
        $result = empty($params) ? $database->query($sql) : $database->query_prepared($sql, $params, $types);
        $rows = [];

        while ($row = $database->fetch_array($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    function loan_exp_first_value($sql, array $params = [], $types = "", $field = null)
    {
        $rows = loan_exp_fetch_rows($sql, $params, $types);
        if (!$rows) {
            return null;
        }

        $row = array_shift($rows);
        if ($field !== null) {
            return $row[$field] ?? null;
        }

        return array_shift($row);
    }

    function loan_exp_document_links($document)
    {
        $document = trim((string) $document);
        if ($document === "") {
            return "";
        }

        $links = "";
        $folder = "/public/img/maman_document/";
        $viewer = "/Inspinia/loan_exp_viewer.php";
        $documents = explode(",", $document);

        foreach ($documents as $file) {
            $file = trim($file);
            if ($file === "") {
                continue;
            }

            $path_info = pathinfo($file);
            $extension = strtolower($path_info["extension"] ?? "");
            $full_path = $folder . $file;
            $disk_path = ($_SERVER["DOCUMENT_ROOT"] ?? "") . $full_path;
            if (!is_file($disk_path)) {
                continue;
            }

            $safe_title = h($file);
            if ($extension === "pdf") {
                $links .= "<a href='" . h($full_path) . "' target='_blank' rel='noopener noreferrer'><button type='button' class='btn btn-danger btn-xs' data-toggle='tooltip' data-placement='left' title='{$safe_title}'><i class='fa fa-file-pdf-o'></i></button></a> ";
            } elseif (in_array($extension, ["jpg", "jpeg", "png"], true)) {
                $href = $viewer . "?url=" . u($full_path);
                $links .= "<a href='" . h($href) . "' target='_blank' rel='noopener noreferrer'><button type='button' class='btn btn-info btn-xs' data-toggle='tooltip' data-placement='left' title='{$safe_title}'><i class='fa fa-file-photo-o'></i></button></a> ";
            }
        }

        return trim($links);
    }

    function loan_exp_save_expense(array $data, $id = null)
    {
        global $database;

        $amount = loan_exp_decimal($data["amount"] ?? "");
        $rate = loan_exp_decimal($data["rate"] ?? "1");
        $personId = loan_exp_int($data["person_id"] ?? 0, 0);
        $typeId = loan_exp_int($data["expense_type_id"] ?? 0, 0);
        $currencyId = loan_exp_int($data["ccy_id"] ?? 0, 0);
        $cash = loan_exp_bool_cash($data["cash"] ?? 0);
        $expenseDate = loan_exp_date_or_today($data["expense_date"] ?? "");
        $comment = loan_exp_clean_text($data["comment"] ?? "");
        $document = loan_exp_clean_text($data["document"] ?? "", 500);
        $modificationTime = date('Y-m-d H:i:s');

        if ($amount === null || $amount == 0.0 || $rate === null || $rate <= 0 || $personId < 1 || $typeId < 1 || $currencyId < 1) {
            return false;
        }

        $expensePerson = MyExpensePerson::find_by_id($personId);
        $expenseType = MyExpenseType::find_by_id($typeId);
        $currency = Currency::find_by_id($currencyId);

        if (!$expensePerson || !$expenseType || !$currency) {
            return false;
        }

        if ((float) $expenseType->side < 0 && $amount > 0) {
            $amount = -$amount;
        }
        if ((float) $expenseType->side > 0 && $amount < 0) {
            $amount = -$amount;
        }

        if ($id) {
            $existing = MyExpense::find_by_id((int) $id);
            if (!$existing) {
                return false;
            }

            $sql = "UPDATE myexpense SET amount='" . $database->escape_value($amount) . "',
                cash='" . $database->escape_value($cash) . "',
                ccy_id='" . $database->escape_value($currencyId) . "',
                rate='" . $database->escape_value($rate) . "',
                person_id='" . $database->escape_value($personId) . "',
                expense_type_id='" . $database->escape_value($typeId) . "',
                expense_date='" . $database->escape_value($expenseDate) . "',
                comment='" . $database->escape_value($comment) . "',
                document='" . $database->escape_value($document) . "',
                modification_time='" . $database->escape_value($modificationTime) . "'
                WHERE id='" . $database->escape_value((int) $id) . "' LIMIT 1";
            $database->query($sql);
            return true;
        }

        $expense = new MyExpense();
        $expense->amount = $amount;
        $expense->cash = $cash;
        $expense->ccy_id = $currencyId;
        $expense->rate = $rate;
        $expense->person_id = $personId;
        $expense->expense_type_id = $typeId;
        $expense->expense_date = $expenseDate;
        $expense->comment = $comment;
        $expense->document = $document;
        $expense->modification_time = $modificationTime;

        return $expense->save();
    }

    function loan_exp_delete_expense($id)
    {
        global $database;

        $id = loan_exp_int($id, 0);
        if ($id < 1 || !MyExpense::find_by_id($id)) {
            return false;
        }

        $database->query("DELETE FROM myexpense WHERE id='" . $database->escape_value($id) . "' LIMIT 1");
        return $database->affected_rows() === 1;
    }
}

if (request_is_post() && isset($_POST["loan_exp_action"])) {
    if (!User::is_admin()) {
        loan_exp_redirect_back("forbidden", $_POST["return_to"] ?? null);
    }

    if (!csrf_token_is_valid("loan_exp")) {
        loan_exp_redirect_back("csrf", $_POST["return_to"] ?? null);
    }

    $action = $_POST["loan_exp_action"];
    $actionId = loan_exp_int($_POST["id"] ?? 0, 0);
    $ok = false;

    if ($action === "create") {
        $ok = loan_exp_save_expense($_POST);
    } elseif ($action === "update") {
        $ok = loan_exp_save_expense($_POST, $actionId);
    } elseif ($action === "delete") {
        $ok = loan_exp_delete_expense($actionId);
    }

    loan_exp_redirect_back($ok ? $action . "_success" : $action . "_error", $_POST["return_to"] ?? null, $actionId ?: null);
}

$user = isset($_SESSION["user_id"]) ? User::find_by_id($_SESSION['user_id']) : null;
$p_id = MyExpense::positive_int_or_default($_GET["person_id"] ?? 2, 2);
$persons = MyExpensePerson::find_all();

foreach ($persons as $person_option) {
    if ($person_option->authorized_user) {
        $auth_users = explode(",", $person_option->authorized_user);
        foreach ($auth_users as $auth_user) {
            if ($user && $user->username == trim($auth_user)) {
                $p_id = $person_option->id;
            }
        }
    }
}

$sort = MyExpense::normalize_sort_direction($_GET["sort"] ?? "DESC");
$order_by = loan_exp_order_value($_GET["order_by"] ?? "id");
$order_options = loan_exp_order_options();
$order_sql = $order_options[$order_by]["sql"];
$cat = MyExpense::loan_category_filter_from_request();
$cat_name = MyExpense::get_category_name($cat);
$show_doc = ($_GET["show_hide_doc"] ?? "show_doc") === "show_doc";
$search = trim((string) ($_GET["q"] ?? ""));
$amount_filter = (string) ($_GET["amount_filter"] ?? "any");
$amount_filter = in_array($amount_filter, ["any", "negative", "range"], true) ? $amount_filter : "any";
$amount_min_input = trim((string) ($_GET["amount_min"] ?? ""));
$amount_max_input = trim((string) ($_GET["amount_max"] ?? ""));
$amount_min = loan_exp_decimal($amount_min_input);
$amount_max = loan_exp_decimal($amount_max_input);
$date_period = (string) ($_GET["date_period"] ?? "any");
$date_period = in_array($date_period, ["any", "year", "month"], true) ? $date_period : "any";
$date_year_input = trim((string) ($_GET["date_year"] ?? ""));
$date_year = filter_var($date_year_input, FILTER_VALIDATE_INT, [
    "options" => ["min_range" => 1900, "max_range" => 2100],
]);
$date_year = $date_year === false ? null : (int) $date_year;
$date_month_input = trim((string) ($_GET["date_month"] ?? ""));
$date_month = DateTime::createFromFormat('!Y-m', $date_month_input);
if (!$date_month || $date_month->format('Y-m') !== $date_month_input) {
    $date_month = null;
}
$zero_balance_mode = (string) ($_GET["zero_balance"] ?? "include");
$zero_balance_mode = User::is_admin() && $zero_balance_mode === "exclude" ? "exclude" : "include";

$person_balance_params = [];
$person_balance_types = "";
$person_balance_filters = loan_exp_sql_filters(
    "t1",
    $cat,
    $amount_filter,
    $amount_min,
    $amount_max,
    $date_period,
    $date_year,
    $date_month,
    $person_balance_params,
    $person_balance_types
);
$person_balance_rows = [];
$person_balances = [];

if (User::is_admin()) {
    $person_balance_rows = loan_exp_fetch_rows(
        "SELECT t2.id, t2.person_name, t2.`rank`,
            COALESCE(SUM(
                CASE
                    WHEN t1.id IS NULL THEN 0
                    WHEN t4.rate_side = 'Multiply' THEN t1.amount * t1.rate
                    ELSE t1.amount / t1.rate
                END
            ), 0) AS balance_chf
        FROM myexpense_person AS t2
        LEFT JOIN myexpense AS t1 ON t1.person_id = t2.id {$person_balance_filters}
        LEFT JOIN currency AS t4 ON t1.ccy_id = t4.id
        GROUP BY t2.id, t2.person_name, t2.`rank`
        ORDER BY t2.`rank` ASC, t2.person_name ASC",
        $person_balance_params,
        $person_balance_types
    );

    foreach ($person_balance_rows as $person_balance_row) {
        $person_balances[(int) $person_balance_row["id"]] = (float) $person_balance_row["balance_chf"];
    }

    if ($zero_balance_mode === "exclude" && round($person_balances[$p_id] ?? 0, 2) == 0.0) {
        foreach ($person_balance_rows as $person_balance_row) {
            if (round((float) $person_balance_row["balance_chf"], 2) != 0.0) {
                redirect_to(loan_exp_current_url([
                    "person_id" => (int) $person_balance_row["id"],
                    "page" => 1,
                ]));
            }
        }
    }
}

$myperson = MyExpensePerson::find_by_id($p_id);
if (!$myperson) {
    $session->message("Requested expense person was not found.");
    redirect_to('/public/index.php');
}

$person_name = $myperson->person_name;
$page = loan_exp_int($_GET["page"] ?? 1, 1);
$per_page = loan_exp_int($_GET["per_page"] ?? 25, 25);
$per_page = in_array($per_page, [10, 25, 50, 100], true) ? $per_page : 25;
$offset = ($page - 1) * $per_page;
$csrf_token_loan_exp = create_csrf_token("loan_exp");

$currencies = Currency::find_by_sql("SELECT * FROM currency ORDER BY `rank` ASC, currency ASC");
$expense_people = MyExpensePerson::find_by_sql("SELECT * FROM myexpense_person ORDER BY `rank` ASC, person_name ASC");
$expense_types = MyExpenseType::find_by_sql("SELECT * FROM myexpense_type ORDER BY `rank` ASC, expense_type ASC");

$where = " WHERE t1.person_id=? ";
$params = [$p_id];
$types = "i";
$where .= loan_exp_sql_filters(
    "t1",
    $cat,
    $amount_filter,
    $amount_min,
    $amount_max,
    $date_period,
    $date_year,
    $date_month,
    $params,
    $types
);

$advanced_filter_labels = [];
if ($amount_filter === "negative") {
    $advanced_filter_labels[] = "Amount < 0";
} elseif ($amount_filter === "range" && ($amount_min !== null || $amount_max !== null)) {
    if ($amount_min !== null && $amount_max !== null) {
        $advanced_filter_labels[] = "Amount " . number_format($amount_min, 2) . " to " . number_format($amount_max, 2);
    } elseif ($amount_min !== null) {
        $advanced_filter_labels[] = "Amount >= " . number_format($amount_min, 2);
    } else {
        $advanced_filter_labels[] = "Amount <= " . number_format($amount_max, 2);
    }
}
if ($date_period === "year" && $date_year !== null) {
    $advanced_filter_labels[] = "Year " . $date_year;
} elseif ($date_period === "month" && $date_month !== null) {
    $advanced_filter_labels[] = $date_month->format('F Y');
}
$advanced_filter_count = count($advanced_filter_labels);

$summary_where = $where;
$summary_params = $params;
$summary_types = $types;

if ($search !== "") {
    $like = "%" . $search . "%";
    $where .= " AND (
        CAST(t1.id AS CHAR) LIKE ?
        OR t2.person_name LIKE ?
        OR t1.comment LIKE ?
        OR DATE_FORMAT(t1.expense_date, '%d-%b-%Y') LIKE ?
        OR DATE_FORMAT(t1.expense_date, '%Y-%m-%d') LIKE ?
        OR t4.currency LIKE ?
        OR CAST(t1.amount AS CHAR) LIKE ?
        OR CAST(t1.rate AS CHAR) LIKE ?
        OR t3.expense_type LIKE ?
        OR t3.category LIKE ?
        OR t1.document LIKE ?
    ) ";

    for ($i = 0; $i < 11; $i++) {
        $params[] = $like;
        $types .= "s";
    }
}

$join = " FROM myexpense AS t1
    INNER JOIN myexpense_person AS t2 ON t1.person_id = t2.id
    INNER JOIN myexpense_type AS t3 ON t1.expense_type_id = t3.id
    INNER JOIN currency AS t4 ON t1.ccy_id = t4.id ";

$total_count = (int) loan_exp_first_value("SELECT COUNT(*) AS total {$join} {$where}", $params, $types, "total");
$total_pages = max(1, (int) ceil($total_count / $per_page));
if ($page > $total_pages) {
    $page = $total_pages;
    $offset = ($page - 1) * $per_page;
}

$sum_value = (float) loan_exp_first_value(
    "SELECT SUM(CASE WHEN t4.rate_side = 'Multiply' THEN t1.amount * t1.rate ELSE t1.amount / t1.rate END) AS AmountCHF {$join} {$summary_where}",
    $summary_params,
    $summary_types,
    "AmountCHF"
);

$list_params = $params;
$list_params[] = $per_page;
$list_params[] = $offset;
$list_types = $types . "ii";

$rows = loan_exp_fetch_rows(
    "SELECT t1.id, t1.person_id, t1.ccy_id, t1.document, t1.comment, t1.expense_date, t1.amount, t1.cash, t1.rate,
        t1.expense_type_id, t2.person_name, t3.expense_type, t3.category, t4.currency,
        CASE WHEN t4.rate_side = 'Multiply' THEN t1.amount * t1.rate ELSE t1.amount / t1.rate END AS amountCHF
        {$join} {$where}
        ORDER BY {$order_sql} {$sort}, t1.id DESC
        LIMIT ? OFFSET ?",
    $list_params,
    $list_types
);

include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php");
include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php");

$status_id = loan_exp_int($_GET["loan_id"] ?? 0, 0);
$status_messages = [
    "create_success" => ["success", "Expense item created."],
    "update_success" => ["success", $status_id ? "Successfully edited ID {$status_id}." : "Expense item updated."],
    "create_error" => ["danger", "Expense item could not be created. Please check the required fields."],
    "update_error" => ["danger", $status_id ? "Could not edit ID {$status_id}. Please check the required fields." : "Expense item could not be updated. Please check the required fields."],
    "delete_success" => ["success", $status_id ? "Deleted ID {$status_id}." : "Expense item deleted."],
    "delete_error" => ["danger", $status_id ? "Could not delete ID {$status_id}." : "Expense item could not be deleted."],
    "csrf" => ["danger", "Security token expired. Please try again."],
    "forbidden" => ["danger", "You do not have permission to save expense items."],
];
?>

<style>
    html {
        height: 100% !important;
        min-height: 100%;
    }

    body:not(.modal-open) {
        height: auto !important;
        min-height: 100%;
        overflow-x: clip !important;
        overflow-y: visible !important;
    }

    .loan-exp-page {
        width: calc(100vw - 56px);
        max-width: 1760px;
        margin: 0 auto;
        padding: 18px 15px 34px;
    }

    .loan-exp-header,
    .loan-exp-toolbar,
    .loan-exp-table-card {
        background: #fff;
        border: 1px solid #dfe6ef;
        box-shadow: 0 14px 34px rgba(15, 23, 42, 0.07);
    }

    .loan-exp-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        padding: 18px 20px;
        margin-bottom: 14px;
    }

    .loan-exp-header-main {
        min-width: 0;
    }

    .loan-exp-header-actions {
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
    }

    .loan-exp-title {
        margin: 0;
        color: #0f172a;
        font-size: 28px;
        font-weight: 800;
    }

    .loan-exp-summary {
        margin-top: 8px;
        color: #536274;
        font-size: 16px;
    }

    .loan-exp-toolbar {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-end;
        gap: 12px;
        padding: 14px;
        margin-bottom: 14px;
    }

    .loan-exp-toolbar .form-group {
        margin-bottom: 0;
    }

    .loan-exp-toolbar label {
        display: block;
        color: #64748b;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .loan-exp-toolbar .form-control {
        width: 100%;
    }

    .loan-exp-filter--person {
        flex: 0 0 250px;
    }

    .loan-exp-filter--category,
    .loan-exp-filter--documents,
    .loan-exp-filter--zero-balance {
        flex: 0 0 150px;
    }

    .loan-exp-filter--per-page {
        flex: 0 0 115px;
    }

    .loan-exp-toolbar__search {
        flex: 1 1 470px;
        max-width: 520px;
        min-width: 360px;
        position: relative;
    }

    .loan-exp-search-row {
        display: flex;
        align-items: center;
        gap: 7px;
        width: 100%;
    }

    .loan-exp-search-row .form-control {
        flex: 1 1 210px;
        min-width: 0;
    }

    .loan-exp-search-row .btn {
        flex: 0 0 auto;
    }

    .loan-exp-advanced-trigger {
        position: relative;
        white-space: nowrap;
    }

    .loan-exp-filter-count {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 20px;
        height: 20px;
        margin-left: 5px;
        padding: 0 6px;
        border-radius: 999px;
        background: #ffffff;
        color: #075da8;
        font-size: 11px;
        font-weight: 900;
    }

    .loan-exp-search-status {
        position: absolute;
        top: 100%;
        left: 0;
        margin-top: 4px;
        color: #64748b;
        font-size: 11px;
        font-weight: 700;
        line-height: 1.2;
    }

    .loan-exp-active-filters {
        flex: 1 0 100%;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 7px;
        padding-top: 2px;
        color: #475569;
        font-size: 12px;
        font-weight: 700;
    }

    .loan-exp-active-filter {
        display: inline-flex;
        align-items: center;
        min-height: 27px;
        padding: 4px 9px;
        border: 1px solid #bfdbfe;
        border-radius: 999px;
        background: #eff6ff;
        color: #1e3a8a;
    }

    .loan-exp-clear-advanced {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        min-height: 27px;
        color: #b91c1c;
        font-weight: 800;
        text-decoration: none;
    }

    .loan-exp-clear-advanced:hover,
    .loan-exp-clear-advanced:focus {
        color: #7f1d1d;
        text-decoration: underline;
    }

    .loan-exp-table-card {
        overflow: hidden;
    }

    .loan-exp-table-meta {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 12px 14px;
        border-bottom: 1px solid #dfe6ef;
        color: #64748b;
        font-weight: 700;
    }

    .loan-exp-table-wrap {
        overflow-x: auto;
    }

    .loan-exp-table {
        margin-bottom: 0;
        min-width: 1320px;
    }

    .loan-exp-table th {
        white-space: nowrap;
        background: #f8fafc;
        color: #475569;
        font-size: 12px;
        text-transform: uppercase;
        vertical-align: middle !important;
    }

    .loan-exp-sort-link {
        display: inline-block;
        color: #475569;
        text-decoration: none;
    }

    .loan-exp-sort-link:hover,
    .loan-exp-sort-link:focus,
    .loan-exp-sort-link--active {
        color: #075da8;
        text-decoration: none;
    }

    .loan-exp-sort-link.text-right {
        width: 100%;
    }

    .loan-exp-table td {
        vertical-align: middle !important;
    }

    .loan-exp-comment {
        min-width: 360px;
        max-width: 620px;
        white-space: normal;
    }

    .loan-exp-row-actions {
        display: flex;
        justify-content: center;
        gap: 5px;
        white-space: nowrap;
    }

    .loan-exp-negative,
    .loan-exp-table .loan-exp-negative {
        color: #d10000;
    }

    .loan-exp-positive {
        color: #075da8;
    }

    .loan-exp-row--status td {
        animation: loan-exp-row-pulse 2.8s ease-out;
    }

    .loan-exp-toast {
        position: fixed;
        right: 22px;
        bottom: 22px;
        z-index: 2050;
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 260px;
        max-width: min(420px, calc(100vw - 32px));
        padding: 14px 16px;
        border: 1px solid transparent;
        border-radius: 8px;
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.22);
        font-weight: 800;
        line-height: 1.3;
        opacity: 0;
        transform: translateY(14px);
        transition: opacity 180ms ease, transform 180ms ease;
    }

    .loan-exp-toast.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .loan-exp-toast--success {
        border-color: #86efac;
        background: #dcfce7;
        color: #14532d;
    }

    .loan-exp-toast--danger {
        border-color: #fecaca;
        background: #fee2e2;
        color: #7f1d1d;
    }

    .loan-exp-toast .fa {
        flex: 0 0 auto;
    }

    @keyframes loan-exp-row-pulse {
        0% {
            background: #dcfce7;
        }
        100% {
            background: transparent;
        }
    }

    .loan-exp-pagination {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 12px 14px;
    }

    .loan-exp-pagination--top {
        border-bottom: 1px solid #dfe6ef;
    }

    .loan-exp-pagination--bottom {
        border-top: 1px solid #dfe6ef;
    }

    .loan-exp-pagination .pagination {
        margin: 0;
    }

    .loan-exp-modal > .modal-dialog {
        width: 560px !important;
        max-width: calc(100vw - 40px) !important;
        margin-top: 86px;
    }

    .loan-exp-modal .modal-content {
        overflow: hidden;
        border: 0;
        border-radius: 8px;
        max-height: calc(100vh - 96px);
        box-shadow: 0 30px 90px rgba(15, 23, 42, 0.34);
    }

    .loan-exp-modal .modal-header {
        position: relative;
        padding: 24px 30px 20px;
        border-bottom: 0;
        background: linear-gradient(135deg, #e0f2fe 0%, #dbeafe 52%, #eef6ff 100%);
        color: #0f172a;
    }

    .loan-exp-modal .modal-header .close {
        position: absolute;
        top: 18px;
        right: 22px;
        color: #0f172a;
        opacity: 0.58;
        text-shadow: none;
    }

    .loan-exp-modal .modal-header .close:hover,
    .loan-exp-modal .modal-header .close:focus {
        opacity: 0.9;
    }

    .loan-exp-modal__eyebrow {
        margin: 0 0 6px;
        color: #0369a1;
        font-size: 12px;
        font-weight: 900;
        letter-spacing: 0;
        text-transform: uppercase;
    }

    .loan-exp-modal .modal-title {
        color: #0f172a;
        font-size: 26px;
        font-weight: 900;
        line-height: 1.1;
    }

    .loan-exp-modal .modal-body {
        max-height: calc(100vh - 246px);
        padding: 22px 30px 0;
        background: #ffffff;
        overflow-y: auto;
    }

    .loan-exp-modal__row {
        display: grid;
        grid-template-columns: 1fr;
        column-gap: 14px;
        row-gap: 0;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: 0;
        margin-left: 0;
    }

    .loan-exp-modal__row--three {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .loan-exp-modal__cell {
        min-width: 0;
    }

    .loan-exp-modal .modal-body > .form-group {
        padding-right: 15px;
        padding-left: 15px;
    }

    .loan-exp-modal .form-group {
        margin-right: 0;
        margin-left: 0;
        margin-bottom: 14px;
    }

    .loan-exp-modal .control-label,
    .loan-exp-modal label {
        display: block;
        padding-top: 0;
        margin-bottom: 8px;
        color: #475569;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0;
        text-align: left;
        text-transform: uppercase;
    }

    .loan-exp-required-star {
        margin-left: 4px;
        color: #dc2626;
        font-weight: 900;
    }

    .loan-exp-modal .form-control {
        height: 40px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        box-shadow: none;
        color: #0f172a;
        font-size: 14px;
    }

    .loan-exp-modal textarea.form-control {
        min-height: 72px;
        resize: vertical;
    }

    .loan-exp-choice-group {
        display: inline-grid;
        grid-template-columns: repeat(2, minmax(72px, 92px));
        gap: 6px;
    }

    .loan-exp-choice {
        position: relative;
        display: block;
        margin: 0;
    }

    .loan-exp-choice input {
        position: absolute;
        width: 1px;
        height: 1px;
        opacity: 0;
        pointer-events: none;
    }

    .loan-exp-choice span {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 32px;
        padding-right: 10px;
        padding-left: 10px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        background: #ffffff;
        color: #334155;
        font-size: 12px;
        font-weight: 800;
        cursor: pointer;
    }

    .loan-exp-choice input:checked + span {
        border-color: #0284c7;
        background: #e0f2fe;
        color: #075985;
        box-shadow: inset 0 0 0 1px #0284c7;
    }

    .loan-exp-choice input:focus + span {
        box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.16), inset 0 0 0 1px #0284c7;
    }

    .loan-exp-modal .modal-footer {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        padding: 14px 30px 20px;
        border-top: 0;
        background: #ffffff;
    }

    .loan-exp-modal .modal-footer::before,
    .loan-exp-modal .modal-footer::after {
        display: none;
    }

    .loan-exp-modal .modal-footer .btn {
        min-height: 44px;
        border-radius: 6px;
        font-weight: 800;
    }

    .loan-exp-modal .modal-footer .btn-primary,
    .loan-exp-modal__submit {
        border-color: #0369a1;
        background: linear-gradient(135deg, #005fbf 0%, #008bd2 100%);
        color: #ffffff;
    }

    .loan-exp-modal .modal-footer .btn-primary:hover,
    .loan-exp-modal .modal-footer .btn-primary:focus,
    .loan-exp-modal__submit:hover,
    .loan-exp-modal__submit:focus {
        border-color: #075985;
        background: linear-gradient(135deg, #075da8 0%, #0479b8 100%);
        color: #ffffff;
    }

    .loan-exp-filter-modal > .modal-dialog {
        width: 680px !important;
    }

    .loan-exp-filter-modal .modal-body {
        padding-bottom: 8px;
    }

    .loan-exp-filter-section {
        margin-bottom: 16px;
        padding: 16px;
        border: 1px solid #dbe4ee;
        border-radius: 8px;
        background: #f8fafc;
    }

    .loan-exp-filter-section__title {
        margin: 0 0 12px;
        color: #0f172a;
        font-size: 14px;
        font-weight: 900;
    }

    .loan-exp-filter-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px;
    }

    .loan-exp-filter-grid .form-group {
        margin-bottom: 0;
    }

    .loan-exp-filter-help {
        margin: 8px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    .loan-exp-filter-error-summary {
        margin-bottom: 14px;
        padding: 10px 12px;
        border: 1px solid #fecaca;
        border-radius: 6px;
        background: #fef2f2;
        color: #991b1b;
        font-size: 13px;
        font-weight: 700;
    }

    .loan-exp-inline-error {
        display: block;
        margin-top: 5px;
        color: #b91c1c;
        font-size: 12px;
        font-weight: 700;
    }

    .loan-exp-filter-modal .has-error .form-control {
        border-color: #dc2626;
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
    }

    .loan-exp-filter-field[hidden] {
        display: none !important;
    }

    @media (max-width: 767px) {
        .loan-exp-page {
            width: 100%;
            padding-right: 8px;
            padding-left: 8px;
        }

        .loan-exp-title {
            font-size: 23px;
        }

        .loan-exp-header {
            display: block;
        }

        .loan-exp-header-actions {
            margin-top: 12px;
        }

        .loan-exp-header-actions .btn {
            width: 100%;
            margin-bottom: 8px;
        }

        .loan-exp-toolbar {
            display: block;
        }

        .loan-exp-toolbar .form-group {
            margin-top: 9px;
        }

        .loan-exp-toolbar .form-control {
            width: 100%;
        }

        .loan-exp-toolbar__search {
            max-width: none;
            min-width: 0;
        }

        .loan-exp-search-row {
            display: block;
        }

        .loan-exp-search-row .btn {
            width: 100%;
            margin-top: 8px;
        }

        .loan-exp-filter-grid {
            grid-template-columns: 1fr;
        }

        .loan-exp-modal > .modal-dialog {
            width: auto !important;
            max-width: none !important;
            margin: 74px 10px 16px;
        }

        .loan-exp-modal .modal-header,
        .loan-exp-modal .modal-body,
        .loan-exp-modal .modal-footer {
            padding-right: 20px;
            padding-left: 20px;
        }

        .loan-exp-modal .modal-title {
            font-size: 24px;
        }

        .loan-exp-modal__row,
        .loan-exp-modal__row--three {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .loan-exp-modal .modal-footer {
            display: block;
        }

        .loan-exp-modal .modal-footer .btn {
            display: block;
            width: 100%;
            margin: 0 0 10px;
        }
    }

    .loan-exp-page--public {
        width: min(1480px, calc(100vw - 32px));
        padding: 28px 0 96px;
        color: #172033;
    }

    .loan-exp-page--public:before {
        content: "";
        position: fixed;
        inset: 0;
        z-index: -1;
        background:
            linear-gradient(135deg, rgba(232, 246, 255, 0.96) 0%, rgba(248, 250, 252, 0.97) 48%, rgba(234, 244, 255, 0.94) 100%),
            url("/public/css/patterns/shattered.png");
    }

    .loan-exp-page--public .loan-exp-header,
    .loan-exp-page--public .loan-exp-toolbar,
    .loan-exp-page--public .loan-exp-table-card,
    .loan-exp-page--public .loan-exp-stat {
        border: 1px solid rgba(40, 64, 82, 0.12);
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.94);
        box-shadow: 0 18px 46px rgba(31, 48, 63, 0.1);
    }

    .loan-exp-page--public .loan-exp-header {
        position: relative;
        overflow: hidden;
        min-height: 172px;
        margin-bottom: 16px;
        padding: 28px 30px;
        background:
            linear-gradient(135deg, rgba(6, 43, 103, 0.96) 0%, rgba(0, 83, 166, 0.95) 50%, rgba(2, 15, 42, 0.96) 100%),
            url("/public/css/patterns/triangular.png");
        color: #ffffff;
    }

    .loan-exp-page--public .loan-exp-header:after {
        content: "";
        position: absolute;
        right: 28px;
        bottom: 22px;
        width: 190px;
        height: 90px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 8px;
        background:
            linear-gradient(90deg, rgba(255, 255, 255, 0.18) 1px, transparent 1px) 0 0 / 24px 100%,
            linear-gradient(0deg, rgba(255, 255, 255, 0.2) 1px, transparent 1px) 0 0 / 100% 22px;
        opacity: 0.42;
        pointer-events: none;
    }

    .loan-exp-page--public .loan-exp-header-main,
    .loan-exp-page--public .loan-exp-header-actions {
        position: relative;
        z-index: 1;
    }

    .loan-exp-kicker {
        margin: 0 0 9px;
        color: #a8eeff;
        font-size: 12px;
        font-weight: 900;
        letter-spacing: 0;
        text-transform: uppercase;
    }

    .loan-exp-page--public .loan-exp-title {
        color: #ffffff;
        font-size: 34px;
        line-height: 1.08;
    }

    .loan-exp-page--public .loan-exp-summary {
        max-width: 760px;
        color: rgba(255, 255, 255, 0.86);
    }

    .loan-exp-page--public .loan-exp-summary .loan-exp-positive,
    .loan-exp-page--public .loan-exp-summary .loan-exp-negative {
        color: #ffffff;
    }

    .loan-exp-page--public .loan-exp-header-actions .btn {
        min-height: 42px;
        border-radius: 6px;
        border: 1px solid rgba(255, 255, 255, 0.24);
        font-weight: 800;
        box-shadow: none;
    }

    .loan-exp-page--public .loan-exp-header-actions .btn-info {
        background: rgba(255, 255, 255, 0.14);
        color: #ffffff;
    }

    .loan-exp-page--public .loan-exp-header-actions .btn-success {
        border-color: #7dd3fc;
        background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
        color: #075985;
    }

    .loan-exp-stats {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 16px;
    }

    .loan-exp-stat {
        padding: 17px 18px;
    }

    .loan-exp-stat__label {
        display: block;
        margin-bottom: 7px;
        color: #64748b;
        font-size: 11px;
        font-weight: 900;
        text-transform: uppercase;
    }

    .loan-exp-stat strong {
        display: block;
        color: #10243b;
        font-size: 22px;
        line-height: 1.15;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .loan-exp-stat strong.loan-exp-positive {
        color: #006aa6;
    }

    .loan-exp-stat strong.loan-exp-negative {
        color: #c1121f;
    }

    .loan-exp-page--public .loan-exp-toolbar {
        display: grid;
        grid-template-columns: minmax(180px, 250px) minmax(140px, 180px) minmax(120px, 150px) minmax(110px, 130px) minmax(280px, 1fr);
        gap: 14px;
        align-items: end;
        margin-bottom: 16px;
        padding: 18px;
    }

    .loan-exp-page--public .loan-exp-toolbar label {
        margin-bottom: 7px;
        color: #385269;
        letter-spacing: 0;
    }

    .loan-exp-page--public .loan-exp-toolbar .form-control {
        height: 42px;
        border: 1px solid #cbd8e3;
        border-radius: 6px;
        box-shadow: none;
    }

    .loan-exp-page--public .loan-exp-toolbar .form-control:focus {
        border-color: #008bd2;
        box-shadow: 0 0 0 3px rgba(0, 139, 210, 0.16);
    }

    .loan-exp-page--public .loan-exp-filter--person,
    .loan-exp-page--public .loan-exp-filter--category,
    .loan-exp-page--public .loan-exp-filter--documents,
    .loan-exp-page--public .loan-exp-filter--zero-balance,
    .loan-exp-page--public .loan-exp-filter--per-page,
    .loan-exp-page--public .loan-exp-toolbar__search {
        flex: none;
        max-width: none;
        min-width: 0;
    }

    .loan-exp-page--public .loan-exp-toolbar__search {
        position: relative;
    }

    .loan-exp-page--public .loan-exp-search-row {
        gap: 8px;
    }

    .loan-exp-page--public .loan-exp-search-row .btn {
        min-height: 42px;
        border-radius: 6px;
        font-weight: 800;
    }

    .loan-exp-page--public #loan-search-submit {
        border-color: #005fbf;
        background: linear-gradient(135deg, #005fbf 0%, #008bd2 100%);
    }

    .loan-exp-page--public .loan-exp-search-status {
        position: absolute;
        top: 100%;
        left: 0;
        min-height: 14px;
        margin-top: 6px;
    }

    .loan-exp-page--public .loan-exp-table-card {
        overflow: hidden;
    }

    .loan-exp-page--public .loan-exp-table-meta,
    .loan-exp-page--public .loan-exp-pagination {
        background: #f5faff;
    }

    .loan-exp-page--public .loan-exp-table {
        border-collapse: separate;
        border-spacing: 0;
    }

    .loan-exp-page--public .loan-exp-table th {
        border-bottom: 1px solid #d9e4ec !important;
        background: #eff7ff;
        color: #334155;
    }

    .loan-exp-page--public .loan-exp-table td {
        border-color: #e5edf3 !important;
        color: #243447;
    }

    .loan-exp-page--public .loan-exp-table tbody tr:hover td {
        background: #f2f8ff;
    }

    .loan-exp-page--public .loan-exp-comment {
        line-height: 1.42;
    }

    .loan-exp-page--public .loan-exp-sort-link--active,
    .loan-exp-page--public .loan-exp-sort-link:hover,
    .loan-exp-page--public .loan-exp-sort-link:focus {
        color: #006aa6;
    }

    .loan-exp-page--public .loan-exp-pagination .pagination > li > a,
    .loan-exp-page--public .loan-exp-pagination .pagination > li > span {
        color: #06356f;
    }

    .loan-exp-page--public .loan-exp-pagination .pagination > .active > a,
    .loan-exp-page--public .loan-exp-pagination .pagination > .active > span {
        border-color: #008bd2;
        background: linear-gradient(135deg, #005fbf 0%, #008bd2 100%);
        color: #ffffff;
    }

    @media (max-width: 1120px) {
        .loan-exp-page--public .loan-exp-toolbar {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .loan-exp-page--public .loan-exp-toolbar__search {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 767px) {
        .loan-exp-page--public {
            width: 100%;
            padding: 0 0 84px;
        }

        .loan-exp-page--public .loan-exp-header,
        .loan-exp-page--public .loan-exp-toolbar,
        .loan-exp-page--public .loan-exp-table-card,
        .loan-exp-page--public .loan-exp-stat {
            border-right: 0;
            border-left: 0;
            border-radius: 0;
            box-shadow: none;
        }

        .loan-exp-page--public .loan-exp-header {
            margin-bottom: 0;
            padding: 24px 16px;
        }

        .loan-exp-page--public .loan-exp-header:after {
            display: none;
        }

        .loan-exp-page--public .loan-exp-title {
            font-size: 28px;
        }

        .loan-exp-stats {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0;
            margin-bottom: 0;
        }

        .loan-exp-stat {
            border-top: 0;
            padding: 15px 16px;
        }

        .loan-exp-stat strong {
            font-size: 18px;
        }

        .loan-exp-page--public .loan-exp-toolbar {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
            margin-bottom: 0;
            padding: 16px;
        }

        .loan-exp-page--public .loan-exp-search-row {
            display: grid;
            grid-template-columns: 1fr;
        }

        .loan-exp-page--public .loan-exp-search-status {
            position: static;
        }

        .loan-exp-page--public .loan-exp-search-row .btn {
            width: 100%;
            margin-top: 0;
        }
    }

</style>

<main class="loan-exp-page loan-exp-page--public">
    <?php if (isset($_GET["loan_status"], $status_messages[$_GET["loan_status"]])) {
        [$type, $message] = $status_messages[$_GET["loan_status"]];
        $icon = $type === "success" ? "fa-check-circle" : "fa-exclamation-circle";
        echo "<div class='loan-exp-toast loan-exp-toast--" . h($type) . "' id='loan-exp-toast' role='status' aria-live='polite' data-auto-dismiss='2800'><i class='fa " . h($icon) . "' aria-hidden='true'></i><span>" . h($message) . "</span></div>";
    } ?>

    <section class="loan-exp-header">
        <div class="loan-exp-header-main">
            <p class="loan-exp-kicker">Loan expenses</p>
            <h1 class="loan-exp-title"><?php echo h($person_name); ?> - Kamran</h1>
            <div class="loan-exp-summary">
                <?php if ($sum_value < 0) { ?>
                    <span class="loan-exp-negative"><strong><?php echo h($cat_name); ?>: Total Due in favor of <?php echo h($person_name); ?>:</strong></span>
                <?php } else { ?>
                    <span class="loan-exp-positive"><strong><?php echo h($cat_name); ?>: Total Due in favor of Kamran:</strong></span>
                <?php } ?>
                <strong><?php echo h("CHF " . number_format($sum_value, 2)); ?></strong>
            </div>
        </div>
        <div class="loan-exp-header-actions">
            <a class="btn btn-info" href="/public/loan_expense_1.php">Summary Mum</a>
            <?php if (User::is_admin()) { ?>
                <button class="btn btn-success js-loan-exp-open" type="button" data-loan-exp-target="#loanExpenseCreateModal">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add expense
                </button>
            <?php } ?>
        </div>
    </section>

    <section class="loan-exp-stats" aria-label="Expense overview">
        <div class="loan-exp-stat">
            <span class="loan-exp-stat__label">Balance</span>
            <strong class="<?php echo $sum_value < 0 ? 'loan-exp-negative' : 'loan-exp-positive'; ?>"><?php echo h("CHF " . number_format($sum_value, 2)); ?></strong>
        </div>
        <div class="loan-exp-stat">
            <span class="loan-exp-stat__label">Category</span>
            <strong><?php echo h($cat_name); ?></strong>
        </div>
        <div class="loan-exp-stat">
            <span class="loan-exp-stat__label">Visible rows</span>
            <strong><?php echo h(number_format($total_count)); ?></strong>
        </div>
        <div class="loan-exp-stat">
            <span class="loan-exp-stat__label">Documents</span>
            <strong><?php echo $show_doc ? 'Shown' : 'Hidden'; ?></strong>
        </div>
    </section>

    <form class="loan-exp-toolbar" method="get" action="<?php echo h($_SERVER['PHP_SELF']); ?>">
        <?php if (User::is_admin()) { ?>
            <div class="form-group loan-exp-filter--person">
                <label for="loan-person">Person</label>
                <select id="loan-person" class="form-control" name="person_id" onchange="this.form.submit();">
                    <?php foreach ($person_balance_rows as $person_balance_row) {
                        $person_balance = (float) $person_balance_row["balance_chf"];
                        if ($zero_balance_mode === "exclude" && round($person_balance, 2) == 0.0) {
                            continue;
                        }
                        $selected = (int) $person_balance_row["id"] === (int) $p_id ? " selected" : "";
                        $person_option_label = $person_balance_row["person_name"] . " — CHF " . number_format($person_balance, 2);
                        echo "<option{$selected} value='" . h($person_balance_row["id"]) . "'>" . h($person_option_label) . "</option>";
                    } ?>
                </select>
            </div>
            <div class="form-group loan-exp-filter--zero-balance">
                <label for="loan-zero-balance">Zero balances</label>
                <select id="loan-zero-balance" class="form-control" name="zero_balance" onchange="this.form.submit();">
                    <option value="include"<?php echo $zero_balance_mode === "include" ? " selected" : ""; ?>>Include</option>
                    <option value="exclude"<?php echo $zero_balance_mode === "exclude" ? " selected" : ""; ?>>Exclude</option>
                </select>
            </div>
        <?php } ?>

        <div class="form-group loan-exp-filter--category">
            <label for="loan-category">Category</label>
            <select id="loan-category" class="form-control" name="type_category">
                <?php foreach (MyExpense::loan_category_options() as $value => $label) {
                    $selected = $value === $cat ? " selected" : "";
                    echo "<option{$selected} value='" . h($value) . "'>" . h($label) . "</option>";
                } ?>
            </select>
        </div>

        <input type="hidden" name="order_by" value="<?php echo h($order_by); ?>">
        <input type="hidden" name="sort" value="<?php echo h($sort); ?>">
        <input type="hidden" name="amount_filter" value="<?php echo h($amount_filter); ?>">
        <input type="hidden" name="amount_min" value="<?php echo h($amount_min_input); ?>">
        <input type="hidden" name="amount_max" value="<?php echo h($amount_max_input); ?>">
        <input type="hidden" name="date_period" value="<?php echo h($date_period); ?>">
        <input type="hidden" name="date_year" value="<?php echo h($date_year_input); ?>">
        <input type="hidden" name="date_month" value="<?php echo h($date_month_input); ?>">

        <div class="form-group loan-exp-filter--documents">
            <label for="loan-doc">Documents</label>
            <select id="loan-doc" class="form-control" name="show_hide_doc">
                <option<?php echo !$show_doc ? " selected" : ""; ?> value="hide_doc">Hide</option>
                <option<?php echo $show_doc ? " selected" : ""; ?> value="show_doc">Show</option>
            </select>
        </div>

        <div class="form-group loan-exp-filter--per-page">
            <label for="loan-per-page">Per page</label>
            <select id="loan-per-page" class="form-control" name="per_page">
                <?php foreach ([10, 25, 50, 100] as $option) {
                    $selected = $option === $per_page ? " selected" : "";
                    echo "<option{$selected} value='" . h($option) . "'>" . h($option) . "</option>";
                } ?>
            </select>
        </div>

        <div class="form-group loan-exp-toolbar__search">
            <label for="loan-search">Search</label>
            <div class="loan-exp-search-row">
                <input id="loan-search" class="form-control" type="search" name="q" value="<?php echo h($search); ?>" placeholder="Type 2 letters to search" autocomplete="off">
                <button class="btn btn-primary" id="loan-search-submit" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                <button class="btn btn-info loan-exp-advanced-trigger" type="button"
                        data-toggle="modal" data-target="#loanExpenseFilterModal"
                        data-loan-exp-target="#loanExpenseFilterModal"
                        onclick="return window.loanExpOpenModalFallback ? window.loanExpOpenModalFallback('#loanExpenseFilterModal') : true;">
                    <i class="fa fa-sliders" aria-hidden="true"></i> Advanced
                    <?php if ($advanced_filter_count > 0) { ?>
                        <span class="loan-exp-filter-count" aria-label="<?php echo h($advanced_filter_count); ?> active advanced filters"><?php echo h($advanced_filter_count); ?></span>
                    <?php } ?>
                </button>
                <a class="btn btn-default" href="<?php echo h(loan_exp_current_url([
                    "q" => null,
                    "amount_filter" => null,
                    "amount_min" => null,
                    "amount_max" => null,
                    "date_period" => null,
                    "date_year" => null,
                    "date_month" => null,
                    "zero_balance" => null,
                    "page" => 1,
                    "loan_status" => null,
                ])); ?>"><i class="fa fa-times" aria-hidden="true"></i> Clear filters</a>
            </div>
            <div class="loan-exp-search-status" id="loan-search-status" aria-live="polite"></div>
        </div>
        <?php if ($advanced_filter_count > 0) { ?>
            <div class="loan-exp-active-filters" aria-label="Active advanced filters">
                <span>Advanced filters:</span>
                <?php foreach ($advanced_filter_labels as $filter_label) { ?>
                    <span class="loan-exp-active-filter"><?php echo h($filter_label); ?></span>
                <?php } ?>
                <a class="loan-exp-clear-advanced" href="<?php echo h(loan_exp_current_url([
                    "amount_filter" => null,
                    "amount_min" => null,
                    "amount_max" => null,
                    "date_period" => null,
                    "date_year" => null,
                    "date_month" => null,
                    "page" => 1,
                    "loan_status" => null,
                ])); ?>"><i class="fa fa-times-circle" aria-hidden="true"></i> Remove advanced filters</a>
            </div>
        <?php } ?>
    </form>

    <section class="loan-exp-table-card">
        <div class="loan-exp-table-meta">
            <span><?php echo h(number_format($total_count)); ?> item<?php echo $total_count === 1 ? "" : "s"; ?></span>
            <span>Page <?php echo h($page); ?> of <?php echo h($total_pages); ?></span>
        </div>

        <?php echo loan_exp_pagination_html($page, $total_pages, $total_count, $offset, $per_page, "top"); ?>

        <div class="loan-exp-table-wrap">
            <table class="table table-striped table-bordered table-hover loan-exp-table">
                <thead>
                <tr>
                    <th class="text-center"><?php echo loan_exp_sort_header("id", "ID"); ?></th>
                    <th><?php echo loan_exp_sort_header("name", "Name"); ?></th>
                    <th><?php echo loan_exp_sort_header("comment", "Comment"); ?></th>
                    <th><?php echo loan_exp_sort_header("date", "Date"); ?></th>
                    <th><?php echo loan_exp_sort_header("currency", "Ccy"); ?></th>
                    <th class="text-right"><?php echo loan_exp_sort_header("amount", "Amount CCY", "text-right"); ?></th>
                    <th class="text-right">Fx</th>
                    <th class="text-right"><?php echo loan_exp_sort_header("amount_chf", "Amt CHF", "text-right"); ?></th>
                    <th class="text-center"><?php echo loan_exp_sort_header("cash", "Cash"); ?></th>
                    <th><?php echo loan_exp_sort_header("type", "Type"); ?></th>
                    <th><?php echo loan_exp_sort_header("category", "Category"); ?></th>
                    <?php if ($show_doc) { ?><th>Doc</th><?php } ?>
                    <?php if (User::is_admin()) { ?><th class="text-center">Actions</th><?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php if ($rows) {
                    foreach ($rows as $row) {
                        $date = DateTime::createFromFormat('Y-m-d', substr((string) $row["expense_date"], 0, 10));
                        $displayDate = $date ? $date->format('d-M-Y') : $row["expense_date"];
                        $amountChf = (float) $row["amountCHF"];
                        ?>
                        <tr id="loan-exp-row-<?php echo h($row["id"]); ?>"<?php echo $status_id === (int) $row["id"] ? " class='loan-exp-row--status'" : ""; ?>>
                            <td class="text-center"><?php echo h($row["id"]); ?></td>
                            <td><?php echo h($row["person_name"]); ?></td>
                            <td class="loan-exp-comment"><?php echo h(loan_exp_comment_text($row["comment"])); ?></td>
                            <td class="text-center" style="white-space: nowrap;"><?php echo h($displayDate); ?></td>
                            <td class="text-center"><?php echo h($row["currency"]); ?></td>
                            <td class="text-right"><?php echo loan_exp_format_amount($row["amount"]); ?></td>
                            <td class="text-right"><?php echo h($row["rate"]); ?></td>
                            <td class="text-right"><?php echo loan_exp_format_amount($row["amountCHF"]); ?></td>
                            <td class="text-center"><?php echo (int) $row["cash"] === 1 ? "<strong><i class='fa fa-check' aria-hidden='true'></i></strong>" : "-"; ?></td>
                            <td><?php echo h($row["expense_type"]); ?></td>
                            <td><?php echo h($row["category"]); ?></td>
                            <?php if ($show_doc) { ?><td><?php echo loan_exp_document_links($row["document"]); ?></td><?php } ?>
                            <?php if (User::is_admin()) { ?>
                                <td class="text-center">
                                    <div class="loan-exp-row-actions">
                                        <button
                                            type="button"
                                            class="btn btn-xs btn-primary js-loan-exp-edit"
                                            data-loan-exp-target="#loanExpenseEditModal"
                                            data-id="<?php echo h($row["id"]); ?>"
                                            data-amount="<?php echo h($row["amount"]); ?>"
                                            data-cash="<?php echo h($row["cash"]); ?>"
                                            data-ccy-id="<?php echo h($row["ccy_id"]); ?>"
                                            data-rate="<?php echo h($row["rate"]); ?>"
                                            data-person-id="<?php echo h($row["person_id"]); ?>"
                                            data-expense-type-id="<?php echo h($row["expense_type_id"]); ?>"
                                            data-expense-date="<?php echo h(substr((string) $row["expense_date"], 0, 10)); ?>"
                                            data-comment="<?php echo h($row["comment"]); ?>"
                                            data-document="<?php echo h($row["document"]); ?>">
                                            <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-xs btn-danger js-loan-exp-delete"
                                            data-loan-exp-target="#loanExpenseDeleteModal"
                                            data-id="<?php echo h($row["id"]); ?>"
                                            data-comment="<?php echo h(loan_exp_comment_text($row["comment"])); ?>">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                        </button>
                                    </div>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="<?php echo h(User::is_admin() ? ($show_doc ? 13 : 12) : ($show_doc ? 12 : 11)); ?>" class="text-center">No expense item found.</td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <?php echo loan_exp_pagination_html($page, $total_pages, $total_count, $offset, $per_page, "bottom"); ?>
    </section>
</main>

<div class="modal fade loan-exp-modal loan-exp-filter-modal" id="loanExpenseFilterModal" tabindex="-1" role="dialog" aria-labelledby="loanExpenseFilterTitle" aria-describedby="loanExpenseFilterDescription">
    <div class="modal-dialog" role="document">
        <form class="modal-content" id="loan-exp-filter-form" method="get" action="<?php echo h($_SERVER['PHP_SELF']); ?>" novalidate>
            <input type="hidden" name="person_id" value="<?php echo h($p_id); ?>">
            <input type="hidden" name="type_category" value="<?php echo h($cat); ?>">
            <input type="hidden" name="show_hide_doc" value="<?php echo $show_doc ? "show_doc" : "hide_doc"; ?>">
            <input type="hidden" name="per_page" value="<?php echo h($per_page); ?>">
            <input type="hidden" name="order_by" value="<?php echo h($order_by); ?>">
            <input type="hidden" name="sort" value="<?php echo h($sort); ?>">
            <input type="hidden" name="zero_balance" value="<?php echo h($zero_balance_mode); ?>">
            <?php if ($search !== "") { ?>
                <input type="hidden" name="q" value="<?php echo h($search); ?>">
            <?php } ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="return window.loanExpCloseButton ? window.loanExpCloseButton(this) : true;"><span aria-hidden="true">&times;</span></button>
                <p class="loan-exp-modal__eyebrow">Search</p>
                <h4 class="modal-title" id="loanExpenseFilterTitle">Advanced filters</h4>
                <p class="loan-exp-filter-help" id="loanExpenseFilterDescription">Combine an amount condition with a year or a specific month.</p>
            </div>
            <div class="modal-body">
                <div class="loan-exp-filter-error-summary" id="loan-filter-error-summary" role="alert" hidden>Please correct the highlighted filters.</div>

                <section class="loan-exp-filter-section" aria-labelledby="loanAmountFilterTitle">
                    <h5 class="loan-exp-filter-section__title" id="loanAmountFilterTitle">Amount (Amount CCY column)</h5>
                    <div class="form-group">
                        <label for="loan-filter-amount-mode">Condition</label>
                        <select class="form-control" id="loan-filter-amount-mode" name="amount_filter">
                            <option value="any"<?php echo $amount_filter === "any" ? " selected" : ""; ?>>Any amount</option>
                            <option value="negative"<?php echo $amount_filter === "negative" ? " selected" : ""; ?>>Negative amounts (less than 0)</option>
                            <option value="range"<?php echo $amount_filter === "range" ? " selected" : ""; ?>>Custom range</option>
                        </select>
                    </div>
                    <div class="loan-exp-filter-grid loan-exp-filter-field" id="loan-filter-amount-range"<?php echo $amount_filter === "range" ? "" : " hidden"; ?>>
                        <div class="form-group">
                            <label for="loan-filter-amount-min">Minimum amount</label>
                            <input class="form-control" id="loan-filter-amount-min" name="amount_min" type="number" step="0.01" value="<?php echo h($amount_min_input); ?>" placeholder="e.g. -500">
                            <span class="loan-exp-inline-error" id="loan-filter-amount-min-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="loan-filter-amount-max">Maximum amount</label>
                            <input class="form-control" id="loan-filter-amount-max" name="amount_max" type="number" step="0.01" value="<?php echo h($amount_max_input); ?>" placeholder="e.g. 250">
                            <span class="loan-exp-inline-error" id="loan-filter-amount-max-error"></span>
                        </div>
                    </div>
                    <p class="loan-exp-filter-help">For a range, enter at least one boundary.</p>
                </section>

                <section class="loan-exp-filter-section" aria-labelledby="loanDateFilterTitle">
                    <h5 class="loan-exp-filter-section__title" id="loanDateFilterTitle">Expense date</h5>
                    <div class="form-group">
                        <label for="loan-filter-date-mode">Period</label>
                        <select class="form-control" id="loan-filter-date-mode" name="date_period">
                            <option value="any"<?php echo $date_period === "any" ? " selected" : ""; ?>>Any date</option>
                            <option value="year"<?php echo $date_period === "year" ? " selected" : ""; ?>>A whole year</option>
                            <option value="month"<?php echo $date_period === "month" ? " selected" : ""; ?>>A specific month</option>
                        </select>
                    </div>
                    <div class="form-group loan-exp-filter-field" id="loan-filter-year-field"<?php echo $date_period === "year" ? "" : " hidden"; ?>>
                        <label for="loan-filter-year">Year</label>
                        <input class="form-control" id="loan-filter-year" name="date_year" type="number" min="1900" max="2100" step="1" value="<?php echo h($date_year_input !== "" ? $date_year_input : date('Y')); ?>" placeholder="<?php echo h(date('Y')); ?>">
                        <span class="loan-exp-inline-error" id="loan-filter-year-error"></span>
                    </div>
                    <div class="form-group loan-exp-filter-field" id="loan-filter-month-field"<?php echo $date_period === "month" ? "" : " hidden"; ?>>
                        <label for="loan-filter-month">Month and year</label>
                        <input class="form-control" id="loan-filter-month" name="date_month" type="month" min="1900-01" max="2100-12" value="<?php echo h($date_month_input !== "" ? $date_month_input : date('Y-m')); ?>">
                        <span class="loan-exp-inline-error" id="loan-filter-month-error"></span>
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default" href="<?php echo h(loan_exp_current_url([
                    "amount_filter" => null,
                    "amount_min" => null,
                    "amount_max" => null,
                    "date_period" => null,
                    "date_year" => null,
                    "date_month" => null,
                    "page" => 1,
                    "loan_status" => null,
                ])); ?>">Clear advanced filters</a>
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="return window.loanExpCloseButton ? window.loanExpCloseButton(this) : true;">Cancel</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-filter" aria-hidden="true"></i> Apply filters</button>
            </div>
        </form>
    </div>
</div>

<?php if (User::is_admin()) { ?>
    <div class="modal fade loan-exp-modal" id="loanExpenseCreateModal" tabindex="-1" role="dialog" aria-labelledby="loanExpenseCreateTitle">
        <div class="modal-dialog" role="document">
            <form class="modal-content" method="post" action="<?php echo h($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="csrf_tokenloan_exp" value="<?php echo h($csrf_token_loan_exp); ?>">
                <input type="hidden" name="loan_exp_action" value="create">
                <input type="hidden" name="return_to" value="<?php echo h(loan_exp_current_url(["loan_status" => null])); ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="return window.loanExpCloseButton ? window.loanExpCloseButton(this) : true;"><span aria-hidden="true">&times;</span></button>
                    <p class="loan-exp-modal__eyebrow">Expense</p>
                    <h4 class="modal-title" id="loanExpenseCreateTitle">New expense</h4>
                </div>
                <div class="modal-body">
                    <?php include SITE_ROOT . DS . 'Inspinia' . DS . 'loan_exp_form_fields.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="return window.loanExpCloseButton ? window.loanExpCloseButton(this) : true;">Cancel</button>
                    <button type="submit" class="btn btn-primary loan-exp-modal__submit">
                        <i class="fa fa-money" aria-hidden="true"></i> Create expense
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade loan-exp-modal" id="loanExpenseEditModal" tabindex="-1" role="dialog" aria-labelledby="loanExpenseEditTitle">
        <div class="modal-dialog" role="document">
            <form class="modal-content" method="post" action="<?php echo h($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="csrf_tokenloan_exp" value="<?php echo h($csrf_token_loan_exp); ?>">
                <input type="hidden" name="loan_exp_action" value="update">
                <input type="hidden" name="return_to" value="<?php echo h(loan_exp_current_url(["loan_status" => null])); ?>">
                <input type="hidden" name="id" id="edit-expense-id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="return window.loanExpCloseButton ? window.loanExpCloseButton(this) : true;"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="loanExpenseEditTitle">Edit expense item</h4>
                </div>
                <div class="modal-body">
                    <?php
                    $loan_exp_form_prefix = "edit-";
                    $loan_exp_form_values = [];
                    include SITE_ROOT . DS . 'Inspinia' . DS . 'loan_exp_form_fields.php';
                    unset($loan_exp_form_prefix, $loan_exp_form_values);
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="return window.loanExpCloseButton ? window.loanExpCloseButton(this) : true;">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade loan-exp-modal" id="loanExpenseDeleteModal" tabindex="-1" role="dialog" aria-labelledby="loanExpenseDeleteTitle">
        <div class="modal-dialog" role="document">
            <form class="modal-content" method="post" action="<?php echo h($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="csrf_tokenloan_exp" value="<?php echo h($csrf_token_loan_exp); ?>">
                <input type="hidden" name="loan_exp_action" value="delete">
                <input type="hidden" name="return_to" value="<?php echo h(loan_exp_current_url(["loan_status" => null])); ?>">
                <input type="hidden" name="id" id="delete-expense-id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="return window.loanExpCloseButton ? window.loanExpCloseButton(this) : true;"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="loanExpenseDeleteTitle">Delete expense item</h4>
                </div>
                <div class="modal-body">
                    <p>Delete this expense item?</p>
                    <p class="text-muted" id="delete-expense-summary"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="return window.loanExpCloseButton ? window.loanExpCloseButton(this) : true;">Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        window.loanExpShowModalFallback = function(modal) {
            modal.style.display = 'block';
            modal.removeAttribute('aria-hidden');
            modal.setAttribute('aria-modal', 'true');
            modal.classList.add('in');
            document.body.classList.add('modal-open');

            if (!document.querySelector('.modal-backdrop[data-loan-exp-fallback="1"]')) {
                var backdrop = document.createElement('div');
                backdrop.className = 'modal-backdrop fade in';
                backdrop.setAttribute('data-loan-exp-fallback', '1');
                document.body.appendChild(backdrop);
            }
        };

        window.loanExpHideModalFallback = function(modal) {
            modal.style.display = 'none';
            modal.setAttribute('aria-hidden', 'true');
            modal.removeAttribute('aria-modal');
            modal.classList.remove('in');
            document.body.classList.remove('modal-open');
            document.querySelectorAll('.modal-backdrop[data-loan-exp-fallback="1"]').forEach(function(backdrop) {
                backdrop.parentNode.removeChild(backdrop);
            });
        };

        window.loanExpCloseButton = function(button) {
            var modal = button ? button.closest('.loan-exp-modal') : null;

            if (!modal) {
                return true;
            }

            window.loanExpHideModalFallback(modal);
            return false;
        };

        window.loanExpOpenModalFallback = function(target) {
            var modal = target ? document.querySelector(target) : null;

            if (!modal) {
                return true;
            }

            window.loanExpShowModalFallback(modal);
            return false;
        };

        document.addEventListener('DOMContentLoaded', function() {
            var showLoanModal = function(modal) {
                window.loanExpShowModalFallback(modal);
            };

            var hideLoanModal = function(modal) {
                window.loanExpHideModalFallback(modal);
            };

            var currentReturnUrl = function(fragment) {
                var url = new URL(window.location.href);
                url.searchParams.delete('loan_status');
                url.searchParams.delete('loan_id');
                url.hash = fragment || '';
                return url.pathname + url.search + url.hash;
            };

            document.querySelectorAll('.js-loan-exp-edit').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();

                    var modal = document.getElementById('loanExpenseEditModal');
                    if (!modal) {
                        return;
                    }

                    var fields = {
                        'edit-expense-id': 'id',
                        'edit-amount': 'amount',
                        'edit-rate': 'rate',
                        'edit-person-id': 'personId',
                        'edit-ccy-id': 'ccyId',
                        'edit-expense-type-id': 'expenseTypeId',
                        'edit-expense-date': 'expenseDate',
                        'edit-comment': 'comment',
                        'edit-document': 'document'
                    };

                    Object.keys(fields).forEach(function(id) {
                        var input = modal.querySelector('#' + id);
                        if (input) {
                            input.value = button.dataset[fields[id]] || '';
                        }
                    });

                    modal.querySelectorAll('input[name="cash"]').forEach(function(radio) {
                        radio.checked = radio.value === String(button.dataset.cash || '0');
                    });

                    var returnTo = modal.querySelector('input[name="return_to"]');
                    if (returnTo && button.dataset.id) {
                        returnTo.value = currentReturnUrl('loan-exp-row-' + button.dataset.id);
                    }

                    showLoanModal(modal);
                });
            });

            document.querySelectorAll('.js-loan-exp-delete').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();

                    var modal = document.getElementById('loanExpenseDeleteModal');
                    if (!modal) {
                        return;
                    }

                    var idInput = modal.querySelector('#delete-expense-id');
                    var summary = modal.querySelector('#delete-expense-summary');

                    if (idInput) {
                        idInput.value = button.dataset.id || '';
                    }
                    if (summary) {
                        summary.textContent = button.dataset.comment || ('Expense #' + (button.dataset.id || ''));
                    }

                    var returnTo = modal.querySelector('input[name="return_to"]');
                    if (returnTo && button.dataset.id) {
                        returnTo.value = currentReturnUrl('loan-exp-row-' + button.dataset.id);
                    }

                    showLoanModal(modal);
                });
            });

            document.addEventListener('click', function(event) {
                var trigger = event.target.closest('[data-loan-exp-target]');

                if (trigger) {
                    var target = trigger.getAttribute('data-loan-exp-target');
                    var modal = target ? document.querySelector(target) : null;

                    if (modal) {
                        event.preventDefault();
                        showLoanModal(modal);
                        return;
                    }
                }

                var dismissButton = event.target.closest('[data-dismiss="modal"]');

                if (dismissButton) {
                    var dismissModal = dismissButton.closest('.modal');

                    if (dismissModal && dismissModal.classList.contains('loan-exp-modal')) {
                        event.preventDefault();
                        hideLoanModal(dismissModal);
                    }
                }
            });
        });
    </script>
<?php } ?>

<script>
    window.loanExpShowModalFallback = window.loanExpShowModalFallback || function(modal) {
        modal.style.display = 'block';
        modal.removeAttribute('aria-hidden');
        modal.setAttribute('aria-modal', 'true');
        modal.classList.add('in');
        document.body.classList.add('modal-open');

        if (!document.querySelector('.modal-backdrop[data-loan-exp-fallback="1"]')) {
            var backdrop = document.createElement('div');
            backdrop.className = 'modal-backdrop fade in';
            backdrop.setAttribute('data-loan-exp-fallback', '1');
            document.body.appendChild(backdrop);
        }
    };

    window.loanExpHideModalFallback = window.loanExpHideModalFallback || function(modal) {
        modal.style.display = 'none';
        modal.setAttribute('aria-hidden', 'true');
        modal.removeAttribute('aria-modal');
        modal.classList.remove('in');
        document.body.classList.remove('modal-open');
        document.querySelectorAll('.modal-backdrop[data-loan-exp-fallback="1"]').forEach(function(backdrop) {
            backdrop.parentNode.removeChild(backdrop);
        });
    };

    window.loanExpOpenModalFallback = window.loanExpOpenModalFallback || function(target) {
        var modal = target ? document.querySelector(target) : null;
        if (!modal) {
            return true;
        }
        window.loanExpShowModalFallback(modal);
        return false;
    };

    window.loanExpCloseButton = window.loanExpCloseButton || function(button) {
        var modal = button ? button.closest('.loan-exp-modal') : null;
        if (!modal) {
            return true;
        }
        window.loanExpHideModalFallback(modal);
        return false;
    };

    document.addEventListener('DOMContentLoaded', function() {
        var expensePage = document.querySelector('.loan-exp-page');

        if (expensePage) {
            expensePage.addEventListener('wheel', function(event) {
                if (event.ctrlKey || event.metaKey || document.body.classList.contains('modal-open')) {
                    return;
                }

                var delta = event.deltaY;
                if (!delta || Math.abs(delta) < Math.abs(event.deltaX)) {
                    return;
                }

                if (event.deltaMode === 1) {
                    delta *= 16;
                } else if (event.deltaMode === 2) {
                    delta *= window.innerHeight;
                }

                var maxScroll = Math.max(document.documentElement.scrollHeight - window.innerHeight, 0);
                if (maxScroll <= 1) {
                    return;
                }

                event.preventDefault();
                window.scrollTo(0, Math.max(0, Math.min(maxScroll, window.scrollY + delta)));
            }, {passive: false});
        }

        var filterForm = document.getElementById('loan-exp-filter-form');

        if (filterForm) {
            var amountMode = document.getElementById('loan-filter-amount-mode');
            var amountRange = document.getElementById('loan-filter-amount-range');
            var amountMin = document.getElementById('loan-filter-amount-min');
            var amountMax = document.getElementById('loan-filter-amount-max');
            var dateMode = document.getElementById('loan-filter-date-mode');
            var yearField = document.getElementById('loan-filter-year-field');
            var yearInput = document.getElementById('loan-filter-year');
            var monthField = document.getElementById('loan-filter-month-field');
            var monthInput = document.getElementById('loan-filter-month');
            var filterSummary = document.getElementById('loan-filter-error-summary');

            var toggleFilterFields = function() {
                amountRange.hidden = amountMode.value !== 'range';
                yearField.hidden = dateMode.value !== 'year';
                monthField.hidden = dateMode.value !== 'month';
            };

            var clearFilterErrors = function() {
                filterForm.querySelectorAll('.has-error').forEach(function(group) {
                    group.classList.remove('has-error');
                });
                filterForm.querySelectorAll('.loan-exp-inline-error').forEach(function(error) {
                    error.textContent = '';
                });
                filterSummary.hidden = true;
            };

            var setFilterError = function(input, message) {
                var group = input.closest('.form-group');
                var error = document.getElementById(input.id + '-error');
                if (group) {
                    group.classList.add('has-error');
                }
                if (error) {
                    error.textContent = message;
                }
            };

            amountMode.addEventListener('change', function() {
                clearFilterErrors();
                toggleFilterFields();
            });
            dateMode.addEventListener('change', function() {
                clearFilterErrors();
                toggleFilterFields();
            });

            [amountMin, amountMax, yearInput, monthInput].forEach(function(input) {
                input.addEventListener('input', function() {
                    var group = input.closest('.form-group');
                    var error = document.getElementById(input.id + '-error');
                    if (group) {
                        group.classList.remove('has-error');
                    }
                    if (error) {
                        error.textContent = '';
                    }
                });
            });

            filterForm.addEventListener('submit', function(event) {
                clearFilterErrors();
                var firstInvalid = null;

                if (amountMode.value === 'range') {
                    var minText = amountMin.value.trim();
                    var maxText = amountMax.value.trim();
                    var minValue = minText === '' ? null : Number(minText);
                    var maxValue = maxText === '' ? null : Number(maxText);

                    if (minValue === null && maxValue === null) {
                        setFilterError(amountMin, 'Enter a minimum or maximum amount.');
                        setFilterError(amountMax, 'Enter a minimum or maximum amount.');
                        firstInvalid = amountMin;
                    } else if ((minValue !== null && !Number.isFinite(minValue)) || (maxValue !== null && !Number.isFinite(maxValue))) {
                        if (minValue !== null && !Number.isFinite(minValue)) {
                            setFilterError(amountMin, 'Enter a valid number.');
                            firstInvalid = firstInvalid || amountMin;
                        }
                        if (maxValue !== null && !Number.isFinite(maxValue)) {
                            setFilterError(amountMax, 'Enter a valid number.');
                            firstInvalid = firstInvalid || amountMax;
                        }
                    } else if (minValue !== null && maxValue !== null && minValue > maxValue) {
                        setFilterError(amountMin, 'The minimum must not exceed the maximum.');
                        setFilterError(amountMax, 'The maximum must be at least the minimum.');
                        firstInvalid = amountMin;
                    }
                }

                if (dateMode.value === 'year') {
                    var yearValue = Number(yearInput.value);
                    if (!yearInput.value.trim() || !Number.isInteger(yearValue) || yearValue < 1900 || yearValue > 2100) {
                        setFilterError(yearInput, 'Enter a year between 1900 and 2100.');
                        firstInvalid = firstInvalid || yearInput;
                    }
                }

                if (dateMode.value === 'month' && !/^\d{4}-(0[1-9]|1[0-2])$/.test(monthInput.value)) {
                    setFilterError(monthInput, 'Choose a valid month and year.');
                    firstInvalid = firstInvalid || monthInput;
                }

                if (firstInvalid) {
                    event.preventDefault();
                    filterSummary.hidden = false;
                    firstInvalid.focus();
                    firstInvalid.scrollIntoView({behavior: 'smooth', block: 'center'});
                } else {
                    amountMin.disabled = amountMode.value !== 'range';
                    amountMax.disabled = amountMode.value !== 'range';
                    yearInput.disabled = dateMode.value !== 'year';
                    monthInput.disabled = dateMode.value !== 'month';
                }
            });

            toggleFilterFields();
        }

        var toast = document.getElementById('loan-exp-toast');
        if (toast) {
            window.setTimeout(function() {
                toast.classList.add('is-visible');
            }, 40);

            window.setTimeout(function() {
                toast.classList.remove('is-visible');
                window.setTimeout(function() {
                    if (toast.parentNode) {
                        toast.parentNode.removeChild(toast);
                    }
                }, 220);
            }, parseInt(toast.getAttribute('data-auto-dismiss'), 10) || 2800);
        }

        var searchInput = document.getElementById('loan-search');
        var searchStatus = document.getElementById('loan-search-status');
        var searchForm = searchInput ? searchInput.form : null;
        var searchSubmit = document.getElementById('loan-search-submit');

        if (!searchInput || !searchForm) {
            return;
        }

        var refreshSearchState = function() {
            var value = searchInput.value.trim();

            if (value.length > 0 && value.length < 2) {
                if (searchStatus) {
                    searchStatus.textContent = 'Type one more letter to search.';
                }
                if (searchSubmit) {
                    searchSubmit.disabled = true;
                }
                return;
            }

            if (searchStatus) {
                searchStatus.textContent = value.length >= 2 ? 'Ready. Press Search or Enter.' : '';
            }
            if (searchSubmit) {
                searchSubmit.disabled = false;
            }
        };

        searchInput.addEventListener('input', refreshSearchState);

        searchInput.addEventListener('keydown', function(event) {
            if (event.key !== 'Enter') {
                return;
            }

            if (searchInput.value.trim().length === 1) {
                event.preventDefault();
                refreshSearchState();
                return;
            }

            event.preventDefault();
            searchForm.submit();
        });

        searchForm.addEventListener('submit', function(event) {
            if (searchInput.value.trim().length === 1) {
                event.preventDefault();
                refreshSearchState();
            }
        });

        refreshSearchState();
    });
</script>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php"); ?>
