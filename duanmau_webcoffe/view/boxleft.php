<div class="boxleft mr2pt menutrai">
    <h1>DANH MỤC</h1><br><br>
    <?php
        foreach($dsdanhmuc as $danhmuc) {
            extract($danhmuc);
            ?>
                <a href="index.php?act=danhmuc&iddm=<?= $id ?>"><?= $name ?></a>
            <?php
        }
    ?>
</div>