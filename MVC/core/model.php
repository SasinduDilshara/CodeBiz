<?php

class Model
{
	protected $_db,$_table,$_modelName,$_softDelete=false ,$_columnNames =[];
	public $id;
	//$table=  ' _session' given as UserSession
	public function __construct($table)
	{
		$this->_db=DB::getInstance();
		$this->_table = $table;
		$this->_setTableColumns();
		$this->_modelName = str_replace(' ', '', ucwords(str_replace('_',' ', $this->_table)));
		//replace _ with space. ucwords make the first letter capital. after it ither method remove the string

		//$table=  'user_session' given as UserSession
	}

	protected function _setTableColumns()
	{
		// $params = $this->_softDeleteParams($params);
		$columns = $this->get_columns();
		//dnd($columns);

		foreach($columns as $column)
		{	
			$columnName=$column->Field;
			// var_dump($column);
			// var_dump($columnName);
			$this->_columnNames[] = $column->Field; //append wenawa
			$this->{$columnName} = null;
		}
	}

	protected function get_columns()
	{
		return $this->_db->get_coloumns($this->_table);	//coloumns because on db class
	}

	protected function _softDeleteParams($params)
	{
		// dnd($this->_softDelete);
		if($this->_softDelete)
		{
			if(array_key_exists('conditions',$params))
			{
				// dnd($params['conditions']);
				if(is_array($params['conditions']))
				{
					$params['conditions'][]="deleted != 1";
					// dnd($params['conditions']);
				}
				else//param eke string 1 nam
				{
					$params['conditions'].=" AND deleted !=1";
					// dnd($params);
				}
			}
			else
			{
				$params['conditions'] ="deleted != 1";
			}
		}
		return $params;//doesn't softdelete
	}

	public function find($params=[])
	{
		$params = $this->_softDeleteParams($params);
		$results =[];

		$resultsQuery = $this->_db->find($this->_table, $params);

		if(!$resultsQuery)
		{
			return [];
		}

		foreach($resultsQuery as $result)
		{
			$obj = new $this->_modelName($this->_table);

			$obj->populateObjData($result);

			$results[] =$obj;//append
		}

		return $results; 
	}

	public function findFirst($params=[])
	{
		// dnd($params);
		// dnd($this->_table);
		$params = $this->_softDeleteParams($params);
		// dnd($params);
		$resultQuery = $this->_db->findFirst($this->_table, $params);
		$result = new $this->_modelName($this->_table);
		//$result->$obj->populateObjData($resultQuery);
		if($resultQuery)
		{
			$result->populateObjData($resultQuery);
		}
		else
		{
			$result=false;
		}
		// dnd($resultQuery);
		return $result;
	}


	public function save()
	{
	// {	dnd("klk");
		$fields = [];
		foreach($this->_columnNames as $column)
		{
		// {	dnd("klkm");
			$fields[$column] = $this->$column;
		}
		//determine whether to update or insert
		if(property_exists($this, 'id') && $this->id != '')
		{
			return $this->update($this->id , $fields);
			//dnd("klk");
		}
		else
		{	
			// dnd($fields);
			// dnd($this->insert($fields));
			return $this->insert($fields);
		}

	}


	public function findById($id)
	{
		return $this->findFirst(['conditions'=>"id = ?", 'bind' => [$id]]);
	}

	public function insert($fields)
	{	
		// dnd($fields);
	
		if(empty($fields))return false;
		// dnd("abc");
		return $this->_db->insert($this->_table, $fields);
	}


	public function update($id ,$fields)
	{
		if(empty($fields) || $id== "") return false;
		return $this->_db->update($this->_table, $id ,$fields);
	}

	public function delete($id = '')
	{
			// echo '34	';
		// dnd($id);
		// dnd( $this->id );
			if($id =="" && $this->id == '') return false;
		//if($id == '') $id = $this->id;
		// dnd($id);
		$id=($id =='')? $this->id : $id;
		if($this->_softDelete)
		{
			// dnd("klklk");
			// dnd($id);
			return $this->update($id, ['deleted' => 1]);
		}
		return $this->_db->delete($this->_table, $id);
	}

	public function query($sql,$bind = [])
	{
		return $this->_db->query($sql,$bind);
	}

	public function data()
	{
		$data = new stdClass();
		foreach($this->_columnNames as $column)
		{
			$data->column = $this->column;
		}
			return $data;
	}

	public function assign($params)
	{	
		// dnd($params);
		if(!empty($params))
		{
			foreach($params as $key => $val)
			{
				if(in_array($key, $this->_columnNames))
				{
					$this->$key = sanitize($val);
					
				}
			}
			return true;
		}
		return false;
	}

 
 	protected function populateObjData($result)
 	{
 		foreach($result as $key =>$val)
			{
				$this->$key =$val;
				
			}
 	}

    

}

?>