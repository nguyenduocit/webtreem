<div id="content-before-footer">
    <div class="wrap">
        <div id="ads_widget-4" class="widget caia_ads_widget">
            <div class="widget-wrap">
                <div class="ads_content_widget"><a href="#" target="blank"><img src="" atl="gioi-thieu"/></a></div>
            </div>
        </div>
    </div>
</div>
<div id="footer" class="footer">
    <div class="wrap">
        <div id="text-15" class="widget widget_text">
            <div class="widget-wrap">
                <h4 class="widget_title">Thông tin cửa hàng</h4>
                <div class="textwidget">
                    <ul>
                        <li><a href="introduce.php" target="_blank">Về shop trẻ em </a></li>
                        <li><a href="contact.php" target="_blank">Liên hệ</a></li>
                        
                       
                    </ul>
                </div>
            </div>
        </div>
        <div id="text-16" class="widget widget_text">
            <div class="widget-wrap">
                <h4 class="widget_title">Sản phẩm ưa thích</h4>
                <div class="textwidget">
                    <ul>
                        <li><a href="">Dầu Gió Thái Lan, </a></li>
                        <li><a href="">Dầu Tắm Gội Pigeon,  </a></li>
                        <li><a href="">Hộp Đựng Thực Phẩm,  </a></li>
                        <li><a href="">Hộp Đựng Đồ,  </a></li>
                        <li><a href="">Móc Treo Đồ Gắn Tường,  </a></li>
                        <li><a href="">Móc Treo Đồ, </a></li>
                        <li><a href="">Túi Hút Chân Không, </a></li>
                        <li><a href="">Dụng Cụ Nhà Bếp Tiện Ích,  </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="text-17" class="widget widget_text">
            <div class="widget-wrap">
                <h4 class="widget_title">Đối tác</h4>
                <div class="textwidget"><a href="#" target="_blank"><img src="../public/shopme/images/doitac1.png" alt="doitac1"></a>
                    <a href="#" target="_blank"><img src="../public/shopme/images/doitac2.png" alt="doitac1"></a>
                    <a href="#" target="_blank"><img src="../public/shopme/images/doitac3.png" alt="doitac1"></a>
                    <a href="#" target="_blank"><img src="../public/shopme/images/doitac4.png" alt="doitac1"></a>
                </div>
            </div>
        </div>
        <div id="text-18" class="widget widget_text">
            <div class="widget-wrap">
                <h4 class="widget_title">Trợ giúp</h4>
                <div class="textwidget">
                    <ul>
                        <li><a href="" target="_blank">Thanh toán qua ngân hàng</a></li>
                        <li><a href="" target="_blank">Cước phí vận chuyển</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div id="text-20" class="widget widget_text">
            <div class="widget-wrap">
                <div class="textwidget">
                    <p><b>Địa chỉ 1:</b> <a href = ""target = "_blank"  style = "color: blue">(Bản đồ)</a></p>
                    <p><b>Địa chỉ 2:</b>  <a href =""target = "_blank" style = "color: blue">(Bản đồ)</a></p>
                    <b>Mobile:</b> 0165902158 | 0966589214 (Có IMS, Zalo, Viber)</p> 
                    <p><b>Điện thoại:</b> 04 3 871 7738</p>
                    
                </div>
            </div>
        </div>
        <div id="text-19" class="widget widget_text">
            <div class="widget-wrap">
                <div class="textwidget">
                    <p>Copy right © : <b>Shop Trẻ EM</b>
                    <p>
                </div>
            </div>
        </div>
        <div id="support-online-5" class="widget support-online-widget">
            <div class="widget-wrap">
                <!-- Support group -->
                <div id="support-group-1" class="support-group">
                    <div id="supporter-1" class="supp-odd supporter">
                        <div class="supporter-info">
                        </div>
                        <!-- end .supporter-info -->
                        <div class="supporter-online">
                            <p class="supporter-skype">
                        </div>
                        <!-- end .supporter-online -->
                    </div>
                    <!-- end .supporter -->
                </div>
                <!-- end .supporter-group -->
                <!-- End support group -->
                
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript" src="../public/shopme/js/addthis_widget.js#pubid=ra-561f22cba0f108c3" async="async"></script>
    <div class="scroll-back-to-top-wrapper">
        <span class="scroll-back-to-top-inner">
        <i class="fa fa-2x fa-chevron-circle-up"></i>
        </span>
    </div>
    <script type='text/javascript' src='../public/shopme/js/jquery.form.min.js'></script>
   
    <script type='text/javascript' src='../public/shopme/js/scripts.js'></script>
    
    <script type='text/javascript' src='../public/shopme/js/superfish.min.js'></script>
    <script type='text/javascript' src='../public/shopme/js/superfish.args.min.js'></script>
    <script type='text/javascript' src='../public/shopme/js/superfish.compat.min.js'></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js
    '></script>
   
<script type="text/javascript">
    $(function(){
        // alert("OK");
        $update_cart = $(".update-cart");
        $update_cart.click(function() {
            key = $(this).attr('data-cart');
            action = 'update_cart';
            qty = $('#qty_'+key).val();
            console.log(qty);
            console.log(key);
            console.log(action);
            $.ajax({
                url:'http://localhost/www/shoptreem/Controller/add_cart.php',
                type:'get',
                async:true,
                dataType:'text',
                data:{'key':key , 'action':action,'qty':qty},
                success:function(data)
                {
                    //console.log(data);
                    
                }
            });
            
        });
    });

    
</script>