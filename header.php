<?php
/**
 * header.php — Reusable Header Component for BRDS / NID Coaching
 *
 * ─── USAGE ────────────────────────────────────────────────────────────────────
 *
 *   Basic (include at the top of any page, inside <body>):
 *       <?php include 'header.php'; ?>
 *
 *   Override the tagline (optional):
 *       <?php $header_tagline = "Your Custom Tagline"; include 'header.php'; ?>
 *
 *   Override the logo path (optional):
 *       <?php $header_logo = "images/my-logo.png"; include 'header.php'; ?>
 *
 * ──────────────────────────────────────────────────────────────────────────────
 */

// ── Configurable defaults ─────────────────────────────────────────────────────
$header_logo    = $header_logo    ?? 'images/headerlogo.png';
$header_tagline = $header_tagline ?? "India's No. 1 Design Coaching Institute";

// ── Active page detection ─────────────────────────────────────────────────────
$current_page = basename($_SERVER['PHP_SELF']);

// ── Nav links — add/remove items here only ────────────────────────────────────
$nav_links = [
    ['label' => 'Home',       'href' => '/',           'pages' => ['index.php', '']],
    ['label' => 'About Us',   'href' => 'about-us.php','pages' => ['about-us.php']],
    // ['label' => 'Blog',       'href' => 'https://blog.ceedcoaching.com/', 'pages' => []],
    ['label' => 'Contact Us', 'href' => 'contact.php', 'pages' => ['contact.php']],
];
?>

<!-- ===== BRDS HEADER — START ===== -->
<style>
/* ── Reset scoped to header ───────────────────────────────────────────────── */
.brds-header *, .brds-header *::before, .brds-header *::after {
    box-sizing: border-box;
}

/* ── Header shell ─────────────────────────────────────────────────────────── */
.brds-header {
    width: 100%;
    background: #fff;
    box-shadow: 0 2px 16px rgba(0,0,0,0.08);
    position: relative;
    z-index: 1000;
    font-family: 'Poppins', sans-serif;
}

/* ── ROW 1 : logo ──────────────────────────────────────────────── */
.brds-header__top {
    display: flex;
    align-items: center;
    justify-content: space-around;
    padding: 14px 24px;
    background: #ff0000;
    gap: 16px;
}

@media (min-width: 768px) {
    .brds-header__top {
        padding: 14px 24px;
    }
}

.brds-header__logo {
    position: relative;
    z-index: 1001;
}
.brds-header__logo a {
    display: block;
    text-decoration: none;
    cursor: pointer;
    position: relative;
    z-index: 1001;
}
.brds-header__logo img {
    height: 80px;
    width: auto;
    display: block;
}

/* ── ROW 1.5 : tagline + hamburger ──────────────────────────────────────── */
.brds-header__nav-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 24px;
    background: #fff;
    border-bottom: 1px solid rgba(0,0,0,0.06);
}

.brds-header__tagline {
    margin: 0;
    font-size: clamp(13px, 2vw, 18px);
    font-weight: 700;
    letter-spacing: 0.01em;
    text-align: left;
    line-height: 1.3;
    /* gradient text */
    background: linear-gradient(45deg, #ff3333, #ee0404);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: brdsHeaderPulse 2.4s ease-in-out infinite;
    flex-shrink: 0;
}

/* Desktop tagline - shown in top row, white color */
.brds-header__tagline-desktop {
    display: none;
    color: #fff;
       background: linear-gradient(45deg, #ffffffff, #ffffffff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Mobile tagline - shown in nav-row */
.brds-header__tagline-mobile {
    display: block;
}

/* Hide nav-row on desktop */
.brds-header__nav-row {
    display: flex;
}

@media (min-width: 768px) {
    .brds-header__tagline-mobile {
        display: none;
    }
    .brds-header__tagline-desktop {
        display: block;
    }
    .brds-header__nav-row {
        display: none;
    }
}

@keyframes brdsHeaderPulse {
    0%, 100% { transform: scale(1); }
    50%       { transform: scale(1.04); }
}

/* ── ROW 2 : navigation ───────────────────────────────────────────────────── */
.brds-header__nav {
    background: #111;
    padding: 0 24px;
    position: sticky;
    top: 0;
    z-index: 999;
}

.brds-header__nav-inner {
    display: flex;
    align-items: center;
    justify-content: center;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 4px;
}

.brds-header__nav-inner li a {
    display: inline-block;
    padding: 12px 22px;
    font-size: 14px;
    font-weight: 600;
    color: #fff;
    text-decoration: none;
    position: relative;
    transition: color 0.25s;
    letter-spacing: 0.02em;
}

/* animated underline */
.brds-header__nav-inner li a::after {
    content: '';
    position: absolute;
    bottom: 8px;
    left: 22px;
    right: 22px;
    height: 2px;
    background: linear-gradient(90deg, #e31e24, #ff7043);
    border-radius: 2px;
    transform: scaleX(0);
    transform-origin: center;
    transition: transform 0.25s ease;
}

.brds-header__nav-inner li a:hover,
.brds-header__nav-inner li a.active {
    color: #e31e24;
}

.brds-header__nav-inner li a:hover::after,
.brds-header__nav-inner li a.active::after {
    transform: scaleX(1);
}

/* ── Mobile hamburger ─────────────────────────────────────────────────────── */
.brds-header__hamburger {
    display: none;
    flex-direction: column;
    justify-content: center;
    gap: 5px;
    cursor: pointer;
    padding: 6px;
    background: none;
    border: none;
    border-radius: 6px;
    transition: background 0.2s;
}
.brds-header__hamburger:hover { background: rgba(227,30,36,0.08); }
.brds-header__hamburger span {
    display: block;
    width: 24px;
    height: 2px;
    background: #333;
    border-radius: 2px;
    transition: all 0.3s ease;
}
/* hamburger → X */
.brds-header__hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
.brds-header__hamburger.open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
.brds-header__hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

/* ── Responsive ───────────────────────────────────────────────────────────── */
@media (max-width: 767px) {
    .brds-header__top {
        padding: 15px 20px;
        justify-content: center;
    }
    .brds-header__logo {
        width: 80%;
        text-align: center;
    }
    .brds-header__logo img {
        width: 100%;
        height: auto;
    }

    .brds-header__nav-row {
        width: 100%;
        justify-content: space-between;
        align-items: center;
        padding: 12px 15px;
        background: #fff;
    }

    .brds-header__tagline {
        font-size: 12px !important;
        flex: 1;
    }

    .brds-header__hamburger {
        display: flex;
        flex-shrink: 0;
        margin-left: 10px;
    }

    /* collapsible nav on mobile */
    .brds-header__nav {
        padding: 0;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.35s ease;
        border-top: 1px solid transparent;
        width: 100%;
    }
    .brds-header__nav.open {
        max-height: 300px;
        border-top: 1px solid rgba(255,255,255,0.1);
    }
    .brds-header__nav-inner {
        flex-direction: column;
        align-items: stretch;
        padding: 8px 0;
    }
    .brds-header__nav-inner li a {
        padding: 13px 20px;
        border-radius: 0;
        font-size: 15px;
    }
    .brds-header__nav-inner li a::after {
        bottom: 6px; left: 20px; right: 20px;
    }
}
</style>

<header class="brds-header">

    <!-- Row 1 : Logo + Tagline (red bg) -->
    <div class="brds-header__top">
        <div class="brds-header__logo">
            <a href="/">
                <img src="<?= htmlspecialchars($header_logo) ?>" alt="BRDS Logo">
            </a>
        </div>
        <p class="brds-header__tagline brds-header__tagline-desktop"><?= htmlspecialchars($header_tagline) ?></p>
    </div>

    <!-- Row 2 : Tagline + Hamburger (white bg, mobile only) -->
    <div class="brds-header__nav-row">
        <p class="brds-header__tagline brds-header__tagline-mobile"><?= htmlspecialchars($header_tagline) ?></p>

        <!-- Hamburger (mobile only, hidden on desktop) -->
        <button class="brds-header__hamburger" id="brdsHamburger" aria-label="Toggle menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <!-- Row 3 : Navigation -->
    <nav class="brds-header__nav" id="brdsNav" role="navigation" aria-label="Main navigation">
        <ul class="brds-header__nav-inner">
            <?php foreach ($nav_links as $link) :
                $is_active = in_array($current_page, $link['pages']);
            ?>
            <li>
                <a href="<?= htmlspecialchars($link['href']) ?>"
                   class="<?= $is_active ? 'active' : '' ?>"
                   <?= $is_active ? 'aria-current="page"' : '' ?>>
                    <?= htmlspecialchars($link['label']) ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </nav>

</header>

<script>
(function () {
    'use strict';
    var btn = document.getElementById('brdsHamburger');
    var nav = document.getElementById('brdsNav');
    if (!btn || !nav) return;

    btn.addEventListener('click', function () {
        var open = nav.classList.toggle('open');
        btn.classList.toggle('open', open);
        btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });

    // Close nav when a link is clicked (mobile UX)
    nav.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            nav.classList.remove('open');
            btn.classList.remove('open');
            btn.setAttribute('aria-expanded', 'false');
        });
    });
})();
</script>
<!-- ===== BRDS HEADER — END ===== -->