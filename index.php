<?php
session_start();
ob_start();
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
}

include "dao/pdo.php";
include "view/header.php";
include "dao/danhmuc.php";
include "dao/sanpham.php";
include "dao/giohang.php";
include "dao/user.php";
include "dao/donhang.php";
include "dao/binhluan.php";
//data danh cho trang chu
$dssp_all =selectall_sanpham();
$dssp_new = get_dssp_new(10);
$dssp_best = get_dssp_best(4);
$dssp_caphe = get_sp_caphe(4);
$dssp_tra = get_sp_tra(4);

if (!isset($_GET['pg'])) {
    include "view/home.php";
} else {
    switch ($_GET['pg']) {
        case 'sanpham':
            $dsdm = danhmuc_all();
            if (!isset($_GET['iddm'])) {
                $iddm = 0;
                $titlepage = "";
            } else {
                $iddm = $_GET['iddm'];
                $titlepage = get_name_dm($iddm);
            }
            //kiem tra form search
            if (isset($_POST["timkiem"]) && ($_POST["timkiem"])) {
                $kyw = $_POST['kyw'];
                $titlepage = " Kết quả tìm kiếm với từ khoá :<span>  " . $kyw . "</span>";
            } else {
                $kyw = "";
            }
            $dssp = get_dssp($kyw, $iddm, 12);
            include "view/sanpham.php";
            break;
        case 'danhmuc':
            $dsdm = danhmuc_all();
            include "view/danhmuc.php";
            break;

        case 'sanphamchitiet':
            if (isset($_GET['idpro'])) {
                $id = $_GET['idpro'];
                $spchitiet = get_sp__by_id($id);
                $dsdm = danhmuc_all();
                $iddm = $spchitiet['iddm'];
                $splienquan = get_dssp_lienquan($iddm, $id, 4);
                include "view/sanphamchitiet.php";
            } else {
                include "view/home.php";
            }
            break;
        case 'addcart':
            if (isset($_POST['addcart'])) {
                $id = $_POST['id'];
                $name = $_POST['tensp'];
                $idpro = $_POST['idpro'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = $_POST['soluong'];
                $thanhtien = (int) $soluong * (int) $price;
                // $sp = [$name,$img,$price,$soluong];
                $sp = array(
                    "id" => $id,
                    "idpro" => $idpro,
                    "name" => $name,
                    "img" => $img,
                    "price" => $price,
                    "soluong" => $soluong,
                    "thanhtien" => $thanhtien
                );
                array_push($_SESSION['giohang'], $sp);
                header('location:index.php?pg=viewcart');
            }
            break;

        case 'viewcart':
            if (isset($_GET['del']) && ($_GET['del'] == 1)) {
                unset($_SESSION["giohang"]);
                // $_SESSION['giohang']=[];
                header('location:index.php?pg=viewcart');
            } else {
                if (isset($_SESSION["giohang"])) {
                    $tongdonhang = get_tongdonhang();
                }
                $giatrivoucher = 0;
                if (isset($_GET['voucher']) && ($_GET['voucher'] == 1)) {
                    $tongdonhang = $_POST['tongdonhang'];
                    $mavoucher = $_POST['mavoucher'];
                    // so sanh voi dtb de lay gia tri ve
                    $giatrivoucher = 10;
                }
                if ($tongdonhang == 0) {
                    $giatrivoucher = 0;
                }
                $thanhtoan = $tongdonhang - $giatrivoucher;
                include "view/viewcart.php";
            }
            break;

        case 'xoasp':

            if (isset($_GET['remove'])) {
                $idpro_to_remove = $_GET['remove'];

                // Loop through the cart and find the item with the specified product ID
                foreach ($_SESSION['giohang'] as $key => $sp) {


                    if ($sp['idpro'] == $idpro_to_remove) {
                        // Remove the item from the cart
                        unset($_SESSION['giohang'][$key]);
                        break; // Stop the loop after removing the item
                    }
                }


            }

            // Redirect back to the viewcart page

            header('location: index.php?pg=viewcart');
            include "view/viewcart.php";
            break;
        case 'dangnhap':
            include "view/dangnhap.php";
            if (isset($_POST['submit']) && ($_POST["submit"])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $kq = checkuser($username, $password);

                if (is_array($kq) && (count($kq))) {
                    $_SESSION['s_user'] = $kq;
                } else {
                    $tb = "Tài khoản không tồn tại khoặc sai";
                    $_SESSION['tb_dangnhap'] = $tb;
                    header('location:index.php?pg=dangnhap');
                }

                header('location:index.php');
            }
            break;
        case 'dangky':
            include "view/dangky.php";
            break;
        case 'adduser':
            if (isset($_POST['submit']) && ($_POST["submit"])) {
                $ktuser = checkusername($_POST['username']);
                if (is_array($ktuser) && (count($ktuser))) {
                    $user = "Tên Đăng Nhập Đã Tồn Tại";
                    $_SESSION['error_usename'] = $user;
                    header('location:index.php?pg=dangky');
                    exit();
                } else {
                    $username = $_POST['username'];
                }
                if ($_POST['password'] == $_POST['repassword']) {
                    $password = $_POST['password'];
                    include "view/dangnhap.php";
                } else {
                    $pass = "Mật Khẩu Không Trùng Khớp ";
                    $_SESSION['error_password'] = $pass;
                    header('location:index.php?pg=dangky');
                    exit();
                }
                $ktemail = checkuseremail($_POST['email']);
                if (is_array($ktemail) && (count($ktemail))) {
                    $email = "Email Đã Tồn Tại";
                    $_SESSION['error_email'] = $email;
                    header('location:index.php?pg=dangky');
                    exit();
                } else {
                    $email = $_POST['email'];
                }
                user_insert($username, $password, $email);
            }
            break;
        case 'dangxuat':
            if (isset($_SESSION['s_user']) && ($_SESSION['s_user'] > 0)) {
                unset($_SESSION['s_user']);
                header('location:index.php');
            }
            header('location:index.php');
            break;
        case 'quenmk':
            if (isset($_POST['gui']) && ($_POST['gui'])) {
                $email = $_POST['email'];
                $tk = $email;
                if (is_array($tk)) {
                    $thongbao = "Mật khẩu của bạn là: " . $tk['pass'];
                } else {
                    $thongbao = "Email không tồn tại.";
                }
            }
            include "view/quenmk.php";
            break;
        case 'myaccount':
            if (isset($_SESSION['s_user']) && ($_SESSION['s_user'] > 0)) {
                include "view/myaccount.php";
            }
            break;
        case 'updatauser':
            if (isset($_POST['capnhat']) && ($_POST["capnhat"])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $dienthoai = $_POST['dienthoai'];
                $diachi = $_POST['diachi'];
                $id = $_POST['id'];

                user_update($username, $password, $email, $diachi, $dienthoai, $id);
                include "view/myaccount_confirm.php";
            }
            break;
        case 'donhang':
            if (isset($_POST['submit'])) {
                $nguoidat_ten = $_POST['hoten'];
                $nguoidat_diachi = $_POST['diachi'];
                $nguoidat_email = $_POST['email'];
                $nguoidat_tel = $_POST['dienthoai'];
                $nguoinhan_ten = $_POST['hoten_nguoinhan'];
                $nguoinhan_diachi = $_POST['diachi_nguoinhan'];
                $nguoinhan_tel = $_POST['dienthoai_nguoinhan'];
                $pttt = $_POST['pttt'];
                $username = "guest" . rand(1, 999);
                $password = $_POST['dienthoai'];
                $iduser = $_POST['id'];
                if (!isset($_SESSION['s_user'])) {
                    $iduser = user_insert_id($username, $password, $nguoidat_ten, $nguoidat_diachi, $nguoidat_email, $nguoidat_tel);
                }
                //tao don hang
                $madh = "xshop" . $iduser . "-" . date("His-dmY");
                $total = get_tongdonhang();
                $ship = 0;
                if (isset($_SESSION['giatrivoucher'])) {
                    $voucher = $_SESSION['giatrivoucher'];
                } else {
                    $voucher = 0;
                }
                $tongthanhtoan = ((int) $total - (int) $voucher) + (int) $ship;
                $idbill = bill_user_insert_id($madh, $iduser, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $nguoinhan_ten, $nguoinhan_diachi, $nguoinhan_tel, $total, $ship, $voucher, $tongthanhtoan, $pttt);
                // insert gio hang tu sessiton  vao table cart
                foreach ($_SESSION['giohang'] as $sp) {
                    extract($sp);
                    cart_insert($idpro, $price, $name, $img, $soluong, $thanhtien, $idbill);
                }
                unset($_SESSION["giohang"]);
                header('location:index.php?pg=billconfirm&madh=' . $madh);
            } else {
                include "view/donhang.php";
            }
            break;
        case 'billconfirm':
            include "view/donhang_configm.php";
            break;
        case 'mybill':
            if (isset($_SESSION['s_user'])) {
                $id = $_SESSION['s_user']['id'];
                $bill = donhang_id($id);
            }
            include "view/mybill.php";
            break;
        case "deletedh":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                donhang_delete($id);
            }
            if (isset($_SESSION['s_user'])) {
                $id = $_SESSION['s_user']['id'];
                $bill = donhang_id($id);
            }
            include "view/mybill.php";

            break;
        default:
            break;
    }
}
include "view/footer.php";


