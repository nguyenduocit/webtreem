<?php
  require_once("../../../autoload/autoload.php");

   if(isset($_SESSION['id']) && isset($_SESSION['role_id']))
    {
      $id = $_SESSION['id'] ;
      $role_id= $_SESSION['role_id'];
    }
      
   checkLogin($id,$role_id);
  /**
  * khởi tạo class addAdmin kế thừa từ My_Model
  */
  class addAdmin extends My_Model
  {

  }
  $db = new addAdmin();

  $data = $db -> fetchAll('roles');
 ?>


 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Thêm mới Admin</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <!-- <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div> -->
                </div>
              </div>
                <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right ">
                    <button type="button" class="btn btn-round btn-danger" onclick="history.go(-1); return false;" style="float: right;" >Trở lại</button>
                    <a href="index.php" class="btn btn-round btn-success" style="float: right;">Danh sách </a>
                    
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Thêm mới Admin <small>Add new</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                <div class="col-xs-12">
                  <!-- hiển thị thông báo lỗi -->
                  <?php

                    if (isset($_SESSION['error']))
                    {
                      warning($_SESSION['error']);
                      unset($_SESSION['error']);

                    }
                  ?>
                   <!-- end -->
                <form name="form" class="form" id="form" method="post" action="../../controller/AdminController.php?action=add" enctype="multipart/form-data">
                   <table class="table">
                    <tbody>
                      <tr>
                        <td>
                           <label for="param_name" class="formLeft magin-left-30">Họ tên :<span class="req">(*)</span></label> 
                        </td>
                        <td>
                           <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Họ tên" required="required" type="text" value="<?php echo isset($_POST['name'])? $_POST['name']:""  ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label for="param_name " class="formLeft magin-left-30">Email :<span class="req">(*)</span></label>
                        </td>
                        <td>
                           <input id="email" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="email" placeholder="Email" required="required" type="email"  value="<?php echo isset($_POST['email'])? $_POST['email']:""  ?>" >
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label for="param_name" class="formLeft magin-left-30">Mật khẩu :</label>

                        </td>
                        <td>
                         <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">

                        </td>
                      </tr>

                    <tr>
                        <td>
                          <label for="param_name" class="formLeft magin-left-30">Nhập lại mật khẩu  :</label>

                        </td>
                        <td>
                           <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">

                        </td>
                    </tr>


                    <tr>
                        <td>
                          <label for="param_name" class="formLeft magin-left-30">Số điện thoại :</label>

                        </td>
                        <td>
                           <input type="number" id="sort_order" name="phone" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" placeholder="016********"  value="<?php echo isset($_POST['phone'])? $_POST['phone']:""  ?> ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>
                          <label for=address"  Left magin-left-30">Địa chỉ :</label>

                        </td>
                        <td>
                           <input type="text" id="" name="address" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" placeholder="address"  value="<?php echo isset($_POST['adress'])? $_POST['adress']:""  ?>">
                        </td>
                    </tr>

                     <tr>
                        <td>
                          <label for="param_name" class="formLeft magin-left-30">Quyền :<span class="req">(*)</span></label>
                        </td>
                        <td>
                          <select id="heard" name="roles_id" class="form-control parsley-error" required="" data-parsley-id="38">
                            <option value>----Chọn quyền ----</option>
                            <?php foreach ($data as $value) :?>
                            <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </td>
                    </tr>

                      
                    <tr>
                        <td>
                          <label for="param_name" class="formLeft magin-left-30">Hiển thị 
                          :<span class="req">(*)</span></label>

                        </td>
                        <td>
                          <input type="radio" name="status" id="optionsRadios2" value="1" checked="checked"> Hiển thị 
                          <input type="radio" name="status" id="optionsRadios1" value="0"> Ẩn 
                        </td>
                    </tr>
                    <tr>
                        <td>
                          <label for="param_name" class="formLeft magin-left-30">Ảnh đại diện :</label>

                        </td>
                        <td>
                           <input type="file" class="image" id="image" name="image" >
                        </td>
                    </tr>

                    <tr>
                        <td>
                        </td>
                        <td>
                          <button type="submit" class="btn btn-info ">Thêm mới</button>
                          <button type="reset" class="btn btn-default">Hủy</button>
                        </td>
                    </tr>
                    </tbody>
                  </table>

                  
                </form>
              </div>
              
                  </div>
                </div>
              </div>
            </div>
          </div>
  </div>
