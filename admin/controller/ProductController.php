<?php
session_start();
    require_once("../../autoload/autoload.php");

    class Product extends My_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        // thêm mói sản phẩm 
        public function actionAdd($data,$file)
        {
            // tạo mảng trổng lưu thông báo lỗi
            $error = array();
            // tạo mảng lưu các giá trị get từ form về 
            $product = array();

            // kiểm tra giá trị  nhập vào từ form 
            if(testInputString($data['name']))
            {
                $product['name'] = testInputString($data['name']);
            }
            else
            {
                $error[] ="name";
            }

            
            if(testInputString($data['title']))
            {
                $product['slug'] = testInputString($data['title']);
            }
            elseif(empty($data['title']))
            {
                $product['slug'] = safe_title(testInputString($data['name']));
            }

            if(testInputString($data['price']))
            {
                $product['price'] = testInputString($data['price']);
            }
            else
            {
                $error[] ="price";
            }

            if(testInputString($data['hot']))
            {
                $product['hot'] = testInputString($data['hot']);
            }
            else
            {
                $product['hot'] = 0;
            }


            if(testInputString($data['sale']))
            {
                $product['sale'] = testInputString($data['sale']);
            }
            else
            {
                $product['sale'] = " ";
            } 


            if(testInputString($data['qty']))
            {
                $product['qty'] = testInputString($data['qty']);
            }
            else
            {
                $error[] ="qty";
            }

            if(testInputString($data['parent_id']))
            {
                $product['category_id'] = testInputString($data['parent_id']);
            }
            else
            {
                $error[] ="parent_id";
            }


            if(testInputString($data['content']))
            {
                $product['content'] = testInputString($data['content']);
            }
            else
            {
                $error[] ="content";
            }




            if(testInputString($data['status']))
            {
                $product['status'] = testInputString($data['status']);
            }
            else
            {
                $error[] ="status";
            }
             if ($file) {
                 # code...
                $product['thunbar'] =  uploadImage($file,'product');
             }else{
                $product['thunbar'] =  '';
             }
            
            // nếu các trường yêu cầu người dùng nhập đã đầy đủ
           if (empty($error)) {
               # code...
                // insert dữ liệu vào csdl
                parent::insert('product',$product);
                $_SESSION['success'] = "Insert thành công .";
                rdr_url("../views/product/index.php");
          
           }else{
                // Thông báo người dùng cần điền đầy đủ các trường 
                $_SESSION['error'] = "Bạn cần điền đầy đủ các trường có dấu sao .";
                rdr_url("../views/product/add.php");
           }

           

        }

        // chỉnh sửa sản phẩm 
        public function actionEdit($data,$file)
        {
            //pre($data);
            // tạo mảng trổng lưu thông báo lỗi
            $error = array();
            // tạo mảng lưu các giá trị get từ form về 
            $product = array();

            // kiểm tra giá trị  nhập vào từ form 
            if(testInputString($data['name']))
            {
                $product['name'] = testInputString($data['name']);
            }
            else
            {
                $error[] ="name";
            }

            
            if(testInputString($data['title']))
            {
                $product['slug'] = testInputString($data['title']);
            }
            elseif(empty($data['title']))
            {
                $product['slug'] = safe_title(testInputString($data['name']));
            }

            if(testInputString($data['price']))
            {
                $product['price'] = testInputString($data['price']);
            }
            else
            {
                $error[] ="price";
            }

            if(testInputString($data['sale']))
            {
                $product['sale'] = testInputString($data['sale']);
            }
            else
            {
                $product['sale'] = " ";
            } 
            if(isset($data['hot'])){
                if(testInputString($data['hot']))
                {
                    $product['hot'] = testInputString($data['hot']);
                }
                
            }else
            {
                $product['hot'] = 0;
            }
            


            if(testInputString($data['qty']))
            {
                $product['qty'] = testInputString($data['qty']);
            }
            else
            {
                $error[] ="qty";
            }

            if(testInputString($data['parent_id']))
            {
                $product['category_id'] = testInputString($data['parent_id']);
            }
            else
            {
                $error[] ="parent_id";
            }


            if(testInputString($data['content']))
            {
                $product['content'] = testInputString($data['content']);
            }
            else
            {
                $error[] ="content";
            }




            if(testInputString($data['status']))
            {
                $product['status'] = testInputString($data['status']);
            }
            else
            {
                $error[] ="status";
            }


            if (!empty($file['image']['name'])) {
                 # code...
                $product['thunbar'] =  uploadImage($file,'product','edit');
             }

            $id = $data['id'];
            //pre($error);

            // kiểm tra nếu các giá trị đã được điền đầy đủ
            if (empty($error)) 
            {
                # code...
                // update vào cơ sở dữ liệu
                parent:: update('product',$product ,array("id" => $id));
                $_SESSION['success'] = "Chỉnh sửa thành công sản phẩm.";
                rdr_url("../views/product/index.php"); 
            }
            else
            {
                // thông báo lỗi
                $_SESSION['error'] = "Bạn cần nhập đầy đủ các trường có dấu (*).";
                rdr_url("../views/product/index.php?action=edit&{$id}");
            }


        }

        // xóa sản phẩm 
        public function deletes($data)
        {
            if (isset($_GET['id'])) {
                # code...
                $id = $_GET['id'];
                settype ($id, "int");
                $this->_del($id);
            }else{
                $_SESSION['error'] = "Sản phẩm không tồn tại";
                rdr_url("../views/product/index.php"); 
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

            $data = parent::fetchid('product',$id);
            if(!$data)
            {
                
                $_SESSION['error'] = "Sản phẩm  không tồn tại";
                if($rediect){
                    rdr_url("../views/product/index.php");
                }else{
                    return false;
                }
            }
                
            parent::delete('product',$id);

            foreach ($data as $key => $value) {
                # code...
                $link_img = url().'upload/product/'.$value['thunbar'];
            }
            if(file_exists($link_img))
            {
                unlink($link_img);
            }

            $_SESSION['success'] = "Sản phẩn đã được đã được xóa.";
            rdr_url("../views/product/index.php"); 
           
        }


        // end class
    }





   $actionProduct = new Product();
    switch($_REQUEST['action']){
        case 'add':
            if($_SERVER['REQUEST_METHOD']=='POST')
                {
                   
                    $actionProduct ->actionAdd($_REQUEST,$_FILES);
                }
        break;
        case 'edit':
            if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    
                    $actionProduct ->actionEdit($_REQUEST,$_FILES);
                }  
            break;
        case 'delete':
                if($_SERVER['REQUEST_METHOD']=='GET')
                {
                    $actionProduct ->deletes($_REQUEST);
                } 
            break;
        case 'deleteall':
            # code...
                    $actionProduct ->deleteall($_REQUEST);
            break;
        
        default:
           
            break;

    }


?>