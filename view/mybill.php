<?php 
if(isset($_SESSION['s_user'])) {
$html_cart=  show_donhang_user($bill);
}else{
    $html_cart='';
}
?>

<div class="containerfull">
        <div class="bgbanner">Giỏ Hàng</div>
    </div>

    <section class="containerfull">
        <div class="container">
            <div class="col9 viewcart">
                <h2>ĐƠN HÀNG</h2>
            <table>
                <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Tên người đặt</th>
                <th> Điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Tên nhận hàng</th>
                <th>Điện thoại người nhận</th>
                <th>Địa chỉ người nhận</th>
                <th>Tổng thanh toán</th>
                <th>Thao Tác</th>
                </tr>
       <?=$html_cart?>
                

            </table>
        </div>



        </div>
    </section>