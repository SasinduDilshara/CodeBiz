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

			if($user && Input::get('password') == $user->password)
			{ 
				
				$remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true :false;

				// dnd($remember);
				$user->login($remember);
				Router:: redirect('');
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


	public function registerAction()
	{
     {  
        $validation = new Validate();
        $posted_values = ['fname'=>'', 'lname'=>'', 'email'=>'','username' => '' , 'password'=>'', 'confirm'=>'','address'=>'','phoneNumber2'=>'','serviceType'=>'','userType'=>'','customerResidence'=>''];
        if($_POST)
        {     
            // dnd($_POST);
        if(isset($_POST['serviceType']))
        {//to run PHP script on submit
            if(!empty($_POST['serviceType']))
            {   $temporary="";
            // Loop to store and display values of individual checked checkbox.
                foreach($_POST['serviceType'] as $selected)
                {   

                    $temporary.=$selected." AND ";
                }
                $temporary=rtrim($temporary,' AND ');
            }
            if($temporary=='' || is_null($temporary))
            {
                return Null;
            }
            else
            {
                $_POST['serviceType'] = $temporary;
            }
            
        }
           
            $posted_values = posted_values($_POST);  
            // dnd($_POST['userType']);
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
        }

        if($validation->passed())
        {
            $newUser = $this->UsersModel;
            // dnd($newUser);
            // dnd($newUser);
           
            $newUser->registerNewUser($_POST);
            // dnd($_POST);
            // dnd($newUser);
            Router::redirect('register/login');
        }
        $this->view->post = $posted_values;
        $this->view->displayErrors = $validation->displayErrors();
        $this->view->render('register/register');
    }


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


?>