<?php

class DB  //never use directly. check if exists and use
{
	private static $_instance = null;
	private $_pdo, $_query, $_error = false,$_result,$_count=0,$_lastInsertID = null;

	private function __construct()
	{
		try 
		{
			$this->_pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER,DB_PASSWORD);
			// $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// $this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		}
		catch(PDOException $e)
		{
				die($e->getMessage());
		}
	}

	public static function getInstance()
	{
		if(!isset(self::$_instance))
		{
			self::$_instance = new DB();
		}
		return self::$_instance; 
	}

    public function query($sql, $params=[])
    {
    	// dnd($sql);
    	// dnd($params);
        $this->_error = false;
        if ($this->_query = $this->_pdo->prepare($sql)) {
            $x = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
                
            }

            if ($this->_query->execute()) {
                $this->_result = $this->_query->fetchALL(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
                $this->_last_insert_id = $this->_pdo->lastInsertID();
            } else {
                $this->_error = true;
            }

            return $this;
        }
    }

	protected function _read($table,$params=[])
	{
		// dnd($params);
		$conditionString = '';
		$bind = [];
		$order = '';
		$limit = '';

		//condition

		if(isset($params['conditions']))
		{
			if(is_array($params['conditions']))
			{
				foreach($params['conditions'] as $condition)
				{
					$conditionString.=''.$condition.' AND ';
				}
					$conditionString=trim($conditionString);
					$conditionString=rtrim($conditionString,' AND ');
			}
			else
			{
				$conditionString = $params['conditions'];
			}
			if($conditionString != '')
			{
			$conditionString = ' Where '.$conditionString;
		     }

		}

		//bind

		if(array_key_exists('bind', $params))
		{
			$bind = $params['bind'];
		}

		//order

		if(array_key_exists('order', $params))
		{
			$order = ' ORDER BY  '.$params['order'];
		}

		//limit
		if(array_key_exists('limit', $params))
		{
			$limit = ' LIMIT '.$params['limit'];
		}


		$sql = "SELECT * FROM {$table}{$conditionString}{$order}{$limit}";
		// dnd($bind);
		// dnd($sql);
		if($this->query($sql,$bind))
		{ 
			if(!count($this->_result))
			{ 
				return false;
			}
			else
			{ 
				return true;
			}

		}
		return true;
		


	}

	public function find($table,$params=[])
	{
		if($this->_read($table,$params))
		{
			return $this->results();
		}
		return false;
	}

	public function findFirst($table,$params=[])
{
	// $table='contacts';
	// dnd($table);
		if($this->_read($table,$params))
		{
			// dnd("dfsjjkjhsd");

			return $this->first();
		}
		return false;
	}


	public function insert($table,$fields=[])
	{	
		// dnd($fields);
		// dnd("kjkllk");
		// dnd($table);
		$fieldString = '';
		$valueString = '';
		$values = [];


		foreach($fields as $field => $value)
		{
		// {	dnd("for");
			// dnd($field);
			// dnd($value);
			$fieldString.='`'.$field .'`,';
			$valueString .='?,';
			$values[]=$value;
			// dnd($fieldString);

		}
		$fieldString=rtrim($fieldString,',');
		$valueString=rtrim($valueString,',');
		// dnd($fieldString);
		// dnd($valueString);
		// dnd($values);
		$sql="INSERT INTO {$table} ({$fieldString}) VALUES ({$valueString})";
		// dnd($sql);
		// dnd($value);
		if(!$this->query($sql,$values)->error())
		{	
			// dnd("lklk");
			return true;
		}
		// dnd("fail");
		return false;
		

	}

	public function update($table, $id , $fields=[])
	{
		$fieldString = '';
		$values = [];

		foreach($fields as $field => $value)
		{
			$fieldString.=' '.$field .'=?,';
			$valueString .='?,';
			$values[]=$value;

		}
		$fieldString=trim($fieldString);
		$fieldString=rtrim($fieldString,',');
		
		$sql="UPDATE {$table} SET {$fieldString}  Where id = {$id}";
		//echo $sql;

		if(!$this->query($sql,$values)->error())
		{
			return true;
		}
		return false;

	}

	public function delete($table, $id)
	{	
		$sql="DELETE FROM {$table}  Where id = {$id}";
		//echo $sql;

		if(!$this->query($sql,$values)->error())
		{
			return true;
		}
		return false;

	}

	public function results()
	{
		return $this->_result;
	}

	public function first()
	{
		return (!empty($this->_result))? $this->_result[0] : [];
	}

	public function count()
	{
		return $this->_count;
	}

	public function lastID()
	{
		return $this->_lastInsertID;
	}

	public function get_coloumns($table)
	{
		return $this->query("SHOW COLUMNS FROM {$table}") ->results();
	}

	public function error()
	{
		return $this->_error;
	}

}

?>