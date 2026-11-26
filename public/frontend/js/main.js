/* ---------- Compact nav search toggle (992–1199px) ---------- */
const navSearchToggle = document.getElementById("navSearchToggle");
if (navSearchToggle) {
    navSearchToggle.addEventListener("click", () => {
        document
            .getElementById("showcase")
            ?.scrollIntoView({ behavior: "smooth" });
    });
}

/* ---------- Language dropdown ---------- */
const langDD = document.getElementById("langDD");
const langToggle = document.getElementById("langToggle");
langToggle.addEventListener("click", (e) => {
    e.stopPropagation();
    langDD.classList.toggle("open");
    langToggle.setAttribute("aria-expanded", langDD.classList.contains("open"));
});
document.querySelectorAll(".lang-item").forEach((item) => {
    item.addEventListener("click", () => {
        const code = item.dataset.lang;
        const flag = item.querySelector(".flag").textContent;
        langToggle.innerHTML = `<span class="flag">${flag}</span> ${code} <i class="bi bi-chevron-down" style="font-size:.7rem"></i>`;
        langDD.classList.remove("open");
    });
});
document.addEventListener("click", () => langDD.classList.remove("open"));

/* ---------- Account dropdown ---------- */
const accountDD = document.getElementById("accountDD");
const accountToggle = document.getElementById("accountToggle");
if (accountDD && accountToggle) {
    accountToggle.addEventListener("click", (e) => {
        e.stopPropagation();
        accountDD.classList.toggle("open");
        accountToggle.setAttribute(
            "aria-expanded",
            accountDD.classList.contains("open"),
        );
    });
    document.addEventListener("click", () =>
        accountDD.classList.remove("open"),
    );
    accountDD
        .querySelector(".account-menu")
        .addEventListener("click", (e) => e.stopPropagation());
}
/* Bottom app bar profile icon opens the same account menu */
const babAccount = document.getElementById("babAccount");
if (babAccount && accountDD) {
    babAccount.addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();
        accountDD.classList.add("open");
        accountDD.classList.remove("d-none");
        accountDD.style.cssText =
            "position:fixed; right:1rem; bottom:76px; display:block;";
    });
    document.addEventListener("click", (e) => {
        if (!e.target.closest("#accountDD") && e.target !== babAccount) {
            accountDD.classList.remove("open");
        }
    });
}

/* ---------- Mobile off-canvas nav drawer ---------- */
const hamburgerBtn = document.getElementById("hamburgerBtn");
const mobileDrawer = document.getElementById("mobileDrawer");
const drawerBackdrop = document.getElementById("drawerBackdrop");
const drawerClose = document.getElementById("drawerClose");

function openDrawer() {
    hamburgerBtn.classList.add("open");
    hamburgerBtn.setAttribute("aria-expanded", "true");
    mobileDrawer.classList.add("open");
    drawerBackdrop.classList.add("open");
    document.body.classList.add("drawer-locked");
}
function closeDrawer() {
    hamburgerBtn.classList.remove("open");
    hamburgerBtn.setAttribute("aria-expanded", "false");
    mobileDrawer.classList.remove("open");
    drawerBackdrop.classList.remove("open");
    document.body.classList.remove("drawer-locked");
}
if (hamburgerBtn) {
    hamburgerBtn.addEventListener("click", () => {
        hamburgerBtn.classList.contains("open") ? closeDrawer() : openDrawer();
    });
    drawerBackdrop.addEventListener("click", closeDrawer);
    drawerClose.addEventListener("click", closeDrawer);
    mobileDrawer.querySelectorAll(".drawer-links a").forEach((link) => {
        link.addEventListener("click", closeDrawer);
    });
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && mobileDrawer.classList.contains("open"))
            closeDrawer();
    });
}
/* the drawer's own language toggle mirrors the desktop one visually */
const drawerLangToggle = document.getElementById("drawerLangToggle");
if (drawerLangToggle) {
    drawerLangToggle.addEventListener("click", () => {
        document.getElementById("langToggle")?.click();
    });
}

/* ---------- Dark / Light theme toggle ---------- */
const themeToggle = document.getElementById("themeToggle");
const root = document.documentElement;
const savedTheme = localStorage.getItem("craftify-theme");
if (
    savedTheme === "dark" ||
    (!savedTheme && window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    root.setAttribute("data-theme", "dark");
}
themeToggle.addEventListener("click", () => {
    const isDark = root.getAttribute("data-theme") === "dark";
    root.setAttribute("data-theme", isDark ? "light" : "dark");
    localStorage.setItem("craftify-theme", isDark ? "light" : "dark");
});

/* ---------- Hero entrance animation (stagger, re-plays on slide change) ---------- */
function playStagger(container) {
    const items = container.querySelectorAll(".stagger-item");
    items.forEach((el) => {
        el.classList.remove("play");
        void el.offsetWidth; /* reflow to restart animation */
        el.classList.add("play");
    });
}
const heroCarouselEl = document.getElementById("heroCarousel");
/* Force the carousel to auto-play immediately, smoothly, with no user interaction needed */
const heroCarouselInstance = bootstrap.Carousel.getOrCreateInstance(
    heroCarouselEl,
    {
        interval: 6500,
        ride: "carousel",
        pause: false,
        wrap: true,
        touch: true,
    },
);
heroCarouselInstance.cycle();
window.addEventListener("DOMContentLoaded", () => {
    playStagger(heroCarouselEl.querySelector(".carousel-item.active"));
    heroCarouselInstance.cycle();
});
heroCarouselEl.addEventListener("slid.bs.carousel", (e) => {
    playStagger(e.relatedTarget);
});
/* Safety net: some browsers pause autoplay when the tab restores from bfcache */
document.addEventListener("visibilitychange", () => {
    if (!document.hidden) heroCarouselInstance.cycle();
});

/* ---------- Before / After room staging slider ---------- */
const baRange = document.getElementById("baRange");
const baAfterWrap = document.getElementById("baAfterWrap");
const baLine = document.getElementById("baLine");
const baHandle = document.getElementById("baHandle");

function updateBA(val) {
    baAfterWrap.style.clipPath = `inset(0 ${100 - val}% 0 0)`;
    baLine.style.left = val + "%";
    baHandle.style.left = val + "%";
}
baRange.addEventListener("input", (e) => updateBA(e.target.value));
updateBA(50);

/* ---------- Voice note waveform demo bars ---------- */
const wave = document.getElementById("waveDemo");
if (wave) {
    for (let i = 0; i < 22; i++) {
        const bar = document.createElement("span");
        const h = 6 + Math.round(Math.random() * 16);
        bar.style.height = h + "px";
        wave.appendChild(bar);
    }
}

/* ---------- Scroll reveal, applied site-wide with grid-aware stagger ---------- */
const revealEls = Array.from(document.querySelectorAll(".reveal"));
/* Group siblings sharing a parent + class so grids (products, trust items,
       categories, bento cards, shorts...) cascade in rather than popping together */
const groupIndex = new Map();
revealEls.forEach((el) => {
    const key =
        el.closest(
            ".row, .category-masonry, .trust-strip-grid, .bento-grid, .shorts-scroll, .artisan-grid, .b2b-points",
        ) || el.parentElement;
    if (!key) return;
    const list = groupIndex.get(key) || [];
    list.push(el);
    groupIndex.set(key, list);
});
groupIndex.forEach((list) => {
    list.forEach((el, i) => {
        if (list.length > 1) {
            el.style.transitionDelay = Math.min(i * 90, 450) + "ms";
        }
    });
});

const io = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("in");
                io.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.12, rootMargin: "0px 0px -40px 0px" },
);
revealEls.forEach((el) => io.observe(el));

/* ---------- Product filter pills (visual only) ---------- */
document.querySelectorAll(".filter-pill").forEach((pill) => {
    pill.addEventListener("click", () => {
        document
            .querySelectorAll(".filter-pill")
            .forEach((p) => p.classList.remove("active"));
        pill.classList.add("active");
    });
});
