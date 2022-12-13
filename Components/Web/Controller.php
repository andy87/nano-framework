<?php

namespace nano\Components\Web;

use nano\Traits\StringTransformTrait;
use nano\Exceptions\TemplateNotFoundException;
use nano\Interfaces\Core\RequestInterface;
use nano\interfaces\web\ViewInterface;
use nano\Interfaces\Web\ControllerInterface;
use nano\Interfaces\Core\Controllers\ActionInterface;

/**
 *  class `Controller`
 *      env( Web )
 *
 * Base Controller class for extends user controllers.
 *
 * @property ViewInterface $view
 */
abstract class Controller extends \nano\components\Core\Controller implements ControllerInterface
{
    //Traits

    use StringTransformTrait;



    // Methods

    /**
     *  Constructor
     *
     * @param RequestInterface $request
     * @param ActionInterface $action
     * @param ViewInterface $view
     * @param array $config
     */
    public function __construct(
        RequestInterface $request,
        ActionInterface $action,
        public ViewInterface $view,
        array $config = []
    )
    {
        parent::__construct($request, $action, $config);

        $view->baseDir = $request->ns . $this->transformAny2SnakeCase($request->id[CONTROLLER]);
    }

    /**
     * @return string
     */
    public function getActionID(): string
    {
        return $this->action->getID();
    }

    /**
     * @param string $template
     * @param array $params
     * @return string
     */
    public function render(string $template, array $params = []): string
    {
        $content = $this->view->render($template, $params);

        if ($this->view->layout) {
            $content = $this->view->renderFile($this->view->findLayoutFilePath(), [
                'content' => $content
            ]);
        }

        return $content;
    }
}