<?php

namespace nano\Interfaces\Core\Enums;

use nano\Interfaces\EnumInterface;

/**
 *  pseudoEnum `Env` ( self )
 */
interface Environment extends EnumInterface
{
    /** @var int LOCAL */
    public const LOCAL = 0;

    /** @var int DEV */
    public const DEV = 1;

    /** @var int TEST */
    public const TEST = 2;

    /** @var int PROD */
    public const PROD = 3;
}