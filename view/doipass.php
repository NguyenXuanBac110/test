<?php
if(isset($_SESSION['s_user'])&&($_SESSION['s_user']>0)){
 extract($_SESSION['s_user']);
}
?>
<div class="containerfull">
    <div class="bgbanner">ĐỔI MẬT KHẨU</div>
</div>

<section class="containerfull">
    <div class="container">
        <div class="boxleft mr2pt menutrai">
            <h2>DÀNH CHO BẠN</h2><br><br>

            <a href="#">Thoát</a>
        </div>
        <div class="boxright">
            <div class="containerfull mr30">
                <form action="index.php?pg=myaccount" method="post" >
                    <div class="row">
                        <div class="col-25">
                            <label  for="fname">NHẬP MẬT KHẨU CŨ</label>
                        </div>
                        <div class="col-75">
                            <input type="password" class="inputt" id="lname"  value="<?=$password?>" name="password" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">NHẬP MẬT KHẨU Mới</label>
                        </div>
                        <div class="col-75">
                            <input type="password" class="inputt" id="lname"  value="<?=$password?>" name="password" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="lname">NHẬP LẠI MẬT KHẨU</label>
                        </div>
                        <div class="col-75">
                            <input type="password" class="inputt" id="lname"  value="<?=$password?>" name="password" >
                        </div>
                    </div>
                    
                    
             
                    <br>
                    <div class="row">
                        <input type="hidden" name="id" value="<?=$id?>" >
                        <input type="submit" class="dksm" name="doipass" value="đổi mật khẩu" style="margin-left: 20px">
                    </div>
                </form>
            </div>
        </div>


    </div>
</section>