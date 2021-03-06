<?php
session_start();
    require_once("../autoload/autoload.php");
    class ViewProduct extends My_Model{

        public function __construct()
        {
            parent::__construct();

        }


        public function viewProduct($id)
        {
           $id =  validate_id($id);

           $where = "id = ".$id;

            $data = parent::fetchwhere('product',$where);
           // lấy ra danh mục cha
           foreach ($data as $key => $value) {
            # code...

                $data[$key]['category'] = parent::fetchwhere('category', 'id = '.$value['category_id']);
                
            }

            return $data;
        }

        public function viewProducts($id)
        {
            $id =  validate_id($id);
            $where = "id = ".$id;

            $data = parent::fetchwhere('product',$where);

            foreach ($data as $key => $value) {
            # code...

                $where = ' category_id = '.$value['category_id'];
                return $product_lq = parent::fetchwhere('product',$where);

                
            }
        }
    }

    $view_product = new ViewProduct();
    if(validate_id($_GET['id']))
    {
        $id = validate_id($_GET['id']);
        $data_new = $view_product->viewProduct($id);

        $product_lq = $view_product->viewProducts($id);
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
            <?php if(!empty($data_new)): ?>
                <?php foreach($data_new as $value): ?>
            <div class="breadcrumb">
                <div class="wrap"><a href="index.php">Trang Chủ</a><span class="label">  »  </span><a href="">
                    <?php foreach($value['category'] as $cate): ?>
                    <?php echo $cate['name']; ?>
                    <?php endforeach; ?>
                </a><span class="label">  »  </span><?php echo $value['name'] ?></div>
            </div>
            <?php endforeach; ?>
            <div id="inner">
                <div id="content-sidebar-wrap">
                    <!--  div menu-js -->
                        <?php  require_once __DIR__."/teamplate/menu-js.php"; ?>
                    <!-- End div menu-js  -->
                    
                    <div id="content" class="hfeed">
                        <div class="infor">
                            <?php foreach($data_new as $value): ?>
                            <div class="left-info">
                                <div class="connected-carousels">
                                    <div class="stage">
                                        <div class="carousel carousel-stage" data-jcarousel="true">
                                            <ul>
                                                <li>
                                                    <a href="../../upload/product/<?php echo $value['thunbar'] ?> " data-rel="lightbox-0" title="">
                                                        <p class="item" style="background:url(<?php echo url().'upload/product/'.$value['thunbar']; ?>) no-repeat center center;"></p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                      
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="right-info">
                                <h1 class="title-product"><?php echo $value['name'] ?></h1>
                                <div id="post-ratings-193659-loading" class="post-ratings-loading">
                                    <img src="../public/shopme/images/loading.gif" width="16" height="16" class="post-ratings-image" />Loading...
                                </div>
                                <div class="addthis_native_toolbox">
                                    
                                </div>
                                <div class="chitietsp">
                                    <p class="tinhtrang">Số lượng: <span><?php echo $value['qty'] ?></span></p><br/>
                                </div>
                                     
                                <?php if($value['qty'] == 0): ?>
                                    <p class="tinhtrang">Tình trạng: <span style="color:red">Hết hàng</span></p>
                                <?php else: ?>
                                    <p class="tinhtrang">Tình trạng: <span>Còn hàng</span></p>
                                <?php endif; ?>
                                   
                                <div class="show-gia">
                                    <?php if($value['sale'] == 0): ?>
                                        <p>Giá: 
                                            <span class="price"><span><?php echo number_format($value['price'])  ?>Đ</span></span>
                                    <?php else : ?>
                                            <span class="price"><span>
                                                <?php 
                                                    $price = ($value['price'] *(100 - $value['sale']))/100;
                                                    echo number_format($price);
                                                ?>
                                            Đ</span></span>
                                            <span class="price-old"><strike> <?php echo number_format($value['price']) ?> Đ</strike></span>
                                        </p>
                                    <?php endif; ?>
                                </div>

                                <div id="buy-product1" class="buy-product1">
                                    <a class="addtocart" title="Đặt mua" href="../Controller/add_cart.php?action=addtocart&id=<?php echo $value['id'] ?>" rel="193659">Cho vào giỏ hàng</a>
                                    <a class="mngay" title="Mua ngay" href="cart.php" >Xem giỏ hàng</a>
                                </div>
                            </div>

                            <?php  endforeach ; ?>
                        </div>
                        <h2 class="mota">Mô tả sản phẩm</h2>
                        <div class="ndmota">
                            <?php echo $value['content'] ?>
                        </div>
                        <!-- #respond -->
                        <div class='yarpp-related'>
                            <h3 class="title-yy">Sản phẩm <span>liên quan</span></h3>
                            <ul style="list-style:none;">
                                <?php foreach($product_lq as $value):?>
                                <li class="sp">
                                    <div class="image-sp">
                                        <a href="detail.php?id=<?php echo $value['id'] ?>">
                                            <div class="imghome" style="background:url(<?php echo url().'upload/product/'.$value['thunbar']; ?>) no-repeat center center;"/></div>
                                        </a>
                                    </div>
                                    <h3><a href="detail.php?id=<?php echo $value['id'] ?>" rel="bookmark" title="<?php echo $value['name'] ?> "><?php echo $value['name'] ?></a></h3>
                                    <div class="show-gia">
                                        <?php if($value['sale'] == 0): ?>
                                                <p class="price"><span><?php echo number_format($value['price'])  ?>đ</span></p>
                                            <?php else : ?>
                                                <p class="price"><span>
                                                    <?php 
                                                        $price = ($value['price'] *(100 - $value['sale']))/100;
                                                        echo number_format($price);
                                                    ?>
                                                đ</span></p>
                                                <p class="price-old"><strike>
                                                    <?php echo number_format($value['price']) ?>
                                                đ</strike></p>
                                        <?php endif; ?>
                                    </div>
                                    <div id="buy-product" class="buy-product">
                                        <a class="addtocart" title="Đặt mua" href="../Controller/add_cart.php?action=addtocart&id=<?php echo $value['id'] ?>" rel="103356">Cho vào giỏ hàng</a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
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
<!-- Dynamic page generated in 0.616 seconds, 3.8. -->
<!-- Cached page generated by WP-Super-Cache on 2017-04-29 13:47:28 -->
<!-- super cache -->