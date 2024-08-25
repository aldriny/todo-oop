# To-Do List Application

## Overview

The To-Do List Application is a PHP-based web application designed to help users manage their tasks efficiently. It provides a simple and intuitive interface for creating, updating, and tracking tasks. The application leverages modern PHP features along with a MySQL database for data storage.

## Features

- **Task Management**: Create, edit, and delete tasks. Tasks can be categorized into "To Do," "Doing," and "Done" statuses.
- **User-Friendly Interface**: A clean, responsive design built with Bootstrap for a seamless user experience.
- **Validation**: Built-in validation to ensure tasks have required fields and adhere to specified constraints.

## Technologies Used

- **PHP**: Server-side scripting language for application logic.
- **MySQL**: Relational database management system for storing tasks and user data.
- **Bootstrap**: Front-end framework for responsive and modern design.
- **Composer**: Dependency management tool for PHP libraries.
- **PDO**: PHP Data Objects for secure database interactions.

### Prerequisites

- PHP 7.4 or higher
- MySQL
- Composer

### Installation

1. **Clone the repository**:
    ```sh
    git clone https://github.com/aldriny/todo-oop.git
    cd todo-oop
    ```

2. **Install dependencies**:
    ```sh
    composer install
    ```

3. **Set up the database**:

4. **Configure environment variables**:

    ```
    - Edit the `.env` file with your database information:
    ```plaintext
    DB_HOST=localhost
    DB_PORT=3306
    DB_NAME=todo_oop
    DB_USER=root
    DB_PASS=
    ```

5. **Run the application**:
    - Make sure your local server (e.g., XAMPP) is running.
    - Navigate to `http://localhost/todo-oop` in your web browser.
