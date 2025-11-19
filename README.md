# Tinder Backend API (Laravel)

A backend service similar to Tinder built using **Laravel 12**, providing APIs for:
- Fetching people list
- Like / Dislike functionality
- Listing liked people
- Scheduled task to mark “popular users”
- Swagger API documentation

This project is part of the **Hyperhire PHP Tinder Assignment**.

---

## 🚀 Tech Stack

- **PHP 8.2**
- **Laravel 12**
- **MySQL**
- **Swagger (L5 Swagger)**
- **Laravel Scheduler / Cron**
- **Laravel Seeders**

---

## 📦 Installation & Setup

### 1️⃣ Clone the Repository

    git clone https://github.com/Shailendragautam95/tinder-backend.git
    cd tinder-backend

2️⃣ Install PHP dependencies
    composer install

3️⃣ Create .env
    cp .env.example .env

    Set your DB credentials:

    DB_DATABASE=tinder_app
    DB_USERNAME=root
    DB_PASSWORD=

4️⃣ Generate application key
    php artisan key:generate

5️⃣ Run migrations
    php artisan migrate    

6️⃣ Seed sample data
    php artisan db:seed

7️⃣ Start local server
    php artisan serve

📘 API Documentation (Swagger)

    Generate documentation:

    php artisan l5-swagger:generate

    Access Swagger UI: http://localhost:8000/api/documentation

🔥 API Endpoints
    📌 Get people list
        GET /api/people

    📌 Like a person
        POST /api/like/{id}

    📌 Dislike a person
        POST /api/dislike/{id}

    📌 List liked people
        GET /api/liked  

🕒 Scheduler (Popular Users)
A cron job checks who received many likes.
Run manually:
php artisan check:popular-users

Add cron job:
* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1


🗂 Project Structure
app/
 ├── Console/
 │    └── Commands/CheckPopularUsers.php
 ├── Http/Controllers/
 │    ├── PeopleController.php
 │    └── LikeController.php
 ├── Models/
 │    ├── People.php
 │    └── Like.php

database/
 ├── migrations/
 ├── seeders/PeopleSeeder.php

routes/
 └── api.php


🧪 Testing (Manual + Swagger)
Test endpoints with:

Swagger

Postman

Thunder Client (VSCode)

👤 Author
Shailendra Kumar Gautam
FullStack Developer | Assignment for Hyperhire

📜 License
Open-source for assignment submission.


