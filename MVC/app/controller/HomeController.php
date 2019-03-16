<?php

class HomeController extends Controller
{
	public function __construct($controller , $action)
	{
		parent::__construct($controller , $action);
	}

	protected function load_model($model)
	{	dnd($model);
		if(class_exists($model))
		{	
			// dnd('rtrtt');
			$this->{$model.'Model'} = new $model(strtolower($model));
		}
		// dnd("hjh");
	}

	public function indexAction()//$name/)
{
	// {	self::load_model("Users");
	// 	dnd($this->{$model.'Model'});



	//dnd($_SESSION);
		// $db=DB::getInstance();
		// // $fields =[
		// // 	'fname' =>'sasiyaaaaaaa',
		// // 	'lname'=>'alaaaa'];
		// //$sql = "SELECT * FROM user_details";
		// // $details= $db->query("SELECT * FROM user_details ORDER BY lname,fname")->first();
		// $details=$db->findFirst('user_details',[
		// 	'conditions' => ['lname=?'],//["lname"=>"?", 'fname' => 'sasiyaaaaaaa'],DB wrapper 6
		// 	'bind' => ['alaaaa'],
		// 	'order' => "lname,fname",
		// 	//'limit' => 1

		// ]);

		// //$detail = $details->results();
		// //dnd($details);
		// //dnd($details);
		// //die('welcome to the home controller. This is the index Action.');
		// //echo $name; // directry 1n passe parameters gannawa
		//ddnd($_SESSION);
		$this->view->render('home/index');
	}
}

?>
