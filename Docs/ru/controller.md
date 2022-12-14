

# Controller
___

📄 controllers/web/PingController.php
```php

namespace app\controllers\web;

use nano\Components\Web\Response;
use nano\Components\Web\Controller;
use nano\Interfaces\Core\ResponseInterface;

/**
 *  class `PingController`
 */
class PingController extends Controller
{
    /**
     * @url /ping/
     * 
     * @return string
     */
    public function index(): string
    {
        Response::$format = Response::FORMAT_RAW;

        return 'pong';
    }

    /**
     * @url /ping/as-json
     * 
     * @return array
     */
    public function as_json(): array
    {
        Response::setupFormat(ResponseInterface::FORMAT_JSON);

        return ['pong'];
    }
}
```