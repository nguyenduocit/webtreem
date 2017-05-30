<div id="header">
    <div class="wrap">
        <div id="title-area">
            <h1 id="title"><a href="index.php">ShopTreEM – Chuyên cung cấp đồ dùng cho Mẹ và Bé giá Rẻ</a></h1>
        </div>
        <div class="widget-area header-widget-area">
            <div id="code_widget-2" class="code-widget_search_form widget caia_code_widget">
                <div class="widget-wrap">
                    <form role="search" method="get" id="searchform" action="search.php">
                        <div class="search-list-category">
                            <select name="price" id="cat" class="postform">
                                <option value="0" selected="selected">Chọn khoảng giá</option>
                                <option class="level-1" value="0000000-1000000">0-1.000.000</option>
                                <option class="level-1" value="1000000-2000000">1.000.000-2.000.000</option>
                                <option class="level-1" value="2000000-3000000">2.000.000-3.000.000</option>
                                <option class="level-1" value="3000000-4000000">3.000.000-4.000.000</option>
                                <option class="level-1" value="4000000-5000000">4.000.000-5.000.000</option>
                                <option class="level-1" value="5000000-6000000">5.000.000-6.000.000</option>
                                <option class="level-1" value="7000000-8000000">7.000.000-8.000.000</option>
                                <option class="level-1" value="8000000-9000000">8.000.000-9.000.000</option>
                                <option class="level-1" value="9000000-10000000">9.000.000-10.000.000</option>
                            </select>
                            <input type="text" value="" name="search" id="s" placeholder="Tìm kiếm"/>		    
                            <input type="submit" id="searchsubmit" value="Search" />
                        </div>
                    </form>
                </div>
            </div>
            <div id="shop-cart-4" class="widget gsc-shop-cart">
                <div class="widget-wrap">
                    <div class = "cart-wrap">
                        <!--hoangnm edit-->
                        <a href="../views/cart.php" title="Xem giỏ hàng">
                            <div style="width:41px;height:41px;display:inline-block;float:right"></div>
                            <p id="total-incart-price">
                            </p>
                            <span id="num-incart-products">
                            (
                            <span class="num-products"><?php echo (isset($_SESSION['cart']))?count($_SESSION['cart']):0; ?></span>
                            <span class="product-called"> sp</span>
                            )
                            </span>
                            <span class='checkout'>Giỏ hàng</span>
                        </a>
                    </div>
                    <!-- end .wrap -->
                </div>
            </div>
            <div id="text-12" class="widget widget_text">
                <div class="widget-wrap">
                    <div class="textwidget">
                        <p id="button-product">DANH MỤC SẢN PHẨM</p>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="top_menu">
            <ul class="menus">
                <a href="index.php"><li class="level-1">Trang Chủ</li></a>
                <a href="product.php?action=san-pham"><li>Sản phẩm</li></a>
                <a href="introduce.php"><li>Giới Thiệu</li></a>
                <a href="contact.php"><li>Liên hệ</li></a>
                
            </ul>
        </div>

    </div>
</div>