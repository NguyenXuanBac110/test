<div class="containerfull">
        <div class="bgbanner">TRANG CHỦ</div>
    </div>
<section class="containerfull">
    <div class="container">
        <h1>SẢN PHẨM HOT</h1><br>
        <div class="containerfull">
            <div class="box50 mr15">
                <img src="./layout/images/banner2.webp" alt="">
            </div>  
            <?php
                foreach($dssanphamseller as $sanpham) {
                    extract($sanpham);
                    ?>
                        <a href="index.php?act=chitietsanpham&idsp=<?= $id ?>">
                            <div class="box25 mr15">
                                <div class="best"></div>
                                <img src="./layout/images/<?= $img ?>" alt="">
                                <a href=""><span class="price"><?= $name ?></span></a>
                                <span class="price"><?= number_format($price, 0, ',', '.'); ?> VNĐ</span>
                                <button>Đặt Hàng</button>
                            </div>
                        </a>
                    <?php
                }
            ?>
        </div>

        <div class="containerfull mr30">
            <h1>SẢN PHẨM MỚI</h1><br>
            <?php
                foreach($dssanphamhot as $sanphamhot) {
                    extract($sanphamhot);
                    if($bestseller) {
                        $bestsale = '<div class="best"></div>';
                    } else {
                        $bestsale = "";
                    }
                    ?>
                        <a href="index.php?act=chitietsanpham&idsp=<?= $id ?>">
                            <div class="box25 mr15">
                                <?= $bestsale ?>
                                <img src="./layout/images/<?= $img ?>" alt="">
                                <a href=""><span class="price"><?= $name ?></span></a>
                                <span class="price"><?= number_format($price, 0, ',', '.') ?> VNĐ</span>
                                <button>Đặt hàng</button>
                            </div>
                        </a>
                    <?php
                }
            ?>
            
        </div>

        <div class="containerfull mr30">
            <h1>SẢN PHẨM NHIỀU NGƯỜI XEM</h1><br>
            <?php
                foreach($dssanphamview as $sanphamview) {
                    extract($sanphamview);
                    if($bestseller) {
                        $best = '<div class="best"></div>';
                    } else {
                        $best = "";
                    }
                    ?>
                        <a href="index.php?act=chitietsanpham&idsp=<?= $id ?>">
                            <div class="box25 mr15">
                                <?= $best ?>
                                <img src="./layout/images/<?= $img ?>" alt="">
                                <a href=""><span class="price"><?= $name ?></span></a>
                                <span class="price"><?= number_format($price, 0, ',', '.') ?> VNĐ</span>
                                <button>Đặt hàng</button>
                            </div>
                        </a>
                    <?php
                }
            ?>
        </div>

    </div>
</section>


<section class="containerfull bg1 padd50">
    <div class="container">
        <h1>DANH MỤC SẢN PHẨM HOT</h1>
        <div class="row">
            <h2>Cà phê</h2>
        </div>
        <div class="row">
            <?php
                foreach($dsdanhmuc_cafe as $cafe) {
                    extract($cafe);
                    if($bestseller) {
                        $best = '<div class="best"></div>';
                    } else {
                        $best = "";
                    }
                    ?>
                        <a href="index.php?act=chitietsanpham&idsp=<?= $id ?>">
                            <div class="box25 mr15">
                                <?= $best ?>
                                <img src="./layout/images/<?= $imgsanpham ?>" alt="">
                                <a href=""><span class="price"><?= $name ?></span></a>
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
                foreach($dsdanhmuc_tra as $tra) {
                    extract($tra);
                    if($bestseller) {
                        $best = '<div class="best"></div>';
                    } else {
                        $best = "";
                    }
                    ?> 
                        <a href="index.php?act=chitietsanpham&idsp=<?= $id ?>">
                            <div class="box25 mr15">
                                <?= $best ?>
                                <img src="./layout/images/<?= $imgsanpham ?>" alt="">
                                <a href=""><span class="price"><?= $name ?></span></a>
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
                foreach($dsdanhmuc_banh as $banh) {
                    extract($banh);
                    if($bestseller) {
                        $best = '<div class="best"></div>';
                    } else {
                        $best = "";
                    }
                    ?>
                        <a href="index.php?act=chitietsanpham&idsp=<?= $id ?>">
                            <div class="box25 mr15">
                                <?= $best ?>
                                <img src="./layout/images/<?= $imgsanpham ?>" alt="">
                                <a href=""><span class="price"><?= $name ?></span></a>
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