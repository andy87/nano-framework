<p align='center'>
  <img align='center' src="https://github.com/andy87/nano-framework/raw/master/Docs/background.jpg" style="max-width: 100%;">+
  <h1 align='center'> Simple PHP framework`<a href="https://github.com/andy87/nano-framework">Nano<a/>` v1 </h1>
</p>

#### Fast start with 
> [nano-application](https://github.com/andy87/nano-app/)

# En
* fast, low size, easy expand
* Nice interaction interface (subjectively)


## Application structure 

```
📁 
├─📁 config                              Directory with config files 
│ ├─📄 common.php                          Common config file
│ └─📄 main.php                            Main config file
├─📁 controllers                         Library Controllers
│ ├─📁 console                             Comingsoon...
│ └─📁 web                                 Directory with `web` Controller class
│   └─📄 <controller_id>Controller.php       <controller_id> file
├─📁 static                              Directory with public files & templates views
│ ├─📁 css                                 Library `CSS files`
│ ├─📁 js                                  Library `JS files`
│ └─📁 img                                 Library `Images`
├─📁 vendor                              Composer directory
├─📁 views                               Library with `views`
│ ├─📁 _layouts                            `views` for layouts
│ └─📁 <controller_id>                     `views` for <controller_id>
│    └─📄 <action_id>.php                   `views` for <action_id>
├─📄 .gitignore                          Git ignore file
├─📄 .htaccess                           Apache config file
├─📄 composer.json                       Composer config file
├─📄 endpoint.php                        Endpoint
└─📄 README.md                           This file O_O
```


## endpoint

```php

const ROOT = __DIR__;

include ROOT . "/vendor/autoload.php";

framework\Nano::setup([
    require ROOT . "/config/common.php",
    require ROOT . "/config/web.php"
])->run();

```


## More example/info:
- [📄 Structure](Docs/en/structure.md) <sup>[(rus)](Docs/ru/structure.md)</sup>
- [📄 Endpoint](Docs/en/endpoint.md) <sup>[(rus)](Docs/ru/endpoint.md)</sup>
- [📄 Config](Docs/en/config.md) <sup>[(rus)](Docs/ru/config.md)</sup>
- [📄 Controllers](Docs/en/controller.md) <sup>[(rus)](Docs/ru/controller.md)</sup>


# Ru

* быстрый, мало "весит", легко расширяемый
* Приятный интерфейс взаимодействия (субъективно)  

#### Быстрый старт с 
> [шаблоном приложения](https://github.com/andy87/nano-app/)

#### Цель фреймворка: 
> Быстрое создание простых сайтов и прототипов

Что он умеет? Что-то умеет, но так и хочется сказать: да практически ничего!
Фреймворк был специально написан с минимальным количеством функционала, но имеет простой способ расширить этот функционал.  

#### Возможности фреймворка:
 - разделять код на `controllers` и `views`
 - `views` может отрендерить другие `views`
 - `views` может использовать обёртку(`layout`)
 - `action` имеет 3 `Content-Type` ответа: 
   - HTML (по умолчанию), JSON, RAW
 - легко расширить функционал фреймворка, создавая свои компоненты на основе базовые классов
