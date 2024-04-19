## Laravel & Vue JS Polling System

# Installation

## Create .env file
Copy .env.example to .env

## Generate Key
Run `php artisan key:generate`

## Install dependencies
Run `composer install`

For testing purpose no need to install npm dependencies or run `npm run build` since the project is compiled already.
However, to check code changes install the dependencies.
Run `npm install` and `npm run dev` or `npm run build`

## Run the application
Run `php artisan serve`

## Run web sockets for realtime updates
Run `php artisan reverb:start`
