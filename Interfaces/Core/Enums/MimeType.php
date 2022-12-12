<?php

namespace nano\Interfaces\Core\Enums;

use nano\Interfaces\EnumInterface;

/**
 *  pseudoEnum `Env` ( self )
 */
interface MimeType extends EnumInterface
{
    /** @var string HTML */
    const HTML = 'text/html';

    /** @var string JSON */
    const JSON = 'application/json';

    /** @var string RAW */
    const RAW = 'text/plain';
}