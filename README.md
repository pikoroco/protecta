
# Installation
### Info: If you haven't local development environment jump to local development article.
First create .env file in project directory
First you run this project use this commands.
```php
    composer install
    npm install
    php artisan migrate
    npm run dev
```

## Add fake data to database

If you want to test this project, you can use seeder to create fake data when you run command.

```php
    php artisan db:seed
```
(If everything is up and seeder return with success you have to connect to database and search a user email and use it to log in with user email and password(The password is the password with all fake user))

# Local development

I'm using laradock, so I help how to configure [laradock](https://laradock.io/) and build project in local.

## First create directory structure.
    Project
        data (mysql data diractory)
        laradock
        project_directory

If you create this structure run these next step.
1. Create .env file in laradock directory.
    * Copy .env.example to .env
    * Open .env file and change some parameters.
        * DATA_PATH_HOST=your local project data directory path.
        * COMPOSE_PROJECT_NAME=protecta
        * PHP_VERSION=8.0
2. Create protecta.conf file in laradock/nginx/sites
    * Copy laravel.conf.example to protecta.conf
    * Open protecta.conf and configure
        * change server_name=your local domain name
        * change root (/var/www/project_directory/public)
        * Optional: error and access log file name.
3. Create createdb.sql file in laradock/mysql/docker-entrypoint-initdb.d
    * Copy createdb.sql.example to createdb.sql
    * Open createdb.sql and configure
        * Uncomment two row where see "dev_db_1"
        * Change database name(dev_db_1) like protecta_db

If exists this file you run docker in your pc. (If it doesn't install, download and install. Link  [Docker](https://www.docker.com/products/docker-desktop))

The other important thing is hosts file. Please add your local domain to host file in your pc!

### Running containers
Start required containers 
```
docker-compose up -d mysql nginx php-fpm workspace
```
If containers up use this command.
```
docker-compose exec workspace bash 
cd /project_directory
```
Then back to the installation and run install command.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
