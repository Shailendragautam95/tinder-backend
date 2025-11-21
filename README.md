# Tinder Backend (Laravel API)

A Laravel 12.x backend that powers the Tinder-style swipe application.  
This project provides APIs for browsing people, liking/disliking profiles, viewing matches, and running scheduled checks for popular users.

This backend works together with the mobile application:  
👉 **https://github.com/Shailendragautam95/tinder-mobile**

---

## 🚀 Features

### ✔ People API
`GET /people`  
Returns all available profiles excluding:
- already liked profiles  
- disliked profiles  
- matched profiles  

### ✔ Like / Dislike API
`POST /like/{person_id}`  
`POST /dislike/{person_id}`  

Stores each record in the **likes** table using:
- `from_person_id`
- `to_person_id`
- `is_liked` (TRUE/FALSE)

### ✔ Liked Users API  
`GET /liked`  
Returns all profiles liked by the current user.

### ✔ Matches API  
`GET /matches`  
Returns **mutual likes** (A liked B & B liked A).

### ✔ Cron Job (Required by Assignment)
A scheduler automatically checks:
- If any user has received **more than 50 likes**
- It sends an email notification to the admin

Email is sent using **EmailJS**:
- service_id → `service_6fzo6jm`  
- template_id → `template_n4c8k9m`  
- public_key → `0I2JufUykkyF4nAjD`  
- Admin email → `UJJWAL@HYPERHIRE.IN`

The job runs inside:
app/Console/Commands/CheckPopularUsers.php


And is scheduled in:
app/Console/Kernel.php


## 🛠 Tech Stack

| Technology | Purpose |
|-----------|---------|
| **Laravel 12.x** | Main backend framework |
| **MySQL** | Database |
| **EmailJS** | Admin email notifications |
| **Laravel Scheduler** | Cron jobs |
| **Eloquent ORM** | Models & relationships |

---

## 📁 Project Structure

tinder-backend/
│
├── app/
│ ├── Console/
│ │ ├── Commands/CheckPopularUsers.php
│ │ └── Kernel.php
│ ├── Http/
│ │ └── Controllers/
│ ├── Models/
│ │ └── User.php
│ ├── Services/
│ │ └── EmailService.php
│
├── routes/
│ └── api.php
│
├── database/
│ └── migrations/
│
├── composer.json
└── README.md



---

## ▶️ **Setup Instructions**

### 1. Install dependencies
composer install

2. Copy .env file
cp .env.example .env

3. Configure database in .env

DB_DATABASE=tinder_app
DB_USERNAME=root
DB_PASSWORD=

4. Add EmailJS credentials in .env

EMAILJS_SERVICE_ID=service_6fzo6jm
EMAILJS_TEMPLATE_ID=template_n4c8k9m
EMAILJS_PUBLIC_KEY=0I2JufUykkyF4nAjD
ADMIN_EMAIL=UJJWAL@HYPERHIRE.IN

5. Run migrations
php artisan migrate

6. Start server
php artisan serve

7. Start Scheduler (important)
php artisan schedule:work

📡 Available API Routes
Method	    Endpoint	    Description
GET	        /people	        List of profiles
POST	    /like/{id}	    Like user
POST	    /dislike/{id}	Dislike user
GET	        /liked	        List of liked profiles
GET	        /matches	    Mutual matches

All routes are defined in:
routes/api.php

👨‍💻 Developer
Name: Shailendra Gautam
Assignment for Hyperhire