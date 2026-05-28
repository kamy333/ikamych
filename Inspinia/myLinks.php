<?php require_once('../includes/initialize.php'); ?>

<?php
$class_name = "Links";
$stylesheets = "";
$fluid_view = true;
$javascript = "";
$incl_message_error = true;

function mylinks_host_label($url)
{
    $host = parse_url((string)$url, PHP_URL_HOST);
    return $host ? preg_replace('/^www\./', '', $host) : 'Open link';
}

function mylinks_static_section($title, array $links, $tone = '')
{
    $output = "<section class='links-card links-card--" . h($tone) . "'>";
    $output .= "<div class='links-card__header'>";
    $output .= "<span class='links-card__mark' aria-hidden='true'></span>";
    $output .= "<h2>" . h($title) . "</h2>";
    $output .= "</div>";
    $output .= "<div class='links-card__body'>";

    foreach ($links as $link) {
        $href = trim((string)($link['href'] ?? ''));
        $label = trim((string)($link['label'] ?? ''));

        if ($href === '' || $label === '') {
            continue;
        }

        $output .= "<a class='links-card__link' target='_blank' rel='noopener noreferrer' href='" . h($href) . "'>";
        $output .= "<span class='links-card__name'>" . h($label) . "</span>";
        $output .= "<span class='links-card__host'>" . h(mylinks_host_label($href)) . "</span>";
        $output .= "</a>";
    }

    $output .= "</div>";
    $output .= "</section>";

    return $output;
}

$quick_sections = [
    [
        'title' => 'Social and Tools',
        'tone' => 'teal',
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
        'tone' => 'rose',
        'links' => [
            ['label' => "Shlomo Sand's sickening Guardian article", 'href' => 'http://ukmediawatch.org/2014/10/14/Shlomo-sands-sickening-guardian-article-slams-both-israel-and-judaism/'],
            ['label' => 'Comment le peuple juif fut invente', 'href' => 'http://www.massorti.com/Comment-le-peuple-juif-fut-invente'],
            ['label' => "Comment la terre d'Israel fut inventee", 'href' => 'http://www.massorti.com/Comment-la-terre-d-Israel-fut'],
        ],
    ],
];
?>

<?php include(HEADER_PUBLIC); ?>
<?php include_once(NAV_PUBLIC); ?>

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
        min-height: 188px;
        padding: 30px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 8px;
        background:
            linear-gradient(135deg, rgba(13, 116, 137, 0.95) 0%, rgba(15, 23, 42, 0.97) 100%),
            url("/public/css/patterns/triangular.png");
        box-shadow: 0 20px 48px rgba(31, 48, 63, 0.14);
        color: #fff;
    }

    .links-hero__kicker {
        margin: 0 0 10px;
        color: #99f6e4;
        font-size: 12px;
        font-weight: 900;
        text-transform: uppercase;
    }

    .links-hero h1 {
        margin: 0;
        color: #fff;
        font-size: 38px;
        line-height: 1.08;
        font-weight: 900;
    }

    .links-hero__copy {
        max-width: 660px;
        margin: 12px 0 0;
        color: rgba(255, 255, 255, 0.82);
        font-size: 16px;
        line-height: 1.6;
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
        min-height: 42px;
        padding: 10px 15px;
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

    .links-grid,
    .links-static-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 14px;
    }

    .links-static-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .links-dynamic-card .table-responsive,
    .links-card {
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

    .links-page table.table th,
    .links-card__header {
        padding: 12px 16px;
        border-bottom: 1px solid #e5edf3 !important;
        background: #eff6f8;
        color: #10243b;
        text-align: left !important;
    }

    .links-page table.table th {
        font-size: 15px;
        font-weight: 900;
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

    .links-page table.table td > a[target],
    .links-card__link {
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

    .links-page table.table tr:nth-child(2) td > a[target],
    .links-card__body .links-card__link:first-child {
        border-top: 0;
    }

    .links-page table.table td > a[target]:after,
    .links-card__link:after {
        content: "\f08e";
        position: absolute;
        right: 16px;
        color: #00836f;
        font-family: FontAwesome;
        font-weight: normal;
    }

    .links-page table.table td > a[target]:hover,
    .links-page table.table td > a[target]:focus,
    .links-card__link:hover,
    .links-card__link:focus {
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
        font-size: 13px;
        line-height: 1;
        text-decoration: none;
    }

    .links-page table.table td > small .glyphicon {
        color: #0369a1 !important;
    }

    .links-card__header {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .links-card__header h2 {
        margin: 0;
        font-size: 15px;
        font-weight: 900;
    }

    .links-card__mark {
        width: 10px;
        height: 28px;
        border-radius: 20px;
        background: #00836f;
    }

    .links-card--blue .links-card__mark {
        background: #0ea5e9;
    }

    .links-card--rose .links-card__mark {
        background: #e11d48;
    }

    .links-card__body {
        background: #fff;
    }

    .links-card__link {
        position: relative;
    }

    .links-card__name {
        display: block;
        padding-right: 18px;
    }

    .links-card__host {
        display: block;
        margin-top: 3px;
        color: #64748b;
        font-size: 11px;
        font-weight: 700;
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

    .links-page .modal-body dt,
    .modal[id^="myLinkprogram"] .modal-body dt {
        color: #385269;
        text-transform: uppercase;
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

    @media (max-width: 1100px) {
        .links-grid,
        .links-static-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 720px) {
        .links-page {
            padding: 0 0 84px;
        }

        .links-hero,
        .links-tabs,
        .links-dynamic-card .table-responsive,
        .links-card {
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

        .links-grid,
        .links-static-grid {
            grid-template-columns: 1fr;
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
                <p class="links-hero__kicker">Link library</p>
                <h1>Useful links, cleaned up.</h1>
                <p class="links-hero__copy">A more readable board for saved references, technical links, social tools, and study material. Choose a category, then open links without losing this page.</p>
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
            <?php echo $session->message(); ?>
            <?php echo isset($valid) ? $valid->form_errors() : ""; ?>
        </div>

        <nav class="links-tabs" aria-label="Link categories">
            <?php echo Links::get_search_category(); ?>
        </nav>

        <h2 class="links-section-title">Saved categories</h2>
        <section class="links-grid" aria-label="Saved links">
            <div class="links-dynamic-card"><?php echo Links::output_links(); ?></div>
            <div class="links-dynamic-card"><?php echo Links::output_links('PHP'); ?></div>
            <div class="links-dynamic-card"><?php echo Links::output_links('Bootstrap'); ?></div>
            <div class="links-dynamic-card"><?php echo Links::output_links('udemy', true); ?></div>
        </section>

        <h2 class="links-section-title">Pinned links</h2>
        <section class="links-static-grid" aria-label="Pinned links">
            <?php foreach ($quick_sections as $section) {
                echo mylinks_static_section($section['title'], $section['links'], $section['tone']);
            } ?>
        </section>
    </div>
</main>

<?php include(FOOTER_PUBLIC); ?>
