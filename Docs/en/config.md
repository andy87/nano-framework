
# Config
___

📄 config/common.php
```php
return [

    DIR => [
        CONFIG => ROOT  . DS . 'config',
        CONTROLLER => ROOT  . DS . 'controller',
        VIEW => ROOT  . DS . 'views',
        LAYOUT => ROOT  . DS . 'views' . DS . '_layouts',
    ],
    
    COMPONENTS => [
        APP => App::class,
        ACTION => Action::class,
        REQUEST => Request::class,
        RESPONSE => Response::class,
        CONTROLLER => Controller::class,
    ],
    
    //Default
    RESPONSE => [
        FORMAT => ResponseInterface::FORMAT_HTML
    ],
    
    CONTROLLER => [
        NS => 'app\\controllers\\',
        PREFIX => '',
        DEFAULT_NAME => 'site',
        SUFIX => 'Controller',
    ],
    
    ACTION => [
        PREFIX => '',
        DEFAULT_NAME => 'index',
        SUFIX => '',
    ],
];
```