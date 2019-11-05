<?php 
class Tests extends Model{
public function __construct($user='')
	{
		$table = 'tests';
		parent:: __construct($table);
    }

    public function read($name1)
    {
        return $this->find(['conditions' => 'name = ?','bind' =>[$name1]]);

    }

}
    ?>