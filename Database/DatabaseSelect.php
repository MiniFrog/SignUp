<?php
namespace Database;

class DatabaseSelect
{

    protected $sql;

    protected $value;

    public function __construct ($table_name, Array $column_name)
    {
        $this->sql = 'SELECT ';
        foreach ($column_name as $value) {
            $this->sql .= "$value,";
        }
        $this->sql = substr($this->sql, 0, - 1);
        $this->sql .= " FROM $table_name ";
    }

    public function startSelect (\PDO $PDO)
    {
        $stmt = $PDO->prepare($this->sql);
        $i = 1;
        foreach ($this->value as $v){
            if( is_string($v) ){
                $stmt->bindParam($i, $v, \PDO::PARAM_STR);
            } else {
                $stmt->bindParam($i, $v, \PDO::PARAM_INT);
            }
            $i++;
        }
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function setWhere (Array $where)
    {
        $this->sql .= 'WHERE ';
        foreach ($where as $key => $value) {
            $this->sql .= "$key=? AND ";
            $this->value[] = $value;
        }
        return $this;
    }
}

