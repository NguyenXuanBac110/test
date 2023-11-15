<?php
$html_cart = viewcart();
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
                    <th>Hình</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                    
                </tr>
                <?= $html_cart ?>


            </table>
            <a href="index.php?pg=viewcart&del=1"><button class="delete">Xoá ALL</button></a>
        </div>
        <div class="col3">
            <h2>ĐƠN HÀNG</h2>
            <div class="total">
                <h3>Tổng:
                    <?= number_format($tongdonhang, 0, ',', '.') ?> VNĐ
                </h3>
            </div>
            <div class="coupon">
                <form action="index.php?pg=viewcart&voucher=1" method="post">
                    <input type="hidden" name="tongdonhang" value="<?= $tongdonhang ?>">
                    <input class="mavocher" type="text" name="mavoucher" placeholder="Nhập voucher">
                    <button type="submit">Áp Mã</button>
                </form>

            </div>
            <div class="total">
                <h3>Tổng thanh toán:
                    <?= number_format($thanhtoan, 0, ',', '.') ?><Var></Var>VNĐ
                </h3>
            </div>
            <a href="index.php?pg=donhang">
                <button> Tiếp tục thanh toán</button>
            </a>
        </div>


    </div>
</section>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
        border: solid 0.5px gray;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:nth-child(odd) {
        background-color: #ffffff;
    }

    tr:hover {
        background-color: #ddd;
    }

    .delete {
        background-color: #ff0000;
        color: #fff;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
    }

    .delete:hover {
        background-color: #cc0000;
    }
</style>