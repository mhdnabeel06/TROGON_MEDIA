<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# TROGON_MEDIA



# EduHelperAgent – Laravel AI Educational Chatbot

EduHelperAgent is a lightweight Laravel-based AI chatbot created to help school students learn simple topics like **Solar System**, **Fractions**, and **Water Cycle**.

The system uses **LarAgent** + **OpenAI GPT Models** to deliver short, student-friendly answers.

---

## 🚀 Features

- ✔ AI-powered chatbot using **LarAgent**  
- ✔ Supports only specific educational topics  
- ✔ 60-word student-friendly answers  
- ✔ Clean chat UI with Ajax (fetch API)  
- ✔ OpenAI GPT-5-nano model integrated  
- ✔ Error handling (rate limit, invalid key, overloaded AI)

---

## 🗂 Project Structure

```
app/
 ├── AiAgents/
 │    └── EduHelperAgent.php
 ├── Http/
 │    └── Controllers/
 │         └── ChatController.php
resources/
 └── views/
      └── chat.blade.php
routes/
 └── web.php
```

---

## 🔧 Installation

### 1. Clone the project
```bash
git clone your-repo-url
cd my-edu-agent
```

### 2. Install dependencies
```bash
composer install
npm install && npm run build
```

### 3. Copy & configure `.env`
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Add your OpenAI key to `.env`
```
OPENAI_API_KEY=your-key-here
LARAGENT_PROVIDER=default
```

### 5. Clear config cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan config:cache
```

### 6. Start Laravel server
If using Valet:
```bash
valet link
valet secure
```
Or:
```bash
php artisan serve
```

---

## 🤖 How EduHelperAgent Works

EduHelperAgent allows only 3 topics:

- Solar System  
- Fractions  
- Water Cycle  

If the user types something else, the bot replies:

> **I can only help with Solar System, Fractions or Water Cycle 😊**

### Model Used:
`gpt-5-nano`

### Response Limit:
60 words  
(short & easy for students)

---

## 🧠 Code Overview

### **1. Agent Logic**

`app/AiAgents/EduHelperAgent.php`

- Defines allowed topics  
- Defines instructions  
- Sends validated message to OpenAI  

### **2. Controller**

`app/Http/Controllers/ChatController.php`

- Receives AJAX request  
- Sends it to AI agent  
- Returns JSON reply  
- Handles AI errors safely  

### **3. Frontend Chat UI**

`resources/views/chat.blade.php`

- Clean chat interface  
- Uses fetch() to call `/chat`  
- Displays AI replies instantly  

---

## 📡 API Endpoint

### **POST /chat**

#### Request:
```json
{
  "message": "solar system"
}
```

#### Response:
```json
{
  "reply": "The solar system has the Sun at its center..."
}
```

---

## ⚠ Error Handling

EduHelperAgent automatically catches:

| Error | User Message |
|-------|--------------|
| Rate Limit | AI overloaded. Please wait 10 seconds 😊 |
| Invalid API Key | API Error: Incorrect API key |
| Internal AI Error | Something went wrong, please try again |

---

## 🧪 Testing With cURL

```bash
curl -X POST https://your-domain/chat \
  -H "Content-Type: application/json" \
  -d '{"message":"solar system"}'
```

---


## 📝 License
This project is open-source and free to use.

---


