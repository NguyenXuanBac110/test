<?php
    function selectall_sanpham() {
        $sql = "SELECT sanpham.id, sanpham.name, sanpham.price, sanpham.iddm, sanpham.mota, hinhsanpham.ma_hinh, hinhsanpham.ten_hinh
        FROM sanpham
        INNER JOIN hinhsanpham ON sanpham.id = hinhsanpham.masp;";
        $result = pdo_query($sql);
        return $result;
    }

    function load_sanpham_hot($limit) {
        $sql = "SELECT * FROM sanpham WHERE 1 ORDER BY id DESC LIMIT ".$limit;
        $result = pdo_query($sql);
        return $result;
    }

    function load_sanpham_bestseller($limit) {
        $sql = "SELECT * FROM sanpham WHERE bestseller = 1 ORDER BY id DESC LIMIT ".$limit;
        $result = pdo_query($sql);
        return $result;
    }

    function load_sanpham_luotxem($limit) {
        $sql = "SELECT * FROM sanpham WHERE view ORDER BY id ASC LIMIT ".$limit;
        $result = pdo_query($sql);
        return $result;
    }

    function search_sanpham($keyword) {
        $sql = "SELECT * FROM sanpham WHERE name LIKE '%".$keyword."%' ORDER BY id ASC";
        $result = pdo_query($sql);
        return $result;
    }

    function select_sanphamchitiet($id) {
        $sql = "SELECT * FROM sanpham WHERE id = '$id'";
        $result = pdo_query_one($sql);
        return $result;
    }

    function select_sanphamcungloai($id,$iddm) {
        $sql = "SELECT * FROM sanpham WHERE iddm = '$iddm' AND id <> '$id'";
        $result = pdo_query($sql);
        return $result;
    }
?>