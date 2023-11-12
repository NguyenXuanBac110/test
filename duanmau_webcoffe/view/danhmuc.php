<div class="containerfull">
    <div class="bgbanner">DANH MỤC</div>
</div>
<section class="containerfull">
    <div class="container">
        <?php
        include "boxleft.php";
        ?>
        <div class="boxright">
            <section class="containerfull bg1 padd50">
                <div class="container">
                    <h1>DANH MỤC SẢN PHẨM HOT</h1>
                    <div class="row">
                        <h2>Cà phê</h2>
                    </div>
                    <div class="row">
                        <?php
                        foreach ($dsdanhmuc_cafe as $cafe) {
                            extract($cafe);
                            if ($bestseller) {
                                $best = '<div class="best"></div>';
                            } else {
                                $best = "";
                            }
                        ?>
                            <a href="index.php?act=chitietsanpham&idsp=<?= $id ?>">
                                <div class="box25 mr15">
                                    <?= $best ?>
                                    <img src="./layout/images/<?= $imgsanpham ?>" alt="">
                                    <span class="price"><?= $namesanpham ?></span>
                                    <span class="price"><?= number_format($pricesanpham, 0, ',', '.') ?> VNĐ</span>
                                    <button>Đặt hàng</button>
                                </div>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="row">
                        <h2>Trà</h2>
                    </div>
                    <div class="row">
                        <?php
                            foreach ($dsdanhmuc_tra as $tra) {
                                extract($tra);
                                if ($bestseller) {
                                    $best = '<div class="best"></div>';
                                } else {
                                    $best = "";
                                }
                            ?>
                                <a href="index.php?act=chitietsanpham&idsp=<?= $id ?>">
                                    <div class="box25 mr15">
                                        <?= $best ?>
                                        <img src="./layout/images/<?= $imgsanpham ?>" alt="">
                                        <span class="price"><?= $namesanpham ?></span>
                                        <span class="price"><?= number_format($pricesanpham, 0, ',', '.') ?> VNĐ</span>
                                        <button>Đặt hàng</button>
                                    </div>
                                </a>
                            <?php
                            }
                        ?>
                    </div>
                    <div class="row">
                        <h2>Bánh</h2>
                    </div>
                    <div class="row">
                        <?php
                        foreach ($dsdanhmuc_banh as $banh) {
                            extract($banh);
                            if ($bestseller) {
                                $best = '<div class="best"></div>';
                            } else {
                                $best = "";
                            }
                        ?>
                            <a href="index.php?act=chitietsanpham&idsp=<?= $id ?>">
                                <div class="box25 mr15">
                                    <?= $best ?>
                                    <img src="./layout/images/<?= $imgsanpham ?>" alt="">
                                    <span class="price"><?= $namesanpham ?></span>
                                    <span class="price"><?= number_format($pricesanpham, 0, ',', '.') ?> VNĐ</span>
                                    <button>Đặt hàng</button>
                                </div>
                            </a>
                        <?php
                        }
                        ?>
                    </div>

                </div>
            </section>
        </div>
    </div>
</section>