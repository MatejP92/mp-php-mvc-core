<?php
/** User: Matej */

namespace matejpal\phpmvc;

/**
 * Class Response
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package matejpal\phpmvc
 */

class Response{
    public function setStatusCode(int $code){
        http_response_code($code);
    }

    public function redirect(string $url){
        header('Location: '. $url);
    }
}