# projeto-cloud
projeto-cloud++

Project Documentation: Global Project Management System

1. Introduction
This project is a Global Project Management System designed to facilitate project management within a company. Utilizing Laravel for the back-end and Vue.js for the front-end, the system follows an MVC architecture, providing a simple yet effective solution for business managers.

2. Installation Guide
Requirements
Git
PHP
Node.js
MySql

2.1 Steps for Installation

Clone the repository:
-git clone <repository-url>

Start Laravel server:

-cd <project-directory>
-cd backend-projeto-cloud
-php artisan migrate
-php artisan serve

Start Vue server:
-cd frontend-projeto-cloud
-npm run dev

Access the project via the provided vue localhost address.

3. System Overview
The system operates on a straightforward Model-View-Controller (MVC) architecture. Users log in or create an account to access and manage projects within the company.

4. Features and Functionalities
User Authentication: Users can create accounts or log in to manage projects.
Project Listing: Users can view a list of available projects.
Project Management: Users have the ability to edit or delete projects.

5. Challenges Faced
The main challenge during development was encountered in the implementation of the authentication system using Laravel.

6. Usage Guide
Log in or create an account.
Access the project list.
Perform actions such as adding, editing or deleting projects.

7. Future Improvements
Planned improvement for the future includes implementing a robust authentication system to enhance security and user management.

8. Summary and Achievements
The Company Project Management System provides a foundation for project management, aiding business managers in overseeing and handling various projects within the company.