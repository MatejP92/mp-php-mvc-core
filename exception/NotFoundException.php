<?php

namespace matejpal\phpmvc\exception;

/**
 * Class NotFoundException
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package matejpal\phpmvc\exception
*/

class NotFoundException extends \Exception {

    protected $message = "Page not found";
    protected $code = 404;

}