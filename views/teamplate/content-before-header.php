<div id="content-before-header">
    <div class="wrap">
        <div id="text-13" class="widget widget_text">
            <div class="widget-wrap">
                <div class="textwidget">
                    <div class="telephone-header">
                        <a href="tel: 0916 827 455">016*********</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="nav_menu-8" class="widget widget_nav_menu">
            <div class="widget-wrap">
                <div class="menu-main-menu-container">
                    <ul id="menu-main-menu" class="menu">
                        <li id="menu-item-18" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-18"><a href="index.php">Trang chủ</a></li>
                        <li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17"><a href="product.php?action=san-pham">Sản phẩm</a></li>
                        <li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17"><a href="introduce.php">Giới thiệu</a></li>
                        <li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a href="contact.php">Liên hệ</a></li>
                        <?php if(!isset($_SESSION['id'])): ?>

                        <li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a href="login.php">Đăng Nhập</a></li>
                        <li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a href="register.php">Đăng Ký</a></li>
                       
                        <?php else: ?>
                        <?php 
                            echo ' <li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a href="" style="">Xin chào '.$_SESSION['name'].'</a></li>';
                            echo '<li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a href="logout.php">Logout</a></li>'
                        ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>