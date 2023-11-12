<?php
if(isset($_SESSION['s_user'])&&($_SESSION['s_user']>0)){
 extract($_SESSION['s_user']);
}
?>
<div class="containerfull">
        <div class="bgbanner">ĐƠN HÀNG</div>
    </div>

    <section class="containerfull">
        <div class="container">
            <form action="index.php?pg=donhang" method="post" >
         
            <div class="col9 viewcart">
                <div class="ttdathang">
                    <h2>Thông tin người đặt hàng</h2>
                  
                      <label for="hoten"><b>Họ và tên</b></label>
                      <input type="text" placeholder="Nhập họ tên đầy đủ" value="<?php if(isset($_SESSION['s_user'])) echo $ten ?>" name="hoten" id="hoten" >
                  
                      <label for="diachi"><b>Địa chỉ</b></label>
                      <input type="text" placeholder="Nhập địa chỉ" name="diachi" value="<?php if(isset($_SESSION['s_user'])) echo $diachi ?>" id="diachi" >
                  
                      <label for="email"><b>Email</b></label>
                      <input type="text" placeholder="Nhập email" name="email" value="<?php if(isset($_SESSION['s_user'])) echo $email ?>" id="email" >

                      <label for="dienthoai"><b>Điện thoại</b></label>
                      <input type="text" placeholder="Nhập điện thoại" name="dienthoai" value="<?php if(isset($_SESSION['s_user'])) echo $dienthoai ?>" id="dienthoai" >
                      <input type="hidden" value="<?=$id?>" name="id" >
                </div>
                <div class="ttdathang">
               
                    <a onclick="showttnhanhang()" style="cursor: pointer;">
                    &rArr; Thay đổi thông tin nhận hàng
                    </a>
             
                  
                </div>

                <div class="ttdathang" id="ttnhanhang">
                    <h2>Thông tin người nhận hàng</h2>
                  
                      <label for="hoten"><b>Họ và tên</b></label>
                      <input type="text" placeholder="Nhập họ tên đầy đủ" name="hoten_nguoinhan" id="hoten" >
                  
                      <label for="diachi"><b>Địa chỉ</b></label>
                      <input type="text" placeholder="Nhập địa chỉ" name="diachi_nguoinhan" id="diachi">
                               
         <label for="dienthoai"><b>Điện thoại</b></label>
                      <input type="text" placeholder="Nhập điện thoại" name="dienthoai_nguoinhan" id="dienthoai">
                </div>
                      
                  
                    
        </div>
        <div class="col3">
            <h2>ĐƠN HÀNG</h2>
            <div class="total">
                <div class="boxcart">
                    <?php 
                    foreach ($_SESSION['giohang'] as $sp) {
                      extract($sp);
                      echo "  <li> $name </li>";
                    }
                    ?>
                
                <h3>Tổng: <?=$thanhtien?></h3>
                </div>
            </div>
            
            <div class="coupon">
                <div class="boxcart">
                <h3>Vouche: </h3>
                </div>
            </div>
            <div class="pttt">
                <div class="boxcart">
                <h3>Phương thức thanh toán: </h3>
                <input type="radio" name="pttt" value="1" id="" checked> Tiền mặt<br>
                <input type="radio" name="pttt" value="2" id=""> Ví điện tử<br>
                <input type="radio" name="pttt" value="3" id=""> Chuyển khoản<br>
                <input type="radio" name="pttt" value="4" id=""> Thanh toán online<br>
                </div>
            </div>
            <div class="total">
                <div class="boxcart bggray">
                <h3>Tổng: <?=$thanhtien?></h3>
                </div>
            </div>
            <button type="submit" name="submit" >Thanh toán</button>
        </div>
               
        </form>


        </div>
    </section>

   <script >
var ttnhanhang=document.getElementById("ttnhanhang");
ttnhanhang.style.display="none";
function showttnhanhang(){
    if(ttnhanhang.style.display=="none"){
        ttnhanhang.style.display="block";
    }else{
        ttnhanhang.style.display="none";
    }
}
   </script>
