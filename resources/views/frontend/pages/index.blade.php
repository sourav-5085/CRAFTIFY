@extends('frontend.layouts.app')

@section('content')

<div class="drawer-backdrop" id="drawerBackdrop"></div>
<aside class="mobile-drawer" id="mobileDrawer" aria-label="Mobile navigation menu">
  <div class="drawer-head">
    <a href="#" class="brand-mark" style="font-size:1.25rem;">
      Craft<span>ify</span>
    </a>
    <button class="drawer-close" id="drawerClose" aria-label="Close menu">
      <i class="bi bi-x-lg"></i>
    </button>
  </div>
  <nav class="drawer-links">
    <a href="#hero"><i class="bi bi-house-door"></i> Home</a>
    <a href="#showcase"><i class="bi bi-bag"></i> Shop</a>
    <a href="#shorts"><i class="bi bi-play-circle"></i> Artisan Stories</a>
    <a href="#stage"><i class="bi bi-magic"></i> AI Studio</a>
    <a href="#footer"><i class="bi bi-shop"></i> Sell on Craftify</a>
  </nav>
  <div class="drawer-foot">
    <button class="lang-toggle" id="drawerLangToggle">
      <span class="flag">🇬🇧</span> EN <i class="bi bi-chevron-down" style="font-size:.7rem"></i>
    </button>
  </div>
</aside>

<!-- =========================================================
     BOTTOM APP BAR — mobile navigation
========================================================= -->
<nav class="bottom-app-bar" aria-label="Mobile navigation">
  <a href="#hero" class="bab-item active"><i class="bi bi-house-door-fill"></i>Home</a>
  <a href="#showcase" class="bab-item"><i class="bi bi-search"></i>Search</a>
  <a href="#" class="bab-item"><i class="bi bi-bag-fill"></i>Cart<span class="bab-badge">3</span></a>
  <a href="#" class="bab-item" id="babAccount"><i class="bi bi-person-fill"></i>Profile</a>
</nav>

<!-- =========================================================
     HERO — ENTRANCE CAROUSEL
========================================================= -->
<section id="hero" class="hero">
  <div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel" data-bs-interval="6500"
    data-bs-pause="false" data-bs-touch="true">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">

      <div class="carousel-item active">
        <div class="hero-slide">
          <div class="hero-slide-media">
            <img class="w-100"
              src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=1600&q=80"
              alt="Luxury home interior styled with handcrafted Indian decor">
          </div>
          <div class="container-wide">
            <div class="hero-content">
              <div class="hero-badge stagger-item"><span class="eyebrow-tag"><i class="bi bi-gem"></i> Handpicked from
                  400+ master artisans</span></div>
              <h1 class="hero-title stagger-item">Decor with a story, <em>styled by you</em></h1>
              <p class="hero-sub stagger-item">One-of-a-kind handicrafts and home decor, sourced directly from
                independent makers — brought to life in your own space before you buy.</p>
              <div class="hero-cta stagger-item">
                <a href="#showcase" class="btn-gold">Explore Collections</a>
                <div class="ai-advisor-card" onclick="document.getElementById('aiUpload').click()">
                  <span class="icon-circle"><i class="bi bi-camera"></i></span>
                  <span class="txt"><strong>AI Decor Advisor</strong>Upload a room photo for instant styling</span>
                  <input type="file" id="aiUpload" accept="image/*" hidden>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="hero-slide">
          <div class="hero-slide-media">
            <img class="w-100"
              src="https://images.unsplash.com/photo-1753164725896-f0a39315ff8a?auto=format&fit=crop&w=1600&q=80"
              alt="Artisan hand-throwing pottery on a wheel">
          </div>
          <div class="container-wide">
            <div class="hero-content">
              <div class="hero-badge stagger-item"><span class="eyebrow-tag"><i class="bi bi-hand-thumbs-up"></i>
                  Fair-trade, ethically handmade</span></div>
              <h1 class="hero-title stagger-item">Every piece, <em>a hand you can trace</em></h1>
              <p class="hero-sub stagger-item">From Rajasthan's block-print studios to Bengal's terracotta kilns —
                meet the artisans behind your next favourite object.</p>
              <div class="hero-cta stagger-item">
                <a href="#shorts" class="btn-gold">Meet the Artisans</a>
                <div class="ai-advisor-card" onclick="document.getElementById('aiUpload').click()">
                  <span class="icon-circle"><i class="bi bi-camera"></i></span>
                  <span class="txt"><strong>AI Decor Advisor</strong>Upload a room photo for instant styling</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="hero-slide">
          <div class="hero-slide-media">
            <img class="w-100"
              src="https://images.unsplash.com/photo-1761116182536-5e5121799b75?auto=format&fit=crop&w=1600&q=80"
              alt="Luxury Indian home decor styling with ornate framed art and floral arrangements">
          </div>
          <div class="container-wide">
            <div class="hero-content">
              <div class="hero-badge stagger-item"><span class="eyebrow-tag"><i class="bi bi-truck"></i> Smart
                  Cash-on-Delivery, everywhere</span></div>
              <h1 class="hero-title stagger-item">Rooted in tradition, <em>made for today</em></h1>
              <p class="hero-sub stagger-item">Terracotta, blue pottery, brass and jamdani weaves — Craftify brings
                India's finest handicraft traditions home, risk-free.</p>
              <div class="hero-cta stagger-item">
                <a href="#features" class="btn-gold">See How It Works</a>
                <div class="ai-advisor-card" onclick="document.getElementById('aiUpload').click()">
                  <span class="icon-circle"><i class="bi bi-camera"></i></span>
                  <span class="txt"><strong>AI Decor Advisor</strong>Upload a room photo for instant styling</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <i class="bi bi-chevron-left text-white fs-3"></i>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <i class="bi bi-chevron-right text-white fs-3"></i>
    </button>
  </div>
</section>

<!-- =========================================================
     TRUST BANNER
========================================================= -->
<section class="trust-strip">
  <div class="container-wide">
    <div class="trust-strip-grid">
      <div class="trust-item reveal">
        <div class="trust-icon"><i class="bi bi-truck"></i></div>
        <div class="trust-text">
          <h6>Free Shipping</h6>
          <p>On Orders Over $79</p>
        </div>
      </div>
      <div class="trust-item reveal">
        <div class="trust-icon"><i class="bi bi-shield-lock"></i></div>
        <div class="trust-text">
          <h6>Secure Payment</h6>
          <p>100% Secure Checkout</p>
        </div>
      </div>
      <div class="trust-item reveal">
        <div class="trust-icon"><i class="bi bi-gem"></i></div>
        <div class="trust-text">
          <h6>Premium Quality</h6>
          <p>Carefully Selected Pieces</p>
        </div>
      </div>
      <div class="trust-item reveal">
        <div class="trust-icon"><i class="bi bi-arrow-repeat"></i></div>
        <div class="trust-text">
          <h6>Easy Returns</h6>
          <p>30-Day Hassle Free</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =========================================================
     CURATED CATEGORIES — Shop by Category
========================================================= -->
<section id="categories" class="category-section section-pad">
  <div class="container-wide">
    <div class="section-head mx-auto text-center reveal">
      <span class="eyebrow-tag"><i class="bi bi-grid-3x3-gap"></i> Shop by Category</span>
      <h2>Find your next favourite corner</h2>
      <p class="mx-auto">Four worlds of craft, each one home to hundreds of independent makers — pick a lane and
        start browsing.</p>
    </div>

    <div class="category-masonry">
      <a href="#showcase" class="category-tile feature reveal">
        <img src="https://images.unsplash.com/photo-1610701596007-11502861dcfa?auto=format&fit=crop&w=900&q=80"
          alt="Aesthetic Pottery">
        <span class="tile-count">154 pieces</span>
        <span class="tile-arrow"><i class="bi bi-arrow-up-right"></i></span>
        <div class="tile-info">
          <h5>Aesthetic Pottery</h5>
          <p>Hand-thrown vases, terracotta & blue pottery tableware</p>
        </div>
      </a>

      <a href="#showcase" class="category-tile reveal">
        <img src="https://images.unsplash.com/photo-1513519245088-0e12902e5a38?auto=format&fit=crop&w=600&q=80"
          alt="Wall Art & Decor">
        <span class="tile-count">128 pieces</span>
        <span class="tile-arrow"><i class="bi bi-arrow-up-right"></i></span>
        <div class="tile-info">
          <h5>Wall Art & Decor</h5>
          <p>Framed art & mirrors</p>
        </div>
      </a>

      <a href="#showcase" class="category-tile reveal">
        <img src="https://images.unsplash.com/photo-1600166898405-da9535204843?auto=format&fit=crop&w=600&q=80"
          alt="Premium Handlooms">
        <span class="tile-count">86 pieces</span>
        <span class="tile-arrow"><i class="bi bi-arrow-up-right"></i></span>
        <div class="tile-info">
          <h5>Premium Handlooms</h5>
          <p>Jute, wool & jamdani weaves</p>
        </div>
      </a>

      <a href="#showcase" class="category-tile wide reveal">
        <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=900&q=80"
          alt="Lighting">
        <span class="tile-count">67 pieces</span>
        <span class="tile-arrow"><i class="bi bi-arrow-up-right"></i></span>
        <div class="tile-info">
          <h5>Lighting</h5>
          <p>Brass, rattan & terracotta lamps</p>
        </div>
      </a>
    </div>
  </div>
</section>

<!-- =========================================================
     ROOM STAGING ENGINE — BEFORE / AFTER SLIDER
========================================================= -->
<section id="stage" class="stage-pad stage-wrap section-pad">
  <div class="container-wide">
    <div class="row align-items-center g-5">
      <div class="col-lg-5">
        <span class="eyebrow-tag reveal"><i class="bi bi-magic"></i> Room Staging Engine</span>
        <h2 class="mt-3 reveal heading-adaptive" style="font-size:clamp(1.9rem,3vw,2.6rem);">See the
          transformation
          before it happens</h2>
        <p class="reveal" style="font-size:1.05rem;">Our AI staging engine drops Craftify pieces straight into a photo
          of your own
          room, so you know exactly how that handwoven rug or brass lamp will feel at home — before you spend a rupee.
        </p>
        <a href="#" class="btn-outline-emerald mt-2 reveal">Try Room Staging</a>
      </div>
      <div class="col-lg-7">
        <div class="ba-slider reveal" id="baSlider">
          <img class="ba-before"
            src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=1200&q=75"
            alt="Unstyled room">
          <div class="ba-after-wrap" id="baAfterWrap">
            <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=1200&q=75"
              alt="Craftify styled room">
          </div>
          <span class="ba-tag left">Before · Unstyled Room</span>
          <span class="ba-tag right">After · Craftify Styled</span>
          <div class="ba-handle-line" id="baLine"></div>
          <div class="ba-handle-btn" id="baHandle"><i class="bi bi-chevron-left"></i><i
              class="bi bi-chevron-right"></i></div>
          <input type="range" class="ba-range" id="baRange" min="0" max="100" value="50"
            aria-label="Drag to compare before and after">
        </div>
        <p class="ba-caption reveal"><i class="bi bi-arrows-move"></i>Drag the visual slider to see the room
          transformation.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- =========================================================
     CUSTOMER FEATURES — BENTO GRID
========================================================= -->
<section id="features" class="section-pad" style="background:var(--pearl);">
  <div class="container-wide">
    <div class="section-head mx-auto text-center reveal">
      <span class="eyebrow-tag"><i class="bi bi-grid"></i> Why shop on Craftify</span>
      <h2>Shopping for craft, made for the way you live</h2>
      <p class="mx-auto">Every feature is built to close the gap between browsing online and holding something
        beautiful in your hands.</p>
    </div>

    <div class="bento-grid mt-5">
      <div class="bento-card b-span-2 b-row-2 dark reveal">
        <div class="b-icon"><i class="bi bi-badge-3d"></i></div>
        <h4>AR Previews</h4>
        <p>Point your camera and project any piece into your room in true-to-scale 3D — see the finish, the shadow,
          the fit, before it ships.</p>
      </div>

      <div class="bento-card b-span-2 reveal">
        <div class="b-icon"><i class="bi bi-images"></i></div>
        <h4>Visual Lookbooks</h4>
        <p>Curated shelfies and styled corners from real customers — tap any item to shop the exact look.</p>
      </div>

      <div class="bento-card reveal">
        <div class="b-icon"><i class="bi bi-mic"></i></div>
        <h4>Voice-Note Reviews</h4>
        <div class="voice-note-demo">
          <span class="play-dot"><i class="bi bi-play-fill"></i></span>
          <span class="wave" id="waveDemo"></span>
          <span style="font-size:.72rem;color:var(--muted);">0:14</span>
        </div>
      </div>

      <div class="bento-card reveal">
        <div class="b-icon"><i class="bi bi-qr-code"></i></div>
        <h4>QR Video Gifting</h4>
        <p>Attach a scannable video message to any gift order — the unboxing becomes the moment.</p>
      </div>

      <div class="bento-card reveal">
        <div class="b-icon"><i class="bi bi-shield-check"></i></div>
        <h4>Smart COD</h4>
        <p>Pay cash on delivery with dynamic eligibility — verified in seconds, no surprises at the door.</p>
      </div>

      <div class="bento-card b-span-2 reveal">
        <div class="b-icon"><i class="bi bi-trophy"></i></div>
        <h4>Gamified Rewards</h4>
        <p>Earn Craft Points for reviews, referrals and repeat orders — unlock early access to limited artisan drops.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- =========================================================
     VIDEO SHORTS FEED
========================================================= -->
<section id="shorts" class="shorts-wrap section-pad">
  <div class="container-wide">
    <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
      <div class="section-head reveal">
        <span class="eyebrow-tag" style="background:rgba(212,175,55,0.15);"><i class="bi bi-play-circle"></i> Craft in
          motion</span>
        <h2>Watch it made, buy it made</h2>
        <p>Short films straight from the workshop floor — swipe through and shop the craft as it happens.</p>
      </div>
    </div>

    <div class="shorts-scroll" id="shortsScroll">

      <div class="short-card reveal"
        style="background-image:url('https://images.unsplash.com/photo-1565193566173-7a0ee3dbe261?auto=format&fit=crop&w=500&q=70')">
        <span class="short-live-badge"><i class="bi bi-broadcast"></i> New</span>
        <span class="short-play"><i class="bi bi-play-fill"></i></span>
        <div class="short-info">
          <div class="short-artisan">Meera — Blue Pottery, Jaipur</div>
          <div class="short-desc">Hand-throwing a dinner set, start to glaze</div>
          <a href="#" class="short-buy"><i class="bi bi-bag"></i> Buy Now</a>
        </div>
      </div>

      <div class="short-card reveal"
        style="background-image:url('https://images.unsplash.com/photo-1610701596007-11502861dcfa?auto=format&fit=crop&w=500&q=70')">
        <span class="short-play"><i class="bi bi-play-fill"></i></span>
        <div class="short-info">
          <div class="short-artisan">Arif — Handloom, Santipur</div>
          <div class="short-desc">Weaving a jamdani border by hand</div>
          <a href="#" class="short-buy"><i class="bi bi-bag"></i> Buy Now</a>
        </div>
      </div>

      <div class="short-card reveal"
        style="background-image:url('https://images.unsplash.com/photo-1554035957-31b5e8f7e93b?auto=format&fit=crop&w=500&q=70')">
        <span class="short-live-badge"><i class="bi bi-broadcast"></i> Trending</span>
        <span class="short-play"><i class="bi bi-play-fill"></i></span>
        <div class="short-info">
          <div class="short-artisan">Devika — Brass Casting, Moradabad</div>
          <div class="short-desc">Lost-wax casting a table lamp base</div>
          <a href="#" class="short-buy"><i class="bi bi-bag"></i> Buy Now</a>
        </div>
      </div>

      <div class="short-card reveal"
        style="background-image:url('https://images.unsplash.com/photo-1509281373149-a38c0c5e7b7d?auto=format&fit=crop&w=500&q=70')">
        <span class="short-play"><i class="bi bi-play-fill"></i></span>
        <div class="short-info">
          <div class="short-artisan">Farhan — Woodcraft, Saharanpur</div>
          <div class="short-desc">Carving a walnut jewellery box</div>
          <a href="#" class="short-buy"><i class="bi bi-bag"></i> Buy Now</a>
        </div>
      </div>

      <div class="short-card reveal"
        style="background-image:url('https://images.unsplash.com/photo-1610030181087-540f6dc71c0d?auto=format&fit=crop&w=500&q=70')">
        <span class="short-play"><i class="bi bi-play-fill"></i></span>
        <div class="short-info">
          <div class="short-artisan">Lakshmi — Macramé, Pondicherry</div>
          <div class="short-desc">Knotting a wall hanging by hand</div>
          <a href="#" class="short-buy"><i class="bi bi-bag"></i> Buy Now</a>
        </div>
      </div>

      <div class="short-card reveal"
        style="background-image:url('https://images.unsplash.com/photo-1602526432604-029ea6ba9d61?auto=format&fit=crop&w=500&q=70')">
        <span class="short-play"><i class="bi bi-play-fill"></i></span>
        <div class="short-info">
          <div class="short-artisan">Rehana — Block Print, Bagru</div>
          <div class="short-desc">Stamping indigo motifs on linen</div>
          <a href="#" class="short-buy"><i class="bi bi-bag"></i> Buy Now</a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- =========================================================
     PRODUCT SHOWCASE
========================================================= -->
<section id="showcase" class="section-pad" style="background:var(--pearl);">
  <div class="container-wide">
    <div class="d-flex justify-content-between align-items-end flex-wrap gap-4 mb-4">
      <div class="section-head reveal">
        <span class="eyebrow-tag"><i class="bi bi-bag-heart"></i> Fresh from the workshop</span>
        <h2>Made-to-order, made for you</h2>
      </div>
      <div class="filter-pills reveal">
        <button class="filter-pill active">All</button>
        <button class="filter-pill">Home Decor</button>
        <button class="filter-pill">Textiles</button>
        <button class="filter-pill">Lighting</button>
        <button class="filter-pill">Tableware</button>
      </div>
    </div>

    <div class="row g-4">

      <div class="col-6 col-md-4 col-lg-3">
        <div class="product-card reveal">
          <div class="product-media">
            <span class="product-badge">Customizable</span>
            <span class="product-wishlist"><i class="bi bi-heart"></i></span>
            <img src="https://images.unsplash.com/photo-1519710164239-da123dc03ef4?auto=format&fit=crop&w=500&q=75"
              alt="Hand-thrown ceramic vase">
          </div>
          <div class="product-body">
            <div class="product-artisan"><i class="bi bi-patch-check-fill"></i>By Meera Ceramics</div>
            <h5 class="product-title">Terracotta Ridged Vase</h5>
            <div class="product-price">₹2,450 <span>₹3,100</span></div>
            <div class="product-actions">
              <a href="#" class="btn-outline-gold">Customize</a>
              <a href="#" class="btn-outline-emerald">B2B Bulk</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-3">
        <div class="product-card reveal">
          <div class="product-media">
            <span class="product-wishlist"><i class="bi bi-heart"></i></span>
            <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=500&q=75"
              alt="Brass table lamp">
          </div>
          <div class="product-body">
            <div class="product-artisan"><i class="bi bi-patch-check-fill"></i>By Devika Metalworks</div>
            <h5 class="product-title">Hammered Brass Table Lamp</h5>
            <div class="product-price">₹4,800</div>
            <div class="product-actions">
              <a href="#" class="btn-outline-gold">Customize</a>
              <a href="#" class="btn-outline-emerald">B2B Bulk</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-3">
        <div class="product-card reveal">
          <div class="product-media">
            <span class="product-badge">Limited</span>
            <span class="product-wishlist"><i class="bi bi-heart"></i></span>
            <img src="https://images.unsplash.com/photo-1600166898405-da9535204843?auto=format&fit=crop&w=500&q=75"
              alt="Handwoven jute rug">
          </div>
          <div class="product-body">
            <div class="product-artisan"><i class="bi bi-patch-check-fill"></i>By Arif Handloom Co.</div>
            <h5 class="product-title">Jamdani Weave Floor Rug</h5>
            <div class="product-price">₹7,250</div>
            <div class="product-actions">
              <a href="#" class="btn-outline-gold">Customize</a>
              <a href="#" class="btn-outline-emerald">B2B Bulk</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-md-4 col-lg-3">
        <div class="product-card reveal">
          <div class="product-media">
            <span class="product-wishlist"><i class="bi bi-heart"></i></span>
            <img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=500&q=75"
              alt="Carved walnut box">
          </div>
          <div class="product-body">
            <div class="product-artisan"><i class="bi bi-patch-check-fill"></i>By Farhan Woodcraft</div>
            <h5 class="product-title">Carved Walnut Jewellery Box</h5>
            <div class="product-price">₹3,600</div>
            <div class="product-actions">
              <a href="#" class="btn-outline-gold">Customize</a>
              <a href="#" class="btn-outline-emerald">B2B Bulk</a>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="text-center mt-5">
      <a href="#" class="btn-outline-emerald reveal">View Full Collection</a>
    </div>
  </div>
</section>

<!-- =========================================================
     FEATURED ARTISANS — top-rated vendor storefronts
========================================================= -->
<section id="artisans" class="section-pad" style="background:var(--surface-2);">
  <div class="container-wide">
    <div class="section-head mx-auto text-center reveal">
      <span class="eyebrow-tag"><i class="bi bi-award"></i> Featured Artisans</span>
      <h2>The makers behind the marketplace</h2>
      <p class="mx-auto">Top-rated independent vendors, hand-picked for craft quality and reliability — visit
        their storefront to see their full catalogue.</p>
    </div>

    <div class="artisan-grid">
      <div class="artisan-card reveal">
        <img src="https://images.unsplash.com/photo-1536766768598-e09213fdcf22?auto=format&fit=crop&w=500&q=80"
          alt="Meera Devi, blue pottery artisan">
        <span class="artisan-badge"><i class="bi bi-star-fill"></i> 4.9</span>
        <div class="artisan-info">
          <div class="artisan-photo-ring">
            <img src="https://images.unsplash.com/photo-1536766768598-e09213fdcf22?auto=format&fit=crop&w=200&q=80"
              alt="Meera Devi">
          </div>
          <h5 class="artisan-name">Meera Devi</h5>
          <p class="artisan-craft">Blue Pottery Specialist</p>
          <p class="artisan-location"><i class="bi bi-geo-alt"></i> Jaipur, Rajasthan</p>
          <a href="#" class="btn-storefront">View Storefront <i class="bi bi-arrow-up-right"></i></a>
        </div>
      </div>

      <div class="artisan-card reveal">
        <img src="https://images.unsplash.com/photo-1607346256330-dee7af15f7c5?auto=format&fit=crop&w=500&q=80"
          alt="Arif Khan, handloom weaving artisan">
        <span class="artisan-badge"><i class="bi bi-star-fill"></i> 4.8</span>
        <div class="artisan-info">
          <div class="artisan-photo-ring">
            <img src="https://images.unsplash.com/photo-1607346256330-dee7af15f7c5?auto=format&fit=crop&w=200&q=80"
              alt="Arif Khan">
          </div>
          <h5 class="artisan-name">Arif Khan</h5>
          <p class="artisan-craft">Handloom Weaving</p>
          <p class="artisan-location"><i class="bi bi-geo-alt"></i> Santipur, West Bengal</p>
          <a href="#" class="btn-storefront">View Storefront <i class="bi bi-arrow-up-right"></i></a>
        </div>
      </div>

      <div class="artisan-card reveal">
        <img src="https://images.unsplash.com/photo-1584367034980-8ba72c175f4f?auto=format&fit=crop&w=500&q=80"
          alt="Devika Rao, brass casting artisan">
        <span class="artisan-badge"><i class="bi bi-star-fill"></i> 5.0</span>
        <div class="artisan-info">
          <div class="artisan-photo-ring">
            <img src="https://images.unsplash.com/photo-1584367034980-8ba72c175f4f?auto=format&fit=crop&w=200&q=80"
              alt="Devika Rao">
          </div>
          <h5 class="artisan-name">Devika Rao</h5>
          <p class="artisan-craft">Brass Casting & Lighting</p>
          <p class="artisan-location"><i class="bi bi-geo-alt"></i> Moradabad, Uttar Pradesh</p>
          <a href="#" class="btn-storefront">View Storefront <i class="bi bi-arrow-up-right"></i></a>
        </div>
      </div>

      <div class="artisan-card reveal">
        <img src="https://images.unsplash.com/photo-1535270732370-dd3188bab1da?auto=format&fit=crop&w=500&q=80"
          alt="Farhan Ali, woodcraft artisan">
        <span class="artisan-badge"><i class="bi bi-star-fill"></i> 4.9</span>
        <div class="artisan-info">
          <div class="artisan-photo-ring">
            <img src="https://images.unsplash.com/photo-1535270732370-dd3188bab1da?auto=format&fit=crop&w=200&q=80"
              alt="Farhan Ali">
          </div>
          <h5 class="artisan-name">Farhan Ali</h5>
          <p class="artisan-craft">Walnut Woodcraft</p>
          <p class="artisan-location"><i class="bi bi-geo-alt"></i> Saharanpur, Uttar Pradesh</p>
          <a href="#" class="btn-storefront">View Storefront <i class="bi bi-arrow-up-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>





@endsection