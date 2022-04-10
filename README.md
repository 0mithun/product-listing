## Server Requirements

- `PHP >= 8.0`
- `BCMath PHP Extension`
- `Ctype PHP Extension`
- `cURL PHP Extension`
- `DOM PHP Extension`
- `Fileinfo PHP Extension`
- `JSON PHP Extension`
- `Mbstring PHP Extension`
- `OpenSSL PHP Extension`
- `PCRE PHP Extension`
- `PDO PHP Extension`
- `Tokenizer PHP Extension`
- `XML PHP Extension`



## Installation Instructions

- Run `composer install`
- Run `cp .env.example .env`
- Run `php artisan key:generate`
- Set your database & other configration to .env 
- Run `php artisan migrate --seed`

## Run Application
- run `php artisan serve`

