<?php
namespace Database;

use \StandardRequest\Request as Request;

class DatabaseInsert
{    
    public static function startInsert(Request $Request, \PDO $PDO, Array $column_list, $table_name)
    {
        $sql = "INSERT INTO $table_name (";
        $sql .= static::makeColumn($column_list);
        $sql .= ') VALUES (';
        $sql .= static::makeValue($column_list);
        $sql .= ')';
        $stmt = $PDO->prepare($sql);
        for($i=0, $j = count($column_list) ; $i < $j ; $i++)
        {
            $stmt->bindParam($i + 1, $column_list[$i]);
        }
        $result = $stmt->execute();
        return $result;
    }
    
    protected static function makeColumn(Array $column_list)
    {
        $column_sql = "";
        foreach($column_list as $value)
        {
            $column_sql .= "$value,"; 
        }
        $column_sql = substr($column_sql, 0, -1);
        //You can see the manual to learn the details of the substr function;
        return $column_sql;
    }
    
    protected static function makeValue(Array $column_list)
    {
        $value_sql = '';
        foreach($column_list as $value)
        {
            $value_sql .= '?,';
        }
        $value_sql = substr($value_sql, 0, -1);
        return $value_sql;
    }
}

