<?php

?>
<div class="containerfull">
    <div class="bgbanner">ĐĂNG KÝ TÀI KHOẢN</div>
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
            <h1>Đăng Nhập</h1><br>
            <div class="containerfull mr30">
                <h2 style="color: red;" >
               <?php 
               if(isset($_SESSION['tb_dangnhap'])&&($_SESSION['tb_dangnhap']!="")){ 
                echo $_SESSION['tb_dangnhap'];
                unset($_SESSION['tb_dangnhap']);
               }
               ?>
                </h2>
                <form action="index.php?pg=dangnhap" method="post" >
                    <div class="row">
                        <div class="col-25">
                            <label  for="fname">TÊN ĐĂNG NHẬP</label>
                        </div>
                        <div class="col-75">
                            <input type="text" class="inputt" id="fname" name="username" placeholder="TÊN ĐĂNG NHẬP">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">NHẬP MẬT KHẨU </label>
                            
                        </div>
                        <div class="col-75">
                            <input type="password" class="inputt" id="lname" name="password" placeholder="NHẬP MẬT KHẨU">
                        </div>
                    </div>
                    </div>
             
                    <br>
                    <div class="row">
                        <input type="submit" class="dksm" name="submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>


    </div>
</section>