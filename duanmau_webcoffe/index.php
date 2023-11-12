<?php
    session_start();
    include "model/pdo.php";
    include "model/modelsanpham.php";
    include "model/modeldanhmuc.php";
    include "model/modelcart.php";

    include "view/header.php";

    $dssanphamseller = load_sanpham_bestseller(2);
    $dssanphamhot = load_sanpham_hot(4);
    $dssanphamview = load_sanpham_luotxem(4);
    $dsdanhmuc_cafe = danhmuc_sanpham_hot(3);
    $dsdanhmuc_tra = danhmuc_sanpham_hot(1);
    $dsdanhmuc_banh = danhmuc_sanpham_hot(4);
    $dsdanhmuc = loadall_danhmuc_sanpham();
    $dssanpham = selectall_sanpham();

    if(isset($_GET['act']) && $_GET['act'] != "") {
        $act = $_GET['act'];
        switch($act) {
            case "sanpham":
                include "view/sanpham.php";
                break;
            case "chitietsanpham":
                if(isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                    $idsp = $_GET['idsp'];
                    $chitietsanpham = select_sanphamchitiet($idsp);
                    $sanphamlienquan = select_sanphamcungloai($idsp,$chitietsanpham['iddm']);
                    include "view/chitietsanpham.php";
                }
                break;
            case "danhmuc":
                if(isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                    $iddm = $_GET['iddm'];
                    $tendanhmuc = load_danhmucid($iddm);
                    $dsspdanhmuc = load_danhmuc_theoid($iddm);
                    include "view/viewspdanhmuc.php";
                } else {
                    $iddm = "";
                    include "view/danhmuc.php";
                }
                break;
            case "search":
                if(isset($_POST['timkiem']) && ($_POST['timkiem'])) {
                    $keyword = $_POST['keyword'];
                    $dsspsearch = search_sanpham($keyword);
                }
                include "view/viewsearch.php";
                break;
            case "giohang":
                $showcart = show_cart();
                include "view/giohang/cart.php";
                break;
            case "themgiohang":
                if (isset($_GET['spcart']) && $_GET['spcart'] > 0) {
                    $spcart = $_GET['spcart'];
                    $addsanpham = add_to_cart($spcart);
                    
                    if ($addsanpham) {
                        $id = $addsanpham[0]['id'];
                        $soluong = 1;
                        $thanhtien = $addsanpham[0]['price'] * $soluong;
                        
                        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
                        $product_exists = false;
                        $db = connectToDatabase();
                        $check = cart_id($id);

                        
                        if ($check['id'] > 0) {
                            // Sản phẩm đã tồn tại, cập nhật số lượng
                            $amount = $check['soluong'] + $soluong;
                            $queryUpdate = update_soluong($id,$amount);
                            $product_exists = true;
                        }
                        
                        if (!$product_exists) {
                            // Nếu sản phẩm chưa tồn tại, thêm nó vào giỏ hàng
                            $img = $addsanpham[0]['img'];
                            $name = $addsanpham[0]['name'];
                            $price = $addsanpham[0]['price'];
                            insert_cart($id,$name,$price,$img,$soluong,$thanhtien);
                        }
                        // echo "<script>alert('Thêm vào giỏ hàng thành công!')</script>";
                        $_SESSION['themgiohang'] = "Thêm vào giỏ hàng thành công";
                        header('Location:'.$_SERVER['HTTP_REFERER']);
                        
                    }
                }

            
                break;
            default:
                break;
        }    
    } else {
        include "view/home.php";
    }

    include "view/footer.php";
?>