<?php

class AccountsController extends Controller
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
    // $account = $this->AccountsModel->findByUserId(currentUser()->id);
    $account=currentUser();
    // dnd(findByUserId(currentUser()->id,['order'=>'lname, fname']));
    // dnd($account);
    $this->view->account=$account;
    $this->view->render('accounts/index');
  }

  public function detailsAction($id)
  {
    // dnd($id);
    $account = currentUser();//cast is a security to check its a number
    // dnd($contact);
    if(!$account){
      Router::redirect('accounts');//no contact
    }
    $this->view->account = $account;
    $this->view->render('accounts/details');
  }

    public function deleteAction($id)
   {
    $account = currentUser();
    $id=$account->id;
    // dnd($id);
    // $account->logout();
    
    $account = $this->UsersModel->delete($id);
    // dnd($account->deleted);
    // echo '5';
    // dnd($id);
    // dnd($account->logout());
// dnd(currentUser());
    //cast is a security to check its a number
    // dnd($account);
    
    // if($account){
    //   $account->delete(); 
      // Session::addMsg('success','Contact has been deleted.');
   // }
    Router::redirect('register/logout');
  }


  public function editAction($id)
  {
    // dnd($id);
    $validation = new Validate();
    $account = currentUser();
    // dnd($contact->fname);

    if(!$account) Router::redirect('accounts');

    if($_POST)
    {
      $account->assign($_POST); //form validation
      // dnd($contact->assign($_POST));
    $validation->check($_POST,[
                'fname'=>[
                    'display' => 'First Name'
                    // 'required' => true
                ],
                'lname'=>[
                    'display' => 'Last Name'
                    // 'required' => true
                ],
                'username' => [
                    'display' => 'username',
                    // 'required' => true,
                    // 'unique' => 'users'
                    //'valid_email' => true
                    'min'=> 4
                    //'max' =>25
                ],
                'email' => [
                    'display' => 'Email',
                    'required' => true,
                    // 'unique' => 'users'
                    'valid_email' => true,
                    'min'=> 4
                    //'max' =>25
                ],
                'password' => [
                    'display' => 'Password',
                    // 'required' => true,
                    'min' => 6
                    //'max' => 100
                ],
                'address' => [
                    'display' => 'Address',
                    // 'required' => true,
                    'min' => 6
                    //'max' => 100
                ],
                // 'phoneNumber' => [
                //     'display' => 'Contact Number 1',
                //     'required' => true,
                //     'min' => 10,
                //     'max' => 10
                // ],
                'phoneNumber2' => [
                    'display' => 'Contact Number 2',
                    'min' => 10
                    //'max' => 100
                ],
                'serviceType' => [
                    'display' => 'Service Type'
                    // 'required' => true
                    
                ],
                'userType' => [
                    'display' => 'User type'
                    // 'required' => true
                    //'max' => 100
                ],
                'customerResidence' => [
                    'display' => 'Customer Residence',
                    // 'required' => true
                    //'max' => 100
                ],

                'confirm' => [
                    'display' => 'Confirm Password',
                    // 'required' => true,
                    'matches' => 'password'

                ]
            ]);

      
      // dnd($_POST);
      
      if($validation->passed())
      { 
      // dnd($contact->deleted);
        // $contact->assign($_POST);
        // dnd()
      // dnd($contact->save());
        $account->save();

        Router::redirect('accounts');
      }
    }

    $this->view->displayErrors=$validation->displayErrors();
    $this->view->account = $account;
    // $this->view->postAction = PROOT . 'register' . DS . 'edit' . DS . $account->id;
    $this->view->render('accounts/edit');
  }



 }

 ?>