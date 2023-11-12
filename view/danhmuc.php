<?php
$html_dssp_new = showsp($dssp_new);
$html_dssp_best = showsp($dssp_best);
$html_dssp_view = showsp($dssp_view);
$html_dssp_caphe = showsp($dssp_caphe);
$html_dssp_tra = showsp($dssp_tra);
?>

<div class="containerfull">
    <div class="bgbanner">Danh Mục</div>
</div>

<section class="containerfull bg1 padd50">
    <div class="container">
        <h1>DANH MỤC SẢN PHẨM HOT</h1>
        <div class="row">
            <h2>Cà phê</h2>
        </div>
        <?= $html_dssp_caphe ?>
        <div class="row">
            <h2>Trà</h2>
        </div>
        <div class="row">
            <?= $html_dssp_tra ?>
        </div>

    </div>
</section>