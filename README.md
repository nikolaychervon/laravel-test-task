# Тестовое задание Library (библиотека)

### Системные требования

- Bash
- Docker
- Git

### Для запуска проекта выполните следующие действия

1. Клонируйте репозиторий:
    ```shell
    $ git clone https://github.com/nikolaychervon/laravel-test-task.git
    ```

2. Перейдите в папку с проектом:
    ```shell
    $ cd laravel-test-task
    ```

3. Запустите Docker-контейнеры:
    ```shell
    $ docker-compose up -d
    ```

4. Скопируйте и переименуйте файл .env.example:
    ```shell
    $ cp .env.example .env
    ```

5. Обновите переменные окружения для подключения к БД:
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=library
    DB_USERNAME=library
    DB_PASSWORD=EMy8VE73
    ```
6. Перейдите в PHP-контейнер:
    ```shell
    $ docker exec -it library_php bash
    ```

7. Установите зависимости:
    ```shell
    $ composer install
    ```

8. Сгенерируйте ключ приложения:
    ```shell
    $ php artisan key:generate
    ```

9. Выполните миграции и сидеры:
    ```shell
    $ php artisan migrate --seed
    ```

10. Перейдите по URL-адресу: http://127.0.0.1
