<?php
$html_dh = show_donhang($show_dh);
?>
<div class="main-content">
    <h3 class="title-page">Sản phẩm</h3>

    <table id="example" class="table table-striped" style="width: 100%">
        <thead>
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
        </thead>
        <?=$html_dh?>
        <tbody>
            
        </tbody>
        <tfoot>
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
        </tfoot>
    </table>
</div>
</div>
</div>
<script src="assets/js/main.js"></script>
<script>
    new DataTable("#example");
</script>