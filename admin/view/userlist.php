<?php 
$html_user = showdm_admin_user($user_list);
?>

<div class="main-content">
                <h3 class="title-page">
                    Thành viên
                </h3>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Username</th>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Quyền</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?=$html_user?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Stt</th>
                            <th>Username</th>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Quyền</th>
                            <th>Thao Tác</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>