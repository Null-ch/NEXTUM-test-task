<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# ОПИСАНИЕ ПРОЕКТА

В данном проекте реализуется создание приложение для создания текстов на Laravel с последующим экспортом в PDF\DOCX, упакованные в архив.
Данные хранятся в подключенной БД MySQL


Склонируйте проект в директорию с сервером:

`git clone https://github.com/Null-ch/NEXTUM-test-task.git`

Создайте базу данных на сервере и заполните поля файла .env, находящийся в папке проекта по примеру (скопируйте env example и сделайте из него основной env файл). Предварительно создав БД с названием nextum или тем названием, которое будет в env файле:

`DB_CONNECTION=mysql`

`DB_HOST=127.0.0.1`

`DB_PORT=3306`

`DB_DATABASE=nextum`

`DB_USERNAME=root`

`DB_PASSWORD=`

При необходимости сгенерируйте app key
`php artisan key:generate`

Затем, открыв из папки проекта консоль, введите команду для установки/обновления пакетов ларавел:

`composer update`

В открытой консоли директории проекта введите команду для генерации таблиц базы данных:

`php artisan migrate`

В открытой консоли директории проекта введите команду для генерации фейковых данных и учетной записи пользователя для входа:

`php artisan db:seed`

В той же консоли для запуска сайта по адресу `http://localhost:8000` введите команду:

`php artisan serve`

В новой консоли для запуска NodeJS и корректной работы введите команду:

`npm install`
`npm run dev`

Откройте сайт в браузере по адресу  `http://127.0.0.1:8000`
## Задание
<img src="https://github.com/Null-ch/NEXTUM-test-task/assets/65172872/9a6dd93a-d787-452b-87c9-2ed68ec79ace">

## Данные для входа
- Логин: admin
- Пароль: 12345678

