[INSTALLATION]

1. Unpack the source files.
2. Run "composer install" in the root folder of the project, if there is no "vendor" folder
3. Setup ".env" file with database credentials (host, user, password, database name)
4. Run "php artisan migrate:fresh" in the root folder to create database tables
5. Run "php artisan db:seed" to supply testing data for the application.

[ACCOUNTS]

Email: admin@localhost
Password: admin123