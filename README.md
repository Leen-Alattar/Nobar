for creating the project i use 

composer create-project laravel/laravel:8.6.11 nobar-task --prefer-dist

for creating the model /controller and migration i use 

php artisan make:model Companies -mcr 
php artisan make:model Employees -mcr

then to active migration run php artisan migrate 
command to install larvel ui 
 composer require laravel/ui:^3.4 
then run php artisan ui bootstrap

then run npm install
then run npm run dev
then run php artisan ui bootstrap --auth
