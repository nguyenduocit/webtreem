<?php 
session_start();
    require_once("../autoload/autoload.php");
    class ViewProduct extends My_Model{

        public function __construct()
        {
            parent::__construct();

        }

        public function searchProduct($data)
        {
            $key = $data['search'];
            $key = trim($key);

            $where = "name LIKE '%$key%' OR price LIKE '%$key%'";
            return $data = parent::fetchwhere('product',$where);
        }

        public function seachPrice($data)
        {
            $price = $data['price'];
            $start = substr($price,0,7);

            $num = substr($price,8,15);

            $where = 'price BETWEEN '.$start.' AND '.$num;
            return $data = parent::fetchwhere('product',$where);
        }

       
    }

    $view_product = new ViewProduct();

    if(empty($_REQUEST['price']))
    {
        $seach_product = $view_product ->searchProduct($_REQUEST);
    }else{
        $seach_product = $view_product ->seachPrice($_REQUEST);
    }
    

    
    
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
                <?php if(!empty($seach_product)): ?>
                    <div class="breadcrumb">
                        <div class="wrap"><a href="index.php">Trang Chủ</a><span class="label"> &gt; </span><a href="product.php?action=san-pham">Tìm kiếm</a>></div>
                    </div>
                    <div id="inner">
                        <div id="content-sidebar-wrap">
                            <!--  div menu-js -->
                                <?php  require_once __DIR__."/teamplate/menu-js.php"; ?>
                            <!-- End div menu-js  -->
                           
                                    <div id="content" class="hfeed">
                       
                                        <h1 class="archive-heading"><a href="product.php?action=san-pham" title="Sản Phẩm" rel="nofollow">Tìm Kiếm</a></h1>
                                        
                                            <?php foreach ($seach_product as $key => $val): ?>
                                               <div class="sp">
                                                    <div class="post-135951 products type-products status-publish has-post-thumbnail hentry category-mu-bao-hiem-o-che-mua-nang category-qua-tang-cho-don-hang-tu-1-500-000-d category-san-pham-khuyen-mai entry">
                                                        <div class="image-sp">
                                                            <a href="detail.php?id=<?php echo $val['id'] ?>">
                                                                <div class="imghome" style="background:url(<?php echo url().'upload/product/'.$val['thunbar']; ?>) no-repeat center center;"></div>
                                                            </a>
                                                          
                                                        </div>
                                                        <h3><a href="detail.php?id=<?php echo $val['id'] ?>" rel="bookmark" title="<?php echo $val['name'] ?>"><?php echo $val['name'] ?></a></h3>

                                                         <div class="show-gia">
                                                            <?php if($val['sale'] == 0): ?>
                                                                <p class="price"><span><?php echo number_format($val['price'])  ?>đ</span></p>
                                                            <?php else : ?>
                                                                <p class="price"><span>
                                                                    <?php 
                                                                        $price = ($val['price'] *(100 - $val['sale']))/100;
                                                                        echo number_format($price);
                                                                    ?>
                                                                đ</span></p>
                                                                <p class="price-old"><strike>
                                                                    <?php echo number_format($val['price']) ?>
                                                                đ</strike></p>
                                                            <?php endif; ?>
                                                        </div>  
                                                        
                                                        <div id="buy-product" class="buy-product">
                                                            <a class="addtocart" title="Đặt mua" href="../Controller/add_cart.php?action=addtocart&id=<?php echo $val['id'] ?>" rel="135951">Cho vào giỏ hàng</a>
                                                        </div>
                                                        <div class="entry-content"></div>
                                                    </div>
                                                </div>
                                            <?php endforeach;?>  
                                            <div class="col-lg-12">
                                               
                                            </div>
                                               
                                    </div>
                            <!-- div sidebar -->
                                <?php  require_once __DIR__."/teamplate/sidebar.php"; ?>
                           <!--  end  div sidebar -->
                        </div>
                    </div>
                <?php endif;?>
            
            <!--  div footer  -->
                 <?php  require_once __DIR__."/teamplate/footer.php"; ?>
            <!--  End div footer  -->
        </div>
    </body>
</html>
<!-- Dynamic page generated in 0.616 seconds, 3.8. -->
<!-- Cached page generated by WP-Super-Cache on 2017-04-29 13:47:28 -->
<!-- super cache -->