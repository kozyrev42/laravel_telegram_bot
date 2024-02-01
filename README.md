<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

`php -S 127.0.0.1:8000 -t public`

1. Установка проекта: `composer create-project --prefer-dist laravel/laravel laravel_telegram_bot`

2. Установка пакета "defstudio/telegraph":
`composer require defstudio/telegraph`

- генерация 2 миграций, для последующего наката:
`php artisan vendor:publish --tag="telegraph-migrations"`

- генерация файла конфигурации для бота
`php artisan vendor:publish --tag="telegraph-config"`

- в telegraph.php установил формат разметки сообщений 
`'default_parse_mode' => Telegraph::PARSE_MARKDOWN`
