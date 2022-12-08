<?php
/** User: Matej */

namespace app\core\form;

use app\core\Model;

/**
 * Class Model
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package app\core\form
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