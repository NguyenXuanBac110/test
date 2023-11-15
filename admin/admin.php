<?php
session_start();
ob_start();
if (isset($_SESSION['user']) && ($_SESSION['user']["role"] == 1)) {
    include '../dao/pdo.php';
    include '../dao/sanpham.php';
    include '../dao/donhang.php';
    include '../dao/danhmuc.php';
    include '../dao/user.php';
    include '../dao/thong-ke.php';
    include("view/header.php");
    if (isset($_GET["pg"])) {
        $pg = $_GET["pg"];
        switch ($pg) {
            case "sanphamlist":
                $sanphamlist = get_dssp_new(100);
                include('view/sanphamlist.php');
                break;
            case "updateproduct":
                if (isset($_POST["updateproduct"])) {

                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $iddm = $_POST['iddm'];
                    $id = $_POST['id'];
                    $img = $_FILES['image']['name'];
                    if ($img != "") {
                        $target_file = IMG_PATH_ADMIN . $img;
                        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                    } else {
                        $img = "";
                    }
                    sanpham_update($name, $img, $price, $iddm, $id);
                }
                $sanphamlist = get_dssp_new(100);
                include('view/sanphamlist.php');
                break;
            case "sanphamadd":
                $danhmuclist = danhmuc_all();
                include("view/sanphamadd.php");
                break;
            case "sanphamupdate":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $sp = get_sp__by_id($id);
                }
                $danhmuclist = danhmuc_all();
                include('view/sanphamupdate.php');
                break;
            case "delproduct":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $img = IMG_PATH_ADMIN . get_img($id);
                    if (is_file($img)) {
                        unlink($img);
                    }
                    try {
                        sanpham_delete($id);
                    } catch (\Throwable $th) {
                        echo "<h3 style='color:red;text-align:center;' >Sản phẩm đã có trong giỏ hàng !!! không được phép xoá</h3>";
                    }
                }
                $sanphamlist = get_dssp_new(100);
                include('view/sanphamlist.php');
                break;
            case "addproduct":
                if (isset($_POST['addproduct'])) {
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $iddm = $_POST['iddm'];
                    $imgs = $_FILES['image'];
                    $size = $_POST['size'];                 
                    $soluong = $_POST['soluong'];             
                    for ($i = 0; $i < count($imgs['name']); $i++) {
                        $target_file = IMG_PATH_ADMIN . $imgs['name'][$i];
                        move_uploaded_file($imgs['tmp_name'][$i], $target_file);
                    }
                    // echo''. $name .''. $price .''.$iddm;
                    // echo'<pre>';
                    // print_r($imgs['name']);
                    // echo'<pre>';
                    // die();
                    sanpham_insert($name, $price, $iddm, $imgs['name'], $size, $soluong);
                    $sanphamlist = get_dssp_new(100);
                    include('view/sanphamlist.php');
                } else {
                    $danhmuclist = danhmuc_all();
                    include("view/sanphamadd.php");
                }
                break;
            case "catalog":
                $danhmuc_list = danhmuc_all();
                include("view/danhmuclist.php");
                break;
            case "danhmucadd":
                include("view/danhmucadd.php");
                break;

            case "updatedm":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $dm = danhmuc_select_by_id($id);
                }
                $danhmuc_list = danhmuc_all();
                include("view/danhmucupdate.php");
                break;

            case "deletedm":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    danhmuc_delete($id);
                }
                $danhmuc_list = danhmuc_all();
                include("view/danhmuclist.php");
                break;
            case "adddanhmuc":
                if (isset($_POST['adddm'])) {
                    $name = $_POST['name'];
                    danhmuc_insert($name);
                }
                $danhmuc_list = danhmuc_all();
                include("view/danhmuclist.php");
                break;
            case "users":
                $user_list = user_all();
                include("view/userlist.php");
                break;
            case "adminadduser":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $us = user_select_by_id($id);
                }
                $danhmuc_list = danhmuc_all();
                include("view/adduser.php");
                break;
            case "addrole":
                if (isset($_POST["addus"])) {
                    $id = $_POST["id"];
                    $role = $_POST['role'];
                    user_update_admin($id, $role);

                }
                $user_list = user_all();
                include("view/userlist.php");
                break;
            case "dangxuat":
                if (isset($_SESSION['user'])) {
                    unset($_SESSION['user']);
                    header('location:login.php');
                } else {
                    header('location:login.php');
                }
                break;
            case 'bills':
                $show_dh = donhang_new();
                include("view/donghanglist.php");
                break;
            case "deldh":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    donhang_delete($id);
                }
                $show_dh = donhang_new();
                include("view/donghanglist.php");
                break;
            case "thongke":
                $tk_hh =thong_ke_hang_hoa();
                $tk_bl =thong_ke_binh_luan();
                include("view/thongke.php");
                break;
            case "tcthongkesp":
                if (isset($_GET['iddm'])&& ($_GET['iddm']>0)) {
                    $tk_hhct =get_sp_iddm($_GET['iddm']);
                }
                include("view/thongkespct.php");
                break;
            case "thongkebl";
                if (isset($_GET['idpro'])&& ($_GET['idpro']>0)) {
                    $tk_blct =show_binhluan_tk($_GET['idpro']);
                }
                include("view/thongkeblct.php");
                break;
            default:
                include("view/home.php");
                break;
        }
    } else {
        include("view/home.php");
    }
    include("view/footer.php");
} else {
    header('location:login.php');
}