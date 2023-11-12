<?php
require_once 'pdo.php';
require 'global.php';


function sanpham_insert($name, $img, $price, $iddm)
{
    $sql = "INSERT INTO sanpham(name, img, price,iddm) VALUES (?,?,?,?)";
    pdo_execute($sql, $name, $img, $price, $iddm);
}

function sanpham_update($name, $img, $price, $iddm, $id)
{
    if ($img != "") {
        $sql = "UPDATE sanpham SET name=?,img=?,price=?,iddm=? WHERE id=?";
        pdo_execute($sql, $name, $img, $price, $iddm, $id);
    } else {
        $sql = "UPDATE sanpham SET name=?,price=?,iddm=? WHERE id=?";
        pdo_execute($sql, $name, $price, $iddm, $id);
    }

}

function sanpham_delete($id)
{
    $sql = "DELETE FROM sanpham WHERE  id=?";

    pdo_execute($sql, $id);

}
function sanpham_dm($iddm){
    $sql = "SELECT * FROM sanpham WHERE iddm = $iddm";
    return pdo_query($sql);
}

function get_dssp_new($limi)
{
    $sql = "SELECT * FROM sanpham ORDER BY id DESC limit " . $limi;
    return pdo_query($sql);
}





function get_dssp_lienquan($iddm, $id, $limi)
{
    $sql = "SELECT * FROM sanpham  WHERE iddm=? AND id<>? ORDER BY price DESC limit " . $limi;
    return pdo_query($sql, $iddm, $id);
}

function get_dssp_best($limi)
{
    $sql = "SELECT * FROM sanpham WHERE bestseller=1 ORDER BY id DESC limit " . $limi;
    return pdo_query($sql);
}
function get_dssp_view($limi)
{
    $sql = "SELECT * FROM sanpham ORDER BY view DESC limit " . $limi;
    return pdo_query($sql);
}

function get_dssp($kyw, $iddm, $limi)
{
    $sql = "SELECT * FROM sanpham WHERE 1";
    if ($iddm > 0) {
        $sql .= " AND iddm=" . $iddm;
    }
    if ($kyw != "") {
        $sql .= " AND name like '%" . $kyw . "%'";

    }
    $sql .= " ORDER BY id DESC limit " . $limi;
    return pdo_query($sql);
}


function get_sp__by_id($id)
{
    $sql = "SELECT * FROM sanpham WHERE id=?";
    return pdo_query_one($sql, $id);
}

function get_img($id)
{
    $sql = "SELECT img FROM sanpham WHERE id=?";
    $getimg = pdo_query_one($sql, $id);
    return $getimg['img'];
}

function get_sp_caphe($limi)
{
    $sql = "SELECT * FROM sanpham WHERE iddm=3 limit " . $limi;
    return pdo_query($sql);
}
function get_sp_tra($limi)
{
    $sql = "SELECT * FROM sanpham WHERE iddm=1 limit " . $limi;
    return pdo_query($sql);
}
function get_sp_banh($limi)
{
    $sql = "SELECT * FROM sanpham WHERE iddm=2 limit " . $limi;
    return pdo_query($sql);
}
function get_sp_iddm($iddm){
    $sql = "SELECT * FROM sanpham WHERE iddm=$iddm";
    return pdo_query($sql);
}


function showsp($dssp)
{
    $html_dssp = '';
    foreach ($dssp as $sp) {
        
        extract($sp);
        if ($bestseller == 1) {
            $best = '<div class="best"></div>';
        } else {
            $best = "";
        }
        $link = "index.php?pg=sanphamchitiet&idpro=" . $id;
        $html_dssp .= '<div class="box25 mr15">
     ' . $best . '
            <a href="' . $link . '">
             <img src="' . IMG_PATH_USER . $img . '" alt="' . IMG_PATH_USER . $img . '">
             </a>
             <a href="' . $link . '"> <h4>' . $name . '</h4></a>
             <a href="' . $link . '">
             <span class="price">' . number_format($price, 0, ',', '.')  . ' VNĐ</span></a>

             <form action="index.php?pg=addcart" method="post">
             <input type="hidden" name="idpro" value="' . $id . '">
             <input type="hidden" name="tensp" value="' . $name . '">
             <input type="hidden" name="img" value="' . $img . '">
             <input type="hidden" name="price" value="' . $price . '">
             <input type="hidden" name="soluong" value="1">
             <button type="submit" name="addcart">Dặt hàng</button>
             </form>
             </div>';
    }
    return $html_dssp;
}
//admin

function showsp_admin($dssp)
{
    $html_dssp = '';
    foreach ($dssp as $sp) {
        extract($sp);
        if ($bestseller == 1) {
            $best = '<div class="best"></div>';
        } else {
            $best = "";
        }
        $link = "index.php?pg=sanphamchitiet&idpro=" . $id;
        $html_dssp .= '<tr>
     <td>' . $id . '</td>
     <td><img src="' . IMG_PATH_ADMIN . $img . '" alt="' . $name . '" width="80px"></td>
     <td>' . $name . '</td>
     <td>' . $price . '</td>
     <td>
     <a href="admin.php?pg=sanphamupdate&id=' . $id . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
         <a href="admin.php?pg=delproduct&id=' . $id . '" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>
     </td>
 </tr>';
    }
    return $html_dssp;
}
function get_sp_all()
{
    $sql = "SELECT * FROM sanpham ";
    return pdo_query($sql);
}


// function hang_hoa_exist($ma_hh){
//     $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

// function hang_hoa_tang_so_luot_xem($ma_hh){
//     $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
//     pdo_execute($sql, $ma_hh);
// }

// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }

// function hang_hoa_select_by_loai($ma_loai){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
//     return pdo_query($sql, $ma_loai);
// }

// function hang_hoa_select_keyword($keyword){
//     $sql = "SELECT * FROM hang_hoa hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }