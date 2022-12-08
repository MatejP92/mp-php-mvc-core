<?php
/** User: Matej */

namespace app\core;

use app\core\middlewares\BaseMiddleware;

/**
 * Class Controller
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package app\core
*/

class Controller{

    public string $layout = "main";
    public string $action = "";

    /**
     * @var \app\core\middlewares\BaseMiddleware[]
     */
    protected array $middlewares = [];
    public function setLayout($layout){
        $this->layout = $layout;
    }

    public function render($view, $params = []){
        return Application::$app->view->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middlewares){
        $this->middlewares[] = $middlewares;
    }

    /**
     * @return \app\core\middlewares\BaseMiddleware[]
     */
    public function getMiddlewares(): array { 
        return $this->middlewares;
    }
}