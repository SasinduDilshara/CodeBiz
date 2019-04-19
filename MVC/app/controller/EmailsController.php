<?php

class EmailsController extends Controller
{
	public function __construct($controller , $action)
	{
		parent::__construct($controller , $action);
		$this->view->setLayout('defaultlay');
		$this->load_model('Users');
		//dnd($this->load_model('Contacts'));
	}


  public function indexAction()
  {

  }

  public function forgetpasswordAction()
  {
    if($_POST)
    {
        $email = $_POST['email'];
    $user = $this->UsersModel->findByEmail($email);

    $this->view->user = $user;
    $this->UsersModel->sendforgotten($email,(string)($user->id));
    $this->view->render("emails/forgotmsgsend");
    }
    else
    {
        $this->view->render("emails/getForgetEmail");
    }


  }

  //   public function forgetpasswordButtonAction()
  // {
    
  // }

  public function verificationAction($email)
  {
        $user = $this->UsersModel->findByEmail($email);
        // dnd($user->id);
        $this->UsersModel->sendVerification($email,(string)($user->id));
        $this->view->render("emails/verisucc");
  }



 public function setActiveAction($id,$s='')
  {

        // $this->UsersModel->findByEmail($email);
        $id = (int)($id);
        $this->UsersModel->setActive($id);
        $this->view->render("emails/verified");
  }
public function getNewPasswordAction($id,$s='')
{

    $id =(int)($id);
    $user = $this->UsersModel->findById($id);
    if($_POST)
    {
        $password = $_POST['pass'];
        $user->password = $_POST['pass'];
        $this->UsersModel->updatePassword($id,$password);
        $this->view->render("emails/afterForgotDone");
    }
    else
    {
    $this->view->id = $id;

    $this->view->render("emails/getNewPassForm");
    }

}


}


//  }

//  public function setActive($id)
// {
//     $this->update($id, ['active' => 1 ]);
// }


//  https://localhost/CodeBiz/MVC/emails/setActive/'.$id.'/shdshbxhkankdxsakxnjkj3242kj434jg54hhdaksdhsxdhsbdmas

// 
 ?>