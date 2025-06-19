# ⚙️ Custom PHP Framework Core

This is a lightweight PHP MVC framework built from scratch to support rapid development of small-to-medium web applications. Inspired by Laravel, it includes essentials like routing, controllers, views, authentication, validation, middleware and migrations — all in a transparent, extendable structure.

## 📦 Install via Composer

```bash
composer create-project gdev/php-mvc-core my-app
# or, if published:
composer require gdev/php-mvc-core

cp .env.example .env

// Enter database settings into .env e.g.

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=phpmvcframework
DB_USERNAME=root
DB_PASSWORD=
DB_DSN=mysql:host=mysql;port=3306;dbname=phpmvcframework

// Build and 
docker compose build
docker compose up
```

## 🔧 Features

- RESTful routing (GET, POST)
- MVC architecture (Models, Views, Controllers)
- View templates with layouts and partials
- User authentication (register/login)
- Middleware support for request filtering and processing (e.g., authentication, logging)
- Input validation and data sanitization
- Environment configuration with `.env`
- Database connection and query builder
- CLI-based migrations
- Reusable as an installable Composer package

## 🚀 Getting Started

```bash
docker compose build
docker compose up

// Find the docker container ID
docker ps

// Open a shell into docker
docker exec -it <mycontainerid> sh

// Install dependencies
composer install

// Run migrations
php migrations.php
```

Visit: [http://localhost](http://localhost)

## 📁 File Structure

```
/db
/exceptions
/form
/middleware
Application.php
composer.json
Controller.php
README.md
Request.php
Response.php
Router.php
Session.php
UserModel.php
.env.example
```

## 🧱 Built With

- PHP 8+
- Composer
- PSR-4 Autoloading
- Custom-built MVC components

## 📌 Why I Built This

As a PHP/Laravel developer, I wanted to understand the internal mechanics of modern PHP frameworks by creating one from scratch. This project deepened my knowledge of request lifecycles, routing, validation, database abstraction, and MVC architecture.

It also serves as a demonstration of backend design skills, architecture decisions, and Composer packaging — showing what can be achieved without relying on full-stack frameworks.

## ✅ License

MIT
