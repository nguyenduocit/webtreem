<?php 
session_start();
    require_once("../autoload/autoload.php");
    class ListNew extends My_Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function listNew($start,$num)
        {
            return $list = parent::fetchAllpagina('news',$start,$num);
        }


        public function countid()
        {
           $data = parent::countTable('news');
           return $data;
        }
    }

    $list = new ListNew();
    $display = 10;
    $start = (isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))?$_GET['s']:0;
    $num = $list ->countid();

    $list_new = $list -> listNew($start,$display);
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
               <div class="wrap"><a href="index.php">Trang Chủ</a><span class="label"> &gt; </span>Mẹ và Bé</div>
            </div>
            <div id="inner">
                <div id="content-sidebar-wrap">
                   <!--  div menu-js -->
                        <?php  require_once __DIR__."/teamplate/menu-js.php"; ?>
                    <!-- End div menu-js  -->
                       <div id="content" class="hfeed">
                            <h1 class="archive-heading"><a href="list_new.php" title="Mẹ và Bé" rel="nofollow">Mẹ và Bé</a></h1>
                                <?php foreach($list_new as $value): ?>
                                    <div class="tt">
                                        <div class="post-178509 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc entry">
                                            <a href="<?php echo 'news.php?id='.$value['id']; ?>" title="<?php echo $value['title'] ?>"><img width="300" height="300" src="../upload/news/<?php echo $value['image_link'] ?> " class="alignleft post-image entry-image" alt="<?php echo $value['title'] ?>" itemprop="image"></a>
                                            <h2 class="entry-title"><a href="<?php echo 'news.php?id='.$value['id']; ?>" rel="bookmark"><?php echo $value['title'] ?></a></h2>
                                            <div class="entry-content">
                                                <p>
                                                    <?php echo $value['intro'] ?>
                                                </p>
                                                <p><a href="<?php echo 'news.php?id='.$value['id']; ?>" class="more-link">Xem thêm</a></p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            
                                <div class="navigation">
                                    <?php 
                                        $table ='news';
                                        $link = 'list_new.php?';
                                        echo navigation($display,$table,$link,$num); 
                                    ?> 
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
