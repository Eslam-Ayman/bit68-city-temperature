# Documentation of Bit68 (city temperature app)
## About
This project is for testing my skills in `RESTFul API` with Laravel  .
`City Temperature` is a RESTful API Project with 3 APIs for client side to help to get city temperature in °C

## To Run
### You will need:
- xampp
- php v 7.*
- composer
- node.js
- Postman ( https://www.getpostman.com/apps )
or you can use your prefer extension to your browser for example [ RestMan for opera ](https://addons.opera.com/en/extensions/details/restman/)

## Setup / configuration
 1. clone Repo 
    - `git clone https://github.com/Eslam-Ayman/bit68-city-temperature.git`
    - cd into your project
 2. Install Composer Dependencies
    - ```composer install```
 3. Create a copy of your .env file
    - ```cp .env.example .env```
 4. Generate an app encryption key
    - ```php artisan key:generate```
    - If the application key is not set, your user sessions and other encrypted data will not be secure!
 5. Create an empty database for our application
 6. In the .env file, add database information to allow Laravel to connect to the database
 7. Migrate the database
    - `php artisian migrate`
    - if you don't need to migrate so import `city_temperature.sql` in your DB
 9. you have to install node.js modules:
    - `npm install`
    - `npm run dev` 
10. run this command `php artisan serve`
    - open your browser on this link <http://127.0.0.1:8000>
11. import postman collection file `city-temperature.postman_collection.json` 

## Start using API
| Name       | Method   | URL                              | Header                                                        | Body ( **RAW** ) not (form-data) |
| :----------: |:--------:| :--------------------------------: | :--------------------------------------------------------------:| :-----:|
| Login      | POST     | http://127.0.0.1:8000/api/auth/login    | `Content-Type`: application/json <br> `Accept`: application/json | `Required Data`: (email, password) <br> `Optional Data`: (null) |
| Register   | POST     | http://127.0.0.1:8000/api/auth/register | `Content-Type`: application/json <br> `Accept`: application/json | `Required Data`: (name, email, password, password_confirmation) <br> `Optional Data`: (null)  |
| Area       | GET      | http://127.0.0.1:8000/api/city-temperature?city_name=cairo     | `Content-Type`: application/json <br> `Accept`: application/json <br> `Authorization`: Bearer <Token-Here> |  null  |

> Note: if you want to send data in Body Format (form-data) so you must remove `Content-Type` from Header

## Program's Output
![N|Solid](https://i.ibb.co/NKy4qr0/image.png)

# Resources / References
##### public API about list of countries 
- [ metaweather ](https://www.metaweather.com) has been used in this project
- [ openweathermap.org ](https://openweathermap.org/api)

> Note: the free api that has been used in this project doesn't support all world cities so check availabe city from here https://www.metaweather.com/map/

Package used in this project [ bioudi / laravel-meta-weather-api ](https://github.com/bioudi/laravel-meta-weather-api) && [guzzlehttp/guzzle](https://github.com/guzzle/guzzle)

Guzzle is a PHP HTTP client that makes it easy to send HTTP requests and trivial to integrate with web services.
to install it using composer `composer require guzzlehttp/guzzle`


# License 
GNU GPL License
> Author : Eslam Ayman 
