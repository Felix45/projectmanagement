
<p align="left">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Project Tracker App
The Project Tracker App is a web application system which acts as a platform where supervisors and juniors can assign tasks and follow up on the same.
Project Tracker App attempts to take the pain out of assigning of tasks via emails or word of mouth and tracking by spreadsheets.Some of the web application functions are:

- Users can assign tasks or have tasks assigned to them.
- Users can provide daily updates on the status of their tasks.
- Users can select if a task is private or public when assigning
- Users can track their assigned tasks and view their past tasks.
- Users can view daily summaries of other users. i.e recieved tasks, completed tasks, pending tasks.
- Users can generate reports on assigned tasks.

## Installation

- Clone the repository from github and change directory to projectmanagement

 ``` 
    $ git clone https://github.com/Felix45/projectmanagement.git
    $ cd projectmanagement
```
- Install all the application dependencies 
 
 ```
  $ composer install
  $ npm install
  $ npm run dev

  ````
- Setup a MYSQL database on your computer
- Rename the .env.example to  .env file and change the following environment variables

``` 
    DB_DATABASE = dbname
    DB_USERNAME = dbuser
    DB_PASSWORD = dbpassword 
```
- Create all database tables and dummy data
   
   ``` 
    $ php artisan migrate:refresh –seed

    ```

- Start the laravel application

 ```
    $ php artisan serve

 ```
## License

The Project Tracker App is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Author
Felix Ouma
