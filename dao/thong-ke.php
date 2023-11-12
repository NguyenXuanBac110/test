<?php
require_once 'pdo.php';

function thong_ke_hang_hoa(){
     $sql = "SELECT danhmuc.id AS madm, danhmuc.name AS tendm, COUNT(sanpham.id) AS countSp, MIN(sanpham.price) AS minPrice, MAX(sanpham.price) AS maxPrice, AVG(sanpham.price) AS avgPrice
     FROM danhmuc
     LEFT JOIN sanpham ON danhmuc.id = sanpham.iddm
     GROUP BY danhmuc.id
     ORDER BY danhmuc.id";
    return pdo_query($sql);
}
function show_thong_kesp($tk_hh){
    $qq='';
    foreach($tk_hh as $thongke) {
        extract($thongke);
    $qq .='
    <tr>
        <td>'.$madm.'</td>
        <td>'.$tendm.'</td>
        <td>'.$countSp.'</td>
        <td>'.$maxPrice.'</td>
        <td>'.$minPrice.'</td>
        <td>'.$avgPrice.'</td>
        <td>
            <a href="admin.php?pg=tcthongkesp&iddm='.$madm.'" class="btn btn-success"><i class="fa-regular fa-eye"></i> Xem</a>
        </td>
    </tr>';
    }
    return $qq;

}

function thong_ke_binh_luan(){
    $sql = "SELECT sanpham.id AS masp, COUNT(binhluan.id) AS countSp, sanpham.name as Nsanpham, sanpham.img as img
    FROM sanpham
    LEFT JOIN binhluan ON sanpham.id = binhluan.idpro
    GROUP BY sanpham.id
    ORDER BY sanpham.id";
   return pdo_query($sql);
}
function show_thong_kebl($tk_bl){
    $qq='';
    foreach($tk_bl as $thongke) {
        extract($thongke);
    $qq .='
    <tr>
        <td>'.$masp.'</td>
        <td><img src="' . IMG_PATH_ADMIN . $img . '" alt="' . $Nsanpham . '" width="80px"></td>
        <td>'.$Nsanpham.'</td>
        <td>'.$countSp.'</td>
        <td>
            <a href="admin.php?pg=thongkebl&idpro='.$masp.'" class="btn btn-success"><i class="fa-regular fa-eye"></i> Xem</a>
        </td>
    </tr>';
    }
    return $qq;

}
function show_thong_keblct($tk_blct){
    $qq='';
    foreach($tk_blct as $thongke) {
        extract($thongke);
    $qq .='
    <tr>
        <td>'.$mabl.'</td>
        <td><img src="' . IMG_PATH_ADMIN . $img . '" alt="" width="80px"></td>
        <td>'.$iduser.'</td>
        <td>'.$nameuser.'</td>
        <td>'.$noidung.'</td>
        <td>
            <a href="admin.php?pg=sanphamupdate&id=' . $mabl . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
            <a href="admin.php?pg=delproduct&id=' . $mabl . '" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>
        </td>
    </tr>';
    }
    return $qq;

}

function show_binhluan_tk($ctsp){
    $sql = "SELECT binhluan.id AS mabl, sanpham.name AS Nsanpham, sanpham.img AS img, user.username as nameuser, binhluan.iduser as iduser, binhluan.noidung as noidung
    FROM binhluan
    LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
    LEFT JOIN user ON binhluan.iduser = user.id
    where binhluan.idpro = $ctsp" ;
   return pdo_query($sql);
}