<?php 
session_start();
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
               <div class="wrap"><a href="index.php">Trang Chủ</a><span class="label"> &gt; </span>Shop Cart</div>
            </div>
            <div id="inner">
                <div id="content-sidebar-wrap">
                   <!--  div menu-js -->
                        <?php  require_once __DIR__."/teamplate/menu-js.php"; ?>
                    <!-- End div menu-js  -->
                        <div id="content" class="hfeed">
                            <div class="post-8939 page type-page status-publish hentry entry">
                                <h1 class="entry-title">Shop Cart</h1>
                                <div class="entry-content">
                                        <?php 
                                            if(isset($_SESSION['success'])){

                                                    echo '<div class="message error" style="color: #06a829; font-size: 18px;">'.$_SESSION['success'].'</div>';
                                                    unset($_SESSION['success']);

                                                } elseif(isset($_SESSION['error'])){
                                                     echo '<div class="message error" style="color: red; font-size: 18px;">'.$_SESSION['error'].'</div>';
                                                    unset($_SESSION['error']);

                                                }
                                            ?>
                                    <form action="" method="post" id="shop-cart-form">
                                        <table id="gsc-shopcart-table" width="100%" border="1" class="shop-cart-table" cellspacing="0" cellpadding="5">
                                            <thead class="tr-heading">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Ảnh</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Giá</th>
                                                    <th>Tổng Tiền</th>
                                                    <th>Update</th>
                                                    <th>Xóa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php if(isset($_SESSION['cart'])): ?>
                                                    <?php $stt = 0 ;?>
                                                    <?php foreach($_SESSION['cart'] as $key =>$value): ?>

                                                       <tr>
                                                            <td align="center"><?php echo $stt = $stt + 1 ;?> </td>
                                                           
                                                            <td width=""><img width="100" height="100" src="../upload/product/<?php echo $value['image']?>" class="attachment-thumbnail" ></td>
                                                            
                                                            <td><span class="product-name"><a href="detail.php?id=<?php echo $value['product_id']?>" title="<?php echo $value['name']?>"><?php echo $value['name']?></a></span><br>
                                                            <td align="center"> 
                                                            <span class="row-price">
                                                                <input type="number" id = 'qty_<?php echo $value['product_id'] ?>' value="<?php echo $value['qty'] ?>" style="width :30px;" >
                                                            </span>
                                                            </td>
                                                            <td align="center"><span class="row-price"><?php echo number_format($value['price']) ?> VNĐ</span></td>
                                                            <td align="center"><span class="row-price"><?php echo number_format($value['amount']) ?> VNĐ</span></td>
                                                            <td align="center"> 
                                                                <p class="submit cart-summary">
                                                                    <a href="cart.php" class="button update-cart" type="submit" data-cart=<?php echo $key ?> value="Update" style=""> Update</a>
                                                                </p>
                                                            </td>
                                                            <td align="center"><a href="../Controller/add_cart.php?action=delete-cart&id=<?php echo $key ?>" class="remove-product" data-id="193725">Xóa</a></td>
                                                        </tr
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                        <div class="cart-summary">
                                            <div class="cart-total">
                                                <p class="num-product">
                                                    <span class="current">Số lượng : </span>
                                                    <span class="num-products"><?php echo (isset($_SESSION['cart']))?count($_SESSION['cart']):""; ?></span>
                                                    <span class="product-called"> sản phẩm</span>
                                                </p>
                                                <p class="total-price">
                                                    <span class="total-price">Tổng giá trị: </span>
                                                    <span class="total-pricce">
                                                    <?php 
                                                        $sum = 0;
                                                        if(isset($_SESSION['cart']))
                                                        {
                                                            foreach($_SESSION['cart'] as $val)
                                                            {
                                                                $sum = $sum + $val['amount'];
                                                            }
                                                            echo number_format($sum);
                                                        }
                                                        
                                                    ?>
                                                    </span>
                                                    <span class="currency">VNĐ</span>
                                                </p>
                                                <a class="button checkout" href="payment.php" title="Đặt hàng">Đặt hàng</a>
                                                
                                                
                                                
                                            </div>
                                            <div class="clear"></div>
                                            
                                            <div class="gsc-action"><a class="continue-shopping" href="index.php" title="Tiếp tục mua hàng">Tiếp tục mua hàng</a></div>
                                            <div class="clear"></div>
                                        </div>
                                    </form>
                                </div>
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
