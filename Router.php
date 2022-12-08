<?php
/** User: Matej */

namespace matejpal\phpmvc;

use matejpal\phpmvc\exception\NotFoundException;


/**
 * Class Router
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package matejpal\phpmvc
 */


class Router
{

    public Request $request;
    public Response $response;
    protected array $routes = [];

    /**
     * Router constructor
     * 
     * @param \matejpal\phpmvc\Request $request
     * @param \matejpal\phpmvc\Response $response
     */
    
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    public function get($path, $callback)   // this function accepts 2 parameters, if the path is $path, the $callback must be executed
    { 
        $this->routes["get"][$path] = $callback;
    }

    public function post($path, $callback)   // this function accepts 2 parameters, if the path is $path, the $callback must be executed
    { 
        $this->routes["post"][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false; 
        if($callback === false){
            throw new NotFoundException();
        }
        if(is_string($callback)){
            return Application::$app->view->renderView($callback);
        }
        if(is_array($callback)){

            /** @var \matejpal\phpmvc\Controller $controller */

            $controller =  new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller;

            foreach($controller->getMiddlewares() as $middleware){
                $middleware->execute();
            }
        }
        return call_user_func($callback, $this->request, $this->response);
    }

}