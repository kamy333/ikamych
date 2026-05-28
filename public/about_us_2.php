<?php require_once('../includes/initialize.php'); ?>
<?php $layout_context = "public"; ?>
<?php $active_menu = "about"; ?>
<?php $stylesheets = ""; ?>
<?php $fluid_view = true; ?>
<?php $javascript = ""; ?>
<?php $incl_message_error = true; ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "header.php") ?>
<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "nav.php") ?>

<style>
    body {
        background: #eef6ff;
    }

    #container-view {
        padding-right: 0;
        padding-left: 0;
    }

    .about-ai-page {
        min-height: calc(100vh - 70px);
        padding: 26px 14px 96px;
        color: #071d3c;
        background:
            linear-gradient(135deg, rgba(233, 247, 255, 0.92) 0%, rgba(247, 251, 255, 0.94) 44%, rgba(226, 239, 255, 0.94) 100%),
            url("/public/css/patterns/triangular.png");
    }

    .about-ai-shell {
        width: min(1180px, 100%);
        margin: 0 auto;
    }

    .about-ai-hero {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(300px, 420px);
        gap: 18px;
        align-items: stretch;
    }

    .about-ai-panel {
        position: relative;
        min-height: 420px;
        padding: 34px;
        border-radius: 8px;
        background: linear-gradient(135deg, #04173d 0%, #063f88 50%, #00a3e7 100%);
        color: #ffffff;
        box-shadow: 0 24px 70px rgba(8, 29, 63, 0.22);
        overflow: hidden;
    }

    .about-ai-panel:after {
        content: "";
        position: absolute;
        right: 28px;
        bottom: 28px;
        width: 220px;
        height: 120px;
        border: 1px solid rgba(255, 255, 255, 0.20);
        border-radius: 8px;
        background:
            linear-gradient(90deg, rgba(255, 255, 255, 0.18) 1px, transparent 1px) 0 0 / 28px 100%,
            linear-gradient(0deg, rgba(255, 255, 255, 0.18) 1px, transparent 1px) 0 0 / 100% 24px;
        opacity: 0.40;
        pointer-events: none;
    }

    .about-ai-kicker {
        position: relative;
        z-index: 1;
        margin: 0 0 10px;
        color: #bff4ff;
        font-size: 12px;
        font-weight: 900;
        text-transform: uppercase;
    }

    .about-ai-panel h1 {
        position: relative;
        z-index: 1;
        max-width: 720px;
        margin: 0;
        font-size: 44px;
        line-height: 1.06;
        font-weight: 900;
    }

    .about-ai-panel p {
        position: relative;
        z-index: 1;
        max-width: 700px;
        margin: 18px 0 0;
        color: #e5f9ff;
        font-size: 18px;
        line-height: 1.58;
    }

    .about-ai-actions {
        position: relative;
        z-index: 1;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 26px;
    }

    .about-ai-btn {
        display: inline-flex;
        min-height: 44px;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 0 16px;
        border-radius: 8px;
        font-weight: 900;
        text-decoration: none;
    }

    .about-ai-btn--primary {
        background: #dff7ff;
        color: #06356f;
    }

    .about-ai-btn--secondary {
        border: 1px solid rgba(255, 255, 255, 0.28);
        background: rgba(255, 255, 255, 0.14);
        color: #ffffff;
    }

    .about-ai-btn:hover,
    .about-ai-btn:focus {
        filter: brightness(0.97);
        text-decoration: none;
    }

    .about-ai-image {
        display: grid;
        min-height: 420px;
        align-items: end;
        border: 1px solid #dbeafe;
        border-radius: 8px;
        background:
            linear-gradient(180deg, rgba(7, 29, 60, 0.04) 0%, rgba(7, 29, 60, 0.70) 100%),
            url("/public/img/kamy_blue_office_2.png");
        background-position: center, center 36%;
        background-size: cover, cover;
        background-repeat: no-repeat, no-repeat;
        box-shadow: 0 24px 70px rgba(8, 29, 63, 0.16);
        overflow: hidden;
    }

    .about-ai-image__caption {
        padding: 22px;
        color: #ffffff;
    }

    .about-ai-image__caption strong {
        display: block;
        font-size: 22px;
        font-weight: 900;
    }

    .about-ai-image__caption span {
        display: block;
        margin-top: 5px;
        color: #dff7ff;
        line-height: 1.45;
    }

    .about-ai-flow {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 14px;
        margin-top: 18px;
    }

    .about-ai-step {
        min-height: 210px;
        padding: 20px;
        border: 1px solid #dbeafe;
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.95);
        box-shadow: 0 18px 46px rgba(8, 29, 63, 0.10);
    }

    .about-ai-step__number {
        display: inline-flex;
        width: 40px;
        height: 40px;
        align-items: center;
        justify-content: center;
        margin-bottom: 14px;
        border-radius: 8px;
        background: #073b88;
        color: #ffffff;
        font-weight: 900;
    }

    .about-ai-step h2 {
        margin: 0 0 8px;
        color: #06356f;
        font-size: 18px;
        font-weight: 900;
    }

    .about-ai-step p {
        margin: 0;
        color: #385269;
        font-size: 15px;
        line-height: 1.55;
    }

    .about-ai-workbench {
        display: grid;
        grid-template-columns: minmax(0, 0.92fr) minmax(0, 1.08fr);
        gap: 18px;
        margin-top: 18px;
    }

    .about-ai-note,
    .about-ai-links {
        border: 1px solid #dbeafe;
        border-radius: 8px;
        background: #ffffff;
        box-shadow: 0 18px 46px rgba(8, 29, 63, 0.10);
    }

    .about-ai-note {
        padding: 24px;
    }

    .about-ai-note h2,
    .about-ai-links h2 {
        margin: 0;
        color: #06356f;
        font-size: 26px;
        font-weight: 900;
    }

    .about-ai-note p {
        margin: 14px 0 0;
        color: #385269;
        font-size: 16px;
        line-height: 1.62;
    }

    .about-ai-links {
        overflow: hidden;
    }

    .about-ai-links__head {
        padding: 20px 22px;
        background: #e9f7ff;
        border-bottom: 1px solid #dbeafe;
    }

    .about-ai-link-list {
        display: grid;
        gap: 0;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .about-ai-link-list a {
        display: grid;
        grid-template-columns: 44px minmax(0, 1fr) 28px;
        gap: 12px;
        align-items: center;
        padding: 14px 18px;
        border-bottom: 1px solid #edf2f7;
        color: #071d3c;
        text-decoration: none;
    }

    .about-ai-link-list a:hover,
    .about-ai-link-list a:focus {
        background: #f6fbff;
        text-decoration: none;
    }

    .about-ai-link-list i:first-child {
        display: inline-flex;
        width: 44px;
        height: 44px;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background: #e8f7ff;
        color: #0077b6;
        font-size: 18px;
    }

    .about-ai-link-list strong {
        display: block;
        font-weight: 900;
    }

    .about-ai-link-list span {
        display: block;
        margin-top: 3px;
        color: #52677b;
        font-size: 13px;
        line-height: 1.35;
    }

    .about-ai-link-list i:last-child {
        color: #0b76c5;
    }

    @media (max-width: 1040px) {
        .about-ai-flow {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 920px) {
        .about-ai-hero,
        .about-ai-workbench {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        .about-ai-page {
            padding: 0 0 84px;
        }

        .about-ai-panel,
        .about-ai-image,
        .about-ai-step,
        .about-ai-note,
        .about-ai-links {
            border-right: 0;
            border-left: 0;
            border-radius: 0;
            box-shadow: none;
        }

        .about-ai-panel {
            min-height: 0;
            padding: 26px 16px;
        }

        .about-ai-panel h1 {
            font-size: 34px;
        }

        .about-ai-image {
            min-height: 350px;
            background-position: center, center 30%;
        }

        .about-ai-flow {
            grid-template-columns: 1fr;
        }

        .about-ai-note {
            padding: 18px 16px;
        }

        .about-ai-link-list a {
            grid-template-columns: 38px minmax(0, 1fr) 22px;
            padding: 12px 14px;
        }

        .about-ai-link-list i:first-child {
            width: 38px;
            height: 38px;
        }
    }
</style>

<main class="about-ai-page">
    <div class="about-ai-shell">
        <section class="about-ai-hero">
            <div class="about-ai-panel">
                <p class="about-ai-kicker">AI workspace</p>
                <h1>AI is the practical co-pilot for ikamy.</h1>
                <p>
                    The goal is simple: make the site clearer, faster, and more useful. AI helps rewrite text,
                    shape pages, improve forms, and turn small ideas into tools that can be used immediately.
                </p>
                <div class="about-ai-actions">
                    <a class="about-ai-btn about-ai-btn--primary" href="/public/about_us.php">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> About ikamy
                    </a>
                    <a class="about-ai-btn about-ai-btn--secondary" href="/public/admin/index.php">
                        <i class="fa fa-th-large" aria-hidden="true"></i> Admin home
                    </a>
                </div>
            </div>
            <div class="about-ai-image" role="img" aria-label="Kamran portrait in a clean Blue Remini office">
                <div class="about-ai-image__caption">
                    <strong>Blue Remini direction</strong>
                    <span>A calmer visual identity for personal tools, memories, and daily work.</span>
                </div>
            </div>
        </section>

        <section class="about-ai-flow" aria-label="How AI helps this site">
            <article class="about-ai-step">
                <span class="about-ai-step__number">01</span>
                <h2>Design</h2>
                <p>Pages are redesigned around clean hierarchy, readable spacing, and the Blue Remini identity.</p>
            </article>
            <article class="about-ai-step">
                <span class="about-ai-step__number">02</span>
                <h2>Writing</h2>
                <p>Old text can be rewritten so it sounds warm, direct, and easier to understand.</p>
            </article>
            <article class="about-ai-step">
                <span class="about-ai-step__number">03</span>
                <h2>Tools</h2>
                <p>Calendar, notes, expenses, links, and admin pages become quicker to reach and easier to use.</p>
            </article>
            <article class="about-ai-step">
                <span class="about-ai-step__number">04</span>
                <h2>Care</h2>
                <p>Personal memories and family material can be presented with respect, clarity, and structure.</p>
            </article>
        </section>

        <section class="about-ai-workbench">
            <article class="about-ai-note">
                <p class="about-ai-kicker">What changes here</p>
                <h2>Less old template, more useful personal system.</h2>
                <p>
                    These About pages now describe what the website has become: a personal platform that mixes
                    memory, administration, learning, and AI-assisted design. The older text about a transport
                    template has been replaced with a clearer story about the current ikamy project.
                </p>
                <p>
                    The pages still keep the same PHP includes, navigation, footer, and public routing. Only the
                    presentation and wording have been modernized.
                </p>
            </article>

            <aside class="about-ai-links" aria-label="Useful areas">
                <div class="about-ai-links__head">
                    <p class="about-ai-kicker">Quick paths</p>
                    <h2>Explore the workspace</h2>
                </div>
                <ul class="about-ai-link-list">
                    <li>
                        <a href="/public/index.php">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span><strong>Home</strong><span>Main public entry point.</span></span>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/public/myLinks.php?category=Others">
                            <i class="fa fa-link" aria-hidden="true"></i>
                            <span><strong>Links</strong><span>Saved references and learning material.</span></span>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/public/loan_expense.php">
                            <i class="fa fa-usd" aria-hidden="true"></i>
                            <span><strong>Expenses</strong><span>Personal finance and loan tracking.</span></span>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/public/contact.php">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span><strong>Contact</strong><span>Reach the site owner.</span></span>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </aside>
        </section>
    </div>
</main>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
