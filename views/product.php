<?php
session_start();
    require_once("../autoload/autoload.php");
    class ViewProduct extends My_Model{

        public function __construct()
        {
            parent::__construct();

        }

        public function showProducCate($id)
        {
            $id = validate_id($id);
            // show danh mục cha co parent_id =0
            $data_category = parent::fetchwhere('category','id = '.$id);

            // show danh mục con
            foreach ($data_category as $keys => $category)
            {
                $where = 'parent_id = '.$category["id"];
                $category_sub = parent::fetchwhere('category', $where);

                $data_category[$keys]['sub'] = $category_sub;

                foreach ($data_category[$keys]['sub'] as $key  => $value)
                {
                    $where = 'category_id = '.$value['id'].' AND status = 1 LIMIT 0 ,16';
                    // show sản phẩm thuộc danh mục 
                    $product = parent::fetchwhere('product',$where);

                    $data_category[$keys]['sub'][$key]['subpro'] = $product;
                }
            }

            return $data_category ;

        }

        public function showProducSub($id)
        {
             $id = validate_id($id);

             $data_sub = parent::fetchwhere('category','id = '.$id);

             foreach ($data_sub as $key => $value) {
                 # code...
                $where = "id = ".$value['parent_id'];
                $data_category = parent::fetchwhere('category',$where);
                $data_category[$key]['sub'] = $data_sub;

                foreach ($data_sub as $keys => $value) {
                 # code...
                    $where = 'category_id = '.$value['id'].' AND status = 1';
                    $product = parent::fetchwhere('product',$where);

                    $data_category[$key]['sub'][$keys]['subpro'] = $product;
                 }
             }

             return $data_category;
        }

        public function showProduct($start,$num)
        {
            return $list = parent::fetchAllpagina('product' , $start,$num);
        }


        public function countid()
        {
           $data = parent::countTable('product');
           return $data;
        }


    }

    $view_product = new ViewProduct();
    $action = $_GET['action'];
    
    switch ($action) {
        case 'category':
            # code...
            $id = validate_id($_GET['id']);
             $data = $view_product->showProducCate($id);
            break;
        case 'sub_cate':
            # code...
            $id = validate_id($_GET['id']);
            $datas = $view_product->showProducSub($id);
            
            break;
        case 'san-pham':
            # code...
            $display = 10;
            $start = (isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))?$_GET['s']:0;
            $num = $view_product ->countid();

            $datax = $view_product -> showProduct($start,$display);
            break;
        
        
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
        <?php if(!empty($data)): ?>
            <?php foreach ($data as $key =>$category): ?>
            <div class="breadcrumb">
                <div class="wrap"><a href="index.php">Trang Chủ</a><span class="label"> &gt; </span><a href="product.php?action=san-pham">sản phẩm</a><span class="label"> &gt; </span><?php echo $category['name'] ?></div>
            </div>
            <div id="inner">
                <div id="content-sidebar-wrap">
                    <!--  div menu-js -->
                        <?php  require_once __DIR__."/teamplate/menu-js.php"; ?>
                    <!-- End div menu-js  -->
                   
                            <div id="content" class="hfeed">
               
                                <h1 class="archive-heading"><a href="product.php?action=category&id=<?php echo $category['id'] ?>" title="Quà tặng miễn phí" rel="nofollow"><?php echo $category['name'] ?></a></h1>
                                <?php foreach ($category['sub'] as $keyz_sub => $values): ?>
                                    <?php foreach ($values['subpro'] as $key => $values): ?>
                                       <div class="sp">
                                            <div class="post-135951 products type-products status-publish has-post-thumbnail hentry category-mu-bao-hiem-o-che-mua-nang category-qua-tang-cho-don-hang-tu-1-500-000-d category-san-pham-khuyen-mai entry">
                                                <div class="image-sp">
                                                    <a href="detail.php?id=<?php echo $values['id'] ?>">
                                                        <div class="imghome" style="background:url(<?php echo url().'upload/product/'.$values['thunbar']; ?>) no-repeat center center;"></div>
                                                    </a>
                                                    <?php echo ($values['sale'] > 0)?'<span>- '.$values['sale'].'%</span>':''; ?>
                                                </div>
                                                <h3><a href="detail.php?id=<?php echo $values['id'] ?>" rel="bookmark" title="Ô dài Furama Resort"><?php echo $values['name'] ?></a></h3>
                                                <div class="show-gia">
                                                    <?php if($values['sale'] == 0): ?>
                                                        <p class="price"><span><?php echo number_format($values['price'])  ?></span></p>
                                                    <?php else : ?>
                                                        <p class="price"><span>
                                                            <?php 
                                                                $price = ($values['price'] *(100 - $values['sale']))/100;
                                                                echo number_format($price);
                                                            ?>
                                                        </span></p>
                                                        <p class="price-old"><strike>
                                                            <?php echo number_format($values['price']) ?>
                                                        </strike></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div id="buy-product" class="buy-product">
                                                    <a class="addtocart" title="Đặt mua" href="../Controller/add_cart.php?action=addtocart&id=<?php echo $values['id'] ?>" rel="135951">Cho vào giỏ hàng</a>
                                                </div>
                                                <div class="entry-content"></div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                <?php endforeach; ?>
                               
                            </div>
                        
                   
                    <!-- div sidebar -->
                        <?php  require_once __DIR__."/teamplate/sidebar.php"; ?>
                   <!--  end  div sidebar -->
                </div>
            </div>
            <?php endforeach; ?>

        <?php elseif(!empty($datas)): ?>
            <?php foreach ($datas as $key =>$category): ?>
                <?php foreach ($category['sub'] as $keyz_sub => $values): ?>
            <div class="breadcrumb">
                <div class="wrap"><a href="index.php">Trang Chủ</a><span class="label"> &gt; </span><a href="product.php?san-pham">sản phẩm</a><span class="label"> &gt; </span><a href="product.php?action=category&id=<?php echo $category['id'] ?>"><?php echo  $category['name'] ?></a> <span class="label"> &gt; </span> <?php echo $values['name'] ?></div>
            </div>
            <div id="inner">
                <div id="content-sidebar-wrap">
                    <!--  div menu-js -->
                        <?php  require_once __DIR__."/teamplate/menu-js.php"; ?>
                    <!-- End div menu-js  -->
                   
                            <div id="content" class="hfeed">
               
                                <h1 class="archive-heading"><a href="product.php?action=sub_cate&id=<?php echo $values['id'] ?>" title="<?php echo $values['name'] ?>" rel="nofollow"><?php echo $values['name'] ?></a></h1>
                                
                                    <?php foreach ($values['subpro'] as $key => $values): ?>
                                       <div class="sp">
                                            <div class="post-135951 products type-products status-publish has-post-thumbnail hentry category-mu-bao-hiem-o-che-mua-nang category-qua-tang-cho-don-hang-tu-1-500-000-d category-san-pham-khuyen-mai entry">
                                                <div class="image-sp">
                                                    <a href="detail.php?id=<?php echo $values['id'] ?>">
                                                        <div class="imghome" style="background:url(<?php echo url().'upload/product/'.$values['thunbar']; ?>) no-repeat center center;"></div>
                                                    </a>
                                                    <?php echo ($values['sale'] > 0)?'<span>- '.$values['sale'].'%</span>':''; ?>
                                                </div>
                                                <h3><a href="detail.php?id=<?php echo $values['id'] ?>" rel="bookmark" title="Ô dài Furama Resort"><?php echo $values['name'] ?></a></h3>
                                                <div class="show-gia">
                                                    <?php if($values['sale'] == 0): ?>
                                                        <p class="price"><span><?php echo number_format($values['price'])  ?></span></p>
                                                    <?php else : ?>
                                                        <p class="price"><span>
                                                            <?php 
                                                                $price = ($values['price'] *(100 - $values['sale']))/100;
                                                                echo number_format($price);
                                                            ?>
                                                        </span></p>
                                                        <p class="price-old"><strike>
                                                            <?php echo number_format($values['price']) ?>
                                                        </strike></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div id="buy-product" class="buy-product">
                                                    <a class="addtocart" title="Đặt mua" href="../Controller/add_cart.php?action=addtocart&id=<?php echo $values['id'] ?>" rel="135951">Cho vào giỏ hàng</a>
                                                </div>
                                                <div class="entry-content"></div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                <?php endforeach; ?>
                               
                            </div>
                        
                   
                    <!-- div sidebar -->
                        <?php  require_once __DIR__."/teamplate/sidebar.php"; ?>
                   <!--  end  div sidebar -->
                </div>
            </div>
            <?php endforeach; ?>
        <?php elseif(!empty($datax)): ?>
            <div class="breadcrumb">
                <div class="wrap"><a href="index.php">Trang Chủ</a><span class="label"> &gt; </span><a href="product.php?action=san-pham">sản phẩm</a>></div>
            </div>
            <div id="inner">
                <div id="content-sidebar-wrap">
                    <!--  div menu-js -->
                        <?php  require_once __DIR__."/teamplate/menu-js.php"; ?>
                    <!-- End div menu-js  -->
                   
                            <div id="content" class="hfeed">
               
                                <h1 class="archive-heading"><a href="product.php?action=san-pham" title="Sản Phẩm" rel="nofollow">Sản Phẩm</a></h1>
                                
                                    <?php foreach ($datax as $key => $values): ?>
                                       <div class="sp">
                                            <div class="post-135951 products type-products status-publish has-post-thumbnail hentry category-mu-bao-hiem-o-che-mua-nang category-qua-tang-cho-don-hang-tu-1-500-000-d category-san-pham-khuyen-mai entry">
                                                <div class="image-sp">
                                                    <a href="detail.php?id=<?php echo $values['id'] ?>">
                                                        <div class="imghome" style="background:url(<?php echo url().'upload/product/'.$values['thunbar']; ?>) no-repeat center center;"></div>
                                                    </a>
                                                    <?php echo ($values['sale'] > 0)?'<span>- '.$values['sale'].'%</span>':''; ?>
                                                </div>
                                                <h3><a href="detail.php?id=<?php echo $values['id'] ?>" rel="bookmark" title="Ô dài Furama Resort"><?php echo $values['name'] ?></a></h3>
                                                <div class="show-gia">
                                                    <?php if($values['sale'] == 0): ?>
                                                        <p class="price"><span><?php echo number_format($values['price'])  ?></span></p>
                                                    <?php else : ?>
                                                        <p class="price"><span>
                                                            <?php 
                                                                $price = ($values['price'] *(100 - $values['sale']))/100;
                                                                echo number_format($price);
                                                            ?>
                                                        </span></p>
                                                        <p class="price-old"><strike>
                                                            <?php echo number_format($values['price']) ?>
                                                        </strike></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div id="buy-product" class="buy-product">
                                                    <a class="addtocart" title="Đặt mua" href="../Controller/add_cart.php?action=addtocart&id=<?php echo $values['id'] ?>" rel="135951">Cho vào giỏ hàng</a>
                                                </div>
                                                <div class="entry-content"></div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>  
                                    <div class="col-lg-12">
                                        <div class="navigation">
                                            <?php 
                                                $table ='product';
                                                $link = 'product.php?action=san-pham&';
                                                echo navigation($display,$table,$link,$num); 
                                            ?> 
                                        </div>
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

