<?php

namespace matejpal\phpmvc;
use matejpal\phpmvc\db\DbModel;

/**
 * Class UserModel
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package matejpal\phpmvc
*/
abstract class UserModel extends DbModel{
    abstract public function getDisplayName(): string;
}
