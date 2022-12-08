<?php

namespace matejpal\phpmvc\exception;

/**
 * Class ForbiddenException
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package matejpal\phpmvc\exception
*/

class ForbiddenException extends \Exception{
    protected $message = "You don't have permission to access this page.";
    protected $code = 403;
}
