<?php
session_start();
	require_once("../autoload/autoload.php");

	$db = new My_Model();

	/*
		Xử lý giỏ hàng .

	*/
	if(validate_id($_GET['id']))
				{
					$id = validate_id($_GET['id']);
					
				}
	

	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
	}

	switch ($action) {
		case 'addtocart':
			# code...

			/*
				kiểm tra xem sản phẩm có tồn tại hay không

			*/
				
				if(isset($id)){

					
					
					$product = $db->fetchwhere('product','id = '.$id);

					$where = 'id = '.$id.'  AND qty =  0 OR qty =1';
					$qty = $db->fetchwhere('product',$where);
					

					if(empty($product))
					{
						//rdr_url('../index.php');
					}

					if(!empty($qty))
					{
						$_SESSION['error'] ="Sorry . Sản phẩm đã hết không thể thêm vào giỏ hàng ";
						rdr_url('../views/cart.php');
						die;
					}

					if(isset($_SESSION['cart'][$id]))
					{
						
						foreach($product as $value){
							$product_id 	= $id;
							$qty 			= $_SESSION['cart'][$id]['qty'] + 1;
							$name 			= $value['name'];
							$image 			= $value['thunbar'];
							$price 			= ($value['sale'] > 0)?($value['price'] *(100 - $value['sale']))/100 :$value['price'];
							$amount			= $qty * $price;
							
						}

					}else{
						// tạo mới giỏ hàng
						
						

						foreach($product as $value){
							$product_id 	= $value['id'];
							$qty 			= 1;
							$name 			= $value['name'];
							$image 			= $value['thunbar'];
							$price 			= ($value['sale'] > 0)?($value['price'] *(100 - $value['sale']))/100 :$value['price'];
							$amount			= $qty * $price;
							
						}
						
					}
				}else
				{
					rdr_url('../index.php');
				}

				$_SESSION['cart'][$id]['product_id'] = $product_id;
				$_SESSION['cart'][$id]['qty'] = $qty;
				$_SESSION['cart'][$id]['name'] = $name;
				$_SESSION['cart'][$id]['price'] = $price;
				$_SESSION['cart'][$id]['image'] = $image;
				$_SESSION['cart'][$id]['amount'] = $amount;
				rdr_url('../views/cart.php');

				
			    break;
		
		case 'delete-cart':
			# code...
			unset($_SESSION['cart'][$id]);
			rdr_url('../views/cart.php');

			break;

		case 'update_cart':
			# code...
			$id = $_GET['key'];
			$num = $_GET['qty'];
			if(isset($_SESSION['cart'][$id]))
			{
				$_SESSION['cart'][$id]['qty'] =  $num;
				$_SESSION['cart'][$id]['amount'] = $_SESSION['cart'][$id]['price'] * $num;
			}
			rdr_url('../views/cart.php');
			break;


		

	}

	
 ?>
