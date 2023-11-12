<div class="containerfull">
    <div class="bgbanner">SẢN PHẨM</div>
</div>
<section class="containerfull">
    <div class="container">
        <?php
            include "view/boxleft.php";
        ?>
        <div class="boxright">
            <h1>SẢN PHẨM CHI TIỂT</h1><br>
            <h2>
                <?php
                    if(isset($_SESSION['themgiohang'])) {
                        echo $_SESSION['themgiohang'];
                        unset($_SESSION['themgiohang']); 
                    } else {
                        $_SESSION['themgiohang'] = "";
                    }
                ?>
            </h2>
            <?php
                if(isset($chitietsanpham)) {
                    extract($chitietsanpham);
                }
            ?>
            <div class="containerfull mr30 flex__chitiet">
                <div class="col6 img_chitiet_box">
                    <div class="img_to">
                        <img name="ok" class="img__title" src="./layout/images/<?= $img ?>" alt="">
                    </div>
                    <div class="box__imgchill">
                        <div class="img__contact" id="img__contact">
                            <img class="img__text" src="./layout/images/<?= $img ?>" alt="">
                        </div>
                        <div class="img__contact">
                            <img class="img__text" src="./layout/images/<?= $img ?>" alt="">
                        </div class="img__contact">
                        <div class="img__contact">
                            <img class="img__text" src="./layout/images/<?= $img ?>" alt="">
                        </div>
                        <div class="img__contact">
                            <img class="img__text" src="./layout/images/<?= $img ?>" alt="">
                        </div>
                        <div class="img__contact">
                            <img class="img__text" src="./layout/images/<?= $img ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col6 textchitiet sanpham__box">
                    <form action="index.php?act=themgiohang&spcart=<?= $id ?>" method="post">
                        <div class="title__sanpham">
                            <h2>TÊN SẢN PHẨM: </h2>
                            <h3><?= $name ?></h3>
                        </div>
                        <div class="title__sanpham">
                            <h2>GIÁ: </h2>
                            <h3><?= number_format($price, 0, ',', '.') ?> VNĐ</h3>
                        </div>
                        <div class="title__sanpham">
                            <h2>LƯỢT XEM: </h2>
                            <h3><?= $view ?></h3>
                        </div>
                        <div class="click_mua">
                            <button class="addtocart__btn" name="themgiohang">THÊM GIỎ HÀNG</button>
                            <button class="addtocart__btn">Đặt Hàng</button>
                        </div>
                    </form>
                </div>

            </div>
            <hr>
            <h1>SẢN PHẨM LIÊN QUAN</h1>
            <div class="containerfull mr30">
                <?php
                    if($sanphamlienquan) {
                        foreach($sanphamlienquan as $splienquan) {
                            extract($splienquan);
                            if($bestseller) {
                                $best = '<div class="best"></div>';
                            } else {
                                $best = "";
                            }
                            ?>
                                <a href="index.php?act=chitietsanpham&idsp=<?= $id ?>">
                                    <div class="box25 mr15 mb">
                                        <?= $best ?>
                                        <img src="./layout/images/<?= $img ?>" alt="">
                                        <span class="price"><?= $name ?></span>
                                        <span class="price"><?= number_format($price, 0, ',', '.') ?> VNĐ</span>
                                        <div>
                                            <button>MUA NGAY</button>
                                        </div>
                                    </div>
                                </a>
                            <?php
                        }
                    } else {
                        ?>
                            <div class="no__keyword">
                                <p>Sản phẩm này hiện chưa có sản phẩm liên quan</p>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>


    </div>
</section>