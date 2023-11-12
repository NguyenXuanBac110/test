<div class="containerfull">
    <div class="bgbanner">GIỎ HÀNG</div>
</div>
<section class="containerfull">
    <div class="container">
        <div class="col9 viewcart">
            <h2>GIỎ HÀNG</h2>
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
                <?php
                    if(isset($showcart) && ($showcart != "")) {
                        foreach($showcart as $cart) {
                            extract($cart);
                            ?>
                                <tr>
                                    <td><?= $id ?></td>
                                    <td><img style="width:100px;" src="/duanmau_webcoffe/layout/images/<?= $img ?>" alt="" width="100"></td>
                                    <td><?= $name ?></td>
                                    <td><?= number_format($price, 0, ',', '.') ?> VNĐ</td>
                                    <td><?= $soluong ?></td>
                                    <td><?= number_format($thanhtien, 0, ',', '.') ?> VNĐ</td>
                                    <td><a href="#">Xóa</a></td>
                                </tr>
                            <?php
                        }
                    }
                ?>
            </table>
        </div>
        <div class="col3">
            <h2>ĐƠN HÀNG</h2>
            <div class="total">
                <h3>Tổng: 1000000</h3>
            </div>
            <div class="coupon">
                <h2>Nhập Voucher</h2>
                <input type="text" placeholder="Nhập voucher">
            </div>
            <div class="total">
                <h3>Tổng thanh toán: 1000000</h3>
            </div>
            <button class="addtocart__btn">THANH TOÁN</button>
        </div>
    </div>
</section>