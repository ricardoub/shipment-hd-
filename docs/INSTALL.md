# SHIPMENT - steps to create this project

## Create a Laravel 8 project with Jetstream
```
laravel new shipment --jet
0
yes
  
cd shipment

composer install
npm install && npm run dev

```

## VIRTUAL HOSTS
```
edit hosts file
 - 127.0.0.1  shipment.test
```

## PROJECT configs

### DATABASE
```
create shipment database
edit .env file
 - DB_CONNECTION=mysql
 - DB_HOST=127.0.0.1
 - DB_PORT=3306
 - DB_DATABASE=shipment
 - DB_USERNAME=root
 - DB_PASSWORD=root
```
