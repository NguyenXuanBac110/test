<div class="containerfull">
    <div class="bgbanner">SẢN PHẨM</div>
</div>
<section class="containerfull">
    <div class="container">
        <?php
            include "boxleft.php";
        ?>
        <div class="boxright">
            <h1>SẢN PHẨM</h1><br>
            <div class="containerfull mr30">
                <?php
                    foreach($dssanpham as $sanpham) {
                        extract($sanpham);
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
                                    <button>Đặt hàng</button>
                                </div>
                            </a>
                        <?php
                    }
                ?>
            </div>
        </div>


    </div>
</section>