# HealthSys 🏥

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![API First](https://img.shields.io/badge/API_First-Approach-blue?style=for-the-badge)](https://swagger.io)

> Modern healthcare management system for medical professionals

![HealthTrack Pro Dashboard Preview](https://via.placeholder.com/800x400?text=HealthTrack+Pro+Dashboard)

## ✨ Key Features

# 🏥 Basic Health Information System

A clean, API-first system built with **Laravel 12** for managing clients and their health programs (e.g., TB, Malaria, HIV).  
This project was developed as part of a technical screening task.

---

## 📋 Project Requirements

The system allows a doctor (system user) to:
- Create a health program (e.g., TB, Malaria, HIV).
- Register a new client in the system.
- Enroll a client in one or more programs.
- Search for a client.
- View a client’s profile, including enrolled programs.
- Expose the client profile via an API to other systems.

---

## 🚀 Solution Highlights

- **Framework**: Laravel 12 (PHP 8+)
- **Architecture**: API-First Design
- **Security**:
  - Password hashing (bcrypt)
  - Authenticated API access
  - Input validation
- **Dashboard**:
  - Interactive admin dashboard for managing clients and programs
- **Testing**:
  - **PHPUnit** for automated backend tests
  - **Postman** for API endpoint validation
- **Clean Code**: Follows MVC design pattern, Service layer abstraction, and RESTful conventions.
- **Future Ready**: Easily extendable and scalable.

---

## 🛠️ Project Setup

```bash
# Clone the repository
git clone https://github.com/victoroki/health-information-system.git

# Navigate into the project directory
cd health-information-system

# Install dependencies
composer install

# Create environment file
cp .env.example .env

# Configure your database settings in .env
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# (Optional) Seed database
php artisan db:seed

# Serve the application
php artisan serve 
Access your application at http://localhost:8000

Now, **this will end the code block** and ensure the rest of the README continues normally.

 ``` 

---

🗂️ Main Features
Health Program Management: Add, edit, and delete health programs.

Client Management: Register new clients and manage client data.

Program Enrollment: Enroll clients into one or multiple health programs.

Profile Viewing: See full client details including their enrolled programs.

API Access: Securely expose client profiles through API endpoints.

🔌 API Endpoints

Method	Endpoint	Description
POST	/api/programs	Create a new health program
POST	/api/clients	Register a new client
GET	/api/clients	Search for a client
GET	/api/clients/{id}	View a specific client’s profile.

🧪 Testing
✅ PHPUnit


Client registration

Program creations

Run tests:


php artisan test
✅ Postman Collection
Manual API testing was conducted using Postman.



📸 Screenshots
Dashboard

Client Enrollment

Postman API Test



🧹 Clean Commit History
Commits were structured to reflect:

Logical feature additions

Bug fixes

Code improvements

Testing updates

🙏 Acknowledgement
Thank you for the opportunity to work on this challenge. I built the solution independently, ensuring quality, security, and maintainability.

📎 Important Links
[Live Demo]:  https://thoughtless-myranda-okiomerim-c91b6d1c.koyeb.app


![Screenshot 2025-04-26 225319](https://github.com/user-attachments/assets/feabfb96-b397-4be8-b284-a6490e7b1bb8)

GitHub Repository

### 🧠 Author
Victor Mongare
AWS Certified Cloud Practitioner | Backend Developer | DevOps Enthusiast
