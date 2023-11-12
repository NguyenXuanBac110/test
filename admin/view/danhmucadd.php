<?php

?>
<div class="main-content">
    <h3 class="title-page">
        Thêm Danh Mục
    </h3>

    <form class="addPro" action="admin.php?pg=adddanhmuc" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Tên Danh Mục:</label>
            <input type="text" class="form-control" name="name" id="name" required placeholder="Nhập tên Danh Mục">
        </div>
        <div class="form-group">
            <button type="submit" name="adddm" class="btn btn-primary">Thêm Danh Mục</button>
        </div>
    </form>
</div>

<script>
    new DataTable('#example');
</script>