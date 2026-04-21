# 🚀 NOVA Agency — Professional Business Website (PHP)

> Website bisnis profesional yang dibangun dengan PHP murni, HTML5, CSS3, dan JavaScript vanilla. Tanpa framework berat, ringan dan mudah di-deploy.

![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?style=flat-square&logo=php&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-Modern-1572B6?style=flat-square&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6%2B-F7DF1E?style=flat-square&logo=javascript&logoColor=black)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

---

## 📋 Daftar Isi

- [Fitur](#-fitur)
- [Preview Tampilan](#-preview-tampilan)
- [Teknologi](#-teknologi)
- [Struktur Proyek](#-struktur-proyek)
- [Instalasi](#-instalasi)
- [Konfigurasi](#-konfigurasi)
- [Deploy](#-deploy)
- [Kustomisasi](#-kustomisasi)
- [Kontribusi](#-kontribusi)
- [Lisensi](#-lisensi)

---

## ✨ Fitur

- ✅ **PHP Native** — Tidak memerlukan framework, mudah dimodifikasi
- ✅ **Responsive Design** — Tampil sempurna di semua ukuran layar
- ✅ **Contact Form** — Form kontak dengan validasi PHP & anti-XSS
- ✅ **Custom Cursor** — Animasi kursor interaktif
- ✅ **Smooth Animations** — Fade-in, counter, dan scroll animations
- ✅ **Portfolio Filter** — Filter portofolio berdasarkan kategori
- ✅ **SEO Ready** — Meta tags, Open Graph, dan struktur HTML semantik
- ✅ **Performance** — Tidak ada dependensi eksternal berat, load cepat
- ✅ **Modern UI** — Desain bersih dengan tipografi premium (Google Fonts)
- ✅ **Marquee Clients** — Animasi logo klien infinite scroll
- ✅ **Sticky Navbar** — Navbar transparan yang berubah saat scroll

---

## 👀 Preview Tampilan

### Seksi-seksi yang tersedia:
| Seksi | Deskripsi |
|-------|-----------|
| **Hero** | Headline utama, CTA, dan statistik bisnis |
| **Clients** | Marquee animasi nama klien |
| **About** | Profil perusahaan dan nilai-nilai |
| **Services** | 6 layanan dengan kartu interaktif |
| **Portfolio** | 6 proyek dengan filter kategori |
| **Team** | 4 profil anggota tim |
| **Testimonials** | 3 testimoni klien |
| **Contact** | Form kontak dengan validasi |
| **Footer** | Link navigasi dan sosial media |

---

## 🛠 Teknologi

| Teknologi | Versi | Kegunaan |
|-----------|-------|----------|
| PHP | 7.4+ | Backend, form handling, template |
| HTML5 | - | Struktur semantik |
| CSS3 | - | Styling, animasi, responsive |
| JavaScript | ES6+ | Interaktivitas, animasi scroll |
| Google Fonts | - | Tipografi (Syne + DM Sans) |

> **Tidak ada dependensi npm/composer yang wajib.** Cukup PHP dan web server.

---

## 📁 Struktur Proyek

```
business-website/
├── index.php               # Halaman utama (entry point)
├── includes/
│   └── head.php            # Template <head> HTML
├── assets/
│   ├── css/
│   │   └── style.css       # Semua styling
│   └── js/
│       └── main.js         # JavaScript utama
└── README.md               # Dokumentasi ini
```

---

## 🚀 Instalasi

### Prasyarat
- PHP 7.4 atau lebih baru
- Web server (Apache / Nginx / LiteSpeed)
- (Opsional) SMTP server untuk pengiriman email kontak

### Cara 1: Localhost dengan PHP Built-in Server

```bash
# Clone repository
git clone https://github.com/username/nova-agency-website.git
cd nova-agency-website

# Jalankan PHP built-in server
php -S localhost:8000

# Buka di browser
# http://localhost:8000
```

### Cara 2: XAMPP / Laragon / WAMP

```bash
# Clone ke folder htdocs (XAMPP) atau www (Laragon/WAMP)
cd C:/xampp/htdocs/
git clone https://github.com/username/nova-agency-website.git

# Buka di browser
# http://localhost/nova-agency-website/
```

### Cara 3: Upload ke Hosting

```bash
# Upload semua file ke public_html atau folder domain
# Pastikan index.php ada di root folder
```

---

## ⚙️ Konfigurasi

Edit bagian konfigurasi di awal file `index.php`:

```php
// Konfigurasi Situs
define('SITE_NAME', 'NOVA Agency');           // Nama perusahaan
define('SITE_TAGLINE', 'Transforming Ideas'); // Tagline
define('SITE_EMAIL', 'hello@namadomainmu.com'); // Email penerima kontak
define('SITE_PHONE', '+62 812-XXXX-XXXX');    // Nomor telepon/WA
define('SITE_ADDRESS', 'Kota, Provinsi, Indonesia'); // Alamat
```

### Konfigurasi Email (Contact Form)

Untuk pengiriman email di production, disarankan menggunakan **PHPMailer** atau **SMTP**:

```bash
# Install PHPMailer via Composer
composer require phpmailer/phpmailer
```

Lalu ganti bagian form handler di `index.php`:

```php
use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'email@gmail.com';
$mail->Password   = 'app_password';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;

$mail->setFrom('noreply@domainmu.com', SITE_NAME);
$mail->addAddress(SITE_EMAIL);
$mail->Subject = "Pesan dari $name";
$mail->Body    = $message;
$mail->send();
```

---

## 🌐 Deploy

### Deploy ke Shared Hosting (cPanel)
1. Compress semua file menjadi `.zip`
2. Upload via **File Manager** cPanel ke `public_html`
3. Extract file
4. Pastikan `index.php` ada di root

### Deploy ke VPS (Ubuntu + Nginx)

```bash
# Install Nginx & PHP
sudo apt update
sudo apt install nginx php8.1-fpm php8.1-common -y

# Clone repo
cd /var/www/html
git clone https://github.com/username/nova-agency-website.git

# Set permission
sudo chown -R www-data:www-data /var/www/html/nova-agency-website
sudo chmod -R 755 /var/www/html/nova-agency-website

# Konfigurasi Nginx
sudo nano /etc/nginx/sites-available/novaagency
```

Isi konfigurasi Nginx:

```nginx
server {
    listen 80;
    server_name domainmu.com www.domainmu.com;
    root /var/www/html/nova-agency-website;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

```bash
# Aktifkan konfigurasi
sudo ln -s /etc/nginx/sites-available/novaagency /etc/nginx/sites-enabled/
sudo nginx -t && sudo systemctl reload nginx
```

### SSL dengan Let's Encrypt

```bash
sudo apt install certbot python3-certbot-nginx -y
sudo certbot --nginx -d domainmu.com -d www.domainmu.com
```

---

## 🎨 Kustomisasi

### Mengganti Warna Tema

Edit CSS variables di `assets/css/style.css`:

```css
:root {
    --primary: #0A0A0F;       /* Warna utama (teks, footer) */
    --accent: #FF4D6D;         /* Warna aksen (merah muda) */
    --accent2: #4D9FFF;        /* Warna aksen 2 (biru) */
    --bg: #FAFAFA;             /* Background utama */
    --bg2: #F3F4F6;            /* Background sekunder */
}
```

### Mengganti Konten

Semua konten seperti nama layanan, tim, portofolio, dan testimoni dapat diubah langsung di `index.php` melalui array PHP:

```php
// Contoh: menambah layanan baru
$services = [
    ['🌐', 'Nama Layanan', 'Deskripsi layanan Anda.', ['Tag1', 'Tag2'], '#F0F8FF'],
    // tambah lebih...
];
```

### Mengganti Font

Font diimport di `includes/head.php`. Ganti dengan font pilihan dari [Google Fonts](https://fonts.google.com):

```php
<link href="https://fonts.googleapis.com/css2?family=NamaFont:wght@400;700&display=swap" rel="stylesheet">
```

Lalu update variable di CSS:
```css
:root {
    --font-display: 'NamaFont', sans-serif;
}
```

---

## 🔒 Keamanan

Fitur keamanan yang sudah diimplementasi:

- ✅ `htmlspecialchars()` pada semua input form (XSS prevention)
- ✅ `filter_var()` untuk validasi email
- ✅ Method check `$_SERVER['REQUEST_METHOD']` sebelum proses form
- ✅ Tidak ada SQL (tidak menggunakan database, tidak ada SQL injection risk)

Untuk keamanan tambahan di production:
```php
// Tambahkan di .htaccess
Header always set X-Content-Type-Options nosniff
Header always set X-Frame-Options DENY
Header always set X-XSS-Protection "1; mode=block"
```

---

## 📦 Pengembangan Lebih Lanjut

Ide untuk pengembangan selanjutnya:
- [ ] Integrasi database MySQL untuk portofolio dinamis
- [ ] Panel admin sederhana untuk kelola konten
- [ ] Blog/artikel dengan PHP + MySQL
- [ ] WhatsApp Business API integration
- [ ] Google Analytics / Meta Pixel integration
- [ ] Multi-bahasa (ID/EN)
- [ ] Dark mode toggle
- [ ] Cookie consent banner

---

## 🤝 Kontribusi

Kontribusi sangat disambut! Langkah-langkahnya:

1. **Fork** repository ini
2. Buat branch baru: `git checkout -b fitur/nama-fitur`
3. Commit perubahan: `git commit -m 'Tambah fitur nama-fitur'`
4. Push ke branch: `git push origin fitur/nama-fitur`
5. Buat **Pull Request**

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

```
MIT License — Bebas digunakan, dimodifikasi, dan didistribusikan
dengan tetap mencantumkan atribusi ke penulis asli.
```

---

## 👤 Author

**NOVA Agency**
- Website: [novaagency.com](https://novaagency.com)
- Email: hello@novaagency.com
- GitHub: [@novaagency](https://github.com/novaagency)
- Instagram: [@novaagency.id](https://instagram.com/novaagency.id)

---

<p align="center">
  Dibuat dengan ❤️ oleh <strong>NOVA Agency</strong> — Jakarta, Indonesia
</p>
