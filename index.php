<?php
// Configuration
define('SITE_NAME', 'NOVA Agency');
define('SITE_TAGLINE', 'Transforming Ideas Into Digital Excellence');
define('SITE_EMAIL', 'hello@novaagency.com');
define('SITE_PHONE', '+62 812-3456-7890');
define('SITE_ADDRESS', 'Jakarta Selatan, Indonesia');

// Simple contact form handler
$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form'])) {
    $name    = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email   = htmlspecialchars(trim($_POST['email'] ?? ''));
    $service = htmlspecialchars(trim($_POST['service'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if (empty($name) || empty($email) || empty($message)) {
        $error_message = 'Mohon lengkapi semua field yang wajib diisi.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Format email tidak valid.';
    } else {
        // In production, use PHPMailer or similar
        $to      = SITE_EMAIL;
        $subject = "Pesan Baru dari $name — " . SITE_NAME;
        $body    = "Nama: $name\nEmail: $email\nLayanan: $service\n\nPesan:\n$message";
        $headers = "From: $email\r\nReply-To: $email";

        if (mail($to, $subject, $body, $headers)) {
            $success_message = 'Pesan Anda berhasil dikirim! Kami akan menghubungi Anda segera.';
        } else {
            $error_message = 'Gagal mengirim pesan. Silakan coba lagi atau hubungi kami langsung.';
        }
    }
}

include 'includes/head.php';
?>

<body>
    <!-- Cursor -->
    <div class="cursor" id="cursor"></div>
    <div class="cursor-follower" id="cursorFollower"></div>

    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="#home" class="nav-logo">
                <span class="logo-mark">N</span>
                <span class="logo-text">OVA</span>
            </a>
            <ul class="nav-links" id="navLinks">
                <li><a href="#home" class="nav-link active">Beranda</a></li>
                <li><a href="#about" class="nav-link">Tentang</a></li>
                <li><a href="#services" class="nav-link">Layanan</a></li>
                <li><a href="#portfolio" class="nav-link">Portofolio</a></li>
                <li><a href="#team" class="nav-link">Tim</a></li>
                <li><a href="#contact" class="nav-link">Kontak</a></li>
            </ul>
            <a href="#contact" class="nav-cta">Mulai Proyek</a>
            <button class="nav-toggle" id="navToggle" aria-label="Toggle menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-bg">
            <div class="hero-grid"></div>
            <div class="hero-orb orb-1"></div>
            <div class="hero-orb orb-2"></div>
            <div class="hero-orb orb-3"></div>
        </div>
        <div class="hero-content">
            <div class="hero-badge">
                <span class="badge-dot"></span>
                Tersedia untuk Proyek Baru
            </div>
            <h1 class="hero-title">
                <span class="title-line">Transforming</span>
                <span class="title-line accent">Ideas Into</span>
                <span class="title-line">Excellence</span>
            </h1>
            <p class="hero-desc">Kami adalah agensi digital terdepan yang menghadirkan solusi kreatif — dari desain web memukau hingga strategi pemasaran digital yang menghasilkan pertumbuhan nyata.</p>
            <div class="hero-actions">
                <a href="#portfolio" class="btn btn-primary">Lihat Karya Kami <span class="btn-arrow">→</span></a>
                <a href="#contact" class="btn btn-outline">Konsultasi Gratis</a>
            </div>
            <div class="hero-stats">
                <div class="stat">
                    <span class="stat-num" data-target="150">0</span><span>+</span>
                    <span class="stat-label">Klien Puas</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat">
                    <span class="stat-num" data-target="320">0</span><span>+</span>
                    <span class="stat-label">Proyek Selesai</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat">
                    <span class="stat-num" data-target="8">0</span><span>+</span>
                    <span class="stat-label">Tahun Pengalaman</span>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="mockup-frame">
                <div class="mockup-bar">
                    <span></span><span></span><span></span>
                </div>
                <div class="mockup-body">
                    <div class="mockup-row tall accent-bg"></div>
                    <div class="mockup-cols">
                        <div class="mockup-col"></div>
                        <div class="mockup-col dark"></div>
                    </div>
                    <div class="mockup-row short"></div>
                    <div class="mockup-row mid accent-bg2"></div>
                </div>
            </div>
            <div class="floating-card card-1">
                <span class="fc-icon">🚀</span>
                <div>
                    <strong>Project Launch</strong>
                    <small>Sukses diluncurkan</small>
                </div>
            </div>
            <div class="floating-card card-2">
                <span class="fc-icon">📈</span>
                <div>
                    <strong>+240% Traffic</strong>
                    <small>Pertumbuhan organik</small>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <span>Scroll</span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <!-- Clients Marquee -->
    <section class="clients">
        <div class="marquee-wrapper">
            <div class="marquee">
                <?php
                $clients = ['Tokopedia', 'Gojek', 'Bukalapak', 'Traveloka', 'OVO', 'Blibli', 'Shopee', 'Lazada', 'Grab', 'Dana'];
                foreach ($clients as $c) {
                    echo "<span class='client-name'>$c</span><span class='client-sep'>✦</span>";
                }
                foreach ($clients as $c) {
                    echo "<span class='client-name'>$c</span><span class='client-sep'>✦</span>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about section" id="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-visual">
                    <div class="about-img-wrap">
                        <div class="about-img-block main-block">
                            <div class="img-placeholder gradient-1">
                                <span>🏢</span>
                            </div>
                        </div>
                        <div class="about-img-block sub-block">
                            <div class="img-placeholder gradient-2">
                                <span>💡</span>
                            </div>
                        </div>
                        <div class="experience-badge">
                            <strong>8+</strong>
                            <span>Tahun<br>Pengalaman</span>
                        </div>
                    </div>
                </div>
                <div class="about-content">
                    <div class="section-tag">Tentang Kami</div>
                    <h2 class="section-title">Kami Adalah Tim Kreatif Yang Berdedikasi</h2>
                    <p class="about-text">NOVA Agency berdiri sejak 2016 dengan visi menghadirkan solusi digital berkualitas tinggi untuk bisnis Indonesia. Kami percaya bahwa setiap brand punya cerita unik yang layak diceritakan dengan cara yang luar biasa.</p>
                    <p class="about-text">Tim kami terdiri dari desainer, developer, dan strategi pemasaran yang berpengalaman, bersatu untuk membantu bisnis Anda tumbuh di era digital.</p>
                    <div class="about-values">
                        <?php
                        $values = [
                            ['🎯', 'Hasil Terukur', 'Setiap keputusan berbasis data dan ROI yang jelas'],
                            ['🤝', 'Kolaboratif', 'Kami bekerja bersama Anda, bukan hanya untuk Anda'],
                            ['⚡', 'Inovatif', 'Solusi terdepan menggunakan teknologi terkini'],
                        ];
                        foreach ($values as $v) {
                            echo "<div class='value-item'>
                                <span class='value-icon'>{$v[0]}</span>
                                <div>
                                    <strong>{$v[1]}</strong>
                                    <p>{$v[2]}</p>
                                </div>
                            </div>";
                        }
                        ?>
                    </div>
                    <a href="#contact" class="btn btn-primary">Kenali Lebih Lanjut <span class="btn-arrow">→</span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services section" id="services">
        <div class="container">
            <div class="section-header">
                <div class="section-tag">Layanan Kami</div>
                <h2 class="section-title">Solusi Digital Lengkap<br>Untuk Bisnis Anda</h2>
                <p class="section-desc">Dari konsep hingga peluncuran, kami menangani semua aspek kehadiran digital bisnis Anda.</p>
            </div>
            <div class="services-grid">
                <?php
                $services = [
                    ['🌐', 'Web Development', 'Website profesional yang cepat, responsif, dan dioptimalkan untuk konversi. Dibangun dengan teknologi terkini.', ['PHP/Laravel', 'React/Vue', 'WordPress', 'E-Commerce'], '#E8F4FF'],
                    ['📱', 'Mobile App', 'Aplikasi mobile iOS & Android yang intuitif dan berperforma tinggi untuk mengembangkan bisnis Anda.', ['Flutter', 'React Native', 'iOS Native', 'Android Native'], '#F0F8FF'],
                    ['🎨', 'UI/UX Design', 'Desain antarmuka yang indah dan user-friendly yang meningkatkan pengalaman pengguna dan konversi.', ['Figma', 'Prototyping', 'User Research', 'Brand Design'], '#FFF8F0'],
                    ['📊', 'Digital Marketing', 'Strategi pemasaran digital terintegrasi untuk meningkatkan visibilitas dan pertumbuhan bisnis Anda.', ['SEO/SEM', 'Social Media', 'Email Marketing', 'Analytics'], '#F0FFF4'],
                    ['☁️', 'Cloud Solutions', 'Infrastruktur cloud yang skalabel, aman, dan efisien untuk mendukung operasional bisnis modern.', ['AWS/GCP', 'DevOps', 'CI/CD', 'Security'], '#FFF0F8'],
                    ['🤖', 'AI Integration', 'Integrasikan kecerdasan buatan ke dalam bisnis Anda untuk otomatisasi dan efisiensi yang lebih tinggi.', ['ChatBot', 'ML Models', 'Data Analysis', 'Automation'], '#F8F0FF'],
                ];
                foreach ($services as $i => $s) {
                    $delay = $i * 100;
                    echo "<div class='service-card' data-delay='$delay' style='--card-bg:{$s[4]}'>
                        <div class='service-icon'>{$s[0]}</div>
                        <h3 class='service-title'>{$s[1]}</h3>
                        <p class='service-desc'>{$s[2]}</p>
                        <ul class='service-tags'>";
                    foreach ($s[3] as $tag) {
                        echo "<li>$tag</li>";
                    }
                    echo "</ul>
                        <a href='#contact' class='service-link'>Pelajari Lebih →</a>
                    </div>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="portfolio section" id="portfolio">
        <div class="container">
            <div class="section-header">
                <div class="section-tag">Portofolio</div>
                <h2 class="section-title">Karya Terbaik Kami</h2>
                <p class="section-desc">Proyek-proyek yang membuktikan komitmen kami terhadap kualitas dan inovasi.</p>
            </div>
            <div class="portfolio-filter">
                <?php
                $filters = ['Semua', 'Web', 'Mobile', 'Branding', 'Marketing'];
                foreach ($filters as $f) {
                    $active = $f === 'Semua' ? 'active' : '';
                    echo "<button class='filter-btn $active' data-filter='$f'>$f</button>";
                }
                ?>
            </div>
            <div class="portfolio-grid">
                <?php
                $projects = [
                    ['E-Commerce Platform', 'Web Development + UI/UX', 'Web', 'gradient-p1', '+180% Konversi'],
                    ['Fintech Mobile App', 'Mobile App Development', 'Mobile', 'gradient-p2', '50K+ Downloads'],
                    ['Brand Identity System', 'Branding + Design', 'Branding', 'gradient-p3', 'Rebranding Sukses'],
                    ['Restaurant Chain Portal', 'Web + Digital Marketing', 'Marketing', 'gradient-p4', '+300% Traffic'],
                    ['Healthcare Dashboard', 'Web Development', 'Web', 'gradient-p5', '99.9% Uptime'],
                    ['Travel Booking App', 'Mobile + Backend', 'Mobile', 'gradient-p6', '4.8★ Rating'],
                ];
                foreach ($projects as $p) {
                    echo "<div class='portfolio-item' data-category='{$p[2]}'>
                        <div class='portfolio-img {$p[3]}'>
                            <div class='portfolio-overlay'>
                                <span class='portfolio-result'>{$p[4]}</span>
                                <a href='#contact' class='portfolio-btn'>Lihat Detail</a>
                            </div>
                        </div>
                        <div class='portfolio-info'>
                            <h3>{$p[0]}</h3>
                            <span>{$p[1]}</span>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team section" id="team">
        <div class="container">
            <div class="section-header">
                <div class="section-tag">Tim Kami</div>
                <h2 class="section-title">Orang-Orang Di Balik Karya Kami</h2>
            </div>
            <div class="team-grid">
                <?php
                $team = [
                    ['Rizky Pratama', 'CEO & Creative Director', '🧑‍💼', 'Berpengalaman 10+ tahun di industri digital'],
                    ['Sari Dewi', 'Lead UI/UX Designer', '👩‍🎨', 'Spesialis desain konversi & user experience'],
                    ['Budi Santoso', 'Full Stack Developer', '👨‍💻', 'Expert PHP, Laravel, React, & Cloud'],
                    ['Maya Putri', 'Digital Marketing Lead', '👩‍💼', 'Strategi SEO & Growth Hacking specialist'],
                ];
                foreach ($team as $t) {
                    echo "<div class='team-card'>
                        <div class='team-avatar'>{$t[2]}</div>
                        <h3 class='team-name'>{$t[0]}</h3>
                        <span class='team-role'>{$t[1]}</span>
                        <p class='team-bio'>{$t[3]}</p>
                        <div class='team-socials'>
                            <a href='#' aria-label='LinkedIn'>in</a>
                            <a href='#' aria-label='Twitter'>𝕏</a>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials section">
        <div class="container">
            <div class="section-header">
                <div class="section-tag">Testimoni</div>
                <h2 class="section-title">Apa Kata Klien Kami</h2>
            </div>
            <div class="testimonials-grid">
                <?php
                $testimonials = [
                    ['NOVA Agency benar-benar mengubah bisnis kami. Traffic website naik 300% dalam 3 bulan pertama!', 'Ahmad Fauzi', 'CEO, TechStart Indonesia', '⭐⭐⭐⭐⭐'],
                    ['Tim yang profesional dan responsif. Desain website kami sekarang jauh lebih modern dan konversinya meningkat signifikan.', 'Rina Kurnia', 'Marketing Manager, Retail Corp', '⭐⭐⭐⭐⭐'],
                    ['Aplikasi mobile yang mereka buat mendapat rating 4.8 di Play Store. Sangat puas dengan hasilnya!', 'Dimas Arya', 'Founder, FoodTech ID', '⭐⭐⭐⭐⭐'],
                ];
                foreach ($testimonials as $t) {
                    echo "<div class='testimonial-card'>
                        <div class='testimonial-stars'>{$t[3]}</div>
                        <p class='testimonial-text'>\"{$t[0]}\"</p>
                        <div class='testimonial-author'>
                            <strong>{$t[1]}</strong>
                            <span>{$t[2]}</span>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact section" id="contact">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <div class="section-tag">Hubungi Kami</div>
                    <h2 class="section-title">Siap Memulai<br>Proyek Anda?</h2>
                    <p>Konsultasi gratis, tanpa komitmen. Ceritakan ide Anda dan biarkan kami mewujudkannya.</p>
                    <div class="contact-details">
                        <div class="contact-item">
                            <span class="contact-icon">📧</span>
                            <div>
                                <strong>Email</strong>
                                <a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">📱</span>
                            <div>
                                <strong>WhatsApp</strong>
                                <a href="https://wa.me/6281234567890"><?= SITE_PHONE ?></a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">📍</span>
                            <div>
                                <strong>Lokasi</strong>
                                <span><?= SITE_ADDRESS ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="#" class="social-btn">LinkedIn</a>
                        <a href="#" class="social-btn">Instagram</a>
                        <a href="#" class="social-btn">Twitter</a>
                    </div>
                </div>
                <div class="contact-form-wrap">
                    <?php if ($success_message): ?>
                        <div class="alert alert-success"><?= $success_message ?></div>
                    <?php endif; ?>
                    <?php if ($error_message): ?>
                        <div class="alert alert-error"><?= $error_message ?></div>
                    <?php endif; ?>
                    <form method="POST" class="contact-form" id="contactForm">
                        <input type="hidden" name="contact_form" value="1">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Nama Lengkap *</label>
                                <input type="text" id="name" name="name" placeholder="John Doe" required
                                    value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" id="email" name="email" placeholder="john@company.com" required
                                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="service">Layanan Yang Dibutuhkan</label>
                            <select id="service" name="service">
                                <option value="">Pilih layanan...</option>
                                <option value="web">Web Development</option>
                                <option value="mobile">Mobile App</option>
                                <option value="design">UI/UX Design</option>
                                <option value="marketing">Digital Marketing</option>
                                <option value="cloud">Cloud Solutions</option>
                                <option value="ai">AI Integration</option>
                                <option value="other">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">Ceritakan Proyek Anda *</label>
                            <textarea id="message" name="message" rows="5" placeholder="Deskripsikan kebutuhan dan tujuan bisnis Anda..." required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-full">
                            Kirim Pesan <span class="btn-arrow">→</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="#home" class="nav-logo">
                        <span class="logo-mark">N</span>
                        <span class="logo-text">OVA</span>
                    </a>
                    <p>Agensi digital terpercaya yang membantu bisnis Indonesia berkembang di era digital.</p>
                    <div class="footer-socials">
                        <a href="#" aria-label="LinkedIn">in</a>
                        <a href="#" aria-label="Instagram">ig</a>
                        <a href="#" aria-label="Twitter">𝕏</a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Layanan</h4>
                    <ul>
                        <li><a href="#services">Web Development</a></li>
                        <li><a href="#services">Mobile App</a></li>
                        <li><a href="#services">UI/UX Design</a></li>
                        <li><a href="#services">Digital Marketing</a></li>
                        <li><a href="#services">Cloud Solutions</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Perusahaan</h4>
                    <ul>
                        <li><a href="#about">Tentang Kami</a></li>
                        <li><a href="#portfolio">Portofolio</a></li>
                        <li><a href="#team">Tim</a></li>
                        <li><a href="#contact">Karir</a></li>
                        <li><a href="#contact">Blog</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Kontak</h4>
                    <ul>
                        <li><a href="mailto:<?= SITE_EMAIL ?>"><?= SITE_EMAIL ?></a></li>
                        <li><a href="https://wa.me/6281234567890"><?= SITE_PHONE ?></a></li>
                        <li><?= SITE_ADDRESS ?></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?= date('Y') ?> <?= SITE_NAME ?>. All rights reserved.</p>
                <div class="footer-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>
