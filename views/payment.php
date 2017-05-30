<?php 
session_start();
?>
<!DOCTYPE html>
<html  lang="vi" xml:lang="vi" >
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
                            <div class="post-36157 page type-page status-publish hentry entry">
                                <h1 class="entry-title">Thanh toán giỏ hàng</h1>
                                <?php if(isset($_SESSION['cart'])): ?>
                                    <div class="entry-content">
                                        <div class="message error" style="color: red; font-size: 16px;"><?php echo (isset($_SESSION['error_info']))?$_SESSION['error_info']:""; ?></div>

                                         <div class="message error" style="color: red; font-size: 16px;"><?php echo (isset($_SESSION['error']))?$_SESSION['error']:""; ?></div>
                                        <?php 
                                            if(isset($_SESSION['error_info'])){
                                                unset($_SESSION['error_info']);

                                                

                                                } 

                                            if(isset($_SESSION['error']))
                                            {
                                                unset($_SESSION['error']);
                                            }
                                        ?>
                                        <form action="../Controller/transaction.php" method="POST" id="checkout-form">
                                            <input type="hidden" name="gscaction" value="checkout">
                                            <input type="hidden" name="_gsc_nonce" value="e1ea932e4e">
                                            <p class="messagearea">
                                                <label for="message">Yêu cầu</label><br>
                                                <textarea id="message" name="message" cols="45" rows="11"></textarea><br>
                                            </p>
                                            <p>
                                                <label for="full-name">Họ tên</label> <span class="required">*</span><br>
                                                <input type="text" id="full-name" name="name">
                                            </p>
                                            <p>
                                                <label for="address">Địa chỉ</label> <span class="required">*</span><br>
                                                <input type="text" id="address" name="address">
                                            </p>
                                            <p>
                                                <label for="phone">Điện thoại</label> <span class="required">*</span><br>
                                                <input type="number" id="phone" name="phone">
                                            </p>
                                            <p>
                                                <label for="email">Email</label><br>
                                                <input type="email" id="email" name="email">
                                            </p>
                                            <p class="submit cart-summary">
                                                <input class="button" type="submit" value="Hoàn tất">
                                            </p>
                                            <p class="clear clearfix description">Những thông tin có gắn <span class="required">*</span> là những thông tin bắt buộc</p>
                                        </form>
                                        <div id="content" class="hfeed">
                                            <div class="post-8939 page type-page status-publish hentry entry">
                                                <h1 class="entry-title">Thông tin đơn hàng</h1>
                                                <div class="entry-content">
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
                                                                            <td align="center"> <span class="row-price"><?php echo $value['qty'] ?></span></td>
                                                                            <td align="center"><span class="row-price"><?php echo number_format($value['price']) ?> VNĐ</span></td>
                                                                            <td align="center"><span class="row-price"><?php echo number_format($value['amount']) ?> VNĐ</span></td>
                                                                            <td align="center"><a href="../Controller/add_cart.php?action=delete-cart&id=<?php echo $key ?>" class="remove-product" data-id="193725">Xóa</a></td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                    <thead class="tr-heading">
                                                                        <tr>
                                                                            <th colspan="7">Tổng tiền: 
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
                                                                             VNĐ</th>
                                                                        </tr>
                                                                    </thead>
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </form>
                                                </div>
                                            </div>
                                            <div id="product-seen"></div>
                                        </div>
                                    </div>
                                    <?php else:?>
                                    <div class="message error">Hiện tại giỏ hàng của bạn chưa có sản phẩm nào, bạn có thể quay về <a href="index.php">chọn sản phẩm</a> trước khi đặt hàng.</div>
                                </div>
                            <?php endif;  ?>
                            <div id="product-seen"></div>
                        </div>
                  
                </div>
                <!-- div sidebar -->
                 <?php  require_once __DIR__."/teamplate/sidebar.php"; ?>
                  <!--  end  div sidebar -->
            </div>
            <!--  div footer  -->
                 <?php  require_once __DIR__."/teamplate/footer.php"; ?>
            <!--  End div footer  -->
        </div>
    </body>
</html>
