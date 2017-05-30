<?php
  require_once("../../../autoload/autoload.php");
  /**
  * 
  */
  // khai báo class Viewadd
  class viewAdd
  {
    public $db;
    function __construct()
    {
      # code...
      // khởi tạo biến db 
      $this->db = new My_Model();
    }

    // hàm lấy ra danh mục có parent_id = 0
    function showOption()
    {
      $data = $this->db->fetchwhere('category','parent_id = 0');
      return $data;
    }
  }

  $viewcate = new viewAdd();
  $parent = $viewcate->showOption();

?>


 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Thêm mới danh mục</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
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
                    <h2>Thêm mới danh mục <small>Add new</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                <div class="col-xs-12">

                  <?php

                    if (isset($_SESSION['error']))
                    {
                      warning($_SESSION['error']);
                      unset($_SESSION['error']);

                    }
                  ?>
                <form name="category" class="category" id="category" method="post" action="../../controller/CateController.php?action=add">
                   <table class="table">
                    <tbody>


                      <tr>
                        <td>
                           <label for="param_name" class="formLeft magin-left-30">Tên danh mục :<span class="req">(*)</span></label> 
                        </td>
                        <td>
                           <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Tên danh mục" required="required" type="text">
                        </td>
                      </tr>


                      <tr>
                        <td>
                          <label for="param_name " class="formLeft magin-left-30">Title :<span class="req">(*)</span></label>
                        </td>
                        <td>
                           <input id="title" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="title" placeholder="Title" required="required" type="text">
                        </td>
                      </tr>


                      <tr>
                        <td>
                          <label for="param_name" class="formLeft magin-left-30">Icon :</label>

                        </td>
                        <td>
                          <input id="icon" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="icon" placeholder="Icon" type="text">

                          <p class="icon"> (Vd :fa fa-fw fa-bolt)</p>
                        </td>
                      </tr>


                      <tr>
                        <td>
                          <label for="param_name" class="formLeft magin-left-30">Thứ tự hiển thị :</label>

                        </td>
                        <td>
                           <input type="number" id="sort_order" name="sort_order" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </td>
                      </tr>


                      <tr>
                        <td>
                          <label for="param_name" class="formLeft magin-left-30">Danh mục cha  :<span class="req">(*)</span></label>

                        </td> 
                        <td>
                          <div class="form-group">
                            <select class="form-control" _autocheck="true" name="parent_id">
                              <option value="0">Đây là danh mục cha</option>
                              <?php 
                                foreach ($parent as $key => $value) {
                                  # code...
                                  echo'<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                }
                              ?>
                            </select>

                        </div>
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
                        </td>
                        <td>
                          <button type="submit" class="btn btn-info ">Thêm mới</button>
                          <button type="reset" class="btn btn-default">Hủy</button>
                        </td>
                      </tr>


                    </tbody>
                  </table>
                 <!--  End Table  -->

                  
                </form>
              </div>
              
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>