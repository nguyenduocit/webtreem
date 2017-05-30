<?php
  require_once("../../../autoload/autoload.php");
    if(isset($_SESSION['id']) && isset($_SESSION['role_id']))
        {
          $id = $_SESSION['id'] ;
          $role_id= $_SESSION['role_id'];
        }
      
        checkLogin($id,$role_id);
  /**
  * kế thừa từ hàm
  */
  class viewAdd extends My_Model
  {


   
  }

  $db = new viewAdd();


  if(testInputInt($_GET['id']))
  {
    $id = testInputInt($_GET['id']); 

    $where = "id = ".$id;
    $data = $db->fetchwhere ('product',$where);
    //pre($data);

    if (empty($data)) {
      # code...
      $_SESSION['error'] = "Sản phẩm không tồn tại (*).";
    }
  }
  else
  {
    
    echo "<script> window.location = 'index.php'; </script>";
  }

  
    
    $datas = $db->fetchwhere('category','parent_id = 0');

    foreach ( $datas as $key => $value)
    {

      $where = 'parent_id  = '. $value['id'] ;
      $datas[$key]['danhmuc'] = $db->fetchwhere('category',$where);

      //pre($datas);
    }
     


  


?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Chỉnh sửa sản phẩm</h3>
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
            <h2>Chỉnh sửa sản phẩm <small>Edit</small></h2>
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
        <?php //pre($data) ?>
        <?php  foreach ( $data as $values ): ?>
        <form name="form" class="form" id="form" method="post" action="../../controller/ProductController.php?action=edit&id=<?php echo $values['id']?>" enctype="multipart/form-data">
           <table class="table">
            <tbody>
            

              <tr>
                <td>
                   <label for="param_name" class="formLeft magin-left-30">Tên sản phẩm :<span class="req">(*)</span></label>
                </td>
                <td>
                   <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" value="<?php echo $values['name'] ?>" required="required" type="text">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="param_name " class="formLeft magin-left-30">Title :</label>
                </td>
                <td>
                   <input id="title" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="title" value="<?php echo $values['slug'] ?>"   type="text">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="param_name" class="formLeft magin-left-30">Giá  : <span class="req">(*)</span></label>

                </td>
                <td>
                  <input id="price" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="price" value="<?php echo $values['price'] ?>"  required="required"  type="text">


                </td>
              </tr>
              <tr>
                <td>
                  <label for="param_name" class="formLeft magin-left-30">Giảm giá :
                </td>
                <td>
                   <input type="number" id="sale" name="sale"  data-validate-minmax="10,100" value="<?php echo $values['sale'] ?>"  class="form-control col-md-7 col-xs-12">
                </td>
              </tr>

              <tr>
                <td>
                  <label for="param_name" class="formLeft magin-left-30">Số lượng sản phẩm <span class="req">(*)</span> </label>
                <td>
                   <input type="number" id="qty" name="qty" required="required" data-validate-minmax="10,100" value="<?php echo $values['qty'] ?>" class="form-control col-md-7 col-xs-12">
                </td>
              </tr>

              <tr>
                <td>
                  <label for="param_name" class="formLeft magin-left-30">Sản phẩm hót : 
                  :
                </td>
                <td>
                  <input type="radio" name="hot" <?php echo (isset($value['hot']))?'selected':"" ?> id="optionsRadios2" value="1" > Hót 
                </td>
              </tr>
              <tr>
                <td>
                  <label for="param_name" class="formLeft magin-left-30">Thuộc danh mục  :<span class="req">(*)</span></label>

                </td> 
                <td>
                  <div class="form-group">
                    <select class="form-control parsley-error" _autocheck="true" name="parent_id">
                      <option value="0"> Chọn danh mục </option>
                      <?php
                        foreach ($datas as $key => $value) {
                          # code...
                          if(!empty($value['danhmuc']))
                          {
                      ?>
                            <optgroup label="<?php echo $value['name']?>">
                              <?php foreach ($value['danhmuc'] as $sub ): ?>
                                <option value="<?php echo $sub['id'] ?>" <?php  echo ($sub['id'] == $values['category_id']) ? 'selected':""; ?>  >
                                  <?php echo $sub['name'] ?>
                                </option>
                              <?php endforeach;?>
                            </optgroup>
                      <?php
                          }else {
                        ?>
                            <option id="heard"  value=" <?php echo $value['id']  ?>" <?php echo ($value['id'] == $values['category_id']) ? 'selected' :""; ?> > <?php echo $value['name'] ?> </option>;
                        <?php
                          }
                          
                        }
                      ?>
                    </select>

                </div>
                </td>
              </tr>
               <tr>
                 <td>
                   <label for="message">Mô tả sản phẩm :</label>
                 </td>
                  <td>
                      <textarea id="content"  class="form-control" name="content" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"><?php echo $values['content'] ?></textarea>
                  </td>
                
              </tr>

              <tr>
                <td>
                  <label for="param_name" class="formLeft magin-left-30">Ảnh  :</label>

                </td>
                <td>
                  <input type="file" class="image" id="image" name="image" value="<?php  echo $values['thunbar'] ;?>  " >
                  <img src="<?php echo url().'upload/product/'.$values['thunbar']; ?>" class="img-thumbnail" alt="Cinque Terre" width="80" height="80">
                </td>

            </tr>
              <tr>
                <td>
                  <label for="param_name" class="formLeft magin-left-30">Hiển thị 
                  :<span class="req">(*)</span></label>

                </td>
                <td>
                  <input type="radio" name="status" id="optionsRadios2" value="1" <?php echo ($values['status'] == 1)?'checked="checked"':''; ?> > Hiển thị 
                  <input type="radio" name="status" id="optionsRadios1" value="0" <?php echo ($values['status'] == 0 )?'checked="checked"':''; ?>> Ẩn 
                </td>
              </tr>

              <tr>
                <td>
                </td>
                <td>
                  <button type="submit" class="btn btn-info ">update</button>
                  <button type="reset" class="btn btn-default">Hủy</button>
                </td>
              </tr>
            <?php endforeach; ?>
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