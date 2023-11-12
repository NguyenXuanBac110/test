<?php
    function loadall_danhmuc_sanpham() {
        $sql = "SELECT * FROM danhmuc";
        $result = pdo_query($sql);
        return $result;
    }

    function load_danhmucid($id) {
        $sql = "SELECT * FROM danhmuc WHERE id = '$id'";
        $result = pdo_query_one($sql);
        extract($result);
        return $name;
    }

    function load_danhmuc_theoid($iddm) {
        $sql = "SELECT * FROM sanpham WHERE iddm = '$iddm'";
        // $sql = "SELECT
        //             sanpham.id,
        //             sanpham.name,
        //             sanpham.img,
        //             sanpham.price,
        //             sanpham.view,
        //             sanpham.bestseller,
        //             sanpham.iddm,
        //             danhmuc.id AS iddanhmuc
        //         FROM
        //             sanpham
        //         INNER JOIN
        //             danhmuc ON sanpham.iddm = danhmuc.id WHERE iddm = '$iddm'
        // ";
        $result = pdo_query($sql);
        return $result;
    }

    function danhmuc_sanpham_hot($danhmuc) {
        $sql = "SELECT
                    danhmuc.id,
                    danhmuc.name,
                    sanpham.id,
                    sanpham.name AS namesanpham,
                    sanpham.img AS imgsanpham,
                    sanpham.price AS pricesanpham,
                    sanpham.view,
                    sanpham.bestseller,
                    sanpham.iddm    
                FROM 
                    danhmuc
                INNER JOIN
                    sanpham on danhmuc.id = sanpham.iddm
                WHERE danhmuc.id = ".$danhmuc;
        $result = pdo_query($sql);
        return $result;
    }
?>