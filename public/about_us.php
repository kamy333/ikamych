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
        background: #edf5ff;
    }

    #container-view {
        padding-right: 0;
        padding-left: 0;
    }

    .about-blue-page {
        min-height: calc(100vh - 70px);
        padding: 26px 14px 96px;
        color: #081d3f;
        background:
            radial-gradient(circle at top left, rgba(58, 166, 255, 0.20), transparent 34%),
            linear-gradient(135deg, #f7fbff 0%, #edf6ff 44%, #e8f2ff 100%);
    }

    .about-blue-shell {
        width: min(1180px, 100%);
        margin: 0 auto;
    }

    .about-blue-hero {
        display: grid;
        grid-template-columns: minmax(0, 1.1fr) minmax(280px, 0.9fr);
        gap: 26px;
        align-items: stretch;
    }

    .about-blue-hero__content {
        position: relative;
        min-height: 430px;
        padding: 34px;
        border-radius: 8px;
        background: linear-gradient(135deg, #062b67 0%, #0053a6 46%, #020f2a 100%);
        color: #ffffff;
        box-shadow: 0 24px 70px rgba(8, 29, 63, 0.22);
        overflow: hidden;
    }

    .about-blue-hero__content:after {
        content: "";
        position: absolute;
        right: 26px;
        bottom: 24px;
        width: 210px;
        height: 102px;
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 8px;
        background:
            linear-gradient(90deg, rgba(255, 255, 255, 0.18) 1px, transparent 1px) 0 0 / 24px 100%,
            linear-gradient(0deg, rgba(255, 255, 255, 0.20) 1px, transparent 1px) 0 0 / 100% 22px;
        opacity: 0.38;
        pointer-events: none;
    }

    .about-blue-kicker {
        margin: 0 0 10px;
        color: #a8eeff;
        font-size: 12px;
        font-weight: 900;
        text-transform: uppercase;
    }

    .about-blue-hero h1 {
        position: relative;
        z-index: 1;
        max-width: 760px;
        margin: 0;
        font-size: 46px;
        line-height: 1.05;
        font-weight: 900;
    }

    .about-blue-hero__copy {
        position: relative;
        z-index: 1;
        max-width: 720px;
        margin: 18px 0 0;
        color: #dff7ff;
        font-size: 18px;
        line-height: 1.58;
    }

    .about-blue-actions {
        position: relative;
        z-index: 1;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 26px;
    }

    .about-blue-btn {
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

    .about-blue-btn--primary {
        background: linear-gradient(135deg, #dff7ff 0%, #bfeeff 100%);
        color: #06356f;
    }

    .about-blue-btn--ghost {
        border: 1px solid rgba(255, 255, 255, 0.24);
        background: rgba(255, 255, 255, 0.12);
        color: #ffffff;
    }

    .about-blue-btn:hover,
    .about-blue-btn:focus {
        filter: brightness(0.97);
        text-decoration: none;
    }

    .about-blue-portrait {
        min-height: 430px;
        border-radius: 8px;
        overflow: hidden;
        background: #031a3a;
        box-shadow: 0 24px 70px rgba(8, 29, 63, 0.18);
    }

    .about-blue-portrait img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .about-blue-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 14px;
        margin-top: 18px;
    }

    .about-blue-card {
        padding: 20px;
        border: 1px solid #dbeafe;
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.94);
        box-shadow: 0 18px 46px rgba(8, 29, 63, 0.10);
    }

    .about-blue-card__icon {
        display: inline-flex;
        width: 42px;
        height: 42px;
        align-items: center;
        justify-content: center;
        margin-bottom: 14px;
        border-radius: 8px;
        background: #e8f7ff;
        color: #0077b6;
        font-size: 18px;
    }

    .about-blue-card h2 {
        margin: 0 0 8px;
        color: #06356f;
        font-size: 18px;
        font-weight: 900;
    }

    .about-blue-card p {
        margin: 0;
        color: #385269;
        font-size: 15px;
        line-height: 1.55;
    }

    .about-blue-band {
        display: grid;
        grid-template-columns: minmax(0, 0.9fr) minmax(0, 1.1fr);
        gap: 24px;
        align-items: center;
        margin-top: 18px;
        padding: 24px;
        border: 1px solid #dbeafe;
        border-radius: 8px;
        background: #ffffff;
        box-shadow: 0 18px 46px rgba(8, 29, 63, 0.10);
    }

    .about-blue-band img {
        width: 100%;
        max-height: 360px;
        object-fit: cover;
        border-radius: 8px;
    }

    .about-blue-band h2 {
        margin: 0 0 12px;
        color: #06356f;
        font-size: 28px;
        font-weight: 900;
    }

    .about-blue-list {
        display: grid;
        gap: 10px;
        margin: 18px 0 0;
        padding: 0;
        list-style: none;
    }

    .about-blue-list li {
        display: grid;
        grid-template-columns: 30px minmax(0, 1fr);
        gap: 10px;
        align-items: start;
        color: #2f4358;
        line-height: 1.5;
    }

    .about-blue-list i {
        display: inline-flex;
        width: 30px;
        height: 30px;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background: #e8f7ff;
        color: #0077b6;
    }

    @media (max-width: 920px) {
        .about-blue-hero,
        .about-blue-band {
            grid-template-columns: 1fr;
        }

        .about-blue-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        .about-blue-page {
            padding: 0 0 84px;
        }

        .about-blue-hero__content,
        .about-blue-portrait,
        .about-blue-card,
        .about-blue-band {
            border-right: 0;
            border-left: 0;
            border-radius: 0;
            box-shadow: none;
        }

        .about-blue-hero__content {
            min-height: 0;
            padding: 26px 16px;
        }

        .about-blue-hero h1 {
            font-size: 34px;
        }

        .about-blue-portrait {
            min-height: 320px;
        }

        .about-blue-band {
            padding: 16px;
        }
    }
</style>

<main class="about-blue-page">
    <div class="about-blue-shell">
        <section class="about-blue-hero">
            <div class="about-blue-hero__content">
                <p class="about-blue-kicker">Ikamy, Blue Remini</p>
                <h1>A personal digital workspace shaped by memory, care, and AI.</h1>
                <p class="about-blue-hero__copy">
                    This site is more than a homepage. It is a living workspace for family, notes, links,
                    planning, expenses, memories, and small tools that make daily life easier. AI now helps
                    refine the design, organize information, and turn practical ideas into working pages.
                </p>
                <div class="about-blue-actions">
                    <a class="about-blue-btn about-blue-btn--primary" href="/public/about_us_2.php">
                        <i class="fa fa-bolt" aria-hidden="true"></i> See the AI workspace
                    </a>
                    <a class="about-blue-btn about-blue-btn--ghost" href="/public/contact.php">
                        <i class="fa fa-envelope" aria-hidden="true"></i> Contact
                    </a>
                </div>
            </div>
            <figure class="about-blue-portrait">
                <img src="/public/img/kamy_jet_geneva.png" alt="Kamran Nafisspour by the Jet d'Eau in Geneva">
            </figure>
        </section>

        <section class="about-blue-grid" aria-label="What this site is about">
            <article class="about-blue-card">
                <span class="about-blue-card__icon"><i class="fa fa-heart" aria-hidden="true"></i></span>
                <h2>Memory</h2>
                <p>Family pages, photographs, tributes, and personal history stay close instead of disappearing into scattered folders.</p>
            </article>
            <article class="about-blue-card">
                <span class="about-blue-card__icon"><i class="fa fa-cogs" aria-hidden="true"></i></span>
                <h2>Useful Tools</h2>
                <p>Calendar, notes, expenses, links, and admin shortcuts are built as practical tools for repeated everyday use.</p>
            </article>
            <article class="about-blue-card">
                <span class="about-blue-card__icon"><i class="fa fa-magic" aria-hidden="true"></i></span>
                <h2>AI Assistance</h2>
                <p>AI supports the craft: clearer interfaces, better text, faster iteration, and small improvements that compound over time.</p>
            </article>
        </section>

        <section class="about-blue-band">
            <img src="/public/img/kamy_blue_office_1.png" alt="Kamran Nafisspour in a Blue Remini office">
            <div>
                <p class="about-blue-kicker">About Kamran</p>
                <h2>Builder, learner, and organizer of a personal web system.</h2>
                <p>
                    Kamran Nafisspour, known as Kamy, brings together accounting discipline, technology curiosity,
                    and a strong habit of organizing life into systems. The site reflects that mix: human stories,
                    practical records, and software that keeps improving.
                </p>
                <ul class="about-blue-list">
                    <li><i class="fa fa-check" aria-hidden="true"></i><span>Designed for real daily workflows, not for decoration only.</span></li>
                    <li><i class="fa fa-check" aria-hidden="true"></i><span>Built around a visual identity: Blue Remini, calm but precise.</span></li>
                    <li><i class="fa fa-check" aria-hidden="true"></i><span>Updated with AI as a collaborator for writing, layout, and usability.</span></li>
                </ul>
            </div>
        </section>
    </div>
</main>

<?php include(SITE_ROOT . DS . 'public' . DS . 'layouts' . DS . "footer.php") ?>
