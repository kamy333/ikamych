<?php
require_once __DIR__ . '/../../includes/initialize.php';

$session->confirmation_protected_page();

if (!User::is_admin()) {
    http_response_code(403);
    header('Content-Type: text/plain; charset=UTF-8');
    echo 'Access denied.';
    exit;
}

$returnTo = login_return_to();
if ($returnTo === '') {
    $returnTo = '/Inspinia/loan_exp.php';
}

$error = '';
$passwordError = '';
$csrfId = 'expense_document_vault';

if (request_is_post()) {
    if (!request_is_same_domain() || !csrf_token_is_valid($csrfId) || !csrf_token_is_recent($csrfId)) {
        $error = 'The security token expired. Please try again.';
    } else {
        $action = (string) ($_POST['vault_action'] ?? '');

        if ($action === 'lock') {
            ExpenseDocumentVault::lock();
            redirect_to($returnTo);
        }

        if ($action === 'unlock') {
            $password = (string) ($_POST['password'] ?? '');
            $user = User::find_by_id($_SESSION['user_id'] ?? 0);
            $authenticatedUser = $user ? User::authenticate($user->username, $password) : false;

            if ($authenticatedUser && (int) $authenticatedUser->id === (int) $user->id) {
                session_regenerate_id(true);
                ExpenseDocumentVault::unlock();
                redirect_to($returnTo);
            }

            $error = 'The vault could not be unlocked.';
            $passwordError = 'Incorrect password. The documents remain locked.';
        }
    }
}

$csrfToken = create_csrf_token($csrfId);
$isUnlocked = ExpenseDocumentVault::isUnlocked();
$remainingMinutes = max(1, (int) ceil(ExpenseDocumentVault::secondsRemaining() / 60));

$stylesheets = '';
$layout_context = 'public';
$active_menu = 'about';
$fluid_view = true;
$javascript = '';
$incl_message_error = true;

include SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . 'header.php';
include SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . 'nav.php';
?>

<style>
    .expense-vault-page {
        max-width: 680px;
        margin: 40px auto 90px;
        padding: 0 16px;
    }

    .expense-vault-card {
        overflow: hidden;
        border: 1px solid #dbe4ee;
        border-radius: 14px;
        background: #ffffff;
        box-shadow: 0 24px 60px rgba(15, 23, 42, 0.13);
    }

    .expense-vault-card__header {
        padding: 28px 30px;
        background: linear-gradient(135deg, #0f4c81 0%, #0f172a 100%);
        color: #ffffff;
    }

    .expense-vault-card__header p {
        margin: 0 0 6px;
        color: #bae6fd;
        font-weight: 800;
        text-transform: uppercase;
    }

    .expense-vault-card__header h1 {
        margin: 0;
        font-size: 28px;
        font-weight: 900;
    }

    .expense-vault-card__body {
        padding: 28px 30px 30px;
    }

    .expense-vault-status {
        margin-bottom: 20px;
        padding: 14px 16px;
        border-radius: 9px;
        background: #fef2f2;
        color: #991b1b;
        font-weight: 800;
    }

    .expense-vault-status.is-unlocked {
        background: #ecfdf5;
        color: #166534;
    }

    .expense-vault-help {
        margin-bottom: 22px;
        color: #475569;
        line-height: 1.55;
    }

    .expense-vault-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 18px;
    }

    .expense-vault-actions .btn {
        min-height: 42px;
        font-weight: 800;
    }

    @media (max-width: 600px) {
        .expense-vault-card__header,
        .expense-vault-card__body {
            padding-right: 20px;
            padding-left: 20px;
        }

        .expense-vault-actions .btn {
            width: 100%;
        }
    }
</style>

<main class="expense-vault-page">
    <section class="expense-vault-card" aria-labelledby="expenseVaultTitle">
        <header class="expense-vault-card__header">
            <p><i class="fa fa-shield" aria-hidden="true"></i> Secure documents</p>
            <h1 id="expenseVaultTitle">Expense document vault</h1>
        </header>
        <div class="expense-vault-card__body">
            <?php if ($error !== '') { ?>
                <div class="alert alert-danger" role="alert"><?php echo h($error); ?></div>
            <?php } ?>

            <div class="expense-vault-status<?php echo $isUnlocked ? ' is-unlocked' : ''; ?>">
                <i class="fa <?php echo $isUnlocked ? 'fa-unlock' : 'fa-lock'; ?>" aria-hidden="true"></i>
                <?php echo $isUnlocked ? "Unlocked for approximately {$remainingMinutes} more minute(s)." : 'Locked. Direct document access is disabled.'; ?>
            </div>

            <p class="expense-vault-help">
                Direct access to the document folder always remains blocked. Unlocking only authorizes this administrator session for 15 minutes, after confirming your password.
            </p>

            <?php if ($isUnlocked) { ?>
                <form method="post" action="<?php echo h($_SERVER['PHP_SELF']); ?>">
                    <input type="hidden" name="csrf_token<?php echo h($csrfId); ?>" value="<?php echo h($csrfToken); ?>">
                    <input type="hidden" name="vault_action" value="lock">
                    <input type="hidden" name="return_to" value="<?php echo h($returnTo); ?>">
                    <div class="expense-vault-actions">
                        <button class="btn btn-danger" type="submit"><i class="fa fa-lock" aria-hidden="true"></i> Lock now</button>
                        <a class="btn btn-default" href="<?php echo h($returnTo); ?>">Back to expenses</a>
                    </div>
                </form>
            <?php } else { ?>
                <form id="expense-vault-unlock-form" method="post" action="<?php echo h($_SERVER['PHP_SELF']); ?>" novalidate>
                    <input type="hidden" name="csrf_token<?php echo h($csrfId); ?>" value="<?php echo h($csrfToken); ?>">
                    <input type="hidden" name="vault_action" value="unlock">
                    <input type="hidden" name="return_to" value="<?php echo h($returnTo); ?>">
                    <div class="form-group<?php echo $passwordError !== '' ? ' has-error' : ''; ?>" id="expense-vault-password-group">
                        <label for="expense-vault-password">Confirm your password</label>
                        <input class="form-control" id="expense-vault-password" name="password" type="password" required autocomplete="current-password" autofocus>
                        <span class="help-block" id="expense-vault-password-error"<?php echo $passwordError === '' ? ' hidden' : ''; ?>><?php echo h($passwordError); ?></span>
                    </div>
                    <div class="expense-vault-actions">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-unlock" aria-hidden="true"></i> Unlock for 15 minutes</button>
                        <a class="btn btn-default" href="<?php echo h($returnTo); ?>">Cancel</a>
                    </div>
                </form>
            <?php } ?>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('expense-vault-unlock-form');
        if (!form) {
            return;
        }

        var password = document.getElementById('expense-vault-password');
        var group = document.getElementById('expense-vault-password-group');
        var error = document.getElementById('expense-vault-password-error');

        var clearPasswordError = function() {
            group.classList.remove('has-error');
            error.textContent = '';
            error.hidden = true;
        };

        password.addEventListener('input', clearPasswordError);

        form.addEventListener('submit', function(event) {
            clearPasswordError();

            if (password.value.trim() === '') {
                event.preventDefault();
                group.classList.add('has-error');
                error.textContent = 'Enter your current password.';
                error.hidden = false;
                password.focus();
            }
        });
    });
</script>

<?php include SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . 'footer.php'; ?>
