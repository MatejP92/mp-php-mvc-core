<?php

namespace matejpal\phpmvc\middlewares;

/**
 * Class BaseMiddleware
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package matejpal\phpmvc\middlewares
*/

abstract class BaseMiddleware{
    abstract public function execute();
}