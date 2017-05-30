<?php 
session_start();
    require_once("../autoload/autoload.php");

    $db = new My_Model();
     if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // bat dau tien hanh su ly form
            $errors = array();
            $data = array();

            // kiem tra xem nguoi dung co nhap dung password
            if(isset($_POST['password']) && preg_match('/^[\w\'.-]{2,20}$/i',trim($_POST['password'])))
            {
                $password = md5($_POST['password']);
                // neu mat khau trung khop thi lu vao csdl
  
            }else
            {
                // mat khau khong trung khop thi thong bao ra ngoai
                    $errors[] = "password";
            }
            
            if(empty($_POST['password']))
            {
                $errors[] = "password";
            }
            
            // kiem tra email co ton tai va dung dinh dang 
            if(isset($_POST['email'])&& filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
            {
                $email = $_POST['email'];
            }
            else
            {
                $errors[] = "email";
            }
            
            
            
            
            // neu cac truong deu ton tai thi ta tien hanh Insert vào csdl
            if(empty($errors))
            {
               
                $datas = $db->fetchwhere('user','email = "'.$email.'" AND password = "'.$password.'"' );
                
                if(!empty($datas))
                {
                    foreach($datas as $value)
                    {
                        $_SESSION['success'] = " Chúc mừng bạn đã đăng nhập thành công";
                        $_SESSION['id'] = $value['id'];
                        $_SESSION['name'] = $value['name'];
                        $_SESSION['email'] = $value['email'];


                    }
                }else{
                    $_SESSION['error'] = "Tài khoản hoặc mật khẩu không đúng";
                }
                
                
                
            

                
           
            }
        }

   
    
?>
<!DOCTYPE html >
<html  lang="vi" xml:lang="vi">
    <?php  require_once __DIR__."/teamplate/head.php"; ?>
    <body class="single single-products postid-193659 header-image content-sidebar">
        <div id="wrap">
            <!-- div  content-before-header -->
                <?php  require_once __DIR__."/teamplate/content-before-header.php"; ?>
            <!--  End content-before-header -->
            
            <!--  div header -->
                <?php  require_once __DIR__."/teamplate/header.php"; ?>
            <!-- End div header -->
            <div class="breadcrumb">
               <div class="wrap"><a href="index.php">Trang Chủ</a><span class="label"> &gt; </span>Đăng Nhập</div>
            </div>
            <div id="inner">
               <div id="content-sidebar-wrap">
                   <!--  div menu-js -->
                        <?php  require_once __DIR__."/teamplate/menu-js.php"; ?>
                    <!-- End div menu-js  -->
                        <div id="content" class="hfeed">
                            <div class="post-178485 page type-page status-publish hentry entry">
                                <h1 class="entry-title">Đăng Nhập </h1>

                               
                                <form action="" method="post" accept-charset="utf-8">
                                    <?php 
                                        if(isset($_SESSION['success']))
                                        {
                                            echo "<h1 class ='success'> ".$_SESSION['success']."</h1>";
                                            unset($_SESSION['success']);

                                        }


                                        if(isset($_SESSION['error']))
                                        {
                                            echo "<h1 class='error'> ".$_SESSION['error']."</h1>";
                                            unset($_SESSION['error']);
                                            
                                        }
                                     ?>
                                   <div class="entry-content">
                                        
                                        <div class="register">
                                          <div class="labels">
                                            <span class="labelx label-default"> Email :</span>
                                          </div>
                                          <div class="inputs">
                                               <input type="text" name="email" size="40">
                                               <?php
                                                    if(isset($errors) && in_array('email',$errors))
                                                    {
                                                        echo"<br><span class='warning' > Mời bạn nhập vào email .</span>";
                                                    }
                                                ?>
                                          </div>
                                        </div>

                                        <div class="register">
                                          <div class="labels">
                                            <span class="labelx label-default"> Password :</span>
                                          </div>
                                          <div class="inputs">
                                               <input type="password" name="password" size="40">
                                                <?php
                                                    if(isset($errors) && in_array('password',$errors))
                                                    {
                                                        echo"<br><span class='warning' > Mật khẩu không trùng khớp .</span>";
                                                    }
                                                ?>
                                          </div>
                                        </div> 
                                        <div class="register">
                                             <div class="labels">
                                             </div>
                                             <div class="inputs">
                                                <p class="submit cart-summary" id="sub">
                                                    <input class="button" type="submit" value="Đăng nhập">
                                                </p>
                                             </div>
                                        </div>

                                        

                                  </div>
                                </form>
                                  
                            </div>
                            <div id="product-seen"></div>
                        </div>
                            
                    <!-- div sidebar -->
                        <?php  require_once __DIR__."/teamplate/sidebar.php"; ?>
                   <!--  end  div sidebar -->
                </div>
            </div>
            <!--  div footer  -->
                 <?php  require_once __DIR__."/teamplate/footer.php"; ?>
            <!--  End div footer  -->
        </div>
    </body>
</html>
