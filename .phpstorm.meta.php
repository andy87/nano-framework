<?php

namespace PHPSTORM_META {

    expectedReturnValues(\framework\Nano::getComponent(), ...
        \nano\Interfaces\Core\AppInterface::class,
        \nano\Interfaces\Core\ControllerInterface::class,
        \nano\Interfaces\Core\Controllers\ActionInterface::class,
        \nano\Interfaces\Core\RequestInterface::class,
        \nano\Interfaces\Web\ViewInterface::class
    );
}