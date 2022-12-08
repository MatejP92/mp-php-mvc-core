<?php
/** User: Matej */

namespace matejpal\phpmvc\db;
use matejpal\phpmvc\Application;
use matejpal\phpmvc\Model;

/**
 * Class DbModel
 * 
 * @author Matej Pal <matejpal92@gmail.com>
 * @package matejpal\phpmvc\db
*/

abstract class DbModel extends Model{
    abstract public static function tableName(): string;

    abstract public function attributes(): array;
    public static function primaryKey(): string{
        return 'id';
    }

    public function save(){
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).") VALUES (".implode(',', $params).")");
        foreach ($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    static public function findOne($where){ // [email => <database email>, firstname => <firstname>]...
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn($attr)=>"$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        // SELECT * FROM $tableName WHERE email = :email AND firstname = :firstname
        foreach($where as $key => $item){
            $statement->bindValue(":$key", $item);
        }

        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public static function prepare($sql){
        return Application::$app->db->pdo->prepare($sql);
    }
}