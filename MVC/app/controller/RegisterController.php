<?php


class RegisterController extends Controller
{
	public $deleted =0;

	public function __construct($controller, $action)
	{
		parent::__construct($controller , $action);
		$this->view->setLayout('defaultlay');
		$this->load_model('Users');
	}

	public function loginAction()
	
	{	
		$validation = new Validate();
		if($_POST)
		{ 
		//form validation
		$validation->check($_POST,[
			'username' => [
				'display' => "Username",
				'required' => true
			],
			'password' => [
				'display' => "Password",
				'required' => true
				
			]
		]);


		if($validation->passed())
		{
			$user = $this->UsersModel->findByUsername($_POST['username']);
			// dnd(Input::get('password'));

			// if($user && password_verify(Input::get('password'),$user->password))

            // if($user && $user->active==1)
            // { 
                
            // if($user && Input::get('password') == $user->password)
            // { 
                
            //     $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true :false;

            //     // dnd($remember);
            //     $user->login($remember);
            //     Router:: redirect('');
            // }

            // else
            // {
            // $validation->addError("Username and the password does not match");
            // }
            // }

            // else
            // {
            // $validation->addError("Email hasn't Verified, Check Your Emails.");
            // }




                
            if($user && Input::get('password') == $user->password)
            { 

            if($user && $user->active==1)
            { 
                
                $remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true :false;

                // dnd($remember);
                $user->login($remember);
                Router:: redirect('');
            }

            else
            {
            $validation->addError("Email hasn't Verified, Check Your Emails.");
            }
            }

            else
            {
            $validation->addError("Username and the password does not match");
            }





		}
	}
		//echo password_hash('password', PASSWORD_DEFAULT); // meken ena eka copy karala user data table eke password ekata dala table eke anith ewa sanya vdiyata fill karala save kala.
		$this->view->displayErrors = $validation->displayErrors();
		$this->view->render('register/login');
	
}

	public function logoutAction()
	{
		if(currentUser())
		{
			currentUser()->logout();
		}

		Router::redirect('register/login');
	}


	public function registerAction($userType)
	{
     // dnd($userType);
        $validation = new Validate();
        $posted_values = [
            'fname'=>'', 
            'lname'=>'',
             'email'=>'',
             'username' => '' ,
              'password'=>'', 
              'confirm'=>'',
              'address'=>'',
              'phoneNumber'=>'',
              'phoneNumber2'=>'',
              'area'=>'',
              'photolink'=>''
    ];
        if($_POST)
        {   


    if(isset($_POST['phoneNumber']) && $_POST['phoneNumber'] !='')
      {
      $_POST['phoneNumber'] = ($_POST['phoneNumber'][0] != '+') ? ('+94'.$_POST['phoneNumber']) : '';
      }

      if(isset($_POST['phoneNumber2']) && $_POST['phoneNumber2'] !='')
      {
      $_POST['phoneNumber2'] = ($_POST['phoneNumber2'][0] != '+') ? ('+94'.$_POST['phoneNumber2']) : '';
      }


            $_POST['userType'] = $userType;
            $_POST['notifications'] = '';
            $_POST['overallRating'] = 0;
            $_POST['ratingtimes'] = 0;
            $_POST['active'] = 0;
            $_POST['reported'] = 0;
            $_POST['reportedBy'] = '';
            $_POST['photolink'] = '';
            // dnd($_POST);
           
            $posted_values = posted_values($_POST);  
            // dnd($posted_values);
            // dnd($_POST['userType']);
            $validation->check($_POST,[
                'fname'=>[
                    'display' => 'First name'
                    // 'required' => true
                ],
                'lname'=>[
                    'display' => 'Last name'
                    // 'required' => true
                ],
                'username' => [
                    'display' => 'username',
                    // 'required' => true,
                    'unique' => 'users',
                    //'valid_email' => true
                    'min'=> 4
                    //'max' =>25
                ],
                'email' => [
                    'display' => 'Email',
                    'required' => true,
                    'unique' => 'users',
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
                'phoneNumber' => [
                    'display' => 'Contact Number',
                    // 'required' => true,
                    'min' => 9
                    // 'max' => 9
                ],
                'phoneNumber2' => [
                    'display' => 'Contact Number 2',
                    'min' => 9
                    // 'max' => 9
                ],
                'confirm' => [
                    'display' => 'Confirm Password',
                    // 'required' => true,
                    'matches' => 'password'

                ],
                'area' => [
                    'display' => 'City',
                    'required' => true
                    
                ],

            ]);
        }

        if($validation->passed())
        {
            $newUser = $this->UsersModel;
            // dnd($newUser);
            // dnd($newUser);
           
            $newUser->registerNewUser($_POST);
            // dnd($_POST);
            // dnd($newUser);
            // $newUser->login();

            // Router::redirect('register/login');
            Router::redirect('emails/verification/'.$newUser->email);
            // verificationAction($newUser->email,$newUser->id);




        }
        $this->view->post = $posted_values;
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/register');


    }

    public function confirmedAction($servicerId,$reqId)
    {
        // dnd($servicerId);
        $reqId = (int)$reqId;
        $servicer = $this->UsersModel->findByUserId((int)$servicerId);
        // dnd($servicer->id);
        $servicer = $servicer[0];
        $rate = $servicer->overallRating * (int)($servicer->ratingtimes);
    if($_POST)
    {
        $newRate = (string)$_POST['overallRating'];
        $rate+=$_POST['overallRating'];
        $ratingtimes = (int)($servicer->ratingtimes) + 1;
        // $ratetimes =$_POST['ratetimes'];
        $servicer->overallRating = $rate/$ratingtimes;
        $rate = $rate/$ratingtimes;
        $this->view->servicer = $servicer;
        $this->view->rate = $rate;
        $result = $this->UsersModel->markRate($servicer->id , $rate, $ratingtimes);
        Router::redirect('requests/markrate' . DS . $reqId .DS . $newRate . DS . $servicer->username);
    }
    else
    {

        // $this->view->displayErrors=$validation->displayErrors();
        $this->view->servicer = $servicer;
        // $this->view->chatter = username;
        $this->view->postAction = PROOT . 'register' . DS . 'confirmed' . DS . $servicerId . DS . $reqId;
        $this->view->render('requests/askRating');
    }
    }

    public function confirmedADDAction($servicerId,$reqId,$type)
    {
        // dnd($servicerId);
        $reqId = (int)$reqId;
        $servicer = $this->UsersModel->findByUserId((int)$servicerId);
        // dnd($servicer->id);
        $servicer = $servicer[0];
        $rate = $servicer->overallRating * (int)($servicer->ratingtimes);
    if($_POST)
    {
        $newRate = (string)$_POST['overallRating'];
        $rate+=$_POST['overallRating'];
        $ratingtimes = (int)($servicer->ratingtimes) + 1;
        // $ratetimes =$_POST['ratetimes'];
        $servicer->overallRating = $rate/$ratingtimes;
        $rate = $rate/$ratingtimes;
        $this->view->servicer = $servicer;
        $this->view->rate = $rate;
        $result = $this->UsersModel->markRate($servicer->id , $rate, $ratingtimes);
        Router::redirect('advertisements/markrate' . DS . $reqId .DS . $newRate . DS . $servicer->username.DS.$type.DS.(string)($servicerId));
    }
    //a
    else
    {

        // $this->view->displayErrors=$validation->displayErrors();
        $this->view->servicer = $servicer;
        // $this->view->chatter = username;
        $this->view->postAction = PROOT . 'register' . DS . 'confirmedADD' . DS . $servicerId . DS . $reqId . DS . $type;
        $this->view->render('advertisements/askRating');
    }
    }






		//dnd($user);
			// if($user && password_verify(Input::get('password')))
			//dnd(Input::get('password'));
			//var_dump($user);
			// if($user)
			// {
			// 	echo 9;
			// }
			// var_dump(Input::get('password'));
			// var_dump($user->password);
			// var_dump(password_verify(Input::get('password'),$user->password));
			// echo 2;
			//var_dump(password_verify("abcud","abcd"));
			// echo 1;
			
			// var_dump($user && password_verify(Input::get('password'),$user->password));

			// // if($user && password_verify(Input::get('password'),$user->password))
			// dnd(isset($_POST['remember_me']));


        public function reportAction($type,$id,$user_id,$other='')
    {
        $add=$this->UsersModel->findById($id);
        $this->UsersModel->MarkReport($type,$id,$user_id,$other,$add);
        // dnd("".$type.(string)$id.(string)$user_id.$other);

        if($add->reported>=3)//time delay makes it four
        {
            // dnd("p");
        $reciever = currentUser()->findById($add->user_id);
        currentUser()->ReportNoti("aa",$add,$add);
    }

        if($add->reported>=4)
    {
        $admins = currentUser()->findByUserType("Admin");
        foreach($admins as $a)
        {
        currentUser()->ReportAdminNoti("aa",$add,$a);
    }
    }


        Router::redirect("accounts/details/$id");


    }
}


?>