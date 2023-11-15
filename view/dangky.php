<?php
$erro =[];
if(isset( $_SESSION['error_password'])&&( $_SESSION['error_password']!="")){ 
$erro['password'] =  $_SESSION['error_password'];
unset($_SESSION['error_password']);
  }
  if(isset($_SESSION['error_usename'])&&($_SESSION['error_usename']!="")){ 
    $erro['username'] = $_SESSION['error_usename'];
    unset($_SESSION['error_usename']);
      }
      if(isset( $_SESSION['error_email'])&&( $_SESSION['error_email']!="")){ 
        $erro['email'] =  $_SESSION['error_email'];
        unset( $_SESSION['error_email']);
          }
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
            <h1>Đăng Kí</h1><br>
            <div class="containerfull mr30">
                <form action="index.php?pg=adduser" method="post" >
                    <div class="row">
                    <h2 style="color: red;" >
               <?php 

               ?>
                </h2>
                        <div class="col-25">
                            <label  for="fname">TÊN ĐĂNG NHẬP</label>
                        </div>
                        <div class="col-75">
                            <input type="text" class="inputt" id="fname" name="username" placeholder="TÊN ĐĂNG NHẬP" required >
                        </div>
                        <span class="erro" ><?php if(isset($erro['username'])) echo $erro['username'] ?> </span>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">NHẬP MẬT KHẨU </label>
                        </div>
                        <div class="col-75">
                            <input type="password" class="inputt" id="lname" name="password" placeholder="NHẬP MẬT KHẨU" required >
                        </div>
                        <span class="erro" ><?php if(isset($erro['password'])) echo $erro['password'] ?> </span>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">NHẬP LẠI MẬT KHẨU </label>
                        </div>
                        <div class="col-75">
                            <input type="password" class="inputt" id="lname" name="repassword" placeholder="NHẬP LẠI MẬT KHẨU"  required >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">Email </label>
                        </div>
                        <div class="col-75">
                            <input type="text" class="inputt"   id="lname" name="email" placeholder="Email"  required >
                        </div>
                        <span class="erro" ><?php if(isset($erro['email'])) echo $erro['email'] ?> </span>
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