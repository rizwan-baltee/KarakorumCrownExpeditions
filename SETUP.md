# Discover Ghanche - Admin Panel Setup

## Setup Instructions

### 1. Install Dependencies
```bash
composer install
npm install
```

### 2. Environment Configuration
Copy `.env.example` to `.env` and configure your database:
```bash
cp .env.example .env
```

Update database credentials in `.env`:
```
DB_DATABASE=discoverghanchedb
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Generate Application Key
```bash
php artisan key:generate
```

### 4. Run Migrations
```bash
php artisan migrate
```

### 5. Seed Admin User
```bash
php artisan db:seed --class=AdminSeeder
```

### 6. Start Development Server
```bash
php artisan serve
```

## Admin Access

### Admin Login Credentials
- **URL**: `http://localhost:8000/admin/login`
- **Email**: `admin@discoverghanche.com`
- **Password**: `admin123`

### Frontend
- **URL**: `http://localhost:8000/`

## Features

### Admin Panel
✅ Secure admin login system
✅ Dashboard with statistics
✅ Sidebar navigation for:
  - Treks Management
  - Expeditions Management
  - Tours Management
  - Rock Climbing Management
  - Blog Posts Management
  - Gallery Management
  - Settings

### Frontend
✅ Responsive design
✅ Hero carousel
✅ Trek listings
✅ Expedition listings
✅ Tour packages
✅ Blog section
✅ Contact information

## Routes

### Public Routes
- `/` - Homepage
- `/admin/login` - Admin login page

### Admin Routes (Authenticated)
- `/admin/dashboard` - Admin dashboard
- `/admin/logout` - Logout

## Security Note

⚠️ **IMPORTANT**: Change the default admin password after first login!

## Next Steps

1. Create CRUD functionality for Treks
2. Create CRUD functionality for Expeditions
3. Create CRUD functionality for Tours
4. Create CRUD functionality for Rock Climbing
5. Create CRUD functionality for Blog Posts
6. Add image upload functionality
7. Create settings page for contact info and site settings
