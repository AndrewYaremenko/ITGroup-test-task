# ITGroup-test-task
###### Laravel v10.19.0 (PHP v8.1.0) 

## REST API:

#### Movies
**GET /api/movies** - index<br>
**POST /api/movies** - store
```
{
    "title": string:required,
    "publication_status": boolean,
    "poster_link": string,
    "genres": array[int]:required
}
```
Пример запроса
```
{
    "title": "Some movie",
    "publication_status": false,
    "genres": [1, 4, 5]
}
```
**POST /api/movies/{id}** - publish<br>
**GET /api/movies/{id}**  - show<br>
**PATCH /api/movies/{id}** - update
```
{
    "title": string:required,
    "publication_status": boolean,
    "poster_link": string,
    "genres": array[int]:required
}
```
Пример запроса
```
{
    "title": "Some updated movie",
    "publication_status": false,
    "genres": [2, 3]
}
```
**DELETE /api/movies/{id}** - destroy<br>

#### Genres
**GET /api/genres** - index<br>
**POST /api/genres** - store
```
{
    "name":string:required,
}
```
Example body
```
{
    "name": "Some genre",
}
```
**GET /api/genres/{id}** - show<br>
**PATCH /api/genres/{id}** - update
```
{
    "name":string:required,
}
```
Пример запроса
```
{
    "name": "Some updated genre",
}
```
**DELETE /api/genres/{id}** - destroy<br>

## Установка с Docker

- Загрузите репозиторий с помощью команды ```git clone https://github.com/AndrewYaremenko/ITGroup-test-task.git```
- Перейдите в директорию проекта
- Установите необходимые PHP библиотеки, выполнив команду: ```composer install```
- Скопируйте файл ```.env.docker``` и переименуйте его в ```.env```
- Сгенерируйте ключ приложения, выполнив команду: ```php artisan key:generate```
- Запустить приложение: ```docker-compose up -d```

## Установка без Docker

- Загрузите репозиторий с помощью команды ```git clone https://github.com/AndrewYaremenko/ITGroup-test-task.git```
- Перейдите в директорию проекта
- Установите необходимые PHP библиотеки, выполнив команду: ```composer install```
- Скопируйте файл ```.env.example``` и переименуйте его в ```.env```, затем откройте файл и укажите следующие поля
<pre>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
</pre>
- Сгенерируйте ключ приложения, выполнив команду: ```php artisan key:generate```
- Выполните миграцию таблиц в БД с помощью команды: ```php artisan migrate```
- Загрузите готовые данные в таблицы, используя команду: ```php artisan db:seed```
- Запустить сервер: ```php artisan serve```