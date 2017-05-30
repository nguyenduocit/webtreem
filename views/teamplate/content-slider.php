<?php 
    require_once("../autoload/autoload.php");
    // khai báo class ShowCategory
    class ShowCategory extends My_Model{

        public function __construct()
        {
            parent::__construct();
        }
        function showCate()
        {

          $data = parent::fetchwhere('category','parent_id = 0  AND  status = 1 ORDER BY sort_order ASC');

          foreach ( $data as $key => $value)
          {

            $where = 'parent_id  = '. $value['id'].' AND  status = 1 ORDER BY sort_order ASC ' ;
            $data[$key]['danhmuc'] = parent::fetchwhere('category',$where);
          }
          return $data;
        }

       
    }
    // khởi tạo class 
    $show_category = new ShowCategory();
    // lấy ra các danh mục 
    $data = $show_category ->showCate();

    
?>


<div id="content-slider">
    <div class="wrap">
        <div id="nav_menu-9" class="widget widget_nav_menu">
            <div class="widget-wrap">
                <div class="menu-san-pham-duoc-quan-tam-container">
                    <ul id="menu-san-pham-duoc-quan-tam" class="menu">
                        <?php foreach($data as $value): ?>
                            <li id="menu-item-180027" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-180027">
                                <a href="product.php?action=category&id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a>
                                
                                    <ul class="sub-menu">
                                        <?php foreach ($value['danhmuc'] as $key => $sub ): ?>
                                            <li id="menu-item-180020" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-180020"><a href="product.php?action=sub_cate&id=<?php echo $sub['id'] ?>"><?php echo $sub['name'] ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div id="simpleresponsiveslider_widget-2" class="widget widget_simpleresponsiveslider_widget">

            <div class="widget-wrap">
                <div class="rslides_container">
                    <ul class="rslides">
                        <li><img src="<?php echo url(); ?>public/shopme/images/banner/760x480_1.jpg" alt="slider"  /></li>

                        <li><img src="<?php echo url(); ?>public/shopme/images/banner/760x480_1.png" alt="slider"  /></li>

                        <li><img src="<?php echo url(); ?>public/shopme/images/banner/bibomart_760x480_1.jpg" alt="slider"  /></li>

                        <li><img src="<?php echo url(); ?>public/shopme/images/banner/bibomart_760x480_1.jpg" alt="slider"  /></li>

                        <li><img src="<?php echo url(); ?>public/shopme/images/banner/slider.jpg" alt="slider"  /></li>
                        
                    </ul>
                </div>
            </div>
        </div>
       
        <div id="text-14" class="widget widget_text">
            <div class="widget-wrap">
                <div class="textwidget">
                    <img src="<?php echo url(); ?>upload/morinaga_1.jpg">
                </div>
            </div>
        </div>
    </div>
</div>