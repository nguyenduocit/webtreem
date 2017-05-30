<?php
session_start();
	require_once("../../autoload/autoload.php");
	class User extends My_Model{
		public function __construct()
		{
			parent::__construct();
		}

		// đăng nhập 
		public function login($data)
		{
			// tạo mảng trổng lưu thông báo lỗi
            $error = array();
            // tạo mảng lưu các giá trị get từ form về 
            $user = array();

            // kiểm tra giá trị email nhập vào 
            if(testInputString($data['email']))
            {
                $user['email'] = testInputString($data['email']);
            }
            else
            {
                $error[] ="email";
            }

            // kiểm tra giá trị password nhập vào
            if(testInputString($data['pass']))
            {
                
                $user['password'] = md5(testInputString($data['pass']));
            }
            else
            {
                $error[] ="pass";
            }


            if(empty($error))
            {
            	
            	$where = " email =  '".$user['email']."' AND password = '".$user['password']."' AND status = 1";

            	$data = parent::fetchwhere('admin',$where);

            	if(empty($data))
            	{
            		$_SESSION['error_login'] ="Tài khoản không đúng hoặc chưa được kích hoạt .";
            		rdr_url('../views/index.php');
            	}


                foreach ($data as $value)
                {
                    $_SESSION['id'] = $value['id'];
                    $_SESSION['name'] = $value['name'];
                    $_SESSION['email'] = $value['email'];
                    $_SESSION['role_id'] = $value['role_id'];
                    $_SESSION['image']    = $value['avata'];
                }

                redirect_to('admin/views/home/index.php');
            }

		}

		public function logout($id,$role_id)
		{
            if(isset($id) && isset($role_id))
            {
               $_SESSION = array(); // xoa het array cua session
                session_destroy();
                setcookie(session_name(),'',time() - 36000);
                redirect_to('admin/views/');
            }else
            {
                redirect_to('admin/views/');
            }

		}


	}

	$users= new User();

	 switch($_REQUEST['action']){
	 	case 'login':
	 		# code...
	 		$login = $users->login($_REQUEST);
	 		
	 		break;
	 	case 'logout':
	 		# code...
                if(isset($_SESSION['id']) && isset($_SESSION['role_id']))
                {
                  $id = $_SESSION['id'] ;
                  $role_id= $_SESSION['role_id'];
                }
                $users->logout($id,$role_id);
	 		break;
	 }
?>