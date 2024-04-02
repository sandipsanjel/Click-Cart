# Click-Cart


## Prerequisites

Before you begin, ensure you have met the following requirements:
- PHP >= 8.1
- Composer installed ([Installation Guide](https://getcomposer.org/doc/00-intro.md))
- MySQL, PostgreSQL, SQLite, or SQL Server
- Node.js and npm installed ([Installation Guide](https://nodejs.org/))

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/sandipsanjel/Click-Cart.git
    ```

2. Navigate to the project directory:
    ```bash
    cd Click-Cart
    ```

3. Install PHP dependencies:
    ```bash
    composer install
    ```

4. Copy the `.env.example` file and rename it to `.env`:
    ```bash
    cp .env.example .env
    ```

5. Generate application key:
    ```bash
    php artisan key:generate
    ```

6. Update the `.env` file with your database credentials and other necessary configurations.

7. Run database migrations and seeders:
    ```bash
    php artisan migrate --seed
    ```

## Usage

To run the Laravel development server, use the following command:
```bash
php artisan serve
