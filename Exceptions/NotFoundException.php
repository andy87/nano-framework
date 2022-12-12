<?php

namespace nano\Exceptions;

use nano\Exceptions\Base\NanoException;

/**
 *  class `NotFoundException`
 */
class NotFoundException extends NanoException
{
    public const ITEM = 'Item';

    public const MESSAGE = "<b>%s</b> not found\r\n<br><b>Target</b>: %s<style>*{font-family: Calibri, sans-serif;}</style>";

    /**
     * @param string $target
     */
    public function __construct(string $target)
    {
        parent::__construct();

        $this->message = sprintf(static::MESSAGE, static::ITEM, $target);
    }
}