<?php

class ExpenseDocumentVault
{
    private const SESSION_UNLOCK_KEY = 'expense_document_vault_unlocked_until';
    private const UNLOCK_SECONDS = 900;

    private const SOURCE_CLASSES = [
        'expense' => MyExpense::class,
        'caroline' => MyExpenseCaroline::class,
        'mum_post' => MyExpenseMumPost::class,
        'loan' => MyLoan::class,
    ];

    private const CLASS_SOURCES = [
        MyExpense::class => 'expense',
        MyExpenseMum::class => 'expense',
        ReportFinance::class => 'expense',
        MyExpenseCaroline::class => 'caroline',
        MyExpenseMumPost::class => 'mum_post',
        MyLoan::class => 'loan',
    ];

    private const MIME_TYPES = [
        'pdf' => 'application/pdf',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
    ];

    public static function isUnlocked()
    {
        $unlockedUntil = (int) ($_SESSION[self::SESSION_UNLOCK_KEY] ?? 0);

        if ($unlockedUntil <= time()) {
            self::lock();
            return false;
        }

        return true;
    }

    public static function unlock()
    {
        $_SESSION[self::SESSION_UNLOCK_KEY] = time() + self::UNLOCK_SECONDS;
    }

    public static function lock()
    {
        unset($_SESSION[self::SESSION_UNLOCK_KEY]);
    }

    public static function secondsRemaining()
    {
        if (!self::isUnlocked()) {
            return 0;
        }

        return max(0, (int) $_SESSION[self::SESSION_UNLOCK_KEY] - time());
    }

    public static function accessUrl($returnTo = '')
    {
        $url = '/public/admin/expense_document_access.php';

        if (is_safe_local_redirect($returnTo)) {
            $url = append_query_param($url, 'return_to', $returnTo);
        }

        return $url;
    }

    public static function documentUrl($source, $expenseId, $filename)
    {
        if (!isset(self::SOURCE_CLASSES[$source])) {
            return '';
        }

        return '/public/expense_document.php?' . http_build_query([
            'source' => $source,
            'id' => (int) $expenseId,
            'file' => (string) $filename,
        ], '', '&', PHP_QUERY_RFC3986);
    }

    public static function sourceForExpense($expense)
    {
        if (!is_object($expense)) {
            return null;
        }

        return self::CLASS_SOURCES[get_class($expense)] ?? null;
    }

    public static function resolveDocument($source, $expenseId, $filename)
    {
        $source = (string) $source;
        $expenseId = filter_var($expenseId, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1],
        ]);
        $filename = trim((string) $filename);

        if (!isset(self::SOURCE_CLASSES[$source]) || $expenseId === false || !self::isSafeFilename($filename)) {
            return false;
        }

        $extension = strtolower((string) pathinfo($filename, PATHINFO_EXTENSION));
        if (!isset(self::MIME_TYPES[$extension])) {
            return false;
        }

        $className = self::SOURCE_CLASSES[$source];
        $expense = $className::find_by_id($expenseId);
        if (!$expense || !self::expenseContainsDocument($expense, $filename)) {
            return false;
        }

        $baseDirectory = realpath(SITE_ROOT . DS . 'public' . DS . 'img' . DS . 'maman_document');
        if ($baseDirectory === false) {
            return false;
        }

        $filePath = realpath($baseDirectory . DS . $filename);
        if ($filePath === false || strcasecmp(dirname($filePath), $baseDirectory) !== 0 || !is_file($filePath)) {
            return false;
        }

        return [
            'path' => $filePath,
            'filename' => $filename,
            'mime_type' => self::MIME_TYPES[$extension],
            'extension' => $extension,
        ];
    }

    private static function isSafeFilename($filename)
    {
        if ($filename === '' || preg_match('/[\x00-\x1F\x7F]/', $filename)) {
            return false;
        }

        if (str_contains($filename, '/') || str_contains($filename, '\\')) {
            return false;
        }

        return basename($filename) === $filename;
    }

    private static function expenseContainsDocument($expense, $filename)
    {
        $documents = array_filter(array_map('trim', explode(',', (string) ($expense->document ?? ''))));

        return in_array($filename, $documents, true);
    }
}
