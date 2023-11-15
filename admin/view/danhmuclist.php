<?php 
$html_danhmuclist = showdm_admin_list( $danhmuc_list);
?>
<div class="main-content">
                <h3 class="title-page">
                    Danh mục
                </h3>
                <div class="d-flex justify-content-end">
                    <a href="admin.php?pg=danhmucadd" class="btn btn-primary mb-2">Thêm danh mục</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                
                      <?= $html_danhmuclist?>
                       
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Thao Tác</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>