<?php
/** User: Matej */

namespace app\core;

/**
 * Class Response
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package app\core
 */

class Response{
    public function setStatusCode(int $code){
        http_response_code($code);
    }

    public function redirect(string $url){
        header('Location: '. $url);
    }
}