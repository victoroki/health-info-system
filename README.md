# HealthSys 🏥

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![API First](https://img.shields.io/badge/API_First-Approach-blue?style=for-the-badge)](https://swagger.io)

> Modern healthcare management system for medical professionals

![HealthTrack Pro Dashboard Preview](https://via.placeholder.com/800x400?text=HealthTrack+Pro+Dashboard)

## ✨ Key Features

### Program Management
- Create specialized health programs (TB, Malaria, HIV, etc.)
- Dynamic program configuration
- Real-time enrollment tracking

### Client Portal
- Secure patient registration system
- Comprehensive profile management
- Multi-program enrollment capabilities

### Intelligent Search
- Instant client lookup
- Filter by program/enrollment status
- Quick-access patient profiles

### Integrated API
- RESTful endpoints for system integration
- JWT-secured data access
- Swagger documentation included

## 🚀 Quick Start

### Prerequisites
- PHP 8.1+
- MySQL 5.7+
- Composer 2.0+

```bash
# Clone repository
git clone https://github.com/your-repo/healthtrack-pro.git && cd healthtrack-pro

# Install dependencies
composer install

# Configure environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate --seed

# Start development server
php artisan serve