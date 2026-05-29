<?php

if (!function_exists('public_links_host_label')) {
    function public_links_host_label($url)
    {
        $host = parse_url((string)$url, PHP_URL_HOST);
        return $host ? preg_replace('/^www\./', '', $host) : 'Open link';
    }
}

if (!function_exists('public_links_category_options')) {
    function public_links_category_options()
    {
        $options = '';
        $categories = LinksCategory::find_by_sql('SELECT * FROM links_category ORDER BY `rank` ASC, `category` ASC');

        foreach ($categories as $category) {
            $options .= "<option value='" . h($category->id) . "'>" . h($category->category) . "</option>";
        }

        return $options;
    }
}

if (!function_exists('public_links_static_card')) {
    function public_links_static_card($title, array $links, $tone = 'blue')
    {
        $output = "<section class='gemini-links-card gemini-links-card--" . h($tone) . "'>";
        $output .= "<div class='gemini-links-card__header'>";
        $output .= "<span class='gemini-links-card__edge' aria-hidden='true'></span>";
        $output .= "<h2>" . h($title) . "</h2>";
        $output .= "</div>";
        $output .= "<div class='gemini-links-card__body'>";

        foreach ($links as $link) {
            $href = trim((string)($link['href'] ?? ''));
            $label = trim((string)($link['label'] ?? ''));

            if ($href === '' || $label === '') {
                continue;
            }

            $output .= "<a class='gemini-links-static-link' target='_blank' rel='noopener noreferrer' href='" . h($href) . "'>";
            $output .= "<span class='gemini-links-static-link__name'>" . h($label) . "</span>";
            $output .= "<span class='gemini-links-static-link__host'>" . h(public_links_host_label($href)) . "</span>";
            $output .= "</a>";
        }

        $output .= "</div>";
        $output .= "</section>";

        return $output;
    }
}

if (!function_exists('public_links_quick_sections')) {
    function public_links_quick_sections()
    {
        return [
            [
                'title' => 'Social and Tools',
                'tone' => 'cyan',
                'links' => [
                    ['label' => 'Facebook', 'href' => 'https://www.facebook.com/'],
                    ['label' => 'LinkedIn', 'href' => 'https://www.linkedin.com/'],
                    ['label' => 'Google finance', 'href' => 'https://www.google.com/finance'],
                    ['label' => 't411', 'href' => 'https://www.t411.io/top/100/'],
                    ['label' => 'kickass', 'href' => 'http://kickass.to/'],
                    ['label' => 'bluewin', 'href' => 'http://www.bluewin.ch/fr/index.html'],
                    ['label' => 'TV air', 'href' => 'http://web.tvonline.swisscom.ch/#en/TV/Guide/Date/20121207/Browse'],
                    ['label' => 'logmein', 'href' => 'https://accounts.logme.in/login.aspx?clusterid=03&returnurl=https%3A%2F%2Fsecure.logmein.com%2Ffederated%2Floginsso.aspx&headerframe=https%3A%2F%2Fsecure.logmein.com%2Ffederated%2Fresources%2Fheaderframe.aspx&productframe=https%3A%2F%2Fsecure.logmein.com%2Fcommon%2Fpages%2Fcls%2Flogin.aspx&lang=en-US&skin=logmein&regtype=R&trackingproducttype=2'],
                    ['label' => 'Dnld UFC', 'href' => 'http://kickass.to/usearch/ufc/?field=time_add&sorder=desc'],
                    ['label' => 'Dnld French Movie', 'href' => 'http://kickass.to/usearch/category:movies%20lang_id:5/'],
                    ['label' => 'Film', 'href' => 'http://www.cpasbienstreaming.fr/2015/02/une-merveilleuse-histoire-du-temps.html'],
                ],
            ],
            [
                'title' => 'Israel',
                'tone' => 'blue',
                'links' => [
                    ['label' => 'Antisemite et terrorisme 1h00', 'href' => 'http://www.akadem.org/sommaire/themes/politique/geopolitique/guerre-et-paix/terrorisme-et-antisemitisme-la-france-sous-influence-16-03-2015-68384_193.php'],
                    ['label' => 'Dans la tete des antisemites', 'href' => 'http://www.akadem.org/sommaire/cours/l-antisemitisme-contemporain-en-france/dans-la-tete-des-antisemites-05-02-2015-67195_4566.php'],
                    ['label' => 'the believers english', 'href' => 'https://www.youtube.com/watch?v=GwBVHxjlMfU'],
                    ['label' => 'the believers french', 'href' => 'https://www.youtube.com/watch?v=i9zKhAi0CRQ'],
                    ['label' => 'La conception materialiste de la question juive', 'href' => 'https://www.marxists.org/francais/leon/CMQJ00.htm'],
                    ['label' => 'Taguieff: Les nouvelles passions antijuives', 'href' => 'http://www.lejdd.fr/Societe/Pierre-Andre-Taguieff-du-CNRS-Les-nouvelles-passions-antijuives-677752'],
                    ['label' => 'La deraison antisemite et son langage', 'href' => 'http://www.franceculture.fr/oeuvre-la-deraison-antisemite-et-son-langage-dialogue-sur-l-histoire-et-l-identite-juive-alerte-de-j'],
                    ['label' => 'Delphine Horvilleur', 'href' => 'http://www.lemondedesreligions.fr/entretiens/videos/au-dela-de-la-violence-dialogue-entre-delphine-horvilleur-et-abdennour-bidar-02-04-2015-4617_207.php'],
                    ['label' => 'yeshayahou-leibowitz', 'href' => 'http://lemondejuif.blogspot.fr/2013/03/parcours-de-lecture-yeshayahou-leibowitz.html'],
                    ['label' => 'Iran executed my grandfather', 'href' => 'http://www.washingtonpost.com/posteverything/wp/2015/04/22/iran-executed-my-grandfather-now-the-regime-is-trying-to-hide-the-way-it-has-treated-other-jews/?postshare=591430489911647'],
                    ['label' => 'Dieudonne', 'href' => 'http://www.memorial98.org/2015/05/dieudonne-le-fond-dutroux.html'],
                ],
            ],
            [
                'title' => 'Antisemitism',
                'tone' => 'indigo',
                'links' => [
                    ['label' => "Shlomo Sand's sickening Guardian article", 'href' => 'http://ukmediawatch.org/2014/10/14/Shlomo-sands-sickening-guardian-article-slams-both-israel-and-judaism/'],
                    ['label' => 'Comment le peuple juif fut invente', 'href' => 'http://www.massorti.com/Comment-le-peuple-juif-fut-invente'],
                    ['label' => "Comment la terre d'Israel fut inventee", 'href' => 'http://www.massorti.com/Comment-la-terre-d-Israel-fut'],
                ],
            ],
        ];
    }
}

if (!function_exists('public_links_render_page')) {
    function public_links_render_page(array $config)
    {
        $kicker = $config['kicker'] ?? 'Blue Remini links';
        $title = $config['title'] ?? 'A sharper link library.';
        $copy = $config['copy'] ?? 'A compact public board for saved references, tools, and study material.';
        $category_html = $config['category_html'] ?? '';
        $sections = $config['sections'] ?? [];
        $static_sections = $config['static_sections'] ?? [];
        $columns = (int)($config['columns'] ?? 3);
        $columns = max(1, min(4, $columns));
        ?>

<style>
    body {
        background: #edf5ff;
    }

    .gemini-links-page {
        min-height: calc(100vh - 70px);
        padding: 24px 14px 92px;
        color: #081d3f;
        background:
            radial-gradient(circle at top left, rgba(58, 166, 255, 0.20), transparent 34%),
            linear-gradient(135deg, #f7fbff 0%, #edf6ff 44%, #e8f2ff 100%);
    }

    .gemini-links-shell {
        width: min(1380px, 100%);
        margin: 0 auto;
    }

    .gemini-links-hero {
        position: relative;
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 28px;
        align-items: center;
        overflow: hidden;
        min-height: 178px;
        padding: 26px 30px;
        border: 1px solid rgba(33, 105, 211, 0.22);
        border-radius: 8px;
        background:
            linear-gradient(135deg, rgba(0, 68, 173, 0.98), rgba(4, 20, 62, 0.98)),
            url("/public/css/patterns/triangular.png");
        box-shadow: 0 22px 52px rgba(16, 55, 116, 0.18);
        color: #fff;
    }

    .gemini-links-hero:before {
        content: "";
        position: absolute;
        top: -60px;
        right: 155px;
        width: 72px;
        height: 320px;
        transform: rotate(38deg);
        background: linear-gradient(180deg, transparent, rgba(126, 214, 255, 0.56), transparent);
        opacity: 0.75;
    }

    .gemini-links-hero__content {
        position: relative;
        z-index: 1;
    }

    .gemini-links-hero__kicker {
        margin: 0 0 8px;
        color: #8ee7ff;
        font-size: 12px;
        font-weight: 900;
        text-transform: uppercase;
    }

    .gemini-links-hero h1 {
        margin: 0;
        color: #fff;
        font-size: 34px;
        line-height: 1.08;
        font-weight: 900;
    }

    .gemini-links-hero__copy {
        max-width: 700px;
        margin: 10px 0 0;
        color: rgba(236, 246, 255, 0.86);
        font-size: 15px;
        line-height: 1.5;
    }

    .gemini-links-hero__logo {
        position: relative;
        z-index: 1;
        width: 116px;
        height: 116px;
        object-fit: contain;
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.08);
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.16);
    }

    .gemini-links-actions {
        position: relative;
        z-index: 1;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 18px;
    }

    .gemini-links-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 40px;
        padding: 9px 14px;
        border: 1px solid rgba(183, 226, 255, 0.36);
        border-radius: 6px;
        background: rgba(255, 255, 255, 0.12);
        color: #fff;
        font-weight: 800;
        text-decoration: none;
    }

    .gemini-links-action:hover,
    .gemini-links-action:focus {
        background: rgba(255, 255, 255, 0.22);
        color: #fff;
        text-decoration: none;
    }

    .gemini-links-action--primary {
        border-color: #8ee7ff;
        background: #dff6ff;
        color: #05346b;
    }

    .gemini-links-action--primary:hover,
    .gemini-links-action--primary:focus {
        background: #b9edff;
        color: #05346b;
    }

    .gemini-links-messages {
        margin-top: 12px;
    }

    .gemini-links-tabs {
        margin-top: 14px;
        padding: 11px;
        border: 1px solid rgba(33, 105, 211, 0.16);
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.92);
        box-shadow: 0 16px 40px rgba(16, 55, 116, 0.10);
    }

    .gemini-links-tabs .nav-tabs {
        margin-bottom: 8px;
        border-bottom: 1px solid #dbeafe;
    }

    .gemini-links-tabs .nav-tabs > li > a,
    .gemini-links-tabs .nav-pills > li > a {
        padding: 8px 11px;
        border-radius: 6px;
        color: #234a76;
        font-size: 13px;
        font-weight: 800;
        line-height: 1.2;
    }

    .gemini-links-tabs .nav-tabs > li.active > a,
    .gemini-links-tabs .nav-pills > li.active > a {
        border-color: #006edb;
        background: #006edb;
        color: #fff;
    }

    .gemini-links-tabs .nav-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 5px 7px;
    }

    .gemini-links-tabs .nav-pills > li {
        float: none;
    }

    .gemini-links-section-title {
        margin: 18px 0 10px;
        color: #082b61;
        font-size: 13px;
        font-weight: 900;
        text-transform: uppercase;
    }

    .gemini-links-grid,
    .gemini-links-static-grid {
        display: grid;
        grid-template-columns: repeat(var(--gemini-links-columns), minmax(0, 1fr));
        gap: 12px;
    }

    .gemini-links-dynamic-card,
    .gemini-links-card {
        min-width: 0;
    }

    .gemini-links-static-grid {
        --gemini-links-columns: 3;
    }

    .gemini-links-dynamic-card .table-responsive,
    .gemini-links-card {
        min-width: 0;
        max-width: 100%;
        overflow: hidden;
        border: 1px solid rgba(33, 105, 211, 0.14);
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.96);
        box-shadow: 0 18px 42px rgba(16, 55, 116, 0.10);
    }

    .gemini-links-page table.table {
        width: 100%;
        max-width: 100%;
        margin: 0;
        border: 0;
        background: transparent;
        table-layout: fixed;
    }

    .gemini-links-page table.table tbody,
    .gemini-links-page table.table tr,
    .gemini-links-page table.table th,
    .gemini-links-page table.table td {
        display: block;
        border: 0 !important;
    }

    .gemini-links-page table.table th,
    .gemini-links-card__header {
        padding: 12px 16px;
        border-bottom: 1px solid #dbeafe !important;
        background: linear-gradient(90deg, #eff7ff, #ffffff);
        color: #082b61;
        text-align: left !important;
    }

    .gemini-links-page table.table th,
    .gemini-links-card__header h2 {
        margin: 0;
        font-size: 15px;
        font-weight: 900;
    }

    .gemini-links-page table.table td {
        position: relative;
        min-height: 0;
        padding: 0 !important;
        background: #fff !important;
        font-size: 0;
        line-height: 0;
        text-align: left !important;
    }

    .gemini-links-page table.table td > a[target],
    .gemini-links-static-link {
        position: relative;
        display: block;
        padding: 9px 50px 9px 16px;
        border-top: 1px solid #eaf3ff;
        color: #071a35;
        font-size: 14px;
        font-weight: 800;
        line-height: 1.25;
        text-decoration: none;
    }

    .gemini-links-page table.table tr:nth-child(2) td > a[target],
    .gemini-links-card__body .gemini-links-static-link:first-child {
        border-top: 0;
    }

    .gemini-links-page table.table td > a[target]:after,
    .gemini-links-static-link:after {
        content: "\f08e";
        position: absolute;
        right: 16px;
        color: #0077e6;
        font-family: FontAwesome;
        font-weight: normal;
    }

    .gemini-links-page table.table td > a[target]:hover,
    .gemini-links-page table.table td > a[target]:focus,
    .gemini-links-static-link:hover,
    .gemini-links-static-link:focus {
        background: #f0f8ff;
        color: #0057b8;
        text-decoration: none;
    }

    .gemini-links-page table.table td > small {
        position: absolute;
        top: 5px;
        right: 9px;
    }

    .gemini-links-page table.table td > small a {
        display: inline-flex;
        width: 32px;
        height: 32px;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #dff2ff;
        color: #0369c6;
        font-size: 13px;
        line-height: 1;
        text-decoration: none;
    }

    .gemini-links-page table.table td > small .glyphicon {
        color: #0369c6 !important;
    }

    .gemini-links-card__header {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .gemini-links-card__edge {
        width: 9px;
        height: 28px;
        transform: skew(-18deg);
        border-radius: 3px;
        background: #008cff;
    }

    .gemini-links-card--cyan .gemini-links-card__edge {
        background: #06b6d4;
    }

    .gemini-links-card--indigo .gemini-links-card__edge {
        background: #4338ca;
    }

    .gemini-links-static-link__name,
    .gemini-links-static-link__host {
        display: block;
    }

    .gemini-links-static-link__host {
        margin-top: 3px;
        color: #64748b;
        font-size: 11px;
        font-weight: 700;
    }

    .gemini-links-page .modal-dialog,
    .modal[id^="myLinkprogram"] .modal-dialog {
        width: 560px !important;
        max-width: calc(100vw - 40px) !important;
        margin-top: 86px;
    }

    .gemini-links-page .modal-content,
    .modal[id^="myLinkprogram"] .modal-content {
        overflow: hidden;
        border: 0;
        border-radius: 8px;
        box-shadow: 0 30px 90px rgba(8, 29, 63, 0.34);
    }

    .gemini-links-page .modal-header,
    .modal[id^="myLinkprogram"] .modal-header {
        border-bottom: 0;
        background: linear-gradient(135deg, #dff6ff 0%, #e8f1ff 100%);
    }

    .gemini-links-page .modal-title,
    .modal[id^="myLinkprogram"] .modal-title {
        color: #082b61;
        font-size: 20px;
        font-weight: 900;
    }

    .gemini-links-page .modal-title span,
    .modal[id^="myLinkprogram"] .modal-title span {
        display: inline-block;
        margin-left: 8px;
        color: #006edb;
        font-size: 13px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .gemini-links-page .modal-body,
    .modal[id^="myLinkprogram"] .modal-body {
        height: auto !important;
        min-height: 0 !important;
        max-height: 58vh;
        padding: 18px 20px;
        overflow: auto;
        background: #f8fbff;
        color: #081d3f;
        font-size: 14px;
        line-height: 1.45;
    }

    .gemini-links-page .modal-body .container-fluid,
    .modal[id^="myLinkprogram"] .modal-body .container-fluid {
        padding: 0;
    }

    .gemini-links-page .modal-body dl,
    .modal[id^="myLinkprogram"] .modal-body dl {
        display: grid;
        grid-template-columns: 145px minmax(0, 1fr);
        gap: 8px 12px;
        margin: 0;
    }

    .gemini-links-page .modal-body dt,
    .gemini-links-page .modal-body dd,
    .modal[id^="myLinkprogram"] .modal-body dt,
    .modal[id^="myLinkprogram"] .modal-body dd {
        float: none;
        width: auto;
        margin: 0 !important;
        padding: 9px 10px;
        min-height: 36px;
        border-radius: 6px;
        text-align: left;
    }

    .gemini-links-page .modal-body dt,
    .modal[id^="myLinkprogram"] .modal-body dt {
        background: #e8f3ff;
        color: #21476f;
        font-size: 12px;
        font-weight: 900;
        text-transform: uppercase;
    }

    .gemini-links-page .modal-body dd,
    .modal[id^="myLinkprogram"] .modal-body dd {
        background: #ffffff;
        color: #081d3f;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .gemini-links-page .modal-footer,
    .modal[id^="myLinkprogram"] .modal-footer {
        border-top: 1px solid #dbeafe;
        background: #f8fbff;
    }

    .gemini-links-page .links-modal-actions,
    .modal[id^="myLinkprogram"] .links-modal-actions {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 10px;
    }

    .gemini-links-page .links-modal-btn,
    .modal[id^="myLinkprogram"] .links-modal-btn {
        display: inline-flex;
        width: 100%;
        min-height: 40px;
        box-sizing: border-box;
        align-items: center;
        justify-content: center;
        gap: 7px;
        border: 0;
        border-radius: 999px;
        color: #fff;
        font-weight: 900;
        text-decoration: none;
        cursor: pointer;
    }

    .gemini-links-page .links-modal-btn:hover,
    .gemini-links-page .links-modal-btn:focus,
    .modal[id^="myLinkprogram"] .links-modal-btn:hover,
    .modal[id^="myLinkprogram"] .links-modal-btn:focus {
        color: #fff;
        filter: brightness(0.96);
        text-decoration: none;
    }

    .gemini-links-page .links-modal-btn--edit,
    .modal[id^="myLinkprogram"] .links-modal-btn--edit {
        background: #0077e6;
    }

    .gemini-links-page .links-modal-btn--copy,
    .modal[id^="myLinkprogram"] .links-modal-btn--copy,
    .gemini-links-page .links-modal-btn--add,
    .modal[id^="myLinkprogram"] .links-modal-btn--add {
        background: #059669;
    }

    .gemini-links-page .links-modal-btn--add,
    .modal[id^="myLinkprogram"] .links-modal-btn--add {
        background: #0ea5e9;
    }

    .gemini-links-page .links-modal-btn--delete,
    .modal[id^="myLinkprogram"] .links-modal-btn--delete {
        background: #dc2626;
    }

    .gemini-links-page .links-modal-btn--close,
    .modal[id^="myLinkprogram"] .links-modal-btn--close {
        background: #475569;
    }

    .links-action-modal .modal-dialog {
        width: min(760px, calc(100vw - 40px)) !important;
        margin-top: 58px;
    }

    .links-action-modal .modal-content {
        overflow: hidden;
        border: 0;
        border-radius: 8px;
        box-shadow: 0 34px 96px rgba(8, 29, 63, 0.38);
    }

    .links-action-modal .modal-header {
        border-bottom: 0;
        background: linear-gradient(135deg, #dff6ff 0%, #e8f1ff 100%);
    }

    .links-action-modal .modal-title {
        color: #082b61;
        font-size: 20px;
        font-weight: 900;
    }

    .links-action-modal .modal-body {
        height: auto !important;
        min-height: 0 !important;
        max-height: calc(100vh - 210px);
        overflow: auto;
        padding: 22px;
        background: #f8fbff;
    }

    .links-action-form {
        display: grid;
        gap: 18px;
    }

    .links-action-form__intro {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 14px 16px;
        border: 1px solid #dbeafe;
        border-radius: 8px;
        background: #ffffff;
    }

    .links-action-form__eyebrow {
        margin: 0 0 3px;
        color: #0077b6;
        font-size: 11px;
        font-weight: 900;
        letter-spacing: 0;
        text-transform: uppercase;
    }

    .links-action-form__name {
        margin: 0;
        color: #081d3f;
        font-size: 18px;
        font-weight: 900;
        overflow-wrap: anywhere;
    }

    .links-action-form__id {
        flex: 0 0 auto;
        padding: 6px 10px;
        border-radius: 999px;
        background: #e8f3ff;
        color: #21476f;
        font-size: 12px;
        font-weight: 900;
    }

    .links-action-form__grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }

    .links-action-field {
        display: grid;
        gap: 7px;
    }

    .links-action-field--wide {
        grid-column: 1 / -1;
    }

    .links-action-field label {
        margin: 0;
        color: #21476f;
        font-size: 12px;
        font-weight: 900;
        text-transform: uppercase;
    }

    .links-action-field input,
    .links-action-field select,
    .links-action-field textarea {
        width: 100%;
        min-height: 44px;
        box-sizing: border-box;
        border: 1px solid #b9d6f2;
        border-radius: 7px;
        background: #ffffff;
        color: #081d3f;
        font-size: 15px;
        font-weight: 700;
        box-shadow: none;
    }

    .links-action-field textarea {
        min-height: 112px;
        resize: vertical;
    }

    .links-action-field--privacy > label {
        color: #46698d;
        font-size: 11px;
        letter-spacing: 0;
    }

    .links-action-choice {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 8px;
        padding: 6px;
        border: 1px solid #cfe4f8;
        border-radius: 9px;
        background: #eef7ff;
    }

    .links-action-choice label {
        display: flex;
        min-height: 38px;
        align-items: center;
        justify-content: center;
        gap: 7px;
        border: 1px solid transparent;
        border-radius: 7px;
        background: transparent;
        color: #46698d;
        font-size: 13px;
        font-weight: 900;
        cursor: pointer;
        transition: background 160ms ease, border-color 160ms ease, color 160ms ease, box-shadow 160ms ease;
    }

    .links-action-choice label:hover {
        background: rgba(255, 255, 255, 0.72);
    }

    .links-action-choice label:has(input:checked) {
        border-color: #54b9ee;
        background: #ffffff;
        color: #082b61;
        box-shadow: 0 8px 20px rgba(15, 94, 163, 0.12);
    }

    .links-action-choice input {
        width: 14px !important;
        min-height: 14px !important;
        height: 14px;
        margin: 0;
        accent-color: #008bd2;
    }

    .links-action-form__footer {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        padding-top: 4px;
    }

    .links-action-form__footer .links-modal-btn {
        min-height: 46px;
        border-radius: 8px;
        font-size: 15px;
        box-shadow: 0 10px 24px rgba(8, 29, 63, 0.13);
    }

    .links-action-modal .links-modal-btn {
        display: inline-flex;
        width: 100%;
        align-items: center;
        justify-content: center;
        gap: 7px;
        border: 0;
        color: #fff;
        font-weight: 900;
        text-decoration: none;
        cursor: pointer;
    }

    .links-action-modal .links-modal-btn--edit {
        background: linear-gradient(135deg, #0077e6 0%, #00a6d6 100%);
    }

    .links-action-modal .links-modal-btn--close {
        background: #e8eef5;
        color: #2f4358;
        border: 1px solid #c8d6e6;
        box-shadow: none;
    }

    .links-action-modal .links-modal-btn:hover,
    .links-action-modal .links-modal-btn:focus {
        filter: brightness(0.97);
        text-decoration: none;
    }

    .links-delete-modal__body {
        padding: 22px;
        color: #081d3f;
        font-size: 15px;
        line-height: 1.5;
    }

    .links-delete-modal__name {
        display: block;
        margin-top: 10px;
        padding: 12px 14px;
        border-radius: 6px;
        background: #fff5f5;
        color: #991b1b;
        font-weight: 900;
        overflow-wrap: anywhere;
    }

    .links-delete-modal .modal-footer {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        border-top: 1px solid #fee2e2;
        background: #fffafa;
    }

    .links-delete-modal .links-modal-btn--delete,
    .links-delete-modal .links-modal-btn--close {
        display: inline-flex;
        width: 100%;
        min-height: 42px;
        align-items: center;
        justify-content: center;
        gap: 7px;
        border: 0;
        border-radius: 999px;
        color: #fff;
        font-weight: 900;
        text-decoration: none;
    }

    @media (max-width: 1180px) {
        .gemini-links-grid,
        .gemini-links-static-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 720px) {
        .gemini-links-page {
            padding: 0 0 84px;
        }

        .gemini-links-hero,
        .gemini-links-tabs,
        .gemini-links-dynamic-card .table-responsive,
        .gemini-links-card {
            border-right: 0;
            border-left: 0;
            border-radius: 0;
            box-shadow: none;
        }

        .gemini-links-hero {
            display: block;
            min-height: 0;
            padding: 24px 16px;
        }

        .gemini-links-hero:before {
            right: 40px;
        }

        .gemini-links-hero h1 {
            font-size: 30px;
        }

        .gemini-links-hero__logo {
            display: none;
        }

        .gemini-links-grid,
        .gemini-links-static-grid {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .gemini-links-section-title {
            padding: 0 16px;
        }

        .gemini-links-page .modal-dialog,
        .modal[id^="myLinkprogram"] .modal-dialog {
            width: auto !important;
            max-width: none !important;
            margin: 74px 10px 16px;
        }

        .gemini-links-page .modal-body dl,
        .modal[id^="myLinkprogram"] .modal-body dl,
        .gemini-links-page .links-modal-actions,
        .modal[id^="myLinkprogram"] .links-modal-actions,
        .links-delete-modal .modal-footer {
            grid-template-columns: 1fr;
        }

        .links-action-modal .modal-dialog {
            width: auto !important;
            margin: 58px 10px 16px;
        }

        .links-action-modal .modal-body {
            max-height: calc(100vh - 170px);
            padding: 16px;
        }

        .links-action-form__intro,
        .links-action-form__grid,
        .links-action-form__footer {
            grid-template-columns: 1fr;
        }

        .links-action-form__intro {
            display: grid;
        }
    }
</style>

<main class="gemini-links-page">
    <div class="gemini-links-shell">
        <section class="gemini-links-hero">
            <div class="gemini-links-hero__content">
                <p class="gemini-links-hero__kicker"><?php echo h($kicker); ?></p>
                <h1><?php echo h($title); ?></h1>
                <p class="gemini-links-hero__copy"><?php echo h($copy); ?></p>
                <div class="gemini-links-actions">
                    <a class="gemini-links-action gemini-links-action--primary" href="<?php echo h(Links::$page_new); ?>" data-link-action="new" data-link-action-title="New link" data-link-submit-url="<?php echo h(Links::$page_new); ?>">
                        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp; New link
                    </a>
                    <?php if (User::is_admin()) { ?>
                        <a class="gemini-links-action" href="<?php echo h(Links::$page_manage); ?>">
                            <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Manage
                        </a>
                    <?php } ?>
                </div>
            </div>
            <img class="gemini-links-hero__logo" src="/public/img/kamy_jet_geneva.png" alt="Kamy Blue Remini">
        </section>

        <div class="gemini-links-messages">
            <?php echo $config['messages'] ?? ''; ?>
        </div>

        <nav class="gemini-links-tabs" aria-label="Link categories">
            <?php echo $category_html; ?>
        </nav>

        <h2 class="gemini-links-section-title"><?php echo h($config['section_title'] ?? 'Saved links'); ?></h2>
        <section class="gemini-links-grid" style="--gemini-links-columns: <?php echo h((string)$columns); ?>;" aria-label="Saved links">
            <?php foreach ($sections as $section) { ?>
                <div class="gemini-links-dynamic-card"><?php echo $section; ?></div>
            <?php } ?>
        </section>

        <?php if (!empty($static_sections)) { ?>
            <h2 class="gemini-links-section-title"><?php echo h($config['static_title'] ?? 'Pinned links'); ?></h2>
            <section class="gemini-links-static-grid" aria-label="Pinned links">
                <?php foreach ($static_sections as $section) {
                    echo public_links_static_card($section['title'], $section['links'], $section['tone'] ?? 'blue');
                } ?>
            </section>
        <?php } ?>
    </div>
</main>

<div class="modal fade links-action-modal" id="links-action-modal" tabindex="-1" role="dialog" aria-labelledby="links-action-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="links-action-modal-title">Link action</h5>
            </div>
            <div class="modal-body">
                <form class="links-action-form" id="links-action-form" method="post" action="<?php echo h(Links::$page_new); ?>">
                    <input type="hidden" name="class_name" value="Links">
                    <input type="hidden" name="ikamy_modal" value="links">
                    <input type="hidden" name="return_to" value="">
                    <input type="hidden" name="id" value="">
                    <?php echo csrf_token_tag(); ?>

                    <div class="links-action-form__intro">
                        <div>
                            <p class="links-action-form__eyebrow">Blue Remini link</p>
                            <p class="links-action-form__name">New link</p>
                        </div>
                        <span class="links-action-form__id">New</span>
                    </div>

                    <div class="links-action-form__grid">
                        <div class="links-action-field links-action-field--wide links-action-field--privacy">
                            <label for="links-action-name">Name</label>
                            <input id="links-action-name" name="name" type="text" required>
                        </div>

                        <div class="links-action-field links-action-field--wide">
                            <label for="links-action-web-address">Website</label>
                            <input id="links-action-web-address" name="web_address" type="url" required>
                        </div>

                        <div class="links-action-field links-action-field--wide">
                            <label for="links-action-description">Description</label>
                            <textarea id="links-action-description" name="description"></textarea>
                        </div>

                        <div class="links-action-field">
                            <label for="links-action-category-id">Category</label>
                            <select id="links-action-category-id" name="category_id" required>
                                <?php echo public_links_category_options(); ?>
                            </select>
                        </div>

                        <div class="links-action-field">
                            <label for="links-action-rank">Rank</label>
                            <input id="links-action-rank" name="rank" type="number" min="0" required>
                        </div>

                        <div class="links-action-field">
                            <label for="links-action-sub-category-1">Category 1</label>
                            <input id="links-action-sub-category-1" name="sub_category_1" type="text">
                        </div>

                        <div class="links-action-field">
                            <label for="links-action-sub-category-2">Category 2</label>
                            <input id="links-action-sub-category-2" name="sub_category_2" type="text">
                        </div>

                        <div class="links-action-field links-action-field--wide">
                            <label>Privacy</label>
                            <div class="links-action-choice">
                                <label for="links-action-privacy-no">
                                    <input id="links-action-privacy-no" name="privacy" type="radio" value="0" checked>
                                    No
                                </label>
                                <label for="links-action-privacy-yes">
                                    <input id="links-action-privacy-yes" name="privacy" type="radio" value="1">
                                    Yes
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="links-action-form__footer">
                        <button type="button" class="links-modal-btn links-modal-btn--close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>
                        <button type="submit" class="links-modal-btn links-modal-btn--edit"><i class="fa fa-save" aria-hidden="true"></i> Save link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade links-delete-modal" id="links-delete-modal" tabindex="-1" role="dialog" aria-labelledby="links-delete-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="links-delete-modal-title">Delete link</h5>
            </div>
            <div class="links-delete-modal__body">
                This will permanently delete this saved link.
                <span class="links-delete-modal__name"></span>
            </div>
            <div class="modal-footer">
                <a class="links-modal-btn links-modal-btn--delete" href="#"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                <button type="button" class="links-modal-btn links-modal-btn--close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        function initLinksModalController() {
            if (window.linksModalControllerReady) {
                return;
            }

            window.linksModalControllerReady = true;

        function hasClass(element, className) {
            return (' ' + (element.className || '') + ' ').indexOf(' ' + className + ' ') !== -1;
        }

        function addClass(element, className) {
            if (!hasClass(element, className)) {
                element.className = (element.className ? element.className + ' ' : '') + className;
            }
        }

        function removeClass(element, className) {
            element.className = (' ' + (element.className || '') + ' ').replace(' ' + className + ' ', ' ').replace(/^\s+|\s+$/g, '');
        }

        function closest(element, selector) {
            while (element && element.nodeType === 1) {
                if (element.matches && element.matches(selector)) {
                    return element;
                }

                element = element.parentNode;
            }

            return null;
        }

        function removeLinksBackdrops() {
            var backdrops = document.querySelectorAll('.modal-backdrop');
            var i;

            for (i = 0; i < backdrops.length; i += 1) {
                if (backdrops[i].parentNode) {
                    backdrops[i].parentNode.removeChild(backdrops[i]);
                }
            }
        }

        function ensureBackdrop() {
            if (document.querySelector('.modal-backdrop')) {
                return;
            }

            var backdrop = document.createElement('div');
            backdrop.className = 'modal-backdrop fade in';
            backdrop.setAttribute('data-links-fallback', '1');
            document.body.appendChild(backdrop);
        }

        function showModal(modal) {
            modal.style.display = 'block';
            modal.removeAttribute('aria-hidden');
            addClass(modal, 'in');
            addClass(document.body, 'modal-open');
            ensureBackdrop();
        }

        function hideModal(modal) {
            removeClass(modal, 'in');
            modal.setAttribute('aria-hidden', 'true');
            modal.style.display = 'none';
        }

        function closeVisibleLinksModals() {
            var modals = document.querySelectorAll('.modal[id^="myLinkprogram"], #links-action-modal, #links-delete-modal');
            var i;

            for (i = 0; i < modals.length; i += 1) {
                hideModal(modals[i]);
            }

            removeClass(document.body, 'modal-open');
            removeLinksBackdrops();
        }

        function addReturnUrl(url) {
            var glue = url.indexOf('?') === -1 ? '?' : '&';
            return url + glue + 'return_to=' + encodeURIComponent(window.location.pathname + window.location.search);
        }

        function setField(form, name, value) {
            var field = form.elements[name];

            if (field) {
                field.value = value || '';
            }
        }

        function setPrivacy(form, value) {
            var choice = String(value || '0') === '1' ? '1' : '0';
            var radio = form.querySelector('input[name="privacy"][value="' + choice + '"]');

            if (radio) {
                radio.checked = true;
            }
        }

        function setCategory(form, value) {
            var select = form.elements.category_id;

            if (!select) {
                return;
            }

            select.value = value || '1';

            if (select.value === '' && select.options.length > 0) {
                select.selectedIndex = 0;
            }
        }

        function fillActionForm(trigger) {
            var action = trigger.getAttribute('data-link-action') || 'new';
            var form = document.getElementById('links-action-form');
            var modal = document.getElementById('links-action-modal');
            var title = modal.querySelector('.modal-title');
            var introName = modal.querySelector('.links-action-form__name');
            var introId = modal.querySelector('.links-action-form__id');
            var submitButton = modal.querySelector('button[type="submit"]');
            var submitUrl = trigger.getAttribute('data-link-submit-url') || trigger.href;
            var recordName = trigger.getAttribute('data-link-name') || '';
            var recordId = trigger.getAttribute('data-link-id') || '';
            var isEdit = action === 'edit';
            var isCopy = action === 'copy';

            form.action = submitUrl;
            setField(form, 'return_to', window.location.pathname + window.location.search);
            setField(form, 'id', isEdit ? recordId : '');
            setField(form, 'name', (isEdit || isCopy) ? recordName : '');
            setField(form, 'web_address', (isEdit || isCopy) ? trigger.getAttribute('data-link-web-address') : '');
            setField(form, 'description', (isEdit || isCopy) ? trigger.getAttribute('data-link-description') : '');
            setField(form, 'sub_category_1', (isEdit || isCopy) ? trigger.getAttribute('data-link-sub-category-1') : '');
            setField(form, 'sub_category_2', (isEdit || isCopy) ? trigger.getAttribute('data-link-sub-category-2') : '');
            setField(form, 'rank', (isEdit || isCopy) ? trigger.getAttribute('data-link-rank') : '1');
            setCategory(form, (isEdit || isCopy) ? trigger.getAttribute('data-link-category-id') : '1');
            setPrivacy(form, (isEdit || isCopy) ? trigger.getAttribute('data-link-privacy') : '0');

            title.textContent = trigger.getAttribute('data-link-action-title') || 'Link action';
            introName.textContent = recordName || 'New link';
            introId.textContent = isEdit ? ('ID ' + recordId) : (isCopy ? 'Copy' : 'New');
            submitButton.innerHTML = isEdit
                ? '<i class="fa fa-save" aria-hidden="true"></i> Save changes'
                : '<i class="fa fa-plus" aria-hidden="true"></i> Create link';
        }

        function openActionFromTrigger(trigger) {
            var sourceModal = closest(trigger, '.modal');
            var action = trigger.getAttribute('data-link-action');

            if (sourceModal) {
                hideModal(sourceModal);
            }

            removeLinksBackdrops();

            window.setTimeout(function() {
                if (action === 'delete') {
                    var deleteModal = document.getElementById('links-delete-modal');
                    var deleteLink = deleteModal.querySelector('.links-modal-btn--delete');
                    var nameTarget = deleteModal.querySelector('.links-delete-modal__name');

                    deleteLink.href = addReturnUrl(trigger.href);
                    nameTarget.textContent = trigger.getAttribute('data-link-name') || 'Selected link';
                    showModal(deleteModal);
                    return;
                }

                var actionModal = document.getElementById('links-action-modal');
                fillActionForm(trigger);
                showModal(actionModal);
            }, 80);
        }

        window.linksOpenDetailModal = function(id) {
            var target = document.getElementById(id);

            if (target) {
                closeVisibleLinksModals();
                showModal(target);
            }

            return false;
        };

        window.linksOpenActionModal = function(trigger) {
            openActionFromTrigger(trigger);
            return false;
        };

        window.linksCloseModalButton = function(trigger) {
            var modal = closest(trigger, '.modal');

            if (modal) {
                hideModal(modal);
            }

            removeClass(document.body, 'modal-open');
            removeLinksBackdrops();
            return false;
        };

        document.addEventListener('click', function(event) {
            var detailTrigger = closest(event.target, '.gemini-links-page .links-info-trigger[data-target]');

            if (detailTrigger) {
                event.preventDefault();
                event.stopImmediatePropagation();
                window.linksOpenDetailModal(detailTrigger.getAttribute('data-target').replace('#', ''));
                return;
            }

            var dismissTrigger = closest(event.target, '[data-dismiss="modal"]');

            if (dismissTrigger) {
                var dismissModal = closest(dismissTrigger, '.modal');

                if (dismissModal && (hasClass(dismissModal, 'links-action-modal') || hasClass(dismissModal, 'links-delete-modal') || /^myLinkprogram/.test(dismissModal.id))) {
                    event.preventDefault();
                    event.stopImmediatePropagation();
                    window.linksCloseModalButton(dismissTrigger);
                    return;
                }
            }

            var trigger = closest(event.target, '.modal[id^="myLinkprogram"] .links-modal-btn[data-link-action], .gemini-links-action[data-link-action]');

            if (!trigger) {
                return;
            }

            event.preventDefault();
            event.stopImmediatePropagation();
            openActionFromTrigger(trigger);
        }, true);
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initLinksModalController);
        } else {
            initLinksModalController();
        }
    })();
</script>
        <?php
    }
}
