# 🐳 Dockerize Laravel — Quick Start Guide

This repository contains a **Dockerized Laravel application** running with **PHP-FPM**, **Nginx**, **MySQL**, and **phpMyAdmin**.

Just **clone the repo**, run a few commands, and start coding 🚀

---

## 🗂 Project Structure

```

laravel-testing/
├── compose.yml
├── nginx/default.conf
├── laravel/
│   ├── Dockerfile
│   ├── .env
│   ├── artisan
│   ├── composer.json
│   ├── package.json
│   ├── public/
│   ├── resources/
│   ├── routes/api.php
│   ├── app/Http/Controllers/MaController.php
│   ├── app/Models/Item.php
│   ├── app/Models/User.php
│   └── ...

````

---

## 🚀 How to Run

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/eggeol/Dockerize-Laravel-tutorial.git
cd Dockerize-Laravel-tutorial
````

---

### 2️⃣ Build and Start Containers

```bash
docker compose up -d --build
```

Once done:

* Laravel App → [http://localhost:8000](http://localhost:8000)
* phpMyAdmin → [http://localhost:8080](http://localhost:8080)

---

### 3️⃣ Install Laravel Dependencies

```bash
docker compose exec php composer install
```

---

### 4️⃣ Generate App Key

```bash
docker compose exec php php artisan key:generate
```

---

### 5️⃣ Run Database Migrations

```bash
docker compose exec php php artisan migrate
```

---

### 6️⃣ (Optional) Fix Permissions

```bash
docker compose exec php sh -c "chown -R www-data:www-data storage bootstrap/cache && chmod -R 775 storage bootstrap/cache"
```

---

## 🧪 Test the API

You can test using **Postman** or **curl**.

| Action          | Method | Endpoint         | Example                              |
| --------------- | ------ | ---------------- | ------------------------------------ |
| Get all items   | GET    | `/api/data`      | `GET http://localhost:8000/api/data` |
| Create new item | POST   | `/api/data`      | Body: `{ "name": "Test Item" }`      |
| Update an item  | PUT    | `/api/data/{id}` | Body: `{ "name": "Updated Item" }`   |
| Delete an item  | DELETE | `/api/data/{id}` | —                                    |

---

## ⚙️ Useful Commands

```bash
docker compose exec php php artisan migrate:fresh   # Reset database
docker compose exec php php artisan tinker          # Laravel Tinker shell
docker compose logs -f nginx                        # View Nginx logs
docker compose down                                 # Stop and remove containers
```

---

## ⚠️ Common Issues

### ❌ 502 Bad Gateway

* Make sure PHP is running: `docker compose logs php`
* Check Nginx config: `nginx/default.conf`

### ❌ Database Connection Error

* Confirm `.env` has `DB_HOST=mysql` and `DB_PORT=3306`
* View MySQL logs: `docker compose logs mysql`

### ❌ phpMyAdmin Login

* Host: `mysql`
* Username: `root`
* Password: `root`

---

## 🧠 Tips

* Never commit `.env` — keep credentials private.
* You can duplicate `.env` as `.env.example` for sharing templates.
* Use `docker compose down -v` to reset everything (including DB).

---

## 📄 Recommended .gitignore

```
/vendor
/node_modules
/.env
/storage/*.key
/public/storage
/.idea
/.vscode
.DS_Store
/mysql_data
```

---

## ✅ Done!

Your Laravel app is ready! 🎉

* App: [http://localhost:8000](http://localhost:8000)
* phpMyAdmin: [http://localhost:8080](http://localhost:8080)

Happy coding 💻
