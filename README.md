<h2 align="center">Демо версия</h2>
<a href="http://globalpas.kadastrcard.ru/" target="_blank">http://globalpas.kadastrcard.ru/</a>

<h2 align="center">Тестовое задание</h2>
<div class=WordSection1>

<p class=MsoNormal>Напишите REST API с использованием фреймворка Yii2 на языке
PHP и хранением данных в базе данных Postgres. </p>

<p class=MsoNormal>Работа с проектом должна вестись через GitHub.</p>

<p class=MsoNormal>Функционал API должен соответствовать следующим требованиям:</p>

<p class=MsoNormal>----------------------------------------</p>

<p class=MsoNormal>1. Получение списка книг</p>

<p class=MsoNormal>Метод: GET</p>

<p class=MsoNormal>URL: /books</p>

<p class=MsoNormal>Ответ: массив объектов книг, каждый из которых содержит
следующие поля:</p>

<p class=MsoNormal>название книги</p>

<p class=MsoNormal>автор</p>

<p class=MsoNormal>число страниц</p>

<p class=MsoNormal>язык</p>

<p class=MsoNormal>жанр</p>

<p class=MsoNormal>----------------------------------------</p>

<p class=MsoNormal>2. Фильтрация списка книг</p>

<p class=MsoNormal>Метод: GET</p>

<p class=MsoNormal>URL: /books</p>

<p class=MsoNormal>Параметры запроса:</p>

<p class=MsoNormal>search - строка для поиска в названии и описании книги</p>

<p class=MsoNormal>author - массив идентификаторов авторов, которые должны быть
включены в результаты поиска</p>

<p class=MsoNormal>Ответ: массив объектов книг, соответствующих заданным
параметрам фильтра, каждый из которых содержит следующие поля:</p>

<p class=MsoNormal>название книги</p>

<p class=MsoNormal>автор</p>

<p class=MsoNormal>число страниц</p>

<p class=MsoNormal>язык</p>

<p class=MsoNormal>жанр</p>

<p class=MsoNormal>----------------------------------------</p>

<p class=MsoNormal>3. Создание новой книги</p>

<p class=MsoNormal>Метод: POST</p>

<p class=MsoNormal>URL: /books</p>

<p class=MsoNormal>Тело запроса должно быть в формате JSON. Формат объекта для
создания книги может выглядеть следующим образом:</p>

<p class=MsoNormal>{</p>

<p class=MsoNormal><span style='mso-spacerun:yes'> </span>&quot;title&quot;:
&quot;Название книги&quot;,</p>

<p class=MsoNormal><span
style='mso-spacerun:yes'> </span>&quot;author_id&quot;: 1,</p>

<p class=MsoNormal><span style='mso-spacerun:yes'> </span>&quot;pages&quot;:
300,</p>

<p class=MsoNormal><span style='mso-spacerun:yes'> </span>&quot;language&quot;:
&quot;русский&quot;,</p>

<p class=MsoNormal><span style='mso-spacerun:yes'> </span>&quot;genre&quot;:
&quot;роман&quot;,</p>

<p class=MsoNormal><span
style='mso-spacerun:yes'> </span>&quot;description&quot;: &quot;Описание
книги&quot;</p>

<p class=MsoNormal>}</p>

<p class=MsoNormal>Здесь title, author_id, pages, language, genre и description
- это параметры создаваемой книги. </p>

<p class=MsoNormal>Они могут быть любыми, но должны соответствовать
спецификации API. </p>

<p class=MsoNormal>Идентификатор автора author_id должен быть целочисленным
значением, соответствующим идентификатору существующего автора в базе данных.</p>

<p class=MsoNormal>Ответ: объект созданной книги со всеми полями, включая
уникальный идентификатор.</p>

<p class=MsoNormal>----------------------------------------</p>

<p class=MsoNormal>4. Редактирование/удаление книги</p>

<p class=MsoNormal>Метод: PUT/DELETE</p>

<p class=MsoNormal>URL: /books/{id}</p>

<p class=MsoNormal>Тело запроса должно быть в формате JSON.</p>

<p class=MsoNormal>Параметры запроса:</p>

<p class=MsoNormal>id - идентификатор книги</p>

<p class=MsoNormal>Ответ:</p>

<p class=MsoNormal>PUT: объект книги со всеми полями, включая уникальный
идентификатор, после изменения.</p>

<p class=MsoNormal>DELETE: сообщение об успешном удалении книги из базы данных.</p>

<p class=MsoNormal>----------------------------------------</p>

<p class=MsoNormal>5. Список авторов</p>

<p class=MsoNormal>Метод: GET</p>

<p class=MsoNormal>URL: /authors</p>

<p class=MsoNormal>Ответ: массив объектов авторов, каждый из которых содержит
следующие поля:</p>

<p class=MsoNormal>имя автора</p>

<p class=MsoNormal>год рождения</p>

<p class=MsoNormal>страна</p>

<p class=MsoNormal>----------------------------------------</p>

<p class=MsoNormal>6. Создание/редактирование автора</p>

<p class=MsoNormal>Метод: POST/PUT</p>

<p class=MsoNormal>URL: /authors</p>

<p class=MsoNormal>Параметры запроса:</p>

<p class=MsoNormal>name - имя автора</p>

<p class=MsoNormal>birth_year - год рождения автора</p>

<p class=MsoNormal>country - страна, в которой родился автор</p>

<p class=MsoNormal>Ответ:</p>

<p class=MsoNormal>POST: объект созданного автора со всеми полями, включая
уникальный идентификатор.</p>

<p class=MsoNormal>PUT: объект автора со всеми полями, включая уникальный
идентификатор, после изменения.</p>

<p class=MsoNormal>Требования</p>

<p class=MsoNormal>Спецификация</p>

<p class=MsoNormal>Требования к спецификации API на SwaggerHub:</p>

<p class=MsoNormal>Для каждого метода API должно быть описано: URL, метод HTTP,
параметры запроса и ответа.</p>

<p class=MsoNormal>Сведения о параметрах запроса (обязательными ли они
являются, какие они типы и т. д.).</p>

<p class=MsoNormal>Сведения о кодах ответа и их описании.</p>

<p class=MsoNormal>Поля в ответах должны быть полностью описаны, включая тип и
описание.</p>

<p class=MsoNormal>Приложение должно быть задокументировано так, чтобы другой
разработчик в легко мог начать использовать API.</p>

<p class=MsoNormal>Требования к коду</p>

<p class=MsoNormal>Код должен быть чистым, хорошо организованным.</p>

<p class=MsoNormal>Рекомендации</p>

<p class=MsoNormal>Контроллеры</p>

<p class=MsoNormal>Для реализации REST API в Yii2 рекомендуется использовать
контроллеры, основанные на yii\rest\Controller.</p>

<p class=MsoNormal>Контроллеры, унаследованные от этого класса, обеспечивают
автоматическое формирование ответа в нужном формате (JSON или XML), </p>

<p class=MsoNormal>а также реализуют основные методы CRUD (&quot;Create&quot;,
&quot;Read&quot;, &quot;Update&quot;, &quot;Delete&quot;), соответствующие
HTTP-методам.</p>

<p class=MsoNormal>----------------------------------------</p>

<p class=MsoNormal>Фильтрация</p>

<p class=MsoNormal>Вы можете использовать yii\data\DataFilter для реализации
фильтрации данных в вашем API. </p>

<p class=MsoNormal>Он работает в связке с ActiveDataProvider и предоставляет
удобные возможности, которые позволяют гибко и просто фильтровать данные </p>

<p class=MsoNormal>на основе пользовательских параметров.</p>

<p class=MsoNormal>----------------------------------------</p>

</div>

<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>

Yii 2 Basic Project Template is a skeleton [Yii 2](https://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 7.4.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](https://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
composer create-project --prefer-dist yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](https://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~


### Install with Docker

Update your vendor packages

    docker-compose run --rm php composer update --prefer-dist
    
Run the installation triggers (creating cookie validation code)

    docker-compose run --rm php composer install    
    
Start the container

    docker-compose up -d
    
You can then access the application through the following URL:

    http://127.0.0.1:8000

**NOTES:** 
- Minimum required Docker engine version `17.04` for development (see [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/))
- The default configuration uses a host-volume in your home directory `.docker-composer` for composer caches


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.


TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](https://codeception.com/).
By default, there are 3 test suites:

- `unit`
- `functional`
- `acceptance`

Tests can be executed by running

```
vendor/bin/codecept run
```

The command above will execute unit and functional tests. Unit tests are testing the system components, while functional
tests are for testing user interaction. Acceptance tests are disabled by default as they require additional setup since
they perform testing in real browser. 


### Running  acceptance tests

To execute acceptance tests do the following:  

1. Rename `tests/acceptance.suite.yml.example` to `tests/acceptance.suite.yml` to enable suite configuration

2. Replace `codeception/base` package in `composer.json` with `codeception/codeception` to install full-featured
   version of Codeception

3. Update dependencies with Composer 

    ```
    composer update  
    ```

4. Download [Selenium Server](https://www.seleniumhq.org/download/) and launch it:

    ```
    java -jar ~/selenium-server-standalone-x.xx.x.jar
    ```

    In case of using Selenium Server 3.0 with Firefox browser since v48 or Google Chrome since v53 you must download [GeckoDriver](https://github.com/mozilla/geckodriver/releases) or [ChromeDriver](https://sites.google.com/a/chromium.org/chromedriver/downloads) and launch Selenium with it:

    ```
    # for Firefox
    java -jar -Dwebdriver.gecko.driver=~/geckodriver ~/selenium-server-standalone-3.xx.x.jar
    
    # for Google Chrome
    java -jar -Dwebdriver.chrome.driver=~/chromedriver ~/selenium-server-standalone-3.xx.x.jar
    ``` 
    
    As an alternative way you can use already configured Docker container with older versions of Selenium and Firefox:
    
    ```
    docker run --net=host selenium/standalone-firefox:2.53.0
    ```

5. (Optional) Create `yii2basic_test` database and update it by applying migrations if you have them.

   ```
   tests/bin/yii migrate
   ```

   The database configuration can be found at `config/test_db.php`.


6. Start web server:

    ```
    tests/bin/yii serve
    ```

7. Now you can run all available tests

   ```
   # run all available tests
   vendor/bin/codecept run

   # run acceptance tests
   vendor/bin/codecept run acceptance

   # run only unit and functional tests
   vendor/bin/codecept run unit,functional
   ```

### Code coverage support

By default, code coverage is disabled in `codeception.yml` configuration file, you should uncomment needed rows to be able
to collect code coverage. You can run your tests and collect coverage with the following command:

```
#collect coverage for all tests
vendor/bin/codecept run --coverage --coverage-html --coverage-xml

#collect coverage only for unit tests
vendor/bin/codecept run unit --coverage --coverage-html --coverage-xml

#collect coverage for unit and functional tests
vendor/bin/codecept run functional,unit --coverage --coverage-html --coverage-xml
```

You can see code coverage output under the `tests/_output` directory.
