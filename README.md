---Laravel APP---
composer install
php artisan migrate
php artisan db:seed
php artisan passport::install
php artisan serve

and for schedular
 php artisan stock:update-status

---VUE APP---
npm install
npm run dev