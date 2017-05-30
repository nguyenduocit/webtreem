<?php
  require_once("../../../autoload/autoload.php");
  
    if(isset($_SESSION['id']) && isset($_SESSION['role_id']))
        {
          $id = $_SESSION['id'] ;
          $role_id= $_SESSION['role_id'];
        }
      
        checkLogin($id,$role_id);
  /**
  * 
  */
  

?>


<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Thêm Tin Tức</h3>
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
                    <h2>Thêm mới tin tức <small>Add new</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                <form name="news" class="news" id="news" method="post" action="../../controller/NewsController.php?action=add" enctype="multipart/form-data" >
                   <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <label for="param_name " class="formLeft magin-left-30">Title :<span class="req">(*)</span></label>
                        </td>
                        <td>
                           <input id="title" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="title" placeholder="Title" type="text" required="required" >
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label for="param_name" class="formLeft magin-left-30">Intro :<span class="req">(*)</span></label>

                        </td>
                        <td>
                          <input id="icon" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="intro" placeholder="Intro" type="text" required="required" >
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <label for="param_name" class="formLeft magin-left-30">Nội Dung :<span class="req">(*)</span></label>

                        </td>
                        <td>
                           <textarea class="editor form-control col-md-7 col-xs-12" id="param_content" name="content" rows="15" cols="30"></textarea>
                            <div class="clear error" name="content_error"></div>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <label for="param_name" class="formLeft magin-left-30">Ảnh  :</label>

                        </td>
                        <td>
                           <input type="file" class="image" id="image" name="image" >
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

                  
                </form>
              </div>
              
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>