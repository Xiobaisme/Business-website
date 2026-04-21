// ============================================
// NOVA Agency — Main JavaScript
// ============================================

document.addEventListener('DOMContentLoaded', () => {

    // ---- Custom Cursor ----
    const cursor = document.getElementById('cursor');
    const follower = document.getElementById('cursorFollower');

    if (cursor && follower) {
        let mouseX = 0, mouseY = 0;
        let followerX = 0, followerY = 0;

        document.addEventListener('mousemove', (e) => {
            mouseX = e.clientX;
            mouseY = e.clientY;
            cursor.style.transform = `translate(${mouseX - 4}px, ${mouseY - 4}px)`;
        });

        const animateFollower = () => {
            followerX += (mouseX - followerX) * 0.12;
            followerY += (mouseY - followerY) * 0.12;
            follower.style.transform = `translate(${followerX - 16}px, ${followerY - 16}px)`;
            requestAnimationFrame(animateFollower);
        };
        animateFollower();

        // Scale on interactive elements
        const interactives = document.querySelectorAll('a, button, .service-card, .portfolio-item, .team-card');
        interactives.forEach(el => {
            el.addEventListener('mouseenter', () => {
                cursor.style.transform += ' scale(2)';
                follower.style.transform += ' scale(1.5)';
                follower.style.borderColor = 'var(--accent)';
            });
            el.addEventListener('mouseleave', () => {
                follower.style.borderColor = 'var(--accent)';
            });
        });
    }

    // ---- Navbar Scroll ----
    const navbar = document.getElementById('navbar');
    const handleScroll = () => {
        if (window.scrollY > 50) {
            navbar?.classList.add('scrolled');
        } else {
            navbar?.classList.remove('scrolled');
        }
    };
    window.addEventListener('scroll', handleScroll);

    // ---- Active Nav Link ----
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');

    const highlightNav = () => {
        let current = '';
        sections.forEach(section => {
            if (window.scrollY >= section.offsetTop - 100) {
                current = section.getAttribute('id');
            }
        });
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    };
    window.addEventListener('scroll', highlightNav);

    // ---- Mobile Nav Toggle ----
    const navToggle = document.getElementById('navToggle');
    const navLinksMenu = document.getElementById('navLinks');
    navToggle?.addEventListener('click', () => {
        navLinksMenu?.classList.toggle('open');
    });

    // Close mobile menu on link click
    navLinksMenu?.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => navLinksMenu.classList.remove('open'));
    });

    // ---- Counter Animation ----
    const counters = document.querySelectorAll('.stat-num');
    const animateCounter = (el) => {
        const target = parseInt(el.dataset.target);
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                el.textContent = target;
                clearInterval(timer);
            } else {
                el.textContent = Math.floor(current);
            }
        }, 16);
    };

    // Trigger on first visibility
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    counters.forEach(c => counterObserver.observe(c));

    // ---- Scroll Fade Animations ----
    const fadeEls = document.querySelectorAll(
        '.service-card, .portfolio-item, .team-card, .testimonial-card, .about-content, .about-visual, .contact-info, .contact-form-wrap'
    );
    fadeEls.forEach(el => el.classList.add('fade-up'));

    const fadeObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, parseInt(entry.target.dataset.delay || 0));
                fadeObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    fadeEls.forEach(el => fadeObserver.observe(el));

    // ---- Portfolio Filter ----
    const filterBtns = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filter = btn.dataset.filter;
            portfolioItems.forEach(item => {
                const show = filter === 'Semua' || item.dataset.category === filter;
                item.style.display = show ? 'block' : 'none';
                item.style.opacity = show ? '1' : '0';
                item.style.transition = 'opacity 0.3s ease';
            });
        });
    });

    // ---- Smooth Scroll for Anchor Links ----
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', (e) => {
            const target = document.querySelector(anchor.getAttribute('href'));
            if (target) {
                e.preventDefault();
                const offset = 80;
                const top = target.getBoundingClientRect().top + window.scrollY - offset;
                window.scrollTo({ top, behavior: 'smooth' });
            }
        });
    });

    // ---- Form Validation Enhancement ----
    const form = document.getElementById('contactForm');
    if (form) {
        const inputs = form.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.addEventListener('blur', () => {
                if (input.required && !input.value.trim()) {
                    input.style.borderColor = '#DC2626';
                } else if (input.type === 'email' && input.value && !/\S+@\S+\.\S+/.test(input.value)) {
                    input.style.borderColor = '#DC2626';
                } else {
                    input.style.borderColor = '';
                }
            });
            input.addEventListener('input', () => {
                input.style.borderColor = '';
            });
        });
    }

    // ---- Marquee pause on hover ----
    const marquee = document.querySelector('.marquee');
    marquee?.addEventListener('mouseenter', () => marquee.style.animationPlayState = 'paused');
    marquee?.addEventListener('mouseleave', () => marquee.style.animationPlayState = 'running');

    console.log('🚀 NOVA Agency — Website loaded successfully');
});
