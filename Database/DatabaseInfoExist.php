<?php
namespace Database;

class DatabaseInfoExist
{

    public static function infoExist (\PDO $PDO, String $table_name, 
            Array $where_value)
    {
        $sql = "SELECT 1";
        $sql .= " FROM $table_name WHERE ";
        $sql .= static::makeValue($where_value);
        $sql .= " LIMIT 1";
        $stmt = $PDO->prepare($sql);
        $i = 1;
        foreach ($where_value as $value) {
            if (is_string($value)) {
                $stmt->bindParam($i, $value, \PDO::PARAM_STR);
            } else {
                $stmt->bindParam($i, $value, \PDO::PARAM_INT);
            }
            $i ++;
        }
        $stmt->execute();
        return $stmt->rowCount();
    }

    protected function makeValue (Array $where_value)
    {
        foreach ($where_value as $key => $value) {
            $sql .= "$key=? ";
        }
        $sql = substr($sql, 0, - 1);
        return $sql;
    }
}

