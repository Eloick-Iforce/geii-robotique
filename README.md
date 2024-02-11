## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x)

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Install the npm dependencies

    npm install

Compile the assets

    npm run dev

## TODO Before release

-   [ ] Add to Resend account domain name
-   [ ] Activate account verification email when validate in UserContoller
-   [ ] Add Policies to the controllers
