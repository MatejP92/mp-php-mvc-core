<?php

namespace app\core;
use app\core\db\DbModel;

/**
 * Class UserModel
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package app\core
*/
abstract class UserModel extends DbModel{
    abstract public function getDisplayName(): string;
}
