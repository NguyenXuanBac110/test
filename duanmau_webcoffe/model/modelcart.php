<?php
    function show_cart() {
        $sql = "SELECT * FROM cart WHERE 1 ORDER BY id ASC";
        $result = pdo_query($sql);
        return $result;
    }

    function add_to_cart($id) {
        $sql = "SELECT * FROM sanpham WHERE id = '$id'";
        $result = pdo_query($sql);
        return $result;
    }

    function cart_id($id) {
        $sql = "SELECT * FROM cart WHERE id = '$id'";
        $result = pdo_query_one($sql);
        return $result;
    }

    function insert_cart($id,$name,$price,$img,$soluong,$thanhtien) {
        $sql = "INSERT INTO cart (id,name,price,img,soluong,thanhtien) VALUES (?,?,?,?,?,?)";
        pdo_execute($sql,$id,$name,$price,$img,$soluong,$thanhtien);
    }

    function update_soluong($id,$soluong) {
        $sql = "UPDATE cart SET soluong = '".$soluong."' WHERE id = '$id'";
        $result = pdo_query($sql);
        return $result;
    }

    function connectToDatabase() {
        $host = "localhost"; // Thay thế bằng tên máy chủ MySQL của bạn
        $dbname = "xthca3"; // Thay thế bằng tên cơ sở dữ liệu của bạn
        $username = "root"; // Thay thế bằng tên người dùng MySQL của bạn
        $password = ""; // Thay thế bằng mật khẩu của bạn
    
        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
            // Thiết lập chế độ lấy dữ liệu theo dạng mảng kết hợp
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
            return $db;
        } catch (PDOException $e) {
            die("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
        }
    }
?>