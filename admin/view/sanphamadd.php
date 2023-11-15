<?php 
$html_danhmuclist = showdm_admin($danhmuclist);
?>
<div class="main-content">
    <h3 class="title-page">
        Thêm sản phẩm
    </h3>

    <form class="addPro" action="admin.php?pg=addproduct" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputFile">Ảnh sản phẩm</label>
            <div class="custom-file">
                <input type="file" name="image[]" class="custom-file-input" id="exampleInputFile" multiple>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sả phẩm">
        </div>
        <div class="form-group">
            <label for="categories">Danh mục:</label>
            <select class="form-select" name="iddm" aria-label="Default select example">
                <option selected>Chọn danh mục</option>
                <?=$html_danhmuclist?>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Giá gốc:</label>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" name="price" id="price" class="form-control" placeholder="Nhập giá gốc">
            </div>
        </div>
        <div class="form-row">
            <div style="display:grid;grid-template-columns: 50% 50%;     align-items: center;">
                <div class="form-group col-md-10">
                    <div id="size-container">
                        <label for="price">Size:</label>
                        <input type="text" id="size" name="size[]" class="form-control" placeholder="Nhập size">
                    </div>
                </div>
                <div class="form-group col-md-10">
                    <div id="soluong-container">
                        <label for="price">Số lượng:</label>
                        <input type="text" id="soluong" name="soluong[]" class="form-control" placeholder="Nhập số lượng">
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-success" id="addSizeButton" style="margin-bottom:20px;">Thêm size</button>
        </div>
        <div class="form-group">
            <button type="submit" name="addproduct" class="btn btn-primary">Thêm sản phẩm</button>
        </div>

    </form>
</div>

<script>
// new DataTable('#example');
</script>