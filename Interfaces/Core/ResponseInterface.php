<?php

namespace nano\Interfaces\Core;

use nano\Interfaces\BaseObjectInterface;

/**
 *  Interface for class `Response`
 *   env( Core )
 */
interface ResponseInterface extends BaseObjectInterface
{
    /**
     * @return mixed
     */
    public function result(): mixed;
}