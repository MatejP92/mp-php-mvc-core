<?php
/** User: Matej */

namespace matejpal\phpmvc\form;

use matejpal\phpmvc\Model;

/**
 * Class Model
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package matejpal\phpmvc\form
*/


class Form{

    public static function begin($action, $method){
        echo sprintf("<form action='%s' method='%s'>", $action, $method);
        return new Form;
    }

    public static function end(){
        echo "</form>";
    }

    public function field(Model $model, $attribute){
        return new InputField($model, $attribute);
    }
}