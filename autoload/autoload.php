<?php
    require_once __DIR__.("/../libraries/function.php");
    require_once __DIR__.("/../libraries/My_Model.php");
    /*
        __FILE__ - Tên tập tin hiện tại.
        __DIR__ - Đường dẫn thư mục hiện tại.
        __FUNCTIONS__ - Hàm hiện tại.
        __CLASS__ - Lớp hiện tại.
        __METHOD__ - Phương thức hiện tại.
        __NAMESPACE__ - Namespace hiện tại.
    */
    


    date_default_timezone_set("Asia/Ho_Chi_Minh");

    //echo date("d - m - Y");


    /**
     *
     * kiểm tra xem nếu chưa login thì redirec về trang login
     */


    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/corephp/admin/");
    define("IP",$_SERVER['REMOTE_ADDR']);

?>