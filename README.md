# Céoukonva ?

## Description

This repository is the result of a 24h long hackaton during which, as a team of 4, we had to develop a web application according to one theme : holidays.

We decided to take the funny road and tried to picture ourselves as 'beaufs'. This solution provides a way for beaufs to find the best camping sites regarding their favorites criteria : Johnnny Hallyday or Michel Sardou ? Beer or Ricard ? ...

This project was really challenging because of the little time we had and because this solution is mainly based on JavaScript, a language we did not master. But we learned it the hard way and ended up first place equal with another group.

It uses some cool vendors/libraries such as Gsap, Twig and Grumphp.

## Steps

1. Clone the repo from Github.
2. Run `composer install`.
3. Create _config/db.php_ from _config/db.php.dist_ file and add your DB parameters. Don't delete the _.dist_ file, it must be kept.

```php
define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'your_db_name');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PASSWORD', 'your_db_password');
```

4. Import _database.sql_ in your SQL server, you can do it manually or use the _migration.php_ script which will import a _database.sql_ file.
5. Run the internal PHP webserver with `php -S localhost:8000 -t public/`. The option `-t` with `public` as parameter means your localhost will target the `/public` folder.
6. Go to `localhost:8000` with your favorite browser.

### Windows Users

If you develop on Windows, you should edit you git configuration to change your end of line rules with this command :

`git config --global core.autocrlf true`

## Run it on docker

If you don't know what is docker, skip this chapter. ;)

Otherwise, you probably see, this project is ready to use with docker.

To build the image, go into the project directory and in your CLI type:

```
docker build -t simple-mvc-container .
```

then, run it to open it on your localhot :

```
docker run -i -t --name simple-mvc  -p 80:80 simple-mvc-container
```
