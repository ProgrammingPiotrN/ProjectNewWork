1. Sklonuj repozytorium
git clone 

git@github.com:ProgrammingPiotrN/ProjectNewWork.git

2. Przejdź do folderu repo

cd Blog

3. Instalacja composer

composer install

4. Wprowadź zmiany konfiguracyjne w pliku .env lub skopiuj przykładową konfigurację

cp .env.example .env

5. Wygeneruj klucz aplikacji

php artisan key:generate

6. Wygeneruj pierwszą migrację

php artisan migrate

7. Uruchom server

php artisan serve


LISTA KOMEND
git clone git@github.com:gothinkster/laravel-realworld-example-app.git
cd laravel-realworld-example-app
composer install
cp .env.example .env
php artisan key:generate
php artisan jwt:generate 


Przed uruchomieniem migracji upewnij się, że ustawiłeś prawidłowe informacje o połączeniu z bazą danych

php artisan migrate
php artisan serve1. 

