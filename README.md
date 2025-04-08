# kunjaw-modul3-ppl

1. Lakukan clone proyek pada device kalian masing masing git clone <link repository>

2. composer update

3. duplikatkan file .env.example lalu duplikasi file tersebut direname menjadi .env
Sesuaikan variabel APP_URL di file .env dengan port server kalian (contoh: http://localhost:8000 atau http://127.0.0.1:8000)

4. Generate key dengan perintah php artisan key:generate

5. Lakukan penyesuaian database pada .env 
contoh: 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=7000
DB_DATABASE=dusklaravel
DB_USERNAME=root
DB_PASSWORD=

6. (praktikan) composer require laravel/dusk --dev 

7. (praktikan) php artisan dusk:install 

8. Migrate database dengan perintah php artisan migrate (asprak = php artisan migrate --seed)

9. Jalankan proyek laravel dengan perintah php artisan serve
