# 1. Clone the project
clone the project
cd laravel-multi-auth

# 2. Install PHP dependencies
composer install

# 3. Copy .env config file and generate app key
cp .env.example .env
php artisan key:generate

# 4. Edit .env and update DB credentials (use your own DB info)
nano .env
# Or use any text editor and update:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=your_database_name
# DB_USERNAME=root
# DB_PASSWORD=

# 5. Create the MySQL database manually (via phpMyAdmin or MySQL CLI)

# 6. Run database migrations and seeders
php artisan migrate --seed

# 7. Install Node dependencies (if using frontend assets)
npm install
npm run dev

# 8. Serve the application
php artisan serve

# 9. Access in your browser
# http://127.0.0.1:8000

# Default login (if using the seeded user):
# Email: test@example.com
# Password: nalla
