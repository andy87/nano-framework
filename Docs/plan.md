Nano::class {
  » $config (array)
  » $app App::class {
  » $request Request::class {
  » rout string
  » id array
  @__construct[
    query string,
    controller_id string
    action_id string
  ];
  @getRout()
  @getControllerID()
  @getActionID()
  @get($key string)
  @post($key string)
  @request($key string)
  }
  ? $response Response::class {
    » $format string
  }
  » $view View::class {
    » $baseDir
    » $layout
    @render(template, params)
    @renderFile( $path, params)
    @constructPathTemplate(template)
    @constructPathLayourt($layout?)
  }
  » $controller Controller::class {
    » $id string
    » $action Action:class {
      » $id string
    }
    @getAction(),
    @render(string, array);
    }
  }
  @setup($config array)
  @response(){
    Nano::getComponents( RESPONSE,
      controller => Nano::$app->controller
    )
    ->run(){
      $action = $rhis->controller->action;
      call_method(
        $this->controller,
        $action->id,
        $action->arguments ?? null
      );
    }
  }
}

App:$config
components : [
Request class
Response class
Action class
View class
],
controller : [
ns string
id string
sufix string
],
action : [
id string
sufix class
prefix class
],
dir : [
view string
],
tpl : [
catch string
]
Requst::$rout
Request$id
Request::$arguments
Action::$id
Controller::$ns
Controller::$id
Controller::$action
View::$baseDir