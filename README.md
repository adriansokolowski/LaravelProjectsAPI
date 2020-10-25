Sposób uruchomienia API
```
composer install && npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run prod
php artisan cache:clear
```
