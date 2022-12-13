<?php

namespace nano\Interfaces\Core\Enums;

use nano\Interfaces\EnumInterface;

/**
 *  pseudoEnum `Charset` ( self )
 */
interface Charset extends EnumInterface
{
    /** @var string utf-8 */
    const UTF_8 = 'utf-8';

    /** @var string windows-1251 */
    const WINDOWS_1251 = 'windows-1251';
}