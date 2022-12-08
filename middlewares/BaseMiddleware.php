<?php

namespace app\core\middlewares;

/**
 * Class BaseMiddleware
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package app\core\middlewares
*/

abstract class BaseMiddleware{
    abstract public function execute();
}