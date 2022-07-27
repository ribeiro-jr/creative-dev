# Creative API

Creative is a simple form for capturing customer data and disseminating materials.

Creative has only two pages, the home page and the material download page.

This project is an API for make above idea work.

## Installation
To install the application just run the following command which will install the necessary dependencies.

```bash
composer update
```

After that, make sure you have the database configured in the .env file, and then run the migrations and seeds, respectively.

```bash
php artisan migrate
php artisan db:seed
```

After the success of the previous steps, the application will be ready to use.

## Usage
Note: Being an API, if you just want to test, we recommend using a Client API like Postman or Insomnia

To start the application, run the following command:
```bash
php artisan serve
```

The API has 5 endpoints that can be found and tested from a simple documentation, which is accessible through the address: http://localhost/api/documentation

## License
[MIT](https://choosealicense.com/licenses/mit/)