<div class="containerfull">
    <div class="bgbanner">DANH MUC</div>
</div>
<section class="containerfull">
    <div class="container">
        <?php
            include "boxleft.php";
        ?>
        <div class="boxright">
            <h2>DANH MỤC: <?= isset($tendanhmuc) ? $tendanhmuc : "" ?></h2><br>
            <div class="containerfull mr30">
                <?php
                    if(!empty($dsspdanhmuc)) {
                        foreach($dsspdanhmuc as $sanpham) {
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
                    } else {
                        ?>
                            <div class="no__keyword">
                                <p>Danh mục này hiện chưa có sản phẩm</p>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
</section>