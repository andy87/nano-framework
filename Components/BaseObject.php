<?php

namespace nano\Components;

use framework\Nano;
use nano\Components\Web\View;
use nano\Exceptions\Base\NanoException;
use nano\Interfaces\BaseObjectInterface;

/**
 *  interface `BaseObject`
 *
 *      Base class for all framework components.
 */
abstract class BaseObject implements BaseObjectInterface
{
    /**
     * @param NanoException $e
     * @return void
     */
    protected function catch(NanoException $e): void
    {
        if ( $template = (Nano::$config[TPL][CATCH_] ?? false) )
        {
            View::display($template, ['e' => $e]);

        } else {

            ob_start();

                print_r( $e->getTrace() );

                $trace = ob_get_contents();

            ob_end_clean();

            echo <<<HTML
<br> <b>message: </b> {$e->getMessage()}
<br> <b>position: </b> {$e->getFile()}:{$e->getLine()}
<br> <b>trace: </b> $trace
HTML;

        }

        exit();
    }
}