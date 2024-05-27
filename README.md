# Learning Management System (LMS) - PHP

## Introduction

Welcome to the Learning Management System (LMS) built with PHP. This system allows users to manage, buy, and sell online courses. The LMS is designed to support three main user roles: Students, Teachers, and Admins. Each role has specific functionalities to ensure smooth operation and an engaging learning experience.

## Features

### Students
* Login: Access the platform securely.
* View Courses: Browse the list of available courses.
* Buy Courses: Purchase courses using integrated payment methods.
* Watch Lessons: Stream course content and lectures.
* Leave Reviews: Provide feedback on completed courses.

### Teachers
* Add Courses: Create and manage new courses.
* View Courses: Access and review their created courses.
* Edit Courses: Update course details and content.
* Add Lectures: Upload and manage lecture content for each course.
* Edit or Update Lectures: Modify existing lectures to keep content current.

### Admin
* View Students' Info: Access detailed information about registered students.
* View Teachers' Info: Review information about the teachers.
* Confirm Payments: Verify and confirm payments for purchased courses.
* Activate or Deactivate Teachers: Manage the activation status of teachers.
* Add Courses on Behalf of Teachers: Create courses for teachers if necessary.
* View Summary Reports: Access summaries of total earnings, number of users, and number of students.

## Installation
Clone the Repository:

~ git clone https://github.com/Victor070656/royal-lms.git

Navigate to the Project Directory:

~ cd lms-php

Database Setup:
Create a new MySQL database.
Import the provided sql file to set up the necessary tables.

Start the Server:

~ php -S localhost:8000

## Usage

### Student Operations
* Register/Login: Navigate to the login page and create an account or log in with existing credentials.

* Browse Courses: Visit the courses section to see available courses.
  
* Purchase a Course: 
Select a course and follow the payment process.

* Access Lessons: After purchase, access course content from your dashboard.

* Leave a Review: Provide feedback for completed courses on the course page.

### Teacher Operations

* Login: Access your account from the login page.

* Create a Course: Navigate to the 'Add Course' section and fill in course details.

* Manage Courses: Use the 'My Courses' section to edit or update course details.

* Add Lectures: Upload lectures to the appropriate course and edit as needed.

### Admin Operations

* Login: Access the admin dashboard via the login page.

* Manage Users: View and manage information on students and teachers.

* Confirm Payments: Verify and approve payments for purchased courses.

* Teacher Management: Activate or deactivate teachers as required.

* Add Courses: Create new courses on behalf of teachers if needed.

* View Reports: Access summary reports for earnings, user counts, and student numbers.
