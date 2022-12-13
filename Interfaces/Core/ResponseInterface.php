<?php

namespace nano\Interfaces\Core;

use nano\Interfaces\BaseObjectInterface;

/**
 *  Interface for class `Response`
 *   env( Core )
 */
interface ResponseInterface extends BaseObjectInterface
{
    public const FORMAT_RAW = 'raw';

    /**
     * @return mixed
     */
    public function result(): mixed;
}