## Mini CRM Project
- Laravel 10 with MySQL as the Database.
- This project utilizes [Larastarters Package from Laravel Daily](https://github.com/LaravelDaily/Larastarters) which is a Laravel Starter Package with Design Themes.
- The Registration from the auth is removed in this project
- UserSeeder is used to add the initial Admin User.
  -  php artisan db:seed --class=UserSeeder
- Hebrew Language is added as a Locale Option which is used to change some messages in the Dashboard as a demonstration.
  - The locale can be changed in the config/app file.
