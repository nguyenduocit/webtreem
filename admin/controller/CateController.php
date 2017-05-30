<?php
session_start();
	require_once("../../autoload/autoload.php");
	class Cate
	{
		public $db;
		public function __construct()
		{
			$this->db = new My_Model();

		}
		/*
		*hàm insert vào csdl bảng category
		*/
		public function actionAdd($data)
		{

			$error = array();
			$category = array();
			// kiểm tra giá trị name nhập vào
			if(testInputString($data['name']))
			{
				$category['name'] = testInputString($data['name']);
			}
			else
			{
				$error[] ="name";
			}
			// kiểm tra giá trị title nhập vào
			if(testInputString($data['title']))
			{
				$category['title'] = safe_title(testInputString($data['title']));
			}
			else
			{
				$category['title'] = safe_title(testInputString($data['name']));
			}
			
			// kiểm tra giá trị sort_order nhập vào
			if(testInputString($data['sort_order']))
			{
				$category['sort_order'] = testInputString($data['sort_order']);
			}
			else
			{
				$error[] ="sort_order";
			}
			// kiểm tra giá trị parent_id nhập vào
			
			$category['parent_id'] = $data['parent_id'];
			

			// kiểm tra giá trị status nhập vào
			
			$category['status'] = $data['status'];
			
			
			$category['created_at'] = get_date();
			if (empty($error)) {
				# code...
				$data_cate = $this->db->fetchwhere("category","name = '".$category['name']."' ");
				if (empty($data_cate)) 
				{
					# code...
					$this->db->insert('category',$category);
					$_SESSION['success'] = "Insert thành công danh mục.";
					rdr_url("../views/category/index.php");

				}
				else
				{
					$_SESSION['error'] = "Danh mục đã tồn tại (*).";
					rdr_url("../views/category/index.php?action=add");
				}	
			}
			else
			{
				$_SESSION['error'] = "Bạn cần nhập đầy đủ các trường có dấu (*).";
				rdr_url("../views/category/index.php?action=add");
			}
		}

		// end fuction actionAdd

		public function actionEdit($data)
		{

			$error = array();
			$category = array();
			$id = $data['id'];
			// kiểm tra giá trị name nhập vào
			if(testInputString($data['name']))
			{
				$category['name'] = testInputString($data['name']);
			}
			else
			{
				$error[] ="name";
			}
			// kiểm tra giá trị title nhập vào
			if(testInputString($data['title']))
			{
				$category['title'] = testInputString($data['title']);
			}
			else
			{
				$error[] ="title";
			}
		

			// kiểm tra giá trị sort_order nhập vào
			if(testInputString($data['sort_order']))
			{
				$category['sort_order'] = testInputString($data['sort_order']);
			}
			else
			{
				$error[] ="sort_order";
			}
			// kiểm tra giá trị parent_id nhập vào
			
			$category['parent_id'] = $data['parent_id'];
			

			// kiểm tra giá trị status nhập vào
			
			$category['status'] = $data['status'];
			
			
			$category['created_at'] = get_date();
			if (empty($error)) 
			{
				# code...
				$this->db->update('category',$category,array("id" => $id));
				$_SESSION['success'] = "Update thành công danh mục.";
				rdr_url("../views/category/index.php");	
			}
			else
			{
				$_SESSION['error'] = "Bạn cần nhập đầy đủ các trường có dấu (*).";
				rdr_url("../views/category/index.php?action=edit&{$id}");
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
				$_SESSION['error'] = "Danh mục không tồn tại";
				rdr_url("../views/category/index.php");	
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
			$where = 'parent_id = '.$id;
			$data = $this->db->fetchwhere('category',$where);
			
			if(empty($data))
			{
				$this->db->delete('category',$id);
				$_SESSION['success'] = "Danh mục đã được xóa.";
				rdr_url("../views/category/index.php");	
				
			}
			else
			{
				$_SESSION['error'] = "Tồn tại danh mục con không thể xóa . Bạn cần xóa danh mục con và sản phẩm thuộc danh mục trước";
				rdr_url("../views/category/index.php");	
			}
		}


	}

	$actionCate = new Cate();
	switch($_REQUEST['action']){
		case 'add':
      		if($_SERVER['REQUEST_METHOD']=='POST')
				{
					$actionCate ->actionAdd($_REQUEST);
				}
        break;
	    case 'edit':
	    	if($_SERVER['REQUEST_METHOD']=='POST')
				{
					$actionCate ->actionEdit($_REQUEST);
				}  
	        break;
	    case 'delete':
	        	if($_SERVER['REQUEST_METHOD']=='GET')
				{
					$actionCate ->delete($_REQUEST);
				} 
	        break;
	    case 'deleteall':
	    	# code...
	    			$actionCate ->deleteall($_REQUEST);
	    	break;
	    
	    default:
	       
	        break;

	}
		
 ?>