<?php
if(isset($_SESSION['s_user'])&&($_SESSION['s_user']>0)){
 extract($_SESSION['s_user']);
}
?>
<div class="containerfull">
    <div class="bgbanner">Thay đổi mật khẩu</div>
</div>

<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h2>DÀNH CHO BẠN</h2><br><br>
            <a href="#">Cập Nhật Thông Tin</a>
            <a href="#">Lịch Sủ Mua Hàng</a>
            <a href="#">Thoát</a>
        </div>
        <div class="boxright">
            <h1>Đăng Kí</h1><br>
            <div class="containerfull mr30">
                <form action="index.php?pg=updatauser" method="post" >
                    <div class="row">
                        <div class="col-25">
                            <label  for="fname">TÊN ĐĂNG NHẬP</label>
                        </div>
                        <div class="col-75">
                            <input type="text" class="inputt" value="<?=$username?>"  id="fname" name="username" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">NHẬP MẬT KHẨU </label>
                        </div>
                        <div class="col-75">
                            <input type="password" class="inputt" id="lname"  value="<?=$password?>" name="password" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Email </label>
                        </div>
                        <div class="col-75">
                            <input type="text" class="inputt" value="<?=$email?>"   id="lname" name="email" >
                        </div>
                    </div>
                 
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Địa Chỉ </label>
                        </div>
                        <div class="col-75">
                            <input type="text" class="inputt" value="<?=$diachi?>"   id="lname" name="diachi" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Số Điện thoại </label>
                        </div>
                        <div class="col-75">
                            <input type="text" class="inputt" value="<?=$dienthoai?>"   id="lname" name="dienthoai" >
                        </div>
                    </div>
                    </div>
             
                    <br>
                    <div class="row">
                        <input type="hidden" name="id" value="<?=$id?>" >
                        <input type="submit" class="dksm" name="capnhat" value="Submit">
                    </div>
                </form>
            </div>
        </div>


    </div>
</section>