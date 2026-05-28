<?php

if (!function_exists('links_hub_render_page')) {
    function links_hub_render_page(array $config)
    {
        $kicker = $config['kicker'] ?? 'Link library';
        $title = $config['title'] ?? 'Useful links, cleaned up.';
        $copy = $config['copy'] ?? 'Choose a category, then open links without losing this page.';
        $category_html = $config['category_html'] ?? '';
        $sections = $config['sections'] ?? [];
        ?>

<style>
    body {
        background: #eef3f7;
    }

    .links-page {
        min-height: calc(100vh - 72px);
        padding: 28px 16px 92px;
        color: #172033;
        background:
            linear-gradient(135deg, rgba(232, 248, 246, 0.95) 0%, rgba(248, 250, 252, 0.96) 52%, rgba(255, 247, 237, 0.92) 100%),
            url("/public/css/patterns/shattered.png");
    }

    .links-shell {
        width: min(1360px, 100%);
        margin: 0 auto;
    }

    .links-hero {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 22px;
        min-height: 160px;
        padding: 26px 30px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 8px;
        background:
            linear-gradient(135deg, rgba(13, 116, 137, 0.95) 0%, rgba(15, 23, 42, 0.97) 100%),
            url("/public/css/patterns/triangular.png");
        box-shadow: 0 20px 48px rgba(31, 48, 63, 0.14);
        color: #fff;
    }

    .links-hero__kicker {
        margin: 0 0 8px;
        color: #99f6e4;
        font-size: 12px;
        font-weight: 900;
        text-transform: uppercase;
    }

    .links-hero h1 {
        margin: 0;
        color: #fff;
        font-size: 34px;
        line-height: 1.08;
        font-weight: 900;
    }

    .links-hero__copy {
        max-width: 660px;
        margin: 10px 0 0;
        color: rgba(255, 255, 255, 0.82);
        font-size: 15px;
        line-height: 1.5;
    }

    .links-hero__actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .links-hero__button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 40px;
        padding: 9px 14px;
        border: 1px solid rgba(255, 255, 255, 0.26);
        border-radius: 6px;
        background: rgba(255, 255, 255, 0.13);
        color: #fff;
        font-weight: 800;
        text-decoration: none;
    }

    .links-hero__button:hover,
    .links-hero__button:focus {
        color: #fff;
        background: rgba(255, 255, 255, 0.22);
        text-decoration: none;
    }

    .links-hero__button--primary {
        border-color: #99f6e4;
        background: #ccfbf1;
        color: #134e4a;
    }

    .links-hero__button--primary:hover,
    .links-hero__button--primary:focus {
        background: #99f6e4;
        color: #134e4a;
    }

    .links-messages {
        margin-top: 14px;
    }

    .links-tabs {
        margin-top: 16px;
        padding: 12px;
        border: 1px solid rgba(40, 64, 82, 0.12);
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.94);
        box-shadow: 0 18px 46px rgba(31, 48, 63, 0.08);
    }

    .links-tabs .nav-tabs {
        border-bottom: 1px solid #d9e4ec;
        margin-bottom: 8px;
    }

    .links-tabs .nav-tabs > li > a,
    .links-tabs .nav-pills > li > a {
        padding: 8px 11px;
        border-radius: 6px;
        color: #385269;
        font-size: 13px;
        font-weight: 800;
        line-height: 1.2;
    }

    .links-tabs .nav-tabs > li.active > a,
    .links-tabs .nav-pills > li.active > a {
        border-color: #00836f;
        background: #00836f;
        color: #fff;
    }

    .links-tabs .nav-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 5px 7px;
    }

    .links-tabs .nav-pills > li {
        float: none;
    }

    .links-section-title {
        margin: 20px 0 10px;
        color: #10243b;
        font-size: 13px;
        font-weight: 900;
        text-transform: uppercase;
    }

    .links-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }

    .links-dynamic-card .table-responsive {
        overflow: hidden;
        border: 1px solid rgba(40, 64, 82, 0.12);
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.96);
        box-shadow: 0 18px 46px rgba(31, 48, 63, 0.08);
    }

    .links-page table.table {
        width: 100%;
        margin: 0;
        border: 0;
        background: transparent;
    }

    .links-page table.table tbody,
    .links-page table.table tr,
    .links-page table.table th,
    .links-page table.table td {
        display: block;
        border: 0 !important;
    }

    .links-page table.table th {
        padding: 12px 16px;
        border-bottom: 1px solid #e5edf3 !important;
        background: #eff6f8;
        color: #10243b;
        font-size: 15px;
        font-weight: 900;
        text-align: left !important;
    }

    .links-page table.table td {
        position: relative;
        min-height: 0;
        padding: 0 !important;
        background: #fff !important;
        font-size: 0;
        line-height: 0;
        text-align: left !important;
    }

    .links-page table.table td > a[target] {
        position: relative;
        display: block;
        padding: 9px 50px 9px 16px;
        border-top: 1px solid #edf2f7;
        color: #172033;
        font-size: 14px;
        font-weight: 800;
        line-height: 1.25;
        text-decoration: none;
    }

    .links-page table.table tr:nth-child(2) td > a[target] {
        border-top: 0;
    }

    .links-page table.table td > a[target]:after {
        content: "\f08e";
        position: absolute;
        right: 16px;
        color: #00836f;
        font-family: FontAwesome;
        font-weight: normal;
    }

    .links-page table.table td > a[target]:hover,
    .links-page table.table td > a[target]:focus {
        background: #f3fbfa;
        color: #006d77;
        text-decoration: none;
    }

    .links-page table.table td > small {
        position: absolute;
        top: 5px;
        right: 9px;
    }

    .links-page table.table td > small a {
        display: inline-flex;
        width: 32px;
        height: 32px;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #e0f2fe;
        color: #0369a1;
        font-size: 13px;
        line-height: 1;
        text-decoration: none;
    }

    .links-page table.table td > small .glyphicon {
        color: #0369a1 !important;
    }

    .links-page .modal-dialog,
    .modal[id^="myLinkprogram"] .modal-dialog {
        width: 560px !important;
        max-width: calc(100vw - 40px) !important;
        margin-top: 86px;
    }

    .links-page .modal-content,
    .modal[id^="myLinkprogram"] .modal-content {
        overflow: hidden;
        border: 0;
        border-radius: 8px;
        box-shadow: 0 30px 90px rgba(15, 23, 42, 0.34);
    }

    .links-page .modal-header,
    .modal[id^="myLinkprogram"] .modal-header {
        border-bottom: 0;
        background: linear-gradient(135deg, #dcfce7 0%, #e0f2fe 100%);
    }

    .links-page .modal-title,
    .modal[id^="myLinkprogram"] .modal-title {
        color: #10243b;
        font-size: 20px;
        font-weight: 900;
    }

    .links-page .modal-body,
    .modal[id^="myLinkprogram"] .modal-body {
        background: #fff;
    }

    .links-page .modal-body dl,
    .modal[id^="myLinkprogram"] .modal-body dl {
        margin-bottom: 0;
    }

    .links-page .modal-body dd,
    .modal[id^="myLinkprogram"] .modal-body dd {
        color: #10243b;
        overflow-wrap: anywhere;
    }

    .links-page .modal-footer,
    .modal[id^="myLinkprogram"] .modal-footer {
        border-top: 1px solid #e5edf3;
        background: #f8fbfd;
    }

    @media (max-width: 900px) {
        .links-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 720px) {
        .links-page {
            padding: 0 0 84px;
        }

        .links-hero,
        .links-tabs,
        .links-dynamic-card .table-responsive {
            border-right: 0;
            border-left: 0;
            border-radius: 0;
            box-shadow: none;
        }

        .links-hero {
            display: block;
            min-height: 0;
            padding: 24px 16px;
        }

        .links-hero h1 {
            font-size: 30px;
        }

        .links-hero__actions {
            margin-top: 18px;
        }

        .links-grid {
            gap: 0;
        }

        .links-section-title {
            padding: 0 16px;
        }

        .links-page .modal-dialog,
        .modal[id^="myLinkprogram"] .modal-dialog {
            width: auto !important;
            max-width: none !important;
            margin: 74px 10px 16px;
        }
    }
</style>

<main class="links-page">
    <div class="links-shell">
        <section class="links-hero">
            <div>
                <p class="links-hero__kicker"><?php echo h($kicker); ?></p>
                <h1><?php echo h($title); ?></h1>
                <p class="links-hero__copy"><?php echo h($copy); ?></p>
            </div>
            <div class="links-hero__actions">
                <a class="links-hero__button links-hero__button--primary" href="<?php echo h(Links::$page_new); ?>">
                    <i class="fa fa-plus" aria-hidden="true"></i>&nbsp; New link
                </a>
                <?php if (User::is_admin()) { ?>
                    <a class="links-hero__button" href="<?php echo h(Links::$page_manage); ?>">
                        <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Manage
                    </a>
                <?php } ?>
            </div>
        </section>

        <div class="links-messages">
            <?php echo $config['messages'] ?? ''; ?>
        </div>

        <nav class="links-tabs" aria-label="Link categories">
            <?php echo $category_html; ?>
        </nav>

        <h2 class="links-section-title"><?php echo h($config['section_title'] ?? 'Saved links'); ?></h2>
        <section class="links-grid" aria-label="Saved links">
            <?php foreach ($sections as $section) { ?>
                <div class="links-dynamic-card"><?php echo $section; ?></div>
            <?php } ?>
        </section>
    </div>
</main>
        <?php
    }
}
