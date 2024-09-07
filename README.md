Website for a wedding dress rental service,
the websit allow users to browse available dresses ,select dress, make a reservation, view their reservation history,user authentication, update profile and change password.

Setup Instructions :
1- Download project as zip file or use Clone command
2- Install dependencies 
   composer install
3- Copy the example environment file:
   cp .env.example .env
4- Update the DataBase configuration in .env 
5- Create database (Make sure the database name is the same as the DB_DATABASE value in the .env file.)
6- Generate the application key:
   php artisan key:generate
7- Run the migrations:
   php artisan migrate
8- seed the database:
   php artisan db:seed
9- run project:
   php artisan serve
