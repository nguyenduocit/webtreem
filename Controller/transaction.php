<?php
session_start();
	require_once("../autoload/autoload.php");

	class Transation extends My_Model{
		public function __construct()
		{
			parent::__construct();
		}


		public function addInfo($data,$sesion)
		{
			//tạo mảng trống lưu lỗi
			$error = array();
			// tạo mảng lưu thông tin
			$info = array();

			// kiểm tra giá trị nhập vào 

			if(testInputString($data['name']))
            {
                $info['name'] = testInputString($data['name']);
            }
            


            if(testInputString($data['address']))
            {
                $info['address'] = testInputString($data['address']);
            }
            else
            {
                $error[] ="address";
            }


            if(testInputString($data['phone']))
            {
                $info['phone'] = testInputString($data['phone']);
            }
            else
            {
                $error[] ="phone";
            }


            if(testInputString($data['email']))
            {
                $info['email'] = testInputString($data['email']);
            }
            else
            {
                $error[] ="email";
            }

             if(testInputString($data['message']))
            {
                $info['message'] = testInputString($data['message']);
            }
            
           
            if(empty($error))
            {
            	$sum = 0;
            	foreach($sesion as $value)
            	{
            		$sum = $sum + $value['amount'];
            	}

            	$info['amount'] = $sum;
            	if(parent::insert('transaction',$info))
            	{
            		$where = '1 ORDER BY id DESC LIMIT 0,1';
            		$transaction = parent::fetchwhere('transaction',$where);

            		foreach ($transaction as $key => $value) {
            			# code...
            			$transaction_id = $value['id'];
            		}

            		foreach ($sesion as $key => $value) {
            			# code...
            			$sesion[$key]['transaction_id'] = $transaction_id ;
            			}
            		
        			foreach ($sesion as $key => $value) {
        				# code...
        				if(parent::insert('ordere',$value)){
        					
        				}

        			}

        			session_unset($sesion);
            			
            		
            		$_SESSION['success'] ="Cám ơn bạn đã đặt hàng . Chúng tôi sẽ liên hệ gửi hàng cho bạn sớm nhất .";
            		rdr_url('../views/cart.php');

            	}
            	else
            	{
            		$_SESSION['error'] ="Sorry . Đơn hàng của bạn đã không được đặt thành công ";
            		rdr_url('../views/cart.php');

            	}

            }else{
            	$_SESSION['error_info'] = "Bạn cần nhập đầy đủ các trường có giấu *.";
            	rdr_url('../views/payment.php');
            }

		}
	}

	$info = new Transation();
	if(isset($_SESSION['cart']))
	{
		$data = $info -> addInfo($_REQUEST,$_SESSION['cart']);
	}else
	{
		rdr_url('../index.php');
		
	}

	
	

	
 ?>

