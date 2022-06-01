## Описание

Выполнил тестовое задание ([ссылка][1])

Для сборки выполнить команду `docker-compose up -d --build`<br>
Приложение запускается на `localhost`

При запуске в первый раз выполнить команду `docker exec test-future-app php artisan migrate:fresh --seed`<br>
Эта команда создаст необходимые таблицы, заполнит таблицу `notebooks` демонстрационными данными

Докумендация swagger находится по пути `localhost/api/documentation`

При тестировании работы необходимо устанавливать заголовки:
1. `Accept`: `application/json`
2. `Content-Type`: `application/json`

Также написаны автотесты. Для запуска выполнить команду `docker exec test-future-app php artisan test`

[1]: https://github.com/fugr-ru/php-laravel