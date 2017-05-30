<?php
session_start();
	require_once("../../autoload/autoload.php");

	class News extends My_Model{
		public function __construct(){
			parent::__construct();
		}


		public function actionAdd($data,$file)
		{
			$error = array();

			$news = array();

			if(testInputString($data['title']))
			{
				$news['title'] = testInputString($data['title']);
			}
			else
			{
				$error[] ="title";
			}


			if(testInputString($data['intro']))
			{
				$news['intro'] = testInputString($data['intro']);
			}
			else
			{
				$error[] ="intro";
			}

			if(testInputString($data['content']))
			{
				$news['content'] = testInputString($data['content']);
			}
			else
			{
				$error[] ="content";
			}



            if(testInputString($data['status']))
            {
                $news['status'] = testInputString($data['status']);
            }
            else
            {
                $error[] ="status";
            }
             if ($file) {
                 # code...
                $news['image_link'] =  uploadImage($file,'news');
             }else{
                $news['image_link'] =  ' ';
             }

             if(empty($error)){

             	if(parent::insert('news',$news))
             	{
             		$_SESSION['success'] = "Insert thành công .";
                	rdr_url("../views/news/index.php");
             	}
             }else{
                // Thông báo người dùng cần điền đầy đủ các trường 
                $_SESSION['error'] = "Bạn cần điền đầy đủ các trường có dấu sao .";
                rdr_url("../views/news/add.php");
           }

             

		}

		public function actionEdit($data,$file)
		{
			$id = $data['id'];


			$error = array();

			$news = array();

			if(testInputString($data['title']))
			{
				$news['title'] = testInputString($data['title']);
			}
			else
			{
				$error[] ="title";
			}


			if(testInputString($data['intro']))
			{
				$news['intro'] = testInputString($data['intro']);
			}
			else
			{
				$error[] ="intro";
			}

			if(testInputString($data['content']))
			{
				$news['content'] = testInputString($data['content']);
			}
			else
			{
				$error[] ="content";
			}



            if(testInputString($data['status']))
            {
                $news['status'] = testInputString($data['status']);
            }
            else
            {
                $error[] ="status";
            }
             
            if (!empty($file['image']['name'])) {
                 # code...
                $news['image_link'] =  uploadImage($file,'news','edit');
            }


             if(empty($error)){

             	if(parent::update('news',$news,array("id" => $id)))
             	{
             		$_SESSION['success'] = "Chỉnh sửa  thành công .";
                	rdr_url("../views/news/index.php");
             	}
             }else{
                // Thông báo người dùng cần điền đầy đủ các trường 
                $_SESSION['error'] = "Bạn cần điền đầy đủ các trường có dấu sao .";
                rdr_url("../views/news/add.php");
           }


		}

		// xóa sản phẩm 
        public function delete($data)
        {
            if (isset($_GET['id'])) {
                # code...
                $id = $_GET['id'];
                settype ($id, "int");
                $this->_del($id);
            }else{
                $_SESSION['error'] = "Tin tức không tồn tại";
                rdr_url("../views/news/index.php"); 
            }
            
        }

        // Xóa tất cả sản phẩm 
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

            $data = parent::fetchid('news',$id);
            if(!$data)
            {
                
                $_SESSION['error'] = "Tin tức không tồn tại";
                if($rediect){
                    rdr_url("../views/news/index.php");
                }else{
                    return false;
                }
            }
                
            parent::delete('news',$id);

            $_SESSION['success'] = "Tin tức đã được đã được xóa.";
            rdr_url("../views/news/index.php"); 
           
        }


        // end class
	}


	$actionNews = new News();
    switch($_REQUEST['action']){
        case 'add':
            if($_SERVER['REQUEST_METHOD']=='POST')
                {
                   
                    $actionNews ->actionAdd($_REQUEST,$_FILES);
                    
                }
        break;
        case 'edit':
            if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    
                    $actionNews ->actionEdit($_REQUEST,$_FILES);
                    pre($_REQUEST);
                }  
            break;
        case 'delete':
                if($_SERVER['REQUEST_METHOD']=='GET')
                {
                    $actionNews ->delete($_REQUEST);
                } 
            break;
       
    }

?>