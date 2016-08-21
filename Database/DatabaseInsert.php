<?php
namespace Database;

class DatabaseInsert
{

    protected $sql;

    protected $value;

    public function __construct (String $table_name)
    {
        $value = NULL;
        $this->sql = "INSERT INTO $table_name ";
    }

    public function setColumn (Array $column_value)
    {
        $this->sql .= '(';
        foreach ($column_value as $key => $v) {
            $this->value[] = $v;
            $this->sql .= "$key,";
        }
        $this->sql = substr($this->sql, 0, - 1);
        $this->sql .= ') ';
        return $this;
    }

    public function setValue (Array $insert_value = NULL)
    {
        try {
            if ($insert_value == NULL && $this->sql == NULL) {
                throw new \Exception('Class \Database\DatabaseInsert SQL error.');
            } else {
                $this->sql .= 'VALUES (';
                if($insert_value != NULL){
                    $this->value = $insert_value;
                }
                foreach ($this->value as $v) {
                    $this->sql .= "?,";
                }
                $this->sql = substr($this->sql, 0, -1);
                $this->sql .= ')';
                return $this;
            }
        } catch(\Exception $e) {
            error_log("$e->getMessage()");
            echo json_encode(6);
            exit();
        }
    }

    public function startInsert (\PDO $PDO)
    {
        $stmt = $PDO->prepare($this->sql);
        $i=1;
        foreach ($this->value as $v)
        {
            if( is_string($v) ){
                $stmt->bindParam($i, $v, \PDO::PARAM_STR);
            } else {
                $stmt->bindParam($i, $v, \PDO::PARAM_INT);
            }
            $i++;
        }
        return $stmt->execute();
    }
}

