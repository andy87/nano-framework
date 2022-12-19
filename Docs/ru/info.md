
Зависимости.

Nano::setup()
    - требует Array($config)
    - внутри себя собирает App::class ( используемый клас берётся из $config )
    - App::class
        * RequestInterface $request
            + query String
        * ControllerInterface $controller
            + RequestInterface $request
            + ActionInterface $action
    - возвращает экземпляр класса App::class
