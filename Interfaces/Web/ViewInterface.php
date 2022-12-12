<?php

namespace nano\Interfaces\Web;

use nano\Interfaces\BaseObjectInterface;

/**
 * Interface for class `View`
 */
interface ViewInterface extends BaseObjectInterface
{
    // Константы

    /** @var string */
    public const DEFAULT_LAYOUT = 'wrapper';


    // Property

    /**
     * Возвращает HTML, который является результатом "renderFile()" вставленный в обёртку
     * `_layout/ { self::DEFAULT_LAYOUT } ` ( по умолчанию )
     * Планируется использование { self::DEFAULT_LAYOUT }
     * ! Константа назначается в `class`, а не в `interface` для наличия возможности переопределения
     *
     * @param string $template
     * @param array $params
     * @return string
     */
    public function render(string $template, array $params = []): string;

    /**
     * Возвращает HTML, который является результатом "рендеринга"
     * файла по пути `$filePath` использовавший в качестве данных массив `$params`
     *
     * @param string $filePath
     * @param array $params
     * @return string
     */
    public function renderFile(string $filePath, array $params = []): string;

    /**
     * Возвращает полный путь к файлу шаблона( `$template` ).
     *
     * @param string $template
     * @return string
     */
    public function getTemplateFilePath(string $template): string;

    /**
     * Возвращает полный путь к файлу шаблона обёртки ` { $layout } `.
     *
     * @return string
     */
    public function findLayoutFilePath(): string;

    /**
     * Дополняет путь расширением файлов шаблона.
     * Планируется использование { self::TEMPLATE_EXT }
     * ! Константа назначается в `class`, а не в `interface` для наличия возможности переопределения
     *
     * @param string $path
     * @return string
     */
    public function normalizeFilePath(string $path): string;

}