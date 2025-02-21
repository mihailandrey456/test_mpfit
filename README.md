## Установка

В корне скопировать файл `.env.sample` в `.env`
Заполнить `.env` и `./src/.env` данными по проекту.

* В терминале запускаем сборку коммандой: `docker compose up -d --build`
* Выполняем комманды:
* `docker compose run --rm composer install`
* `docker compose run --rm php php artisan key:generate`
* `docker compose run --rm php php artisan migrate`

## Seeding

* `docker compose run --rm php php artisan db:seed`