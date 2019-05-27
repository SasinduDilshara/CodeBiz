<?php

class AdminController extends Controller
{
	public function __construct($controller , $action)
	{
		parent::__construct($controller , $action);
		$this->view->setLayout('defaultlay');
		$this->load_model('Users');
    $this->load_model('Cateringad');
    $this->load_model('Cleaningad');
    $this->load_model('Launderingad');
    $this->load_model('Requests');
    $this->mediator = new ChatMediatorImpl;
		//dnd($this->load_model('Contacts'));
	}


  public function indexAction()
  {
    // $account = $this->AccountsModel->findByUserId(currentUser()->id);
    $account=currentUser();
    // dnd(findByUserId(currentUser()->id,['order'=>'lname, fname']));
    // dnd($account);
    $this->view->account=$account;
    $this->view->render('accounts/index');
    // dnd($account);
  }

  public function AllreqsAction($id)
  {
    $request=$this->RequestsModel->findByUserId($id);
  }

  public function AlladdsAction($id)
  {
    $alladds=[];
    array_push($alladds, $this->CleaningadModel->findByUserId($id,['order'=>'topic, area']));
    array_push($alladds,$this->CateringadModel->findByUserId($id,['order'=>'topic, area']));
    array_push($alladds,$this->LaunderingadModel->findByUserId($id,['order'=>'topic, area']));

    $this->view->alladds = $alladds;
    $this->view->render('admin/alladds');

  }
  public function AllaccsAction($id)
  {
    $acc=$this->UsersModel->findByUserId($id);
  }




   public function AllreqsbeforeAction($username='')
  {
    
    // if(!$request) Router::redirect('requests');
    if($username != '')
      {
        $_POST[] = [];
       $_POST['username'] = $username;
      }


    if($_POST)
    {
    $name = $_POST['username'];
    $id=$this->UsersModel->findByUsername($name)->id;
    
    $alladds=$this->RequestsModel->findByUserId($id);

    $this->view->alladds = $alladds;
    $this->view->render('admin/allreqs');
    // $this->RequestsModel->updateMessages($id,$messages);
  }
  else
  {

      // $this->view->displayErrors=$validation->displayErrors();
      
      // $this->view->chatter = username;
      $this->view->postAction = PROOT . 'admin' . DS . 'Allreqsbefore';
      $this->view->render('admin/typeadd');
  }

  }

  public function AlladdsbeforeAction($username='')
  {
    
    // if(!$request) Router::redirect('requests');
    if($username != '')
      {
        $_POST[] = [];
       $_POST['username'] = $username;
      }
    if($_POST)
    {
    $name = $_POST['username'];
    $id=$this->UsersModel->findByUsername($name)->id;
    $alladds=[];
    array_push($alladds, $this->CleaningadModel->findByUserId($id,['order'=>'topic, area']));
    array_push($alladds,$this->CateringadModel->findByUserId($id,['order'=>'topic, area']));
    array_push($alladds,$this->LaunderingadModel->findByUserId($id,['order'=>'topic, area']));

    $this->view->alladds = $alladds;
    $this->view->render('admin/alladds');
    // $this->RequestsModel->updateMessages($id,$messages);
  }
  else
  {

      // $this->view->displayErrors=$validation->displayErrors();
      
      // $this->view->chatter = username;
      $this->view->postAction = PROOT . 'admin' . DS . 'Alladdsbefore';
      $this->view->render('admin/typeadd');
  }

  }
  public function AllaccsbeforeAction()
  {
    // $acc=$this->UsersModel->findByUserId($id);

    if($_POST)
    {
    $name = $_POST['username'];
    // $id=$this->UsersModel->findByUsername($name)->id;
    
    $account=$this->UsersModel->findByUsername($name);
    if(!$account)
    {
      Router::redirect("admin/Allaccsbefore");
    }

    else{$this->view->account = $account;
    // dnd($name);
    $this->view->render('admin/allaccnts');
  }
    // $this->RequestsModel->updateMessages($id,$messages);
  }
  else
  {

      // $this->view->displayErrors=$validation->displayErrors();
      
      // $this->view->chatter = username;
      $this->view->postAction = PROOT . 'admin' . DS . 'Allaccsbefore';
      $this->view->render('admin/typeadd');
  }



  }

  public function sendNotiAction()
  {


    if($_POST)
    {
    $reci = $_POST['username'];
    $message = $_POST['message'];
    $reciever=$this->UsersModel->findByUsername($reci);
    
    // $alladds=$this->RequestsModel->findByUserId($id);

    // $this->view->alladds = $alladds;
    // $this->UsersModel->AdminsendNoti($message,$reciever);
    $this->mediator->AdminsendNotification($message,$reciever);
    $this->view->render('admin/succsend');
    // $this->RequestsModel->updateMessages($id,$messages);
  }
  else
  {

      // $this->view->displayErrors=$validation->displayErrors();
      
      // $this->view->chatter = username;
      $this->view->postAction = PROOT . 'admin' . DS . 'sendNoti';
      $this->view->render('admin/typeNotiSend');
  }

    // AdminsendNoti($message,$reciever)

  }

public function informDAccntAction($username,$email)
{
    // $account = currentUser()->findById($id);
  // dnd($username."  ".$email);
    $this->UsersModel->DeleteNoti($email);
    $this->view->username = $username;
    // dnd($this->view->username);
    $this->view->render("admin/afterAccountDelete");

}



  public function ResetaccsbeforeAction()
  {
    // $acc=$this->UsersModel->findByUserId($id);

    if($_POST)
    {
    $name = $_POST['username'];
    // $id=$this->UsersModel->findByUsername($name)->id;
    
    $account=$this->UsersModel->findByUsername($name);
    if(!$account)
    {
      // alert()
      Router::redirect("admin/Resetaccs");
    }

    else{$this->view->account = $account;
    // dnd($name);
    $this->view->render('admin/allaccnts');
  }
    // $this->RequestsModel->updateMessages($id,$messages);
  }
  else
  {

      // $this->view->displayErrors=$validation->displayErrors();
      
      // $this->view->chatter = username;
      $this->view->postAction = PROOT . 'admin' . DS . 'Allaccsbefore';
      $this->view->render('admin/typeadd');
  }


 }

 public function chatAdminAction()
 {



 }


}




interface ChatMediator {


 public function AdminsendNotification($message,$reciever);

 
 }



 class ChatMediatorImpl implements ChatMediator
  {


 public function AdminsendNotification($message,$reciever)
      {
      currentUser()->AdminsendNoti($message,$reciever);
    }
  }





 ?>