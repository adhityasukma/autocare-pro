# AutoCare Pro - Automotive Landing Page

A modern, responsive automotive landing page with a complete admin panel built using **Laravel 12**, **Bootstrap 5**, and **jQuery**. This project features a dynamic content management system that allows administrators to manage all sections of the landing page through an intuitive admin interface.

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

---

## 📋 Features

### Landing Page
- **Hero Section** - Dynamic carousel slider with multiple slides support
- **Services** - Showcase your automotive services with icons/images
- **About Us** - Company information with image
- **Features** - Highlight key features with icons
- **Testimonials** - Customer testimonials carousel
- **Gallery** - Image gallery with lightbox
- **Contact** - Contact information with Google Maps embed

### Admin Panel
- **Full CRUD Operations** - Manage all landing page sections
- **Bulk Actions** - Delete multiple items, update status in bulk
- **Image Upload** - Upload and manage images for each section
- **Status Toggle** - Enable/disable sections visibility
- **Responsive Design** - Works on desktop and mobile devices

---

## 💻 System Requirements

| Requirement | Version |
|-------------|---------|
| **PHP** | >= 8.2 |
| **Composer** | >= 2.0 |
| **MySQL** | >= 5.7 / MariaDB >= 10.3 |
| **Node.js** | >= 18.0 (optional, for asset compilation) |

### PHP Extensions Required
- BCMath
- Ctype
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO
- Tokenizer
- XML
- GD (for image processing)

---

## 🚀 Installation Guide

### Step 1: Clone the Repository

```bash
git clone https://github.com/YOUR_USERNAME/autocare-pro.git
cd autocare-pro
```

### Step 2: Install PHP Dependencies

```bash
composer install
```

### Step 3: Configure Environment

Copy the example environment file and generate an application key:

```bash
cp .env.example .env
php artisan key:generate
```

### Step 4: Configure Database

Open the `.env` file and update the database configuration:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=automotive_lp
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Step 5: Create Database

Create the database manually in MySQL:

```sql
CREATE DATABASE automotive_lp;
```

Or using command line (MySQL):

```bash
mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS automotive_lp"
```

### Step 6: Run Migrations

```bash
php artisan migrate
```

### Step 7: Seed the Database (Optional)

Populate the database with sample data:

```bash
php artisan db:seed
```

### Step 8: Create Storage Link

Link the storage folder to public:

```bash
php artisan storage:link
```

### Step 9: Start the Development Server

```bash
php artisan serve
```

The application will be available at: `http://localhost:8000`

**Access URLs:**
- **Landing Page**: `http://localhost:8000`
- **Admin Panel**: `http://localhost:8000/admin`
- **Admin Login**: `http://localhost:8000/admin/login`

---

## 🔐 Default Admin Credentials

After seeding the database, use these credentials to access the admin panel:

| Field | Value |
|-------|-------|
| **URL** | `http://localhost:8000/admin/login` |
| **Email** | `admin@automotive.com` |
| **Password** | `password123` |

---

## 📁 Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Admin panel controllers
│   │   ├── Api/            # API controllers
│   │   └── Auth/           # Authentication controllers
│   └── Models/             # Eloquent models
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/            # Database seeders
├── resources/
│   └── views/
│       ├── admin/          # Admin panel views
│       ├── auth/           # Authentication views
│       └── landing/        # Landing page view
├── routes/
│   ├── api.php             # API routes
│   └── web.php             # Web routes
└── storage/
    └── app/public/         # Uploaded files
```

---

## 🛠️ Development

### Running Tests

```bash
php artisan test
```

### Clear Cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

---

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 👨‍💻 Author

**Adhitya Sukma**

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome! Feel free to check the [issues page](https://github.com/YOUR_USERNAME/autocare-pro/issues).

---

## ⭐ Show Your Support

Give a ⭐ if this project helped you!
