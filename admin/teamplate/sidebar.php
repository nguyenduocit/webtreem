<div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>Admin!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../../../upload/admin/<?php echo (isset($_SESSION['image']))?$_SESSION['image']:"" ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome, <br/><?php echo (isset($_SESSION['name']))?$_SESSION['name']:"" ?> </span>
                <h2></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h2>Bảng Điều Khiển</h2>
                <ul class="nav side-menu">
                  <li><a class="" href="../home"><i class="fa fa-home"></i> Home</a></li>

                  <li><a href="../category"><i class="fa fa-anchor"></i> Danh Mục</a></li>
                  <li><a href="../product"><i class="fa fa-truck"></i> Sản phẩm </a></li>

                 
                  <li><a><i class="fa fa-users"></i></i>Thông tin tài khoản <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../admin">Quản trị</a></li>
                    </ul>
                  </li>

                  <li><a href="../news"><i class="fa fa-bar-chart"></i> Tin Tức </a></li>
                  <li><a href="../product_end"><i class="fa fa-bar-chart"></i> Sản phẩm sắp hết </a></li>
                  
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>
