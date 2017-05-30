<?php 
 require_once("../autoload/autoload.php");
    class ShowProduct extends My_Model{


        public function __construct(){
            parent::__construct();

        }

        // Show sản phẩm mới 
        public function showProductNew()
        {
             return $data = parent::fetchwhere('product','  status = 1 ORDER BY created_at  DESC LIMIT 0,16  ');
        }

        // Show sản phẩm thuộc từng danh mục cụ thể

        public function showProductCategory()
        {
            // show danh mục cha co parent_id =0
            $data_category = parent::fetchwhere('category','parent_id = 0 AND status = 1 ORDER BY sort_order ASC ');

            // show danh mục con
            foreach ($data_category as $keys => $category)
            {
                $where = 'parent_id = '.$category["id"];
                $category_sub = parent::fetchwhere('category', $where);

                $data_category[$keys]['sub'] = $category_sub;

                foreach ($data_category[$keys]['sub'] as $key  => $value)
                {
                    $where = 'category_id = '.$value['id'].' LIMIT 0 ,16';
                    // show sản phẩm thuộc danh mục 
                    $product = parent::fetchwhere('product',$where);

                    $data_category[$keys]['sub'][$key]['subpro'] = $product;
                }
            }

            return $data_category ;

        }

        public function showProductSale()
        {
            $where = '1 ORDER BY sale DESC LIMIT 0,4 ';
            return $data = parent::fetchwhere('product',$where);
        }

        public function showProductEnd()
        {
            return $data = parent::fetchwhere('product',' qty <= 5 ');
        }


    }

    $show_product = new ShowProduct();
    // lấy ra sản phẩm mới
    $product_new = $show_product ->showProductNew();
    // lấy ra sản phẩm thuộc từng danh mục
    $product_category = $show_product ->showProductCategory();
    // lấy ra sản phẩm giảm giá nhiều nhất 
    $product_sale = $show_product ->showProductSale();

    // lấy ra sản phẩm sắp hết 
    $product_end = $show_product -> showProductEnd();
   
    
    
?>


<div id="content" class="hfeed">
    
    <div id="flexible-block-1" class="flexible-block-2 flexible-block block-even block-2 block ">
        <h2 class='block-title'><a href='' title='Sản phẩm mới'><span>Sản phẩm khuyến mại</span></a></h2>
            <div class="block-wrap">
                    <div class="main-posts">
                        <?php foreach($product_sale  as $values): ?>
                           
                                <div id="post-31660" class="caia-block-item">
                                    <div class="image-sp">
                                        <a href="detail.php?id=<?php echo $values['id'] ?>" title="<?php echo $values['name'] ?>">
                                            <div class="imghome" style="background:url(<?php echo url().'upload/product/'.$values['thunbar']; ?>) no-repeat center center;"/></div>
                                            <?php echo ($values['sale'] > 0)?'<span>- '.$values['sale'].'%</span>':''; ?>
                                        </a>
                                    </div>
                                    <h3><a href="detail.php?id=<?php echo $values['id'] ?>" title="<?php echo $values['name']  ?>"><?php echo $values['name']  ?></a></h3>
                                    <div class="show-gia">
                                        <?php if($values['sale'] == 0): ?>
                                            <p class="price"><span><?php echo number_format($values['price'])  ?>đ</span></p>
                                        <?php else : ?>
                                            <p class="price"><span>
                                                <?php 
                                                    $price = ($values['price'] *(100 - $values['sale']))/100;
                                                    echo number_format($price);
                                                ?>
                                            đ</span></p>
                                            <p class="price-old"><strike>
                                                <?php echo number_format($values['price']) ?>
                                            đ</strike></p>
                                        <?php endif; ?>
                                     </div>
                                    <div id="buy-product" class="buy-product">
                                        <a class="addtocart" title="Đặt mua" href="../Controller/add_cart.php?action=addtocart&id=<?php echo $values['id'] ?>" rel="31660">Cho vào giỏ hàng</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                       
                        <!-- end 1 post -->             
                    </div>
                
                <!-- end .main-posts -->
            </div>
            <!-- end .block-wrap -->
     </div>


    <div id="flexible-block-0" class="flexible-block-1 flexible-block block-odd block-1 block ">
        <h2 class='block-title'><a href='' title='Sản phẩm mới'><span>Sản phẩm mới</span></a></h2>
        <div class="block-wrap">
            <div class="main-posts">
                <?php foreach($product_new as $itemp): ?>
                    <div id="post-193528" class="caia-block-item">
                        <div class="image-sp">
                            <a href="detail.php?id=<?php echo $itemp['id'] ?>" title="<?php echo $itemp['name'] ?>">
                                <div class="imghome" style="background:url(<?php echo url().'upload/product/'.$itemp['thunbar']; ?>) no-repeat center center;"/></div>
                                <?php echo ($itemp['sale'] > 0)?'<span>- '.$itemp['sale'].'%</span>':''; ?>
                            </a>

                        </div>
                        <h3><a href="detail.php?id=<?php echo $itemp['id'] ?>" title="<?php echo $itemp['name'] ?>"><?php echo $itemp['name'] ?></a></h3>
                        <div class="show-gia">
                            <?php if($itemp['sale'] == 0): ?>
                                <p class="price"><span><?php echo number_format($itemp['price'])  ?>đ</span></p>
                            <?php else : ?>
                                <p class="price"><span>
                                    <?php 
                                        $price = ($itemp['price'] *(100 - $itemp['sale']))/100;
                                        echo number_format($price);
                                    ?>
                                đ</span></p>
                                <p class="price-old"><strike>
                                    <?php echo number_format($itemp['price']) ?>
                                đ</strike></p>
                            <?php endif; ?>
                        </div>                                
                        <div id="buy-product" class="buy-product">
                            <a class="addtocart" title="Đặt mua" href="../Controller/add_cart.php?action=addtocart&id=<?php echo $itemp['id'] ?>" rel="193528">Cho vào giỏ hàng</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- end 1 post -->				
            </div>
            <!-- end .main-posts -->
        </div>
        <!-- end .block-wrap -->
    </div>
    <?php foreach ( $product_category as $key_cate => $category): ?>
        <div id="flexible-block-1" class="flexible-block-2 flexible-block block-even block-2 block ">
            <h2 class='block-title'><a href='product.php?action=category&id=<?php echo $category['id'] ?>' title='<?php echo $category['name'] ?>'><span><?php echo $category['name'] ?></span></a></h2>
            <div id="menu-1373" class="extra-menu">
                <div class="menu-do-khuyen-mai-tu-cac-hang-container">
                    <ul id="menu-do-khuyen-mai-tu-cac-hang" class="menu">
                        <li id="menu-item-178437" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-178437"><a href="product.php?action=category&id=<?php echo $category['id'] ?>">Xem toàn bộ</a></li>
                    </ul>
                </div>
            </div>
            <div class="block-wrap">
                    <div class="main-posts">
                        <?php foreach( $category['sub'] as $key_sub => $value): ?>
                            <?php foreach ($value['subpro'] as $key_subpro => $values): ?>
                                <div id="post-31660" class="caia-block-item">
                                    <div class="image-sp">
                                        <a href="detail.php?id=<?php echo $values['id'] ?>" title="<?php echo $values['name'] ?>">
                                            <div class="imghome" style="background:url(<?php echo url().'upload/product/'.$values['thunbar']; ?>) no-repeat center center;"/></div>
                                            <?php echo ($values['sale'] > 0)?'<span>- '.$values['sale'].'%</span>':''; ?>
                                        </a>
                                    </div>
                                    <h3><a href="detail.php?id=<?php echo $values['id'] ?>" title="<?php echo $values['name']  ?>"><?php echo $values['name']  ?></a></h3>
                                    <div class="show-gia">
                                        <?php if($values['sale'] == 0): ?>
                                            <p class="price"><span><?php echo number_format($values['price'])  ?>đ</span></p>
                                        <?php else : ?>
                                            <p class="price"><span>
                                                <?php 
                                                    $price = ($values['price'] *(100 - $values['sale']))/100;
                                                    echo number_format($price);
                                                ?>
                                            đ</span></p>
                                            <p class="price-old"><strike>
                                                <?php echo number_format($values['price']) ?>
                                            đ</strike></p>
                                        <?php endif; ?>
                                     </div>
                                    <div id="buy-product" class="buy-product">
                                        <a class="addtocart" title="Đặt mua" href="../Controller/add_cart.php?action=addtocart&id=<?php echo $values['id'] ?>" rel="31660">Cho vào giỏ hàng</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        <!-- end 1 post -->				
                    </div>
                
                <!-- end .main-posts -->
            </div>
            <!-- end .block-wrap -->
        </div>
    <?php endforeach; ?>


     
</div>

