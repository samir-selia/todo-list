# Todo List Application (Laravel)

This README outlines the steps to create a simple Todo List application using Laravel.

I have recorded a walkthrough of this application [here](https://github.com/samir-selia/todo-list/blob/main/recording.webm)

## Prerequisites

* PHP (>= 8.1)
* Composer
* MySQL

## Installation

1.  **Create Laravel Project:**

    ```bash
    composer create-project laravel/laravel todo-list
    cd todo-list
    ```

2.  **Database Setup:**

    * **Create Database:**

        ```bash
        php artisan mysql:createdb todo
        ```

        (Reference: [https://stackoverflow.com/a/51947389](https://stackoverflow.com/a/51947389))

    * **Configure Database Connection:**

        Update your `.env` file with your database credentials:

        ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=todo
        DB_USERNAME=root
        DB_PASSWORD=
        ```

    * **Create Table Migration:**

        ```bash
        php artisan make:migration create_todos_table
        ```

        Edit the generated migration file (`database/migrations/xxxx_xx_xx_xxxxxx_create_todos_table.php`) to define your `todos` table schema (e.g., `id`, `task`, `is_completed`).

    * **Run Migrations:**

        ```bash
        php artisan migrate
        ```

3.  **Create Model:**

    ```bash
    php artisan make:model Todo
    ```

4.  **Create Controller:**

    ```bash
    php artisan make:controller TodoController --resource
    ```

    The `--resource` flag creates a controller with methods for common CRUD operations (Create, Read, Update, Delete).

    (Reference: [https://laravel.com/docs/11.x/controllers#resource-controllers](https://laravel.com/docs/11.x/controllers#resource-controllers))

## Further Development

After these steps, you can proceed with:

* Implementing the logic in your `TodoController` to handle CRUD operations.
* Creating routes in `routes/web.php` to map URLs to controller actions.
* Building your views to display and interact with the todo list.

