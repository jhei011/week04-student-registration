# MP03 – Student Registration System

**Course:** ITST 302 – Client-Server Technologies  
**Week:** 4 | **Module:** 1 – Client Requests and Form Processing

---

## 1. Project Title

**Student Registration System** — A Laravel web application that allows students to register online with server-side validation, profile picture upload, flash messages, and MySQL database storage.

---

## 2. Introduction

Modern institutions rely on digital registration systems to collect, validate, and store user information securely. Paper-based registration is error-prone, slow, and difficult to manage at scale.

This project implements a **Student Registration System** using the Laravel PHP framework. It demonstrates how a web server receives a client request, validates the submitted data, stores it in a relational database, and returns a meaningful response — all core concepts in enterprise application development.

**Data validation** is critical because it prevents corrupt, incomplete, or malicious data from entering the system. Without it, databases become unreliable and applications become vulnerable to attacks such as SQL injection and cross-site scripting.

Registration systems are foundational in enterprise software — from university enrollment platforms and hospital patient intake systems to e-commerce account creation and government portals. Every one of these systems must validate input, handle file uploads securely, and provide clear feedback to users.

---

## 3. Objectives

Upon completing this activity, the following learning objectives were accomplished:

- Developed HTML forms using Laravel Blade templates
- Processed client HTTP requests using a Laravel Controller
- Implemented server-side validation using Laravel's built-in validation rules
- Displayed flash messages for successful and failed operations
- Uploaded and securely stored profile pictures using Laravel Storage
- Designed and implemented a relational `students` database table using Laravel Migrations
- Documented the development process using Markdown
- Applied Git version control with meaningful commit messages

---

## 4. Laravel Request Lifecycle

When a student submits the registration form, the request travels through the following stages:

```
Browser (HTTP POST /students)
        │
        ▼
   routes/web.php
   Route::post('/students', [StudentController::class, 'store'])
        │
        ▼
   StudentController@store()
        │
        ▼
   $request->validate([...])
   ┌──────────────────────┐
   │   Validation Check   │
   └──────────┬───────────┘
              │
     Valid?   │
    ┌─────────┴──────────┐
    │ Yes                │ No
    ▼                    ▼
Student::create()   Redirect back
File stored to      with errors
storage/public      (422 response)
    │
    ▼
Redirect to
students.show
with success flash
    │
    ▼
Browser renders
Student Profile Page
```

---

## 5. Validation Rules

| Field            | Rules                                          | Why It Matters |
|------------------|------------------------------------------------|----------------|
| `student_id`     | `required`, `unique:students`                  | Prevents duplicate registrations |
| `first_name`     | `required`, `string`, `max:100`                | Ensures a name is always provided |
| `middle_name`    | `nullable`, `string`, `max:100`                | Optional but sanitized if provided |
| `last_name`      | `required`, `string`, `max:100`                | Ensures a name is always provided |
| `email`          | `required`, `email`, `unique:students`         | Validates format; prevents duplicates |
| `mobile_number`  | `required`, `numeric`, `digits_between:7,15`   | Ensures only digits within valid length |
| `date_of_birth`  | `required`, `date`, `before:today`             | Must be a real past date |
| `gender`         | `required`, `in:Male,Female,Other`             | Restricts to known values |
| `program`        | `required`, `string`, `max:100`                | Must be selected |
| `year_level`     | `required`, `integer`, `between:1,5`           | Restricts to valid academic years |
| `address`        | `required`, `string`, `max:500`                | Ensures contact info is present |
| `profile_picture`| `required`, `image`, `mimes:jpg,jpeg,png`, `max:2048` | Prevents non-image uploads; limits file size |

---

## 6. Database Design

### Entity Relationship Diagram (ERD)

```
┌──────────────────────────────────────────┐
│                 students                 │
├──────────────────────────────────────────┤
│ PK  id               BIGINT UNSIGNED AI  │
│     student_id       VARCHAR(50) UNIQUE  │
│     first_name       VARCHAR(100)        │
│     middle_name      VARCHAR(100) NULL   │
│     last_name        VARCHAR(100)        │
│     email            VARCHAR(255) UNIQUE │
│     mobile_number    VARCHAR(20)         │
│     date_of_birth    DATE                │
│     gender           ENUM(Male,Female,Other) │
│     program          VARCHAR(100)        │
│     year_level       TINYINT             │
│     address          TEXT                │
│     profile_picture  VARCHAR(255)        │
│     created_at       TIMESTAMP NULL      │
│     updated_at       TIMESTAMP NULL      │
└──────────────────────────────────────────┘
```

- **Primary Key:** `id` — auto-incrementing integer
- **Unique Constraints:** `student_id`, `email`
- **Nullable:** `middle_name`, `created_at`, `updated_at`

---

## 7. Registration Flowchart

```
User Opens Registration Page (GET /)
              │
              ▼
        Fill Out Form
              │
              ▼
     Submit Registration (POST /students)
              │
              ▼
      Laravel Validation
     ┌────────────────────┐
     │   Is data valid?   │
     └────────┬───────────┘
              │
      Yes ────┤──── No
      │               │
      ▼               ▼
Save to Database   Redirect Back
Upload Profile     with Error Messages
Picture            (Form repopulated
      │             via old() helper)
      ▼
Flash Success Message
      │
      ▼
Redirect to Student Profile Page
```

> Diagrams saved in `documentation/` folder.

---

## 8. Screenshots

Screenshots are saved in the `screenshots/` folder:

| File | Description |
|------|-------------|
| `01-registration-form.png` | Registration form page |
| `02-validation-errors.png` | Validation error messages |
| `03-successful-registration.png` | Successful registration |
| `04-flash-message.png` | Flash success message |
| `05-uploaded-profile-picture.png` | Uploaded profile picture |
| `06-database-table.png` | MySQL students table records |
| `07-student-profile.png` | Student profile page |
| `08-project-structure.png` | VS Code project file structure |
| `09-github-repo.png` | GitHub repository page |

---

## 9. Problems Encountered

### Problem 1: Uploaded images not displaying
After uploading a profile picture, the image URL returned a 404 error even though the file was stored correctly.

### Problem 2: Validation errors not repopulating the form
After a failed submission, the form fields were blank instead of showing the previously entered values.

### Problem 3: MySQL connection refused on first run
Running `php artisan migrate` failed with a connection error because the database did not exist yet.

---

## 10. Solutions

### Solution 1: Storage symbolic link missing
The `storage/app/public` directory is not publicly accessible by default. Running `php artisan storage:link` creates a symbolic link from `public/storage` to `storage/app/public`, making uploaded files accessible via URL.

### Solution 2: Using `old()` helper in Blade
Blade's `old('field_name')` helper retrieves the previously submitted value from the session after a failed validation redirect. Adding `value="{{ old('first_name') }}"` to each input field fixed the repopulation issue.

### Solution 3: Creating the database manually
Laravel does not auto-create the MySQL database. The fix was to log into MySQL and run `CREATE DATABASE student_registration;` before running migrations.

---

## 11. Reflection

Building this Student Registration System gave me a deep, practical understanding of how web applications handle user input from the moment a form is submitted to the moment data is safely stored in a database.

**The importance of validation** became immediately clear during development. Without it, any user could submit empty fields, invalid email addresses, or even malicious scripts. Laravel's validation layer acts as a gatekeeper — it inspects every piece of incoming data before it ever touches the database. This is not just a convenience feature; it is a fundamental security requirement for any production application.

**Handling user input responsibly** means never trusting what the client sends. I learned that client-side validation (JavaScript) can be bypassed by anyone with basic browser developer tools. Server-side validation, which runs on the web server and cannot be circumvented by the user, is the only reliable line of defense. Laravel makes this straightforward with its expressive rule syntax, but the underlying principle applies to every web framework and language.

**File security** was another major lesson. Allowing users to upload files introduces significant risk — a malicious user could attempt to upload a PHP script disguised as an image. Laravel's `image` and `mimes` validation rules ensure only legitimate image files are accepted. Storing files outside the public web root (in `storage/app/public`) and serving them through a controlled symbolic link adds another layer of protection, preventing direct execution of uploaded files.

**Flash messages** taught me about the importance of user experience in enterprise systems. A registration system that silently fails or succeeds leaves users confused. Clear, immediate feedback — whether a green success banner or a red error list — is essential for usability and trust.

**Registration systems in the real world** are far more complex than this project, but they are built on exactly these same foundations. University enrollment systems, hospital patient portals, banking onboarding flows, and government e-services all require validated forms, secure file handling, database persistence, and meaningful user feedback. Understanding how these pieces fit together in Laravel gives me a transferable mental model for building any data-driven web application.

This project also reinforced the value of **Git version control**. Committing work in logical, well-named increments creates a clear history of decisions and makes it easy to revert mistakes. These habits are expected of professional developers and are something I will carry into every future project.

---

## 12. References

Laravel LLC. (2024). *Laravel 11.x documentation*. https://laravel.com/docs

PHP Group. (2024). *PHP manual*. https://www.php.net/manual/en/

Oracle Corporation. (2024). *MySQL 8.0 reference manual*. https://dev.mysql.com/doc/refman/8.0/en/

Tailwind Labs. (2024). *Tailwind CSS documentation*. https://tailwindcss.com/docs

Mozilla Developer Network. (2024). *HTML: HyperText Markup Language*. https://developer.mozilla.org/en-US/docs/Web/HTML

---

## Setup Instructions

```bash
git clone https://github.com/<your-username>/week04-student-registration.git
cd week04-student-registration

composer install
cp .env.example .env
php artisan key:generate
```

Create the MySQL database:
```sql
CREATE DATABASE student_registration;
```

Update `.env` with your DB credentials, then:
```bash
php artisan migrate
php artisan storage:link
php artisan serve
```

Visit `http://localhost:8000`
