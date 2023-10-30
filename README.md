# Project Documentation: Global Project Management System

## 1. Introduction

This project is a Company Project Management System designed to facilitate project management within a company. Utilizing Laravel for the back-end and Vue.js for the front-end, the system follows an MVC architecture, providing a simple yet effective solution for business managers.

## 2. Installation Guide

### Requirements
- Git
- PHP
- Node.js
- MySQL

### Steps for Installation

1. Create a MySQL database named "db_backend_projeto_cloud".

2. Clone the repository:
   ```
   git clone <repository-url>
   ```

3. Configure the database settings in the `.env` file of the Laravel project.

4. Run database migrations:
   ```
   php artisan migrate
   ```

5. Start Laravel server:
   ```
   cd <backend-projeto-cloud>
   php artisan serve
   ```

6. Start Vue server:
   ```
   cd <frontend-projeto-cloud>
   npm run dev
   ```

7. Access the project via the provided localhost address.

## 3. System Overview

The system operates on a straightforward Model-View-Controller (MVC) architecture. Users log in or create an account to access and manage projects within the company.

## 4. Features and Functionalities

- **User Authentication**: Users can create accounts or log in to manage projects securely.
- **Project Listing**: Users can view a list of available projects.
- **Project Management**: Users have the ability to edit or delete projects.

## 5. Usage Guide

1. Log in or create an account.
2. Access the project list.
3. Perform actions such as editing or deleting projects.

### Important Note:
- **Session Duration**: For security reasons, users will be logged out automatically after 12 minutes of inactivity.

## 6. Future Improvements

Planned improvement for the future includes enhancing the user interface and implementing additional features for project collaboration and tracking.

## 7. Summary and Achievements

The Company Project Management System provides a foundation for project management, aiding business managers in overseeing and handling various projects within the company.

---
