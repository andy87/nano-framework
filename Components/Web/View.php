<?php

namespace nano\Components\Web;

use framework\Nano;
use nano\Components\BaseObject;
use nano\Exceptions\TemplateNotFoundException;
use nano\Interfaces\Web\ViewInterface;

use function ob_end_flush;
use function ob_implicit_flush;
use function ob_start;

/**
 *  class `View`
 *      env( Web )
 */
class View extends BaseObject implements ViewInterface
{

    // Constants

    /** @var string extension template files */
    private const TEMPLATE_EXT = 'php';

    /** @var string  */
    public const DIR = '~views';



    // Property

    /** @var string property for use on layout to tag <title> */
    public static string $title = '';

    /** @var ?string used layout file name */
    public ?string $layout;

    /** @var string  */
    public string $baseDir;



    // Methods

    /**
     *  Constructor
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->layout = Nano::$config[TPL][LAYOUT] ?? false;

        $this->init();
    }

    /**
     * method render content with `layout`
     *
     * @param string $template
     * @param array $params
     * @return string
     * @throws TemplateNotFoundException
     */
    public function render(string $template, array $params = []): string
    {
        return $this->renderFile(
            $this->getTemplateFilePath($template),
            $params
        );
    }

    /**
     * generate full template file path
     *
     * @param string $template
     * @return string
     */
    public function getTemplateFilePath(string $template): string
    {
        return $this->normalizeFilePath(
            Nano::dir(VIEW) .DS . (
                ( str_starts_with($template, View::DIR) )
                    ? str_replace(View::DIR, '', $template)
                    : $this->baseDir .DS. $template
            )
        );
    }

    /**
     * main file rendering method
     *
     * @param string $filePath
     * @param array $params
     * @return string
     * @throws TemplateNotFoundException
     */
    public function renderFile(string $filePath, array $params = []): string
    {
        if (!file_exists($filePath)) {
            throw new TemplateNotFoundException($filePath);
        }

        ob_start(); // I want this offset

            extract($params);

            ob_implicit_flush((PHP_VERSION_ID >= 80000 ? false : 0));

            require $filePath;

            $content = ob_get_contents();

        ob_end_clean();

        return $content;
    }

    /**
     * generate full layout file path
     *
     * @return string
     */
    public function findLayoutFilePath(): string
    {
        if ( str_starts_with($this->layout, View::DIR, ) )
        {
            $path = str_replace(View::DIR, Nano::dir(VIEW), $this->layout );

        } else {

            $path = Nano::dir(VIEW) . DS . '_layouts' . DS . $this->layout;
        }

        return $this->normalizeFilePath($path);
    }

    /**
     * add file extension fot filePath
     *
     * @param string $path
     * @return string
     */
    public function normalizeFilePath(string $path): string
    {
        return "$path." . static::TEMPLATE_EXT;
    }

    /**
     * @param string $template
     * @param array $params
     * @return void
     * @throws TemplateNotFoundException
     */
    public static function display(string $template, array $params = []): void
    {
        echo (new static)->renderFile($template, $params);
    }
}