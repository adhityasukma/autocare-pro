<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title id="siteTitle">AutoCare Pro - Premium Automotive Services</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" id="siteFavicon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        :root {
            --primary-color: #e63946;
            --secondary-color: #1d3557;
            --accent-color: #f1faee;
            --dark-color: #0d1b2a;
            --gradient-primary: linear-gradient(135deg, var(--primary-color) 0%, #ff6b6b 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        body.no-hero {
            padding-top: 100px;
        }

        /* Navbar */
        .navbar {
            background: transparent;
            transition: all 0.3s ease;
            padding: 1rem 0;
        }

        .navbar.scrolled {
            background: var(--navbar-bg, rgba(29, 53, 87, 0.95));
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: #fff !important;
        }

        .navbar-brand span {
            color: var(--primary-color);
        }

        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        /* Hero Section */
        #hero {
            position: relative;
            overflow: hidden;
            background: var(--secondary-color);
        }

        .hero-swiper {
            width: 100%;
            height: 100vh;
        }

        .hero-slide {
            position: relative;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
        }

        .hero-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(rgba(13, 27, 42, 0.7), rgba(13, 27, 42, 0.7));
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-title span {
            color: var(--primary-color);
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255,255,255,0.8);
            margin-bottom: 2rem;
        }

        .btn-hero {
            background: var(--gradient-primary);
            color: #fff;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(230, 57, 70, 0.4);
            color: #fff;
        }

        .hero-pagination {
            bottom: 30px !important;
        }

        .hero-next, .hero-prev {
            color: #fff !important;
            transition: all 0.3s ease;
        }

        .hero-next:after, .hero-prev:after {
            font-size: 1.5rem !important;
        }

        .hero-next:hover, .hero-prev:hover {
            color: var(--primary-color) !important;
        }

        /* Section Styles */
        .section {
            padding: 100px 0;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .section-subtitle {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 3rem;
        }

        /* Services */
        #services {
            background: #f8f9fa;
        }

        .service-card {
            background: #fff;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
            border: none;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-primary);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: #fff;
        }

        .service-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 1.5rem;
        }

        .service-card h5 {
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        /* About */
        #about {
            background: #fff;
        }

        .about-image {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
        }

        .about-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .stat-box {
            background: var(--gradient-primary);
            color: #fff;
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
        }

        .stat-box h3 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        /* Features */
        #features {
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--dark-color) 100%);
            color: #fff;
        }

        #features .section-title {
            color: #fff;
        }

        #features .section-subtitle {
            color: rgba(255,255,255,0.7);
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: rgba(230, 57, 70, 0.2);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--primary-color);
            flex-shrink: 0;
        }

        .feature-item h5 {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .feature-item p {
            color: rgba(255,255,255,0.7);
            margin: 0;
        }

        /* Testimonials */
        #testimonials {
            background: #f8f9fa;
        }

        .testimonial-card {
            background: #fff;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            height: 100%;
        }

        .testimonial-card .quote-icon {
            font-size: 3rem;
            color: var(--primary-color);
            opacity: 0.3;
            line-height: 1;
        }

        .testimonial-card p {
            font-style: italic;
            color: #555;
            margin: 1rem 0;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .testimonial-author img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .testimonial-author .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
        }

        .testimonial-author h6 {
            margin: 0;
            font-weight: 600;
            color: var(--secondary-color);
        }

        .testimonial-author small {
            color: #888;
        }

        .rating {
            color: #ffc107;
        }

        /* Gallery */
        #gallery {
            background: #fff;
        }

        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            padding: 1.5rem;
            color: #fff;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay h6 {
            margin: 0;
            font-weight: 600;
        }

        .gallery-overlay small {
            opacity: 0.8;
        }

        /* Contact */
        #contact {
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--dark-color) 100%);
            color: #fff;
        }

        #contact .section-title {
            color: #fff;
        }

        #contact .section-subtitle {
            color: rgba(255,255,255,0.7);
        }

        .contact-info {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .contact-info i {
            width: 50px;
            height: 50px;
            background: rgba(230, 57, 70, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-size: 1.25rem;
        }

        .contact-info h6 {
            margin: 0 0 0.25rem;
            font-weight: 600;
        }

        .contact-info p {
            margin: 0;
            color: rgba(255,255,255,0.7);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .social-links a {
            width: 45px;
            height: 45px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-links a:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
        }

        /* Swiper Customization */
        .swiper {
            padding-bottom: 50px !important;
        }

        .swiper-button-next, .swiper-button-prev {
            width: 40px !important;
            height: 40px !important;
            background: #fff;
            border-radius: 50%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            color: var(--primary-color) !important;
        }

        .swiper-button-next:after, .swiper-button-prev:after {
            font-size: 1.2rem !important;
            font-weight: bold;
        }

        .swiper-pagination-bullet-active {
            background: var(--primary-color) !important;
        }

        .testimonials-swiper .swiper-slide, .gallery-swiper .swiper-slide {
            height: auto;
        }
        
        .gallery-item {
            margin-bottom: 0; /* Override for slider */
        }

        .map-container {
            border-radius: 20px;
            overflow: hidden;
            height: 300px;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Footer */
        footer {
            background: var(--dark-color);
            color: rgba(255,255,255,0.7);
            padding: 2rem 0;
            text-align: center;
            margin-top: auto;
        }

        /* Loading */
        .loading-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            border-radius: 8px;
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .section {
                padding: 60px 0;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 767.98px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .navbar-nav {
                background: var(--navbar-bg, var(--secondary-color));
                padding: 1rem;
                border-radius: 10px;
                margin-top: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#"><span>Auto</span>Care Pro</a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list fs-3"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#hero">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#features">Why Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonials">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper" id="heroWrapper">
                <!-- Loaded via AJAX -->
            </div>
            <div class="swiper-pagination hero-pagination"></div>
            <div class="swiper-button-next hero-next"></div>
            <div class="swiper-button-prev hero-prev"></div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="section">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Our Services</h2>
                <p class="section-subtitle">Comprehensive automotive solutions for every need</p>
            </div>
            <div class="row g-4" id="servicesContainer">
                <!-- Loaded via AJAX -->
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="about-image">
                        <img src="https://images.unsplash.com/photo-1487754180451-c456f719a1fc?w=600" alt="About Us" id="aboutImage">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title" id="aboutTitle">About AutoCare Pro</h2>
                    <p class="text-muted mb-4" id="aboutDescription"></p>
                    <p class="mb-4" id="aboutContent"></p>
                    <div class="row g-3" id="aboutStats">
                        <!-- Loaded via AJAX -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="section">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Why Choose Us</h2>
                <p class="section-subtitle">What makes us the best choice for your vehicle</p>
            </div>
            <div class="row" id="featuresContainer">
                <!-- Loaded via AJAX -->
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="section">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">What Our Customers Say</h2>
                <p class="section-subtitle">Real reviews from satisfied customers</p>
            </div>
            <div class="row g-4 d-none" id="testimonialsGrid">
                <!-- Grid fallback if needed -->
            </div>
            <div class="swiper testimonials-swiper">
                <div class="swiper-wrapper" id="testimonialsWrapper">
                    <!-- Loaded via AJAX -->
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="section">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Our Work Gallery</h2>
                <p class="section-subtitle">A showcase of our completed projects</p>
            </div>
            <div class="swiper gallery-swiper">
                <div class="swiper-wrapper" id="galleryWrapper">
                    <!-- Loaded via AJAX -->
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <h2 class="section-title">Get In Touch</h2>
                    <p class="section-subtitle mb-4">Have questions? We're here to help!</p>

                    <div id="contactInfo">
                        <!-- Loaded via AJAX -->
                    </div>

                    <div class="social-links" id="socialLinks">
                        <!-- Loaded via AJAX -->
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="map-container" id="mapContainer">
                        <!-- Map loaded via AJAX -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p class="mb-0" id="footerText">&copy; 2024 AutoCare Pro. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Navbar scroll effect
            $(window).scroll(function() {
                if (!$('#hero').is(':visible') || $(this).scrollTop() > 50) {
                    $('#mainNav').addClass('scrolled');
                } else {
                    $('#mainNav').removeClass('scrolled');
                }
            });

            // Smooth scroll
            $('a[href^="#"]').on('click', function(e) {
                const href = this.getAttribute('href');
                e.preventDefault();

                if (href === '#') {
                    $('html, body').animate({ scrollTop: 0 }, 800);
                    return;
                }

                const target = $(href);
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 70
                    }, 800);
                }
            });

            // Load all data via AJAX
            loadAllData();
        });

        const NO_IMAGE_URL = 'https://placehold.co/600x400?text=No+Image';

        function loadAllData() {
            $.ajax({
                url: '/api/landing/all',
                type: 'GET',
                success: function(data) {
                    renderHero(data.hero);
                    renderServices(data.services);
                    renderAbout(data.about);
                    renderFeatures(data.features);
                    renderTestimonials(data.testimonials);
                    renderGalleries(data.galleries);
                    renderContact(data.contact);
                    renderSettings(data.settings);
                },
                error: function() {
                    console.log('Error loading data');
                }
            });
        }

        function renderHero(heroes) {
            let html = '';
            const section = $('#hero');
            if (heroes && heroes.length > 0) {
                section.show();
                $('body').removeClass('no-hero');
                
                // Toggle display of arrows and pagination
                if (heroes.length > 1) {
                    $('.hero-next, .hero-prev, .hero-pagination').show();
                } else {
                    $('.hero-next, .hero-prev, .hero-pagination').hide();
                }

                heroes.forEach(function(hero) {
                    const bgImage = hero.image ? `/storage/${hero.image}` : 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?w=1600';
                    const buttonHtml = hero.button_text ? `
                        <a href="${hero.button_link || '#'}" class="btn-hero">
                            <span>${hero.button_text}</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>` : '';

                    html += `
                        <div class="swiper-slide">
                            <div class="hero-slide" style="background-image: url('${bgImage}')">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-7 hero-content">
                                            <h1 class="hero-title">${hero.title}</h1>
                                            ${hero.subtitle ? `<p class="hero-subtitle">${hero.subtitle}</p>` : ''}
                                            ${hero.description ? `<p class="text-white-50 mb-4">${hero.description.replace(/\\n/g, '<br>').replace(/\n/g, '<br>')}</p>` : ''}
                                            ${buttonHtml}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#heroWrapper').html(html);

                // Initialize Swiper
                new Swiper('.hero-swiper', {
                    loop: heroes.length > 1,
                    watchOverflow: true,
                    effect: 'fade',
                    fadeEffect: {
                        crossFade: true
                    },
                    autoplay: heroes.length > 1 ? {
                        delay: 6000,
                        disableOnInteraction: false,
                    } : false,
                    pagination: {
                        el: '.hero-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.hero-next',
                        prevEl: '.hero-prev',
                    }
                });
            } else {
                section.hide();
                $('body').addClass('no-hero');
            }
            $(window).trigger('scroll');
        }

        function renderServices(services) {
            let html = '';
            const section = $('#services');
            const navItem = $('a[href="#services"]').parent(".nav-item");
            if (services && services.length > 0) {
                section.show();
                navItem.show();
                services.forEach(function(service) {
                    let mediaHtml = '';
                    if (service.image) {
                        mediaHtml = `<img src="/storage/${service.image}" class="service-image" alt="${service.title}" onerror="this.onerror=null; this.src='${NO_IMAGE_URL}';">`;
                    } else if (service.icon) {
                        mediaHtml = `
                            <div class="service-icon">
                                <i class="bi ${service.icon}"></i>
                            </div>
                        `;
                    }

                    html += `
                        <div class="col-md-6 col-lg-4">
                            <div class="service-card">
                                ${mediaHtml}
                                <h5>${service.title}</h5>
                                <p class="text-muted">${(service.description || '').replace(/\\n/g, '<br>').replace(/\n/g, '<br>')}</p>
                            </div>
                        </div>
                    `;
                });
                $('#servicesContainer').html(html);
            } else {
                section.hide();
                navItem.hide();
            }
        }

        function renderAbout(about) {
            const section = $('#about');
            const navItem = $('a[href="#about"]').parent(".nav-item");

            if (about && about.is_active) {
                section.show().css('display', 'block');
                navItem.show();
                $('#aboutTitle').text(about.title);
                $('#aboutDescription').html((about.description || '').replace(/\\n/g, '<br>').replace(/\n/g, '<br>'));
                $('#aboutContent').html((about.content || '').replace(/\\n/g, '<br>').replace(/\n/g, '<br>'));
                if (about.image) {
                    $('#aboutImage').attr('src', '/storage/' + about.image).attr('onerror', `this.onerror=null; this.src='${NO_IMAGE_URL}';`);
                }

                let statsHtml = '';
                if (about.experience_years) {
                    statsHtml += `
                        <div class="col-4">
                            <div class="stat-box">
                                <h3>${about.experience_years}+</h3>
                                <p class="mb-0">Years</p>
                            </div>
                        </div>
                    `;
                }
                if (about.happy_customers) {
                    statsHtml += `
                        <div class="col-4">
                            <div class="stat-box">
                                <h3>${formatNumber(about.happy_customers)}</h3>
                                <p class="mb-0">Customers</p>
                            </div>
                        </div>
                    `;
                }
                if (about.projects_completed) {
                    statsHtml += `
                        <div class="col-4">
                            <div class="stat-box">
                                <h3>${formatNumber(about.projects_completed)}</h3>
                                <p class="mb-0">Projects</p>
                            </div>
                        </div>
                    `;
                }
                $('#aboutStats').html(statsHtml);
            } else {
                section.hide();
                navItem.hide();
            }
        }

        function renderFeatures(features) {
            let html = '';
            const section = $('#features');
            const navItem = $('a[href="#features"]').parent(".nav-item");

            if (features && features.length > 0) {
                section.show();
                navItem.show();
                features.forEach(function(feature, index) {
                    const delay = index * 100;
                    html += `
                        <div class="col-md-6 col-lg-4" style="animation-delay: ${delay}ms">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="bi ${feature.icon || 'bi-check-lg'}"></i>
                                </div>
                                <div>
                                    <h5>${feature.title}</h5>
                                    <p>${feature.description || ''}</p>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#featuresContainer').html(html);
            } else {
                section.hide();
                navItem.hide();
            }
        }

        function renderTestimonials(testimonials) {
            let html = '';
            const section = $('#testimonials');
            const navItem = $('a[href="#testimonials"]').parent(".nav-item");

            if (testimonials && testimonials.length > 0) {
                section.show();
                navItem.show();
                testimonials.forEach(function(testimonial) {
                    const rating = '★'.repeat(testimonial.rating) + '☆'.repeat(5 - testimonial.rating);

                    html += `
                        <div class="swiper-slide">
                            <div class="testimonial-card h-100">
                                <div class="quote-icon">
                                    <i class="bi bi-quote"></i>
                                </div>
                                <p>${testimonial.content}</p>
                                <div class="testimonial-author">
                                    ${testimonial.image ?
                                        `<img src="/storage/${testimonial.image}" alt="${testimonial.name}" onerror="this.onerror=null; this.src='${NO_IMAGE_URL}';">` :
                                        `<div class="author-avatar">${testimonial.name.charAt(0)}</div>`
                                    }
                                    <div>
                                        <h6>${testimonial.name}</h6>
                                        <small>${testimonial.position || 'Customer'}</small>
                                        <div class="rating fs-6">${rating}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#testimonialsWrapper').html(html);

                // Initialize Swiper
                new Swiper('.testimonials-swiper', {
                    slidesPerView: 1,
                    slidesPerGroup: 1,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                        768: {
                            slidesPerView: 2,
                            slidesPerGroup: 2,
                        },
                        1024: {
                            slidesPerView: 3,
                            slidesPerGroup: 3,
                        },
                    }
                });
            } else {
                section.hide();
                navItem.hide();
            }
        }

        function renderGalleries(galleries) {
            let html = '';
            const section = $('#gallery');
            const navItem = $('a[href="#gallery"]').parent(".nav-item");

            if (galleries && galleries.length > 0) {
                section.show();
                navItem.show();
                galleries.forEach(function(gallery) {
                    html += `
                        <div class="swiper-slide">
                            <div class="gallery-item">
                                <img src="/storage/${gallery.image}" alt="${gallery.title}" onerror="this.onerror=null; this.src='${NO_IMAGE_URL}';">
                                <div class="gallery-overlay">
                                    <h6>${gallery.title}</h6>
                                    <small>${gallery.description || ''}</small>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#galleryWrapper').html(html);

                // Initialize Swiper
                new Swiper('.gallery-swiper', {
                    slidesPerView: 1.2,
                    slidesPerGroup: 1,
                    spaceBetween: 20,
                    loop: true,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                        576: {
                            slidesPerView: 2,
                            slidesPerGroup: 2,
                        },
                        992: {
                            slidesPerView: 3,
                            slidesPerGroup: 3,
                        },
                        1200: {
                            slidesPerView: 4,
                            slidesPerGroup: 4,
                        },
                    }
                });
            } else {
                section.hide();
                navItem.hide();
            }
        }

        function renderContact(contact) {
            const section = $('#contact');
            const navItem = $('a[href="#contact"]').parent(".nav-item");

            if (contact && contact.is_active) {
                section.show().css('display', 'block');
                navItem.show();
                let infoHtml = '';

                if (contact.address) {
                    infoHtml += `
                        <div class="contact-info">
                            <i class="bi bi-geo-alt"></i>
                            <div>
                                <h6>Address</h6>
                                <p>${contact.address.replace(/\\n/g, '<br>').replace(/\n/g, '<br>')}</p>
                            </div>
                        </div>
                    `;
                }

                if (contact.phone) {
                    infoHtml += `
                        <div class="contact-info">
                            <i class="bi bi-telephone"></i>
                            <div>
                                <h6>Phone</h6>
                                <p>${contact.phone}</p>
                            </div>
                        </div>
                    `;
                }

                if (contact.email) {
                    infoHtml += `
                        <div class="contact-info">
                            <i class="bi bi-envelope"></i>
                            <div>
                                <h6>Email</h6>
                                <p>${contact.email}</p>
                            </div>
                        </div>
                    `;
                }

                if (contact.working_hours) {
                    infoHtml += `
                        <div class="contact-info">
                            <i class="bi bi-clock"></i>
                            <div>
                                <h6>Working Hours</h6>
                                <p>${contact.working_hours.replace(/\\n/g, '<br>').replace(/\n/g, '<br>')}</p>
                            </div>
                        </div>
                    `;
                }

                $('#contactInfo').html(infoHtml);

                // Social Links
                let socialHtml = '';
                if (contact.facebook) socialHtml += `<a href="${contact.facebook}" target="_blank"><i class="bi bi-facebook"></i></a>`;
                if (contact.instagram) socialHtml += `<a href="${contact.instagram}" target="_blank"><i class="bi bi-instagram"></i></a>`;
                if (contact.twitter) socialHtml += `<a href="${contact.twitter}" target="_blank"><i class="bi bi-twitter"></i></a>`;
                if (contact.youtube) socialHtml += `<a href="${contact.youtube}" target="_blank"><i class="bi bi-youtube"></i></a>`;
                if (contact.whatsapp) socialHtml += `<a href="https://wa.me/${contact.whatsapp.replace(/[^0-9]/g, '')}" target="_blank"><i class="bi bi-whatsapp"></i></a>`;
                $('#socialLinks').html(socialHtml);

                // Map
                if (contact.map_embed) {
                    $('#mapContainer').html(contact.map_embed);
                }
            } else {
                section.hide();
                navItem.hide();
            }
        }

        function renderSettings(settings) {
            if (settings) {
                if (settings.site_name) {
                    document.title = settings.site_name + ' - Premium Automotive Services';
                    $('.navbar-brand').html('<span>' + settings.site_name.split(' ')[0] + '</span>' + (settings.site_name.split(' ').slice(1).join(' ') || ''));
                }
                if (settings.footer_text) {
                    $('#footerText').text(settings.footer_text);
                }
                if (settings.primary_color) {
                    document.documentElement.style.setProperty('--primary-color', settings.primary_color);
                }
                if (settings.secondary_color) {
                    document.documentElement.style.setProperty('--secondary-color', settings.secondary_color);

                    // Update navbar background with opacity
                    const rgb = hexToRgb(settings.secondary_color);
                    if (rgb) {
                        const rgbaColor = `rgba(${rgb.r}, ${rgb.g}, ${rgb.b}, 0.95)`;
                        document.documentElement.style.setProperty('--navbar-bg', rgbaColor);
                    }
                }
                if (settings.site_logo) {
                    $('.navbar-brand').html(`<img src="/storage/${settings.site_logo}" alt="${settings.site_name || 'Logo'}" height="40" onerror="this.onerror=null; this.src='${NO_IMAGE_URL}';">`);
                } else if (settings.site_name) {
                    $('.navbar-brand').html('<span>' + settings.site_name.split(' ')[0] + '</span>' + (settings.site_name.split(' ').slice(1).join(' ') || ''));
                }
                if (settings.site_favicon) {
                    $('#siteFavicon').attr('href', `/storage/${settings.site_favicon}`);
                    // Note: Favicon fallback is tricky as it's not an img tag, checking strictly might be overkill, sticking to href update.
                }
            }
        }

        function hexToRgb(hex) {
            // Expand shorthand form (e.g. "03F") to full form (e.g. "0033FF")
            const shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
            hex = hex.replace(shorthandRegex, function(m, r, g, b) {
                return r + r + g + g + b + b;
            });

            const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
            return result ? {
                r: parseInt(result[1], 16),
                g: parseInt(result[2], 16),
                b: parseInt(result[3], 16)
            } : null;
        }

        function formatNumber(num) {
            if (num >= 1000) {
                return (num / 1000).toFixed(0) + 'K+';
            }
            return num + '+';
        }
    </script>
</body>
</html>
