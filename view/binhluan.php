<?php
session_start();
include "../dao/pdo.php";
include "../dao/binhluan.php";
$hoten ='';
if (isset($_SESSION['s_user'])) {
    $iduser = $_SESSION['s_user']['id'];
    $hoten = $_SESSION['s_user']['username'];
}
if (isset($_POST['guibinhluan'])) {
    $idpro = $_POST['idpro'];
    $noidung = $_POST['noidung'];
    date_default_timezone_set('Asia/Bangkok');
    $ngaybl = date('H:i:s d/m/Y');
    $iduser = $_SESSION['s_user']['id'];
    $hoten = $_SESSION['s_user']['username'];
    binhluan_insert( $noidung, $ngaybl,$idpro,$iduser);
}
$dsbl = binhluan_sp($_GET['idpro']);
$html_bl = "";
foreach ($dsbl as $bl) {
    extract($bl);
    $html_bl .= '<p class="bl" > <div><img class="avata" src="../layout/images/avata.jpg" alt="">  <div class="name">  ' . $username. ' - (' . $ngaybl . ')</div></div>

     <p> ' . $noidung . '</p>
    </p> 
    <hr>
    ';

}

?>
<link rel="stylesheet" href="../layout/css/style.css">
<h1>Bình Luận</h1>

<?php
if (isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)) {


    ?>

    <form action="/du_an_mau_2023aa/du_an_mau_2023/view/binhluan.php?idpro=<?=$_GET['idpro'] ?>" method="post">
        <input type="hidden" name="idpro" value="<?=$_GET['idpro'];?>">                                                                            
        <textarea name="noidung" id="" cols="100" rows="5" required></textarea> <br>
        <button type="submit" name="guibinhluan">Gửi bình luận</button>
    </form>
    <?php
} else {
    $_SESSION['trang'] = "sanphamchitiet";
    $_SESSION['idpro'] = $_GET['idpro'];
    echo "<a href='../index.php?pg=dangnhap' target='_parent' >Bạn phải đăng nhập để sử dụng chức năng này</a>";
}
?>
<div class="dsbl">
    <?= $html_bl ?>
</div>