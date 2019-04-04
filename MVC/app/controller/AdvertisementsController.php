<?php

class AdvertisementsController extends Controller
{
	public $type;
	public function __construct($controller , $action)
	{
		parent::__construct($controller , $action);
		$this->view->setLayout('defaultlay');
		$this->load_model('Cateringad');
		$this->load_model('Cleaningad');
		$this->load_model('Launderingad');
		// $this->load_model('Advertisements');
		//dnd($this->load_model('advertisements'));
	}



	public function indexAction()
	{
		$alladds=[];
		array_push($alladds, $this->CleaningadModel->findByUserId(currentUser()->id,['order'=>'topic, area']));
		array_push($alladds,$this->CateringadModel->findByUserId(currentUser()->id,['order'=>'topic, area']));
		array_push($alladds,$this->LaunderingadModel->findByUserId(currentUser()->id,['order'=>'topic, area']));
		// dnd($alladds);
		$this->view->alladds=$alladds;
		// $this->view->came=chooseDetails();
		$this->view->render('advertisements/index');
	}

	public function getHome()
	{
		$this->view->render('home/index');
		Router::redirect('');
	}

	public function chooseAction()
	{
		$this->view->render('advertisements/choose');
	}

	public function addAction($type)
	{	
		$advertisement = $this->classLoad($type);
		// $advertisement->type = $advertisement;
		$validation = new Validate();
		if($_POST)
		{

				$advertisement->assign($_POST);	//form validation
			// dnd($contact->assign($_POST));
		$validation->check($_POST,Advertisements::$addValidation);

			
			// dnd($_POST);
			
			if($validation->passed())
			{ 
			$advertisement->user_id =currentUser()->id;
			// dnd(currentUser()->id);
				// dnd("klk");
				// dnd($advertisement->assign($_POST));
			// $advertisement->deleted=0;
			// dnd($advertisement->deleted);
				// $advertisement->assign($_POST);
				// dnd()
			// dnd($advertisement->save());
			// dnd($advertisement);
			// dnd($advertisement->save());
				$advertisement->save();
				$advertisement->type =$type;

				// dnd($advertisement->type);

				Router::redirect('advertisements');
			}
			
			
		}
		// else
		// {

		// 	dnd("jkj");
		// }
		$this->view->displayErrors=$validation->displayErrors();
		$this->view->advertisement = $advertisement;
		$this->view->postAction=PROOT.'advertisements'.DS.'add'.DS.$type;
		// dnd($this->view->postAction);
		$this->view->render('advertisements/add');
	}


  public function detailsAction($type,$id)
  {
  	// dnd($id);
    $advertisement = $this->modelLoad($type)->findById((int)$id,['order'=>'topic']);//cast is a security to check its a number
    // dnd($advertisement);
    if(!$advertisement){
      Router::redirect('advertisements');//no advertisement
    }
$this->view->advertisement = $advertisement[0];
    // dnd($this->view->advertisement);
    $this->view->render('advertisements/details');
  }


  public function editAction($type,$id)
  {
  	// dnd($id);
  	$validation = new Validate();
    $advertisement = $this->modelLoad($type)->findByIdAndUserId((int)$id,currentUser()->id);

    if(!$advertisement) Router::redirect('advertisements');

    if($_POST)
    {
			$advertisement->assign($_POST);	//form validation
			// dnd($advertisement->assign($_POST));
		$validation->check($_POST,Advertisements::$addValidation);

			
			// dnd($_POST);
			
			if($validation->passed())
			{ 
			// dnd($advertisement->deleted);
				// $advertisement->assign($_POST);
				// dnd()
			// dnd($advertisement->$this->save());
				$advertisement->save();

				Router::redirect('advertisements');
			}
		}

    $this->view->displayErrors=$validation->displayErrors();
    $this->view->advertisement = $advertisement;
    $this->view->postAction = PROOT . 'advertisements' . DS . 'edit' . DS .$type.DS. $advertisement->id;
    $this->view->render('advertisements/edit');
  }

  public function deleteAction($type,$id){
    $advertisement = $this->modelLoad($type)->findByIdAndUserId((int)$id,currentUser()->id);//cast is a security to check its a number
    // dnd($advertisement);
    if($advertisement){
      $advertisement->delete(); 
      Router::redirect('advertisements');
      // Session::addMsg('success','advertisement has been deleted.');
	}
}
	
	public function searchAction()
{	
		// dnd($_GET);
		$type = $_GET["type"];
		if($_GET)
		{
				$advertisements=$this->modelLoad($type)->findBySearch($_GET["area"]);

		}

		$this->view->advertisements = $advertisements;
		// $this->view->came=chooseDetails('');
		// dnd($this->view->postAction);
		$this->view->render('advertisements/search');
	

    // Router::redirect('advertisements');
  

 }

 	public function modelLoad($type)

 	{
 		if($type === 'Cleaning')
 		{
 			$model_ = $this->CleaningadModel;
 		}
 		elseif($type === 'Catering')
 		{
 			$model_ = $this->CateringadModel;
 		}
 		elseif($type === 'Laundering')
 		{
 			$model_ = $this->LaunderingadModel;
 		}

 		return $model_;
 	}

 	public function classLoad($type)

 	{
 		if($type === 'Cleaning')
 		{
 			$class_ = new Cleaningad();
 		}
 		elseif($type === 'Catering')
 		{
 			$class_ = new Cateringad();
 		}
 		elseif($type === 'Laundering')
 		{
 			$class_ = new Launderingad();
 		}

 		return $class_;
 	}

 	public function chooseDetails($word)
 	{
 		return '<?=PROOT?>'.$word;
 	}

}