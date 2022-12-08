<?php
/** User: Matej */

namespace matejpal\phpmvc;

use matejpal\phpmvc\middlewares\BaseMiddleware;

/**
 * Class Controller
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package matejpal\phpmvc
*/

class Controller{

    public string $layout = "main";
    public string $action = "";

    /**
     * @var \matejpal\phpmvc\middlewares\BaseMiddleware[]
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
     * @return \matejpal\phpmvc\middlewares\BaseMiddleware[]
     */
    public function getMiddlewares(): array { 
        return $this->middlewares;
    }
}