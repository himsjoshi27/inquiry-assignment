

## Inquiry Form Assignment 

System Requirement 
- php >= 7.2
- composer 
- Mysql

## Installation 
Clone the system

````
$ git clone https://github.com/himsjoshi27/inquiry-assignment.git
$ cd inquiry-assignment
$ composer install
````
- Create ".env" file in the root project directory
- Open mySql and create database 
- configure ".env" file with database settings

````
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={{db_name}}
DB_USERNAME={{db_username}}
DB_PASSWORD={{db_password}}
````
- setup database 

````
$ php artisan migrate:refresh --seed
````

- run the project

````
$ php artisan serve
````

- Open browser and type in url : http://127.0.0.1:8000
- for login as admin : 
- url : http://127.0.0.1:8000/login
````
email: admin@mailinator.com
password: password
```` 
