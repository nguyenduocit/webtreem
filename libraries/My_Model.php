<?php 
    //echo " vào đây rồi My_Model";
    /**
    * 
    */
    class My_Model
    {
        /**
         * Khai báo biến kết nối
         * @@ [type]
         */
        public $conn;

        public function __construct()
        {
            $this->conn = mysqli_connect("localhost","root","","shoptreem") or die ();
            mysqli_set_charset($this->conn,"utf8");
        }


        /**
         * [insert description] hàm insert 
         * @param  $table
         * @param  array  $data  
         * @return integer
         */
        public function insert($table, array $data)
        {
            //code
           $sql = "INSERT INTO {$table} ";
            $columns = implode(',', array_keys($data));
            $values  = "";
            $sql .= '(' . $columns . ')';
            foreach($data as $field => $value) {
                if(is_string($value)) {
                    $values .= "'". mysqli_real_escape_string($this->conn,$value) ."',";
                } else {
                    $values .= mysqli_real_escape_string($this->conn,$value) . ',';
                }
            }
            $values = substr($values, 0, -1);
            $sql .= " VALUES (" . $values . ')';
            mysqli_query($this->conn, $sql) or die("Lỗi  query  insert ----" .mysqli_error($this->conn));
            return mysqli_insert_id($this->conn);
        }



        /**
         * [update description] hàm update
         * @param  $table [description]
         * @param  array  $data  [description]
         * @param  array  $conditions  [description] điều kiện
         * @return [type]        [description]
         */


        public function update($table, array $data, array $conditions)
        {
            $sql = "UPDATE {$table}";

            $set = " SET ";

            $where = " WHERE ";

            foreach($data as $field => $value) {
                if(is_string($value)) {
                    $set .= $field .'='.'\''. mysqli_real_escape_string($this->conn, xss_clean($value)) .'\',';
                } else {
                    $set .= $field .'='. mysqli_real_escape_string($this->conn, xss_clean($value)) . ',';
                }
            }

            $set = substr($set, 0, -1);


            foreach($conditions as $field => $value) {
                if(is_string($value)) {
                    $where .= $field .'='.'\''. mysqli_real_escape_string($this->conn, xss_clean($value)) .'\' AND ';
                } else {
                    $where .= $field .'='. mysqli_real_escape_string($this->conn, xss_clean($value)) . ' AND ';
                }
            }

            $where = substr($where, 0, -5);

            $sql .= $set . $where;
           
            mysqli_query($this->conn, $sql) or die( "Lỗi truy vấn Update -- " .mysqli_error());

            return mysqli_affected_rows($this->conn);
        }


        /**
         * [delete description] hàm delete
         * @param  $table      [description]
         * @param  array  $conditions [description]
         * @return integer             [description]
         */
        public function delete ($table ,$id )
        {
            $sql = "DELETE FROM {$table} WHERE id = $id ";

            mysqli_query($this->conn,$sql) or die (" Lỗi Truy Vấn delete   --- " .mysqli_error($this->conn));
            return mysqli_affected_rows($this->conn);
        }


        /**
         * Đếm số bản ghi
         * @param  [type] $table [description]
         * @return [type] integer [description]
         */
        public function countTable($table)
        {
            $sql = "SELECT id FROM  {$table}";
            $result = mysqli_query($this->conn, $sql) or die("Lỗi Truy Vấn countTable----" .mysqli_error($this->conn));
            $num = mysqli_num_rows($result);
            return $num;
        }


        /**
         * [fetch description] lấy  1 bản ghi theo điều kiện
         * @param  [type] $where [description]
         * @return array        [description]
         */
        public function fetch ($table ,$where)
        {
            $sql = "SELECT * FROM {$table} WHERE ";
            
            $sql .= $where;
           
          
            $result = mysqli_query($this->conn, $sql) or die("Lỗi Truy Vấn fetch" .mysqli_error($this->conn));
            return mysqli_fetch_assoc($result);
        }

        public function fetchwhere ($table ,$where)
        {
            $sql = "SELECT * FROM {$table} WHERE ";

            $sql .= $where;

            $result = mysqli_query($this->conn, $sql) or die("Lỗi Truy Vấn fetch" .mysqli_error($this->conn));
            $data = [];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        }

        /**
         * [fetchAll description] lấy tất cả bản ghi
         * @param  $sql [description]
         * @return array      [description]
         */
        public function fetchAll($table)
        {
            $sql = "SELECT * FROM {$table} WHERE 1" ;
            $result = mysqli_query($this->conn,$sql) or die("Lỗi Truy Vấn fetchAll " .mysqli_error($this->conn));
            $data = [];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        }

        public function fetchAllpagina($table , $start,$pagi)
        {
            $sql = "SELECT * FROM {$table} ";
            $sql .= " LIMIT {$start} , {$pagi}"; 
            $result = mysqli_query($this->conn,$sql) or die("Lỗi Truy Vấn fetchAll " .mysqli_error($this->conn));
            $data = [];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        }

        /** kiem tra  1 truong da ton tai trong csdl chua
         * @param $table
         * @param $string
         * @return array|null
         */

        public function is_exists_row($table,$string)
        {
            $sql = "SELECT id FROM {$table} WHERE ";
            $sql .= $string ;
            $sql .= " LIMIT 1";
            $result = mysqli_query($this->conn , $sql) or die (" Lỗi truy vấn  is_exists_row - -- " .mysqli_error());
            return mysqli_fetch_assoc($result);
        }

        public  function fetchJone($table , $sql ,$page = 0,$total ,$pagi )
        {
            $result = mysqli_query($this->conn,$sql) or die("Lỗi truy vấn fetchJone ---- " .mysqli_error($this->conn));

            $sotrang = ceil($total / $pagi);
            $start = ($page - 1 ) * $pagi ;
            $sql .= " LIMIT $start,$pagi";

            $result = mysqli_query($this->conn , $sql);
            $data = [];
            $data = [ "page" => $sotrang];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        }


       

        /* lấy tour  hot */
        public  function fetchhot($table,$fild)
        {
            $sql = "SELECT * FROM {$table} ORDER BY $fild DESC LIMIT 0,10";
            $result = mysqli_query($this->conn,$sql) or die("Lỗi  truy vấn sql " .mysqli_error($this->conn));
            $data = [];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        }


        /*lay ra tour co danh muc home */
        public function fetchsql($table , $sql )
        {
            $result = mysqli_query($this->conn,$sql) or die("Lỗi  truy vấn sql " .mysqli_error($this->conn));
            $data = [];
            if( $result)
            {
                while ($num = mysqli_fetch_assoc($result))
                {
                    $data[] = $num;
                }
            }
            return $data;
        }

        public function fetchone($table , $sql)
        {
            $result = mysqli_query($this->conn,$sql) or die("Lỗi  truy vấn sql " .mysqli_error($this->conn));
            return mysqli_fetch_assoc($result);
        }

        public function fetchid($table,$id)
        {
            $sql = "SELECT * FROM  {$table} where id = {$id}";
            $result = mysqli_query($this->conn, $sql) or die("Lỗi Truy Vấn " .mysqli_error($this->conn));
            $data =[];
            if ( $result) {
                # code...
                 while ($row = mysqli_fetch_assoc($result)) {
                # code...
                        $data[] = $row;
                }
            }
           
            return $data;
        }


      
    }

 ?>