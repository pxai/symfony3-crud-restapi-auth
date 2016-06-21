# symfony3-crud-restapi-auth
Complete Symfony 3 crud sample with crud and rest api with authentification

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
