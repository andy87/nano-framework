<?php

namespace nano\Interfaces\Web\Method;

use nano\Interfaces\EnumInterface;

/**
 *  pseudoEnum `Method` ( self )
 */
interface Method extends EnumInterface
{
    /** @var string GET */
    public const GET = 'GET';

    /** @var string POST */
    public const POST = 'POST';

    /** @var string PUT */
    public const PUT = 'PUT';

    /** @var string PATCH */
    public const PATCH = 'PATCH';

    /** @var string DELETE */
    public const DELETE = 'DELETE';
}