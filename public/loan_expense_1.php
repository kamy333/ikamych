<?php require_once('../includes/initialize.php'); ?>

<?php
if (!(User::is_caroline() || User::is_weslley())) {
    redirect_to('../index.php');
}
?>

<?php $layout_context = "public"; ?>
<?php $active_menu = "about"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<style>
    .loan-summary-page {
        --romania-blue: #002b7f;
        --romania-blue-dark: #001f5c;
        --romania-yellow: #fcd116;
        --romania-red: #ce1126;
        --loan-border: #dce5f4;
        --loan-muted: #5d6b82;
        background: #f5f8fc;
        margin: 0 -15px;
        min-height: calc(100vh - 140px);
        padding: 24px 18px 38px;
    }

    .loan-summary-page .loan-shell {
        margin: 0 auto;
        max-width: 1480px;
    }

    .loan-summary-page .loan-header {
        align-items: center;
        background: linear-gradient(135deg, var(--romania-blue), var(--romania-blue-dark));
        border-bottom: 4px solid var(--romania-yellow);
        color: #fff;
        display: flex;
        gap: 18px;
        justify-content: space-between;
        margin-bottom: 18px;
        padding: 20px 22px;
    }

    .loan-summary-page .loan-header h1 {
        font-size: 26px;
        font-weight: 700;
        line-height: 1.2;
        margin: 0;
    }

    .loan-summary-page .loan-header p {
        color: rgba(255, 255, 255, .78);
        margin: 6px 0 0;
    }

    .loan-summary-page .loan-header-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: flex-end;
        position: relative;
    }

    .loan-summary-page .loan-header-actions .btn {
        border-radius: 4px;
        font-weight: 700;
        white-space: nowrap;
    }

    .loan-summary-page .loan-header-actions .btn-primary {
        background: var(--romania-yellow);
        border-color: var(--romania-yellow);
        color: #17233c;
    }

    .loan-summary-page .loan-header-actions .btn-default {
        background: rgba(255, 255, 255, .12);
        border-color: rgba(255, 255, 255, .35);
        color: #fff;
    }

    .loan-summary-page .loan-header-actions .loan-header-excel {
        background: #217346;
        border-color: #217346;
        color: #fff;
    }

    .loan-summary-page .loan-header-actions .loan-header-excel:hover,
    .loan-summary-page .loan-header-actions .loan-header-excel:focus {
        background: #185c37;
        border-color: #185c37;
        color: #fff;
    }

    .loan-summary-page .loan-header-more {
        position: relative;
    }

    .loan-summary-page .loan-header-more__button {
        align-items: center;
        display: inline-flex;
        height: 34px;
        justify-content: center;
        min-width: 42px;
        padding: 6px 10px;
    }

    .loan-summary-page .loan-header-more.is-open .loan-header-more__button,
    .loan-summary-page .loan-header-more__button:hover,
    .loan-summary-page .loan-header-more__button:focus {
        background: rgba(255, 255, 255, .2);
        border-color: rgba(255, 255, 255, .5);
        color: #fff;
    }

    .loan-summary-page .loan-header-more__menu {
        background: #fff;
        border: 1px solid var(--loan-border);
        box-shadow: 0 14px 30px rgba(15, 23, 42, .22);
        display: none;
        min-width: 190px;
        padding: 6px;
        position: absolute;
        right: 0;
        top: calc(100% + 7px);
        z-index: 20;
    }

    .loan-summary-page .loan-header-more.is-open .loan-header-more__menu,
    .loan-summary-page .loan-header-more:hover .loan-header-more__menu,
    .loan-summary-page .loan-header-more:focus-within .loan-header-more__menu {
        display: block;
    }

    .loan-summary-page .loan-header-more__menu a {
        align-items: center;
        border-radius: 4px;
        color: #1d293d;
        display: flex;
        font-weight: 700;
        gap: 8px;
        padding: 9px 10px;
        text-decoration: none;
        white-space: nowrap;
    }

    .loan-summary-page .loan-header-more__menu a:hover,
    .loan-summary-page .loan-header-more__menu a:focus {
        background: #eef5ff;
        color: var(--romania-blue);
        text-decoration: none;
    }

    .loan-summary-page .loan-report-grid {
        display: grid;
        gap: 16px;
        grid-template-columns: repeat(12, minmax(0, 1fr));
    }

    .loan-summary-page .loan-report-card {
        grid-column: span 4;
        min-width: 0;
    }

    .loan-summary-page .loan-report-card--wide {
        grid-column: 1 / -1;
    }

    .loan-summary-page .loan-report-card > [class*="col-"] {
        float: none;
        padding-left: 0;
        padding-right: 0;
        width: 100%;
    }

    .loan-summary-page .ibox {
        background: #fff;
        border: 1px solid var(--loan-border);
        border-radius: 6px;
        box-shadow: 0 10px 26px rgba(0, 43, 127, .08);
        margin-bottom: 0;
        overflow: hidden;
    }

    .loan-summary-page .ibox-title {
        align-items: center;
        background: #fff;
        border-bottom: 1px solid var(--loan-border);
        display: flex;
        justify-content: space-between;
        min-height: 52px;
        padding: 13px 16px;
    }

    .loan-summary-page .ibox-title h5 {
        color: var(--romania-blue);
        flex: 1 1 auto;
        font-size: 15px;
        font-weight: 700;
        line-height: 1.35;
        margin: 0;
        text-align: left;
    }

    .loan-summary-page .ibox-tools {
        align-items: center;
        display: flex;
        flex: 0 0 auto;
        gap: 8px;
        margin-left: 10px;
    }

    .loan-summary-page .ibox-tools a {
        align-items: center;
        background: #eef4ff;
        border: 1px solid #d0ddf4;
        border-radius: 4px;
        color: var(--romania-blue);
        cursor: pointer;
        display: inline-flex;
        height: 30px;
        justify-content: center;
        line-height: 1;
        text-decoration: none;
        width: 30px;
    }

    .loan-summary-page .ibox-tools a:hover,
    .loan-summary-page .ibox-tools a:focus {
        background: var(--romania-blue);
        border-color: var(--romania-blue);
        color: #fff;
        outline: none;
        text-decoration: none;
    }

    .loan-summary-page .ibox-tools .close-link:hover,
    .loan-summary-page .ibox-tools .close-link:focus {
        background: var(--romania-red);
        border-color: var(--romania-red);
    }

    .loan-summary-page .ibox.is-collapsed .ibox-content {
        display: none;
    }

    .loan-summary-page .ibox.is-collapsed .ibox-title {
        border-bottom: 0;
    }

    .loan-summary-page .ibox-content {
        padding: 14px;
    }

    .loan-summary-page .loan-export-btn {
        align-items: center;
        background: #217346;
        border: 1px solid #217346;
        border-radius: 4px;
        color: #fff;
        display: inline-flex;
        font-size: 12px;
        font-weight: 700;
        gap: 7px;
        margin-bottom: 10px;
        padding: 7px 10px;
        text-decoration: none;
        white-space: nowrap;
    }

    .loan-summary-page .loan-export-btn:hover,
    .loan-summary-page .loan-export-btn:focus {
        background: #185c37;
        border-color: #185c37;
        color: #fff;
        text-decoration: none;
    }

    .loan-summary-page table {
        border-color: var(--loan-border);
        margin-bottom: 0;
        min-width: 100%;
    }

    .loan-summary-page .loan-report-card--wide table {
        min-width: 1180px;
    }

    .loan-summary-page .ibox-content {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .loan-summary-page th {
        background: var(--romania-blue);
        color: #fff;
        font-size: 12px;
        position: sticky;
        top: 0;
        vertical-align: middle !important;
        white-space: nowrap;
        z-index: 1;
    }

    .loan-summary-page td {
        color: #1d293d;
        font-size: 12px;
        vertical-align: middle !important;
    }

    .loan-summary-page tr:last-child td,
    .loan-summary-page tr:last-child td strong {
        background: #fff8d8;
        color: #17233c;
    }

    @media (max-width: 1199px) {
        .loan-summary-page .loan-report-card {
            grid-column: span 6;
        }

        .loan-summary-page .loan-report-card--wide {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 767px) {
        .loan-summary-page {
            margin: 0 -15px;
            padding: 14px 10px 28px;
        }

        .loan-summary-page .loan-header {
            align-items: stretch;
            flex-direction: column;
            padding: 16px;
        }

        .loan-summary-page .loan-header h1 {
            font-size: 21px;
        }

        .loan-summary-page .loan-header-actions {
            justify-content: stretch;
        }

        .loan-summary-page .loan-header-actions .btn {
            flex: 1 1 160px;
        }

        .loan-summary-page .loan-header-more {
            flex: 0 0 auto;
        }

        .loan-summary-page .loan-header-more__button {
            min-width: 44px;
        }

        .loan-summary-page .loan-report-grid {
            display: block;
        }

        .loan-summary-page .loan-report-card {
            margin-bottom: 14px;
        }

        .loan-summary-page .ibox-title {
            align-items: flex-start;
            gap: 8px;
            min-height: 0;
        }

        .loan-summary-page .ibox-title h5 {
            font-size: 14px;
        }
    }
</style>

<main class="loan-summary-page">
    <div class="loan-shell">
        <header class="loan-header">
            <div>
                <h1>Loans Mum Summary</h1>
                <p>Loan, reimbursement, and cash reporting in CHF.</p>
            </div>
            <div class="loan-header-actions">
                <a class="btn loan-header-excel" href="/Inspinia/loan_exp_2.php?report=Report4&id=0&filename=Pret-Rbt+Mum+All"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export all Excel</a>
                <a class="btn btn-default" href="/public/loan_expense.php"><i class="fa fa-table" aria-hidden="true"></i> Loan list</a>
                <div class="loan-header-more">
                    <button class="btn btn-default loan-header-more__button" type="button" aria-controls="loan-header-more-menu" aria-expanded="false" aria-label="More loan actions">
                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    </button>
                    <div class="loan-header-more__menu" id="loan-header-more-menu">
                        <a href="/Inspinia/loan_exp.php"><i class="fa fa-list" aria-hidden="true"></i> Go to expense</a>
                    </div>
                </div>
            </div>
        </header>

        <section class="loan-report-grid">
            <div class="loan-report-card">
                <?php echo Table::ibox_table(ReportFinance::Report1(), "Prêt-Rbt Mum Year Month", 12, 0); ?>
            </div>

            <div class="loan-report-card">
                <?php echo Table::ibox_table(ReportFinance::Report(1), "Prêt-Rbt Mum Year", 12, 0); ?>
            </div>

            <div class="loan-report-card">
                <?php echo Table::ibox_table(ReportFinance::Report(2), "Mum Prêt by Year", 12, 0); ?>
            </div>

            <div class="loan-report-card">
                <?php echo Table::ibox_table(ReportFinance::Report(3), "Mum Rbt by Year", 12, 0); ?>
            </div>
        </section>
    </div>
</main>

<script>
    function initLoanSummaryPage() {
        var page = document.querySelector('.loan-summary-page');

        if (!page) {
            return;
        }

        var moreMenu = page.querySelector('.loan-header-more');
        var moreButton = page.querySelector('.loan-header-more__button');
        var moreMenuPanel = page.querySelector('.loan-header-more__menu');

        var setMoreMenuOpen = function(isOpen) {
            if (!moreMenu || !moreButton || !moreMenuPanel) {
                return;
            }

            moreMenu.classList.toggle('is-open', isOpen);
            moreButton.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        };

        if (moreMenu && moreButton && moreMenuPanel) {
            moreButton.addEventListener('click', function(event) {
                event.stopPropagation();
                setMoreMenuOpen(!moreMenu.classList.contains('is-open'));
            });

            document.addEventListener('click', function(event) {
                if (!moreMenu.contains(event.target)) {
                    setMoreMenuOpen(false);
                }
            });

            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    setMoreMenuOpen(false);
                    moreButton.focus();
                }
            });
        }

        page.querySelectorAll('.collapse-link').forEach(function(link) {
            link.setAttribute('role', 'button');
            link.setAttribute('tabindex', '0');
            link.setAttribute('aria-label', 'Collapse report');
            link.setAttribute('aria-expanded', 'true');
            link.setAttribute('title', 'Collapse report');
        });

        page.querySelectorAll('.close-link').forEach(function(link) {
            link.setAttribute('role', 'button');
            link.setAttribute('tabindex', '0');
            link.setAttribute('aria-label', 'Close report');
            link.setAttribute('title', 'Close report');
        });

        var activateTool = function(target) {
            var collapse = target.closest('.collapse-link');
            var close = target.closest('.close-link');

            if (!collapse && !close) {
                return;
            }

            var ibox = target.closest('.ibox');

            if (!ibox) {
                return;
            }

            if (collapse) {
                var icon = collapse.querySelector('i');
                var collapsed = ibox.classList.toggle('is-collapsed');
                collapse.setAttribute('aria-expanded', collapsed ? 'false' : 'true');
                collapse.setAttribute('aria-label', collapsed ? 'Expand report' : 'Collapse report');
                collapse.setAttribute('title', collapsed ? 'Expand report' : 'Collapse report');

                if (icon) {
                    icon.classList.toggle('fa-chevron-up', !collapsed);
                    icon.classList.toggle('fa-chevron-down', collapsed);
                }
            }

            if (close) {
                var reportCard = ibox.closest('.loan-report-card');
                (reportCard || ibox).remove();
            }
        };

        page.addEventListener('click', function(event) {
            if (event.target.closest('.collapse-link, .close-link')) {
                event.preventDefault();
                activateTool(event.target);
            }
        });

        page.addEventListener('keydown', function(event) {
            if ((event.key === 'Enter' || event.key === ' ') && event.target.closest('.collapse-link, .close-link')) {
                event.preventDefault();
                activateTool(event.target);
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initLoanSummaryPage);
    } else {
        initLoanSummaryPage();
    }
</script>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
