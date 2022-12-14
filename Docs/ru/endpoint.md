## endpoint

### Simple

```php

const ROOT = __DIR__;

include ROOT . "/vendor/autoload.php";

framework\Nano::load([
    require ROOT . "/config/common.php",
    require ROOT . "/config/web.php"
])->run();

```


### With Exception.
```php

const ROOT = __DIR__;

try {

    include ROOT . "/vendor/autoload.php";

    framework\Nano::load([
        require ROOT . "/config/common.php",
        require ROOT . "/config/web.php"
    ])->run();

} catch ( Exception $e ) {

    echo '<h2>Nano  exception.</h2><hr>' . $e->getMessage();
}

```