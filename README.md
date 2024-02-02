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

3. Добавляем бота в базу в таблицу:
`php artisan telegraph:new-bot`
- вводим токен, полученный при регистрации бота, вводим name.

- создан класс TelegramService для обработки веб-хуков
- telegraph.php указали какой класс будет обрабатывать веб-хуки

- в .env нужно указать url, на котором хостится приложение
- telegram на этот адрес будет отправлять веб-хуки:
APP_URL=https://e6be-176-196-196-50.ngrok-free.app/
- командой, сообщаем что готовы принимать веб-хуки:
`php artisan telegraph:set-webhook {bot_id}`
`php artisan telegraph:set-webhook 1`

- установил флаги в telegraph.php

- написан тестовый обработчик hello() в TelegramService
