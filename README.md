# symfony3-crud-restapi-auth
Complete Symfony 3 crud sample with crud and rest api with authentification

OK  Symfony 3.1.2 was successfully installed. Now you can:

    * Change your current directory to C:\xampp\htdocs\sample

    * Configure your application in app/config/parameters.yml file.

    * Run your application:
        1. Execute the php bin/console server:run command.
        2. Browse to the http://localhost:8000 URL.

    * Read the documentation at http://symfony.com/doc
    
    
    Don't forget to add Bundle in app/KernelApp.php
    and to add routes in routes.yml 
    app:
    resource: "@PelloInventoryBundle/Controller/"
    type:     annotation
# Set up services
    Don't forget to set services in app/config/services.yml
    # app/config/config.yml
imports:
    - { resource: '@AcmeHelloBundle/Resources/config/services.yml' }
# Prepare from scratch
## Symfony instalation
```
curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
chmod a+x /usr/local/bin/symfony
```
With composer
Check official doc: [https://getcomposer.org/download/]
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '070854512ef404f16bac87071a6db9fd9721da1684cd4589b1196c3faf71b9a2682e2311b36a5079825e155ac7ce150d') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
mv composer.phar /usr/local/bin/composer
```
## Project creation

```
symfony new symfony3-crud-restapi-auth
```

## Bundle creation
```
php bin/console generate:bundle --namespace=Acme/TestBundle
```
## Change cache perm
In var directory with www-data user (apache)
```
chown www-data:www-data var/cache -R
chown www-data:www-data var/sessions -R
chown www-data:www-data var/logs -R
```
You may also try chmod 777

# Run
From console using
```
php bin/console server:run
```

Point to [http://localhost:8000]

# Config db parameters
app/config/parameters.yml


# Install object serializer
You can install the component in 2 different ways:

-Install it via Composer (symfony/serializer on Packagist);
-Use the official Git repository (https://github.com/symfony/serializer).

```
$ composer require symfony/serializer
```

