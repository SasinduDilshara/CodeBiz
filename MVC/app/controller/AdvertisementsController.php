<?php

class AdvertisementsController extends Controller
{
	public function __construct($controller , $action)
	{
		parent::__construct($controller , $action);
		$this->view->setLayout('defaultlay');
		$this->load_model('Advertisements');
		//dnd($this->load_model('advertisements'));
	}



	public function indexAction()
	{
		$advertisements = $this->AdvertisementsModel->findByUserId(currentUser()->id,['order'=>'topic, location']);
		// dnd($Advertisements);
		$this->view->advertisements=$advertisements;
		$this->view->render('advertisements/index');
	}

	public function addAction()
	{	
		$advertisement = new Advertisements();
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
			$advertisement->deleted=0;
			// dnd($advertisement->deleted);
				// $advertisement->assign($_POST);
				// dnd()
			// dnd($advertisement->save());
			// dnd($advertisement);
				$advertisement->save();

				Router::redirect('advertisements');
			}
			
			
		}
		// else
		// {

		// 	dnd("jkj");
		// }
		$this->view->displayErrors=$validation->displayErrors();
		$this->view->advertisement = $advertisement;
		$this->view->postAction=PROOT.'advertisements'.DS.'add';
		// dnd($this->view->postAction);
		$this->view->render('advertisements/add');
	}


  public function detailsAction($id)
  {
  	// dnd($id);
    $advertisement = $this->AdvertisementsModel->findByIdAndUserId((int)$id,currentUser()->id);//cast is a security to check its a number
    // dnd($advertisement);
    if(!$advertisement){
      Router::redirect('advertisements');//no advertisement
    }
    $this->view->advertisement = $advertisement;
    $this->view->render('advertisements/details');
  }


  public function editAction($id)
  {
  	// dnd($id);
  	$validation = new Validate();
    $advertisement = $this->AdvertisementsModel->findByIdAndUserId((int)$id,currentUser()->id);

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
			// dnd($advertisement->save());
				$advertisement->save();

				Router::redirect('advertisements');
			}
		}

    $this->view->displayErrors=$validation->displayErrors();
    $this->view->advertisement = $advertisement;
    $this->view->postAction = PROOT . 'advertisements' . DS . 'edit' . DS . $advertisement->id;
    $this->view->render('advertisements/edit');
  }

  public function deleteAction($id){
    $advertisement = $this->AdvertisementsModel->findByIdAndUserId((int)$id,currentUser()->id);//cast is a security to check its a number
    // dnd($advertisement);
    if($advertisement){
      $advertisement->delete(); 
      Router::redirect('advertisements');
      // Session::addMsg('success','advertisement has been deleted.');
	}
}
	
	public function searchAction()
	{	
		if($_GET)
		{
				$advertisements=$this->AdvertisementsModel->findByLocationAndType($_GET["location"],$_GET["adType"]);

			
			
			
		}
		// else
		// {

		// 	dnd("jkj");
		// }

		$this->view->advertisements = $advertisements;
		// dnd($this->view->postAction);
		$this->view->render('advertisements/search');
	

    Router::redirect('advertisements');
  

 }
}