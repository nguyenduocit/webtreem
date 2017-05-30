<?php
session_start();
    require_once("../../autoload/autoload.php");

    class Admin extends My_Model
    {
        public function __construct()
        {
            parent::__construct();
        }


        public function actionAdd($data,$file)
        {
            // tạo mảng trổng lưu thông báo lỗi
            $error = array();
            // tạo mảng lưu các giá trị get từ form về 
            $admin = array();

            // kiểm tra giá trị name nhập vào
            if(testInputString($data['name']))
            {
                $admin['name'] = testInputString($data['name']);
            }
            else
            {
                $error[] ="name";
            }

            // kiểm tra giá trị email nhập vào 
            if(testInputString($data['email']))
            {
                $admin['email'] = testInputString($data['email']);
            }
            else
            {
                $error[] ="email";
            }

            // kiểm tra pass word
            if(!testInputString($data['password']))
            {
               $error[] ="password";
            }

            if(!testInputString($data['password2']))
            {
               $error[] ="password2";
            }

            if($data['password'] == $data['password2'] )
            {
                $admin['password'] = md5(testInputString($data['password2']));
            }
            else
            {

                $_SESSION['error'] = "Mật khẩu bạn nhập không trùng khớp.";
                rdr_url("../views/admin/index.php?action=add");
                $error[] ="password";

            }

            if(testInputString($data['phone']))
            {
                $admin['phone'] = testInputString($data['phone']);
            }
            else
            {
                $error[] ="phone";
            }

            if(testInputString($data['address']))
            {
                $admin['address'] = testInputString($data['address']);
            }
            else
            {
                $error[] ="address";
            } 


            if(testInputString($data['roles_id']))
            {
                $admin['role_id'] = testInputString($data['roles_id']);
            }
            else
            {
                $error[] ="roles_id";
            }

            if(testInputString($data['status']))
            {
                $admin['status'] = testInputString($data['status']);
            }
            else
            {
                $error[] ="status";
            }
             
            $admin['avata'] =  uploadImage($file,'admin');


            
           if (empty($error)) {
               # code...
                $where = "email = '".$admin['email']."' ";
                $data = parent::fetchwhere('admin',$where);
                if(empty($data))
                {
                    parent::insert('admin',$admin);
                    $_SESSION['success'] = "Insert thành công .";
                    rdr_url("../views/admin/index.php");

                }
                else
                {
                      $_SESSION['error'] = "Email quản trị đã tồn tại.";
                      rdr_url("../views/admin/index.php?action=add");
                }
           }
           

        }

        public function actionEdit($data,$file){
            $id = $data['id'];
            // tạo mảng trổng lưu thông báo lỗi
            $error = array();
            // tạo mảng lưu các giá trị get từ form về 
            $admin = array();

            // kiểm tra giá trị name nhập vào
            if(testInputString($data['name']))
            {
                $admin['name'] = testInputString($data['name']);
            }
            else
            {
                $error[] ="name";
            }

            // kiểm tra giá trị email nhập vào 
            if(testInputString($data['email']))
            {
                $admin['email'] = testInputString($data['email']);
            }
            else
            {
                $error[] ="email";
            }


            if(testInputString($data['phone']))
            {
                $admin['phone'] = testInputString($data['phone']);
            }
            else
            {
                $error[] ="phone";
            }

            if(testInputString($data['address']))
            {
                $admin['address'] = testInputString($data['address']);
            }
            else
            {
                $error[] ="address";
            } 


            if(testInputString($data['roles_id']))
            {
                $admin['role_id'] = testInputString($data['roles_id']);
            }
            else
            {
                $error[] ="roles_id";
            }

            if(testInputString($data['status']))
            {
                $admin['status'] = testInputString($data['status']);
            }
            else
            {
                $error[] ="status";
            }
             
            if (!empty($file['image']['name'])) {
                 # code...
                $admin['avata'] =  uploadImage($file,'admin','edit');
             }



            //pre($error);
           if (empty($error)) {
               # code...
                $user = parent::fetchwhere('admin','id = '.$id);
                

                foreach($user as $value)
                {
                    $email = $value['email'];
                }
                if($email == $admin['email'])
                {

                    $where = array('id'=>$id);
                    parent::update('admin',$admin,$where);
                    $_SESSION['success'] = "Chỉnh sửa thành công .";
                    rdr_url("../views/admin/index.php");

                }else
                {
                    $where = "email = '".$admin['email']."' ";
                    $data = parent::fetchwhere('admin',$where);
                    if(empty($data))
                    {
                        $where = array('id'=>$id);
                        parent::update('admin',$admin,$where);
                        $_SESSION['success'] = "Chỉnh sửa thành công .";
                        rdr_url("../views/admin/index.php");

                    }
                    else
                    {
                          $_SESSION['error'] = "Email quản trị đã tồn tại.";
                          rdr_url("../views/admin/index.php?action=add");
                    }

                }
            }else{
                //rdr_url("../views/admin/index.php?action=edit&id".$id);
            }
           
           
        }

        public function delete($data)
        {
            if (isset($_GET['id'])) {
                # code...
                $id = $_GET['id'];
                settype ($id, "int");
                $this->_del($id);
            }else{
                $_SESSION['error'] = "Admin không tồn tại";
                rdr_url("../views/admin/index.php"); 
            }
            
        }


        public function deleteall($data)
        {
            $ids = $_POST['ids'];
            foreach ($ids as  $id) {
                # code...
                $this-> _del($id);
                }
        }
            


        public function _del($id,$rediect = true)
        {

            $data = parent::fetchid('admin',$id);
            if(!empty($data))
            {
                parent::delete('admin',$id);
                $_SESSION['success'] = "Admin đã được xóa.";
                rdr_url("../views/admin/index.php"); 
                
            }
            else
            {
                $_SESSION['error'] = "Admin không tồn tại";
                
            }
        }


        // end class
    }





   $actionAdmin = new Admin();
    switch($_REQUEST['action']){
        case 'add':
            if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $actionAdmin ->actionAdd($_REQUEST,$_FILES);
                }
        break;
        case 'edit':
            if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $actionAdmin ->actionEdit($_REQUEST,$_FILES);
                }  
            break;
        case 'delete':
                if($_SERVER['REQUEST_METHOD']=='GET')
                {
                    $actionAdmin ->delete($_REQUEST);
                } 
            break;
        case 'deleteall':
            # code...
                    $actionAdmin ->deleteall($_REQUEST);
            break;
        
        default:
           
            break;

    }


?>