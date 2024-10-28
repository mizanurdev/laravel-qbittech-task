# Laravel 10 Task Management System
## Author
- **Name:** Md. Mizanur Rahman
- **Email:** mizancse2018@gmail.com


## Installation

To set up the project locally, follow these steps:

### 1. Clone the repository:

```bash
git clone https://github.com/mizanurdev/laravel-qbittech-task.git
```
### 2. Navigate to the project directory:
```
cd laravel-qbittech-task
```

### 3. Install dependencies:
```
composer install
npm install
npm run dev
```

### 4. Set up environment configuration:
- Copy the .env.example file and rename it to .env:
```
cp .env.example .env
```
- Update the .env file with your database and other configuration details:
- note: MAIL_USERNAME=(your mailtrap username) MAIL_PASSWORD=(your mailtrap password)
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_qbittech_task
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=cd55d7e9fcbefa (your mailtrap username)
MAIL_PASSWORD=d78d6b12bca2c3 (your mailtrap password)
MAIL_ENCRYPTION=tls
```
### 5. Generate the application key:
```
php artisan key:generate
```
### 6. Set up the database
- Run the migrations to create the necessary tables:
```
php artisan migrate
```
- (Optional) Seed the database with some demo users:
```
php artisan db:seed
```
- (Optional) import sql file to your database:
set database name in env file first
#### 1. For user
- email: user@test.com
- password: 12345678
#### 2. For admin
- email: admin@test.com
- password: 12345678

### 7. Run the application:
```
php artisan serve
```
Now, the application should be running at http://127.0.0.1:8000.


### URLs
- Admin Login: /login
- User Login: /login

After login, each user will be redirected to their respective dashboard.

- Admin Dashboard: /admin/dashboard
- User Dashboard: /dashboard

### Contributing

If you'd like to contribute to this project:

- Fork the repository.
- Create a new branch for your feature or bug fix.
- Make your changes and ensure everything works as expected.
- Submit a pull request for review.

### License
This project is licensed under the MIT License. You are free to use, modify, and distribute the code under the terms of this license.