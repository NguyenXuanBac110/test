<section class="containerfull">
    <div class="container">
        <?php
            include "boxleft.php";
        ?>
        <div class="boxright">
            <h2>Từ khóa tìm kiếm: <?= isset($keyword) ? $keyword : "" ?></h2><br>
            <div class="containerfull mr30">
                <?php
                    if(!empty($dsspsearch)) {
                        foreach($dsspsearch as $sanpham) {
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
                                <p>Không tìm thấy từ khóa</p>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>


    </div>
</section>