# simple PHP framework 'nano'.

# En
Target:
* fast
* low size
* expandable
* Nice interaction interface

## Application structure 

```
📁 
├─📁 config                              Directory with config files 
│ └─📄 main.php                            Main config file
├─📁 controllers                         Library Controllers
│ ├─📁 console                             Directory with `console` Controller class
│ └─📁 web                                 Directory with `web` Controller class
│   └─📄 <controller_id>Controller.php       <controller_id> file
├─📁 public                              Directory with public files & templates views
│ ├─📁 css                                 Library `CSS files`
│ ├─📁 js                                  Library `JS files`
│ └─📁 img                                 Library `Images`
├─📁 vendor                              Composer directory
├─📁 views                               Library with `views`
│ ├─📁 _layouts                            `views` for layout
│ └─📁 <controller_id>                       `views` for `controller_id`
│    └─📁 <action_id>                        `views` for `action_id`
├─📄 .gitignore                          Git Ignore file
├─📄 .htaccess                           Apache config file
├─📄 composer.json                       Composer config file
├─📄 endpoint.php                        Endpoint
└─📄 README.md                           Documentation
```


## endpoint

```php

include "vendor/autoload.php";

const DS = DIRECTORY_SEPARATOR;
const ROOT = __DIR__;

framework\Nano::load( require "config/main.php" )->run();

```



# Ru

Цель:
* быстрый
* легковесный
* расширяемый
* Приятный интерфейс взаимодействия
