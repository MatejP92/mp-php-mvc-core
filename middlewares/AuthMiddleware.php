<?php

namespace matejpal\phpmvc\middlewares;
use matejpal\phpmvc\Application;
use matejpal\phpmvc\exception\ForbiddenException;

/**
 * Class AuthMiddleware
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package matejpal\phpmvc\middlewares
*/

class AuthMiddleware extends BaseMiddleware{
    
    public array $actions = [];
    
    /**
     * @param array $actions
     */

    public function __construct(array $actions = []){
            $this->actions = $actions;
        }

    public function execute(){
        if(Application::isGuest()){
            if (empty($this->actions)|| in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}